<?php

/*
  ------------------------------------------------------------------------------
  (C)2013 Thomas AUGUEY <contact@aceteam.org>
  ------------------------------------------------------------------------------
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
  ------------------------------------------------------------------------------
 */

namespace Field{

require_once("../cInput.php");


/**
 * @brief Entier numérique 32bits signée
 * @copydoc cInput
 */
class Integer extends cInput {

    public static function validate($value) {
        // vide ?
        if (cInput::empty_string($value))
            throw new EmptyTextException();

        // vérifie le nombre de caractères min
        if (Integer::getMinLength() && strlen($value) < Integer::getMinLength())
            throw new UndersizedException();

        // vérifie le nombre de caractères max
        if (Integer::getMaxLength() && strlen($value) > Integer::getMaxLength())
            throw new OversizedException();

        // vérifie le rang de valeur
        if (intval($value) < Integer::min() || intval($value) > Integer::max())
            throw new InvalidRangeException();

        // vérifie le format
        if (preg_match("/^" . Integer::regExp() . "$/", $value) == 0)
            throw new InvalidCharException();
    }

    public static function toObject($string) {
        return intval($string);
    }

    public static function regExp() {
        return '\-?(?:0|[1-9]{1}[0-9]*)';
    }

    public static function getMaxLength() {
        return 11;
    }

    public static function getMinLength() {
        return 1;
    }

    public static function min() {
        return -2147483648; //2^31
    }

    public static function max() {
        return 2147483647; //2^31-1
    }

}

}
?>