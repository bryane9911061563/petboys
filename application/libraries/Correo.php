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
    public function enviar_correo($correo_dest, $token)
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

            $mail->Subject = 'Confirmar cuenta';
            $mail->isHTML(true);
            $mail->Body = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

                <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Petboys</title>


                    <style type="text/css">
                        img {
                            max-width: 100%;
                        }

                        body {
                            -webkit-font-smoothing: antialiased;
                            -webkit-text-size-adjust: none;
                            width: 100% !important;
                            height: 100%;
                            line-height: 1.6em;
                        }

                        body {
                            background-color: #f6f6f6;
                        }

                        @media only screen and (max-width: 640px) {
                            body {
                                padding: 0 !important;
                            }

                            h1 {
                                font-weight: 800 !important;
                                margin: 20px 0 5px !important;
                            }

                            h2 {
                                font-weight: 800 !important;
                                margin: 20px 0 5px !important;
                            }

                            h3 {
                                font-weight: 800 !important;
                                margin: 20px 0 5px !important;
                            }

                            h4 {
                                font-weight: 800 !important;
                                margin: 20px 0 5px !important;
                            }

                            h1 {
                                font-size: 22px !important;
                            }

                            h2 {
                                font-size: 18px !important;
                            }

                            h3 {
                                font-size: 16px !important;
                            }

                            .container {
                                padding: 0 !important;
                                width: 100% !important;
                            }

                            .content {
                                padding: 0 !important;
                            }

                            .content-wrap {
                                padding: 10px !important;
                            }

                            .invoice {
                                width: 100% !important;
                            }
                        }
                    </style>
                </head>

                <body
                    style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;"
                    bgcolor="#f6f6f6">

                    <table class="body-wrap"
                        style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;"
                        bgcolor="#f6f6f6">
                        <tr
                            style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                valign="top"></td>
                            <td class="container" width="600"
                                style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                                valign="top">
                                <div class="content"
                                    style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                    <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope
                                        itemtype="http://schema.org/ConfirmAction"
                                        style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                        <tr
                                            style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-wrap"
                                                style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #777edd;border-radius: 7px; background-color: #fff;"
                                                valign="top">
                                                <meta itemprop="name" content="Confirm Email"
                                                    style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                    style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                    <tr>
                                                        <td style="text-align: center">
                                                            <a href="#" style="display: block;margin-bottom: 10px;"> <img
                                                                    src="../assets/images/logo.png" height="28" alt="logo" /></a> <br />
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td class="content-block"
                                                            style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                            valign="top">
                                                            Por favor confirme su direccion de correo electr??nico haciendo click en el
                                                            enlace de abajo.
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td class="content-block" itemprop="handler" itemscope
                                                            itemtype="http://schema.org/HttpActionHandler"
                                                            style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                            valign="top">
                                                            <a href="' . base_url() . 'confirmacion/cuenta?auth=' . $token . '&email=' . $correo_dest . '" class="btn-primary" itemprop="url"
                                                                style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #02c0ce; margin: 0; border-color: #02c0ce; border-style: solid; border-width: 8px 16px;">Confirmra
                                                                correo electr??nico</a>
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td class="content-block"
                                                            style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                            valign="top">
                                                            &mdash; <b>Petboys</b> - Equipo de soporte
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="footer"
                                        style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
                                        <table width="100%"
                                            style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <tr
                                                style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="aligncenter content-block"
                                                    style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;"
                                                    align="center" valign="top"><a href="#"
                                                        style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Unsubscribe</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                            <td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                                valign="top"></td>
                        </tr>
                    </table>
                </body>

                </html>';

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

            $mail->Subject = 'Codigo de verificaci??n';
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
