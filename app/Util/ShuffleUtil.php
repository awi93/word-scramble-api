<?php


namespace App\Util;


class ShuffleUtil
{

    public static function shuffle ($words) {
        $n = count($words);

        for($i = $n - 1; $i >= 0; $i--)
        {
            $j = rand(0, $i);
            $tmp = $words[$i];
            $words[$i] = $words[$j];
            $words[$j] = $tmp;
        }
        $word = "";
        for($i = 0; $i < $n; $i++)
            $word .= $words[$i];
        return $word;
    }

}
