<?php
error_reporting(0);
include("../include/connect.php");
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script type='text/javascript'>window.location='index.php?err';</script>";
    exit;
} else {
    ini_set('upload_max_filesize', '20M');
    ini_set('post_max_size', '10M');
    ini_set('max_input_time', 300);
    ini_set('max_execution_time', 900);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Happy Marriage: Waiting for renewal Profile</title>
    <meta name="description" content="Profiles going to expire" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
    <style type="text/css">
        @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 300; src: local('Open Sans Light'), local('OpenSans-Light'), url(font_1.woff) format('woff'); }
        @font-face { font-family: 'Open Sans'; font-style: normal; font-weight: 400; src: local('Open Sans'), local('OpenSans'), url(font_2.woff) format('woff'); }
        .paginate { font-family: Arial, Helvetica, sans-serif; padding: 3px; margin: 3px; }
        .paginate a { padding: 2px 5px 2px 5px; margin: 2px; border: 1px solid #999; text-decoration: none; color: #0099FF; }
        .paginate a:hover, .paginate a:active { border: 1px solid #999; color: #3300CC; }
        .paginate span.current { margin: 2px; padding: 2px 5px 2px 5px; border: 1px solid #999; font-weight: bold; background-color: #999; color: #FFF; }
        .paginate span.disabled { padding: 2px 5px 2px 5px; margin: 2px; border: 1px solid #eee; color: #DDD; }
    </style>
    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <script src="assets/js/ace-extra.min.js"></script>
    <script language="JavaScript" type="text/javascript">
    var xmlHttp
    function getssts(str1) {
        xmlHttp=GetXmlHttpObject()
        if (xmlHttp==null) { alert ("Browser does not support HTTP Request"); return }
        var url="get_status.php";
        url=url+"?h="+str1;
        url=url+"&sid="+Math.random();
        xmlHttp.onreadystatechange=stateChangedga;
        xmlHttp.open("GET",url,true);
        xmlHttp.send(null);
    }
    function stateChangedga() {
        if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
            window.location='normal_view_all.php';
        }
    }
    function GetXmlHttpObject() {
        var xmlHttp=null;
        try { xmlHttp=new XMLHttpRequest(); }
        catch (e) {
            try { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
            catch (e) { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
        }
        return xmlHttp;
    }
    </script>
</head>
<body>
    <div class="navbar navbar-default" id="navbar">
        <script type="text/javascript">try{ace.settings.check('navbar' , 'fixed')}catch(e){}</script>
        <?php include("include/header.php"); ?>
    </div>
    <div class="main-container" id="main-container">
        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#"><span class="menu-text"></span></a>
            <div class="sidebar" id="sidebar">
                <script type="text/javascript">try{ace.settings.check('sidebar' , 'fixed')}catch(e){}</script>
                <?php include('include/menu.php'); ?>
            </div>
            <div class="main-content">
                <div class="page-content">
                    <div class="page-header"><h1>Expiring Profiles</h1></div>
                    <div class="row">
                        <div class="col-xs-12">
<?php
$current_date_string = strtotime(date('d-m-Y'));
$nex_week_string     = $current_date_string + 1209600;
$tableName  = "register";
$targetpage = "goingtoexpiry.php";
$limit = 10;
$page  = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$start = ($page - 1) * $limit;
$count_res = mysqli_query($con, "SELECT COUNT(*) as num FROM $tableName WHERE valid_status='1' AND (valid_string>=$current_date_string AND valid_string<=$nex_week_string)");
$total_count = 0;
if ($count_res) {
    $count_row = mysqli_fetch_assoc($count_res);
    $total_count = (int)($count_row['num'] ?? 0);
}
$result = mysqli_query($con, "SELECT * FROM $tableName WHERE valid_status='1' AND (valid_string>=$current_date_string AND valid_string<=$nex_week_string) ORDER BY valid_string ASC LIMIT $start, $limit");
$lastpage = ($total_count > 0) ? (int)ceil($total_count / $limit) : 1;
if ($lastpage > 1) {
    echo "<div class='paginate'>";
    if ($page > 1) echo "<a href='{$targetpage}?page=" . ($page - 1) . "'>previous</a>";
    else echo "<span class='disabled'>previous</span>";
    $range = 3;
    $start_page = max(1, $page - $range);
    $end_page   = min($lastpage, $page + $range);
    if ($start_page > 1) { echo "<a href='{$targetpage}?page=1'>1</a>"; if ($start_page > 2) echo "..."; }
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $page) echo "<span class='current'>$i</span>";
        else echo "<a href='{$targetpage}?page=$i'>$i</a>";
    }
    if ($end_page < $lastpage) { if ($end_page < $lastpage - 1) echo "..."; echo "<a href='{$targetpage}?page=$lastpage'>$lastpage</a>"; }
    if ($page < $lastpage) echo "<a href='{$targetpage}?page=" . ($page + 1) . "'>next</a>";
    else echo "<span class='disabled'>next</span>";
    echo "</div>";
}
?>
                            <form enctype="multipart/form-data" method="post" action="goto_search.php" name="frm">
                                <input id="command" type="hidden" name="command" value="goingtoexpiry.php">
                                <div align="right">Goto page no: <input id="goto" type="text" style="width:50px;" name="goto"><input type="submit" value="go" name="submit"></div>
                            </form>
                            <span style="font-weight:bold; color:#006600; margin-left:10%; font-size:18px;">Total number of records : <?php echo $total_count; ?> Profiles </span>
                            <div class="row"><div class="col-xs-12"><div class="table-responsive">
                                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th><th>Email</th><th>Mobile Number</th><th>Dob/Age</th><th>Caste/SubCaste</th><th>Expiry date</th><th>Action</th><th>Delete</th>
                                        </tr>
                                    </thead><tbody>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    while ($row_e = mysqli_fetch_assoc($result)) {
        $e_id     = $row_e['id'];
        $religion = $row_e['religion'] ?? '';
        $caste    = $row_e['caste'] ?? '';
        $e1       = mysqli_query($con, "SELECT * FROM caste WHERE id='$religion'");
        $row_e1   = ($e1 && mysqli_num_rows($e1) > 0) ? mysqli_fetch_assoc($e1) : [];
        $e11      = mysqli_query($con, "SELECT * FROM subcaste WHERE id='$caste'");
        $row_e11  = ($e11 && mysqli_num_rows($e11) > 0) ? mysqli_fetch_assoc($e11) : [];
?>
                                        <tr>
                                            <td><?php echo ucwords((string)($row_e['name'] ?? '')); ?></td>
                                            <td><?php echo $row_e['email'] ?? ''; ?></td>
                                            <td><?php echo $row_e['mobile'] ?? ''; ?></td>
                                            <td><?php echo ($row_e['dob'] ?? ''); ?>/<?php echo ($row_e['age'] ?? ''); ?></td>
                                            <td><?php echo ucwords((string)($row_e1['caste'] ?? '')); ?>/<?php echo ucwords((string)($row_e11['subcaste'] ?? '')); ?></td>
                                            <td><?php echo $row_e['valid_for'] ?? ''; ?></td>
                                            <td>
                                                <a href="edit.php?userid=<?php echo $e_id; ?>" target="_blank" title="View/Edit Profile"><button class="btn btn-xs btn-info"><i class="icon-edit bigger-120"></i></button></a>
                                                <a href="validity.php?userid=<?php echo $e_id; ?>" target="_blank" title="Set validity"><button class="btn btn-xs btn-warning"><i class="icon-flag bigger-120"></i></button></a>
                                                <a href="walletsetup.php?userid=<?php echo $e_id; ?>" target="_blank" title="Set Wallet"><button class="btn btn-xs btn-purple"><i class="icon-money bigger-120"></i></button></a>
                                            </td>
                                            <td><a href="delete_profile.php?id=<?php echo $e_id; ?>&pagename=goingtoexpiry.php" onClick="return confirm('Are you sure you want to delete?')"><button class="btn btn-xs btn-danger"><i class="icon-trash bigger-120"></i></button></a></td>
                                        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8' align='center'>No records found</td></tr>";
}
?>
                                    </tbody></table>
                            </div></div></div>
                        </div></div></div></div></div>
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"><i class="icon-double-angle-up icon-only bigger-110"></i></a>
    </div>
    <script type="text/javascript">window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/typeahead-bs2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.js"></script>
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>
</body>
</html>
<?php
}
?>