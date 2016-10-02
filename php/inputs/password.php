<?php

namespace Field{

require_once("../cInput.php");


// Mot de passe ASCII 
// Aucun Standard
class Password extends cInput
{
    const MIN_CHAR_COUNT = 6;

    public static function validate($value)
    {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        if(strlen($value) < Password::MIN_CHAR_COUNT)
            throw new TooSmallStringException(Password::MIN_CHAR_COUNT, Password::getMaxLength());
        
        // carateres valides
        if (!cInput::is_strof($value, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-@#&+~"))
            throw new InvalidCharException();
    }

    public static function regExp() {
        return '[a-zA-Z0-9_\-\@\#\&\+\~]+';
    }

    public static function getMaxLength() {
        return 128;
    }
}

}

?>
