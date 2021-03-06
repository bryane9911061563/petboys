<div class="card">
    <div class="card-block">

        <div class="account-box">

            <div class="card-box p-5">
                <h2 class="text-uppercase text-center pb-4">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo.png" alt="" height="26"></span>
                    </a>
                </h2>

                <form class="form-horizontal" id="fSingup">

                    <div class="form-group row m-b-20">
                        <div class="col-6">
                            <label for="username">Nombre(s)</label>
                            <input class="form-control" type="text" id="nombre" name="nombre">
                        </div>
                        <div class="col-6">
                            <label for="username">Apellidos</label>
                            <input class="form-control" type="text" id="apellidos" name="apellidos">
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="emailaddress">Correo electrónico</label>
                            <input class="form-control" type="email" id="emailaddress" name="emailaddress" placeholder="john@deo.com">
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="tipo">Registrarme como</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Tipo de usuario</option>
                                <option value="2">Veterinario</option>
                                <option value="4">Usuario</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">

                            <div class="checkbox checkbox-custom">
                                <input id="remember" type="checkbox" checked="">
                                <label for="remember">
                                    Acepto <a href="#" class="text-custom">los terminos y condiciones</a>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row text-center m-t-10">
                        <div class="col-12">
                            <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Registrar</button>
                        </div>
                    </div>

                </form>

                <div class="row m-t-50">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted">Ya tienes una cuenta? <a href="<?= base_url() ?>" onclick="block()" class="text-dark m-l-5"><b>Inicia sesión</b></a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    $("#fSingup").submit(function(e) {
        e.preventDefault();
        <?= Block() ?>
        $.ajax({
            type: "POST",
            url: "<?= base_url('CAuth/registrarUsuario') ?>",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                window.location.replace("<?= base_url() ?>correoenviado?email=" + $("#emailaddress").val() + "");
                <?= Block('hide') ?>
            },
            error: function(jqXHR) {
                var resp = jqXHR.responseJSON;
                switch (jqXHR.status) {
                    case 400:
                        if (resp["nombre"] != '') <?= errorToast('${resp["nombre"]}', 'Campo requerido') ?>
                        if (resp["apellidos"] != '') <?= errorToast('${resp["apellidos"]}', 'Campo requerido') ?>
                        if (resp["emailaddress"] != '') <?= errorToast('${resp["emailaddress"]}', 'Campo requerido') ?>
                        if (resp["tipo"] != '') <?= errorToast('${resp["tipo"]}', 'Campo requerido') ?>
                        break;

                    default:
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