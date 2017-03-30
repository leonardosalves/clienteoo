<?php
/**
 * Created by PhpStorm.
 * User: LEONARDO TI
 * Date: 28/03/2017
 * Time: 18:08
 */
# Autoload
define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

//Pessoa Física
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

$cliente = array();
foreach ($clientes as $id => $valor) {
    @$cliente[$id] = new \src\Client($id, $valor['name'], $valor['cpf_cnpj'], $valor['endereco'],$valor['pessoa'],$valor['importancia']);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<br />
<div class="conteiner">
    <div class="row col-md-2"></div>
    <div class="row col-md-8">
        <div class="page-header">
            <h1>Clientes</h1>
        </div>
        <table class="table table-striped table-hover" >
            <thead>
                <tr>
                    <th><a href="?order=<?php echo $ordem = (@$_GET['order'] == "0") ? "1" : "0"?>&id=<?php echo @$_GET['id']?>">ID</a></th>
                    <th><a href="#">Nome</a></th>
                    <th><a href="#">Tipo de Cliente</a></th>
                    <th><a href="#">Importancia</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['order'])) {
                    if ($_GET['order'] == 1) {
                        krsort( $cliente );
                    }
                }

                foreach ($cliente as $key => $value){
                ?>
                <tr <?php echo $active = (@$_GET['id']) ? "class='.active'" : ""?>>
                    <td><?php echo $value->getId();?></td>
                    <td id="<?php echo $value->getId();?>">
                        <a href="?id=<?php echo $value->getId();?>&order=<?php echo @$_GET['order']?>" class="ancor" ><?php  echo $value->getNome();?></a>
                        <?php
                        if(@$_GET['id'] == $value->getId()){ ?>
                            &nbsp&nbsp&nbsp<span class="label label-warning" style="position: relative;bottom: 2px"><?php echo $cpf_cnpj = ($value->getPessoa() == "fisica") ? "CPF: " : "CNPJ: "; echo $value->getCpfCnpj();?></span>
                            <span class="label label-warning" style="position: relative;bottom: 2px"><?php echo "Endereço: ".$value->getEndereco();?></span>
                        <?php }?>
                    </td>
                    <td>
                        <span class="label label-success" style="position: relative;bottom: 2px"><?php echo $pessoa = ($value->getPessoa() == "fisica") ? "Pessoa Física" : "Pessoa Jurídica"?></span>
                    </td>
                    <td>
                        <img src="img/<?php echo $value->getImportancia();?>.png" height="15px"/>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <div class="row col-md-2"></div>
</div>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
