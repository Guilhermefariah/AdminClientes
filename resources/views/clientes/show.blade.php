@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1>Exibir Cliente</h1>
        <a href="{{ route('clientes.index') }}" class="btn btn-success mt-2 shadow">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div>
                <label for="nome" class="form-label fw-bold mt-2 mb-0">Nome</label>
                <div class="form-control">{{ $cliente->nome }}</div>
            </div>
            <div>
                <label for="cpf" class="form-label fw-bold mt-2 mb-0">CPF</label>
                <div class="form-control">{{ $cliente->cpf }}</div>
            </div>
            <div>
                <label for="data_nascimento" class="form-label fw-bold mt-2 mb-0">Data de Nascimento</label>
                <div class="form-control">
                    {{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}
                </div>
            </div>
            <div>
                <label for="data_cadastro" class="form-label fw-bold mt-2 mb-0">Data de Cadastro</label>
                <div class="form-control">
                    {{ \Carbon\Carbon::parse($cliente->data_cadastro)->format('d/m/Y') }}
                </div>
            </div>
            <div>
                <label for="renda_familiar" class="form-label fw-bold mt-2 mb-0">Renda Familiar</label>
                <div class="form-control">{{ $cliente->renda_familiar }}</div>
            </div>

            <div>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary mt-2">Editar</a>
            </div>
        </div>
    </div>
@endsection
