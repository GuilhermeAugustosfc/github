<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Instalacao extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        validaSession();
        $this->load->model('Instalacao_model');
        
    }
    public function index()
    {
        $dados = array(
            'js'=>array(
                base_url("assets/js/generico/insere_e_deleta_tabela.js")
            ),
            'variavel_de_identificacao'=>'Instalação',
            'url_edita'=>"Instalacao/form",
            'url_reload'=>base_url("Instalacao"),
            'Controler'=>base_url("Instalacao/sistema")
        );
        
        $this->load->template("generico/template_grid",$dados);
    }
    public function form()
    {
        
        
        $dados = array(
            'js' => array(
                base_url("assets/js/generico/cadastra_e_edita_tabela.js")
            ),
            'fomulario'=>$this->load->view('cadastros/Instalacao/form',array(),true),
            'nome'=> 'Instalacao',
            'url_reload'=>base_url("Instalacao"),
            'Controler'=>base_url("Instalacao/sistema"),
            'url_resumo'=>base_url('Instalacao/Resumo')

        );
        $this->load->template('generico/template_form',$dados);
    }
    public function sistema()
    {
        $metodo = $this->input->method();
        switch ($metodo) {
            case 'delete':
                $dados = $this->input->input_stream();
                if($this->Instalacao_model->deletar($dados)){
                    echo json_encode(array('status'=>true));
                }else{
                    echo $this->Instalacao_model->deletar($ids);
                }
                break;
            case 'post':
            $config = array(
                array(
                    'field'=>'ins_id_equipamento',
                    'label'=>'Equipamento',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'numeric'=>'O campo %s é obrigatório',
                    ),
                ),array(
                    'field'=>'ins_id_rastreado',
                    'label'=>'Rastreado',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'numeric'=>'O campo %s é obrigatório',
                    ),
                )
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == true){
                $dados = $this->input->post();
                $this->Instalacao_model->inserir($dados);
                echo json_encode(array('status'=>true));
            }
            else{
                echo json_encode(array('status'=>false,'dados'=>validation_errors()));
            }
                break;
                
            case 'get':
                    $dados = $this->input->get();
                    echo json_encode($this->Instalacao_model->Buscar($dados));
                    break;
                        
            
            case 'put':
                $edicao = $this->input->input_stream();
                
                if($this->Instalacao_model->editar($edicao)){
                    echo json_encode(array('status'=>true));
                }else{
                    echo json_encode(array('status'=>false));
                }
                break;
            
            
        }

    }
    public function Resumo()
    {
        $dados = array(

            array('select'=>'ras_descricao as descricao, ras_id as id','tabela'=>'rastreado'),
            array('select'=>'equ_numero_serie as descricao, equ_id as id','tabela'=>'equipamento')
            
        );
        echo json_encode($this->Instalacao_model->getResumos($dados));
    }
    
    


}


?>