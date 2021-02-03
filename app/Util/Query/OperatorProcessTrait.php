<?php


namespace App\Util\Query;


trait OperatorProcessTrait
{

    private static function getOperator($operator) {
        switch ($operator) {
            case "gt":
                return ">";
            case "lt":
                return "<";
            case "gte":
                return ">=";
            case "lte":
                return "<=";
            case "eq":
                return "=";
            case "neq":
                return "!=";
        }
    }

    public static function fetchRelationQuery($entity, $comparators, $field) {
        $entity->where(function($query) use ($comparators, $field) {
            foreach($comparators as $comparator => $data) {
                $query->where($field, self::getOperator($comparator), $data);
            }
        });
        return $entity;
    }

}