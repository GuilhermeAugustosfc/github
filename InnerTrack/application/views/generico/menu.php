<nav class="pushy pushy-left container-menu" id="container-menu" >
    <div class="img-menu">
        <img class="img-fluid img" src="<?=base_url("img/login-logo.jpg")?>" alt="img-menu">
    </div>
    <div class="pushy-content menu-overlay">
        <ul class="ul">
            <li class="pushy-link admin-area">
               Administrador<br/>
               <small class="text text-success">
                   Online/Ativo
                   <i class="fas fa-circle small"></i>
                </small>
            </li>
            <!-- Administrador -->
            <li class="pushy-link">
                <a href="<?=base_url("dashboard")?>" title="Pagina inicial"><i class="fas fa-tachometer-alt icon"></i>
                Dashboard
                </a>
            </li>
            <li class="pushy-submenu pushy-submenu-closed">
                <button><i class="fas fa-book-open icon"></i>Cadastros</button>
                <ul>
                    <li class="pushy-link"><a href="<?=base_url("Equipamento")?>"> Equipamento</a></li>
                    <li class="pushy-link"><a href="<?=base_url("Rastreado")?>"> Rastreados</a></li>
                    <li class="pushy-link"><a href="<?=base_url("Clientes")?>"> Cliente</a></li>
                    <li class="pushy-link"><a href="<?=base_url("Instalacao")?>"> Instalação</a></li>
                </ul>
            </li>
            <li class="pushy-submenu pushy-submenu-closed">
                <button><i class="fas fa-flag icon"></i>Relatorios</button>
                <ul>
                    <li class="pushy-link"><a href="<?=base_url("Relatorio")?>">Eventos do sistema</a></li>
                </ul>
            </li>
            <!-- User -->
            <li class="pushy-link admin-area">
               Users
            </li>
            <li class="pushy-link"><a href="#"><i class="fas fa-cogs icon"></i>Conta</a></li>
            
        </ul>
    </div>
</nav>
<div class="site-overlay"></div>

<nav class="navbar navbar-dark bg-dark position-fixed w-100">
    <div class="menu">
        <button class="menu-btn botaoDoMenu">
            <i class="fas fa-bars icon-menu"></i>
        </button>
    </div>
    <div class="dashboard">
        <h2 class="title-nav"><a href="<?=base_url("dashboard")?>">INNERTRACK</a></h2>
    </div>
    <div class="config d-flex">
        <div class="alerts d-flex align-items-center">
            <div class="abre_modal">
                <i class="fas fa-bell sino"></i>
                <span class="badge badge-warning" id="sino_de_alerta">0</span>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle usuario" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario
            </button>
            <div class="dropdown-menu pai_config_usuario p-0" aria-labelledby="dropdownMenuButton">
                <div class="card">
                    <div class="card-header text-center bg-dark text-light" id="logado_nome">Nome usuario</div>
                    <div class="card-body d-flex ">
                        <a class="dropdown-item p-0 links_config" href="#">Config</a>|&nbsp 
                        <a class="dropdown-item p-0 links_config" href="<?= base_url('Login/logout')?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div id="modal" data-izimodal-transitionin="fadeInUp" data-izimodal-title="Tabela" >
    <table id="minhaTabela" data-pagination="true"></table>
    
</div>

