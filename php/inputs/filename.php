<?php
/*
  (C)2010 WebFrameWork 1.3
	La classe cInputFileName valide le format d'un nom de fichier
*/

namespace Field{

require_once("../cInput.php");

class WindowsFileName extends cInput
{
	public static function validate($value){
        if (cInput::empty_string($value))
            throw new EmptyTextException();

		// 1. non vide
		if( empty($value) )
            throw new InvalidCharException();
		// 2. carateres invalides
		if(!cInput::is_not_strof($value,'\/\\:*?"<>|'))
            throw new InvalidCharException();
		// 3. pas de point '.' ni au debut, ni a la fin, ni de double point
		if((substr($value,0,1)=='.') || (substr($value,-1,1)=='.') || (strpos($value,'..')!==FALSE))
            throw new InvalidCharException();
	}
	public static function getMaxLength(){
		return 256;
	}
}

class UNIXFileName extends cInput
{
	public static function validate($value){
        if (cInput::empty_string($value))
            throw new EmptyTextException();

		// 1. non vide
		if( empty($value) )
            throw new InvalidCharException();
		// 2. carateres invalides
		if(!cInput::is_not_strof($value,'\/\\:*?"<>|'))
            throw new InvalidCharException();
		// 3. pas de point '.' ni au debut, ni a la fin, ni de double point
		if((substr($value,0,1)=='.') || (substr($value,-1,1)=='.') || (strpos($value,'..')!==FALSE))
            throw new InvalidCharException();
	}
	public static function getMaxLength(){
		return 256;
	}
}

}
?>
