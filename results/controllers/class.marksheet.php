<?php 

/**
* 
*/
class Marksheet
{
	public $studentId;
	public $technologyCode;
	public $serialNo;
	public $sessionValue;
	public $c_gpa;

	public function generateKey($technologyCode=0,$studentId=0){

		$studentId=str_pad($studentId,"4","0",STR_PAD_LEFT);
		$serialNo=$technologyCode.$studentId;
		return $serialNo;
	}

	public function shiftTotext($sessionValue=0){
		if($sessionValue==1){
			$sessionValue='1<sup>st</sup>';
		}else{
			$sessionValue='2<sup>nd</sup>';
		}
		return $sessionValue;
	}

	public function cgpaToglGenerator($c_gpa='0.00'){
		if($c_gpa>='4.00'){
			return $cgl='A+';
		}elseif($c_gpa>='3.75'){
			return $cgl="A";
		}elseif($c_gpa>='3.50'){
			return $cgl="A-";
		}elseif($c_gpa>='3.25'){
			return $cgl="B+";
		}elseif($c_gpa>='3.00'){
			return $cgl="B";
		}elseif($c_gpa>='2.75'){
			return $cgl="B-";
		}elseif($c_gpa>='2.50'){
			return $cgl="C+";
		}elseif($c_gpa>='2.25'){
			return $cgl="C";
		}elseif($c_gpa>='2.00'){
			return $cgl="D";
		}else{
			return $cgl="F";
		}


	}



	
}

$marksheets=new Marksheet();
