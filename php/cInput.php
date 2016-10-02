<?php
/*
    ---------------------------------------------------------------------------------------------------------------------------------------
    (C)2008-2007, 2012-2013, 2016 Thomas AUGUEY <contact@aceteam.org>
    ---------------------------------------------------------------------------------------------------------------------------------------
    This file is part of WebFrameWork.

    WebFrameWork is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    WebFrameWork is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with WebFrameWork.  If not, see <http://www.gnu.org/licenses/>.
    ---------------------------------------------------------------------------------------------------------------------------------------
*/

namespace Field{
/**
 * @file input.php
 *
 * @defgroup Application
 * @brief Définition de champ
 * @{
 */
class cInput {

    /**
     * @brief Vérifie le format d'une chaine de caractère
     * @return Résultat de la procédure
     * @retval false Le format est invalide
     * @retval true  Le format est valide
     */
    public static function isValid($value/*, ref $exception = null*/){
        try{
            $this->Validate($value);
        }
        catch(Exception $ex){
            return false;
        }

        return true;
    }

    /**
     * @brief Test le format d'une chaine de caractère
     * @remark Si le champ est invalide une exception de type InputException est levé
     */
    public static function Validate($value){
        throw new Exception("Not Implemented");
    }

    /**
     * @brief Obtient la taille maximale possible pour ce champ
     * @return Taille maximale en nombre de caractères. Si 0, illimitée
     */
    public static function getMaxLength() {
        return 0;
    }

    /**
     * @brief Convertie une chaine en objet PHP
     * @return Objet ou chaine
     */
    public static function toObject($value){
        return $value;
    }

    protected static function is_strof($str,$chr){
        for($i=0;$i<strlen($str);$i++){
            $ok=0;
            for($x=0;$x<strlen($chr);$x++){
                if($chr[$x]==$str[$i]){
                    $ok=1;
                    $x=strlen($chr);//termine la boucle
                }
            }
            if(!$ok)
                return false;
        }
        return true;
    }

    protected static function is_not_strof($str,$chr){
        for($i=0;$i<strlen($str);$i++){
            for($x=0;$x<strlen($chr);$x++){
                if($chr[$x]==$str[$i]){
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * @brief Test si une chaine est vide
     * @param string $str Chaine à tester
     * @return true, si la chaine n'est pas vide
     * @retval true La chaine contient des caractères autres que des caractères invisibles
     * @retval false La chaine ne contient pas de caractères visibles
     */
    protected static function empty_string($str) {
        return (trim($str) == "") ? true : false;
    }

}


const EmptyText = 1;
const InvalidChar = 2;
const InvalidFormat = 3;
const InvalidRange = 4;
const Oversized = 5;
const Undersized = 6;
const TooSmallString = 7;

class InputException extends \Exception{}

class EmptyTextException extends  InputException{
    public function __construct(\Exception $previous = null) {
        parent::__construct("Empty text", EmptyText, $previous);
    }
}

class InvalidCharException extends  InputException{
    public function __construct(\Exception $previous = null) {
        parent::__construct("One or multiple invalid characters", InvalidChar, $previous);
      }
}

class InvalidFormatException extends  InputException{
    public function __construct(\Exception $previous = null) {
        parent::__construct("One or multiple invalid characters", InvalidFormat, $previous);
      }
}

class InvalidRangeException extends  InputException{
    public function __construct(\Exception $previous = null) {
        parent::__construct("One or multiple invalid characters", InvalidRange, $previous);
      }
}

class OversizedException extends  InputException{
    public function __construct(\Exception $previous = null) {
        parent::__construct("Too many characters", Oversized, $previous);
      }
}

class UndersizedException extends  InputException{
    public function __construct(\Exception $previous = null) {
        parent::__construct("Not enough characters", Undersized, $previous);
      }
}

class TooSmallStringException extends  InputException{
    public function __construct($min,$max,\Exception $previous = null) {
        parent::__construct("Value exceed the min/max limit ($min/$max)", TooSmallString, $previous);
    }
}

}
/** @} */ // end of group
?>