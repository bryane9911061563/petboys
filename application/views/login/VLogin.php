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
                            <input class="form-control" type="email" name="emailaddress" id="emailaddress" placeholder="ejem: meemail@email.com">
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <a href="page-recoverpw.html" class="text-muted float-right"><small>Olvidaste tu contraseña?</small></a>
                            <label for="password">Contraseña</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">


                        </div>
                    </div>

                    <div class="form-group row text-center m-t-10">
                        <div class="col-12">
                            <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Iniciar sesión</button>
                        </div>
                    </div>

                </form>

                <div class="row m-t-50">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted">No tienes cuenta? <a href="<?= base_url('registro') ?>" class="text-dark m-l-5"><b>Registrate</b></a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

    });

    $("#fLogin").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?= base_url('CAuth/iniciarSesion') ?>",
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
            },
            error: function(jqXHR) {
                var resp = jqXHR.responseJSON;
                switch (jqXHR.status) {
                    case 400:
                        $.toast({
                            heading: 'Campos incompletos',
                            text: `${(resp['correo']!='')?resp['correo']:''}\n${(resp['password']!='')?resp['password']:''}`,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })

                        break;

                    default:
                        $.toast({
                            heading: 'Oops!',
                            text: `${jqXHR.responseJSON['message']}`,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                        break;
                }
            }
        });
    });
</script>