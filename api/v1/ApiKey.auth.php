<?php 
# class to check weather key is provide is authenticate or not 

class ApiKeyAuth{
	private $masterKey = 'abcd1234xyz'  ; #for test purpose only 

	public function verifyKey($userApiKey , $origin){
		// match master keu and user api key 
		if($userApiKey != $this->masterKey)
			return false  ;
		else
			return true ;
	}
}
?>