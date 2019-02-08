<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Relatorio_model extends CI_Model{
    private $usuario;
    public function __construct()
    {
        parent::__construct();
        $this->usuario = $this->session->userdata('usuario_logado');

        
    }

    public function ponyLine($dados)
    {
        $this->db->select('st_x(eve_localizacao) as lat,st_y(eve_localizacao) as lon, eve_ignicao , eve_gps , eve_gprs ,eve_data_gps,eve_velocidade');
        $this->db->from('evento');
        $this->db->where('eve_id_usuario',$this->usuario['usu_id']);
        $this->db->where('eve_data_gps BETWEEN "'.$dados['data_inicio'].'" and "'.$dados['data_fim'].'"');
        return $this->db->get()->result_array();
    }
    public function buscaAlertas()
    {
        $this->db->select('alerta.*,ale_tip_descricao, usu_nome as nome_usuario,ras_identificacao as rastreado');
        $this->db->from('alerta');
        $this->db->join('alerta_tipo','alerta.ale_id_ale_tip = alerta_tipo.ale_tip_id');
        $this->db->join('rastreado','alerta.ale_id_rastreado = rastreado.ras_id');
        $this->db->join('usuario','alerta.ale_id_usuario = usuario.usu_id');
        $this->db->where('ale_id_usuario',$this->usuario['usu_id']);
        return $this->db->get()->result_array();
    }
    public function contaAlerta()
    {
        $this->db->select('count(ale_lido) as alertas');
        $this->db->where('ale_lido','0');
        $this->db->where('ale_id_usuario',$this->usuario['usu_id']);
        $alertas = $this->db->get('alerta')->result_array();
        return array(
            'alertas'=>$alertas,
            'dados_da_session'=>$this->usuario,
        );
    }
}
?>