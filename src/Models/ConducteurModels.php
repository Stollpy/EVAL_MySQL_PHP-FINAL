<?php

class ConducteurModels extends AbstractModel{

    /*****************************************
    ***** REQUETE DE SELETION CONDUCTEUR *****
    ******************************************/
    public function getConducteur()
    {
        $sql = "SELECT * FROM conducteur";

        return $this->database->selectAll($sql);
    }

     /*****************************************
    *****  Vérification de champ saisie  *****
    ******************************************/
    public function ValidForm(string $firstname, string $lastname)
    {
        if(empty($firstname) || empty($lastname)){
            return false;
        }
        return true;
    }

     /******************************************************
    *****  Insertion de champ dans la table conducteur  *****
    *********************************************************/
    public function insertConducteur(string $firstname, string $lastname)
    {
        $sql='INSERT INTO conducteur(prenom, nom)
        VALUE (?, ?)';
        $this->database->prepareAndExecuteQuery($sql, [$firstname, $lastname]);
    }

     /***********************************************
    *****  Supprimer un conducteur de la liste  *****
    *************************************************/

    public function removeConducteur(int $id){

        $sql='DELETE FROM conducteur
            WHERE id_conducteur = ?';

        $this->database->prepareAndExecuteQuery($sql,[$id]);
    }

    /*************************************************
    *****  Sélectionner un conducteur via son id *****
    **************************************************/

    public function getConducteurById(int $id){
        $sql='SELECT prenom, nom 
        FROM conducteur
        WHERE id_conducteur = ?';

        return $this->database->selectOne($sql,[$id]);
    }

    /*********************************
    *****  Rediter un conducteur *****
    **********************************/

    public function editConducteur(string $firstname, string $lastname, int $id){

        $sql ='UPDATE conducteur
        SET prenom = ?, nom = ?
        WHERE id_conducteur = ?';

        return $this->database->prepareAndExecuteQuery($sql,[$firstname, $lastname, $id]);
    }

    /*****************************************************
    *****  Sélectionner les conducteur sans véhicules *****
    *******************************************************/

    public function getConducteurNot(){
        $sql =  "SELECT * FROM conducteur
                LEFT JOIN association_vehicule_conducteur 
                ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
               WHERE id_véhicule IS NULL";

        return $this->database->selectAll($sql);
    }

    /*****************************************************
    *****  Sélectionner les conducteur sans véhicules *****
    *******************************************************/

    public function getConducteurAsso(){
        $sql =  "SELECT * FROM conducteur
                LEFT JOIN association_vehicule_conducteur 
                ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur";

        return $this->database->selectAll($sql);
    }
    
}