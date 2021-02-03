<?php


namespace App\Http\Controllers;


use App\Models\Question;
use App\Models\Submission;
use App\Models\UserPoint;
use App\Util\QueryUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionsController extends Controller
{

    public function index (Request $request, $userId) {
        if ($request->user()->user_type != "ADMIN" && $request->user()->id != $userId) abort(401);

        $datas = Submission::query()->with([
            'question' => function ($query) {
                $query->with(['word']);
            }
        ])->where('user_id', $userId);

        $datas = QueryUtil::addOrderBy($request, $datas);

        $datas = QueryUtil::fetchLimit($request, $datas);

        $datas = QueryUtil::addModifierQuery($request, $datas);

        $datas = QueryUtil::fetchIndex($request, $datas);

        return response()->json($datas);
    }

    public function show (Request $request, $userId, $id) {
        if ($request->user()->user_type != "ADMIN" && $request->user()->id != $userId) abort(401);

        $data = Submission::query()->with([
            'question' => function ($query) {
                $query->with(['word']);
            }
        ])->where('user_id', $userId)->find($id);
        if ($data == null) abort(404);

        return response()->json($data);
    }

    public function store (Request $request, $userId) {
        $this->validate($request, [
            "question_id" => "required|exists:questions,id",
            "answer" => "required"
        ]);

        $data = new Submission();
        $data->question_id = $request->question_id;
        $data->user_id = $userId;
        $data->answer = $request->answer;

        $question = Question::query()->with('word')->find($request->question_id);
        if ($question->word->word == $request->answer) {
            $data->point = 10;
            $data->is_true = true;
        } else {
            $data->point = -5;
            $data->is_true = false;
        }

        $data->created_by = $request->user()->id;
        $data->created_at = new \DateTime();

        DB::beginTransaction();
        if ($data->save()) {
            $up = new UserPoint();
            $up->user_id = $userId;
            $up->point = $data->point;
            $up->ref_id = $data->id;
            $up->ref_type = "SUBMISSION";
            $up->created_at = new \DateTime();
            $up->created_by = $request->user()->id;
            if ($data->save()) {
                DB::commit();
                return response()->json([
                    "id" => $data->id,
                    "data" => $data
                ], 201);
            } else {
                DB::rollBack();
                abort(500);
            }
        } else {
            DB::rollBack();
            abort(500);
        }
    }

}
