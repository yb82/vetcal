<?php

class Outputform{
	public $description;
	public $dueDate;
	public $amount;
	public $courseName;
		//public $courseName;

	public function __construct($description,$dueDate,$amount,$courseName=""){
			//$this->courseStartDates= array();
		$this->description = $description;
		$this->dueDate = $dueDate;
		$this->amount = $amount;
		$this->courseName = $courseName;
			//$this->courseName = $courseName;


	}
	



}