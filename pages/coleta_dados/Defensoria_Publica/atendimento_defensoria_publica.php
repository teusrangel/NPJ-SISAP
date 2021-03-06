<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
require_once("../../../pages/conexao/conn.php");
include("../../../pages/login/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>

<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Defensoria Publica</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../../plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../../../plugins/morris/morris.css">
    <link rel="stylesheet" href="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../../../plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
    <link rel="stylesheet" href="../../../plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../../../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../../dist/css/form_Style.css">
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="../../../js/cidades-estados-1.4-utf8.js"></script>
    <!--cidades e estados -->

</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <header class="main-header">
        <a href="../../../index.php" class="logo">
            <span class="logo-mini"><b>NPJ</b></span>
            <span class="logo-lg"><b>NPJ</b> | FCAT</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- NOTIFICAÇÃO DE NOVO VINCULO -->
                    <li class="dropdown notifications-menu">
                        <?php
                        $idUsuario = $_SESSION['usuarioID'];
                        $sql = mysql_query("SELECT * FROM atendimento_defensoria WHERE Usuario_idUsuario = $idUsuario");
                        $total = mysql_num_rows($sql);
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-danger"><?php echo $total ?> </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="header"><?php echo "Voce tem " . $total . " Notificações" ?></li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php
                                    while ($result = mysql_fetch_array($sql)) {
                                        ?>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> <?php echo $result['descricaoAtendimentoDefensoria']; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Ver Todas</a></li>
                        </ul>
                    </li>
                    <!-- FIM - NOTIFICAÇÃO -->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php
                            echo "../../../" . $_SESSION['imagem']
                            ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php
                                echo "Bem-Vindo, " . $_SESSION['usuarioNome'];
                                ?>

                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="
                                <?php
                                echo "../../../" . $_SESSION['imagem']
                                ?>
                                " class="img-circle" alt="User Image">

                                <p>
                                    <?php
                                    echo "Bem-Vindo, " . $_SESSION['usuarioNome'];
                                    ?>
                                    <small><!-- EMAIL -->
                                        <?php
                                        echo "" . $_SESSION['email'];
                                        ?>
                                    </small>
                                    <small><!-- PERMISSAO -->
                                        <?php
                                        echo "" . $_SESSION['permissaoUser'];
                                        ?>
                                    </small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="../../../pages/login/lockscreen.php" class="btn btn-default btn-flat">Bloquear</a>
                                </div>

                                <div class="pull-right">
                                    <a href="#" onclick="ModalFechar()" class="btn btn-default btn-flat">Sair</a>
                                </div>
                                <script>
                                    function ModalFechar() {
                                        $('#openModal').modal('show');
                                    }
                                </script>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>


    </header>
    <!-- Left side column. contains the logo and sidebar -->


    <!--####################### MENU PRINCIPAL - BARRA LATERAL ESQUERDA ############################-->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <!-- IMAGEM DO USUÁRIO, CAMINHO PEGO DO BD  -->
                    <img src="
								<?php
                    echo "../../../" . $_SESSION['imagem']
                    ?>
                                " class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <!-- NOME DO USUARIO -->
                    <p>
                        <?php
                        echo "" . $_SESSION['usuarioNome'];
                        ?>
                    </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>


            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"><h4 ALIGN="center">MENU PRINCIPAL</h4></li>
                <!-- MENU PARA PROFESSOR -->
                <li class="header">Professor</li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit "></i> <span>Correção</span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-hand-o-right"></i>Aprovação/Reprovação</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i> <span>Cadastro</span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../../pages/cadastro/usuario/novo_usuario.php"><i class="fa fa-hand-o-right"></i>Novo
                                Usuário</a>
                        </li>
                        <li><a href="../../../pages/cadastro/assunto/novo_assunto.php"><i class="fa fa-hand-o-right"></i>Novo
                                Assunto/Ação</a></li>
                    </ul>

                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-upload"></i> <span>Upload</span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../../pages/docs/enviar_documento.php"><i class="fa fa-hand-o-right"></i>Peças</a>
                        </li>
                    </ul>

                </li>

                <!-- MENU PARA ALUNO -->
                <li class="header">Aluno</li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-o"></i> <span> Coleta de Dados </span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../../pages/coleta_dados/NPJ/AtendimentoNPJ.php"><i class="fa fa-hand-o-right"></i> NPJ
                            </a>
                        </li>
                        <li><a href="../../../pages/coleta_dados/defensoria_publica/atendimento_defensoria_publica.php"><i
                                    class="fa fa-hand-o-right"></i> DEFENSORIA PÚBLICA </a></li>


                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i> <span> Acompanhamento </span> <i
                            class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../../pages/coleta_dados/NPJ/AtendimentoNPJ.php"><i class="fa fa-hand-o-right"></i>
                                Mediação
                            </a></li>

                    </ul>
                </li>


                <!--<li class="header">Secretaria</li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Teste</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level One <i
                                    class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i
                                            class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>-->

                <li class="header"></li>
            </ul>
            <br/><br/><br/>
            <img class="imagemFcat" align="center" src="../../../imagens/fcat1.png">
        </section>
        <!-- /.sidebar -->
    </aside>


    <!--####################### FIM -  MENU PRINCIPAL - BARRA LATERAL ESQUERDA ############################-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Coleta de Dados - Defensoria Pública
            <small>Painel de Controle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Coleta de Dados - Defensoria Pública</li>
        </ol>
    </section>

    <section class="content">
        <form class="contact_form" method="post" action="cadastro.php">
            <!-- ################### FORMULARIO DE CADASTRO -->
            <!-- ########################### ASSISTIDO -->
            <div class="box box-primary">
                <div class="box-header">
                    <div class="form-group">
                        <h3 class="box-title">Assistido</h3>
                        <span class="required_notification"><img src="../../../dist/img/red_asterisk.png"> Indica campo obrigatório</span><br/>
                        <hr>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input class="form-control" required name="nomeAssistido" type="text"
                                   placeholder="Nome do Assistido">
                        </div>
                        <br/>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" required name="telefoneAssistido" class="form-control"
                                   placeholder="Telefone do Assistido" data-inputmask='"mask": "(99)99999-9999"'
                                   data-mask>
                        </div>
                        <br/>
                        <!-- ENDEREÇO DO ASSISTIDO -->
                        <!-- ESTADO -->
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-check"></i>
                            </div>
                            <select class="form-control select2" name="estadoAssistido" id="estado2"></select>
                        </div>
                        <br/>
                        <!--CIDADE-->
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-street-view"></i>
                            </div>
                            <select class="form-control select2" name="cidadeAssistido" id="cidade2"></select>
                        </div>
                        <br/>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-street-view"></i>
                            </div>
                            <input class="form-control" name="enderecoAssistido" required="required" type="text"
                                   placeholder="Endereço do Assistido">
                        </div>
                        <br/>
                    </div>
                </div>
            </div>


            <div class="box box-primary">
                <div class="box-header">
                    <!--REQUERIDO -->
                    <h3 class="box-title">Requerido</h3>
                    <hr>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input class="form-control" name="nomeRequerido" required type="text"
                               placeholder="Nome do Requerido">
                    </div>
                    <br/>
                    <!-- phone mask -->

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="telefoneRequerido" required class="form-control"
                               placeholder="Telefone do Requerido" maxlength="14"
                               data-inputmask='"mask": "(99)99999-9999"'
                               data-mask>
                    </div>
                    <br/>

                    <!-- ENDEREÇO DO REQUERIDO -->
                    <!-- ESTADO -->
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <select class="form-control select2" title="estadoRequerido" required name="estadoRequerido"
                                id="estado3"></select>
                    </div>
                    <br/>
                    <!-- CIDADE -->
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-street-view"></i>
                        </div>
                        <select class="form-control select2" name="cidadeRequerido" id="cidade3"></select>
                    </div>
                    <br/>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-street-view"></i>
                        </div>
                        <input class="form-control" name="enderecoRequerido" required="required" type="text"
                               placeholder="Endereço do Requerido">
                    </div>
                    <br/>

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                    <!-- DADOS -->
                    <h3 class="box-title">Dados</h3><br/><br/>


                    <?php
                    $query = mysql_query("SELECT idAssunto_Atendimento, descricao FROM assunto_atendimento");
                    ?>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <select class="form-control select2" name="assunto" style="width: 100%;">
                            <option>Selecione um Assunto</option>
                            <?php while ($result = mysql_fetch_array($query)) { ?>
                                <option
                                    value="<?php echo $result['descricao'] ?>"><?php echo $result['descricao'] ?></option>
                            <?php } ?>

                        </select><br/>
                    </div>
                    <br/>

                    <?php
                    $query = mysql_query("SELECT idUsuario, nome FROM usuario WHERE permissao = 'Aluno'")
                    ?>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <select class="form-control select2" name="AlunoVinculo">
                            <option>Selecione um Aluno para tratar do caso</option>
                            <?php while ($result = mysql_fetch_array($query)) { ?>
                                <option value="<?php echo $result['nome'] ?>"><?php echo $result['nome'] ?></option>
                            <?php } ?>

                        </select><br/>
                    </div>
                    <br/>

                    <!-- textarea -->
                    <div class="form-group">

                        <textarea class="form-control" name="observacao" rows="5" placeholder="Observação"></textarea>
                    </div>

                    <!-- ESTE CAMPO SERÁ FEITO UPLOAD DOS ARQUIVOS SCANEADOS - DOCUMENTOS NA PAG2 -->
                    <div class="form-group">
                        <select id="idselect" name="idPosto" onchange="UploadDocumentos(this.value)"
                                class="form-control select2" multiple="multiple"
                                data-placeholder="Documentos Apresentados"
                                style="width: 100%;">
                            <option value="cpf">CPF</option>
                            <option value="rg">RG</option>
                            <option value="ctps">CTPS</option>
                            <option value="comprovanteResidencia">Comprovante de Residência</option>
                            <option value="contracheque">Contracheque</option>
                            <option value="certidaoNascimento">Certidão de Nascimento</option>
                            <option value="certidaoCasamento">Certidão de Casamento</option>
                            <option value="certidaoObito">Certidão de Óbito</option>
                        </select>
                        <br/></div>


                    <!-- MODAL PARA UPLOAD -->
                    <div class="container">
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" id="TituloModal">Upload do Documento</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- IMAGEM -->

                                        <div class="input-group input-group-sm">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-image"></i>
                                                </div>
                                                <input class="form-control" name="foto" type="file" id="arquivo"/>
                                            </div>
                                                <span class="input-group-btn">
                                                    <button type="button" onclick="submitForm();"
                                                            class="btn btn-info btn-flat">
                                                        Enviar Imagem
                                                    </button>
                                                </span>
                                        </div>

                                        <output id="result"></output>
                                        <!-- FIM IMAGEM --><br/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" onclick="limparUpload()"
                                                data-dismiss="modal">Fechar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIM - MODAL PARA UPLOAD -->

                    <script>
                        function limparUpload() {
                            $('#arquivo').value = "";
                            $('#result').value = "";
                        }
                    </script>

                    <script type="text/javascript">
                        function UploadDocumentos(valor) {
                            $('#myModal').modal('show');
                        }
                    </script>


                    <!--Login-->
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input class="form-control" name="loginDefensoria" type="text"
                               placeholder="Login da Defensoria">
                    </div>
                    <br/>

                     <span class="input-group-btn">
                         <button type="submit" name="Submit" class="btn btn-primary">Cadastrar</button>
                     </span>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- FIM FORMULARIO DE CADASTRO -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2015 - NPJ </strong>| FCAT - Núcleo de Prática Jurídica | Faculdade de Castanhal -
    Desenvolvido por <a href="pages/tecnosoft/tecnosoft.php">TecnoSoft Studio</a> - Todos os direitos reservados.
</footer>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Em desenvolvimento</h3>

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">Configurações Gerais</h3>


                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Mostrar-me Online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Desativar Notificações
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Apagar histórico de Mensangem
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
    <!-- MODAIS -->
    <div class="container">
        <div class="modal fade" id="openModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="TituloModal">Saindo do Sistema</h4>

                    </div>
                    <div class="modal-body">

                        <form method="POST" action="../../../pages/login/logout.php">
                            <div class="input-group input-group-sm">
                                <p>Tem certeza que deseja sair?</p>
                            </div>
                            <br/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Sair do Sistema</button>
                        </form>
                        <button type="button" class="btn btn-default" onclick="" data-dismiss="modal">Cancelar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
<script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
    $('select[name="estadoRequerido"]').on('change', function () {
        var estado = this.value;
        $('select[name="CIDADE"] option').each(function () {
            var $this = $(this);
            if ($this.data('estado') == estado) $this.show();
            else $this.hide();
        });
    });

</script>
<!-- Bootstrap 3.3.5 -->
<script src="../../../bootstrap/js/bootstrap.min.js"></script>

<script src="../../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        cidade: document.getElementById('cidade2'),
        estado: document.getElementById('estado2'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    })
</script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        cidade: document.getElementById('cidade3'),
        estado: document.getElementById('estado3'),
        estadoVal: 'PA',
        cidadeVal: 'Castanhal'
    })
</script>

<script type="text/javascript">
    function getCoords() {
        var api;
        $('#toCrop').Jcrop({
            minSize: [160, 160],
            aspectRatio: 1,
            bgOpacity: 0.4,
            addClass: 'jcrop-light',
            onSelect: updateCoords,
            onChange: updateCoords,
            setSelect: [0, 0, 160, 160]
        });
    }

    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    ;

    function _(element) {
        if (document.getElementById(element))
            return document.getElementById(element);
        else
            return false;
    }

    function submitForm() {
        if (_('arquivo').files[0]) {//Se houver um arquivo, faremos alguns testes no mesmo
            var arquivo = _('arquivo').files[0];
            if (arquivo.type != 'image/png' && arquivo.type != 'image/jpeg')
                _('result').innerHTML = 'Por favor, selecione uma imagem do tipo JPEG ou PNG';
            else if (arquivo.size > 1024 * 2048)//2MB
                _('result').innerHTML = 'Por favor selecione uma image mo máximo 2MB de tamanho.';
            else {
                var x = _('x').value;
                var y = _('y').value;
                var w = _('w').value;
                var h = _('h').value;
                var formData = new FormData();
                formData.append('arquivo', arquivo);
                formData.append('x', x);
                formData.append('y', y);
                formData.append('w', w);
                formData.append('h', h);
                if (_('imgType')) {
                    var imgType = _('imgType').value;
                    formData.append('imgType', imgType);
                }
                if (_('imgName')) {
                    var imgName = _('imgName').value;
                    formData.append('imgName', imgName);
                }
                var request = new XMLHttpRequest();
                if (_('toCrop'))
                    var includeFile = 'recebeFile.php';
                else
                    var includeFile = 'recebeFile.php';
                request.open('post', includeFile, true);
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200)
                        _('result').innerHTML = request.responseText;

                }
                request.send(formData);
                _('result').innerHTML = '<img src="../../../loader.gif" />';
            }
        }
        else
            _('result').innerHTML = 'Por favor, selecione uma imagem para ser enviada!';
    }
</script>

</body>
</html>