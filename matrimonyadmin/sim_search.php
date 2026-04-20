<?php
session_start();
// Simulate advance_search.php session sets
$_SESSION['gender'] = 'female';
$_SESSION['caste'] = '';
$_SESSION['subcaste'] = '';
$_SESSION['from_age'] = '18';
$_SESSION['to_age'] = '30';
$_SESSION['education'] = '';
$_SESSION['dosam'] = '1';
$_SESSION['from_date'] = '';
$_SESSION['to_date'] = '';
$_SESSION['photo1'] = '2';
$_SESSION['govt_job'] = 'No';

// Now copy the logic from search_result.php
$gender=$_SESSION['gender'];
$caste=$_SESSION['caste'];
$subcaste=$_SESSION['subcaste'];
$from_age=$_SESSION['from_age'];
$to_age=$_SESSION['to_age'];
$education=$_SESSION['education'];
$dosam=$_SESSION['dosam'];
$from_date=$_SESSION['from_date'];
$to_date=$_SESSION['to_date'];
$photo1=$_SESSION['photo1'];
$govt_job=$_SESSION['govt_job'];

$aa = " WHERE 1=1 "; 
if($gender!='') { $aa .= " AND gender='$gender' "; }
if($from_age!='') { $aa .= " AND age>='$from_age' "; }
if($to_age!='') { $aa .= " AND age<='$to_age' "; }

if($dosam=='1')
{
    if($photo1=='2')
    {
        if($caste=='' && $subcaste=='' && $education=='' && $from_date=='' && $to_date=='')
        {
            $aa=" where gender='$gender' and  age>='$from_age' and age<='$to_age'";
        }
    }
}
echo "AA is: [" . $aa . "]\n";
?>