<?php
/*
  (C)2016 WebFrameWork
    Test une valeur booleen
*/

namespace Field{

require_once("../cInput.php");

/**
 * @brief Date + Temps
 */
class DateTime extends cInput {

    public static function validate($value) {
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // chaine valide ?
        if(!preg_match("/^".DateTime::regExp()."$/",$value))
            throw new InvalidCharException();
    }

    public static function toObject($string) {
        $date = new DateTime($string);
        return $date;
    }
    
    public static function regExp() {
        $tsep = '[\:\s]';//time separator
        $dsep = '[\-\/\\s]';//date separator
        
        return 
                "(?:([0-9]{1,2})$dsep([0-9]{1,2})$dsep([0-9]+)\s*([0-2]{1}[0-9]{1})$tsep([0-6]{1}[0-9]{1})$tsep([0-6]{1}[0-9]{1}))" //DMY-HMS
                ."|"
                ."(?:([0-9]+)$dsep([0-9]{1,2})$dsep([0-9]{1,2})\s*([0-6]{1}[0-9]{1})$tsep([0-6]{1}[0-9]{1})$tsep([0-2]{1}[0-9]{1}))"//YMD-SMH
        ;
/*        return array(
            "DMY-HMS"=>"/^([0-9]{1,2})$dsep([0-9]{1,2})$dsep([0-9]+)\s*([0-2]{1}[0-9]{1})$tsep([0-6]{1}[0-9]{1})$tsep([0-6]{1}[0-9]{1})$/",
            "YMD-SMH"=>"/^([0-9]+)$dsep([0-9]{1,2})$dsep([0-9]{1,2})\s*([0-6]{1}[0-9]{1})$tsep([0-6]{1}[0-9]{1})$tsep([0-2]{1}[0-9]{1})$/"
        );*/
    }

    public static function getMaxLength() {
        return -1;
    }

}

}
?>
