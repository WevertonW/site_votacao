<?php

require_once('app/Database/ConexaoDB.php');

class ControllerUsuario
{
    public function createUsuario(Usuario $usuario)
    {
        try {
            $insertUsuario = "INSERT INTO usuario (nome, cpf, idade, voto) VALUES (:nome, :cpf, :idade, :voto)";
            $stmt = ConexaoDB::getConn()->prepare($insertUsuario);
            $stmt->bindValue(':nome', $usuario->getnome());
            $stmt->bindValue(':cpf', $usuario->getcpf());
            $stmt->bindValue(':idade', $usuario->getidade());
            $stmt->bindValue(':voto', $usuario->getvoto());
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function readUsuario()
    {
        try {
            $queryUsuario = "SELECT * FROM usuario";
            $stmt = ConexaoDB::getConn()->prepare($queryUsuario);
            $stmt->execute();

            if ($stmt->rowCount()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateUsuario(Usuario $usuario)
    {
    }

    public function deleteUsuario(int $id)
    {
    }
}
