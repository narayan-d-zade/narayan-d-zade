<?php 

 $host="localhost";
 $user="root";
 $pass="";
 $db="comxtech";
$link= mysqli_connect($host,$user, $pass,$db);

		if(!$link){
			echo mysqli_connect_error();
		}else{


		}
?>