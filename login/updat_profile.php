<?php
include("../include/connect.php");
$command=$_POST['command'];
if($command=="update_profile")
{
$place=$_POST['p_birth'];
$tob=$_POST['tob'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$subcaste=$_POST['subcaste'];
$star=$_POST['star'];
$moonsign=$_POST['moonsign'];
$education=$_POST['education'];
$edu_det=$_POST['edu_det'];
$fathername=$_POST['fathername'];
$father_occupation=$_POST['father_occupation'];
$mother_name=$_POST['mother_name'];
$mother_occupation=$_POST['mother_occupation'];
$no_of_brothers=$_POST['no_of_brothers'];
$bro_married=$_POST['bro_married'];
$no_of_sisters=$_POST['no_of_sisters'];
$sis_married=$_POST['sis_married'];
$house_type=$_POST['house_type'];
$skin=$_POST['skin'];
$height=$_POST['height'];
$job=$_POST['job'];
$job_cmpy=$_POST['job_cmpy'];
$job_loc=$_POST['job_loc'];
$salary=$_POST['salary'];
$addr=mysqli_real_escape_string($con, $_POST['addr']);
$area=$_POST['area'];
$self_desc=mysqli_real_escape_string($con, $_POST['self_desc']);
$expectation=mysqli_real_escape_string($con, $_POST['expectation']);
$home_type=$_POST['home_type'];
$dosam=$_POST['dosam'];
$self_dosam=$_POST['self_dosam'];
//******New Code for file upload*******
$profile_folder='../profile/';
$horo_folder='../testprofile/';
$allowed_extensions= array("jpeg","jpg","png");
$existing_primary_picture_name=$_POST['picture'];
$existing_secondary_picture_name=$_POST['picture2'];
$existing_horoscope_name=$_POST['horo'];
$random_no_primary_picture=rand(10000000,99999999);
$random_no_secondary_picture=rand(10000000,99999999);
$existing_image_url=$profile_folder.$existing_image_name;
$primary_profile_picture=$_FILES['image1']['name'];
$primary_profile_picture_type=$_FILES['image1']['type'];
$primary_profile_picture_name=$random_no_primary_picture."_".$primary_profile_picture;
if(isset($_FILES['image1'])) {
    $primary_profile_picture_extension=strtolower(end(explode('.',$_FILES['image1']['name'])));
    if(in_array($primary_profile_picture_extension,$allowed_extensions)=== true) {
        unlink($existing_image_url);
        move_uploaded_file($_FILES['image1']['tmp_name'],'../profile/'.$primary_profile_picture_name);
    }
} else {
    $primary_profile_picture_name=$existing_image_name;
}
$random_no=rand(10000000,99999999);
$picture2=$_POST['picture2'];
$picture3='../profile/';
$picture=$picture3.$picture2;
  $image2_file=$_FILES['image3']['name'];
	if(!empty($image2_file))
	{	
         if (($_FILES["image3"]["type"] == "image/jpeg") || ($_FILES["image3"]["type"] == "image/jpg") || ($_FILES["image3"]["type"] == "image/png")) 
       {
	unlink($picture);
        $target_path = "../profile/";
	$uploaded_files2=$random_no."_".$_FILES['image3']['name'];
	move_uploaded_file($_FILES['image3']['tmp_name'], $target_path .$random_no."_".$_FILES['image3']['name']);
       } 
       else 
       {
         echo 'Error in file Formate';
         $uploaded_files2=$picture2;
       }
	}
	else
	{
        echo 'Not Uploaded';
	$uploaded_files2=$picture2;
	}
$horo1=$_POST['horo'];
$horo2='../matrimonyadmin/horo/';
$horo=$horo2.$horo1;
 $file=$_FILES['image2']['name'];
	if(!empty($file))
	{	
if (($_FILES["image2"]["type"] == "image/jpeg") || ($_FILES["image2"]["type"] == "image/jpg") || ($_FILES["image2"]["type"] == "image/png")) 
       {
	unlink($horo);
	$target_path11 = "../matrimonyadmin/horo/";
	$uploaded_files11=$random_no."_".$_FILES['image2']['name'];
	move_uploaded_file($_FILES['image2']['tmp_name'], $target_path11 .$random_no."_".$_FILES['image2']['name']);
       } 
       else 
       {
         echo 'Error in file Formate';
         $uploaded_files11=$horo1;
       }
	
	}
	else
	{
	$uploaded_files11=$horo1;
	}
$userid=$_POST['userid'];


mysqli_query($con, "update register set house_type='$house_type',p_birth='$place',tob='$tob',mobile='$mobile',email='$email',caste='$subcaste',star='$star',skin='$skin',moonsign='$moonsign',education='$education',edu_det='$edu_det',height='$height',job='$job',fathername='$fathername',father_occupation='$father_occupation',mother_name='$mother_name',mother_occupation='$mother_occupation',job_cmpy='$job_cmpy',job_loc='$job_loc',salary='$salary',address='$addr',
no_of_brothers='$no_of_brothers',bro_married='$bro_married',no_of_sisters='$no_of_sisters',sis_married='$sis_married',self_desc='$self_desc',expectation='$expectation',home_type='$home_type',dosam='$dosam',self_dosam='$self_dosam',uploadedfile='$primary_profile_picture_name',second_upload='$uploaded_files2',horo='$uploaded_files11',area='$area' where id='$userid'")or die(mysqli_error($con));
	echo "<script type='text/javascript'>alert('Profile Updated Successfully');window.location.href='home.php';</script>";
}
?>