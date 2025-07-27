@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1>Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="btn btn-success mt-2 shadow">
            <i class="fas fa-plus"></i> Novo Cliente
        </a>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <form method="GET" action="{{ route('clientes.index') }}">
                <div class="input-group shadow-sm">
                    <input type="text" class="form-control" name="pesquisar" value="{{ request('pesquisar') }}" placeholder="Pesquisar...">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr class="text-center fs-4 fw-bold border">
                            <th class="border">Nome</th>
                            <th class="border">Renda Familiar</th>
                            <th class="border">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            @php
                                if ($cliente->renda_familiar <= 980) {
                                    $badgeColor = '#ff0000';
                                    $classe = 'Classe A:';
                                } elseif ($cliente->renda_familiar > 980 && $cliente->renda_familiar <= 2500) {
                                    $badgeColor = '#F2CB05';
                                    $classe = 'Classe B:';
                                } else {
                                    $badgeColor = '#267365';
                                    $classe = 'Classe C:';
                                }
                            @endphp
                            <tr class="text-center fs-5 border">
                                <td class="border">{{ $cliente->nome }}</td>
                                <td class="border">
                                    <span>{{ $classe }}</span>
                                    <span
                                        style="
                                            background-color: {{ $badgeColor }};
                                            color: {{ $badgeColor == '#F2CB05' ? '#000000' : '#ffffff' }};
                                            padding: 5px 10px;
                                            border-radius: 5px;
                                            font-weight: bold;
                                            display: inline-block;
                                            text-align: center;">
                                        R$ {{ number_format($cliente->renda_familiar, 2, ',', '.') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group gap-2">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-light">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form method="POST" action="{{ route('clientes.destroy', $cliente) }}"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover este cliente?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection