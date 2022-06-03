<?php 
// 0,1,1,2,3,5,8,13,,,


// $(document).ready(function(){

// 	$('input[type=checkbox]').filter(':even').attr('checked', true);

// });

// class test{

// public function position($pos){

// 				$n1=0;  
// 			$n2=1;

// 			$x=0;

// 			$limit=$pos;
// 			$a = array();
//            for($i=0; $i<=$limit;$i++){


// 			array_push($a, $n1);

// 			$n1=$n1+$n2;
// 			$n2=$x; 

// 			$x=$n1; 


// 			}

// 					if($a[$pos]){

// 						return $a[$pos];
// 					}else{

// 						return "not found";
// 					}
	
// 	}
// }

// $obj = new test();

// echo $obj->position(10); // pass any position 


class test{

	public function show($limit){

			$n1=0;
			$n2=1;
            $temp=0;

			$a= array();

			for($i=0;$i<$limit+1;$i++){             

			array_push($a, $n1);

            $n1=$n1+$n2; 

			$n2=$temp;

			$temp= $n1;
			
			}

			if($a[$limit]>0){

				return $a[$limit];

			}else{
				return "Not Found";
			}
		
			}

}

$obj = new  test();

echo $obj->show(4);


?>