<?php

class VehiculeModels extends AbstractModel{
        /*****************************************
    ***** REQUETE DE SELETION VEHICULE *****
    ******************************************/
    public function getVehicule()
    {
        $sql = "SELECT * FROM vehicule";

        return $this->database->selectAll($sql);
    }

     /*****************************************
    *****  Vérification de champ saisie  *****
    ******************************************/
    public function ValidForm(string $marque, string $modele, string $couleur, string $imma)
    {
        if(empty($marque) || empty($modele) || empty($couleur) || empty($imma)){
            return false;
        }
        return true;
    }

     /******************************************************
    *****  Insertion de champ dans la table véhicule  *****
    *********************************************************/
    public function insertVehicule(string $marque, string $modele, string $couleur, string $imma)
    {
        $sql='INSERT INTO vehicule (marque, modele, couleur, immatriculation)
        VALUE (?, ?, ?, ?)';
        $this->database->prepareAndExecuteQuery($sql, [$marque, $modele, $couleur, $imma]);
    }

     /***********************************************
    *****  Supprimer un véhicule de la liste  *****
    *************************************************/

    public function removeVehicule(int $id){

        $sql='DELETE FROM vehicule
            WHERE id_vehicule = ?';

        $this->database->prepareAndExecuteQuery($sql,[$id]);
    }

    /*************************************************
    *****  Sélectionner un véhicule via son id *****
    **************************************************/

    public function getVehiculeById(int $id){
        $sql='SELECT * 
        FROM vehicule
        WHERE id_vehicule = ?';

        return $this->database->selectOne($sql,[$id]);
    }

    /*********************************
    *****  Rediter un véhicule *****
    **********************************/

    public function editVehicule(string $marque, string $modele, string $couleur, string $imma, int $id){

        $sql ='UPDATE vehicule
        SET marque = ?, modele = ?, couleur = ?, immatriculation = ?
        WHERE id_vehicule = ?';

        return $this->database->prepareAndExecuteQuery($sql,[$marque, $modele, $couleur, $imma, $id]);
    }

    /*****************************************************
    *****  Sélectionner les véhicules sans conducteur *****
    *******************************************************/

    public function getVehiculeNot(){
        $sql =  "SELECT * FROM vehicule
                LEFT JOIN association_vehicule_conducteur 
                ON vehicule.id_vehicule = association_vehicule_conducteur.id_véhicule
               WHERE id_conducteur IS NULL";

        return $this->database->selectAll($sql);
    }

     /*****************************************************
    *****  Sélectionner les véhicules conduit par Phillipe *****
    *******************************************************/

    public function getVehiculePhillipe(){
        $sql =  "SELECT * FROM vehicule
                LEFT JOIN association_vehicule_conducteur 
                ON vehicule.id_vehicule = association_vehicule_conducteur.id_véhicule
               WHERE id_conducteur = 3";

        return $this->database->selectAll($sql);
    }

    

    
}