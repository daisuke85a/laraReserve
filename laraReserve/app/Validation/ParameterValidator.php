<?php namespace App\Validation;


class ParameterValidator{
    public function validateNoControlCharacters($attribute, $value, $parameters){
        if(mb_ereg('\A[[:^cntrl:]]*\z',$value)){
            return true;
        }

        return false;
    }

    public function validateNoControlCharactersWithoutCRLF($attribute, $value, $parameters){

        $temp = preg_replace("/\n|\r\n|\r/", '', $value); // The line feed and carriage return delete.

        if(mb_ereg('\A[[:^cntrl:]]*\z',$temp)){
            return true;
        }

        return false;
    }

}
