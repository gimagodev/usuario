<?php
/** 
* Contém as classes do contato
*
* criado em : 22/4/18
* Última alteração: 22/4/18 por Gideon
* @author Gideon Marinho Gonçalves <gimagodev@gmail.com>
* @version 0.1 
* @copyright  Todos os direitos reservados. 
* @access public  
* @package Documento 
*/ 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

class Usuario {
    /** 
    * Define as operações de crud 
    * 
    */ 

	// conexão com o banco e o nome da tabela
	private $conn;
	private $table_name = "usuario";

	// propriedades do objeto
	public $uid;
    public $nome;           // varchar(50)	
	public $sobrenome;      // varchar(100)
	public $email;          // varchar(100)
	public $telefone;       // varchar(100)
    public $senha;          // varchar(100)
 	public $endereco;       // varchar(200)	utf8_unicode_ci	
    public $cidade;         // varchar(100)
    public $data_cadastro;  // timestamp
    public $origem;         // varchar(200)
    public $mensagem;       // varchar(500)
 
   	// construtor com $db como database connection
	public function __construct($db) {
		$this->conn = $db;
	}
    
    // Cria um novo usuário 
    function inserir(){
        
        // query para inserir registro    
        $query = "INSERT INTO ".$this->table_name . "                 
           SET nome             =:nome,
               sobrenome        =:sobrenome,
               email            =:email,
               telefone         =:telefone,
               mensagem         =:mensagem,
               data_cadastro    =:data_cadastro,
               endereco         =:endereco,
               cidade           =:cidade,
               senha            =:senha,
               origem           =:origem";
                       
        // prepara $query 
        $stmt = $this->conn->prepare($query);
        
        //  Converte caracteres especiais para a realidade HTML
        $this->nome          = htmlspecialchars(strip_tags($this->nome));
        $this->sobrenome     = htmlspecialchars(strip_tags($this->sobrenome));
        $this->email         = htmlspecialchars(strip_tags($this->email));
        $this->telefone      = htmlspecialchars(strip_tags($this->telefone));
        $this->mensagem      = htmlspecialchars(strip_tags($this->mensagem));
        $this->data_cadastro = htmlspecialchars(strip_tags($this->data_cadastro));
        $this->endereco      = htmlspecialchars(strip_tags($this->endereco));
        $this->cidade        = htmlspecialchars(strip_tags($this->cidade));
        $this->senha         = htmlspecialchars(strip_tags($this->senha));
        $this->origem        = htmlspecialchars(strip_tags($this->origem));
       
        // liga os valores
        $stmt->bindParam(":nome",          $this->nome);
        $stmt->bindParam(":sobrenome",     $this->sobrenome);
        $stmt->bindParam(":email",         $this->email);
        $stmt->bindParam(":telefone",      $this->telefone);
        $stmt->bindParam(":mensagem",      $this->mensagem);
        $stmt->bindParam(":data_cadastro", $this->data_cadastro);
        $stmt->bindParam(":endereco",      $this->endereco);   
        $stmt->bindParam(":cidade",        $this->cidade);
        $stmt->bindParam(":senha",         $this->senha);   
        $stmt->bindParam(":origem",        $this->origem);
        
       
        // executar a query 
        if($stmt->execute()){
            return true;
        }else{
          
            echo "<pre>";
               print_r($stmt->errorInfo());
            echo "</pre>";
            
            return false;
        }
    }

    function lerTodos(){  

        // seleciona todos os usuarios
        $query = "SELECT    uid,
                            nome,
                            sobrenome, 
                            email, 
                            telefone, 
                            mensagem,
                            data_cadastro,
                            endereco, 
                            cidade,
                            senha, 
                            origem 
                  FROM ".$this->table_name."
                  ORDER BY uid";
   
        // preparar a query
        $stmt = $this->conn->prepare( $query );

        // executa a query
        $stmt->execute();       
       
        return $stmt;
    }
    
    // usada para preencher os campos do update
    function lerUm(){

        // query para ler um registro
        $query =    "SELECT uid,
                            nome,
                            sobrenome, 
                            email, 
                            telefone, 
                            mensagem,
                            data_cadastro,
                            endereco, 
                            cidade,
                            senha, 
                            origem 
                    FROM ".$this->table_name."
                    WHERE   uid = ?
                    LIMIT   0,1";

        // preparar a query
        $stmt = $this->conn->prepare( $query );

        // liga o id do registro que será recuperado
        $stmt->bindParam(1, $this->uid);

        // executa a query
        $stmt->execute();       
        
        return $stmt;
    }  

    // atualizar registro
    function alterar(){

        // query de update
        $query =    "UPDATE ".$this->table_name."
                    SET     nome             =:nome,
                            sobrenome        =:sobrenome,
                            email            =:email,
                            telefone         =:telefone,
                            mensagem         =:mensagem,
                            data_cadastro    =:data_cadastro,
                            endereco         =:endereco,
                            cidade           =:cidade,
                            senha            =:senha,
                            origem           =:origem
                    WHERE   uid = :uid";

        // preparar a query 
        $stmt = $this->conn->prepare($query);
         
        // Converte caracteres especiais para a realidade HTML
        $this->nome          = htmlspecialchars(strip_tags($this->nome));
        $this->sobrenome     = htmlspecialchars(strip_tags($this->sobrenome));
        $this->email         = htmlspecialchars(strip_tags($this->email));
        $this->telefone      = htmlspecialchars(strip_tags($this->telefone));
        $this->mensagem      = htmlspecialchars(strip_tags($this->mensagem));
        $this->data_cadastro = htmlspecialchars(strip_tags($this->data_cadastro));
        $this->endereco      = htmlspecialchars(strip_tags($this->endereco));
        $this->cidade        = htmlspecialchars(strip_tags($this->cidade));
        $this->senha         = htmlspecialchars(strip_tags($this->senha));
        $this->origem        = htmlspecialchars(strip_tags($this->origem));

        // liga os valores
        $stmt->bindParam(":uid",           $this->uid);
        $stmt->bindParam(":nome",          $this->nome);
        $stmt->bindParam(":sobrenome",     $this->sobrenome);
        $stmt->bindParam(":email",         $this->email);
        $stmt->bindParam(":telefone",      $this->telefone);
        $stmt->bindParam(":mensagem",      $this->mensagem);
        $stmt->bindParam(":data_cadastro", $this->data_cadastro);
        $stmt->bindParam(":endereco",      $this->endereco);   
        $stmt->bindParam(":cidade",        $this->cidade);
        $stmt->bindParam(":senha",         $this->senha);   
        $stmt->bindParam(":origem",        $this->origem);
     
        // executar a query
        if($stmt->execute()){
            // error_log("product.php - update -- "."stmt retornou TRUE");
            return true;
        }else{
            // error_log("product.php - update -- "."stmt retornou FALSE");
            return false;        
        }     
    }  
    
    // deletar o registro
    function excluir(){

        // excluir
        $query = "DELETE FROM ".$this->table_name." WHERE uid = ?";
       
        // preparar a query
        $stmt = $this->conn->prepare($query);

        // ligar id para excluir
        $stmt->bindParam(1, $this->uid);

        // executar a query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }       


}