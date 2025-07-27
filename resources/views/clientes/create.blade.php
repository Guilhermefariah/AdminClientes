@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1>Novo Cliente</h1>
        <a href="{{ route('clientes.index') }}" class="btn btn-success mt-2 shadow">
            <i class="fas fa-arrow-left"></i>Voltar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.store') }}">
                @csrf
                <div class="row">
                    <div>
                        <label for="nome" class="form-label mt-2 mb-0">Nome</label>
                        <input type="text" name="nome" class="form-control" required maxlength="150" placeholder="Digite seu nome">
                    </div>
                    <div>
                        <label for="cpf" class="form-label mt-2 mb-0">CPF</label>
                        <input type="text" name="cpf" class="form-control" required maxlength="14" pattern="^\d{3}\.\d{3}\.\d{3}-\d{2}$"
                            placeholder="XXX.XXX.XXX-XX">
                    </div>
                    <div>
                        <label for="data_nascimento" class="form-label mt-2 mb-0">Data de Nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control" required>
                    </div>
                    <div>
                        <label for="data_cadastro" class="form-label mt-2 mb-0">Data de Cadastro</label>
                        <input type="date" name="data_cadastro" class="form-control" value="{{ now()->format('Y-m-d') }}" readonly>
                    </div>
                    <div>
                        <label for="renda_familiar" class="form-label mt-2 mb-0">Renda Familiar</label>
                        <input type="number" step="0.01" min="0" name="renda_familiar" class="form-control" placeholder="Digite sua renda familiar">
                    </div>

                    <div>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
                        <button type="submit" class="btn btn-success shadow mt-2">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
