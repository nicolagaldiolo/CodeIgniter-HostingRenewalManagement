<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  public function __construct(){
    parent::__construct();
    
    $user = $this->ion_auth->user()->row();

    $user->avatar = $this->get_gravatar($user->email);

    $global_data = array('user_info'=> $user);

    $this->load->vars($global_data);
    
    if (!$this->ion_auth->logged_in()){
      redirect('auth/login', 'refresh');
    }
  }

  private function get_gravatar( $email, $s = 200, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
  }
}
