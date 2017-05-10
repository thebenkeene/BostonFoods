<?php 

include ("dbconn.php");
$dbc = connect_to_db( "crawfocc" );
$query = "select * from BOXES";
$result = mysqli_query($dbc, $query) or
			die( "bad query".mysqli_error( $dbc ) );
 $box_data = array();
 	while ( $obj = mysqli_fetch_object( $result ) ) {
		$box_data[] = $obj;
 	}

	echo json_encode($box_data);

?>