<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Toastjquery_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

if (!function_exists('errorToast')) {
  /**
   * Test
   *
   * This test helpers
   *
   * @param   ...
   * @return  ...
   */
  function errorToast($mensaje, $titulo = 'Error')
  {
    $script = '
    $.toast({
      heading: `' . $titulo . '`,
      text: `' . $mensaje . '`,
      showHideTransition: "fade",
      icon: "error"
    });';

    return $script;
  }
}

// ------------------------------------------------------------------------

/* End of file Toastjquery_helper.php */
/* Location: ./application/helpers/Toastjquery_helper.php */