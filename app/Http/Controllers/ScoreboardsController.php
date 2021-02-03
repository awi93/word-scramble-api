<?php


namespace App\Http\Controllers;


use App\Models\VwUserPoint;
use App\Models\Word;
use App\Util\QueryUtil;
use Illuminate\Http\Request;

class ScoreboardsController extends Controller
{

    public function index (Request $request) {
        $datas = VwUserPoint::query()
            ->with('user')
            ->orderBy('point','DESC');

        $datas = QueryUtil::fetchIndex($request, $datas);

        return response()->json($datas);
    }

}
