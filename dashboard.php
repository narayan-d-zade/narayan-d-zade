<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to dashboard</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

	<style type="text/css">
		.btn{
			font-size: 14px;
		}
	</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<center><h1>Australia Main Category Data from API</h1></center>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<center>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Main Category
</button>
<br>
<br>
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>numbers</th>
                <th>name</th>
                <th>mps_category</th>
                <th>xebra_code_1</th>
                <th>xebra_code_2</th>
                 <th>Edit</th>
                <th>Delete</th>
                <th>sub_categories</th>
               
            </tr>
        </thead>
        <tbody>
			<?php 


			if(isset($_GET['delete_id'])){

			$delete_id = $_GET['delete_id'];

			$sql="DELETE FROM data  WHERE id= '$delete_id'";


			if(!mysqli_query($link, $sql)){

			echo mysqli_error();


			}else{
				 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Record deleted successfully')
                                window.location.href='dashboard.php';
                                </SCRIPT>");
			}


			}

	if(isset($_POST['add_main_data'])){

		$numbers = $_POST['numbers'];
		$name = $_POST['name'];
		$mps_category = $_POST['mps_category'];
		$xebra_code_1 = $_POST['xebra_code_1'];
		$xebra_code_2 = $_POST['xebra_code_2'];

		$sql = "INSERT INTO data (numbers, name,mps_category,xebra_code_1,xebra_code_2) VALUES ('".$numbers."','".$name."', '".$mps_category."', '".$xebra_code_1."', '".$xebra_code_2."')";

			if(mysqli_query($link, $sql)){

				
            }else{
            	 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('New Main Category has been added')
                                window.location.href='dashboard.php';
                                </SCRIPT>");
            }

        }


			if(isset($_POST['edit_main_data'])){


			$edit_id = $_POST['editid'];

			$numbers = $_POST['numbers'];

			$name = $_POST['name'];

			$mps_category = $_POST['mps_category'];

			$xebra_code_1 = $_POST['xebra_code_1'];

			$xebra_code_2 = $_POST['xebra_code_2'];


			$sql="UPDATE data  SET  numbers='$numbers', name='$name', mps_category='$mps_category', xebra_code_1='$xebra_code_1', xebra_code_2='$xebra_code_2'  WHERE id= '$edit_id'";


			if(!mysqli_query($link, $sql)){

			echo mysqli_error();


			}else{
				 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Record edited successfully')
                                window.location.href='dashboard.php';
                                </SCRIPT>");
			}


			}




			$query = "SELECT * FROM `data`;";

			// FETCHING DATA FROM 'data' table
			$result = $link->query($query);

			if ($result->num_rows > 0) 
			{
        while($row = $result->fetch_assoc())
        {
           ?>

           <tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['numbers'];?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['mps_category'];?></td>
				<td><?php echo $row['xebra_code_1'];?></td>
				<td><?php echo $row['xebra_code_2'];?></td>
				<td><a class="btn btn-primary" href="main_edit.php?edit_id=<?php echo $row["id"]; ?>">Edit</a></td>
				<td><a class="btn btn-danger" href="dashboard.php?delete_id=<?php echo $row["id"]; ?>">Hard Delete</a></td>
				<td><a class="btn btn-info" href="sub_categories.php?number=<?php echo $row["numbers"]; ?>">Click to View</a></td>
			</tr>

<?php }
} 

			else { ?>

			<a class="btn btn-success" href="index.php?Yes=true">Please import form API</a>

			<?php
		}

			$link->close();

			?>
          
        </tbody>
    </table>
			</center>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Main Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <form class="form-horizontal" action="dashboard.php" method="POST">
          <fieldset>
          
           
             <div class="form-group">
              
              <div class="col-md-12">
                <input id="numbers" name="numbers" placeholder="numbers" type="text" class="form-control" required >
              </div>
            </div>
             <div class="form-group">
              
              <div class="col-md-12">
                <input id="name" name="name" type="text" placeholder=" name" class="form-control" required >
              </div>
            </div>
             <div class="form-group">
              
              <div class="col-md-12">
                <input id="mps_category" name="mps_category" type="text" placeholder="mps_category" required class="form-control" >
              </div>
            </div>
             <div class="form-group">
              
              <div class="col-md-12">
                <input id="xebra_code_1" name="xebra_code_1" type="text" placeholder="ebra_code_1" required class="form-control" >
              </div>
            </div>
             <div class="col-md-12">
                <input id="xebra_code_2" name="xebra_code_2" type="text" placeholder="xebra_code_2" required class="form-control" >
              </div>
            </div>
             
             <br>

            <div class="form-group">
            	<div class="col-md-12">
             
                <button type="submit" name="add_main_data" id="add_main_data" class="btn btn-primary btn-block" >Save New Record</button>
            </div>
              
            </div>
           
    
            <!-- Form actions -->
           
          </fieldset>
          </form>


      </div>
      
    </div>
  </div>
</div>

    </body>
<style type="text/css">
	.clickable {
    cursor: pointer;
}

.right-col {
    text-align: center;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable({
    	order: [[1, 'desc']],
    });
} );
</script>

</html>