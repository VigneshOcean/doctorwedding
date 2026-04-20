<?php
include('include/connect.php');
session_start();

if (!isset($_SESSION['id'])) {
    echo "<div class='p-5 text-center'>
            <i class='bi bi-lock-fill text-muted' style='font-size: 3rem;'></i>
            <h3 class='mt-4'>Private Profile</h3>
            <p class='text-muted'>You must be logged in to view profile details. <br>Please register or login to continue.</p>
            <div class='mt-4'>
                <a href='login.php' class='btn btn-success px-5 py-2 rounded-pill fw-bold me-3'>Login Now</a>
                <a href='register.php' class='btn btn-outline-success px-5 py-2 rounded-pill fw-bold'>Register Free</a>
            </div>
          </div>";
    exit;
}

$user_id = $_REQUEST['user_id'];
$prod = mysqli_query($con, "select * from register where id='$user_id'");
$usprod = mysqli_fetch_array($prod);

$caste_id = $usprod['religion'];
$caste_query = mysqli_query($con, "select caste from caste where id='$caste_id'");
$caste_data = mysqli_fetch_assoc($caste_query);
$caste_name = $caste_data['caste'] ?? 'N/A';

$subcaste_id = $usprod['caste'];
$subcaste_query = mysqli_query($con, "select subcaste from subcaste where id='$subcaste_id'");
$subcaste_data = mysqli_fetch_assoc($subcaste_query);
$subcaste_name = $subcaste_data['subcaste'] ?? 'N/A';

function get_avatar_local($gender) {
    return ($gender == 'male' || $gender == 'groom') ? "images/male_avatar.png" : "images/female_avatar.png";
}
?>

<div class="profile-details-modal p-3">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h4 class="text-success mb-0 d-flex align-items-center">
                <span class="name-text me-2"><?php echo ucwords($usprod['name']); ?></span>
                <span class="id-text text-muted">(<?php echo $usprod['username']; ?>)</span>
            </h4>
        </div>
        <div class="col-md-4 text-end">
            <span class="badge bg-success py-2 px-3">Age: <?php echo $usprod['age']; ?> Years</span>
            <span class="badge bg-info py-2 px-3"><?php echo ucwords($usprod['gender']); ?></span>
        </div>
    </div>

    <div class="row mb-4">
            <?php
            $profile_img = get_avatar_local($usprod['gender']);
            // Only show actual profile image if the user is logged in
            if (isset($_SESSION['id']) && isset($usprod['uploadedfile']) && strlen(trim($usprod['uploadedfile'])) > 0) {
                $filename = trim($usprod['uploadedfile']);
                if (file_exists("profile/" . $filename)) {
                    $profile_img = "profile/" . $filename;
                } else {
                    // Fallback to absolute URL if local check fails (common on live servers)
                    $profile_img = "https://hmmatrimony.com/profile/" . $filename;
                }
            }
            ?>
            <img src="<?php echo $profile_img; ?>" class="img-fluid rounded-3 shadow-sm border" style="max-height: 200px; width: 200px; object-fit: contain;" alt="Profile Image">
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <table class="table table-borderless table-sm mb-0">
                        <tr>
                            <td class="fw-bold text-primary" width="45%">Name</td>
                            <td>: <span class="text-danger"><?php echo ucwords($usprod['name']); ?></span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Date of Birth</td>
                            <td>: <span class="text-danger"><?php echo $usprod['dob']; ?></span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Time of Birth</td>
                            <td>: <span class="text-danger"><?php echo $usprod['tob']; ?></span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Caste</td>
                            <td>: <span class="text-danger fw-bold"><?php echo ucwords($caste_name); ?></span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Star</td>
                            <td>: <span class="text-danger"><?php echo ucwords($usprod['star']); ?></span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Education</td>
                            <td>: <span class="text-danger"><?php
                            echo ucwords($usprod['education']);
                            if (!empty($usprod['edu_det'])) {
                                echo " [" . ucwords($usprod['edu_det']) . "]";
                            }
                            ?></span></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless table-sm mb-0">
                        <tr>
                            <td class="fw-bold text-primary" width="45%">Userid</td>
                            <td>: <?php echo $usprod['username']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Gender</td>
                            <td>: <?php echo ucwords($usprod['gender']); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Age</td>
                            <td>: <?php echo $usprod['age']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Place of Birth</td>
                            <td>: <?php echo ucwords($usprod['p_birth']); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Sub Caste</td>
                            <td>: <?php echo ucwords($subcaste_name); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Moonsign</td>
                            <td>: <?php echo ucwords($usprod['moonsign']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="info-group mb-3">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td class="fw-bold text-primary" width="45%">Father's Name</td>
                        <td>: <span class="text-danger"><?php echo ucwords($usprod['fathername']); ?></span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Mother's Name</td>
                        <td>: <span class="text-danger"><?php echo ucwords($usprod['mother_name']); ?></span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Number of brothers</td>
                        <td>: <span class="text-danger"><?php echo $usprod['no_of_brothers']; ?></span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Married brothers</td>
                        <td>: <span class="text-danger"><?php echo $usprod['bro_married']; ?></span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Skin Color</td>
                        <td>: <span class="text-danger"><?php echo ucwords($usprod['skin']); ?></span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Company Name</td>
                        <td>: <span class=""><?php echo ucwords($usprod['job_cmpy']); ?></span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Job Location</td>
                        <td>: <span class=""><?php echo ucwords($usprod['job_loc']); ?></span></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-group mb-3">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td class="fw-bold text-primary" width="45%">Father's Occupation</td>
                        <td>: <?php echo ucwords($usprod['father_occupation']); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Mother's Occupation</td>
                        <td>: <?php echo ucwords($usprod['mother_occupation']); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Number of Sisters</td>
                        <td>: <?php echo $usprod['no_of_sisters']; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Married Sisters</td>
                        <td>: <?php echo $usprod['sis_married']; ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Height</td>
                        <td>: <?php echo ucwords($usprod['height']); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Job Details</td>
                        <td>: <?php echo ucwords($usprod['job']); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">Salary</td>
                        <td>: <?php echo ucwords($usprod['salary']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="info-group mt-3">
        <label class="fw-bold text-muted small text-uppercase">Self Description</label>
        <p class="mt-2 p-3 bg-light rounded shadow-sm border-start border-4 border-success">
            <?php echo !empty($usprod['self_desc']) ? ucwords($usprod['self_desc']) : 'No description provided.'; ?>
        </p>
    </div>

    <?php if (!empty($usprod['expectation'])) { ?>
        <div class="info-group mt-3">
            <label class="fw-bold text-muted small text-uppercase">Expectation</label>
            <p class="mt-2 p-3 bg-light rounded shadow-sm border-start border-4 border-primary">
                <?php echo ucwords($usprod['expectation']); ?>
            </p>
        </div>
    <?php } ?>

    <div class="info-group mt-3 pb-4">
        <table class="table table-borderless table-sm">
            <tr>
                <td class="fw-bold text-primary" width="45%">Profile Picture</td>
                <td>: <span class="text-danger">
                        <?php
                        if (isset($usprod['uploadedfile']) && strlen(trim($usprod['uploadedfile'])) > 0) {
                            echo "Picture Available";
                        } else {
                            echo "Picture not found";
                        }
                        ?>
                    </span></td>
            </tr>
            <tr>
                <td class="fw-bold text-primary" width="45%">Horoscope Status</td>
                <td>: <span class="text-danger">
                        <?php
                        if (!empty($usprod['horo'])) {
                            echo "Horoscope Uploaded";
                        } else {
                            echo "Horoscope not yet uploaded";
                        }
                        ?>
                    </span></td>
            </tr>
        </table>
    </div>
</div>

<style>
    .profile-details-modal {
        font-family: 'Inter', sans-serif;
    }

    .profile-details-modal .name-text {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
    }

    .profile-details-modal .id-text {
        font-family: 'Inter', sans-serif !important;
        font-size: 0.9rem;
        font-weight: 400;
    }

    .profile-details-modal table td {
        vertical-align: middle;
        padding: 4px 0;
        font-size: 14px;
    }

    .profile-details-modal .text-primary {
        color: #1e40af !important;
    }

    .profile-details-modal .text-danger {
        color: #c53030 !important;
    }

    .profile-details-modal label {
        display: block;
        border-bottom: 2px solid #07642f;
        width: fit-content;
        margin-bottom: 5px;
    }
</style>