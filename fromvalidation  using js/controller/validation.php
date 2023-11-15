<?php
function isValidName($name){
    if(strlen($name) < 5){
        return false;
    }
    else{
        $allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_ ';
        for($i=0; $i < strlen($name); $i++){
            $character = $name[$i];
            if(strpos($allowedCharacters, $character) === false ){
                return false;
            }
        }
        return true;
    }
}


function isValidUsername($username)
{
    $allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_';

    if(strlen($username) < 4) return false;

    for ($i = 0; $i < strlen($username); $i++) {
        $character = $username[$i];

        if (strpos($allowedCharacters, $character) === false) {
            return false;
        }
    }

    return true;
}
function isValidID($id) {
   
    return is_numeric($id);
}
function isValidEmail($email)
{
    $atIndex = strpos($email, '@');
    $dotIndex = strrpos($email, '.');

    if ($atIndex === false || $dotIndex === false) {
        return false;
    }
    if ($atIndex === 0 || $dotIndex === (strlen($email) - 1)) {
        return false;
    }

    if (strpos($email, '..') !== false) {
        return false;
    }

    if (strpos($email, '.@') !== false) {
        return false;
    }

    if (strpos($email, '@.') !== false) {
        return false;
    }
    if (strpos($email, '.com') == false) {
        return false;
    }

    if (strpos($email, ' ') !== false) {
        return false;
    }

    return true;
}
function isValidPhone($mobile){
if(strlen($mobile)!=11) return false;
$allowedCharacters = '0123456789';

for ($i = 0; $i < strlen($mobile); $i++) {
    $character = $mobile[$i];

    if (strpos($allowedCharacters, $character) === false) {
        return false;
    }
}

return true;
}

function isValidPassword($password) {
    if (strlen($password) < 5) {
        return false;
    } else {
        $allowedCharactersSpecial = '.,!@#$%^&*|:;';
        $allowedCharactersCapitalLetter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $allowedCharactersSmallLetter = 'abcdefghijklmnopqrstuvwxyz';
        $allowedCharactersNumber = '0123456789';
        $countSpCharacter = 0;
        $countCapLetter = 0;
        $countSmLetter = 0;
        $countNumber = 0;
        for ($i = 0; $i < strlen($password); $i++) {
            $character = $password[$i];
            if (strpos($allowedCharactersSpecial, $character) !== false) {
                $countSpCharacter = 1;
            }
            if (strpos($allowedCharactersCapitalLetter, $character) !== false) {
                $countCapLetter = 1;
            }
            if (strpos($allowedCharactersSmallLetter, $character) !== false) {
                $countSmLetter = 1;
            }
            if (strpos($allowedCharactersNumber, $character) !== false) {
                $countNumber = 1;
            }
        }
        if ($countSpCharacter === 0 || $countCapLetter === 0 || $countSmLetter === 0 || $countNumber === 0) {
            return false;
        }
        return true;
    }
}
function isValidConfirmPassword($password,$confirmPassword){
    if($password===$confirmPassword){
        return true;
    }
    return false;
}
function isValidGender($gender) {
    $allowedGenders = array('Male', 'Female', 'Other');

    // Check if the provided gender is in the allowed list
    return in_array($gender, $allowedGenders);
}

?> 