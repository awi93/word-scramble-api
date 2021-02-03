<?php


namespace App\Util\Query;

use Illuminate\Http\Request;

trait ModifierQueryTrait
{

    public static function addModifierQuery(Request $request, &$entity) {
        if($request->has('created_at')) {
            $results = null;
            if(DateQueryTrait::checkDatePattern($request->input('created_at'),$results)) {
                $entity = OperatorProcessTrait::fetchRelationQuery($entity, $results, 'created_at');
            }
            else {
                abort(400);
            }
        }

        if($request->has('updated_at')) {
            $results = null;
            if(DateQueryTrait::checkDatePattern($request->input('updated_at'),$results)) {
                $entity = OperatorProcessTrait::fetchRelationQuery($entity, $results, 'updated_at');
            }
            else {
                abort(400);
            }
        }

        if($request->has('created_by')) {
            $entity->where('created_by', $request->input('created_by'));
        }

        if($request->has('updated_by')) {
            $entity->where('updated_by', $request->input('updated_by'));
        }

        return $entity;
    }

}
