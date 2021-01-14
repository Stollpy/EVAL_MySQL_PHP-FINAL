<?php

$AssociationModels = new AssociationModels;
$Associations = $AssociationModels->getAssociation();

$ConducteurModels = new ConducteurModels();
$Conducteurs = $ConducteurModels->getConducteur();

$VehiculeModels = new VehiculeModels;
$Vehicules = $VehiculeModels->getVehicule();

if(isset($_POST['add'])){
    $idVehicule = intval($_POST['Véhicule']);
    $idConducteur = intval($_POST['Conducteur']);

    $errors = $AssociationModels->ValidForm($idVehicule, $idConducteur);

    if($errors === true){

        $AssociationModels->insertAssociation($idVehicule, $idConducteur);
        
        $flashbag = new FlashBag;
        $flashbag->addFlashMessage('Association ajouter à la liste !');
        header('Location: /association' );
    }
}



render('association', [
    'Associations' => $Associations,
    'Conducteurs' => $Conducteurs,
    'Vehicules' => $Vehicules
]);
