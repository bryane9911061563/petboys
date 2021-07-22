<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ToastJquery
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    // 
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function errorToast($mensaje, $titulo = 'Error')
  {
    $script = `
    $.toast({
      heading: '$titulo',
      text: $mensaje,
      showHideTransition: 'fade',
      icon: 'error'
    })`;

    return $script;
  }

  // ------------------------------------------------------------------------
}

/* End of file ToastJquery.php */
/* Location: ./application/libraries/ToastJquery.php */