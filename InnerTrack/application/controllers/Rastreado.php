<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rastreado extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        validaSession();
        $this->load->model('Rastreado_model');
        
    }
    public function index()
    {
        $dados = array(
            'js'=>array(
                base_url("assets/js/generico/insere_e_deleta_tabela.js")
            ),
            'variavel_de_identificacao'=>'Rastreado',
            'url_edita'=>"Rastreado/form",
            'url_reload'=>base_url("Rastreado"),
            'Controler'=>base_url("Rastreado/sistema")
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
            'fomulario'=>$this->load->view('cadastros/rastreado/form',array(),true),
            'nome'=> 'Rastreado',
            'url_reload'=>base_url("Rastreado"),
            'Controler'=>base_url("Rastreado/sistema"),
            'url_resumo'=>base_url('Rastreado/Resumo')

        );
        $this->load->template('generico/template_form',$dados);
    }
    public function sistema()
    {
        $metodo = $this->input->method();
        switch ($metodo) {
            case 'delete':
                $dados = $this->input->input_stream();
                if($this->Rastreado_model->deletar($dados)){
                    echo json_encode(array('status'=>true));
                }else{
                    echo $this->Rastreado_model->deletar($ids);
                }
                break;
            case 'post':
            $config = array(
                array(
                    'field'=>'ras_descricao',
                    'label'=>'Descrição',
                    'rules'=>'required'
                ),array(
                    'field'=>'ras_identificacao',
                    'label'=>'Identificação',
                    'rules'=>'required'
                ),array(
                    'field'=>'ras_tipo',
                    'label'=>'Tipo de veiculo',
                    'rules'=>'required|in_list[Pessoa,Caminhão,Carro,Bicicleta,Moto]',
                    
                )
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == true){
                $dados = $this->input->post();
                $this->Rastreado_model->inserir($dados);
                echo json_encode(array('status'=>true));
            }
            else{
                echo json_encode(array('status'=>false,'dados'=>validation_errors()));
            }
                break;
                
            case 'get':
                    $dados = $this->input->get();
                    echo json_encode($this->Rastreado_model->Buscar($dados));
                    break;
                        
            
            case 'put':
                $edicao = $this->input->input_stream();
                
                if($this->Rastreado_model->editar($edicao)){
                    echo json_encode(array('status'=>true));
                }else{
                    echo json_encode(array('status'=>false));
                }
                break;
            
            
        }

    }
    public function Resumo()
    {
        echo json_encode($this->Rastreado_model->getResumos($dados));
    }
    
    


}


?>