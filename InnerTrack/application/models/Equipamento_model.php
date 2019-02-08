<?php
class Equipamento_model extends MY_Model{
    function __construct()
    {
        parent::__construct();
        $join = array(
            'tabela_Usu'=>array('usuario','usuario.usu_id = equipamento.equ_id_usuario'),
            'tabela_Pro'=>array('produto','produto.pro_id = equipamento.equ_id_produto'),

            
        );
        $select = 'equipamento.equ_id,equipamento.equ_numero_serie,equipamento.equ_numero_chip,produto.pro_descricao as pro_produto, usuario.usu_nome';

        $this->setConfigTabela('equipamento','equ_id',$join,$select);
    }
}


?>