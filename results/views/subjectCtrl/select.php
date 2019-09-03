	<?php 
	/* Database connection start */
	require_once('../../conn/conn.php');


	// storing  request (ie, get/post) global array to a variable  
	$requestData= $_REQUEST;

	$columns = array( 
	// datatable column index  => database column name			
		0 => 'subjectName',			
		1 => 'technologyName',			
		2 => 'session',			
		3 => 'semester',			
		"subjectControlId" => 'subjectControlId',
	);

	// getting total number records without any search
	$sql = "SELECT subjectcontrol.subjectControlId,subject.subjectCode,subject.subjectName,technology.technologyName,semester.semester,session.session from subjectcontrol INNER JOIN subject on subjectcontrol.subjectId=subject.subjectId INNER JOIN technology on subjectcontrol.technologyId=technology.technologyId INNER JOIN session on subjectcontrol.sessionId=session.sessionId INNER JOIN semester on semester.semesterId=subjectcontrol.semesterId ORDER BY subjectcontrol.subjectControlId DESC";	
	
	$query=mysqli_query($conn, $sql) or die(mysql_error());




	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


	$sql = "SELECT subjectcontrol.subjectControlId,subject.subjectName,subject.subjectCode,technology.technologyName,semester.semester,session
.session from subjectcontrol INNER JOIN subject on subjectcontrol.subjectId=subject.subjectId INNER JOIN technology on subjectcontrol.technologyId=technology.technologyId INNER JOIN session on subjectcontrol.sessionId=session.sessionId INNER JOIN semester on semester.semesterId=subjectcontrol.semesterId";
	$sql.=" WHERE 1=1";
	if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
		$sql.=" AND ( subject.subjectName LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  technology.technologyName LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  semester.semester LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  session.session LIKE '".$requestData['search']['value']."%' )";  		
		
	}


	$query=mysqli_query($conn, $sql) or die();
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
	$sql.=" ORDER BY ". $columns[0]." desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
	$query=mysqli_query($conn, $sql) or die();

	$data = array();
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 		
		$nestedData[] = $row['subjectName']." (".$row['subjectCode'].")";
		$nestedData[] = $row['technologyName'];			
		$nestedData[] = $row['session'];			
		$nestedData[] = $row['semester'];			
		$nestedData['DT_RowId'] = $row['subjectControlId'];		
		$data[] = $nestedData;
	}



	$json_data = array(
				"draw" => intval( $requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
				// "totalFiltered"    => intval( $totalData ),  // total number of records
				"recordsTotal"  => intval( $totalData ),  // total number of records
				"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
				"aaData" => $data  // total data array
				);

	echo json_encode($json_data);  // send data as json format

	 ?>