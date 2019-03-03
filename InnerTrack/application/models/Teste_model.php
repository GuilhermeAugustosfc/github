<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teste_model extends CI_Model{
    private $usuario;
    public function __construct()
    {
        parent::__construct();
        $this->usuario = $this->session->userdata('usuario_logado');
    }
    public function buscarDados(){
        $this->db->where('eve_id <',270);
        $dados =  $this->db->get('evento')->result_array();
        for ($i=0; $i < count($dados); $i++) { 
            $dados[$i] = array_map('utf8_encode',$dados[$i]);
        }
        return $dados;
    }

   
}
?>