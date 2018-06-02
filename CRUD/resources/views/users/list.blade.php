@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Usuários
                        {!! Form::model('', ['method'=>'POST', 'url'=> 'list', 'class'=>'form form-inline']) !!}

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
                                @foreach($users as $user)
                                <tr>
                                    <td><img src="{{ url('storage/photo/original/'.$user->photo) }}" alt="{{ $user->name }}" class="img-responsive center-block" style="max-width: 25px"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->birth_date}}</td>
                                    <td>{{$user->cpf}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!   $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
