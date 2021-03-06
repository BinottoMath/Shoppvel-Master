<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Shoppvel</title>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/css/treeview.css')}}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="{{asset('bootstrap/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="justified-nav.css" rel="stylesheet">
        <link href="bootstrap-cyborg/bootstrap.min.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="{{asset('bootstrap/js/ie-emulation-modes-warning.js')}}"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            @include('layouts.frente-cabecalho')
            
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-lg-2">
                    <h3>Cliente</h3>
                    <ul>
                        <li>
                            <a href="{{route('cliente.dashboard')}}">
                                Painel de controle
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cliente.pedidos')}}">
                                Todos os pedidos
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cliente.pedidos', '?status=nao-pagos')}}">
                                Pedidos pendentes de pagamento
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cliente.pedidos', '?status=pagos')}}">
                                Pedidos pagos
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cliente.pedidos', '?status=finalizados')}}">
                                Pedidos finalizados
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cliente.perfil')}}">
                                Perfil
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10">
                    @include('layouts.messages')

                    @yield('conteudo')
                </div>
            </div>

            <!-- Site footer -->
            <footer class="footer">
                <p>&copy; 2016 Ademir Mazer Junior. @nunomazer - ademir.mazer.jr@gmail.com</p>
            </footer>

        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{asset('bootstrap/assets/js/ie10-viewport-bug-workaround.js')}}"></script>
        <script src="/js/treeview.js"></script>
    </body>
</html>
