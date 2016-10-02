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
namespace Field;

ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once("../cInput.php");

//--------------------------------------------------------
// Bool Format
//--------------------------------------------------------

require_once("../inputs/bool.php");

// Test 1
try{
  Bool::validate("1");
}
catch(\Exception $e){
  throw new \Exception("Failed test Bool 1");
}

// Test 2
try{
  Bool::validate("not a bool");
  throw new \Exception("Failed test Bool 2");
}
catch(\Exception $e){
  // OK
}

//--------------------------------------------------------
// Date Format
//--------------------------------------------------------

require_once("../inputs/date.php");

// Test 1
try{
  Date::validate("25/12/1983");
}
catch(\Exception $e){
  throw new \Exception("Failed test Date 1");
}

// Test 2
try{
  Date::validate("1983/25/12");
}
catch(\Exception $e){
  throw new \Exception("Failed test Date 2");
}

// Test 3
try{
  Date::validate("1983-25-12");
}
catch(\Exception $e){
  throw new \Exception("Failed test Date 3");
}

//--------------------------------------------------------
// Date Time Format
//--------------------------------------------------------

require_once("../inputs/datetime.php");

// Test 1
try{
  DateTime::validate("25/12/1983 03:15:14");
}
catch(\Exception $e){
  throw new \Exception("Failed test DateTime 1");
}

// Test 2
try{
  DateTime::validate("1983/25/12 03:15:14");
}
catch(\Exception $e){
  throw new \Exception("Failed test DateTime 2");
}

// Test 3
try{
  DateTime::validate("1983-25-12 03 15 14");
}
catch(\Exception $e){
  throw new \Exception("Failed test DateTime 3");
}

//--------------------------------------------------------
// Evaluation String Format
//--------------------------------------------------------

require_once("../inputs/evalstring.php");

// Test 1
try{
  EvalString::validate("1*2");
}
catch(\Exception $e){
  throw new \Exception("Failed test Evaluation String 1");
}

// Test 2
try{
  EvalString::validate("2+2");
  throw new \Exception("Failed test Evaluation String 2");
}
catch(\Exception $e){
}

//--------------------------------------------------------
// Factor Format
//--------------------------------------------------------

require_once("../inputs/evalstring.php");

// Test 1
try{
  EvalString::validate("0.1254");
}
catch(\Exception $e){
  throw new \Exception("Failed test Factor 1");
}

// Test 2
try{
  EvalString::validate("0,14");
}
catch(\Exception $e){
  throw new \Exception("Failed test Factor 2");
}

// Test 3
try{
  EvalString::validate("0");
}
catch(\Exception $e){
  throw new \Exception("Failed test Factor 3");
}

// Test 4
try{
  EvalString::validate("1");
}
catch(\Exception $e){
  throw new \Exception("Failed test Factor 4");
}

// Test 5
try{
  EvalString::validate("-1");
  throw new \Exception("Failed test Factor 5");
}
catch(\Exception $e){
}

// Test 6
try{
  EvalString::validate("2.45");
  throw new \Exception("Failed test Factor 6");
}
catch(\Exception $e){
}

//--------------------------------------------------------
// WindowsFileName Format
//--------------------------------------------------------

require_once("../inputs/filename.php");

// Test 1
try{
  WindowsFileName::validate("correct file name.txt");
}
catch(\Exception $e){
  throw new \Exception("Failed test WindowsFileName 1");
}

// Test 2
try{
  WindowsFileName::validate("invalid[file name].txt");
  throw new \Exception("Failed test WindowsFileName 2");
}
catch(\Exception $e){
}

//--------------------------------------------------------
// UNIXFileName Format
//--------------------------------------------------------

require_once("../inputs/filename.php");

// Test 1
try{
  UNIXFileName::validate("correct file name.txt");
}
catch(\Exception $e){
  throw new \Exception("Failed test UNIXFileName 1");
}

// Test 2
try{
  UNIXFileName::validate("invalid[file name].txt");
  throw new \Exception("Failed test UNIXFileName 2");
}
catch(\Exception $e){
}

//--------------------------------------------------------
// Float Format
//--------------------------------------------------------

require_once("../inputs/float.php");

// Test 1
try{
  Float::validate("1.254");
}
catch(\Exception $e){
  throw new \Exception("Failed test Float 1");
}

// Test 2
try{
  Float::validate("3");
}
catch(\Exception $e){
  throw new \Exception("Failed test Float 2");
}

// Test 3
try{
  Float::validate("-458");
}
catch(\Exception $e){
  throw new \Exception("Failed test Float 3");
}

// Test 4
try{
  Float::validate("-74.147");
}
catch(\Exception $e){
  throw new \Exception("Failed test Float 4");
}

//--------------------------------------------------------
// Identifier Format
//--------------------------------------------------------

require_once("../inputs/identifier.php");

// Test 1
try{
  Identifier::validate("valid_id");
}
catch(\Exception $e){
  throw new \Exception("Failed test Identifier 1");
}

// Test 2
try{
  Identifier::validate("invalid id");
  throw new \Exception("Failed test Identifier 2");
}
catch(\Exception $e){
}

// Test 3
try{
  Identifier::validate("4_not_start_number");
  throw new \Exception("Failed test Identifier 3");
}
catch(\Exception $e){
}

//--------------------------------------------------------
// Integer Format
//--------------------------------------------------------

require_once("../inputs/integer.php");

// Test 1
try{
  Integer::validate("145");
}
catch(\Exception $e){
  throw new \Exception("Failed test Integer 1");
}

// Test 2
try{
  Integer::validate("-624");
}
catch(\Exception $e){
  throw new \Exception("Failed test Integer 2");
}

// Test 3
try{
  Integer::validate("42.35");
  throw new \Exception("Failed test Integer 3");
}
catch(\Exception $e){
}


//--------------------------------------------------------
// IPv4 Format
//--------------------------------------------------------

require_once("../inputs/ip.php");

// Test 1
try{
  IPv4::validate("145.124.123.255");
}
catch(\Exception $e){
  throw new \Exception("Failed test IPv4 1");
}

// Test 2
try{
  IPv4::validate("145.124.123.358.325");
  throw new \Exception("Failed test IPv4 2");
}
catch(\Exception $e){
}

// Test 3
try{
  IPv4::validate("546.213.253.325");
  throw new \Exception("Failed test IPv4 3");
}
catch(\Exception $e){
}

//--------------------------------------------------------
// Mail Format
//--------------------------------------------------------

require_once("../inputs/mail.php");

// Test 1
try{
  Mail::validate("noname@domain.com");
}
catch(\Exception $e){
  throw new \Exception("Failed test IPv4 1");
}

// Test 2
try{
  Mail::validate("no.point@domain.do");
  throw new \Exception("Failed test IPv4 2");
}
catch(\Exception $e){
}


//--------------------------------------------------------
// Mime Format
//--------------------------------------------------------

require_once("../inputs/mime.php");

// Test 1
try{
  Mime::validate("text/html");
}
catch(\Exception $e){
  throw new \Exception("Failed test Mime 1");
}

// Test 2
try{
  Mime::validate('text\html');
  throw new \Exception("Failed test Mime 2");
}
catch(\Exception $e){
}


//--------------------------------------------------------
// Name Format
//--------------------------------------------------------

require_once("../inputs/name.php");

// Test 1
try{
  Name::validate("valid.name");
}
catch(\Exception $e){
  throw new \Exception("Failed test Name 1");
}

// Test 2
try{
  Name::validate("invalid name");
  throw new \Exception("Failed test Name 2");
}
catch(\Exception $e){
}

// Test 3
try{
  Name::validate("4_number_ok");
}
catch(\Exception $e){
  throw new \Exception("Failed test Name 3");
}

//--------------------------------------------------------
// Numeric Format
//--------------------------------------------------------

require_once("../inputs/numeric.php");

// Test 1
try{
  Numeric::validate("12325");
}
catch(\Exception $e){
  throw new \Exception("Failed test Numeric 1");
}

// Test 2
try{
  Numeric::validate("12.35");
}
catch(\Exception $e){
  throw new \Exception("Failed test Numeric 2");
}

// Test 3
try{
  Numeric::validate("0");
}
catch(\Exception $e){
  throw new \Exception("Failed test Numeric 3");
}

//--------------------------------------------------------
// Password Format
//--------------------------------------------------------

require_once("../inputs/password.php");

// Test 1
try{
  Password::validate("small");
  throw new \Exception("Failed test Password 1");
}
catch(\Exception $e){
}

// Test 2
try{
  Password::validate('valide_pass#word');
}
catch(\Exception $e){
  throw new \Exception("Failed test Password 2");
}

//--------------------------------------------------------
// String Format
//--------------------------------------------------------

require_once("../inputs/string.php");

// Test 1
try{
  String::validate("  ");
  throw new \Exception("Failed test String 1");
}
catch(\Exception $e){
}

// Test 2
try{
  String::validate('valide_pass#word');
}
catch(\Exception $e){
  throw new \Exception("Failed test String 2");
}

//--------------------------------------------------------
// Text Format
//--------------------------------------------------------

require_once("../inputs/text.php");

// Test 1
try{
  Text::validate("  ");
  throw new \Exception("Failed test Text 1");
}
catch(\Exception $e){
}

// Test 2
try{
  Text::validate('valide_pass#word');
}
catch(\Exception $e){
  throw new \Exception("Failed test Text 2");
}

//--------------------------------------------------------
// End
//--------------------------------------------------------

echo "All Tests Successful";

?>