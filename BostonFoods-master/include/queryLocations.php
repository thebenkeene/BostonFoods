<?php 

include ("dbconn.php");
$dbc = connect_to_db( "crawfocc" );
$query = "select * from DELIVERY_LOCATIONS";
$result = mysqli_query($dbc, $query) or
			die( "bad query".mysqli_error( $dbc ) );
 $location_data = array();
 	while ( $obj = mysqli_fetch_object( $result ) ) {
		$location_data[] = $obj;
 	}

	echo json_encode($location_data);

?>