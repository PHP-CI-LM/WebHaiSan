<!DOCTYPE html>
<html>

<head>
    <title>Chợ Hải Sản - Admin page</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/static_admin/css/login.css" />
</head>

<body>

    <div class="container">
        <div id="title">Đăng nhập vào hệ thống</div>

        <?php echo form_open('admin/login.html'); ?>

        <form id="input" action="" method="POST">
            <div class="row">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="username" placeholder="Tên đăng nhập" />
            </div>
            <div class="row">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="password">
            </div>
            <div class="row">
                <input type="submit" value="Login">
            </div>

            <?php echo validation_errors(); ?>
        </form>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->

</body>

</html>