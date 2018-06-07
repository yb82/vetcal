<?php

class MYPDF extends TCPDF {
	// Page header
	public function Header() {
		// get the current page break margin
		$bMargin = $this->getBreakMargin ();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak ( false, 0 );
		// set bacground image
			//$img_file = '../images/background.jpg';
			//$this->Image ( $img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0 );
		// restore auto-page-break status
		$this->SetAutoPageBreak ( $auto_page_break, $bMargin );
		// set the starting point for the page content
		$this->setPageMark ();
	}
	
}

class PDFCreator{
	public function __construct(){
		
	}
	public function createPaymentplanPDF($courseData,$result,$total){
		$pdf = new MYPDF ( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

		// set document information
		$pdf->SetCreator ( 'IHBrisbane ALS' );
		$pdf->SetAuthor ( 'IHBrisbane ALS' );
		$pdf->SetTitle ( 'Confirmation Letter' );

		$pdf->SetAutoPageBreak ( true, 0 );

		$pdf->setImageScale ( PDF_IMAGE_SCALE_RATIO );

		$pdf->AddPage ();
		$html = "
		<style>
			
			table.detail {
				border-collapse:collapse;
				border:none;

				align: center;
				border-spacing:5px 3px;

			}
			td.col1Title
			{
				width:280pt;
				text-align:center;
				background-color: #D9D9D9;
				padding-left:10px;
				font-size:11.0pt;
				font-family:'Calibri','sans-serif';
				padding: 5px;
				font-weight:bold;

			}
			td.col2Title{
				width:120pt;
				text-align:center;
				background-color: #D9D9D9;
				padding-left:10px;
				font-size:11.0pt;
				font-family:'Calibri','sans-serif';
				padding: 5px;
				font-weight:bold;


			}	

			td.col1{
				width:280pt;
				text-align:center;
				background-color: #D9D9D9;
				padding-left:10px;
				font-size:11.0pt;
				font-family:'Calibri','sans-serif';
				padding: 5px;

			}
			td.col2{
				width:120pt;

				background-color: #D9D9D9;
				padding-left:10px;
				font-size:11.0pt;
				font-family:'Calibri','sans-serif';
				padding: 5px;
				text-align:center;



			}	
			td.col2Amount{
				width:120pt;
				text-align:right;
				background-color: #D9D9D9;
				padding-left:10px;
				font-size:11.0pt;
				font-family:'Calibri','sans-serif';
				padding: 5px;


			}	
			td.col2Total{
				width:120pt;
				text-align:center;
				background-color: #D9D9D9;
				padding-left:10px;
				font-size:11.0pt;
				font-family:'Calibri','sans-serif';
				padding: 5px;
				font-weight:bold;




			}
			td.col2Total1{
				width:120pt;
				text-align:right;
				background-color: #D9D9D9;
				padding-left:10px;
				font-size:11.0pt;
				font-family:'Calibri','sans-serif';
				padding: 5px;
				font-weight:bold;
			}	

		</style>

		<br/><br/>


		<img src=\"../images/header1.PNG\"  ><br/><br/>
		<h1 style=\"text-align:center\">ALS VET Course Payment Plan</h1><br/>
		<table class=\"detail\" border=1 cellspacing=0 cellpadding=0>
			<tr>
				<td class=\"col1Title\">Course Name</td>
				<td class=\"col2Title\">Course Start Date</td>
				<td class=\"col2Title\">Course Finish Date</td>
			</tr>
			";
			foreach ($courseData as  $value) {
				$html.= "<tr>
				<td class=\"col1\">".$value[0]."</td>
				<td class=\"col2\">".$value[1]."</td>
				<td class=\"col2\">".$value[2]."</td>
			</tr>";

		}
		$html.="</table><br/><br/>

		";

		$html .="
		<table class=\"detail\" border=1 cellspacing=0 cellpadding=0>
			<tr>
				<td class=\"col1Title\">Due Date</td>
				<td class=\"col2Title\">Description</td>
				<td class=\"col2Title\">Amount</td>
			</tr>";

			foreach ($result as $key => $value) {

				$html.= "<tr>
				<td class=\"col1\">".$value->dueDate."</td>
				<td class=\"col2\">".$value->description."</td>
				<td class=\"col2Amount\">$".$value->amount."</td>
			</tr>";

		}





		$html.="<tr><td class=\"col1\"></td><td class=\"col2Total\">Total</td><td class=\"col2Total1\">$".$total."</td></tr> </table>";
		$pdf->writeHTML ( $html, true, false, true, false, '' );
		$pdf->lastPage ();
		$pdf->Output("payment.pdf","I");

	}
	public function createApplicationPDF($courseData, $studentDetail,$paymentOption){
		$pdf = new MYPDF ( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

		// set document information
		$pdf->SetCreator ( 'IHBrisbane ALS' );
		$pdf->SetAuthor ( 'IHBrisbane ALS' );
		$pdf->SetTitle ( 'VET Course Application' );

		$pdf->SetAutoPageBreak ( true, 0 );

		$pdf->setImageScale ( PDF_IMAGE_SCALE_RATIO );

		$pdf->AddPage ();
		$html1 = "
		<style>
			
			td.colPersonal{
				width:200pt;
				
				font-size:10.0pt;
				font-family:'Calibri','sans-serif';
				padding:5px;
				
				
			}	
			td.colPersonal1{
				width:350pt;
				
				font-size:10.0pt;
				font-family:'Calibri','sans-serif';
				padding:5px;
				
				
			}
			td.colCourse1{
				width:10pt;
				font-size:10.0pt;				
				font-family:'Calibri','sans-serif';
				padding:2px;
				
				
			}	
			td.colCourse2{
				width:70pt;
				
				font-size:10.0pt;				
				font-family:'Calibri','sans-serif';
				padding:2px;
				
				
			}
			td.colCourse3{
				width:300pt;
				
				font-size:8.0pt;				
				font-family:'Calibri','sans-serif';
				padding:2px;
				
				
			}
			td.colCourse4{
				width:55pt;
				
				font-size:10.0pt;				
				font-family:'Calibri','sans-serif';
				padding:2px;
				
				
			}
			td.colCourse5{
				width:60pt;
				
				font-size:10.0pt;				
				font-family:'Calibri','sans-serif';
				padding:2px;
				
				
			}
			td.colVisa{
				width:180pt;
				padding-left:10px;
				font-size:12.0pt;
				font-family:'Calibri','sans-serif';
				padding:5px;
				
				
			}	
			.otherschool{
				font-size:10.0pt;				
				font-family:'Calibri','sans-serif';
				padding:2px
			}
			.enrol{
				font-size:10.0pt;				
				font-family:'Calibri','sans-serif';
				padding:2px	
			}

		</style>

		<body>
			<img src=\"../images/header.PNG\"  ><br/><br/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table>
			<tr> <td class= \"colPersonal\">Name : ".$studentDetail->getFullName()."</td><td class= \"colPersonal1\">Current Address : ".$studentDetail->currentAddr."</td></tr>
			<tr> <td class= \"colPersonal\">Date of Birth : ".$studentDetail->dateOfBirth."</td><td  class= \"colPersonal1\">Current Phone : ".$studentDetail->contact."</td></tr>
			<tr> <td class= \"colPersonal\">Nationality : ".$studentDetail->nation."</td><td class= \"colPersonal1\">Email : ".$studentDetail->email."</td></tr>
			<tr> <td class= \"colPersonal\">Passport : ".$studentDetail->passportNo."</td><td class= \"colPersonal1\" >USI : ".$studentDetail->usi."</td></tr>
			<tr> <td class= \"colPersonal\">Gender : ".$studentDetail->gender."</td><td class= \"colPersonal1\" >English Level : ".$studentDetail->englvl."</td></tr>
			<tr> <td class= \"colPersonal\">agent : ".$studentDetail->agent."</td></tr>
		</table>
		<br/>
		<br/>		

		<img src=\"../images/visa.PNG\"  \><br/>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table>
		<tr> <td class= \"colVisa\">Visa : ".$studentDetail->visa."</td><td class= \"colVisa\">DIBP Office : ".$studentDetail->dibp."</td><td class=\"colVisa\" >OSHC : ".$studentDetail->insurance."</td></tr>
		
	</table>
	<label class=\"otherschool\">
	<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you currently enrolled at another institution in Australia? ".$studentDetail->otherschool."</label>";

	if($studentDetail->otherschool =="Yes"){
		$html1 .="
		<label class=\"otherschool\"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, is this additional study you wish to undertake? ".$studentDetail->undertake."</label><br/>
		<br/>";	
	}
	$html1 .="<br/><br/>


	<img src=\"../images/course.PNG\" \><br/>
	";

	$i = 0;

	$title = array("1.","2.","3.","4.","5.","6.");

	$html1.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table>";
	foreach ($courseData as  $value) {
		$html1.= "<tr><td class= \"colCourse1\" >".$title[$i]. "</td><td class= \"colCourse2\" >Course Name : </td><td class= \"colCourse3\" > ".$value[0]." </td><td class= \"colCourse4\" > Start Date : </td><td class= \"colCourse5\" >".$value[1]."</td></tr>";
		$i++;
	}
	$j = 6;

	for ($i; $i < $j ; $i++) { 
		$html1.= "<tr><td class= \"colCourse1\" >".$title[$i]. "</td><td class= \"colCourse2\" >Course Name : </td><td class= \"colCourse3\" > &nbsp; </td><td class= \"colCourse4\" > Start Date : </td><td class= \"colCourse5\"> &nbsp; </td></tr>";
	}


	$html1.="<br/></table>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class=\"otherschool\">Payment Option : ".$paymentOption."</label><br/>";

	$html1 .= "<img src=\"../images/last1.PNG\" class='z-2' ><br/>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table class=\"enrol\">
	 <tr><td>We can help arange both homestay and student accommodation; please contact us for detail, There is a 4-week minimum stay for either service.
	 </td></tr></table><br/><br/>
	 ";
	$html1 .= "<img src=\"../images/last1_1.PNG\" class='z-2' ><br/>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table class=\"enrol\">
	 <tr><td>
1. <b>Send this form and signed copy of your passport</b> direct to IH Brisbane - ALS (certenrol@ihbrisbane.com.au) or via one of our Education Agents (include your agent’s stamp on your passport).</td></tr>
<tr><td>2. IH Brisbane ALS will send you (or your agent) a Letter of Offer. Complete the Letter of Offer & return with your payment information. </td></tr>
<tr><td>3. IH Brisbane ALS will send you a Confirmation of Enrolment (COE) so you can apply for your Australian Student Visa. (If applicable) </td></tr>

<tr><td>For information about studying as an International Student in Australia, see <a href=\"https://internationaleducation.gov.au/Regulatory-Information/Pages/Regulatoryinformation.aspx\">Here</a></td></tr>
</table>
<br/><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table class=\"enrol\">
<tr><td>• I have read and understood the Terms and Conditions, including the Cancellation and Refund Policy.</td></tr>

<tr><td>•  I confirmed that I have sufficient funds to pay for all tuition fees, accommodation and all other personal expenses during the full period of my course.</td></tr>

<tr><td>• I certified that all information given by me in this application is accurate and correct.</td></tr>

</table>

";



	$html1 .= "<br/><br/><br/><img src=\"../images/last2.PNG\" class='z-2' >";


	$pdf->writeHTML ( $html1, true, false, true, false, '' );
	//$pdf->AddPage ();
	//$html1 = "<img src=\"../images/vetpage2.PNG\" class='z-2' >";
	//$pdf->writeHTML ( $html1, true, false, true, false, '' );
	$pdf->lastPage ();

		//echo $html1;
	$pdf->Output("payment.pdf","I");
}
}