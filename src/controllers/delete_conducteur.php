<?php

if(!empty($_GET['id']) && isset($_GET['id'])){

    $id = intval($_GET['id']);

    $ConducteurModels = new ConducteurModels;
    $ConducteurModels->removeconducteur($id);
    
    $flashbag = new FlashBag;
    $flashbag->addFlashMessage('Conducteur supprimé de la liste !');
    header('Location: /' );

}else{
    header('Location: /404');
}


