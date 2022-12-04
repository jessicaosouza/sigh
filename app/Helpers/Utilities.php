<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Utilities
{
    /**
     * gera string unica de acordo com tabela e coluna informada
     */
    public static function generateCheckedString($model,$field,$size=24)
    {
        $letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","p","q","r",
        "s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9");
        $code = "";
        $result=null;
        do{
            $code = "";
            for($i=0;$i<$size;$i++)
            {
                $code .= $letters[rand(0,sizeof($letters)-1)];
            }
            $result = $model->where($field, $code)->first();
        }while($result);
        return $code;
    }

    public static function removeSpecialChars($value)
    {
        return preg_replace('/\D/', '', $value);
    }
}