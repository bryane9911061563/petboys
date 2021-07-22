<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller CAuth
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class CAuth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!empty($this->session->userdata('token'))) {
      header('location: ' . base_url('inicio') . '');
    } else {
      $this->load->library('form_validation');
      $this->load->model('MAuth', 'ma');
    }
  }

  public function loginView()
  {
    $data = [];
    $this->template->set('titulo', 'Login');
    $this->template->load('loginLayout/loginLayout', 'content', 'login/VLogin', $data);
  }

  public function singupView()
  {
    $data = [];
    $this->template->set('titulo', 'Registro');
    $this->template->load('loginLayout/loginLayout', 'content', 'login/VSingup', $data);
  }

  public function emailenviadoView()
  {
    $email = $_GET['email'];
    $data = ['email' => $email];

    $this->template->set('titulo', 'Correo enviado');
    $this->template->load('loginLayout/loginLayout', 'content', 'login/VEmailEnviado', $data);
  }

  public function iniciarSesion()
  {
    if ($this->input->is_ajax_request()) {
      $reglas = [
        [
          'field' => 'emailaddress',
          'label' => 'Correo electrónico',
          'rules' => 'required|valid_email',
          'errors' => [
            'required' => '%s requerido',
            'valid_email' => '%s invalido'
          ]
        ],
        [
          'field' => 'password',
          'label' => 'Contraseña',
          'rules' => 'required',
          'errors' => [
            'required' => '%s requerida'
          ]
        ]
      ];

      $this->form_validation->set_rules($reglas);
      if ($this->form_validation->run()) {

        $email = $this->input->post('emailaddress', true);
        $password = $this->input->post('password', true);

        $dataRespuesta = $this->ma->iniciarSesion($email, $password);

        switch ($dataRespuesta["status"]) {
          case '0':
            //Cuenta no encontrada
            setcookie('auth', '', time() - 1, "/");
            $this->output->set_status_header(500)
              ->set_content_type('application/json')
              ->set_output(json_encode(['message' => 'La cuenta no existe']));
            break;
          case '-1':
            setcookie('auth', '', time() - 1, "/");
            $this->output->set_status_header(401)
              ->set_content_type('application/json')
              ->set_output(json_encode(['message' => 'Contraseña incorrecta']));
            break;
          case '1':
            setcookie('auth', $dataRespuesta['token'], time() + 60 * 60 * 24 * 31, "/");
            $this->output->set_status_header(200)
              ->set_content_type('application/json')
              ->set_output(json_encode(['message' => 'Bienvenido']));
            break;

          default:
            setcookie('auth', '', time() - 1, "/");
            $this->output->set_status_header(500)
              ->set_content_type('application/json')
              ->set_output(json_encode(['message' => 'Error interno']));
            break;
            break;
        }
      } else {
        $this->output->set_status_header(400)
          ->set_content_type('application/json')
          ->set_output(json_encode([
            'correo' => form_error('emailaddress'),
            'password' => form_error('password')
          ]));
      }
    } else {
      $this->output->set_status_header(404);
    }
  }

  public function registrarUsuario()
  {

    if ($this->input->is_ajax_request()) {
      $reglas = [
        [
          'field' => 'nombre',
          'label' => 'Nombre',
          'rules' => 'required',
          'errors' => [
            'required' => '%s requerido',
          ]
        ],
        [
          'field' => 'apellidos',
          'label' => 'Apellidos',
          'rules' => 'required',
          'errors' => [
            'required' => '%s requerido',
          ]
        ],
        [
          'field' => 'emailaddress',
          'label' => 'Correo electrónico',
          'rules' => 'required|valid_email|is_unique[USUARIOS.vCorreo]',
          'errors' => [
            'required' => '%s requerido',
            'valid_email' => '%s invalido',
            'is_unique' => '%s no disponible'
          ]
        ],
        [
          'field' => 'tipo',
          'label' => 'Tipo de usuario',
          'rules' => 'required',
          'errors' => [
            'required' => '%s requerido',
          ]
        ]
      ];

      $this->form_validation->set_rules($reglas);

      if ($this->form_validation->run()) {

        $nombre = $this->input->post('nombre', true);
        $apellidos = $this->input->post('apellidos', true);
        $correo = $this->input->post('emailaddress', true);
        $password = $this->input->post('password', true);
        $tipo = $this->input->post('tipo', true);

        $token = sha1(uniqid(rand(), true));

        $datos = [
          'vNombres' => $nombre,
          'vApellidos' => $apellidos,
          'vCorreo' => $correo,
          //'vContrasenia' => sha1($password),
          'iTipoUsuario' => $tipo,
          'iActivo' => 0,
          'vToken' => $token
        ];

        $insert = $this->ma->registrarUsuario($datos);
        if ($insert > 0) {

          $this->load->library('correo');




          if ($this->correo->enviar_correo($correo, $token)) {

            $this->output->set_status_header(201)
              ->set_content_type('application/json')
              ->set_output(json_encode([
                'message' => 'Te hemos enviado un correo para completar tu registro'
              ]));
          } else {
            $this->output->set_status_header(500)
              ->set_content_type('application/json')
              ->set_output(json_encode([
                'message' => 'Error al enviar el correo'
              ]));
          }
        } else {
          $this->output->set_status_header(500)
            ->set_content_type('application/json')
            ->set_output(json_encode([
              'message' => 'Error interno'
            ]));
        }
      } else {
        $this->output->set_status_header(400)
          ->set_content_type('application/json')
          ->set_output(json_encode([
            'nombre' => form_error('nombre'),
            'apellidos' => form_error('apellidos'),
            'emailaddress' => form_error('emailaddress'),
            'tipo' => form_error('tipo'),
          ]));
      }
    } else {
      $this->output->set_status_header(404);
    }
  }

  public function confirmarCuenta()
  {
    if ($_GET['email'] != '' and $_GET['auth'] != '') {
      $email = $_GET['email'];
      $token = $_GET['auth'];

      $respVerificado = $this->ma->verificarToken($email, $token);

      switch ($respVerificado) {
        case '1':
          header('location: ' . base_url() . '');
          break;
        case '-1':
          $data = ['correo' => $email, 'token' => $token];
          $this->template->set('titulo', 'Registro');
          $this->template->load('loginLayout/loginLayout', 'content', 'login/VEmailConfirmadoUsuario', $data);
          break;
        case '0':
          show_404();
          break;

        default:
          show_404();
          break;
      }
    } else {
      show_404();
    }
  }

  public function finalizarRegistro()
  {
    if ($this->input->is_ajax_request()) {
      $this->form_validation->set_rules('token', 'required|callback_verificartoken');
      $this->form_validation->set_rules('emailaddress', 'required|valid_email');
      $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
      $this->form_validation->set_rules('password2', 'Confirmar contraseña', 'required|matches[password]');

      if ($this->form_validation->run()) {

        $correo = $this->input->post('emailaddress');
        $token = $this->input->post('token', true);
        $password = $this->input->post('password', true);

        if ($resp = $this->ma->finalizarRegistro($password, $correo)) {

          $dataRespuesta = $this->ma->iniciarSesion($correo, $password);

          switch ($dataRespuesta["status"]) {
            case '0':
              //Cuenta no encontrada
              setcookie('auth', '', time() - 1, "/");
              $this->output->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'La cuenta no existe']));
              break;
            case '-1':
              setcookie('auth', '', time() - 1, "/");
              $this->output->set_status_header(401)
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Contraseña incorrecta']));
              break;
            case '1':
              setcookie('auth', $dataRespuesta['token'], time() + 60 * 60 * 24 * 31, "/");
              $this->output->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Bienvenido']));
              break;

            default:
              setcookie('auth', '', time() - 1, "/");
              $this->output->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Error internoo']));
              break;
          }
        } else {
          $this->output->set_status_header(500)->set_content_type('application/json')->set_output(json_encode([
            'message' => $resp
          ]));
        }
      } else {
        $this->output->set_status_header(400)->set_content_type('application/json')->set_output(json_encode(
          [
            'emailaddress' => form_error('emailaddress'),
            'token' => form_error('token'),
            'password' => form_error('password'),
            'password2' => form_error('password2')
          ]
        ));
      }
    } else {
      $this->ouput->set_status_header(404);
    }
  }

  public function cerrarSesion()
  {
    $userData = [
      'nombres' => '',
      'apellidos' => '',
      'correo' => '',
      'usuario' => '',
      'telefono' => '',
      'tipo' => '',
      'token' => '',
      'activo' => ''
    ];
    $this->session->set_userdata($userData);
    $this->session->sess_destroy();
    header('location:' . base_url() . '');
  }
  public function generarToken()
  {
    echo sha1(123456789);
  }

  //Regla de verificacion de token valido
  public function verificartoken($token)
  {
    $correo = $this->input->post('emailaddress', true);
    if ($this->ma->verificarTokenRule($token, $correo)) {
      return true;
    } else {
      $this->form_validation->set_message('verificar_token', 'Token invalido');
      return false;
    }
  }
}


/* End of file CAuth.php */
/* Location: ./application/controllers/CAuth.php */