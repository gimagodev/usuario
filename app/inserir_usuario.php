<?php 
/** 
* Criar um novo usuario
* criado em : 22/04/18
* Última alteração: 
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
$usuario = new Usuario($db);

// Obter os dados da tela para o objeto $data
$data = json_decode(file_get_contents("php://input"));

$usuario->nome		 		= ( isset( $data->nome)         ? $data->nome       : NULL ); 		
$usuario->sobrenome 		= ( isset( $data->sobrenome )   ? $data->sobrenome  : NULL );
$usuario->email 			= ( isset( $data->email )       ? $data->email      : NULL ); 	 	
$usuario->telefone 			= ( isset( $data->telefone )    ? $data->telefone   : NULL ); 	
$usuario->senha             = ( isset( $data->senha )       ? $data->senha      : NULL );   		
$usuario->endereco          = ( isset( $data->endereco )    ? $data->endereco   : NULL );   	
$usuario->cidade            = ( isset( $data->cidade )      ? $data->cidade     : NULL );  		
$usuario->origem            = ( isset( $data->origem )      ? $data->origem     : NULL );		
$usuario->mensagem          = ( isset( $data->mensagem )    ? $data->mensagem   : NULL );
$usuario->data_cadastro     = date( "Y-m-d H:i:s", time() );   //strtotime($data->data_cadastro));       

// criar um novo registro na tabela
if($usuario->inserir()) 
    echo "Usuário foi criado.";
else 
    echo "Não foi possível criar o Usuário.";


