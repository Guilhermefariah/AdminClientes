@extends('layouts.app')

@section('content')
    <div>
        <h1>Editar Cliente</h1>
        <a href="{{ route('clientes.index') }}">Voltar</a>
    </div>

    <div>
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                @csrf
                @method('PUT')
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="{{ $cliente->nome }}" required maxlength="150">
                </div>
                <div>
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" value="{{ $cliente->cpf }}" required maxlength="14" pattern="^\d{3}\.\d{3}\.\d{3}-\d{2}$">
                </div>
                <div>
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" value="{{ $cliente->data_nascimento }}">
                </div>
                <div>
                    <label for="renda_familiar">Renda Familiar</label>
                    <input type="text" name="renda_familiar" value="{{ $cliente->renda_familiar }}">
                </div>

                <div>
                    <a href="{{ route('clientes.index') }}">Cancelar</a>
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
