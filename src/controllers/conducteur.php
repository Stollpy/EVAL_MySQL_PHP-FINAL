<?php

$ConducteurModels = new ConducteurModels;
$conducteurs = $ConducteurModels->getConducteur();

if(isset($_POST['add'])){

    $firstname = htmlspecialchars($_POST['Prénom']);
    $lastname = htmlspecialchars($_POST['Nom']);

    $errors = $ConducteurModels->ValidForm($firstname, $lastname);
    if($errors === true){
        
        $ConducteurModels->insertConducteur($firstname, $lastname);

        $flashbag = new FlashBag;
        $flashbag->addFlashMessage('Conducteur ajouter à la liste !');
        header('Location: /' );
    }
}

$flashMessages = (new FlashBag())->FetchAllFlashMessages();
render('conducteur', [
    'conducteurs' => $conducteurs,
    'flashMessages' => $flashMessages,
]);