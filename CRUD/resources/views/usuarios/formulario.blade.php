@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detalhes sobre você!
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif




                            @if(Session::has('mensagem_sucesso'))
                                <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                            @endif


                            {!! Form::model($usuario, ['method' => 'PATCH', 'url' => 'usuarios/'.$usuario->id.'/detalhes']) !!}

                            {!! Form::label('nome','Nome') !!}
                            {!! Form::input('string', 'name', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Name']) !!}

                            {!! Form::label('email','Email') !!}
                            {!! Form::input('string', 'email', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Email']) !!}

                            {!! Form::label('cpf','CPF') !!}
                            {!! Form::input('string', 'cpf', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'CPF']) !!}

                            {!! Form::label('birth_date','Data de Nascimento') !!}
                            {!! Form::input('date', 'birth_date', null, ['class' => 'form-control', 'autofocus', 'placeholder']) !!}

                            {!! Form::hidden('activate', 1) !!}

                            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
                            {!! Form::submit('Desativar', ['class'=>'btn btn-primary']) !!}

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
