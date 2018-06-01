@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Usuários
                        {{--<form action="{{ route('usuarios.search') }}" method="POST" class="form form-inline">--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<input type="text" name="name" class="form-control" placeholder="Nome">--}}
                            {{--<input type="text" name="email" class="form-control" placeholder="Email">--}}
                            {{--<input type="text" name="cpf" class="form-control" placeholder="CPF">--}}

                            {{--<button type="submit" class="btn btn-primary">Pesquisar</button>--}}
                        {{--</form>--}}
                        {!! Form::model('', ['method'=>'POST', 'url'=> 'usuarios', 'class'=>'form form-inline']) !!}

                        {!! Form::input('string', 'name', null,['class'=>'form-control', 'placeholder'=>'Nome']) !!}
                        {!! Form::input('string', 'email', null,['class'=>'form-control', 'placeholder'=>'Email']) !!}
                        {!! Form::input('string', 'cpf', null,['class'=>'form-control', 'placeholder'=>'CPF']) !!}

                        {!! Form::submit('Pesquisar',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
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
                        {!!   $usuarios->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
