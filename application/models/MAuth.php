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

  // ------------------------------------------------------------------------

}

/* End of file MAuth.php */
/* Location: ./application/models/MAuth.php */