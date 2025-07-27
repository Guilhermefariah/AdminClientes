@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
        <h1 class="h2">Relatórios de Clientes</h1>
        <a href="{{ route('clientes.index') }}" class="btn btn-success shadow">
            <i class="fas fa-arrow-left me-1"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('relatorios.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="filtro" class="form-label fw-bold">Filtrar por:</label>
                    <select name="filtro" onchange="this.form.submit()" class="form-select">
                        <option value="hoje" {{ $filtro == 'hoje' ? 'selected' : '' }}>Hoje</option>
                        <option value="semana" {{ $filtro == 'semana' ? 'selected' : '' }}>Esta semana</option>
                        <option value="mês" {{ $filtro == 'mês' ? 'selected' : '' }}>Este mês</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div>
            <div class="card border shadow h-100 border-primary">
                <div class="card-body text-center">
                    <h6 class="text-muted"><i class="fas fa-user-friends text-primary"></i> +18 com renda &gt; média</h6>
                    <h2 class="fw-bold text-primary">{{ $maioresDeIdadeComMaisRenda }}</h2>
                    <small class="text-muted">{{ ucfirst($filtro) }}</small>
                </div>
            </div>
        </div>

        <div>
            <div class="card border shadow h-100 border-success">
                <div class="card-body text-center">
                    <h6 class="text-muted"><i class="fas fa-user-friends text-success"></i> Classe A (≤ R$980)</h6>
                    <h2 class="fw-bold text-success">{{ $classeA }}</h2>
                    <small class="text-muted">{{ ucfirst($filtro) }}</small>
                </div>
            </div>
        </div>

        <div>
            <div class="card border shadow h-100 border-warning">
                <div class="card-body text-center">
                    <h6 class="text-muted"><i class="fas fa-user-friends text-warning"></i> Classe B (≤ R$2500)</h6>
                    <h2 class="fw-bold text-warning">{{ $classeB }}</h2>
                    <small class="text-muted">{{ ucfirst($filtro) }}</small>
                </div>
            </div>
        </div>

        <div>
            <div class="card border shadow h-100 border-danger">
                <div class="card-body text-center">
                    <h6 class="text-muted"><i class="fas fa-user-friends text-danger"></i> Classe C (&gt; R$2500)</h6>
                    <h2 class="fw-bold text-danger">{{ $classeC }}</h2>
                    <small class="text-muted">{{ ucfirst($filtro) }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
