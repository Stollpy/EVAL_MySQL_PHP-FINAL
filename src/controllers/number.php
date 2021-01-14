<?php

$ConducteurModels = new ConducteurModels;
$Conducteurs = $ConducteurModels->getConducteur();

$VehiculeModels = new VehiculeModels;
$Vehicules = $VehiculeModels->getVehicule();

$AssociationModels = new AssociationModels;
$Associations = $AssociationModels->getAssociation();


$NbConducteur = count($Conducteurs);
$NbVehicule = count($Vehicules);
$NbAssociations = count($Associations);


render('number', [
    'NbConducteur' => $NbConducteur,
    'NbVehicule' => $NbVehicule,
    'NbAssociations' => $NbAssociations
    ]);


