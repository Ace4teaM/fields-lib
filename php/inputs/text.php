<?php

namespace Field{

require_once("../cInput.php");

/**
 * @brief Test une chaine de caractéres 
 * @todo Classe non implémentée
 */
class Text extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();
    }

    public static function regExp() {
        return '.*';
    }

    public static function getMaxLength() {
        return -1;
    }

}

}

?>
