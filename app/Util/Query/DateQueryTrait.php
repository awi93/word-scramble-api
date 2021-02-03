<?php


namespace App\Util\Query;


use App\Util\RegexUtil;

trait DateQueryTrait
{

    /**
     * @param $results
     * @return array
     */
    private static function translateDateResult($results) {
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
    public static function isDateGtPattern($data, &$results = null) {
        $bool = RegexUtil::isPattern("/\[((gt|gte):(\d{2}-\d{2}-\d{4}(?:\ \d{2}:\d{2})?))?,?((lt|lte):(\d{2}-\d{2}-\d{4}(?:\ \d{2}:\d{2})?))?\]/ix", $data, $results);
        $results = self::translateDateResult($results);
        return $bool;
    }

    /**
     * @param $data
     * @param null $results
     * @return bool
     */
    public static function isDateEqPattern($data, &$results = null) {
        $bool = RegexUtil::isPattern("/\[((eq|neq):(\d{2}-\d{2}-\d{4}))\]/ix", $data, $results);
        $results = self::translateDateResult($results);
        return $bool;
    }

    /**
     * @param $data
     * @param null $results
     * @return bool
     */
    public static function checkDatePattern($data, &$results = null) {
        if($bool = self::isDateGtPattern($data, $results)) {
            return $bool;
        }
        elseif($bool = self::isDateEqPattern($data, $results)) {
            return $bool;
        }

        return false;
    }

}
