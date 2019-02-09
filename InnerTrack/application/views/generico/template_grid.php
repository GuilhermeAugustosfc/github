<div class="card painel-container" >
    <div class="rotas">
        <i class="fas fa-car"></i>
        <a class="ancora-link" href="<?=base_url("dashboard")?>">Dashboard</a>/<span class="template_router"><?=$variavel_de_identificacao?></span>/<span class="template_router">Lista de <?=$variavel_de_identificacao?></span>
    </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-1" id="toolbar">
                    <a href="<?=base_url($url_edita)?>">
                        <button class="btn ladda-button theme " id="adicionar" data-spinner-color="blue" data-style="zoom-in">
                            <i class="fas fa-plus-circle"></i> Adicionar
                        </button>
                    </a>
                    <button class="btn ladda-button delete " id="delete" data-spinner-color="blue" data-style="zoom-in">
                        <i class="far fa-trash-alt"></i><span> Delete</span></a>
                    </button>
                    <button class="btn ladda-button edit " id="edit" data-spinner-color="blue" data-style="zoom-in">
                        <i class="fas fa-plus-circle"></i><span> Editar</span></a>
                    </button>
                </div>
                <div class="bootstrap-table">
                    <div class="table-responsive" id="tabela">
                        <table id="myTable"
                                        
                                data-pagination='true'
                                data-page-size="5"
                                data-page-list="[5,8,10]"
                                data-search="true"
                                data-click-to-select="true"
                                data-toolbar="#toolbar"
                                data-thead-classes="thead-dark">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</div>  