<?php
class Instalacao_model extends MY_Model{
    function __construct()
    {
        parent::__construct();
        $join = array(
            'tabela_Usu'=>array('usuario','usuario.usu_id = instalacao.ins_id_usuario'),
            'tabela_Ras'=>array('rastreado','rastreado.ras_id = instalacao.ins_id_rastreado'),

            'tabela_Equi'=>array('equipamento','instalacao.ins_id_equipamento = equipamento.equ_id'),
            
        );
        $select = 'instalacao.ins_id,usuario.usu_nome,equipamento.equ_numero_serie as ins_equipamento, rastreado.ras_descricao ';

        $this->setConfigTabela('instalacao','ins_id',$join,$select);
    }
}


?>