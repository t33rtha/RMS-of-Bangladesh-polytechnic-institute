	<?php 
	/* Database connection start */
	require_once('../../conn/conn.php');


	// storing  request (ie, get/post) global array to a variable  
	$requestData= $_REQUEST;

	$columns = array( 
	// datatable column index  => database column name			
		0 => 'subjectCode',			
		1 => 'subjectName',			
		2 => 'tc',			
		3 => 'tf',			
		4 => 'pc',			
		5 => 'pf',			
		"subjectId"=> 'subjectId',
	);

	// getting total number records without any search
	$sql = "SELECT *";
	$sql.=" FROM subject";
	$query=mysqli_query($conn, $sql) or die(mysql_error());




	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


	$sql = "SELECT *";
	$sql.=" FROM subject WHERE 1=1";
	if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
		$sql.=" AND ( subjectCode LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  subjectName LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  tc LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  tf LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  pc LIKE '".$requestData['search']['value']."%' ";  		
		$sql.=" OR  pf LIKE '".$requestData['search']['value']."%' )";		
		
	}


	$query=mysqli_query($conn, $sql) or die();
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
	$sql.=" ORDER BY ". $columns[0]." desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
	$query=mysqli_query($conn, $sql) or die();

	$data = array();
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		$nestedData=array(); 		
		$nestedData[] = $row["subjectCode"];
		$nestedData[] = $row["subjectName"];
		$nestedData[] = $row["tc"];
		$nestedData[] = $row["tf"];
		$nestedData[] = $row["pc"];
		$nestedData[] = $row["pf"];
		$nestedData['DT_RowId'] = $row["subjectId"];		
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