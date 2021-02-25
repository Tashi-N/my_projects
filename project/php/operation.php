<?php

session_start();

$mysqli = new mysqli('localhost', 'root', 'stdproba2020?', 'Tashi') or die(mysqli_error($mysqli));

$id=0;
$update = false;

$StudentNo = '';
$ModuleCode = '';
$ModuleName = '';
$CATheory = '';
$SemesterExam = '';
$TotalMark = '';

if (isset($_POST['save'])){
	$StudentNo = $_POST['StudentNo'];
	$ModuleCode = $_POST['ModuleCode'];
	$ModuleName = $_POST['ModuleName'];
	$CATheory = $_POST['CATheory'];
	$SemesterExam = $_POST['SemesterExam'];
	$TotalMark = $_POST['TotalMark'];

	$mysqli->query("INSERT INTO data (Student_Number, Module_Code, Module_Name, CA_Theory, Semester_Exam, Total_Mark) VALUES ('$StudentNo', '$ModuleCode', '$ModuleName', '$CATheory', '$SemesterExam', '$TotalMark')") or die($mysqli->error);

	$_SESSION['message'] = "Record had been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: index.php");

}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data where id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record had been Deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];

	$update=true;

	$result = $mysqli->query("Select * FROM data where id=$id") or die($mysqli->error());

	if (COUNT([$result])==1){
		$row = $result->fetch_array();
		$StudentNo = $row['Student_Number'];
		$ModuleCode = $row['Module_Code'];
		$ModuleName = $row['Module_Name'];
		$CATheory = $row['CA_Theory'];
		$SemesterExam = $row['Semester_Exam'];
		$TotalMark = $row['Total_Mark'];
	}
}

if (isset($_POST['update'])){

	$id = $_POST['id'];
	$StudentNo = $_POST['StudentNo'];
	$ModuleCode = $_POST['ModuleCode'];
	$ModuleName = $_POST['ModuleName'];
	$CATheory = $_POST['CATheory'];
	$SemesterExam = $_POST['SemesterExam'];
	$TotalMark = $_POST['TotalMark'];

	$mysqli->query("UPDATE data SET Student_Number='$StudentNo', Module_Code='$ModuleCode', Module_Name='$ModuleName', CA_Theory='$CATheory', Semester_Exam='$SemesterExam', Total_Mark='$TotalMark' where id=$id") or die($mysqli->error);

	$_SESSION['message'] = "Record had been Updated!";
	$_SESSION['msg_type'] = "warning";

	header("location: index.php");

}
