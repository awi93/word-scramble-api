<?php


namespace App\Models;


class Question extends UuidModel
{
    use Timestamp;

    protected $table = "questions";

    public function word () {
        return $this->belongsTo('App\Models\Word');
    }

}
