<?php
/*
  (C)2016 WebFrameWork
    Test une valeur booleen
*/

namespace Field{

require_once("../cInput.php");

/**
 * @brief Test une date
 */
class Date extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // chaine valide ?
        if(!preg_match("/^".Date::regExp()."$/",$value))
            throw new InvalidCharException();
    }

    public static function toObject($string) {
        $date = new DateTime($string);
        return $date;
    }
    
    public static function regExp() {
        $sep = '[\-\/\\\s]';

        return "(?:([0-9]{1,2})".$sep."([0-9]{1,2})".$sep."([0-9]+))" // DMY
                ."|"
                ."(?:([0-9]+)".$sep."([0-9]{1,2})".$sep."([0-9]{1,2}))" // YMD
        ;
    }

    public static function getMaxLength() {
        return -1;
    }

}

}
?>
