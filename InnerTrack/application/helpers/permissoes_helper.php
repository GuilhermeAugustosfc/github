<?php
function Permissao(){
    $ci = get_instance();
    $usuario = $ci->session->userdata('usuario_logado');
    if($usuario['usu_admin'] == '0'){
        redirect('Dashboard?permisao=false');
    }
}



?>