@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informe abaixo as informações do Usuário:
                        <a class="pull-right" href="{{ url('usuarios') }}">Listar Usuários</a>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        {!! Form::open(['url' => 'usuarios/salvar']) !!}

                            @if(Session::has('mensagem_sucesso'))
                                <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                            @endif

                            {!! Form::label('nome','Nome') !!}
                            {!! Form::input('string', 'name', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Name']) !!}

                            {!! Form::label('email','Email') !!}
                            {!! Form::input('string', 'email', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Email']) !!}

                            {!! Form::label('password','Senha') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Password']) !!}

                            {!! Form::label('conf_password','Confirmação da senha') !!}
                            {!! Form::password('conf_password', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Password']) !!}

                            {!! Form::label('cpf','CPF') !!}
                            {!! Form::input('string', 'cpf', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'CPF']) !!}

                            {!! Form::label('birth_date','Data de Nascimento') !!}
                            {!! Form::input('date', 'birth_date', '', ['class' => 'form-control', 'autofocus', 'placeholder']) !!}

                            {!! Form::hidden('activate', 1) !!}

                            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
