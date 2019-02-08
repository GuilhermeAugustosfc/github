<div class="container-fluid tabela">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <a href="<?=base_url('Clientes')?>">
                <div class="info">
                    <i class="fas fa-users icon-dash cinza"></i>
                    <div class="info-dash">
                        <small>Clientes</small><br>
                        <strong class="h4" id="clientes">0</strong>
                    </div>
                </div>
            </a>
        </div><!--/.col-->
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <a href="<?=base_url('Instalacao')?>">
            <div class="info">
                <i class="fas fa-book-open icon-dash roxo"></i>
                <div class="info-dash">
                    <small>Instalações</small><br>
                    <strong class="h4" id="instalacao">0</strong>
                </div>
            </div>
            </a>
        </div><!--/.col-->
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <a href="<?=base_url('Rastreado')?>">
                <div class="info ">
                    <i class="fas fa-car icon-dash dark_cinza"></i>
                    <div class="info-dash">
                        <small>Rastreados</small><br>
                        <strong class="h4" id="rastreado">0</strong>
                    </div>
                </div>
            </a>
        </div><!--/.col-->
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <a href="<?=base_url('Equipamento')?>">
                <div class="info ">
                    <i class="fas fa-satellite icon-dash vermelho_escuro"></i>
                    <div class='info-dash'>
                        <small>Equipamentos</small><br>
                        <strong class="h4" id="equipamento">0</strong>
                    </div>
                </div>
            </a>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card borda">
                <div class="card-header bg-laranja d-flex justify-content-between">
                    <span>Mapa</span>
                    <div class="dropdown">
                        <span class="dropdown-toggle markers" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-map-marker-alt"></i>
                            Marker
                        </span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="maker">
                
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="map" id="map">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center bg-white">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 mt-3">
            <ul class="nav nav-tabs bg-laranja" id="myTab" role="tablist">
                <li class="bg-dark">
                    <a class="nav-link titulo-graficos">Graficos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="pizza-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pizza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="colunas-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Colunas</a>
                </li>
            </ul>
            <div class="card-body bg-white grafico">
                <div class="tab-content " id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="pizza-tab">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="colunas-tab">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           
            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog margin-modal modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header bg-dark text-light text-center">
                    <span class="modal-title" id="exampleModalLabel">Eventos</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive p-0">
                    <table class="table table-hover table-dark m-0">
                        <thead>
                            <tr>
                                <th>Rastreado</th>
                                <th>Equipamento</th>
                                <th>Usuario</th>
                                <th>Localização</th>
                                <th>Velocidade</th>
                                <th>Data</th>
                                <th>ignição</th>
                                <th>GPS</th>
                                <th>GPSR</th>
                            </tr>
                        </thead>
                        <tbody id="detalhes_do_marker"></tbody>
                    </table>
                </div>
                <div class="modal-footer bg-laranja p-2">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
</div>