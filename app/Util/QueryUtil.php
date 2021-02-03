<?php


namespace App\Util;


use App\Util\Query\DateQueryTrait;
use App\Util\Query\ModifierQueryTrait;
use App\Util\Query\NumericQueryTrait;
use App\Util\Query\OperatorProcessTrait;
use App\Util\Query\OrderByQueryTrait;
use App\Util\Query\StatusQueryTrait;
use App\Util\Query\WithQueryTrait;
use Illuminate\Http\Request;

class QueryUtil
{

    use DateQueryTrait, OperatorProcessTrait, ModifierQueryTrait, OrderByQueryTrait, StatusQueryTrait, NumericQueryTrait, WithQueryTrait;

    public static function fetchLimit(Request $request, &$datas) {
        if($request->has('limit')) {
            $datas = $datas->limit($request->input('limit'));
        }

        return $datas;
    }

    public static function fetchIndex(Request $request, &$datas) {
        if($request->has('paging')) {
            $datas =  $datas->paginate($request->input('paging'));
        }
        else {
            $datas = $datas->get();

            $datas = [
                'data' => $datas,
                'total' => count($datas)
            ];
        }

        return $datas;
    }

}
