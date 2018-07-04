<?php
/** 
* Excluir um usuario
* criado em : 2/7/18
* Última alteração: 2/7/18 por Gideon
* @author Gideon Marinho Gonçalves <gimagodev@gmail.com>
* @version 0.1 
* @copyright  Todos os direitos reservados. 
* @access public  
* @package Documento 
*/ 

include_once '../class/class_database.php';
include_once '../class/class_usuario.php';

// Conectar o banco
$database = new Database();
$db = $database->getConnection();

// Instanciar o objeto 
$usuario = new Usuario( $db );

// Obter os dados oriundos da tela html
$data = json_decode( file_get_contents( "php://input" ) );

// Atribuir identificacao registro a ser deletado
$usuario->uid = $data->uid;

// Excluir o registro
if($usuario->excluir()){
    echo "Usuário foi excluído.";
}
else {
    echo "Não foi possível excluir o usuário.";
}
