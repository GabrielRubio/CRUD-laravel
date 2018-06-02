@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Usuários
                        {!! Form::model('', ['method'=>'POST', 'url'=> 'usuarios', 'class'=>'form form-inline']) !!}

                        {!! Form::input('string', 'name', null,['class'=>'form-control', 'placeholder'=>'Nome']) !!}
                        {!! Form::input('string', 'email', null,['class'=>'form-control', 'placeholder'=>'Email']) !!}
                        {!! Form::input('string', 'cpf', null,['class'=>'form-control', 'placeholder'=>'CPF']) !!}

                        {!! Form::submit('Pesquisar',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data Nascimento</th>
                            <th>CPF</th>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td><img src="{{ url('storage/photo/original/'.$usuario->photo) }}" alt="{{ $usuario->name }}" class="img-responsive center-block" style="max-width: 25px"></td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{$usuario->birth_date}}</td>
                                    <td>{{$usuario->cpf}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!   $usuarios->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
