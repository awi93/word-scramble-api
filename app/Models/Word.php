<?php


namespace App\Models;

class Word extends UuidModel
{
    use Timestamp;

    protected $table = "words";

    public function questions () {
        return $this->hasMany('App\Model\Question');
    }

}
