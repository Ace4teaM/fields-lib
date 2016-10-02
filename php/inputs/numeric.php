<?php

namespace Field{

require_once("../cInput.php");
require_once("integer.php");
require_once("float.php");

// numerique 
// Aucun Standard
class Numeric extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // chaine valide ?
        if (preg_match("/^" . Numeric::regExp() . "$/", $value) == 0)
            throw new InvalidCharException();
    }

    public static function toObject($string) {
        if(strstr($string, ",."))
            return Float::toObject($string);
        return Integer::toObject($string);
    }
    public static function regExp() {
        return Integer::regExp() . '|' . Float::regExp();
    }

    public static function getMaxLength() {
        return 128;
    }

}

}
?>
