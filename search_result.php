<?php
include("include/connect.php");
session_start();

// Helper function to fetch results
function fetchProfiles($con, $filters, $page, $limit)
{
    $gender = isset($filters['gender']) ? $filters['gender'] : 'female';
    $from_age = isset($filters['age1']) ? $filters['age1'] : 18;
    $to_age = isset($filters['age2']) ? $filters['age2'] : 60;
    $caste = isset($filters['caste']) ? $filters['caste'] : '';
    $education = isset($filters['education']) ? $filters['education'] : '';
    $photo = isset($filters['photo']) ? $filters['photo'] : 2;

    $where = "WHERE gender='$gender' AND age BETWEEN '$from_age' AND '$to_age' AND status='1'";
    if ($caste)
        $where .= " AND religion='$caste'";
    if ($education)
        $where .= " AND education LIKE '%$education%'";
    if ($photo == 0)
        $where .= " AND uploadedfile=''";
    if ($photo == 1)
        $where .= " AND uploadedfile!=''";

    $total_res = mysqli_query($con, "SELECT COUNT(*) AS cnt FROM register $where");
    $total = mysqli_fetch_assoc($total_res);
    $total_count = $total['cnt'];
    $total_pages = ceil($total_count / $limit);
    $start = ($page - 1) * $limit;
    $result = mysqli_query($con, "SELECT * FROM register $where ORDER BY id DESC LIMIT $start, $limit");

    ob_start();
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='search-summary mb-3 d-flex justify-content-between align-items-center'>
                <h4 class='text-success fw-bold' style='font-size: 18px;'>Total number of records as per your search : $total_count Profiles</h4>
              </div>";

        // Pagination top
        renderPagination($page, $total_pages);

        while ($row = mysqli_fetch_assoc($result)) {
            $caste_id = $row['religion'];
            $caste_query = mysqli_query($con, "SELECT caste FROM caste WHERE id='$caste_id'");
            $caste_data = mysqli_fetch_assoc($caste_query);
            $caste_name = $caste_data['caste'] ?? 'N/A';

            echo "
            <div class='profile-row-container mb-3'>
                <table width='100%' class='profile-table'>
                    <tr>
                        <td width='50%'>
                            <table width='100%' cellpadding='3'>
                                <tr>
                                    <td width='45%' align='right'><span class='lbl-blue'>Name</span></td>
                                    <td width='5%'>:</td>
                                    <td><span class='val-red'>" . ucwords($row['name']) . "</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Date of Birth---Age</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>{$row['dob']}---{$row['age']}</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Education</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>" . ucwords($row['edu_det'] ?: 'N/A') . "</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Star</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>" . ucwords($row['star']) . "</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Job Details</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>" . ucwords($row['job'] ?: 'N/A') . "</span></td>
                                </tr>
                            </table>
                        </td>
                        <td width='50%'>
                            <table width='100%' cellpadding='3'>
                                <tr>
                                    <td width='45%' align='right'><span class='lbl-blue'>Userid</span></td>
                                    <td width='5%'>:</td>
                                    <td><span class='val-red'>" . ($row['username'] ?: $row['id']) . "</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Time of Birth</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>{$row['tob']}</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Residential Address</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>******</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Moonsign</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>" . ucwords($row['moonsign'] ?: 'N/A') . "</span></td>
                                </tr>
                                <tr>
                                    <td align='right'><span class='lbl-blue'>Salary</span></td>
                                    <td>:</td>
                                    <td><span class='val-red'>{$row['salary']}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' align='center' class='pt-2'>
                            <a href='login.php' class='view-more-btn' style='text-decoration:none; display:inline-block;'>Click here to view more..</a>
                        </td>
                    </tr>
                </table>
            </div>";
        }

        // Pagination bottom
        renderPagination($page, $total_pages);
    } else {
        echo "<div class='alert alert-info text-center'>No profiles found matching your criteria.</div>";
    }
    return ob_get_clean();
}

function renderPagination($page, $total_pages)
{
    if ($total_pages <= 1) return;
    echo "<div class='pagination-container d-flex justify-content-start gap-1 my-3'>";
    if ($page > 1) {
        echo "<a href='#' data-page='" . ($page - 1) . "' class='pg-btn'>previous</a>";
    } else {
        echo "<span class='pg-btn pg-disabled'>previous</span>";
    }

    $start_p = 1;
    $end_p = $total_pages;
    if ($total_pages > 10) {
        $start_p = max(1, $page - 4);
        $end_p = min($total_pages, $page + 5);
        if ($start_p == 1) $end_p = 10;
        if ($end_p == $total_pages) $start_p = $total_pages - 9;
    }

    for ($i = $start_p; $i <= $end_p; $i++) {
        if ($i < 1) continue;
        $active = ($i == $page) ? "pg-active" : "";
        echo "<a href='#' data-page='$i' class='pg-btn $active'>$i</a>";
    }

    if ($page < $total_pages) {
        echo "<a href='#' data-page='" . ($page + 1) . "' class='pg-btn'>next</a>";
    } else {
        echo "<span class='pg-btn pg-disabled'>next</span>";
    }
    echo "</div>";
}

// AJAX handler
if (isset($_GET['ajax']) && $_GET['ajax'] == 1) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        echo fetchProfiles($con, $_POST, $page, 10);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advance Search - Adidravidar Matrimony</title>
    <link type="text/css" rel="stylesheet" href="css/header-footer.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background: #fdfdfd; font-family: Arial, sans-serif; }
        .main-container { max-width: 1200px; margin: 30px auto; background: #fff; padding: 25px; border: 1px solid #ddd; }
        .search-form-card { background: #fff; padding: 20px; border: 1px solid #eee; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.03); margin-bottom: 30px; }
        .form-label { font-weight: bold; font-size: 13px; color: #333; }
        .form-select, .form-control { font-size: 13px; padding: 8px; border-radius: 5px; }
        
        /* New Table Style (Matching 2nd Image) */
        .profile-row-container { border: 1px solid #0099FF; padding: 10px; border-radius: 4px; background: #fff; }
        .lbl-blue { color: #0033FF; font-weight: bold; font-size: 13px; }
        .val-red { color: #FF0000; font-size: 13px; }
        .view-more-btn { background: #FFD27F; border: 1px solid #EAA000; padding: 2px 15px; font-size: 12px; color: #444; cursor: pointer; border-radius: 3px; }
        .view-more-btn:hover { background: #ffc966; }

        /* Pagination Style */
        .pg-btn { padding: 3px 8px; margin: 2px; border: 1px solid #999; text-decoration: none !important; color: #0099FF; font-size: 12px; background: #fff; }
        .pg-btn:hover { background: #f0f0f0; }
        .pg-btn.pg-active { background: #999; color: #fff; font-weight: bold; }
        .pg-btn.pg-disabled { color: #ccc; border-color: #eee; cursor: not-allowed; }

        .custom-dialog { border-radius: 12px !important; overflow: hidden !important; box-shadow: 0 10px 40px rgba(0,0,0,0.3) !important; }
        .custom-dialog .ui-dialog-titlebar { background: #07642f !important; color: #fff !important; border: none !important; }

        /* Tab Styles */
        .search-nav-tabs { display: flex; gap: 5px; margin-bottom: -1px; position: relative; z-index: 10; padding-left: 10px; }
        .search-nav-link { padding: 10px 25px; background: #f8f9fa; border: 1px solid #ddd; border-bottom: none; border-radius: 10px 10px 0 0; text-decoration: none !important; color: #666; font-weight: 600; font-size: 14px; transition: 0.2s; }
        .search-nav-link:hover { background: #e9ecef; color: #333; }
        .search-nav-link.active { background: #07642f; color: #fff; border-color: #07642f; }
    </style>
</head>
<body>
    <?php include("include/header.php"); ?>
    <div class="container main-container">
        <!-- Search Tabs -->
        <div class="search-nav-tabs">
            <a href="search_result.php" class="search-nav-link active">Advanced Search</a>
            <a href="userid_search.php" class="search-nav-link">User ID Search</a>
        </div>

        <div class="search-form-card">
            <h5 class="text-success fw-bold mb-4 border-bottom pb-2">Advanced Member Search</h5>
            <form id="searchForm">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Looking for</label>
                        <select class="form-select" name="gender" id="gender" onchange="agelimit(this.value)">
                            <option value="female">Bride</option>
                            <option value="male">Groom</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Age</label>
                        <div class="input-group">
                            <select class="form-select" name="age1" id="age1" onchange="updateMaxAge()"></select>
                            <span class="input-group-text">to</span>
                            <select class="form-select" name="age2" id="age2"></select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Education</label>
                        <select class="form-select" name="education">
                            <option value="">Any Education</option>
                            <?php 
                            $eduRes = mysqli_query($con, "SELECT * FROM education ORDER BY id DESC");
                            while($e = mysqli_fetch_assoc($eduRes)) echo "<option value='{$e['education']}'>{$e['education']}</option>";
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Caste</label>
                        <select class="form-select" name="caste">
                            <option value="">Any Caste</option>
                            <?php 
                            $cRes = mysqli_query($con, "SELECT * FROM caste ORDER BY caste ASC");
                            while($c = mysqli_fetch_assoc($cRes)) echo "<option value='{$c['id']}'>".ucwords($c['caste'])."</option>";
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label class="form-label d-block mb-2">Photo</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo" value="0">
                            <label class="form-check-label small">Without</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo" value="1">
                            <label class="form-check-label small">With</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="photo" value="2" checked>
                            <label class="form-check-label small">All</label>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100 fw-bold">Search Profiles</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="profile-results">
            <!-- Load profiles here -->
        </div>
    </div>

    <script>
        function agelimit(gender) {
            let min = (gender === 'male') ? 21 : 18;
            let age1 = $('#age1'), age2 = $('#age2');
            let currentAge1 = age1.val();

            // Set default if empty or invalid for new gender
            if (!currentAge1 || parseInt(currentAge1) < min) {
                currentAge1 = (min > 18 ? min : 18);
            }

            age1.empty(); 
            for(let i=min; i<=60; i++) {
                let isSelected = (i == currentAge1);
                age1.append(new Option(i, i, isSelected, isSelected));
            }
            
            // Explicitly set to be sure
            age1.val(currentAge1);
            updateMaxAge();
        }

        function updateMaxAge() {
            let age1Val = parseInt($('#age1').val());
            let currentAge2Val = $('#age2').val();
            let age2 = $('#age2');
            
            // Determine target value: if no current valid selection, use 40
            let targetAge2 = currentAge2Val;
            if (!targetAge2 || parseInt(targetAge2) <= age1Val) {
                targetAge2 = 40;
                if (targetAge2 <= age1Val) targetAge2 = age1Val + 1;
            }

            age2.empty();
            for(let i = age1Val + 1; i <= 60; i++) {
                let isSelected = (i == targetAge2);
                age2.append(new Option(i, i, isSelected, isSelected));
            }
            
            // Explicitly set the value to be sure
            age2.val(targetAge2);
        }

        function loadProfiles(page = 1) {
            $.ajax({
                url: "?ajax=1&page="+page,
                method: "POST",
                data: $("#searchForm").serialize(),
                success: function(data) {
                    $("#profile-results").html(data);
                    window.scrollTo(0, 0);
                }
            });
        }

        $(document).on("click", ".pg-btn", function(e) {
            e.preventDefault();
            let p = $(this).data("page");
            if(p) loadProfiles(p);
        });

        $(document).on("click", ".showDialog", function() {
            let id = $(this).data("id");
            $("<div></div>").dialog({
                modal: true, width: 950, height: 600, title: "Profile Preview",
                classes: {"ui-dialog": "custom-dialog"},
                open: function() {
                    $(this).load("sample.php?user_id="+id);
                },
                close: function() { $(this).remove(); }
            });
        });

        $("#searchForm").submit(function(e) { e.preventDefault(); loadProfiles(1); });
        
        // Init
        agelimit('female');
        loadProfiles(1);
    </script>
</body>
</html>