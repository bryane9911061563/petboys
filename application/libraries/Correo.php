<?php
defined('BASEPATH') or exit('No direct script access allowed');
#USO DE ARCHVIOS REQUERIDOS PARA USO DE LIBRERIA PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Correo
{
    public function __construct()
    {
        define('EMAIL_SENDER', 'bryanedilberto.poolmercado@gmail.com');
        define('EMAIL_PASSWORD', 'LOCApeople.wtf11');
    }
    /* FUNCION PARA ENVIO DE CORREO:
  /* RECIBE:
  /* -MENSAJE:  __puede ser un html con la estructura del correo
  /* -CORREO:   __correo destinatario
  */
    public function enviar_correo($link, $correo_dest)
    {

        $mail = new PHPMailer(true);
        try {
            //$mail->SMTPDebug=SMTP::DEBUG_SERVER;
            $mail->CharSet = "utf-8";
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bryanedilberto.poolmercado@gmail.com';
            $mail->Password = 'LOCApeople.wtf11';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom(EMAIL_SENDER, 'ZombiWifi');
            $mail->addAddress($correo_dest);

            $mail->Subject = 'Reestablecer contraseña';
            $mail->isHTML(true);
            $mail->Body = '
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="icon" type="image/png" sizes="16x16" href="' . base_url() . 'assets/images/favicon.png">
    <title>Zombifi</title>
</head>

<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="' . base_url() . '" target="_blank"><img height="55" src="' . base_url() . 'recursos_metrica/assets/images/zombicon.svg"
alt="xtreme admin" style="border:none"><br /></a> 
<img src="' . base_url() . 'recursos_metrica/assets/images/zmb2.png"
alt="logo-large" class="logo-lg logo-dark" style="width:107px;height:22px">
</td>
</tr>
</tbody>
</table>
<div style="padding: 40px; background: #fff;">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
            <tr>
                <td style="border-bottom:1px solid #f6f6f6;">
                    <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear
                        Sir/Madam/Customer,</h1>
                    <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p>
                </td>
            </tr>
            <tr>
                <td style="padding:10px 0 30px 0;">
                    <p>A request to reset your Admin password has been made. If you did not make this request, simply
                        ignore this email. If you did make this request, please reset your password:</p>
                    <center>
                        <a href="' . $link . '"
                            style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Reestablecer
                            contraseña</a>
                    </center>
                    <b>- Thanks (Wrappixel team)</b>
                </td>
            </tr>
            <tr>
                <td style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">If the button above does not
                    work, try copying and pasting the URL into your browser. If you continue to have problems, please
                    feel free to contact us at info@themedesigner.in</td>
            </tr>
        </tbody>
    </table>
</div>
<div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
    <p> Powered by Wrappixel
        <br>
        <a href="javascript: void(0);" style="color: #b2b2b5; text-decoration: underline;">Unsubscribe</a>
    </p>
</div>
</div>
</div>
</body>

</html>
';

            $mail->send();

            return true;
        } catch (Exception $e) {
            return "Algo salio mal banda: {$mail->ErrorInfo}";
        }
    }


    public function enviarCodigoVerificacion($correo, $codigoVerificacion)
    {
        $mail = new PHPMailer(true);
        try {
            //$mail->SMTPDebug=SMTP::DEBUG_SERVER;
            $mail->CharSet = "utf-8";
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bryanedilberto.poolmercado@gmail.com';
            $mail->Password = 'LOCApeople.wtf11';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom(EMAIL_SENDER, 'ZombiWifi');
            $mail->addAddress($correo);

            $mail->Subject = 'Codigo de verificación';
            $mail->isHTML(true);

            $mail->Body = `
                <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #eaf0f7; margin: 0;" bgcolor="#eaf0f7">
                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                        <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                            <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px dashed #4d79f6;" bgcolor="#fff">
            
                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                            <meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                            <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <tr><td><a href="#"><img src="../assets/images/logo-sm.png" alt="" style="margin-left: auto; margin-right: auto; display:block; margin-bottom: 10px; height: 40px;"></a></td></tr>
                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #4d79f6; font-size: 24px; font-weight: 700; text-align: center; vertical-align: top; margin: 0; padding: 0 0 10px;" valign="top">
                                                        Tu codigo es\n` . $codigoVerificacion . `
                                                    </td>
                                                </tr>
                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #3f5db3; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">
                                                        Please confirm your email address by clicking the link below.
                                                    </td>
                                                </tr>
                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">
                                                        We may need to send you critical information about our service and it is important that we have an accurate email address.
                                                    </td>
                                                </tr>
                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px 10px;" valign="top">
                                                        <a href="#" itemprop="url" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: block; border-radius: 5px; text-transform: capitalize; background-color: #4d79f6; margin: 0; border-color: #4d79f6; border-style: solid; border-width: 10px 20px;">Confirm email address</a>
                                                    </td>
                                                </tr>
                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; padding-top: 5px; vertical-align: top; margin: 0; text-align: right;" valign="top">
                                                        &mdash; <b>Metrica</b> - Admin Dashboard
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table><!--end table-->                                                
                            </div><!--end content-->
                        </td>
                        <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                    </tr>
                </table><!--end table-->    
            `;

            $mail->send();

            return true;
        } catch (Exception $e) {
            return "Algo salio mal banda: {$mail->ErrorInfo}";
        }
    }

    public function generateRandomString($length = null)
    {
        if ($length == null) {
            $length = 10;
        }
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
} /* End of file Correo.php */ /* Location: ./application/libraries/Correo.php */
