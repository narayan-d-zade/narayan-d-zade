<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to dashboard- Sub Categories</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<center><h1>Edit Record | AU Data Sub Categories</h1></center>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<center>


			<?php 

			if(isset($_GET['id'])){

				$id=  $_GET['id'];


			$query = "SELECT * FROM `sub_categories` WHERE `id`='$id'";

			// FETCHING DATA FROM 'data' table
			$result = $link->query($query);

			if ($result->num_rows > 0) 
			{
        while($row = $result->fetch_assoc())
        {
           ?>
	
        <div class="well well-sm">
          <form class="form-horizontal" action="sub_categories.php" method="POST">
          <fieldset>
            <legend class="text-center">Record: <?php echo $row['numbers_fk'];?> </legend>
    
            <!-- id input-->

              <div class="form-group">
              
              <div class="col-md-9">
                <input id="editid" name="editid" placeholder="numbers" type="hidden" class="form-control" value="<?php echo $row['id'];?>" required >
              </div>
            </div>
            <div class="form-group">
            	
              
              <div class="col-md-9">
                <input id="numbers_fk" name="numbers_fk" type="text" placeholder="Your name" class="form-control" readonly value="<?php echo $row['numbers_fk'];?>" title="you can not edit from this form" required>
              </div>
            </div>
             <div class="form-group">
              
              <div class="col-md-9">
                <input id="numbers" name="numbers" placeholder="numbers" type="text" class="form-control" required value="<?php echo $row['numbers'];?>">
              </div>
            </div>
             <div class="form-group">
              
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder=" name" class="form-control" required value="<?php echo $row['name'];?>">
              </div>
            </div>
             <div class="form-group">
              
              <div class="col-md-9">
                <input id="mps_category" name="mps_category" type="text" placeholder="mps_category" required class="form-control" value="<?php echo $row['mps_category'];?>">
              </div>
            </div>
             <div class="form-group">
              
              <div class="col-md-9">
                <input id="xebra_code_1" name="xebra_code_1" type="text" placeholder="ebra_code_1" required class="form-control" value="<?php echo $row['xebra_code_1'];?>">
              </div>
            </div>
             <div class="col-md-9">
                <input id="xebra_code_2" name="xebra_code_2" type="text" placeholder="xebra_code_2" required class="form-control" value="<?php echo $row['xebra_code_2'];?>">
              </div>
            </div>
             
             <br>

            <div class="form-group">
             
                <button type="submit" name="edit_sub_data" id="edit_sub_data" class="btn btn-primary " style="width:70%;">Save Changes</button>
              
            </div>
           
    
            <!-- Form actions -->
           
          </fieldset>
          </form>
        </div>
    
			<?php 
		}
			} 

			else {

			echo "Record not in main table";

			}


		}



			$link->close();

			?>
          
        
			</center>
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
    $('#example').DataTable();
} );
</script>

</html>