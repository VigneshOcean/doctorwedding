<?php
include("../include/connect.php");
$command=$_POST['command'];
if($command=="update_profile")
{
$name=$_POST['name'];
$govt_job=$_POST['govt_job'];
$gender=$_POST['gender'];
$place=$_POST['p_birth'];
$dob=$_POST['dob'];
$tob=$_POST['tob'];
$age=$_POST['age'];
if (!empty($dob)) {
    $dob_formatted = '';
    if (strpos($dob, '/') !== false) {
        $dob_parts = explode('/', $dob);
        if (count($dob_parts) == 3) {
            $dob_formatted = $dob_parts[2] . '-' . $dob_parts[1] . '-' . $dob_parts[0];
        }
    } elseif (strpos($dob, '-') !== false) {
        $dob_parts = explode('-', $dob);
        if (count($dob_parts) == 3 && strlen($dob_parts[0]) != 4) { 
            $dob_formatted = $dob_parts[2] . '-' . $dob_parts[1] . '-' . $dob_parts[0];
        } else {
            $dob_formatted = $dob; 
        }
    }
    if (!empty($dob_formatted)) {
        try {
            $dob_obj = new DateTime($dob_formatted);
            $now = new DateTime();
            $calculated_age = $now->diff($dob_obj)->y;
            if ($calculated_age > 0) {
                $age = $calculated_age;
            }
        } catch (Exception $e) { }
    }
}
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$caste=$_POST['caste'];
$subcaste=$_POST['subcaste'];
$star=$_POST['star'];
$moonsign=$_POST['moonsign'];
$education=$_POST['education'];
$edu_det=$_POST['edu_det'];
$fathername=$_POST['fathername'];
$father_occupation=$_POST['father_occupation'];
$mother_name=$_POST['mother_name'];
$mother_occupation=$_POST['mother_occupation'];
$no_of_young_brothers=$_POST['no_of_young_brothers'];
$young_bro_married=$_POST['young_bro_married'];
$no_of_elder_brothers=$_POST['no_of_elder_brothers'];
$elder_bro_married=$_POST['elder_bro_married'];
$no_of_young_sister=$_POST['no_of_young_sister'];
$young_sis_married=$_POST['young_sis_married'];
$no_of_elder_sister=$_POST['no_of_elder_sister'];
$elder_sis_married=$_POST['elder_sis_married'];


$no_of_brothers=$_POST['no_of_brothers'];
$bro_married=$_POST['bro_married'];
$no_of_sisters=$_POST['no_of_sisters'];
$sis_married=$_POST['sis_married'];
$skin=$_POST['skin'];
$height=$_POST['height'];
$job=$_POST['job'];
$job_cmpy=$_POST['job_cmpy'];
$job_loc=$_POST['job_loc'];
$salary=$_POST['salary'];
$addr=mysqli_real_escape_string($con,$_POST['addr']);
$area=$_POST['area'];
$self_desc=mysqli_real_escape_string($con,$_POST['self_desc']);
$expectation=mysqli_real_escape_string($con,$_POST['expectation']);
$home_type=$_POST['home_type'];
$dosam=$_POST['dosam'];
$self_dosam=$_POST['self_dosam'];
$random_no=rand(10000000,99999999);
$picture1=$_POST['picture'];
$picture2='../profile/';
$picture=$picture2.$picture1;
  $file=$_FILES['image1']['name'];
	if(!empty($file))
	{	
	if (is_file($picture)) @unlink($picture);
	$target_path = "../profile/";
	$uploaded_files=$random_no."_".$_FILES['image1']['name'];
	move_uploaded_file($_FILES['image1']['tmp_name'], $target_path .$random_no."_".$_FILES['image1']['name']);
	}
	else
	{
	$uploaded_files=$picture1;
	}

$random_no=rand(10000000,99999999);
$picture2=$_POST['picture2'];
$picture3='../profile/';
$picture=$picture3.$picture2;
  $image2_file=$_FILES['image3']['name'];
	if(!empty($image2_file))
	{	
echo 'Uploaded';
	if (is_file($picture)) @unlink($picture);
        $target_path = "../profile/";
	$uploaded_files2=$random_no."_".$_FILES['image3']['name'];
	move_uploaded_file($_FILES['image3']['tmp_name'], $target_path .$random_no."_".$_FILES['image3']['name']);
	}
	else
	{
echo 'Not Uploaded';
	$uploaded_files2=$picture2;
	}

$horo1=$_POST['horo'];
$horo2='horo/';
$horo=$horo2.$horo1;
 $file=$_FILES['image2']['name'];
	if(!empty($file))
	{	
	if (is_file($horo)) @unlink($horo);
	$target_path11 = "horo/";
	$uploaded_files11=$random_no."_".$_FILES['image2']['name'];
	move_uploaded_file($_FILES['image2']['tmp_name'], $target_path11 .$random_no."_".$_FILES['image2']['name']);
	}
	else
	{
	$uploaded_files11=$horo1;
	}
$userid=$_POST['userid'];
$r1=$_POST['r1'];
$r2=$_POST['r2'];
$r3=$_POST['r3'];
$r4=$_POST['r4'];
$r5=$_POST['r5'];
$r6=$_POST['r6'];
$r7=$_POST['r7'];
$r8=$_POST['r8'];
$r9=$_POST['r9'];
$r10=$_POST['r10'];
$r11=$_POST['r11'];
$r12=$_POST['r12'];
$p_select=$_POST['p_select'];
$premium_customer='0';
if(isset($_POST['premium_customer']))
{
    $premium_customer=$_POST['premium_customer'];
}
mysqli_query($con,"update register set name='$name',govt_job='$govt_job',gender='$gender',p_birth='$place',age='$age',dob='$dob',tob='$tob',mobile='$mobile',email='$email',religion='$caste',caste='$subcaste',star='$star',skin='$skin',moonsign='$moonsign',education='$education',edu_det='$edu_det',height='$height',job='$job',fathername='$fathername',father_occupation='$father_occupation',mother_name='$mother_name',mother_occupation='$mother_occupation',job_cmpy='$job_cmpy',job_loc='$job_loc',salary='$salary',address='$addr',no_youngerbrother='$no_of_young_brothers',married_youngerbrother='$young_bro_married',no_elderbrother='$no_of_elder_brothers',married_elderbrother='$elder_bro_married',no_youngersister='$no_of_young_sister',married_youngersister='$young_sis_married',no_eldersister='$no_of_elder_sister',married_eldersister='$elder_sis_married',no_of_brothers='$no_of_brothers',bro_married='$bro_married',no_of_sisters='$no_of_sisters',sis_married='$sis_married',self_desc='$self_desc',expectation='$expectation',home_type='$home_type',dosam='$dosam',self_dosam='$self_dosam',uploadedfile='$uploaded_files',horo='$uploaded_files11',r1='$r1',r2='$r2',r3='$r3',r4='$r4',r5='$r5',r6='$r6',r7='$r7',r8='$r8',r9='$r9',r10='$r10',r11='$r11',r12='$r12',p_select='$p_select',area='$area',second_upload='$uploaded_files2',premium_customer='$premium_customer' where id='$userid'");
	echo "<script type='text/javascript'>alert('Profile Updated Successfully');window.location.href='edit.php?userid=$userid';</script>";
}
?>