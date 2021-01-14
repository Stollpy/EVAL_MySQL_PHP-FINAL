<?php
  
  
  /*************************************
     **** ENVOIE DU RENDU AU TEMPLATE ****
    *************************************/

    function render(string $template, array $value = [], string $baseTemplate = 'base')
    {

        extract($value);


        include '../template/'.$baseTemplate.'.phtml';

    }