<?php 

include ("dbconn.php");
$dbc = connect_to_db( "crawfocc" );
$query = "select * from DELIVERY_SCHEDULE";
$result = mysqli_query($dbc, $query) or
			die( "bad query".mysqli_error( $dbc ) );
 $deliveries_data = array();
 	while ( $obj = mysqli_fetch_object( $result ) ) {
		$deliveries_data[] = $obj;
 	}

	echo json_encode($deliveries_data);

?>