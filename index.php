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

$bd = new \src\RetornaCliente();
$cliente = $bd->getClientes();

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
                    <td><?php echo $key?></td>
                    <td id="<?php echo $key;?>">
                        <a href="?id=<?php echo $key;?>&order=<?php echo @$_GET['order']?>" class="ancor" ><?php  echo $value['nome'];?></a>
                        <?php
                        if(@$_GET['id'] == $key){ ?>
                            &nbsp&nbsp&nbsp<span class="label label-warning" style="position: relative;bottom: 2px"><?php echo $cpf_cnpj = ($value['tipo'] == "fisica") ? "CPF: " : "CNPJ: "; echo $value['cpf_cnpj'];?></span>
                            <span class="label label-warning" style="position: relative;bottom: 2px"><?php echo "Endereço: ".$value['endereco'];?></span>
                        <?php }?>
                    </td>
                    <td>
                        <span class="label label-success" style="position: relative;bottom: 2px"><?php echo $pessoa = ($value['tipo'] == "fisica") ? "Pessoa Física" : "Pessoa Jurídica"?></span>
                    </td>
                    <td>
                        <img src="img/<?php echo $value['importancia'];?>.png" height="15px"/>
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
