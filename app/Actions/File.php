<?php

namespace App\Actions;

class File
{
    public static function storeFile($logo)
    {
        return $logo->storeAs('logos', $logo->getClientOriginalName());
    }
}
