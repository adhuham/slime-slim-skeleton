<?php

namespace App\Model;

class SampleModel
{
    public function getGreetings(): string
    {
        // IRL, you will use db() to call the database and fetch some data
        return 'Welcome Aboard!';
    }
}
