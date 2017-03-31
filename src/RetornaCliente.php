<?php
/**
 * Created by PhpStorm.
 * User: LEONARDO TI
 * Date: 31/03/2017
 * Time: 10:13
 */

namespace src;


use PDOException;

class RetornaCliente extends Conecta
{
    public function getClientes(){
        try {
            $sql = 'SELECT * FROM clientes';
            $stmt= $this->file_db->query($sql); // updated

            if(!$stmt){
                throw new PDOException('Error displaying fruits');
            }
            $data = $stmt->fetchAll(); // updated
            return $data;
        }
        catch (PDOException $e){
            echo 'Error\n';
            echo $e->getMessage(); // updated
        }
    }
}