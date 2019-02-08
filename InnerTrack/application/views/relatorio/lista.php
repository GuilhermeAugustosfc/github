<div class="container-fluid">
    <div class="row tabela">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label for="ras_descricao">Rastreado</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-car"></i></span>
                </div>
                <select name="equ_id" id="equ_id" data-tabela="rastreado" class="form-control busca">
                    <option selected value="" >Escolha um rastreado...</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12">
            <label for="data_inicio">Data de:</label>
            <div class="input-group mb-3">
                
                <input type="text" name="data_inicio" id="data_inicio" class="form-control busca">
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12">
            <label for="data_fim">Até de:</label>
            <div class="input-group mb-3">
                <input type="text" name="data_fim" id="data_fim" class="form-control busca">
            </div>
        </div>
        <div class="col-lg-2 col-md-12 col-sm-12 d-flex align-items-center ">
            <button class="btn btn-dark botao" id="buscar">Enviar</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2 bg-dark">
                    <i class="fas fa-globe-americas text-light mr-1"></i>
                    <span class="text-light">Mapa</span>
                </div>
                <div class="card-body p-1">
                    <div id='mymap'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card-header p-1 bg-light">
                <table id="tabela_relatorio"
                            data-thead-classes="thead-dark"
                            data-pagination="true"
                            data-page-list="[5,10,20,50,100]">
                </table>
            </div>
        </div>
    </div>
</div>
