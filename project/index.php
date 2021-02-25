<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'operation.php'; ?>
	
	<?php
	
		if (isset($_SESSION['message'])): ?>
		
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php 
			
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			
			?>
	
		</div>
		<?php endif ?>
	<div class="d-flex justify-content-center">
	<form action="operation.php" method="POST" class="w-50">
		
		<input type="hidden"name="id" value="<?php echo $id; ?>">
		
		<div class="row pt-2">
		<div class="col">
		<div class="form-group">
		<label>Student Number</label>
		<input type="text" name="StudentNo" class="form-control" value="<?php echo $StudentNo?>" placeholder="Enter Student No">
		</div>
		</div>
		<div class="col">
		<div class="form-group">
		<label>Module Code</label>
		<input type="text" name="ModuleCode" class="form-control" value="<?php echo $ModuleCode?>" placeholder="Enter Module Code">
		</div>
		</div>
		</div>
		<div class="form-group">
		<label>Module Name</label>
		<input type="text" name="ModuleName" class="form-control" value="<?php echo $ModuleName?>" placeholder="Enter Module Name">
		</div>
		<div class="row pt-2">
		<div class="col">
		<div class="form-group">
		<label>CA Theory</label>
		<input type="text" name="CATheory" class="form-control" value="<?php echo $CATheory?>" placeholder="Enter the Mark">
		</div></div>
		<div class="col">
		<div class="form-group">
		<label>Semester Exam</label>
		<input type="text" name="SemesterExam" class="form-control" value="<?php echo $SemesterExam?>" placeholder="Enter the Mark">
		</div></div>
		<div class="col">
		<div class="form-group">
		<label>Total Mark</label>
		<input type="text" name="TotalMark" class="form-control" value="<?php echo $TotalMark?>" placeholder="Enter the Mark">
		</div></div>
		</div>
		<div class="form-group">
		
		<?php 
			
			if ($update==true):
		
		?>
			<button type = "submit" class="btn btn-info" name="update">Update</button>
		<?php else: ?>
			<button type="submit" class="btn btn-success" name="save">Save</button>
		<?php endif; ?>
		</div>
	</form>
	</div>
	<div class="container">
	<?php
		$mysqli = new mysqli('localhost', 'root', 'stdproba2020?', 'crud') or die(mysqli_error($mysqli));
		$result = $mysqli->query ("select * from data") or die($mysqli->error);
	?>
	
	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th>Student_Number</th>
					<th>Module_Code</th>
					<th>Module_Name</th>
					<th>CA_Theory</th>
					<th>Semester_Exam</th>
					<th>Total_Mark</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>

			<?php

				while($row = $result->fetch_assoc()):?>
				<tr>
					<td><?php echo $row['Student_Number'];?></td>
					<td><?php echo $row['Module_Code'];?></td>
					<td><?php echo $row['Module_Name'];?></td>
					<td><?php echo $row['CA_Theory'];?></td>
					<td><?php echo $row['Semester_Exam'];?></td>
					<td><?php echo $row['Total_Mark'];?></td>
					<td>
						<a href="index.php?edit=<?php echo $row['id']; ?>"
							class="btn btn-info"><i class="fas fa-edit btnedit" title="Edit"></i></a>
							
						<a href="operation.php?delete=<?php echo $row['id']; ?>"
							class="btn btn-danger"><i class="fas fa-trash-alt" title="Delete"></i></a>
					</td>
				</tr>
				<?php endwhile; ?>
		</table>
	</div>
	
	<?php
		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '<pre>';
		}

	?>
	</div>
</body>
</html>