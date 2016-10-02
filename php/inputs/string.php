<?php

namespace Field{

require_once("../cInput.php");

// Chaine de carcteres 
// Aucun Standard
class String extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // chaine valide ?
        if (preg_match("/^" . String::regExp() . "$/", $value) == 0)
            throw new InvalidCharException();
    }

    public static function regExp() {
        return '[^"\n\r]*';
    }

    public static function getMaxLength() {
        return 128;
    }

}

}
?>
