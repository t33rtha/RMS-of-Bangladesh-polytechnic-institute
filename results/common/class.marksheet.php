<?php 

/**
* 
*/
class Marksheet
{
	public $studentId;
	public $technologyCode;
	public $serialNo;
	public $gpa;
	public $gl;

	public function generateKey($technologyCode=0,$studentId=0){

		echo $this->technologyCode;	

	}

	public function toGradeLeter($gpa=0){
		if($gpa>=4.00)  {
			return $gl="A+";
		}else if($gpa>=3.75) {
			return $gl="A";
		}else if($gpa>=3.50) {
			return $gl="A-";
		}else if($gpa>=3.25) {
			return $gl="B+";
		}else if($gpa>=3.00) {
			return $gl="B";
		}else if($gpa>=2.75) {
			return $gl="B-";
		}else if($gpa>=2.50) {
			return $gl="C+";
		}else if($gpa>=2.25) {
			return $gl="C";
		}else if($gpa>=2.00) {
			return $gl="D";
		}else{
			return $gl="F";
		}

		echo $gl;


	}
	
}

$marksheets=new Marksheet();
