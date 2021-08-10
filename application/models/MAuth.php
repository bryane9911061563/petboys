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
    $where = "v_correo ='$correo' AND i_activo=1";
    $tabla = '"USUARIOS"';
    $get = $this->db->get_where($tabla, $where);

    if ($get->num_rows() > 0) {

      $row = $get->row();

      $dbPassword = $row->v_password;
      $parsed = preg_replace("/[^a-zA-Z0-9]+/", "", html_entity_decode($dbPassword, ENT_QUOTES));
      if (sha1($password) == $parsed) {

        $token = sha1(uniqid(rand(), true));

        $set = ['v_token' => "'$token'"];
        $this->db->update($tabla, $set, $where);

        $userData = [
          'nombres' => $row->v_nombres,
          'apellidos' => $row->v_apellidos,
          'correo' => $row->v_correo,
          'telefono' => $row->v_telefono,
          'tipo' => $row->i_tipousuario,
          'token' => $token,
          'activo' => $row->i_activo
        ];
        $this->session->set_userdata($userData);
        return ["status" => 1, "token" => $token];
      } else {
        //Contraseña incorrecta
        return ["status" => -1, 'password_db' => $dbPassword];
      }
    } else {
      //Cuenta no encontrada
      return ["status" => 0];
    }
  }

  public function registrarUsuario($datos)
  {
    $this->db->insert('USUARIOS', $datos);
    return $this->db->insert_id();
  }

  public function finalizarRegistro($password, $correo, $token)
  {
    $shaPassword = sha1($password);

    $tabla = '"USUARIOS"';
    $where = "v_token='$token' AND v_correo='$correo' AND i_activo= -1";
    $set = [
      'v_password' => "$shaPassword",
      'i_activo' => 1
    ];
    $this->db->update($tabla, $set, $where);

    return true;
  }

  public function verificarEstadoDeCuenta($correo)
  {
    $this->db->where('v_correo', $correo);
    $this->db->select('i_activo');
    $this->db->from('USUARIOS');
    $getUs = $this->db->get();
    if ($getUs->num_rows() > 0) {
      $rUs = $getUs->row();
      $i_activo = $rUs->i_activo;
      return $i_activo;
    } else {
      return false;
    }
  }

  public function verificarToken($correo, $token)
  {
    $tabla = '"USUARIOS"';
    $where = "v_correo='$correo' AND v_token='$token'";
    $getUsuarios = $this->db->get_where($tabla, $where);
    if ($getUsuarios->num_rows() > 0) {

      $rUs = $getUsuarios->result_array();
      $id_us = $rUs[0]["i_idusuario"];
      $token_bd = $rUs[0]["v_token"];

      $data = ['i_activo' => -1];
      $where2 = "i_idusuario=$id_us";
      $this->db->update($tabla, $data, $where2);

      //Se actualizo correctamente
      return 1;
      // if ($token == $token_bd) {
      // } else {
      //   //El token no es valido
      //   //return -1;
      //   return [
      //     'token__local' => $token,
      //     'token_bd' => $token_bd
      //   ];
      // }
    } else {
      //No se encontró la cuenta propietaria
      return 0;
    }
  }

  public function verificarTokenRule($token, $correo)
  {
    // $this->db->where("'v_correo'", $correo);
    // $this->db->where("'v_token'", $token);
    $tabla = '"USUARIOS"';
    $getToken = $this->db->query("SELECT *  FROM " . $tabla . " WHERE v_correo='" . $correo . "' AND v_token='" . $token . "'");
    $nrToken = $getToken->num_rows();
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