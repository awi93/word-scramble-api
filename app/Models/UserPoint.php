<?php


namespace App\Models;


class UserPoint extends UuidModel
{
    use Timestamp;

    protected $table = "user_points";

    protected $casts = [
        "created_by" => "string",
        "updated_by" => "string"
    ];

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

}
