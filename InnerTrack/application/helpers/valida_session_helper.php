<?php
function validaSession(){
    $ci = get_instance();
    if($ci->session->userdata('usuario_logado') == null)
    {
        redirect('Login');
    }
}
?>