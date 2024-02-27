<?php

class Checker{


public static function CheckString(string $string): Bool{

    return preg_match('/^[a-zA-Z0-9]+$/', $string);

}
public static function CheckInt(int $int): Bool{

    return preg_match('/^[0-9]+$/', $int);
}
public static function CheckBool(bool $bool): Bool{
    return preg_match('/^[0-1]+$/', $bool);
}






}