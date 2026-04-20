<?php
include("include/connect.php");
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
    $command = $_POST['command'];
    $gender = $_POST['gender'];
    $from_age = $_POST['age1'];
    $to_age = $_POST['age2'];
    $photo = $_POST['photo'];
    $_SESSION['gender1'] = $gender;
    $_SESSION['from_age1'] = $from_age;
    $_SESSION['to_age1'] = $to_age;
    $_SESSION['command1'] = $command;
    $_SESSION['photo1'] = $photo;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("include/title.php"); ?>

    <!-- Modern Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/modern-design.css">
    <link rel="stylesheet" href="css/header-footer.css">

    <style>
        :root {
            --premium-green: #07642f;
            --premium-green-dark: #07642f;
            --glass-bg: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.4);
        }

        body {
            background: #f4f7f1;
            font-family: 'Inter', sans-serif;
        }

        .page-header {
            background: linear-gradient(135deg, #1b2e1b 0%, #3a5c3a 100%);
            padding: 60px 0;
            color: white;
            margin-bottom: -50px;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
        }

        .breadcrumb-custom {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .breadcrumb-custom a {
            color: white;
            text-decoration: none;
        }

        /* Glassmorphism Search Card */
        .search-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
            position: relative;
            z-index: 10;
        }

        .form-label {
            font-weight: 600;
            color: #2e4a2e;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .form-select,
        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #e0e6e0;
            background: #fff;
            transition: all 0.3s;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: var(--premium-green);
            box-shadow: 0 0 0 4px rgba(104, 159, 56, 0.1);
        }

        /* Profile Card Styling */
        .profile-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .profile-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            position: relative;
        }

        .profile-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .profile-header {
            background: linear-gradient(45deg, #f9fafb, #ffffff);
            padding: 20px;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-name {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.25rem;
            color: #1b2e1b;
            margin: 0;
        }

        .user-id {
            background: #e8f5e9;
            color: var(--premium-green);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .profile-body {
            padding: 20px;
        }

        .info-row {
            display: flex;
            margin-bottom: 12px;
            font-size: 0.9rem;
        }

        .info-label {
            width: 100px;
            color: #6b7280;
            font-weight: 500;
        }

        .info-value {
            flex: 1;
            color: #1f2937;
            font-weight: 600;
        }

        .btn-view-more {
            width: 100%;
            padding: 12px;
            background: var(--premium-green);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-view-more:hover {
            background: var(--premium-green-dark);
            transform: scale(1.02);
            color: white;
        }

        .govt-tag {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 5;
        }

        .paginate-container {
            display: flex;
            justify-content: center;
            margin: 40px 0;
        }

        .pagination .page-link {
            border-radius: 8px;
            margin: 0 3px;
            color: var(--premium-green);
            border: 1px solid #e0e6e0;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--premium-green);
            border-color: var(--premium-green);
        }

        .no-records {
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 20px;
            color: #6b7280;
        }

        .radio-group {
            display: flex;
            gap: 15px;
            padding-top: 5px;
        }

        .form-check-input:checked {
            background-color: var(--premium-green);
            border-color: var(--premium-green);
        }
    </style>
</head>

<body>

    <?php include("include/header.php"); ?>

    <div class="page-header">
        <div class="container text-center">
            <h1>Govt Job Profiles</h1>
            <p class="breadcrumb-custom">
                <a href="index.php">Home</a> <i class="bi bi-chevron-right mx-2"></i> Search <i
                    class="bi bi-chevron-right mx-2"></i> Govt Search
            </p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="search-card">
            <form action="govt_search.php" method="post">
                <input type="hidden" name="command" value="search_profile" />
                <div class="row g-4 align-items-end">
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label">Looking for</label>
                        <select class="form-select" name="gender">
                            <option value="female" <?php if ($_SESSION['gender1'] == 'female')
                                echo 'selected'; ?>>Bride
                                (Female)</option>
                            <option value="male" <?php if ($_SESSION['gender1'] == 'male')
                                echo 'selected'; ?>>Groom (Male)
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Age Range</label>
                        <div class="input-group">
                            <select class="form-select" name="age1">
                                <?php for ($i = 18; $i <= 60; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php if ($_SESSION['from_age1'] == $i || ($i == 18 && !$_SESSION['from_age1']))
                                           echo 'selected'; ?>><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <span class="input-group-text bg-white border-start-0 border-end-0">to</span>
                            <select class="form-select" name="age2">
                                <?php for ($i = 18; $i <= 60; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php if ($_SESSION['to_age1'] == $i || ($i == 40 && !$_SESSION['to_age1']))
                                           echo 'selected'; ?>><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label">Photo Status</label>
                        <div class="radio-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="photo" id="photoAll" value="2" <?php if ($_SESSION['photo1'] == '2' || !isset($_SESSION['photo1']))
                                    echo 'checked'; ?>>
                                <label class="form-check-label" for="photoAll">All</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="photo" id="photoWith" value="1" <?php if ($_SESSION['photo1'] == '1')
                                    echo 'checked'; ?>>
                                <label class="form-check-label" for="photoWith">With Photo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button type="submit" name="submit" class="btn-view-more border-0">
                            <i class="bi bi-search me-2"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="results-section">
            <?php
            if (isset($_SESSION['command1'])) {
                $gender = $_SESSION['gender1'];
                $from_age = $_SESSION['from_age1'];
                $to_age = $_SESSION['to_age1'];
                $photo = $_SESSION['photo1'];

                $aa = " WHERE id!='' AND status='1' AND govt_job='Yes' ";
                if ($gender)
                    $aa .= " AND gender='$gender' ";
                if ($from_age)
                    $aa .= " AND age>='$from_age' ";
                if ($to_age)
                    $aa .= " AND age<='$to_age' ";

                if (isset($photo)) {
                    if ($photo == 0)
                        $aa .= " AND uploadedfile='' ";
                    if ($photo == 1)
                        $aa .= " AND uploadedfile!='' ";
                }

                $tableName = "register";
                $limit = 6;
                $query = "SELECT COUNT(*) as num FROM $tableName " . $aa;
                $count_res = mysqli_query($con, $query);
                $total_pages = mysqli_fetch_array($count_res)['num'];

                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                $query1 = "SELECT * FROM $tableName " . $aa . " ORDER BY id DESC LIMIT $start, $limit";
                $result = mysqli_query($con, $query1);

                echo '<div class="d-flex justify-content-between align-items-center mb-4">';
                echo '<h4 class="fw-bold m-0">' . $total_pages . ' Profiles Found</h4>';
                echo '</div>';

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="profile-wrapper">';
                    while ($usprod = mysqli_fetch_array($result)) {
                        $caste_id = $usprod['religion'];
                        $caste_res = mysqli_query($con, "SELECT caste FROM caste WHERE id='$caste_id'");
                        $caste_data = mysqli_fetch_array($caste_res);

                        $subcaste_id = $usprod['caste'];
                        $sub_res = mysqli_query($con, "SELECT subcaste FROM subcaste WHERE id='$subcaste_id'");
                        $subcaste_data = mysqli_fetch_array($sub_res);
                        ?>
                        <div class="profile-card">
                            <div class="profile-header">
                                <h3 class="profile-name"><?php echo ucwords($usprod['name']); ?></h3>
                                <span class="user-id">#<?php echo $usprod['username']; ?></span>
                            </div>
                            <div class="profile-body">
                                <div class="info-row">
                                    <span class="info-label">Age</span>
                                    <span class="info-value"><?php echo $usprod['age']; ?> Years</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Caste</span>
                                    <span class="info-value"><?php echo ucwords($caste_data['caste'] ?: 'Adidravidar'); ?></span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Sub Caste</span>
                                    <span class="info-value"><?php echo ucwords($subcaste_data['subcaste'] ?: '-'); ?></span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Job Details</span>
                                    <span
                                        class="info-value text-truncate"><?php echo ucwords($usprod['job'] ?: 'Government Sector'); ?></span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label">Star/Sign</span>
                                    <span class="info-value"><?php echo ucwords($usprod['star']); ?> /
                                        <?php echo ucwords($usprod['moonsign']); ?></span>
                                </div>

                                <button class="btn-view-more showDialog" name="<?php echo $usprod['id']; ?>">
                                    View Full Profile
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';

                    // Pagination logic
                    if ($total_pages > $limit) {
                        $lastpage = ceil($total_pages / $limit);
                        echo '<div class="paginate-container"><nav><ul class="pagination">';
                        for ($i = 1; $i <= $lastpage; $i++) {
                            $active = ($i == $page) ? 'active' : '';
                            echo '<li class="page-item ' . $active . '"><a class="page-link" href="govt_search.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                        echo '</ul></nav></div>';
                    }
                } else {
                    echo '<div class="no-records">
                            <i class="bi bi-person-exclamation fs-1 d-block mb-3"></i>
                            <h5>No records found matches your criteria</h5>
                            <p>Try adjusting your filters to see more results</p>
                          </div>';
                }
            } else {
                echo '<div class="no-records">
                        <i class="bi bi-search fs-1 d-block mb-3"></i>
                        <h5>Search for your perfect partner</h5>
                        <p>Fill in the details above to start browsing government employee profiles</p>
                      </div>';
            }
            ?>
        </div>
    </div>

    <?php include("include/footer.php"); ?>

    <!-- Modal Implementation -->
    <!-- Modern UI Dependencies -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        $(document).on("click", ".showDialog", function () {
            var user_id = $(this).attr("name");
            var url = "sample.php?user_id=" + user_id;
            var tag = $("<div></div>");

            $.ajax({
                url: url,
                success: function (data) {
                    // Ensure any previous dialogs are cleared
                    $(".ui-dialog-content").dialog("destroy").remove();

                    $('body').css('overflow', 'hidden');
                    tag.html(data).dialog({
                        show: { effect: "fade", duration: 300 },
                        hide: { effect: "fade", duration: 300 },
                        open: function () {
                            var $dialog = $(this).closest('.ui-dialog');
                            var $overlay = $('.ui-widget-overlay');
                            var $closeBtn = $dialog.find('.ui-dialog-titlebar-close');

                            // Ultra-Robust Close Button Styling (Inline to override everything)
                            $closeBtn.css({
                                'background': '#ffffff url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'16\' height=\'16\' fill=\'black\' class=\'bi bi-x-lg\' viewBox=\'0 0 16 16\'%3E%3Cpath d=\'M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z\'/%3E%3C/svg%3E") no-repeat center',
                                'background-size': '18px',
                                'border': 'none',
                                'border-radius': '50%',
                                'width': '36px',
                                'height': '36px',
                                'position': 'absolute',
                                'top': '50%',
                                'right': '25px',
                                'transform': 'translateY(-50%)',
                                'box-shadow': '0 4px 10px rgba(0, 0, 0, 0.3)',
                                'cursor': 'pointer',
                                'display': 'block',
                                'visibility': 'visible',
                                'opacity': '1',
                                'padding': '0',
                                'margin': '0',
                                'z-index': '1000'
                            }).attr('title', 'Close');

                            // Hide default jQuery UI icon
                            $closeBtn.find('.ui-icon, .ui-button-icon').hide();

                            // Premium Overlay styling
                            $overlay.css({
                                'background': 'rgba(0,0,0,0.6)',
                                'backdrop-filter': 'blur(8px)',
                                '-webkit-backdrop-filter': 'blur(8px)',
                                'opacity': '1',
                                'position': 'fixed',
                                'z-index': '30000'
                            });
                            
                            $overlay.off('click').on('click', function () {
                                tag.dialog('close');
                            });
                        },
                        close: function (event, ui) {
                            $('body').css('overflow', 'auto');
                            $(this).dialog('destroy').remove();
                        },
                        resizable: false,
                        modal: true,
                        closeOnEscape: true,
                        title: "Profile Details",
                        width: window.innerWidth > 992 ? 950 : '95%',
                        height: window.innerWidth > 992 ? 650 : '85%',
                        draggable: false,
                        classes: { "ui-dialog": "custom-dialog" }
                    });
                }
            });
        });
    </script>

    <style>
        .custom-dialog {
            border-radius: 20px !important;
            padding: 0 !important;
            border: none !important;
            overflow: hidden !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6) !important;
            z-index: 30001 !important;
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            max-width: 95vw !important;
        }

        .custom-dialog .ui-dialog-titlebar {
            background: var(--premium-green) !important;
            color: white !important;
            border: none !important;
            padding: 22px 30px !important;
            border-radius: 0 !important;
            font-family: 'Playfair Display', serif !important;
        }

        .custom-dialog .ui-dialog-titlebar-close {
            background: #ffffff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='black' class='bi bi-x-lg' viewBox='0 0 16 16'%3E%3Cpath d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z'/%3E%3C/svg%3E") no-repeat center !important;
            border: none !important;
            border-radius: 50% !important;
            width: 36px !important;
            height: 36px !important;
            position: absolute !important;
            top: 50% !important;
            right: 25px !important;
            transform: translateY(-50%) !important;
            transition: all 0.2s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3) !important;
            cursor: pointer !important;
            padding: 0 !important;
        }

        .custom-dialog .ui-dialog-titlebar-close:hover {
            background-color: #f1f1f1 !important;
            transform: translateY(-50%) scale(1.1) !important;
        }

        .custom-dialog .ui-button-icon,
        .custom-dialog .ui-icon {
            display: none !important;
        }
    </style>
</body>

</html>