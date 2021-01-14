<?php

class Autoloader {

    static public function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static public function autoload($classname)
    {
        if(file_exists('../src/Core/'.$classname.'.php')){
            require '../src/Core/'.$classname.'.php';
        }
        else if(file_exists('../src/Models/'.$classname.'.php')){
            require '../src/Models/'.$classname.'.php';
        }
        else if(file_exists('../src/Services/'.$classname.'.php')){
            require '../src/Services/'.$classname.'.php';
        }
    }
}