<?php

include("include/connect.php");

if(isset($_REQUEST['title']))

{

$tt=$_REQUEST['title'];

}

$val ='<option value="">---select----</option>';

$subcaste = mysqli_query($con,"select * from subcaste where caste ='$tt'");



// $subcaste = mysqli("select * from subcaste where caste ='$tt'");

while($subcaste_row = mysqli_fetch_array($subcaste, MYSQLI_ASSOC))

{



$val .='<option value="'.$subcaste_row['id'].'">'.$subcaste_row['subcaste'].'</option>';

}

echo $val; 

?>