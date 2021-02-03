<?php


namespace App\Util\Query;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

trait OrderByQueryTrait
{

    /**
     * Fungsi ini berfungsi untuk mengubah [abc:desc, bca:desc] menjadi array
     * [
     *  abc:desc,
     *  bca:desc
     * ]
     *
     * STEP ONE : Melakukan split terhadap string dengan delimiter ,
     *      input : [abc:desc,bca:desc] (string)
     *      output : [abc:desc, bca:desc] (array)
     *
     * STEP TWO : Melaukan split setiap item dari hasil STEP ONE dengan delimiter : dan memasukan kedalam array hasil
     *      input : [abc:desc, bca:desc] (array)
     *      outpun : [abc => desc, bca => desc] (array assoc)
     *
     * Ada kemungkinan terjadi OutOfBoundException
     *
     * @param $orderBy
     * @return array
     */
    public static function translateOrderBy($orderBy) {
        /**
         * STEP ONE
         */
        $splited = explode(",",substr($orderBy, 1, strlen($orderBy)-2));
        /**
         * STEP TWO
         */
        $datas = [];
        foreach($splited as $data) {
            $split = explode(":", $data);
            $datas[$split[0]] = $split[1];
        }
        return $datas;
    }

    public static function addOrderBy(Request $request, &$entity)
    {
        if ($request->has('order_by')) {
            $orderBy = $request->input('order_by');

            $results = null;
            preg_match('/\[(?:([a-z\-\>\_\.]+):(desc|asc))(?:,(?:([a-z\-\>\_\.]+):(desc|asc)))*\]/ix', $orderBy, $results);

            if ($results == null) {
                abort(400);
            }

            if (count($results) <= 1) {
                abort(400);
            }

            $orderBys = null;
            try {
                $orderBys = self::translateOrderBy($orderBy);
            } catch (\OutOfBoundsException $e) {
                Log::error($e->getMessage(), $e->getTrace());
                abort(400);
            }

            if ($orderBys != null) {
                foreach ($orderBys as $field => $order) {
                    $entity = $entity->orderBy($field, $order);
                }
            } else {
                abort(500);
            }
        }
        return $entity;
    }

}
