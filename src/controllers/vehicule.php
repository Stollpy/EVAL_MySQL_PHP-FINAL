<?php
$VehiculeModels = new VehiculeModels;
$vehicules = $VehiculeModels->getVehicule();

if(isset($_POST['add'])){
    $marque = htmlspecialchars($_POST['Marque']);
    $modele = htmlspecialchars($_POST['Modèle']);
    $couleur = htmlspecialchars($_POST['Couleur']);
    $imma = htmlspecialchars($_POST['Immatriculation']);

    $errors = $VehiculeModels->ValidForm($marque, $modele, $couleur, $imma);
    
    if($errors === true){
        
        $VehiculeModels->insertVehicule($marque, $modele, $couleur, $imma);

        $flashbag = new FlashBag;
        $flashbag->addFlashMessage('Véhicule ajouter à la liste !');
        header('Location: /vehicule' );
    }
}

$flashMessages = (new FlashBag())->FetchAllFlashMessages();

render('vehicule', [
    'vehicules' => $vehicules,
    'flashMessages' => $flashMessages
]);