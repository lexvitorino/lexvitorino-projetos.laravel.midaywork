@extends('admin.layouts.app')

@section('content')
<main class="content">

    @include('admin.layouts.title')
    @include('admin.layouts.message')

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <ul>
            <h5><i class="icofont-ban mr-2"></i>Verifique os erros abaixo!</h5>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Informe o nome"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Informe o email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Informe a senha"
                    class="form-control @error('password') is-invalid @enderror" />
            </div>
            <div class="form-group col-md-6">
                <label for="password_confirmation">Confirmação de Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirme a senha" class="form-control @error('password') is-invalid @enderror" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Data de Admissão</label>
                <input type="date" id="start_date" name="start_date"
                    class="form-control"
                    value="{{ old('start_date') }}" />
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">Data de Desligamento</label>
                <input type="date" id="end_date" name="end_date"
                    class="form-control"
                    value="{{ old('end_date') }}" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group form-check col-md-6">
                <label for="is_admin" class="form-check-label">Administrador?</label>
                <input type="checkbox" id="is_admin" name="is_admin"
                    class="form-check-input ml-2"
                    {{ old('is_admin') ? 'checked' : '' }} />
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{route('users.index')}}"
                class="btn btn-secondary btn-lg">Cancelar</a>
        </div>
    </form>
</main>
@endsection