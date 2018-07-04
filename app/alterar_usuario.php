<?php
/** 
* Atualizar um usuário
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

// carrega na classe dados oriundos do html
$usuario->uid               = $data->uid;
$usuario->nome		 		= $data->nome;        		
$usuario->sobrenome 		= $data->sobrenome; 
$usuario->email 			= $data->email;      	 	
$usuario->telefone 			= $data->telefone;  
$usuario->mensagem          = $data->mensagem;   
$usuario->data_cadastro     = $data->data_cadastro; 	
$usuario->endereco          = $data->endereco;     	
$usuario->cidade            = $data->cidade;   
$usuario->senha             = $data->senha;    		   		
$usuario->origem            = $data->origem;    		
 
//$usuario->data_cadastro     = date( "Y-m-d H:i:s", time() );   

// atualizar o arquivo
if( $usuario->alterar() )
	echo "Tipo de Documento foi atualizado.";
else
	echo "Não foi possível atualizar o registro.";
