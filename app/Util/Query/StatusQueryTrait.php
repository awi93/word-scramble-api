<?php


namespace App\Util\Query;


use Illuminate\Http\Request;

trait StatusQueryTrait
{

    public static function addStatusQuery(Request $request, & $entity) {
        if ($request->has('statuses')) {
            $statuses = explode(',', substr(strtoupper($request->input('statuses')),1,-1));
            $entity = $entity->whereIn('status', $statuses);
        }

        return $entity;
    }

}
