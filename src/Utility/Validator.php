<?php

namespace BITM\SEIP12\Utility;

class Validator{

    static public function url(){

        return true;

    }
    static public function empty($var){

<<<<<<< HEAD
        return empty($var)? true:false;

=======
        return empty($var)?true:false;
>>>>>>> dbe0e18b85b63341776d76db08af92368e373228

    }

    static public function email(){
        
        return true;
    }

    static public function validate($var){
        
        return true;
    }


}