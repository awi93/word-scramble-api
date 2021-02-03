<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function store (Request $request) {
        $this->validate($request, [
            'username' => "required|email|unique:users",
            'user_type' => 'required|in:PLAYER,ADMIN',
            'name' => 'required',
            'password' => 'required_if:user_type,ADMIN'
        ]);

        $data = new User();
        $data->username = $request->username;
        $data->name = $request->name;
        $data->user_type = $request->user_type;

        if ($request->user_type == "PLAYER") {
            $data->password = Hash::make("player123");
        } else {
            $data->password = $request->password;
        }
        $data->created_at = new \DateTime();

        if ($data->save()) {
            return response()->json([
                "id" => $data->id,
                "data" => $data,
            ], 201);
        } else {
            abort(500);
        }
    }

    public function update (Request $request, $id) {
        if ($request->user()->user_type != "ADMIN" && $request->user()->id != $id) {
            abort(401);
        }

        $data = User::query()->find($id);
        if ($data == null) {
            abort(404);
        }

        $this->validate($request, [
           "name" => "required"
        ]);

        $data->name = $request->name;

        if ($data->save()) {
            return response()->json([
                "id" => $data->id,
                "data" => $data
            ], 200);
        } else {
            abort(500);
        }
    }

}
