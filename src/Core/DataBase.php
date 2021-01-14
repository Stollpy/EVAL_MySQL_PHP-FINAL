<?php
    
    require '../config.php';

class Database {
    
    private $pdo;

    public function __construct(){

        $this->pdo = $this->getPDOConnection();
    
    }

    /********************************
     **** CREATION CONNEXION PDO ****
    ********************************/

    public function getPDOConnection(){

       
        $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;

        
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        $pdo->exec('SET NAMES UTF8');

        return $pdo;
    }


    /*********************************************
     **** PREPARATION & EXECUTION REQUETE SQL ****
    *********************************************/

    function prepareAndExecuteQuery( string $sql, array $criteria = []):PDOStatement
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query;
    }


    function selectAll(string $sql, array $criteria = [])
    {
        $query = $this->prepareAndExecuteQuery($sql, $criteria);
        
        return $query->fetchAll();
    }

    function selectOne(string $sql, array $criteria = [])
    {
        $query = $this->prepareAndExecuteQuery($sql, $criteria);
        
        return $query->fetch();
    }
}