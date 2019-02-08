<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
    public function validaUsuario($dados){
        $nome = $dados['nome'];
        $senha = md5($dados['senha']);
        $this->db->where('usu_nome',$nome);
        $this->db->where('usu_senha',$senha);
        return $this->db->get('usuario')->row_array();
    }
}
?>