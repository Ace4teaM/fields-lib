<?php
/*
  (C)2016 WebFrameWork
    Test une valeur booleen
*/

namespace Field{

require_once("../cInput.php");

// Facteur de 0 à 1 
// Aucun Standard
class Factor extends cInput
{
	public static function validate($value){
        // chaine valide ?
        if(preg_match("/^".Factor::regExp()."$/",$value)==0)
            throw new InvalidCharException();
	}     
    public static function toObject($string) {
        return floatval($string);
    }
	public static function regExp(){
        return '(?:0|1)(?:\\.[0-9]+)?';
	}
	public static function getMaxLength(){
        return 128;
	}
}

}
?>
