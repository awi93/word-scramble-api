<?php


namespace App\Http\Controllers;

use App\Models\VwUserPoint;
use Illuminate\Http\Request;

class UserPointsController
{

    public function show (Request $request, $userId) {
        if ($request->user()->user_type != "ADMIN" && $request->user()->id != $userId) {
            abort(401);
        }

        $data = VwUserPoint::query()->where('user_id', $userId)->first();
        return response()->json($data);
    }

}
