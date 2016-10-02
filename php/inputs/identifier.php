<?php

namespace Field{

require_once("../cInput.php");

// Identificateur ASCII 
// Aucun Standard
class Identifier extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // carateres valides
        if (!cInput::is_strof($value, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_"))
            throw new InvalidCharException();

        if (!preg_match("/^" . Identifier::regExp() . "$/", $value))
            throw new InvalidFormatException();
    }

    public static function regExp() {
        return '[a-zA-Z_]{1}[a-zA-Z0-9_]*';
    }

    public static function getMaxLength() {
        return 128;
    }

}

}
?>
