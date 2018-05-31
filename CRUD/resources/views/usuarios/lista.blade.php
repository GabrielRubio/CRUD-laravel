@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Usuários
                        <a class="pull-right" href="{{ url('usuarios/novo') }}">Novo Usuário</a>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        aquiiiii
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
