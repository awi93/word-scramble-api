<?php


namespace App\Http\Controllers;



use App\Models\Question;
use App\Models\Word;
use App\Util\ShuffleUtil;
use Illuminate\Http\Request;

class QuestionGeneratorsController extends Controller
{

    public function generate (Request $request) {
        $words = Word::query()->where('is_deleted', false)->get()->toArray();
        $randInd = rand(0, count($words)) + 1;
        $word = $words[$randInd];
        $words = str_split($word["word"],1);

        $data = new Question();
        $data->word_id = $word["id"];
        $data->scrambled = ShuffleUtil::shuffle($words);
        $data->created_by = $request->user()->id;
        $data->created_at = new \DateTime();
        if ($data->save()) {
            return response()->json([
                "id" => $data->id,
                "data" => $data
            ], 201);
        } else abort(500);
    }

}
