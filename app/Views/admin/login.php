<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin Login - Advanced MVC</title>
    <!-- We will use Bootstrap and FontAwesome similar to original admin design -->
    <link href="../../matrimonyadmin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../matrimonyadmin/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../matrimonyadmin/assets/css/ace.min.css" />
    <link rel="stylesheet" href="../../matrimonyadmin/assets/css/ace-rtl.min.css" />
    <style>
        body.login-layout { background-color: #f1f2f7; }
        .login-box { padding: 20px; border-radius: 8px; box-shadow: 0 0 15px rgba(0,0,0,0.1); background: #fff;}
        .center h1 { font-weight: bold; font-family: 'Arial', sans-serif;}
    </style>
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container" style="margin-top: 50px;">
                    <div class="center">
                        <h1 style="font-size:30px;">
                            <i class="icon-heart green"></i>
                            <span class="red">Admin Space </span>
                            <span class="gray">(MVC)</span>
                        </h1>
                        <h4 class="blue">&copy; Doctor Wedding</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="icon-coffee green"></i>
                                        Please Enter Admin Credentials
                                    </h4>

                                    <div class="space-6"></div>

                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger" style="color:red; font-size:14px; margin-bottom: 20px;">
                                            <i class="icon-warning-sign"></i> <?= htmlspecialchars($error) ?>
                                        </div>
                                    <?php endif; ?>

                                    <form name="frm" action="authenticate" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?= htmlspecialchars($username ?? '') ?>" required/>
                                                    <i class="icon-user"></i>
                                                </span>
                                            </label>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required />
                                                    <i class="icon-lock"></i>
                                                </span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="icon-key"></i> Login
                                                </button>
                                            </div>
                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                </div><!-- /widget-main -->
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->
                    </div><!-- /position-relative -->

                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->
</body>
</html>