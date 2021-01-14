<?php

if(!empty($_GET['id']) && isset($_GET['id'])){

    $id = intval($_GET['id']);
    $ConducteurModels = new ConducteurModels;
    $Conducteur = $ConducteurModels->getConducteurById($id);

    if(isset($_POST['add'])){
        $firstname = htmlspecialchars($_POST['Prénom']);
        $lastname = htmlspecialchars($_POST['Nom']);

        $errors = $ConducteurModels->ValidForm($firstname, $lastname);
        if($errors === true){
            
            $ConducteurModels->editConducteur($firstname, $lastname, $id);

            $flashbag = new FlashBag;
            $flashbag->addFlashMessage('La fiche du conducteur à bien été modifié !');
            header('Location: /' );
        }
    }
    
}else{
    header('Location: /404');
}


render('edit_conducteur', [
    'Conducteur' => $Conducteur
    ]);