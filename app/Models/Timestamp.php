<?php


namespace App\Models;


trait Timestamp
{
    protected function serializeDate(DateTimeInterface $dateTime)
    {
        if ($dateTime == null)
            return null;
        return $dateTime->getTimestamp() * 1000;
    }

}
