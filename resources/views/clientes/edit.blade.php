@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1>Editar Cliente</h1>
        <a href="{{ route('clientes.index') }}" class="btn btn-success mt-2 shadow">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="nome" class="form-label mt-2 mb-0">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required maxlength="150">
                </div>
                <div>
                    <label for="cpf" class="form-label mt-2 mb-0">CPF</label>
                    <input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" required maxlength="14" pattern="^\d{3}\.\d{3}\.\d{3}-\d{2}$">
                </div>
                <div>
                    <label for="data_nascimento" class="form-label mt-2 mb-0">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" value="{{ $cliente->data_nascimento }}">
                </div>
                <div>
                    <label for="data_cadastro" class="form-label mt-2 mb-0">Data de Cadastro</label>
                    <input type="date" name="data_cadastro" class="form-control" value="{{ $cliente->data_cadastro }}" readonly>
                </div>
                <div>
                    <label for="renda_familiar" class="form-label mt-2 mb-0">Renda Familiar</label>
                    <input type="text" name="renda_familiar" class="form-control" value="{{ $cliente->renda_familiar }}">
                </div>

                <div>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
                    <button type="submit" class="btn btn-success shadow mt-2">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
