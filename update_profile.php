<?php
include("include/connect.php");
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
$addr=mysqli_real_escape_string($con,$_POST['addr']);
$area=$_POST['area'];
$self_desc=mysqli_real_escape_string($con,$_POST['self_desc']);
$expectation=mysqli_real_escape_string($con,$_POST['expectation']);
$home_type=$_POST['home_type'];
$dosam=$_POST['dosam'];
$self_dosam=$_POST['self_dosam'];
//******New Code for file upload*******
$profile_folder='profile/';
$horo_folder = "matrimonyadmin/horo/";
$allowed_extensions= array("jpeg","jpg","png");
$existing_primary_picture_name=$_POST['picture'];
$existing_secondary_picture_name=$_POST['picture2'];
$existing_horoscope_name=$_POST['horo'];
$random_no_primary_picture=rand(10000000,99999999);
$random_no_secondary_picture=rand(10000000,99999999);
$random_no_horoscope=rand(10000000,99999999);
//********Primary Picture Upload**********
$primary_profile_picture_name=$existing_primary_picture_name;
if(isset($_FILES['image1'])) {
    $primary_profile_picture=$_FILES['image1']['name'];
    $primary_profile_picture_extension=strtolower(end(explode('.',$_FILES['image1']['name'])));
    if(in_array($primary_profile_picture_extension,$allowed_extensions)=== true) {
        $existing_primary_picture_url=$profile_folder.$existing_primary_picture_name;
        unlink($existing_primary_picture_url);
        $primary_profile_picture_name=$random_no_primary_picture."_".$primary_profile_picture;
        move_uploaded_file($_FILES['image1']['tmp_name'],$profile_folder.$primary_profile_picture_name);
    }
}
//********Secondary Picture Upload**********
$secondary_profile_picture_name=$existing_secondary_picture_name;
if(isset($_FILES['image3'])) {
    $secondary_profile_picture=$_FILES['image3']['name'];
    $secondary_profile_picture_extension=strtolower(end(explode('.',$_FILES['image3']['name'])));
    if(in_array($secondary_profile_picture_extension,$allowed_extensions)=== true) {
        $existing_secondary_picture_url=$profile_folder.$existing_secondary_picture_name;
        unlink($existing_secondary_picture_url);
        $secondary_profile_picture_name=$random_no_secondary_picture."_".$secondary_profile_picture;
        move_uploaded_file($_FILES['image3']['tmp_name'],$profile_folder.$secondary_profile_picture_name);
    }
}
//************Horoscope upload*****************
$formatted_horoscope_name=$existing_horoscope_name;
if(isset($_FILES['image2'])) {
    $horoscope_upload_name=$_FILES['image2']['name'];
    $horoscope_extension=strtolower(end(explode('.',$_FILES['image2']['name'])));
    if(in_array($horoscope_extension,$allowed_extensions)=== true) {
        $existing_horo_url=$horo_folder.$existing_horoscope_name;
        unlink($existing_horo_url);
        $formatted_horoscope_name=$random_no_horoscope."_".$horoscope_upload_name;
        move_uploaded_file($_FILES['image2']['tmp_name'],$horo_folder.$formatted_horoscope_name);
    }
}
$userid=$_POST['userid'];

mysqli_query($con,"update register set house_type='$house_type',p_birth='$place',tob='$tob',mobile='$mobile',email='$email',caste='$subcaste',star='$star',skin='$skin',moonsign='$moonsign',education='$education',edu_det='$edu_det',height='$height',job='$job',fathername='$fathername',father_occupation='$father_occupation',mother_name='$mother_name',mother_occupation='$mother_occupation',job_cmpy='$job_cmpy',job_loc='$job_loc',salary='$salary',address='$addr',
no_of_brothers='$no_of_brothers',bro_married='$bro_married',no_of_sisters='$no_of_sisters',sis_married='$sis_married',self_desc='$self_desc',expectation='$expectation',home_type='$home_type',dosam='$dosam',self_dosam='$self_dosam',uploadedfile='$primary_profile_picture_name',second_upload='$secondary_profile_picture_name',horo='$formatted_horoscope_name',area='$area' where id='$userid'")or die(mysqli_error($con));
	echo "<script type='text/javascript'>alert('Profile Updated Successfully');window.location.href='login/home.php';</script>";
}
?>