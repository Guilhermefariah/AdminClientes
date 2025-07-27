<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: italic;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-image: url('/img/administracao.jpg');
            border-right: 3px solid #000000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.438);
            transition: width 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .sidebar-title {
            display: none;
        }

        .sidebar .nav-link span {
            display: inline;
            color: #ffffff;
        }

        .sidebar.collapsed .nav-link span {
            opacity: 0;
            width: 0;
            display: inline-block;
            overflow: hidden;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                top: 0;
                left: 0;
                height: 100vh;
                overflow-y: auto;
                z-index: 1050;
            }
        }
    </style>
</head>

<body class="bg-light">
    <button class="btn btn-success d-md-none m-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-12 col-md-3 col-lg-2 sidebar collapse d-md-block" id="sidebar" onmouseenter="expandirSidebar()" onmouseleave="recolherSidebar()">
                <div class="position-sticky pt-4">
                    <div class="text-center text-white mb-4 border-bottom">
                        <h4>
                            <i class="fas fa-users"></i>
                            <span class="sidebar-title fs-4">Administração</span>
                        </h4>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}" href="{{ route('clientes.index') }}">
                                <i class="fas fa-user-friends" style="color: #ffffff;"></i>
                                <span class="fs-5 ms-2 "> Clientes</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-12 col-md-9 ms-sm-auto col-lg-10 px-3 px-md-4">
                <div class="pt-3 pb-2 mb-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('scripts')
</body>

</html>
