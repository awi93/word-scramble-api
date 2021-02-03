<?php


namespace App\Models;


class UserPoint extends UuidModel
{
    use Timestamp;

    protected $table = "user_points";

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

}
