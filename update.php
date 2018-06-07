<?php

require_once 'classes/Datahandler.php';
require_once 'classes/Receivedata.php';
require_once 'classes/Calculator.php';
//require_once 'classes/PDFCreator.php';

//require_once './preloader.php';
//$login = new Login ();



if (isset ( $_POST ["duration"] )) {
	$coursename= $_POST["duration"];

	$courseData = new Datahandler ();
	
	
	

	echo json_encode($courseData->getCourseData($coursename));


}

else if (isset ( $_POST ["courses"] )) {

	$courseNames= $_POST["courses"];
	$courseData = new Datahandler ();
	
	
	
	echo json_encode($courseData->getStartDateByName($courseNames));


	
}

else if (isset ( $_POST ["coursedata"] )) {
	$coursename= $_POST["coursedata"];

	$courseData = new Datahandler ();
	
	

	echo json_encode($courseData->getCourseData($coursename));


}

else if(isset($_POST["createpayment"])){
	//print_r($_POST["createpayment"]);
	$receive = new Receivedata();
	
	$paymenetOption="";
	
	$selectedData =$_POST["createpayment"];
	foreach ($selectedData as $key => $value) {
		# code...
		//print_r($value[1]);
		if($value[0] =="paymentoption" ){
			$paymenetOption = $value[1];
		} 
		else if( $value[0] == "waiveoption"){
			if($value[1] != 0){
				foreach ($value[1] as $key => $value1) {
					$receive->setWaiveOption( $value1);
				}
			}

			
		} else if($value[0]=="discountprice"){
			$receive->setDiscountPrice($value[1]);
		}
		else {
			$receive->setCourse($value[0],$value[1]);	
		}

	}
	
	
	$courseData = $receive->getUserCourseData();
	//print_r($courseData);
	//print_r($paymenetOption);
	$calculator = new Calculator($courseData, $paymenetOption,$receive);
	//echo $calculator->error;
	$result = $calculator->getAllPaymentPlan();
	//print_r($result);
	//echo "<br/><br/><br/><br/><br/>";
	//echo $calculator->error;
	
	echo json_encode($result);
	//print_r($calculator->selectedCourseDataDetail);

	//print_r($result);
	//print_r($courseData);
	
	//$paymentPDF = new PDFCreator();
	
	//if ($receive->getStudentDetail()->application == "1" ){
	
		//$paymentPDF->createApplicationPDF($courseData, $receive->getStudentDetail(),$receive->getPaymentOption());
	//} else	//$paymentPDF->createPaymentplanPDF($courseData,$result,$calculator->total);
	

}
