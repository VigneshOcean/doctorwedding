<?php

include("../include/connect.php");

if(isset($_REQUEST['title']))

{

$tt=$_REQUEST['title'];

}

$val='<select  class="form-control" id="form-field-select-1" name="subcaste" id="subcaste" data-placeholder="Select Sub Caste Name..." >';

$val .='<option value="">---select Sub Caste----</option>';



$subcaste = mysqli_query($con, "select * from subcaste where caste ='$tt'");

while($subcaste_row = mysqli_fetch_array($subcaste))

{



$val .='<option value="'.$subcaste_row['id'].'">'.$subcaste_row['subcaste'].'</option>';

}

$val .='</select>';

echo $val; 

?>