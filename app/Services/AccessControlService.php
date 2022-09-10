<?php

namespace App\Services;

class AccessControlService
{
    public static function can($functionality)
    {
        for ($i=0; $i < sizeof(auth()->user()->level->functionalities); $i++)
        {
            if(auth()->user()->level->functionalities[$i]->name === $functionality)
            {
                return true;
            }
        }

        return false;
    }
}