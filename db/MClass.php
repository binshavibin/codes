<?php
	include 'config.php';
	Class MClass {
		function connect()
		{
			$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
			if(!$conn) {
				return "connect failed";
			}
			return $conn;
		}
		function insertData($table,$data,$conn)
		{
			$sql 	= "insert into ".$table."(";
			$tbkeys = "";
			$tbval 	= "";
			foreach ($data as $key => $value) {
				$tbkeys .= $key.",";
				$tbval 	.= "'".$value."',";
			}
			$tbkeys = substr($tbkeys, 0,-1);
			$tbval 	= substr($tbval, 0,-1);
			$sql  .= $tbkeys.') values('.$tbval.')';

			if($conn->query($sql)) {
				return true;
			} else  {
				return fale;
			} 

		}
	}
?>