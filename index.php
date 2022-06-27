<?php 
if (isset($_GET['Yes'])){


include "db.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://au.api.trends.nz/api/v1/categories.json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_USERPWD, "sales@starpromotions.com.au:SnuNhKMKTOFp");
$response = curl_exec($ch);
curl_close($ch);

$responses = json_decode($response,TRUE);

// print_r($response);


// echo count($responses['data']);

foreach($responses['data'] as $data)  {

	$numbers = $data['number'];
	$name = $data['name'];
	$mps_category = $data['mps_category'];
	$xebra_code_1 = $data['xebra_code_1'];
	$xebra_code_2 = $data['xebra_code_2'];

   $sql = "INSERT INTO data (numbers, name, mps_category,xebra_code_1,xebra_code_2) VALUES ('".$numbers."', '".$name."','".$mps_category."', '".$xebra_code_1."', '".$xebra_code_2."')";


		if(mysqli_query($link, $sql)){

			foreach ($data['sub_categories'] as $category ) {

		$numbers_fk = $data['number'];
		$numbers = $category['number'];
		$name = $category['name'];
		$mps_category = $category['mps_category'];
		$xebra_code_1 = $category['xebra_code_1'];
		$xebra_code_2 = $category['xebra_code_2'];
		


		$sql = "INSERT INTO sub_categories (numbers_fk, numbers, name,mps_category,xebra_code_1,xebra_code_2) VALUES ('".$numbers_fk."', '".$numbers."','".$name."', '".$mps_category."', '".$xebra_code_1."', '".$xebra_code_2."')";

			if(mysqli_query($link, $sql)){

		
		}
		
		 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Congratulations, Your API`s Data has been successfully imported')
                                window.location.href='dashboard.php';
                                </SCRIPT>");

		}



		}
	
}
}
else{
	
	 echo ("<SCRIPT LANGUAGE='JavaScript'>window.location.href='dashboard.php';</SCRIPT>");
}


?>