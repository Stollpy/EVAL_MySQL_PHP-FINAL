<?php

if(!empty($_GET['id']) && isset($_GET['id'])){
    $id= htmlspecialchars($_GET['id']);
    $VehiculeModels = new VehiculeModels;
    $Vehicule = $VehiculeModels->getVehiculeById($id);

    if(isset($_POST['add'])){
        $marque = htmlspecialchars($_POST['Marque']);
        $modele = htmlspecialchars($_POST['Modèle']);
        $couleur = htmlspecialchars($_POST['Couleur']);
        $imma = htmlspecialchars($_POST['Immatriculation']);

        $errors = $VehiculeModels->ValidForm($marque, $modele, $couleur, $imma);


        if($errors === true){

            // $id= htmlspecialchars($_GET['id']);

            $VehiculeModels->editVehicule($marque, $modele, $couleur, $imma, $id);

            $flashbag = new FlashBag;
            $flashbag->addFlashMessage('La fiche du véhicule à bien été modifié !');
            header('Location: /vehicule' );
        }
    }

}else{
    header('Location: /404');
}

render('edit_vehicule', [
    'Vehicule' => $Vehicule
]);