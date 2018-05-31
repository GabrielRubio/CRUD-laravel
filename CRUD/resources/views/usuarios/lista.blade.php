@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Usuários
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data Nascimento</th>
                            <th>CPF</th>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{$usuario->birth_date}}</td>
                                    <td>{{$usuario->cpf}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
