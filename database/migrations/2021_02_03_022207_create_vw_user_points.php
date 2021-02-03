<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVwUserPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
            CREATE OR REPLACE VIEW public.vw_user_points
            AS SELECT u.id as user_id,
                COALESCE(point.point, 0::bigint) AS point
               FROM users u
                LEFT JOIN (SELECT user_points.use_id,
                        sum(user_points.point) AS point
                        FROM user_points
                        GROUP BY user_points.user_id) point
                ON
                    u.id = point.user_id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_user_points');
    }
}
