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

    <!-- Toastr css -->
    <link rel="stylesheet" href="<?= base_url('resources/plugins/jquery-toastr/jquery.toast.min.css') ?>" type="text/css">

    <script src="<?= base_url('resources/assets/js/modernizr.min.js') ?>"></script>

    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?= base_url('resources/assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/waves.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/jquery.slimscroll.js') ?>"></script>

    <!-- TOASTR js -->
    <script src="<?= base_url('resources/plugins/jquery-toastr/jquery.toast.min.js') ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('resources/assets/js/jquery.core.js') ?>"></script>
    <script src="<?= base_url('resources/assets/js/jquery.app.js') ?>"></script>
    <script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js'></script>

</head>

<body>

    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg-1.jpg');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">
        <?= $content ?>


        <div class="m-t-40 text-center">
            <p class="account-copyright"><?= date('Y') ?> ?? Petboys. - blazarnetworks.com</p>
        </div>

    </div>


</body>
<script>
    <?= Block('show') ?>
    $(document).ready(function() {
        <?= Block('hide') ?>
    });
</script>

</html>