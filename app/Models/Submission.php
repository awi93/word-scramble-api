<?php


namespace App\Models;


class Submission extends UuidModel {
    use Timestamp;

    protected $table = "submissions";

    protected $casts = [
        "user_id" => "integer",
        "created_by" => "string",
        "updated_by" => "string"
    ];

    public function question () {
        return $this->belongsTo('App\Models\Question');
    }

    public function user () {
        return $this->belongsTo('App\Models\User');
    }

}
