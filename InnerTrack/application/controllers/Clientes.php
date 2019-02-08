<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        validaSession();
        $this->load->model('Cliente_model');
    }
    public function index()
    {
        $dados = array(
            'js'=>array(
                base_url("assets/js/generico/insere_e_deleta_tabela.js")
            ),
            'variavel_de_identificacao'=>'Clientes',
            'url_edita'=>"Clientes/form",
            'url_reload'=>base_url("Clientes"),
            'Controler'=>base_url("Clientes/sistema")
        );
        
        $this->load->template("generico/template_grid",$dados);
    }
    public function form()
    {
        
        Permissao();
        $dados = array(
            'js' => array(
                base_url("assets/js/generico/cadastra_e_edita_tabela.js")
            ),
            'fomulario'=>$this->load->view('cadastros/cliente/form',array(),true),
            'nome'=> 'Clientes',
            'url_reload'=>base_url("Clientes"),
            'Controler'=>base_url("Clientes/sistema")

        );
        $this->load->template('generico/template_form',$dados);
    }
    public function sistema()
    {
        $metodo = $this->input->method();
        switch ($metodo) {
            case 'delete':
                $dados = $this->input->input_stream();
                if($this->Cliente_model->deletar($dados)){
                    echo json_encode(array('status'=>true));
                }else{
                    echo $this->Cliente_model->deletar($ids);
                }
                break;
            case 'post':
                $config = array(
                    array(
                        'field'=>'cli_nome',
                        'label'=>'Nome',
                        'rules'=>'required'
                    ),array(
                        'field'=>'cli_endereco',
                        'label'=>'Endereço',
                        'rules'=>'required'
                    ),array(
                        'field'=>'cli_telefone',
                        'label'=>'Telefone',
                        'rules'=>'required|numeric'
                    ),array(
                        'field'=>'cli_cidade',
                        'label'=>'Cidade',
                        'rules'=>'required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run() == true){
                    $dados = $this->input->post();
                    echo json_encode($this->Cliente_model->inserir($dados));
                    
                }
                else{
                    echo json_encode(array('status'=>false,'dados'=>validation_errors()));
                }
                break;
                
            case 'get':
                    $dados = $this->input->get();
                    echo json_encode($this->Cliente_model->Buscar($dados));
                    break;
                        
            
            case 'put':
                $edicao = $this->input->input_stream();
                
                if($this->Cliente_model->editar($edicao)){
                    echo json_encode(array('status'=>true));
                }else{
                    echo json_encode(array('status'=>false));
                }
                break;
            
            
        }

    }
    
    


}


?>