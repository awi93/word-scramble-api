<?php


namespace App\Models;

class Word extends UuidModel
{
    use Timestamp;

    protected $table = "words";

    protected $casts = [
        "created_by" => "string",
        "updated_by" => "string"
    ];

    public function questions () {
        return $this->hasMany('App\Models\Question');
    }

}
