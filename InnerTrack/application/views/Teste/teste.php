<div class="container-fluid tabela">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                Mapa <i class="fas fa-globe-europe"></i>
                </div>
                <div class="card-body p-1">
                    <div id="map_teste"></div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <span class="p-2 text-center">
                    Ponto de referencia 
                    <i class="fas fa-map-marker"></i><br/>
                    <button class="btn btn-dark" id="idd_marker">Add</button>
                </span>
                <hr>
                <div class="card-body p-3 formulario">
                   <div class="form-group" id="cliente">

                   </div>
                   <input type="hidden" id="id_cliente" value="a">
                   <div class="form-group">
                        <label for="select">Cor do ponto de referencia</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-adjust"></i></span>
                            </div>
                            <select name="tipo" id="select" class="form-control">
                                <option class="text-primary" value="azul">Azul</option>
                                <option class="text-success" value="verde">Verde</option>
                                <option class="text-warning" value="amarelo">Amarelo</option>
                                <option class="text-danger" value="vermelho">Vermelho</option>
                            </select>
                            <div class="input-group-prepend">
                                <button class="btn bg-success add_tipo" id="abre_caixa_botoes">+</button>
                            </div>
                        </div>
                        <div class="input-group none" id="caixa-botoes">
                            <input type="text" class="form-control" placeholder="digite seu tipo..." id="novo_tipo">
                            <div class="botoes">
                                <button class="btn bg-success text-light" id="salvar_tipo"><i class="fas fa-check-circle"></i></button>
                                <button class="btn bg-danger text-light" id="cancelar_tipo"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                   </div>
                   <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <div class="input-group">
                            <input type="text" id="descricao" class="form-control">
                        </div>
                   </div>
                   <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <div class="input-group">
                            <input type="text" id="cidade" class="form-control">
                        </div>
                   </div>
                   <div class="form-group">
                        <label for="estado">Estado</label>
                        <div class="input-group">
                            <input type="text" id="estado" class="form-control">
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="bootstrapTable"></table>
            </div>
        </div>
    </div>
</div>