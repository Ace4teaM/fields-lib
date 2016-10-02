<?php
/*
  (C)2016 WebFrameWork
	Test une valeur booleen
*/

namespace Field{

require_once("../cInput.php");

// numerique 
// Aucun Standard
class EvalString extends cInput
{
	public static function validate($value){
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // chaine valide ?
        if(preg_match("/^".EvalString::regExp()."$/",$value)==0)
            throw new InvalidCharException();
	}     
	public static function regExp(){
		return '[^\$\(\)\=]+';//pas de caracteres succeptible de modifier des variables ou appeler des fonctions
	}
	public static function getMaxLength(){
		return 128;
	}
}

}
?>
