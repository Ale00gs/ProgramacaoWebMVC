<?php

class Database {
    // private $host = 'localhost';
    // private $userName = 'root';
    // private $password = '';
    // private $databaseName = 'casas';

    private $connection;
    function __construct($host, $databaseName, $userName, $password)
    {

        try
        {
              $this->connection = new PDO("mysql:host={$host};databaseName={$databaseName}",$userName,$password); 
              $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $message)
        {
            die("Error message: ".$message->getMessage());
        }

    }

    public function prepare($query)
    {
        return $this->connection->prepare($query);
    }

    public function selectSQL($query, $params = array())
{
    try
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    catch (PDOException $message)
    {
        die("Error message: " . $message->getMessage());
    }
}

    public function executeCommands($SQLcommand)
    {

        try
        {
            $access = $this->connection->query($SQLcommand);
            $access->execute();
            return true;
        }
        catch (PDOException $message)
        {
            die("Error message: ".$message->getMessage());
        }

    }
}

// CREATE DATABASE casas;
// USE casas;
// CREATE TABLE casas (
//     cas_cod INT PRIMARY KEY AUTO_INCREMENT,
//     cas_descricao VARCHAR(30),
//     cas_endereco VARCHAR(30),
//     cas_cidade VARCHAR(30),
//     cas_proprietario VARCHAR(30)
// );
?>