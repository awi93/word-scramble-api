<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VwUserPoint extends Model
{
    use Timestamp;

    protected $table = "vw_user_points";

    public function user() {
        return $this->belongsTo('App\Model\User','user_id','id');
    }

}
