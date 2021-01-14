<?php

// Tout les conducteur
$ConducteurModels = new ConducteurModels;
$Conducteurs = $ConducteurModels->getConducteur();

// Tout les véihucles
$VehiculeModels = new VehiculeModels;
$Vehicules = $VehiculeModels->getVehicule();

// Toutes les associations
$AssociationModels = new AssociationModels;
$Associations = $AssociationModels->getAssociation();

// Calcul de nombre de ligne retourné
$NbConducteur = count($Conducteurs);
$NbVehicule = count($Vehicules);
$NbAssociations = count($Associations);

// Véhicule sans conducteur
$VéhiculeNots = $VehiculeModels->getVehiculeNot();

// COnducteur sans voiture
$ConducteurNots = $ConducteurModels->getConducteurNot();

// Voiture conduit par phillipe
$VéhiculesPhillipes = $VehiculeModels->getVehiculePhillipe();

// Tout conducteur même sans voiture
$AllConducteur = $ConducteurModels->getConducteurAsso();



render('rendu', [
    'NbConducteur' => $NbConducteur,
    'NbVehicule' => $NbVehicule,
    'NbAssociations' => $NbAssociations,
    'VéhiculeNots' => $VéhiculeNots,
    'ConducteurNots' => $ConducteurNots,
    'VéhiculesPhillipes' => $VéhiculesPhillipes,
    'AllConducteur' => $AllConducteur
    ]);


