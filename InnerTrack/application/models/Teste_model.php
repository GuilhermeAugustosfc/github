<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teste_model extends CI_Model{
    private $usuario;
    public function __construct()
    {
        parent::__construct();
        $this->usuario = $this->session->userdata('usuario_logado');

        
    }

   
}
?>