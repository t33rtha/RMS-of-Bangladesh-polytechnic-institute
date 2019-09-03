	<?php 
	/* Database connection start */
	require_once('../../conn/conn.php');


	// storing  request (ie, get/post) global array to a variable  
	$requestData= $_REQUEST;

	$columns = array( 
	// datatable column index  => database column name			
		0 => 'roll',			
		1 => 'registrationNo',			
		2 => 'name',			
		3 => 'session',			
		4 => 'technologyName',			
		5 => 'semester',			
		6 => 'shift',		
		"id"=> 'id',
	);

	// getting total number records without any search
	$sql = "SELECT studentinformation.id,studentinformation.roll,studentinformation.registrationNo,studentinformation.name,studentinformation.irregular,session.session,technology.technologyName,semester.semester,studentinformation.shift from studentinformation INNER JOIN session on session.sessionId=studentinformation.sessionId INNER JOIN technology on technology.technologyId=studentinformation.technologyId INNER JOIN semester on semester.semesterId=studentinformation.semesterId ORDER BY studentinformation.roll";

	$query=mysqli_query($conn, $sql) or die(mysql_error());




	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


	$sql = "SELECT studentinformation.id,studentinformation.roll,studentinformation.registrationNo,studentinformation.name,studentinformation.irregular,session.session,technology.technologyName,semester.semester,studentinformation.shift from studentinformation INNER JOIN session on session.sessionId=studentinformation.sessionId INNER JOIN technology on technology.technologyId=studentinformation.technologyId INNER JOIN semester on semester.semesterId=studentinformation.semesterId";
	$sql.=" WHERE 1=1";
	
	if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
		$sql.=" AND ( studentinformation.roll LIKE '".$requestData['search']['value']."%' "; 
		$sql.=" OR studentinformation.registrationNo LIKE '".$requestData['search']['value']."%' "; 
		$sql.=" OR studentinformation.name LIKE '".$requestData['search']['value']."%' "; 
		$sql.=" OR session.session LIKE '".$requestData['search']['value']."%' "; 
		$sql.=" OR technology.technologyName LIKE '".$requestData['search']['value']."%' "; 
		$sql.=" OR semester.semester LIKE '".$requestData['search']['value']."%' "; 
		$sql.=" OR studentinformation.shift LIKE '".$requestData['search']['value']."%' )"; 
		// $sql.=" ORDER BY studentinformation.roll";
	}


	$query=mysqli_query($conn, $sql) or die();
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
	$sql.=" ORDER BY ". $columns[0]." desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
	$query=mysqli_query($conn, $sql) or die();

	$data = array();
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 		
		$nestedData[] = $row['id'];			
		$nestedData[] = $row['roll'];			
		$nestedData[] = $row['registrationNo'];			
		$nestedData[] = $row['name'];						
		$nestedData[] = $row['session'];			
		$nestedData[] = $row['technologyName'];			
		$nestedData[] = $row['semester'];			
		$nestedData[] = $row['shift'];
		$nestedData['DT_RowId'] = $row["id"];		
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