<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller CAdmin
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

class CAdmin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('token'))) {
      header('location: ' . base_url() . '');
    }
  }

  public function inicioView()
  {
    $data = [];
    $this->template->set('titulo', 'Inicio');
    $this->template->load('adminLayout/adminLayout', 'content', 'admin/VInicio', $data);
  }
}


/* End of file CAdmin.php */
/* Location: ./application/controllers/CAdmin.php */