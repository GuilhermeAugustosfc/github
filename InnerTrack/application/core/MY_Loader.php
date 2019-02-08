<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Loader extends CI_Loader{

    public function template($caminho, $data = array()){
        $this->view("generico/cabecalho", $data);
        $this->view("generico/menu");
        $this->view($caminho, $data);
        $this->view("generico/rodape", $data);
    }
}
?>