<?php

class Customer{
	private $customerID;
	private $firstName;
	private $lastName;
	private $phoneNumber;
	private $emailAddress;
	private $username;
	private $referrer;
		
	function __construct($customerID, $firstName, $lastName, $phoneNumber, $emailAddress, $username, $referrer){
		$this->setCustomerID($customerID);
		$this->setFirstName($firstName);
		$this->setLastName($lastName);
		$this->setPhoneNumber($phoneNumber);
		$this->setEmailAddress($emailAddress);
		$this->setUsername($username);
		$this->setReferrer($referrer);
	}
		
	public function getCustomerID(){
		return $this->customerID;
	}
		
	public function setCustomerID($customerID){
		$this->customerID = $customerID;
	}
		
	public function getFirstName(){
		return $this->firstName;
	}
		
	public function setFirstName($firstName){
		$this->firstName = $firstName;
	}
		
	public function getLastName(){
		return $this->lastName;
	}
		
	public function setLastName($lastName){
		$this->lastName = $lastName;
	}
		
	public function getPhoneNumber(){
		return $this->phoneNumber;
	}
		
	public function setPhoneNumber($phoneNumber){
		$this->phoneNumber = $phoneNumber;
	}
		
	public function getEmailAddress(){
		return $this->emailAddress;
	}
		
	public function setEmailAddress($emailAddress){
		$this->emailAddress = $emailAddress;
	}
		
	public function getUsername(){
		return $this->username;
	}
		
	public function setUsername($username){
		$this->username = $username;
	}
		
	public function getReferrer(){
		return $this->referrer;
	}
		
	public function setReferrer($referrer){
		$this->referrer = $referrer;
	}
}
?>