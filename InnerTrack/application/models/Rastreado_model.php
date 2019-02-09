<?php
class Rastreado_model extends MY_Model{
    function __construct()
    {
        parent::__construct();
        $join = array(
            'tabela_Usu'=>array('usuario','usuario.usu_id = rastreado.ras_id_usuario'),

            
        );
        $select = 'rastreado.ras_id,rastreado.ras_descricao,rastreado.ras_identificacao, rastreado.ras_tipo, usuario.usu_nome as ras_Usuario';

        $this->setConfigTabela('rastreado','ras_id',$join,$select);
    }
}


?>