<?php
include("include/connect.php"); 
error_reporting(0);
$command=$_POST['command'];
if($command=="verify")
{
    $mobile_no=$_POST['mobile_no'];
    $reg_id=$_POST['reg_id'];
    $otp=$_POST['otp'];
    $selsql="SELECT * from register where id='$reg_id'";
    $selresult=mysqli_query($con,$selsql) or die(mysqli_error($con));
    $row=mysqli_fetch_array($selresult);
    $otp_verify=$row['otp'];
    if($otp_verify==$otp)
    {
        $a=rand(100000,999999);
        $b='HM';
        $username=$b.$a;
        $s=rand(10000,99999);	
        mysqli_query($con,"update register set otp_status='1',status='1',username='$username',password='$s' where id='$reg_id'");	
        //$message=urlencode ("Happy Marriage Matrimony - Username:".$username." and Password: ".$s." Kindly use : www.hmmatrimony.com");
        $message=urlencode ("Thanks for registration with Happy Marriage Matrimony.Username:".$username." and Password: ".$s." -HMMATR");
        $curl = curl_init();
        //curl_setopt($curl, CURLOPT_URL, "http://bhashsms.com/api/sendmsg.php?user=hmmatrimony&pass=success&sender=HMMATR&priority=ndnd&stype=normal&phone=".$mobile_no."&text=".$message."");
        curl_setopt($curl, CURLOPT_URL, "http://site.ping4sms.com/api/httpapi?username=hmmatrimony&password=success&sender=HMMATR&route=2&number=".$mobile_no."&sms=".$message."&templateid=1207162823556605196");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<script type=text/javascript>alert('Your Mobile number is successfully verified,we will send you username and password shortly and Please select any one of the following plans and make payment to become a premium customer.')
            window.location='index.php'
        </script>";
    }
    else
    {
        echo "<script type=text/javascript>
            alert('Please enter valid OTP');
            window.location='verify_mobile.php?mobile_no=".$mobile_no."&reg_id=".$reg_id."';
        </script>";
    }
}
if($command=="register")
{
$name=$_POST['name'];
$rad_gen=$_POST['gender_type'];
$profile=$_POST['profile'];
$refernce=$_POST['refernce'];

$dob=$_POST['dob'];
$order_birth=$_POST['order_birth'];
if ( $_POST['order_birth'] == ''){
    $order_birth = 0;
}
$native_place=$_POST['native_place'];
if ( $_POST['native_place'] == ''){
 $native_place = 0;
}
$age=$_POST['age'];
if ( $_POST['age'] == ''){
 $age = 0;
}
$tob=$_POST['birthtime'];
$p_birth=$_POST['p_birth'];
$status1=$_POST['status1'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$religion=$_POST['religion'];
$caste=$_POST['caste'];
$star=$_POST['star'];
$moonsign=$_POST['moonsign'];
$education=$_POST['education'];
$edu_det=$_POST['edu_det'];
$job=$_POST['job'];
$job_cmpy=$_POST['job_cmpy'];
$job_loc=$_POST['job_loc'];

$skin=$_POST['skin'];
$height=$_POST['height'];
$salary=$_POST['salary'];
$address=$_POST['address'];
$no_of_brothers=$_POST['no_of_brothers'];
$bro_married=$_POST['bro_married'];
$no_of_sisters=$_POST['no_of_sisters'];
$sis_married=$_POST['sis_married'];
$falive=$_POST['falive'];
$malive=$_POST['malive'];
$fathername=$_POST['fathername'];
$mother_name=$_POST['mother_name'];
$father_occupation=$_POST['father_occupation'];
$mother_occupation=$_POST['mother_occupation'];
$self_desc=mysqli_real_escape_string($con,$_POST['self_desc']);
$expectation=$_POST['expectation'];
$home_type=$_POST['home_type'];
$house_type=$_POST['house_type'];
$dosam=$_POST['dosam'];
$self_dosam=$_POST['self_dosam'];
$area=$_POST['area'];
$random_no=rand(10000000,99999999);
$file=$_FILES['uploadedfile']['name'];
if(!empty($file))
{	
$target_path = "profile/";
$uploaded_files=$random_no."_".$_FILES['uploadedfile']['name'];
move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path .$random_no."_".$_FILES['uploadedfile']['name']);
}
	$c_date=date("d/m/Y");
	

$find = mysqli_query($con,"SELECT * FROM register where name='$name' and dob='$dob' and fathername='$fathername' and mother_name='$mother_name'")or die(mysqli_error($con));
$row1=mysqli_fetch_array($find);
$use_id=$row1['id'];
$count_find=mysqli_num_rows($find);
if($count_find>0)
{
echo "<script type=text/javascript>alert('Already Registered Profile .kindly upload new profile')
window.location='register_user.php'
</script>";
 
}
else
{
    $a=rand(100000,999999);
if(!mysqli_query($con,"insert into register(otp,order_birth,native_place,name,gender,profile,refernce,dob,age,tob,p_birth,status1,mobile,email,religion,caste,star,moonsign,education,edu_det,job,job_cmpy,job_loc,skin,height,salary,address,no_of_brothers,bro_married,no_of_sisters,sis_married,falive,malive,fathername,mother_name,father_occupation,mother_occupation,self_desc,expectation,home_type,uploadedfile,c_date,status,dosam,self_dosam,profile_id,area,house_type) values('$a','$order_birth','$native_place','$name','$rad_gen','$profile','$refernce','$dob','$age','$tob','$p_birth','$status1','$mobile','$email','$religion','$caste','$star','$moonsign','$education','$edu_det','$job','$job_cmpy','$job_loc','$skin','$height','$salary','$address','$no_of_brothers','$bro_married','$no_of_sisters','$sis_married','$falive','$malive','$fathername','$mother_name','$father_occupation','$mother_occupation','$self_desc','$expectation','$home_type','$uploaded_files','$c_date','0','$dosam','$self_dosam','$profile_id','$area','$house_type')"))
{  
		 echo "<script type=text/javascript>alert('Some Problem Found while registration, Please contact admin')
        window.location='register_user.php';
        </script>";
}
else
{
        $reg_id = mysqli_insert_id($con);
        if($profile!='admin')
        {
            //$message=urlencode ("Happy Marriage Matrimony.Your OTP is :".$a." Kindly use : www.hmmatrimony.com");
            $message=urlencode ("Happy Marriage Matrimony.Your OTP is :".$a." Kindly use : www.hmmatrimony.com -HMMATR");
            $curl = curl_init();
            //curl_setopt($curl, CURLOPT_URL, "http://bhashsms.com/api/sendmsg.php?user=hmmatrimony&pass=success&sender=HMMATR&priority=ndnd&stype=normal&phone=".$mobile."&text=".$message.""); 
            curl_setopt($curl, CURLOPT_URL, "http://site.ping4sms.com/api/httpapi?username=hmmatrimony&password=success&sender=HMMATR&route=2&number=".$mobile."&sms=".$message."&templateid=1207162823560830391");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
    		 echo "<script type=text/javascript>alert('Thank you for your Registration  with Happy marriage matrimony. We have sent you OTP to Verify Your Mobile number')
            window.location='verify_mobile.php?mobile_no=".$mobile."&reg_id=".$reg_id."';
            </script>";
        }
        else
        {
            echo "<script type=text/javascript>alert('Thank you for your Registration. Profile registered successfully')
            window.location='index.php';
            </script>";
        }
}
}

    }
elseif($command=='mail_form')
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$msg=$_POST['msg'];
$c_date=date('d-m-Y');
//echo "insert into contact(name,email,mobile,msg)values ('$name','$email','$mobile','$msg')";
mysqli_query($con,"insert into contact(name,email,mobile,msg,c_date)values ('$name','$email','$mobile','$msg','$c_date')") or die(mysqli_error($con));

echo "<script type=text/javascript>alert('Enquiry Submited Successfully.Your Enquiry Will be Shortly Process')
window.location='contact.php'
</script>";
}
?>