<?php

	class StudentDetail {
	public $titleType  ;
	public $gender;

	public $title;
	public $fName;
	public $lName;
	//public $gender;
	public $dateOfBirth;
	public $nation;
	public $passportNo;
	public $currentAddr;
	public $contact;
	public $email;
	public $insurance;
	public $visa;
	public $usi;
	public $englvl;
	public $dibp;
	public $undertake;
	public $otherschool;
	public $agent;
	public function __construct(){
			//$this->courseStartDates= array();
		
		}

	public function getFullName(){
		if($this->gender == "Male")
			$this->title= "Mr.";
		else $this->title= "Ms";
		return $this->title." ".$this->fName." ".strtoupper($this->lName);

	}
	
	
}