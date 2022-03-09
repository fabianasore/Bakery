<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createPao($name, $precounitario, $qtde){
		$stmt = $this->con->prepare("INSERT INTO paes (name, precounitario, qtde) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("sdi", $name, $precounitario, $qtde);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getpao(){
		$stmt = $this->con->prepare("SELECT id, name, precounitario, qtde FROM paes");
		$stmt->execute();
		$stmt->bind_result($id, $name, $precounitario, $qtde);
		
		$paes = array(); 
		
		while($stmt->fetch()){
			$pao  = array();
			$pao['id'] = $id; 
			$pao['name'] = $name; 
			$pao['precounitario'] = $precounitario; 
			$pao['qtde'] = $qtde; 
			
			array_push($paes, $pao); 
		}
		
		return $paes; 
	}
	
	
	function updatePao($id, $name, $precounitario, $qtde){
		$stmt = $this->con->prepare("UPDATE paes SET name = ?, precounitario = ?, qtde = ? WHERE id = ?");
		$stmt->bind_param("ssisi", $name, $precounitario, $qtde, $id);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deletePao($id){
		$stmt = $this->con->prepare("DELETE FROM paes WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true; 
		return false; 
	}
}