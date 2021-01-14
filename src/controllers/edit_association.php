<?php

if(!empty($_GET['id']) && isset($_GET['id'])){

    $id = intval($_GET['id']);
    $AssociationModels = new AssociationModels;
    $Association = $AssociationModels->getAssociationById($id);

        $ConducteurModels = new ConducteurModels();
        $Conducteurs = $ConducteurModels->getConducteur();

        $VehiculeModels = new VehiculeModels;
        $Vehicules = $VehiculeModels->getVehicule();

    if(isset($_POST['add'])){
        $idVehicule = intval($_POST['Véhicule']);
        $idConducteur = intval($_POST['Conducteur']);

        $errors = $AssociationModels->ValidForm($idVehicule, $idConducteur);
        if($errors === true){
            
            $AssociationModels->editAssociation($idVehicule, $idConducteur, $id);

            $flashbag = new FlashBag;
            $flashbag->addFlashMessage('La fiche de l\'association à bien été modifié !');
            header('Location: /association' );
        }
    }
    
}


render('edit_association', [
    'Association' => $Association,
    'Conducteurs' => $Conducteurs,
    'Vehicules' => $Vehicules
    ]);