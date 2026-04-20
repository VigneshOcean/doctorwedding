<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-heart"></i>
                           
							
							Doctor Wedding
						
                        
                        </small>
					</a>
				</div>
				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
                    
<?php
date_default_timezone_set('Asia/Kolkata');
$e12=mysqli_query($con, "select * from likes where to_id='$id' order by id desc");
$count_e12=mysqli_num_rows($e12);

$ghj=mysqli_query($con, "select * from register where id='$id'");
$riw_ghj=mysqli_fetch_array($ghj);
$cc_id=$riw_ghj['religion'];
$valid_string=$riw_ghj['valid_string'];
$curent_date=strtotime(date('d-m-Y'));
/*
one week diff:604800
0-Going to Expiry
1-Expired
*/
if($valid_string>$curent_date)
{
//Valid string greater than current date
$diff_bet=$valid_string-$curent_date;
if($diff_bet<604800)
{
$validity_mess='0';
}
}
else
{
//Validity Expired
$validity_mess='1';
}




?>                
                        
                        
                        
                      <!-- ************li start******************-->  

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo $count_e12; ?></span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									 Notifications
								</li>

								<li>
									<a href="likes.php">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-heart"></i>
												Like details
											</span>
											<span class="pull-right badge badge-info"><?php echo $count_e12; ?></span>
										</div>
									</a>
								</li>
<?php
if(isset($validity_mess))
{
?>
								<li>
									<a href="notification.php">
										<i class="btn btn-xs btn-primary icon-warning-sign"></i>
<?php if($validity_mess=='0') { echo 'Your Profile going to Expiry'; } if($validity_mess=='1') {  echo 'Profile already Expired'; } ?>
									</a>
<?php } ?>								</li>

								

								

								<!--<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>-->
							</ul>
						</li>

<!-- ************li End******************-->
<?php

$mess=mysqli_query($con, "select * from message where caste='$cc_id'");
$count_mess=mysqli_num_rows($mess);
?>
<!-- ************li start******************-->
						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success"><?php echo $count_mess; ?></span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-envelope-alt"></i>
									<?php echo $count_mess; ?> Messages
								</li>

<?php
while($row_mess=mysqli_fetch_array($mess))
{
?>

								<li>
									<a href="read_message.php?c_id=<?php echo $row_mess['id']; ?>">
										<img src="assets/avatars/avatar.png" class="msg-photo" alt="Admin" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">From : Admin</span><br />
												<?php echo $row_mess['subject']; ?>
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span><?php echo $row_mess['c_date']; ?></span>
											</span>
										</span>
									</a>
								</li>

								
<?php } ?>
								

								<li>
									<a href="inbox.php">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
                        <!-- ************li start******************-->
<?php
$ar=mysqli_query($con, "select * from register where id='$id'");
$ar1=mysqli_fetch_array($ar);
$username=$ar1['name'];
$uploadedfile1=$ar1['uploadedfile'];
$gender1=$ar1['gender'];
?>         
                        <!-- ************li start******************-->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
 <?php  if($uploadedfile1!='') { ?>  
  <img class="nav-user-photo" src="../profile/<?php echo $uploadedfile1; ?>" alt="<?php echo ucwords($username); ?>" />               
 <?php
 }
 else  {  if($gender1=='male') { ?>
  <img class="nav-user-photo" src="assets/avatars/avatar4.png" alt="<?php echo ucwords($username); ?>" />
<?php  }  if($gender1=='female') {  ?>   
       <img class="nav-user-photo" src="assets/avatars/avatar1.png" alt="<?php echo ucwords($username); ?>" />         
 <?php
 }
 }
 ?>
          


								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $username; ?> 
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="change_password.php">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="home.php">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
                        <!-- ************li start******************-->
                        
                        
                        
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div>