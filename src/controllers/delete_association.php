<?php


if(!empty($_GET['id']) && isset($_GET['id'])){

    $id = intval($_GET['id']);

    $AssociationModels = new AssociationModels;
    $AssociationModels->removeAssociation($id);
    
    $flashbag = new FlashBag;
    $flashbag->addFlashMessage('L\'association à bien été supprimé de la liste !');
    header('Location: /association' );

}else{
    header('Location: /404');
}