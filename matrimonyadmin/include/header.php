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
                    
                   <!-- ************li start******************-->
                    
						
                        <!-- ************li End******************-->
                        
                        
                        
                        
                        
                        
                        
                      <!-- ************li start******************-->  

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">1</span>
							</a>
<?php
date_default_timezone_set("Asia/Calcutta"); 
  $current_date_string=strtotime(date('d-m-Y'));

   $nex_week_string=$current_date_string+1209600;
$query125 = "SELECT COUNT(*) as num FROM register where valid_status='1' and (valid_string>=$current_date_string and valid_string<=$nex_week_string) order by  name  asc";
$total_pages124 = mysqli_fetch_array(mysqli_query($con,$query125));


$query125_wallet = "SELECT COUNT(*) as num FROM register where wallet_validity_end_string!='' and (wallet_validity_end_string>=$current_date_string and wallet_validity_end_string<=$nex_week_string) order by  name  asc";
$total_pages124_wallet = mysqli_fetch_array(mysqli_query($con,$query125_wallet));


?>
							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									 Notifications
								</li>

								<li>
									<a href="goingtoexpiry.php">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												Expiring Profiles
											</span>
											<span class="pull-right badge badge-info"><?php echo $total_pages124['num']; ?></span>
										</div>
									</a>
								</li>
								
								
									<li>
									<a href="goingtoexpiry_wallet.php">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												Expiring Wallets
											</span>
											<span class="pull-right badge badge-info"><?php echo $total_pages124_wallet['num']; ?></span>
										</div>
									</a>
								</li>
								
								
								
								
								
								
								
								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

<!-- ************li End******************-->
<!-- ************li start******************-->
						<!--<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-envelope-alt"></i>
									5 Messages
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="inbox.html">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>-->
                        <!-- ************li start******************-->
<?php
$ar=mysqli_query($con,"select * from admin where id='$id'");
$ar1=mysqli_fetch_array($ar);
$username=$ar1['username'];


?>         
                        <!-- ************li start******************-->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
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