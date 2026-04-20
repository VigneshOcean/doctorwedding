<?php
include("../include/connect.php");
ob_start();
$query   = "SELECT * FROM register WHERE p_select = '1'";
$result  = mysqli_query($con,$query) or die(mysqli_error());

 
 $pri="";
$num=mysqli_num_rows($result);
 $pri.=$num;
 while($row_result=mysqli_fetch_array($result))
 {
 $pri.="<table width='100%'>
 <tr>
 <td rowspan='5' width='20%'><img src='http://www.hmmatrimony.com/profile/".$row_result['uploadedfile']."' width='200' height='250'/></td>
 <td width='40%'>".$row_result['username']."</td><td width='40%'>".$row_result['name']."</td></tr>
 <tr><td>".$row_result['dob']." / ".$row_result['tob']."</td><td>".$row_result['edu_det']."</td></tr>
 <tr><td>".$row_result['moonsign']."</td> <td>".$row_result['star']."</td></tr>
 <tr><td>".$row_result['job_cmpy']."/".$row_result['job']."</td><td>".$row_result['salary']."</td></tr>
 <tr><td colspan='3'>".$row_result['address']."</td></tr>
 </table>";
 }
 



  header("Content-Type:application/word");
 // header('Content-Type: application/octet-stream');
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("content-disposition: attachment;filename=test.doc");
  echo $pri;
?>