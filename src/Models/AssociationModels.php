<?php

class AssociationModels extends AbstractModel{

    /*****************************************
    ***** REQUETE DE SELETION ASSOCIATION *****
    ******************************************/
    public function getAssociation()
    {
        $sql = "SELECT *, conducteur.prenom, conducteur.nom, vehicule.marque, vehicule.modele
        FROM association_vehicule_conducteur AS assos
        INNER JOIN conducteur ON assos.id_conducteur = conducteur.id_conducteur
        INNER JOIN vehicule ON assos.id_véhicule = vehicule.id_vehicule";

        return $this->database->selectAll($sql);
    }

     /*****************************************
    *****  Vérification de champ saisie  *****
    ******************************************/
    public function ValidForm(int $idVehicule, int $idConducteur)
    {
        if(empty($idVehicule) || empty($idConducteur)){
            return false;
        }
        return true;
    }

     /******************************************************
    *****  Insertion de champ dans la table conducteur  *****
    *********************************************************/
    public function insertAssociation(int $idVehicule, int $idConducteur)
    {
        $sql='INSERT INTO association_vehicule_conducteur(id_véhicule, id_conducteur)
        VALUE (?, ?)';
        $this->database->prepareAndExecuteQuery($sql, [$idVehicule, $idConducteur]);
    }

     /***********************************************
    *****  Supprimer un conducteur de la liste  *****
    *************************************************/

    public function removeAssociation(int $id){

        $sql='DELETE FROM association_vehicule_conducteur
            WHERE id_association = ?';

        $this->database->prepareAndExecuteQuery($sql,[$id]);
    }

    /*************************************************
    *****  Sélectionner un conducteur via son id *****
    **************************************************/

    public function getAssociationById(int $id){
        $sql = "SELECT *, conducteur.prenom, conducteur.nom, vehicule.marque, vehicule.modele
        FROM association_vehicule_conducteur AS assos
        INNER JOIN conducteur ON assos.id_conducteur = conducteur.id_conducteur
        INNER JOIN vehicule ON assos.id_véhicule = vehicule.id_vehicule
        WHERE id_association = ?";

        return $this->database->selectOne($sql,[$id]);
    }

    /*********************************
    *****  Rediter un conducteur *****
    **********************************/

    public function editAssociation(int $idVehicule, int $idConducteur, int $id){

        $sql ='UPDATE association_vehicule_conducteur
        SET id_véhicule = ?, id_conducteur = ?
        WHERE id_association = ?';

        return $this->database->prepareAndExecuteQuery($sql,[$idVehicule, $idConducteur, $id]);
    }
}
