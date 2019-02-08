<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model{
    private $tabela;
    private $id_da_tabela;
    private $join = array();
    private $select;
    private $usuario = array();
    function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        $this->usuario = $ci->session->userdata('usuario_logado');
        
    }
    public function setConfigTabela($tabela,$id_da_tabela,$join = array(),$select = array())
    {
        $this->tabela = $tabela;
        $this->id_da_tabela = $id_da_tabela;
        $this->join = $join;
        $this->select = $select;
    }
    public function Buscar($dados = array())
    {
        if(isset($dados['id'])){
            $id = $dados['id'];
            $this->db->where($this->id_da_tabela,$id);
            $array = $this->db->get($this->tabela)->row_array();
            
            
        }else if(empty($this->join)){
            
            $array = $this->db->get($this->tabela)->result_array();
        }else{
            $this->db->select($this->select);
            $this->db->from($this->tabela);
            $this->db->where(substr($this->tabela,0,3).'_id_usuario',$this->usuario['usu_id']);
            foreach ($this->join as $value) {
                $this->db->join($value[0],$value[1]);
            }
            return $this->db->get()->result_array();
        }
        
        return $array;
    }
    public function deletar($dados){
        $ids = array();
        foreach ($dados['rows'] as $value) {
            $ids [] = $value[$this->id_da_tabela];
        }
        if($this->db->where_in($this->id_da_tabela,$ids)->delete($this->tabela)){
            return true;
        }else{
            return $this->db->error();;
        }
    }
    public function inserir($dados)
    {
        $id_usuario = substr($this->tabela,0,3).'_id_usuario';
        $dados[$id_usuario] = $this->usuario['usu_id'];
        if($this->db->insert($this->tabela,$dados)){
            return array('status'=>true);
        }else{
            return array('status'=>false);
        }
    }
    public function editar($edicao)
    {
        $this->db->where($this->id_da_tabela,$edicao[$this->id_da_tabela]);
        return $this->db->update($this->tabela,$edicao);
    }
    public function getResumos($dados = array())
    {
        $array = array();
        foreach ($dados as $value) {
            $this->db->select($value['select']);
            $this->db->from($value['tabela']);
            $this->db->where((substr($value['tabela'],0,3).'_id_usuario' == 'pro_id_usuario')?'0 <':substr($value['tabela'],0,3).'_id_usuario',$this->usuario['usu_id']);
            
            $array [] = array('dados'=>$this->db->get()->result_array(),'tabela'=> $value['tabela']);
        }
        return $array;

                    
    }

}
?>