<?php

class FlashBag {

     /***********************************
     **** GESTION DES MESSAGE FLASH ****
    ************************************/
    
    public function __construct() {
        $this->initFlashBag();
    }



    function initFlashBag() {

        if(session_status() === PHP_SESSION_NONE){

            session_start();
        }
        if(!array_key_exists('flashbag', $_SESSION) || !isset($_SESSION['flashbag'])){
            $_SESSION['flashbag'] = [];
        }
    }




    function addFlashMessage(string $message){
        array_push($_SESSION['flashbag'], $message);
    }



    function FetchAllFlashMessages() : array {

        $flashMessages = $_SESSION['flashbag'];

        $_SESSION['flashbag'] = [];

        return $flashMessages;
    }



        // Determiner si il y'a un message en session
        function hasFlashMessage() : bool {

            return !empty($_SESSION['flashbag']);
    
        }
}