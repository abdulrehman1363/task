<?php

namespace App\Actions;

class File
{
    public static function storeFile($logo)
    {
        $logo->storeAs('public/logos', $logo->getClientOriginalName());
        return $logo->getClientOriginalName();
    }
}
