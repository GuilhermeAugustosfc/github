<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Equipamento extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        validaSession();
        $this->load->model('Equipamento_model');
        
    }
    public function index()
    {
        $dados = array(
            'js'=>array(
                base_url("assets/js/generico/insere_e_deleta_tabela.js")
            ),
            'variavel_de_identificacao'=>'Equipamento',
            'url_edita'=>"Equipamento/form",
            'url_reload'=>base_url("Equipamento"),
            'Controler'=>base_url("Equipamento/sistema")
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
            'fomulario'=>$this->load->view('cadastros/Equipamento/form',array(),true),
            'nome'=> 'Equipamento',
            'url_reload'=>base_url("Equipamento"),
            'Controler'=>base_url("Equipamento/sistema"),
            'url_resumo'=>base_url('Equipamento/Resumo')

        );
        $this->load->template('generico/template_form',$dados);
    }
    public function sistema()
    {
        $metodo = $this->input->method();
        switch ($metodo) {
            case 'delete':
                $dados = $this->input->input_stream();
                if($this->Equipamento_model->deletar($dados)){
                    echo json_encode(array('status'=>true));
                }else{
                    echo $this->Equipamento_model->deletar($ids);
                }
                break;
            case 'post':
            $config = array(
                array(
                    'field'=>'equ_numero_serie',
                    'label'=>'Numero de Serie',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'numeric'=>'O campo %s é numerico',
                        'required'=>'O campo %s é numerico'
                    ),
                ),array(
                    'field'=>'equ_numero_chip',
                    'label'=>'Numero do chip',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'numeric'=>'O campo %s é numerico',
                        'required'=>'O campo %s é numerico'
                    ),
                ),array(
                    'field'=>'equ_id_produto',
                    'label'=>'Produto',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'numeric'=>'O campo %s é obrigatório',
                    ),
                )
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == true){
                $dados = $this->input->post();
                $this->Equipamento_model->inserir($dados);
                echo json_encode(array('status'=>true));
            }
            else{
                echo json_encode(array('status'=>false,'dados'=>validation_errors()));
            }
                break;
                
            case 'get':
                    $dados = $this->input->get();
                    echo json_encode($this->Equipamento_model->Buscar($dados));
                    break;
                        
            
            case 'put':
                $edicao = $this->input->input_stream();
                
                if($this->Equipamento_model->editar($edicao)){
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

            array('select'=>'pro_descricao as descricao, pro_id as id','tabela'=>'produto'),
            
        );
        echo json_encode($this->Equipamento_model->getResumos($dados));
    }
    
    


}


?>