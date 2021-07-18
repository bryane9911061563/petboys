<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Petboys - <?= $titulo ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('resources/assets/images/favicon.ico') ?>">

    <!-- App css -->
    <link href="<?= base_url('resources/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('resources/assets/css/icons.css"') ?> rel=" stylesheet" type="text/css" />
    <link href="<?= base_url('resources/assets/css/style.css"') ?> rel=" stylesheet" type="text/css" />

    <script src="<?= base_url('resources/assets/js/modernizr.min.js') ?>"></script>

    <!-- jQuery  -->
    <script src="<?= base_url('resources/assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/waves.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/jquery.slimscroll.js') ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('resources/assets/js/jquery.core.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/jquery.app.js') ?>"></script>

</head>

<body>

    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg-1.jpg');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">
        <?= $content ?>


        <div class="m-t-40 text-center">
            <p class="account-copyright"><?= date('Y') ?> © Petboys. - blazarnetworks.com</p>
        </div>

    </div>


</body>

</html>