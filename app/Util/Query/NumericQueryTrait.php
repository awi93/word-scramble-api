<?php


namespace App\Util\Query;


use App\Util\RegexUtil;

trait NumericQueryTrait
{

    /**
     * @param $results
     * @return array
     */
    private static function translateNumericResult($results) {
        $data = [];
        if((array_key_exists(2,$results) && $results[2] !== "") && (array_key_exists(3, $results) && $results[3] !== "")) {
            $data[$results[2]] = $results[3];
        }
        if(array_key_exists(5,$results) && array_key_exists(6, $results)) {
            $data[$results[5]] = $results[6];
        }
        return $data;
    }

    /**
     * @param $data
     * @param null $results
     * @return bool
     */
    public static function isNumericGtPattern($data, &$results = null) {
        $bool = RegexUtil::isPattern("/\[((gt|gte):(\d+))?,?((lt|lte):(\d+))?\]/ix", $data, $results);
        $results = self::translateNumericResult($results);
        return $bool;
    }

    /**
     * @param $data
     * @param null $results
     * @return bool
     */
    public static function isNumericEqPattern($data, &$results = null) {
        $bool = RegexUtil::isPattern("/\[((eq|neq):(\d+))\]/ix", $data, $results);
        $results = self::translateNumericResult($results);
        return $bool;
    }

    /**
     * @param $data
     * @param null $results
     * @return bool
     */
    public static function checkNumericPattern($data, &$results = null) {
        if($bool = self::isNumericGtPattern($data, $results)) {
            return $bool;
        }
        elseif($bool = self::isNumericEqPattern($data, $results)) {
            return $bool;
        }

        return false;
    }

}
