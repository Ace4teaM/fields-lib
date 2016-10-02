<?php

/*
  (C)2008-2010 WebFrameWork 1.3
  La classe Mail valide le format d'une adresse eMail

  Revisions:
  [xx-xx-2010], corrige la methode ::isValid().
  [23-11-2010], Debug isValid(), accept le caractere '-' dans le format du nom de domaine.
 */

namespace Field{

require_once("../cInput.php");

// Adresse eMail
// RFC-2822 ( non-certifié)
class Mail extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        $name = strtok($value, "@");
        $domain = strtok("@");


        //
        //Valide la part local:
        //

		// 1. non vide
        if (cInput::empty_string($name))
            throw new InvalidCharException();
        // 2. carateres valides
        if (!cInput::is_strof($name, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789._!#$%*/?|^{}`~&'+-="))
            throw new InvalidCharException();
        // 3. pas de point '.' ni au debut, ni a la fin, ni de double point
        if ((substr($name, 0, 1) == '.') || (substr($name, -1, 1) == '.') || (strpos($name, '..') !== FALSE))
            throw new InvalidCharException();

        //
        //Valide la part du domaine:
        //
        
		// 1. non vide
        if (cInput::empty_string($domain))
            throw new InvalidCharException();
        // 2. carateres valides
        if (!cInput::is_strof($domain, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789._-"))
            throw new InvalidCharException();
        // 3. pas de point '.' ni au debut, ni a la fin, ni de double point
        if ((substr($domain, 0, 1) == '.') || (substr($domain, -1, 1) == '.') || (strpos($domain, '..') !== FALSE))
            throw new InvalidCharException();
    }

    public static function getMaxLength() {
        return 255 + 64 + 1;
    }

}

}
?>
