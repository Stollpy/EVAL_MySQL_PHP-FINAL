<?php

if(!empty($_GET['id']) && isset($_GET['id'])){
   
    $id = htmlspecialchars($_GET['id']);

    $VehiculeModels = new VehiculeModels;
    $VehiculeModels->removeVehicule($id);

    $flashbag = new FlashBag;
    $flashbag->addFlashMessage('Veéicule supprimé de la liste !');
    header('Location: /vehicule' );
}else{
        header('Location: /404');
    }
