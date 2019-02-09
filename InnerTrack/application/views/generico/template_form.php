<div class="container-fluid" id="tabela">
    <div class="card painel-container">
        <div class="rotas">
            <i class="fas fa-car"></i>
            <a class="ancora-link" href="<?=base_url("dashboard")?>">Dashboard</a>/<a class="ancora-link" href="<?=base_url($nome)?>"><?=$nome?></a></span>/<span class="template_router">Formulario de <?=$nome?></span>        </div>
        <div class="card-body">
            <div class="card-header bg-dark titulo-form">
                <?=$nome?>
            </div>
            <div class="card">
                <div class="card-body">
                    <?=$fomulario?>
                    <div class="botoes d-flex">
                        <button class="btn btn-dark mr-1" id="btn-confirmar">Confirmar</button>
                        <a href="<?=base_url($nome)?>">
                            <button class="btn btn-warning bg-laranja">Voltar</button>
                        </a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>