<?php
/**
 * Created by PhpStorm.
 * User: LEONARDO TI
 * Date: 30/03/2017
 * Time: 18:38
 */
namespace src;

use PDO;


class Conecta{
    protected $file_db;

    public function __construct()
    {

        /**************************************
         * Create databases and                *
         * open connections                    *
         **************************************/

        // Create (connect to) SQLite database in file
        $this->file_db = new PDO('sqlite:clientes.sqlite3');
        // Set errormode to exceptions
        $this->file_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        // Create new database in memory
        $this->memory_db = new PDO('sqlite::memory:');
        // Set errormode to exceptions
        $this->memory_db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);


        /**************************************
         * Create tables                       *
         **************************************/

        // Create table messages
        $this->file_db->exec("CREATE TABLE IF NOT EXISTS clientes (
                        id INTEGER PRIMARY KEY,
                        nome TEXT,
                        tipo TEXT,
                        importancia INTEGER,
                        cpf_cnpj INTEGER,
                        endereco TEXT
                        )");

        // Create table messages with different time format
        $this->memory_db->exec("CREATE TABLE  clientes (
                        id INTEGER PRIMARY KEY,
                        nome TEXT,
                        tipo TEXT,
                        importancia INTEGER,
                        cpf_cnpj INTEGER,
                        endereco TEXT
                        )");


        /**************************************
         * Set initial data                    *
         **************************************/


        //Pessoa Fisica
        $clientes[1] = array("name" => "Paulo","cpf_cnpj" => 19846515581,"endereco" => "Rua dghdsgr","pessoa" => "fisica","importancia" => "3");
        $clientes[2] = array("name" => "João Baptista","cpf_cnpj" => 9874654845,"endereco" => "Rua sdfsafe","pessoa" => "fisica","importancia" => "4");
        $clientes[3] = array("name" => "Maria Madelena","cpf_cnpj" => 85789723132,"endereco" => "Rua sdfsdgs","pessoa" => "fisica","importancia" => "1");
        $clientes[4] = array("name" => "Pedro","cpf_cnpj" => 349874646525,"endereco" => "Rua asfgsdfwe","pessoa" => "fisica","importancia" => "5");
        $clientes[5] = array("name" => "Aristóteles","cpf_cnpj" => 6548794664251,"endereco" => "Rua gfsdafe","pessoa" => "fisica","importancia" => "5");
        $clientes[6] = array("name" => "José","cpf_cnpj" => 4579645465,"endereco" => "Rua hasdfsadf","pessoa" => "fisica","importancia" => "1");
        $clientes[7] = array("name" => "Manoela","cpf_cnpj" => 87764654684,"endereco" => "Rua ae4rfsdgs","pessoa" => "fisica","importancia" => "2");
        $clientes[8] = array("name" => "João","cpf_cnpj" => 549879485165,"endereco" => "Rua asgwesdafsda","pessoa" => "fisica","importancia" => "5");
        $clientes[9] = array("name" => "Francisco","cpf_cnpj" => 68498484575,"endereco" => "Rua astwefeszgse","pessoa" => "fisica","importancia" => "3");
        //Pessoa Jurídica
        $clientes[10] = array("name" => "Mercearia Curió","cpf_cnpj" => 25488794648,"endereco" => "Rua jghbhsdfuuerklklçda","pessoa" => "juridica","importancia" => "4");
        $clientes[11] = array("name" => "Padaria do Adão","cpf_cnpj" => 25488794648,"endereco" => "Rua jghbhsdfuuerklklçda","pessoa" => "juridica","importancia" => "5");
        $clientes[12] = array("name" => "Mercado Lala","cpf_cnpj" => 25488794648,"endereco" => "Rua jghbhsdfuuerklklçda","pessoa" => "juridica","importancia" => "2");
        $clientes[13] = array("name" => "Loja da Eva","cpf_cnpj" => 25488794648,"endereco" => "Rua gsfsdafsdafasfas","pessoa" => "juridica","importancia" => "3");
        $clientes[14] = array("name" => "Agropecuaria de Enoque","cpf_cnpj" => 25488794648,"endereco" => "Rua da transladação","pessoa" => "juridica","importancia" => "5");
        $clientes[15] = array("name" => "Saleiro do Paulo","cpf_cnpj" => 25488794648,"endereco" => "Rua Peru de Lima","pessoa" => "juridica","importancia" => "1");

        /**************************************
         * Play with databases and tables      *
         **************************************/



        // Prepare INSERT statement to SQLite3 file db
        $insert = "INSERT INTO clientes (id, nome, tipo,importancia,cpf_cnpj,endereco)
                    VALUES (:id, :nome, :tipo, :importancia, :cpf_cnpj, :endereco)";
        $stmt = $this->file_db->prepare($insert);

        // Bind parameters to statement variables
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':importancia', $importancia);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam(':endereco', $endereco);

        // Loop thru all messages and execute prepared insert statement
        foreach ($clientes as $ids => $value) {
            // Set values to bound variables
            $id = $ids;
            $nome = $value['name'];
            $tipo = $value['pessoa'];
            $importancia = $value['importancia'];
            $cpf_cnpj = $value['cpf_cnpj'];
            $endereco = $value['endereco'];

            // Execute statement
            //$stmt->execute();
        }

        // Prepare INSERT statement to SQLite3 memory db
        $insert = "INSERT INTO clientes (id, nome, tipo,importancia,cpf_cnpj,endereco) 
                    VALUES (:id, :nome, :tipo, :importancia, :cpf_cnpj, :endereco)";
        $stmt = $this->memory_db->prepare($insert);
    }

}