<?php

namespace Field{

require_once("../cInput.php");

// Nombre a virgule 
// Aucun Standard
class Float extends cInput
{
	public static function validate($value){
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // chaine valide ?
        if(preg_match("/^".Float::regExp()."$/",$value)==0)
            throw new InvalidCharException();
	}     
	public static function regExp(){
		return '\-?[0-9]+(?:[\.\,][0-9]*)?';
	}
    public static function toObject($string) {
        return floatval($string);
    }

	public static function getMaxLength(){
		return 128;
	}
}

}
?>
