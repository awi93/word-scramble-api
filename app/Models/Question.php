<?php


namespace App\Models;


class Question extends UuidModel
{
    use Timestamp;

    protected $table = "questions";

    protected $casts = [
        "created_by" => "string",
        "updated_by" => "string",
    ];

    public function word () {
        return $this->belongsTo('App\Models\Word');
    }

}
