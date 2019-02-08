<?php
class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        validaSession();
        $this->load->model('Dashboard_model');
    }
    public function index(){
        $data = array(
            'css'=> array(
                base_url("assets/css/dashboard/dashboard.css"),
                'https://unpkg.com/leaflet@1.0.1/dist/leaflet.css',
                base_url("assets/Libs/Leaflet.awesome-markers/dist/leaflet.awesome-markers.css")
                
            ),
            'js' => array(
                'https://unpkg.com/leaflet@1.0.1/dist/leaflet.js',
                base_url('assets/js/dashboard/dashboard.js'),
                'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js',
                base_url("assets/Libs/Leaflet.awesome-markers/dist/leaflet.awesome-markers.min.js")

            ),
        );
        
        $this->load->template('dashboard/dashboard', $data);
    }
    public function localizacao()
    {
        if($this->Dashboard_model->buscaLocalizacao()){
            echo json_encode($this->Dashboard_model->buscaLocalizacao());
        }else{
            echo json_encode(array('status'=>false));

        }
    }
    public function Resumos()
    {
        echo json_encode($this->Dashboard_model->busca_informacoes());
    }
}



?>