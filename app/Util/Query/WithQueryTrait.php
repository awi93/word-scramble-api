<?php


namespace App\Util\Query;


use Illuminate\Http\Request;

trait WithQueryTrait
{

    public static function addWithQuery(Request $request, &$entity) {
        if ($request->has('with')) {
            $relations = explode(",", substr(strtolower($request->input('with')), 1, -1));
            foreach ($relations as $relation) {
                $entity = $entity->with($relation);
            }
        }

        return $entity;
    }

}
