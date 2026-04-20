    <style>
.dropbtn {
   
    display: block;
    color: #333333;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 40px;
    font-weight: 600;
    margin-left:23px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

/*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/
</style>
     <nav class="nav">
          <ul class="sf-menu">
            <li class="active"><a href="index.php"><i class="fa  fa-home"></i> Home</a></li>
    <!--        <li> <a href="about.php">About Us</a> </li>-->
    <!--         <li><a  href="search_result.php" title="Find Partner">Advance Search</a> </li>-->
			 <!--<li><a  href="userid_search.php" title="Find Partner">Userid Search</a> </li>-->

			    
			 
			 <li><a  href="login.php" title="Login">Login</a> </li>
			 <li><a  href="register_user.php" title="Register Now">Register Now</a> </li>
			 			 <div class="dropdown">
   <a class="dropbtn" href="#">PAYMENT</a>
  <div class="dropdown-content">
    <a href="paynow.php?plan_id=1"> Silver</a></li>
    <a href="paynow.php?plan_id=2"> Gold</a>
    <a href="paynow.php?plan_id=3"> Platinum</a>
  </div>
</div>
			 <li><a  href="contact.php" title="Feel free to ask us">Contact us</a> </li>


          </ul>
        </nav>