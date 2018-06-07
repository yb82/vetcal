<?php
require_once('./classes/Course.php');
class Datahandler{

	public $courseData;
	public $fee;
	public $arr;
	public $error="";
	public function __construct(){
		$get = file_get_contents("./coursedata.xml");
		$this->arr = simplexml_load_string($get);
		$this->coursedata = array();
		//$this->error.="hello start<br/>";
		$this->loadData();
		

	}
	public function printData(){

	
		//echo $this->arr->getName() . "<br>";
		//echo $this->arr->Course[0]["name"];
	
		//print_r($this->courseData);
		foreach ($this->courseData as $key => $value) {
			print_r($key);
			echo "<br/><br/><br/><br/>";
			//print_r($value->materialFee);
			print_r($value);
			echo "<br/><br/><br/><br/>";
		}

	}
	private function loadData(){

		//$this->error.="loading data start<br/>";
		//echo $this->arr->getName() . "<br>";
		//echo $this->arr->Course[0]["name"];
		foreach ($this->arr as $course) {
			
			$melong = new Course();
			$melong->courseName = (string)$course['name'];
			$melong->duration = (string)$course['duration'];
			$melong->enrolmentFee = (string)$course['enrolment'];
			$melong->materialFee = (string)$course['material'];
			$melong->tuitionFee = (string)$course['tuition'];
			//$melong->courseStartDates = explode(",", $course['startdate']);
			$temp = explode(",", $course['startdate']);
			$temp1=array();
			$flag = false;
			//$this->error.="start check data start<br/>";
			foreach ($temp as $key => $value) {
				//$this->error.="hello check date start".$value;

				if(!$flag){
				
					$flag = $this->currentDate($value);
					if($flag)	$temp1[]=$value;
				}
				if($flag){
					//$this->error.="okay!<br/>";

					$temp1[]=$value;
				}
			}
			$melong->courseStartDates=$temp1;
			$this->courseData[]= $melong;
			//$this->error.="<br/>melong";
			//print_r($melong);

		}
		//print_r($this->courseData);

	}
	public function loadCourseName(){
		$output ="";
		foreach ($this->courseData as $key => $value) {
			$output.= '<option value="'.$value->courseName.'">'.$value->courseName.'</option>';
		}
		return $output;
	}
	public function getAllData(){
		return json_encode($this->courseData); 	
	}
	public function getStartDateByName($courseName){
		
		//$courseData = new Course();
		foreach ($this->courseData as $value) {
			if($value->courseName == $courseName){

				return $value->courseStartDates;
			}
			//else return null;
		}

	}
	public function getCourseData($courseName){
		
		//$courseData = new Course();
		
		foreach ($this->courseData as $key=>$value) {

			
			if($value->courseName == $courseName){
				
				$outputData = Array($value->duration, $value->courseStartDates);
				
				return $outputData;
			}
			//else return null;
		}

	}
	public function getCourseDataByName($courseName){
		$this->error .=" hello2";

		foreach ($this->courseData as $key=>$value) {

			//$this->error.= $value->courseName."<br/>";
			if($value->courseName == $courseName){
			//	$this->error.= "hello3";

				return $value;
			}
			//else return null;
		}

	}
	public function currentDate($date) {
		$date = str_replace ( '/', '-', $date );
		$date1 =new DateTime($date);
		//$date1->format('d/m/Y');
		$current = new DateTime();
		//$this->error.="hello1112-".$current->format('d/m/Y');
		//return $current;
		if($date1 >= $current){
		//	$this->error.="true";
			return true;
		} else false;
	}
	
}