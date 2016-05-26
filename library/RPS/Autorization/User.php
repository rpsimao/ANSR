<?php

class RPS_Autorization_User {
	
	const USER_AUTH = 1;
	const USER_DENY = 0;
	
	protected $email;
	
	public function setUsername($email) {
		$this->email = $email;
	}
	
	public function getUsername() {
		return $this->email;
	}
	
	public function check() {
		
		$userLogged = Zend_Auth::getInstance()->getIdentity();
		
		$response = ($userLogged->email != $this->email) ? self::USER_DENY : self::USER_AUTH;

		return $response;
	
	}
}