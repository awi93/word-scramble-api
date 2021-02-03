<?php


namespace App\Http\Controllers;


use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{

    public function show (Request $request, $id) {
        $data = Question::query()->find($id);
        if ($data == null)
            abort(404);
        return response()->json($data);
    }

}
