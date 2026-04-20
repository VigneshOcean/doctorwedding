<?php
// Current page filename detect பண்ணு
$current_page = basename($_SERVER['PHP_SELF']);

// எந்த menu group active-ஆ இருக்குன்னு check பண்ணு
$master_pages   = ['view_caste.php','view_subcaste.php','view_education.php','edit_caste.php','edit_subcaste.php','edit_education.php'];
$users_pages    = ['login_details.php','print_count.php','normal_view_all.php','normal_admin_created.php','normal_active_users.php','normal_inactive_users.php','goingtoexpiry.php','premium_customer.php','marriage_notify_list.php','get_contact_history_list.php','goingtoexpiry_wallet.php','wallet_history.php'];
$search_pages   = ['advance_search.php','id_search.php','date_search.php','name_search.php','area_search.php','paid_search.php','mobile_search.php','search_result.php', 'date_result.php', 'name_result.php', 'paid_search_result.php', 'mobile_search_result.php', 'city_search.php'];
$message_pages  = ['compose_message.php','sent_items.php','marriage_notify.php'];
$enquiry_pages  = ['inbox_comman.php','inbox_private.php'];
$settings_pages = ['news.php','download.php','change_password.php','day_calculation.php'];

$is_master   = in_array($current_page, $master_pages);
$is_users    = in_array($current_page, $users_pages);
$is_search   = in_array($current_page, $search_pages);
$is_message  = in_array($current_page, $message_pages);
$is_enquiry  = in_array($current_page, $enquiry_pages);
$is_settings = in_array($current_page, $settings_pages);
$is_home     = ($current_page === 'home.php');
?>
<ul class="nav nav-list">

<li class="<?php echo $is_home ? 'active' : ''; ?>"><a href="home.php"><i class="icon-home"></i><span class="menu-text"> Dashboard </span></a></li>

<li class="<?php echo $is_master ? 'active' : ''; ?>">
<a href="#" class="dropdown-toggle"><i class="icon-list-alt"></i><span class="menu-text"> Master </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li class="<?php echo ($current_page=='view_caste.php') ? 'active' : ''; ?>"><a href="view_caste.php"><i class="icon-double-angle-right"></i>Caste</a></li>
<li class="<?php echo ($current_page=='view_subcaste.php') ? 'active' : ''; ?>"><a href="view_subcaste.php"><i class="icon-double-angle-right"></i>Sub Caste</a></li>
<li class="<?php echo ($current_page=='view_education.php') ? 'active' : ''; ?>"><a href="view_education.php"><i class="icon-double-angle-right"></i>Education</a></li>
</ul>
</li>

<li class="<?php echo $is_users ? 'active' : ''; ?>">
<a href="#" class="dropdown-toggle"><i class="icon-group"></i><span class="menu-text"> Users(Normal) </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li class="<?php echo ($current_page=='login_details.php') ? 'active' : ''; ?>"><a href="login_details.php"><i class="icon-double-angle-right"></i>Login Details</a></li>
<li class="<?php echo ($current_page=='print_count.php') ? 'active' : ''; ?>"><a href="print_count.php"><i class="icon-double-angle-right"></i>Printcount Details</a></li>
<li class="<?php echo ($current_page=='normal_view_all.php') ? 'active' : ''; ?>"><a href="normal_view_all.php"><i class="icon-double-angle-right"></i>All Profile</a></li>
<li class="<?php echo ($current_page=='normal_admin_created.php') ? 'active' : ''; ?>"><a href="normal_admin_created.php"><i class="icon-double-angle-right"></i>Admin Created Profile</a></li>
<li class="<?php echo ($current_page=='normal_active_users.php') ? 'active' : ''; ?>"><a href="normal_active_users.php"><i class="icon-double-angle-right"></i>Active Profiles</a></li>
<li class="<?php echo ($current_page=='normal_inactive_users.php') ? 'active' : ''; ?>"><a href="normal_inactive_users.php"><i class="icon-double-angle-right"></i>Inactive Profiles</a></li>
<li class="<?php echo ($current_page=='goingtoexpiry.php') ? 'active' : ''; ?>"><a href="goingtoexpiry.php"><i class="icon-double-angle-right"></i>Expiring Profiles</a></li>
<li class="<?php echo ($current_page=='premium_customer.php') ? 'active' : ''; ?>"><a href="premium_customer.php"><i class="icon-double-angle-right"></i>Premium Customers</a></li>
<li class="<?php echo ($current_page=='marriage_notify_list.php') ? 'active' : ''; ?>"><a href="marriage_notify_list.php"><i class="icon-double-angle-right"></i>Marriage Notification</a></li>
<li class="<?php echo ($current_page=='get_contact_history_list.php') ? 'active' : ''; ?>"><a href="get_contact_history_list.php"><i class="icon-double-angle-right"></i>Get Contact History</a></li>
<li class="<?php echo ($current_page=='goingtoexpiry_wallet.php') ? 'active' : ''; ?>"><a href="goingtoexpiry_wallet.php"><i class="icon-double-angle-right"></i>Expiring Wallets</a></li>
<li class="<?php echo ($current_page=='wallet_history.php') ? 'active' : ''; ?>"><a href="wallet_history.php"><i class="icon-double-angle-right"></i> Wallet History</a></li>
</ul>
</li>

<!--<li>
<a href="#" class="dropdown-toggle"><i class="icon-group"></i><span class="menu-text"> Users(Advance) </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li><a href="view_all.php"><i class="icon-double-angle-right"></i>All Profile</a></li>
<li><a href="admin_created.php"><i class="icon-double-angle-right"></i>Admin Created Profile</a></li>
<li><a href="active_users.php"><i class="icon-double-angle-right"></i>Active Profiles</a></li>
<li><a href="inactive_users.php"><i class="icon-double-angle-right"></i>Inactive Profiles</a></li>
</ul>
</li>-->

<li class="<?php echo $is_search ? 'active' : ''; ?>">
<a href="#" class="dropdown-toggle"><i class="icon-search"></i><span class="menu-text"> Search </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li class="<?php echo ($current_page=='advance_search.php' || $current_page=='search_result.php') ? 'active' : ''; ?>"><a href="advance_search.php"><i class="icon-double-angle-right"></i>Advance Search</a></li>
<li class="<?php echo ($current_page=='id_search.php') ? 'active' : ''; ?>"><a href="id_search.php"><i class="icon-double-angle-right"></i>Userid Search</a></li>
<li class="<?php echo ($current_page=='date_search.php' || $current_page=='date_result.php') ? 'active' : ''; ?>"><a href="date_search.php"><i class="icon-double-angle-right"></i>Date Search</a></li>
<li class="<?php echo ($current_page=='name_search.php' || $current_page=='name_result.php') ? 'active' : ''; ?>"><a href="name_search.php"><i class="icon-double-angle-right"></i>Name Search</a></li>
<li class="<?php echo ($current_page=='area_search.php' || $current_page=='city_search.php') ? 'active' : ''; ?>"><a href="area_search.php"><i class="icon-double-angle-right"></i>City Search</a></li>
<li class="<?php echo ($current_page=='paid_search.php' || $current_page=='paid_search_result.php') ? 'active' : ''; ?>"><a href="paid_search.php"><i class="icon-double-angle-right"></i>Paid customer Search</a></li>
<li class="<?php echo ($current_page=='mobile_search.php' || $current_page=='mobile_search_result.php') ? 'active' : ''; ?>"><a href="mobile_search.php"><i class="icon-double-angle-right"></i>Mobileno Search</a></li>
</ul>
</li>

<li class="<?php echo $is_message ? 'active' : ''; ?>">
<a href="#" class="dropdown-toggle"><i class="icon-envelope"></i><span class="menu-text"> Message </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li class="<?php echo ($current_page=='compose_message.php') ? 'active' : ''; ?>"><a href="compose_message.php"><i class="icon-double-angle-right"></i>Compose message</a></li>
<li class="<?php echo ($current_page=='sent_items.php') ? 'active' : ''; ?>"><a href="sent_items.php"><i class="icon-double-angle-right"></i>Sent items</a></li>
<li class="<?php echo ($current_page=='marriage_notify.php') ? 'active' : ''; ?>"><a href="marriage_notify.php"><i class="icon-double-angle-right"></i>Marriage Notification</a></li>
</ul>
</li>

<li class="<?php echo $is_enquiry ? 'active' : ''; ?>">
<a href="#" class="dropdown-toggle"><i class="icon-envelope"></i><span class="menu-text"> Enquiry </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li class="<?php echo ($current_page=='inbox_comman.php') ? 'active' : ''; ?>"><a href="inbox_comman.php"><i class="icon-double-angle-right"></i>Common</a></li>
<li class="<?php echo ($current_page=='inbox_private.php') ? 'active' : ''; ?>"><a href="inbox_private.php"><i class="icon-double-angle-right"></i>Private</a></li>
</ul>
</li>

<li class="<?php echo $is_settings ? 'active' : ''; ?>">
<a href="#" class="dropdown-toggle"><i class="icon-cogs"></i><span class="menu-text"> Settings </span><b class="arrow icon-angle-down"></b></a>
<ul class="submenu">
<li class="<?php echo ($current_page=='news.php') ? 'active' : ''; ?>"><a href="news.php"><i class="icon-double-angle-right"></i>News and Events</a></li>
<li class="<?php echo ($current_page=='download.php') ? 'active' : ''; ?>"><a href="download.php"><i class="icon-double-angle-right"></i>Download</a></li>
<li class="<?php echo ($current_page=='change_password.php') ? 'active' : ''; ?>"><a href="change_password.php"><i class="icon-double-angle-right"></i>Change Password</a></li>
<li class="<?php echo ($current_page=='day_calculation.php') ? 'active' : ''; ?>"><a href="day_calculation.php"><i class="icon-double-angle-right"></i>Age updation</a></li>
</ul>
</li>

</ul>

<script type="text/javascript">
(function() {
    function initMenu() {
        if (typeof jQuery === 'undefined') {
            setTimeout(initMenu, 100);
            return;
        }
        
        var $ = jQuery;
        $(document).ready(function() {
            // ACE JS default behavior override - Custom accordion handler
            $('.nav-list > li > a.dropdown-toggle').off('click').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var $this     = $(this);
                var $parentLi = $this.closest('li');
                var $submenu  = $this.next('ul.submenu');
                var isOpen    = $parentLi.hasClass('open');

                // எல்லா open menus-ஐயும் close பண்ணு (accordion)
                $('.nav-list > li.open').each(function() {
                    $(this).removeClass('open');
                    $(this).find('> ul.submenu').slideUp(150);
                });

                // Already open இருந்தா close பண்ணிட்டு stop
                if (isOpen) return;

                // இந்த menu-ஐ open பண்ணு
                $parentLi.addClass('open');
                $submenu.slideDown(150);
            });

            // Page load-ல் active menu-ஐ open பண்ணு
            var $activeSubItem = $('.nav-list > li > ul.submenu > li.active');
            if ($activeSubItem.length > 0) {
                var $parentLi = $activeSubItem.closest('.nav-list > li');
                $parentLi.addClass('open');
                $parentLi.find('> ul.submenu').show();
            } else {
                // sub-item active இல்லன்னா (e.g. search_result.php), parent-க்கு active class இருந்தா open பண்ணு
                var $activeParent = $('.nav-list > li.active');
                if ($activeParent.length > 0) {
                    $activeParent.addClass('open');
                    $activeParent.find('> ul.submenu').show();
                }
            }
        });
    }
    initMenu();
})();
</script>