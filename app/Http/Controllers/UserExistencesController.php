<?php


namespace App\Http\Controllers;

use App\Models\Tables\User;
use Illuminate\Http\Request;

class UserExistencesController extends Controller
{

    public function isExists (Request $request) {
        if (!$request->has('username')) {
            abort(400);
        }

        $data = User::query()
            ->where('username', $request->input('username'))
            ->first();

        if ($data != null)
            return response()->json([
                "existency" => true,
                "data" => $data
            ], 200);
        else
            return response()->json([
                "existency" => false
            ], 200);


    }

}
