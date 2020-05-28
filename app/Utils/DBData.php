<?php
class DBData {

    private $pdo;

    /**
     *  Connexion à la base de données
     */
    public function __construct() {

        $configData = parse_ini_file(__DIR__.'/../config.conf');

        try {
            $this->pdo = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    public function getPokemon() {

        $sql = "SELECT *
                FROM `pokemon`";

        $pdoStatement = $this->pdo->query($sql);

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Pokemon');
    }

    public function getType() {

        $sql = "SELECT *
                FROM `type`";

        $pdoStatement = $this->pdo->query($sql);

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Type');
    }

    public function getPokemonByNumber($number) {

        $sql = "SELECT *
                FROM pokemon
                WHERE numero = {$number};";

        $pdoStatement = $this->pdo->query($sql);

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Pokemon');
    }

    public function getTypeById($type_id) {

        $sql = "SELECT type.*, pokemon_type.pokemon_numero, pokemon_type.type_id
                FROM pokemon_type
                INNER JOIN type ON type_id = type.id
                WHERE type.id = {$type_id};";

        $pdoStatement = $this->pdo->query($sql);

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS,'TypeByID');
    }

    public function getPokemonTypes($number) {

        $sql = "SELECT type.name, type.color, type.id
                FROM type
                INNER JOIN pokemon_type ON type.id = pokemon_type.type_id
                WHERE pokemon_numero = {$number};";
        

        $pdoStatement = $this->pdo->query($sql);

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS,'Type');
    }

    
}