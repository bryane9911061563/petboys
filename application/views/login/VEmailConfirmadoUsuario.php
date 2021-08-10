<div class="card">
    <div class="card-block">

        <div class="account-box">

            <div class="card-box p-5">
                <h2 class="text-uppercase text-center pb-4">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo.png" alt="" height="26"></span>
                    </a>
                </h2>

                <form id="fLogin">

                    <div class="form-group m-b-20 row">
                        <div class="col-12">
                            <label for="emailaddress">Correo electrónico</label>
                            <p><b><?= $correo ?></b></p>
                            <input type="hidden" name="emailaddress" value="<?= $correo ?>">
                            <input type="hidden" name="token" value="<?= $token ?>">
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="password">Contraseña</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="password">Confirmar contraseña</label>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row text-center m-t-10">
                        <div class="col-12">
                            <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Finalizar registro</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<script>
    $("#fLogin").submit(function(e) {
        e.preventDefault();
        <?= Block() ?>
        $.ajax({
            type: "POST",
            url: "<?= base_url('CAuth/finalizarRegistro') ?>",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                $.toast({
                    heading: 'Bienvenido!',
                    text: 'En un momento se te redireccionara a tu panel',
                    showHideTransition: 'slide',
                    icon: 'success'
                })
                window.location.replace("<?= base_url('inicio') ?>");
                <?= Block('hide') ?>
            },
            error: function(jqXHR) {
                var resp = jqXHR.responseJSON;
                switch (jqXHR.status) {
                    case 400:
                        if (resp["token"] != '') <?= errorToast('${resp["token"]}', 'Campo requerido') ?>
                        if (resp["emailaddress"] != '') <?= errorToast('${resp["emailaddress"]}', 'Campo requerido') ?>
                        if (resp["password"] != '') <?= errorToast('${resp["password"]}', 'Campo requerido') ?>
                        if (resp["password2"] != '') <?= errorToast('${resp["password2"]}', 'Campo requerido') ?>
                        break;

                    default:
                        console.log(resp);
                        <?= errorToast('${resp["message"]}') ?>
                        break;
                }
                <?= Block('hide') ?>
            }
        });
    });

    function block() {
        <?= Block() ?>
    }
</script>