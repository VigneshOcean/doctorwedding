<?php
session_start();
$id=$_SESSION['id'];
$mark_id=$_SESSION['mark_id'];
if($mark_id=='1')
{
include("include/connect.php");
}
if($mark_id=='2')
{
include("include/trans_connect.php");
}
if($mark_id=='')
{
echo "<script type=text/javascript>window.location='index.php?err';</script>";
}
if(!isset($_SESSION['id']))
{
echo "<script type=text/javascript>window.location='index.php?err';</script>";
}
else
{
error_reporting(0);
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 900);

$csvfile=$_REQUEST['file'];
$date_format=$_REQUEST['date_format'];
?>
<table align="center">
<tr><td colspan="2"><img src="assets/css/img/load.gif" style="width:700px; height:500px; border-radius:10px;" /></td></tr>
<tr><td colspan="2" align="center"><span style="color:#FF0000; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:32px;">Loading !... Please wait</span></td></tr>

<tr><td colspan="2" align="center"><a href="skipping.php?formate=<?php echo $date_format; ?>">Move to Next Process</a></td></tr>
</table>

<?php

$t=mysqli_query($con, "select * from report order by id desc");
$count_t=mysqli_num_rows($t);
if($count_t>0)
{
$table_id=1;
}
else
{
$row_t=mysqli_fetch_array($t);
$table_id1=$row_t['table_id'];
$table_id=$table_id1+1;
}

mysqli_query($con, "update report set balance='0'")or die(mysqli_error($con));

/*$file=$_REQUEST['file'];*/

/*$p_rep_id=$_POST['p_rep_id'];
$p_rep_name=$_POST['p_rep_name'];
$p_rep_mobile=$_POST['p_rep_mobile'];
$p_cust_id=$_POST['p_cust_id'];
$p_cust_name=$_POST['p_cust_name'];
$p_cust_pincode=$_POST['p_cust_pincode'];
$p_cust_mobile=$_POST['p_cust_mobile'];
$p_bill_no=$_POST['p_bill_no'];
$p_bill_date=$_POST['p_bill_date'];
$p_credit_days=$_POST['p_credit_days'];

$p_disc_percent=$_POST['p_disc_percent'];
$p_disc_amount=$_POST['p_disc_amount'];*/




$file_handle = fopen($csvfile, "r");
while (($line_of_data = fgetcsv($file_handle, 10000, ",")) !== FALSE)
{
$rep_id=mysqli_real_escape_string($con, $line_of_data[0]);
$rep_name=mysqli_real_escape_string($con, $line_of_data[1]);
$rep_mobile=mysqli_real_escape_string($con, $line_of_data[22]);
$cust_id=mysqli_real_escape_string($con, $line_of_data[2]);
$cust_name=mysqli_real_escape_string($con, $line_of_data[3]);
$cust_pincode=mysqli_real_escape_string($con, $line_of_data[5]);
$cust_mobile=mysqli_real_escape_string($con, $line_of_data[24]);
$bill_no=mysqli_real_escape_string($con, $line_of_data[4]);
$bill_date=mysqli_real_escape_string($con, $line_of_data[6]);
$credit_days=mysqli_real_escape_string($con, $line_of_data[30]);
$balance=mysqli_real_escape_string($con, $line_of_data[9]);
$disc_percent=mysqli_real_escape_string($con, $line_of_data[10]);
$disc_amount=mysqli_real_escape_string($con, $line_of_data[18]);

$rr=mysqli_query($con, "select * from report where cust_id='$cust_id' and bill_no='$bill_no' and org_billdate='$bill_date'");
$count_rr=mysqli_num_rows($rr);
if($count_rr>0)
{
$row_rr=mysqli_fetch_array($rr);
$tab_id=$row_rr['id'];
mysqli_query($con, "update report set balance='$balance' where id='$tab_id'")or die(mysqli_error($con));
}
else
{

$line_import_query="INSERT into report(table_id,rep_id,rep_name,rep_mobile,cust_id,cust_name,cust_pincode,cust_mobile,bill_no,org_billdate,bill_date,credit_days,balance,disc_percent,disc_amount) values('$table_id','$rep_id','$rep_name','$rep_mobile','$cust_id','$cust_name','$cust_pincode','$cust_mobile','$bill_no','$bill_date','$bill_date','$credit_days','$balance','$disc_percent','$disc_amount')";
 
mysqli_query($con, $line_import_query) or die(mysqli_error($con));
} 
 

  
   }
   
    mysqli_query($con, "delete from report where bill_no=''") or die(mysqli_error($con));
	 mysqli_query($con, "delete from report where cust_id='Customer Code'") or die(mysqli_error($con));
	 
	 
	 
	 
  
   	echo "<script type='text/javascript'>
	alert('Uploaded into database!.Now Skipping Undefined Values');
	window.location.href='skipping.php?formate=$date_format';</script>";
   
 } 
 
?>