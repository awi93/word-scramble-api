<?php


namespace App\Http\Controllers;


use App\Models\Word;
use App\Util\QueryUtil;
use Illuminate\Http\Request;

class WordsController extends Controller
{

    public function index (Request  $request) {
        $datas = Word::query()->where('is_deleted', false);

        $datas = QueryUtil::addOrderBy($request, $datas);

        $datas = QueryUtil::fetchLimit($request, $datas);

        $datas = QueryUtil::addModifierQuery($request, $datas);

        $datas = QueryUtil::fetchIndex($request, $datas);

        return response()->json($datas);
    }

    public function show (Request $request, $id) {
        $data = Word::query()->find($id);
        if ($data == null) {
            abort(404);
        }
        return response()->json($data);
    }

    public function store (Request $request) {
        if ($request->user()->user_type != "ADMIN") abort(401);

        $this->validate($request, [
            "word" => "required|unique"
        ]);

        $data = new Word();
        $data->word = $request->word;
        $data->created_at = new \DateTime();

        if ($data->save()) {
            return response()->json([
                "id" => $data->id,
                "data" => $data
            ], 201);
        } else abort(500);
    }

    public function update (Request $request, $id) {
        if ($request->user()->user_type != "ADMIN") abort(401);

        $data = Word::query()->find($id);
        if ($data == null)
            abort(404);

        $this->validate($request, [
            "word" => "required|unique"
        ]);

        $data = new Word();
        $data->word = $request->word;
        $data->created_at = new \DateTime();

        if ($data->save()) {
            return response()->json([
                "id" => $data->id,
                "data" => $data
            ], 200);
        } else abort(500);
    }

    public function destroy (Request $request, $id) {
        if ($request->user()->user_type != "ADMIN") abort(401);

        $data = Word::query()->find($id);
        if ($data == null)
            abort(404);

        $data->is_deleted = true;

        if ($data->save()) {
            return response()->json([
                "id" => $data->id,
                "data" => $data
            ], 200);
        } else abort(500);
    }

}
