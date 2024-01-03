<?php
class Casas_Model
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllCasas()
    {
        try {
            $query = "SELECT * FROM casas";
            $resultados = $this->db->selectSQL($query);

            if (!empty($resultados)) {
                return $resultados;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            throw new Exception("Erro ao obter todas as casas: " . $e->getMessage());
        }
    }

    public function getCasaById($cas_cod)
    {
        try {
            $query = "SELECT * FROM casas WHERE cas_cod = ?";
            $params = array($cas_cod);

            $resultados = $this->db->selectSQL($query, $params);

            if (!empty($resultados)) {
                return $resultados[0];
            } else {
                throw new Exception("Casa não encontrada para o ID: " . $cas_cod);
            }
        } catch (PDOException $e) {
            throw new Exception("Erro ao obter casa por ID: " . $e->getMessage());
        }
    }

    public function insertCasa($descricao, $endereco, $cidade, $proprietario)
    {
        try {
            $query = "INSERT INTO casas (cas_descricao, cas_endereco, cas_cidade, cas_proprietario) VALUES (:cas_descricao, :cas_endereco, :cas_cidade, :cas_proprietario)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':cas_descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':cas_endereco', $endereco, PDO::PARAM_STR);
            $stmt->bindParam(':cas_cidade', $cidade, PDO::PARAM_STR);
            $stmt->bindParam(':cas_proprietario', $proprietario, PDO::PARAM_STR);
            $stmt->execute();

            echo "Inserção bem-sucedida!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        //return $this->db->executeCommands($query);
    }

    public function updateCasa($cas_cod, $descricao, $endereco, $cidade, $proprietario)
    {
        try {
            $query = "UPDATE casas SET cas_descricao = :cas_descricao, cas_endereco = :cas_endereco, cas_cidade = :cas_cidade, cas_proprietario = :cas_proprietario WHERE cas_cod = :cas_cod";

            // Chama prepare() diretamente na conexão PDO
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':cas_descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':cas_endereco', $endereco, PDO::PARAM_STR);
            $stmt->bindParam(':cas_cidade', $cidade, PDO::PARAM_STR);
            $stmt->bindParam(':cas_proprietario', $proprietario, PDO::PARAM_STR);
            $stmt->bindParam(':cas_cod', $cas_cod, PDO::PARAM_INT);

            $stmt->execute();
            var_dump($stmt);

            echo "Atualização bem-sucedida!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function deleteCasa($cas_cod)
    {
        try {
            $query = "DELETE FROM casas WHERE cas_cod = :cas_cod";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':cas_cod', $cas_cod, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            throw new Exception("Erro ao deletar casa. Consulta: " . $query . " Erro: " . $stmt->errorInfo()[2]);

        }
    }
}
?>