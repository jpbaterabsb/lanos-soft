<?php
/**
 * Created by PhpStorm.
 * User: joaopaulooliveirasantos
 * Date: 2019-01-10
 * Time: 23:39
 */

namespace App\Utils;


class Converter
{
    public static function stringMoneyToDecimal($stringMoney){
        $stringMoney = str_replace(".","",$stringMoney);
        return str_replace(",",".",$stringMoney);
    }
}