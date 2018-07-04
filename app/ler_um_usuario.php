<?php
/** 
* Ler um usuário
* criado em : 22/04/18
* Última alteração:22/04/18 por Gideon
* @author Gideon Marinho Gonçalves <gimagodev@gmail.com>
* @version 0.1 
* @copyright  Todos os direitos reservados. 
* @access public  
* @package usuarios 
*/ 

header( "Access-Control-Allow-Origin: *" );
header( "Content-Type: application/json; charset=UTF-8" );

include_once '../class/class_database.php';
include_once '../class/class_usuario.php';

// Conectar o banco
$database = new Database();
$db = $database->getConnection();

// Instanciar o objeto 
$usuario = new Usuario( $db );

// Obter os dados da tela para o objeto $data
$data = json_decode(file_get_contents("php://input"));

// atribuir o id do registro ao objeto
$usuario->uid = $data->uid;

// // Obter um registro
$stmt = $usuario->lerUm();
$num = $stmt->rowCount();

// // obter os registros
// $stmt = $usuario->lerTodos();
// $num = $stmt->rowCount();


if( $num > 0 ) {

	$data="";
	$x=1; 

	while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
		
		extract($row);
		
		$data .='{';
        
        $data .= '"uid":"'.             $uid .'",';
        $data .= '"nome":"'.            $nome .'",';
        $data .= '"sobrenome":"'.       $sobrenome .'",';
        $data .= '"email":"' .          $email . '",';
        $data .= '"telefone":"'.        $telefone .'",';
        $data .= '"mensagem":"'.        $mensagem .'",';
        $data .= '"data_cadastro":"'.   $data_cadastro .'",';
        $data .= '"endereco":"'.        $endereco .'",';
        $data .= '"cidade":"'.          $cidade .'",';
        $data .= '"senha":"'.           $senha .'",';
        $data .= '"origem":"'.          $origem .'"';
	
		$data .='}';
		$data .= ( $x < $num ? ',' : "" );
		$x++;
	}	

}
$json = utf8_encode( $data );
echo '{ "records":[ ' .$json .' ] }';
