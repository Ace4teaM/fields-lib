<?php
/*
  (C)2016 WebFrameWork
	Test une valeur booleen
*/
namespace Field{

require_once("../cInput.php");

/**
 * @brief Test un booleen
 */
class Bool extends cInput
{
	public static function validate($value){
        if (cInput::empty_string($value))
            throw new EmptyTextException();
		
		// carateres valides
		switch(strtolower($value)){
			case "0":
			case "1":
			case "yes":
			case "no":
			case "on":
			case "off":
			case "true":
			case "false":
                return;
		}

		throw new InvalidCharException();
	}
	public static function regExp(){
		return 'on|off|0|1|yes|no|true|false';
	}
	public static function getMaxLength(){
		return 128;
	}
	public static function toObject($value){
		return Bool::toBool($value);
	}
	//extra
	public static function toBool($value){
		switch(strtolower($value)){
			case "1":
			case "yes":
			case "on":
			case "true":
				return true;
		}
		return false;
	}
        
    public static function toString($value){
        return ($value ? "true" : "false");
	}
}

}
?>
