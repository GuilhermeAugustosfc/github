<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends MY_Model{
    function __construct()
    {
        parent::__construct();
        $join = array(
            'tabela_Usu'=>array('usuario','usuario.usu_id = clientes.cli_id_usuario'),
        );
        $select = 'clientes.cli_id,clientes.cli_nome,clientes.cli_endereco,clientes.cli_telefone,clientes.cli_cidade,usuario.usu_nome as usu_usuario';

        $this->setConfigTabela('clientes','cli_id',$join,$select);

    }
    
}




?>