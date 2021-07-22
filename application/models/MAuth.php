<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model MAuth
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class MAuth extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function iniciarSesion($correo, $password)
  {
    $where = [
      'vCorreo' => $correo
    ];
    $get = $this->db->get_where('USUARIOS', $where);

    if ($get->num_rows() > 0) {

      $row = $get->row();

      $dbPassword = $row->vContrasenia;

      if (sha1($password) == $dbPassword) {

        $token = sha1(uniqid(rand(), true));

        $this->db->where('vCorreo', $correo);
        $this->db->update('USUARIOS', ['vToken' => $token]);

        $userData = [
          'nombres' => $row->vNombres,
          'apellidos' => $row->vApellidos,
          'correo' => $row->vCorreo,
          'usuario' => $row->vNombreUsuario,
          'telefono' => $row->vTelefono,
          'tipo' => $row->iTipoUsuario,
          'token' => $token,
          'activo' => $row->iActivo
        ];
        $this->session->set_userdata($userData);
        return ["status" => "1", "token" => $token];
      } else {
        //Contraseña incorrecta
        return ["status" => "-1"];
      }
    } else {
      //Cuenta no encontrada
      return ["status" => "0"];
    }
  }

  public function registrarUsuario($datos)
  {
    $this->db->insert('USUARIOS', $datos);
    return $this->db->insert_id();
  }

  public function finalizarRegistro($password, $correo)
  {
    $this->db->update('USUARIOS', ['vContrasenia' => sha1($password), 'iActivo' => 1], ['vCorreo' => $correo]);
  }

  public function verificarEstadoDeCuenta($correo)
  {
    $this->db->where('vCorreo', $correo);
    $this->db->select('iActivo');
    $this->db->from('USUARIOS');
    $getUs = $this->db->get();
    if ($getUs->num_rows() > 0) {
      $rUs = $getUs->row();
      $iActivo = $rUs->iActivo;
      return $iActivo;
    } else {
      return false;
    }
  }

  public function verificarToken($correo, $token)
  {
    $this->db->where('vCorreo', $correo);
    $this->db->select('vToken');
    $this->db->from('USUARIOS');
    $getUsuarios = $this->db->get();
    if ($getUsuarios->num_rows() > 0) {

      $rUs = $getUsuarios->row();
      $token_bd = $rUs->vToken;

      if ($token == $token_bd) {
        $this->db->where('vCorreo', $correo);
        $this->db->update('USUARIOS', ['iActivo' => -1]);

        return '1';
      } else {
        //El token no es valido
        return '-1';
      }
    } else {
      //No se encontró la cuenta propietaria
      return '0';
    }
  }

  public function verificarTokenRule($token, $correo)
  {
    $this->db->where('vCorreo', $correo);
    $this->db->where('vToken', $token);
    $nrToken = $this->db->get('USUARIOS')->num_rows();
    if ($nrToken > 0) {
      return true;
    } else {
      return false;
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file MAuth.php */
/* Location: ./application/models/MAuth.php */