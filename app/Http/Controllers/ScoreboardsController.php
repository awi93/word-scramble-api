<?php


namespace App\Http\Controllers;


use App\Models\VwUserPoint;
use App\Util\QueryUtil;
use Illuminate\Http\Request;

class ScoreboardsController extends Controller
{

    public function index (Request $request) {
        $datas = VwUserPoint::query()
            ->with('user')
            ->where('point','>',0)
            ->orderBy('point','DESC');

        $datas = QueryUtil::fetchIndex($request, $datas);

        return response()->json($datas);
    }

}
