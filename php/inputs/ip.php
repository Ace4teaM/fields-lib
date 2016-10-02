<?php

namespace Field{

require_once("../cInput.php");

// Chaine de carcteres 
// Aucun Standard
class IPv4 extends cInput
{
	public static function validate($value){
        if (cInput::empty_string($value))
            throw new EmptyTextException();
		
		// chaine valide ?
		if(preg_match("/^".IPv4::regExp()."$/",$value)==0)
            throw new InvalidCharException();
	}
	public static function regExp(){
		return '(?:0|1[0-9]{0,2}|2[0-4][0-9]|25[0-5])'.'\.'
                        .'(?:0|1[0-9]{0,2}|2[0-4][0-9]|25[0-5])'.'\.'
                        .'(?:0|1[0-9]{0,2}|2[0-4][0-9]|25[0-5])'.'\.'
                        .'(?:0|1[0-9]{0,2}|2[0-4][0-9]|25[0-5])';
	}
	public static function getMaxLength(){
		return (3*4)+4;
	}
}

}
?>
