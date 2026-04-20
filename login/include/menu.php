<?php
$saha=mysqli_query($con,"select * from register where id='$id'");
$saha_row=mysqli_fetch_array($saha);
$eduction_saha=$riw_ghj['education'];
$religion_saha=$riw_ghj['religion'];
?>
<ul class="nav nav-list">

<li class="active"><a href="dashboard.php"><i class="icon-home"></i><span class="menu-text"> Dashboard </span></a></li>
<li><a href="home.php"><i class="icon-user"></i><span class="menu-text"> My Profile </span></a></li> 
<li><a href="edit.php"><i class="icon-edit"></i><span class="menu-text"> Edit Profile </span></a></li> 


<li><a href="advance_search.php"><i class="icon-search"></i><span class="menu-text"> Search your Matches </span></a></li> 
<?php
if(isset($religion_saha) && $religion_saha!='27')
{
if(isset($eduction_saha) && $eduction_saha!='10TH/12TH')
{
?>
<li><a href="govt_search.php"><i class="icon-search"></i><span class="menu-text"> Govt Search </span></a></li> 

<?php
}
}
?>
<li><a href="id_search.php"><i class="icon-search"></i><span class="menu-text"> Id Search </span></a></li> 

<!--<li>
<a href="#" class="dropdown-toggle"><i class="icon-search"></i><span class="menu-text"> Search </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li><a href="advance_search.php"><i class="icon-double-angle-right"></i>Advance Search</a></li>
<li><a href="id_search.php"><i class="icon-double-angle-right"></i>Id Search</a></li>
</ul>
</li>-->
  <li><a href="get_contact_history.php"><i class="icon-envelope"></i><span class="menu-text"> Get Contact </span></a></li>     

  <li><a href="likes.php"><i class="icon-heart"></i><span class="menu-text"> Likes </span></a></li>    
  
    <li><a href="like_response.php"><i class="icon-heart"></i><span class="menu-text"> My shortlist </span></a></li>  
  <li>
<a href="#" class="dropdown-toggle"><i class="icon-envelope"></i><span class="menu-text"> Message </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li><a href="compose.php"><i class="icon-double-angle-right"></i>Compose</a></li>
<li><a href="inbox.php"><i class="icon-double-angle-right"></i>Inbox</a></li>

</ul>
</li>     

<li><a href="../index.php?show_payment" target="_blank"><i class="icon-cogs"></i><span class="menu-text"> Payment Link </span></a></li>                     
<li><a href="change_password.php"><i class="icon-cogs"></i><span class="menu-text"> Change Password </span></a></li>                           
<li><a href="logout.php"><i class="icon-off"></i><span class="menu-text"> Logout </span></a></li>


</ul>