<?php
class Dashboard_model extends CI_Model{
    private $usuario = array();
    function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        $this->usuario = $ci->session->userdata('usuario_logado');
        
    }
    public function buscaLocalizacao($dados = array()){
        $this->db->select('st_x(ult_eve_localizacao) as lat,st_y(ult_eve_localizacao) as lon,ult_eve_id,ult_eve_data_gps,ult_eve_gps,ras_descricao as rastreado,ras_tipo,usu_nome as usuario,ult_eve_ignicao,ult_eve_velocidade,ult_eve_gprs,equ_numero_serie as equipamento');
        $this->db->from('ultimo_evento as ult');
        $this->db->join('rastreado','ult.ult_eve_id_rastreado = rastreado.ras_id');
        $this->db->join('equipamento','ult.ult_eve_id_equipamento = equipamento.equ_id');
        $this->db->join('usuario','ult.ult_eve_id_usuario = usuario.usu_id');
        $this->db->where('ult_eve_id_usuario',$this->usuario['usu_id']);
        return $this->db->get()->result_array();
    }
    public function busca_informacoes()
    {
        $info = array(
            'equipamento',
            'instalacao',
            'rastreado',
            'clientes'
        );
        $array = array();

        foreach ($info as $value) {
            $this->db->where(substr($value,0,3).'_id_usuario',$this->usuario['usu_id']);
            array_push($array,array(
                'tabela'=>$value,
                'dados'=>$this->db->get($value)->result_array()
                )); 
        }
        return $array;
    }
}
?>