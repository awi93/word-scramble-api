<?php


namespace App\Util;


class ShuffleUtil
{

    public static function shuffle ($words) {
        $n = count($words);

        for($i = $n - 1; $i >= 0; $i--)
        {
            $j = rand(0, $i+1);
            $tmp = $words[$i];
            $arr[$i] = $words[$j];
            $arr[$j] = $tmp;
        }
        $word = "";
        for($i = 0; $i < $n; $i++)
            $word .= $arr[$i];
        return $word;
    }

}
