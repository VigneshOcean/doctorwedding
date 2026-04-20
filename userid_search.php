<?php
include("include/connect.php");
session_start();

$results_html = "";
$user_found = false;

if (isset($_REQUEST['submit']) || isset($_GET['user_id'])) {
    $user_id = isset($_REQUEST['user_id']) ? trim(mysqli_real_escape_string($con, $_REQUEST['user_id'])) : (isset($_GET['user_id']) ? $_GET['user_id'] : '');
    
    if (!empty($user_id)) {
        $query = "SELECT * FROM register WHERE (LOWER(username) LIKE LOWER('%$user_id%') OR LOWER(profile_id) LIKE LOWER('%$user_id%') OR id = '$user_id') AND status='1' LIMIT 1";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $user_found = true;
            $row = mysqli_fetch_array($result);
            
            // Fetch Caste and Subcaste names
            $caste_id = $row['religion'];
            $c_q = mysqli_query($con, "SELECT caste FROM caste WHERE id='$caste_id'");
            $c_data = mysqli_fetch_assoc($c_q);
            $caste_name = $c_data['caste'] ?? 'N/A';

            $subcaste_id = $row['caste'];
            $sc_q = mysqli_query($con, "SELECT subcaste FROM subcaste WHERE id='$subcaste_id'");
            $sc_data = mysqli_fetch_assoc($sc_q);
            $subcaste_name = $sc_data['subcaste'] ?? 'N/A';

            ob_start();
            ?>
            <div class="full-profile-view bg-white p-4 rounded-4 shadow-sm border border-success border-opacity-25 mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h3 class="text-success mb-0 fw-bold"><i class="bi bi-person-check me-2"></i>Full Profile Details</h3>
                    <span class="badge bg-success py-2 px-3 rounded-pill">User ID: <?php echo $row['username'] ?: $row['id']; ?></span>
                </div>

                <!-- Personal Information -->
                <div class="profile-section mb-4">
                    <h5 class="section-subtitle mb-3 text-primary fw-bold"><i class="bi bi-person-lines-fill me-2"></i>Personal & Identity</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Name</td><td>: <span class="text-danger fw-bold"><?php echo ucwords($row['name']); ?></span></td></tr>
                                <tr><td class="text-muted">Gender</td><td>: <span class="text-dark"><?php echo ucwords($row['gender']); ?></span></td></tr>
                                <tr><td class="text-muted">DOB - Age</td><td>: <span class="text-danger"><?php echo $row['dob']; ?> --- <?php echo $row['age']; ?></span></td></tr>
                                <tr><td class="text-muted">Caste</td><td>: <span class="text-danger"><?php echo ucwords($caste_name); ?></span></td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Subcaste</td><td>: <span class="text-dark"><?php echo ucwords($subcaste_name); ?></span></td></tr>
                                <tr><td class="text-muted">Star</td><td>: <span class="text-danger"><?php echo ucwords($row['star']); ?></span></td></tr>
                                <tr><td class="text-muted">Moonsign</td><td>: <span class="text-danger"><?php echo ucwords($row['moonsign'] ?: 'N/A'); ?></span></td></tr>
                                <tr><td class="text-muted">Height</td><td>: <span class="text-dark"><?php echo $row['feet'] ?? 'N/A'; ?></span></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Education & Career -->
                <div class="profile-section mb-4">
                    <h5 class="section-subtitle mb-3 text-primary fw-bold"><i class="bi bi-briefcase me-2"></i>Education & Career</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Education</td><td>: <span class="text-danger"> <?php echo ucwords($row['education']); ?> <?php if($row['edu_det']) echo "[".ucwords($row['edu_det'])."]"; ?></span></td></tr>
                                <tr><td class="text-muted">Job Details</td><td>: <span class="text-danger"><?php echo ucwords($row['job'] ?: 'N/A'); ?></span></td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Salary</td><td>: <span class="text-danger"><?php echo $row['salary'] ?: 'N/A'; ?></span></td></tr>
                                <tr><td class="text-muted">Working Location</td><td>: <span class="text-dark"><?php echo ucwords($row['emp_loc'] ?: 'N/A'); ?></span></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Family Information -->
                <div class="profile-section mb-4">
                    <h5 class="section-subtitle mb-3 text-primary fw-bold"><i class="bi bi-people me-2"></i>Family Details</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Father's Name</td><td>: <span class="text-dark"><?php echo ucwords($row['fathername'] ?: 'N/A'); ?></span></td></tr>
                                <tr><td class="text-muted">Father's Job</td><td>: <span class="text-dark"><?php echo ucwords($row['father_occupation'] ?: 'N/A'); ?></span></td></tr>
                                <tr><td class="text-muted">Brothers Count</td><td>: <span class="text-dark"><?php echo $row['no_of_brothers'] ?: '0'; ?></span></td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Mother's Name</td><td>: <span class="text-dark"><?php echo ucwords($row['mother_name'] ?: 'N/A'); ?></span></td></tr>
                                <tr><td class="text-muted">Mother's Job</td><td>: <span class="text-dark"><?php echo ucwords($row['mother_occupation'] ?: 'N/A'); ?></span></td></tr>
                                <tr><td class="text-muted">Sisters Count</td><td>: <span class="text-dark"><?php echo $row['no_of_sisters'] ?: '0'; ?></span></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Horoscope Information -->
                <div class="profile-section mb-0">
                    <h5 class="section-subtitle mb-3 text-primary fw-bold"><i class="bi bi-moon-stars me-2"></i>Horoscope</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Time of Birth</td><td>: <span class="text-danger"><?php echo $row['tob'] ?: 'N/A'; ?></span></td></tr>
                                <tr><td class="text-muted">Place of Birth</td><td>: <span class="text-dark"><?php echo ucwords($row['p_birth'] ?: 'N/A'); ?></span></td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted" width="40%">Dasa / Balance</td><td>: <span class="text-dark"><?php echo ucwords($row['dasa'] ?: 'N/A'); ?></span></td></tr>
                                <tr><td class="text-muted">Residential Addr</td><td>: <span class="text-danger fw-bold">******</span></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5 text-center">
                    <a href="login.php" class="btn btn-success px-5 py-3 rounded-pill fw-bold shadow-sm">
                        <i class="bi bi-lock-fill me-2"></i>Login to View Contact Details & Photo
                    </a>
                </div>
            </div>
            <?php
            $results_html = ob_get_clean();
        } else {
            $results_html = '<div class="alert alert-info p-4 rounded-4 border-0 shadow-sm mt-4"><i class="bi bi-info-circle-fill me-2"></i>No profile found matching this ID. Please try another ID.</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member ID Search - Adidravidar Matrimony</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: #fdfdfd; font-family: 'Segoe UI', Roboto, sans-serif; color: #444; }
        .main-container { padding-top: 50px; padding-bottom: 80px; max-width: 1100px; margin: 0 auto; }
        .search-title { font-size: 28px; font-weight: 700; color: #2d452d; margin-bottom: 30px; text-align: center; }
        .search-form-card { background: #fff; border-radius: 25px; padding: 40px; box-shadow: 0 15px 50px rgba(0, 0, 0, 0.05); border: 1px solid #edf2ed; }
        .form-label { font-size: 14px; font-weight: 600; color: #555; }
        .form-control { padding: 12px 20px; border-radius: 12px; border: 1px solid #e2e8e2; background: #fafcfa; }
        .form-control:focus { border-color: #07642f; box-shadow: 0 0 0 0.25rem rgba(104, 159, 56, 0.15); }
        .section-subtitle { font-size: 16px; border-bottom: 2px solid #f0f7f0; padding-bottom: 8px; }
        .text-primary { color: #2e59d9 !important; }
        .text-danger { color: #e74a3b !important; }
        .profile-section { background: #fcfdfc; padding: 20px; border-radius: 15px; border: 1px solid #f0f4f0; }

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
            <a href="search_result.php" class="search-nav-link">Advanced Search</a>
            <a href="userid_search.php" class="search-nav-link active">User ID Search</a>
        </div>

        <h1 class="search-title">Search Member by ID</h1>
        <div class="search-form-card">
            <form action="userid_search.php" method="get">
                <div class="row align-items-end g-4">
                    <div class="col-md-9">
                        <label class="form-label mb-2">Member User ID</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 rounded-start-4"><i class="bi bi-person-badge text-success"></i></span>
                            <input type="text" name="user_id" class="form-control border-start-0 rounded-end-4" 
                                   placeholder="Enter ID (e.g. HM123456)" 
                                   value="<?php echo isset($_REQUEST['user_id']) ? htmlspecialchars($_REQUEST['user_id']) : ''; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" name="submit" class="btn btn-success w-100 py-3 fw-bold rounded-pill">
                            <i class="bi bi-search me-2"></i>Find Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div id="results-area">
            <?php echo $results_html; ?>
        </div>
    </div>
    <?php include("include/footer.php"); ?>
</body>
</html>