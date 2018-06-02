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

                            {!! Form::image(url('storage/photo/original/'.$usuario->photo), $usuario->name,['class' => 'img-responsive center-block', 'style' => 'max-width: 120px'] ) !!}

                            {!! Form::model($usuario, ['method' => 'PATCH', 'url' => 'usuarios/'.$usuario->id.'/detalhes']) !!}

                            <br>

                            {!! Form::label('nome','Nome') !!}
                            {!! Form::input('string', 'name', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Name']) !!}

                            {!! Form::label('email','Email') !!}
                            {!! Form::input('string', 'email', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Email']) !!}

                            {!! Form::label('birth_date','Data de Nascimento') !!}
                            {!! Form::input('date', 'birth_date', null, ['class' => 'form-control', 'autofocus', 'placeholder']) !!}

                            @if($usuario->activate == '1')
                                {!! Form::label('activate','Conta Ativado') !!}
                            @else
                                {!! Form::label('activate','Conta Desativada') !!}
                            @endif

                            {!! Form::hidden('activate', $usuario->activate) !!}
                            <br>

                            {!! Form::submit('Editar', ['name' => 'button', 'class'=>'btn btn-primary']) !!}

                            @if($usuario->activate == '1')
                                {!! Form::submit('Desativar', ['name' => 'button', 'class'=>'btn btn-primary']) !!}
                            @else
                                {!! Form::submit('Ativar', ['name' => 'button', 'class'=>'btn btn-primary']) !!}
                            @endif


                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
