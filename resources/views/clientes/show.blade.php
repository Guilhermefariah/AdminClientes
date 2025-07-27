@extends('layouts.app')

@section('content')
<div>
    <h1>Exibir Cliente</h1>
    <a href="{{ route('clientes.index') }}">Voltar</a>
</div>

<div>
    <div class="card-body">
            <div>
                <label for="nome">Nome</label>
                {{ $cliente->nome }}
            </div>
            <div>
                <label for="cpf">CPF</label>
                {{ $cliente->cpf }}
            </div>
            <div>
                <label for="data_nascimento">Data de Nascimento</label>
                {{ $cliente->data_nascimento }}
            </div>
            <div>
                <label for="renda_familiar">Renda Familiar</label>
                {{ $cliente->renda_familiar }}
            </div>

            <div>
                <a href="{{ route('clientes.index') }}">Cancelar</a>
                <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
            </div>
    </div>
</div>
@endsection