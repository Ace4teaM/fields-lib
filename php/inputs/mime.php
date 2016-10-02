<?php

namespace Field{

require_once("../cInput.php");

// Mime type
class Mime extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        if (!preg_match("/^" . Mime::regExp() . "$/", $value))
            throw new InvalidFormatException();
    }

    public static function regExp() {
        return '\w+\/\w+';
    }

    public static function getMaxLength() {
        return 256;
    }

}

}
?>
