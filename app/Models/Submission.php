<?php


namespace App\Models;


class Submission extends UuidModel {
    use Timestamp;

    protected $table = "submissions";

    public function question () {
        return $this->belongsTo('App\Model\Question');
    }

    public function user () {
        return $this->belongsTo('App\Model\User');
    }

}
