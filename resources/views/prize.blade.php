@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Congratulations! Your prize</div>

                <div class="card-body">
                    {{ $data['prize'] }} 
                    @if(is_int($data['prize']))
                    <strong> {{ $data['type']}}</strong>
                    @endif
                </div>

                <div class="card-footer">
                    <form action="/take_prize" method="POST" style="display: inline-block;">
                        @csrf
                        <input type="submit"/ value="Взять приз" class="btn btn-primary"/>
                    </form>
                    <a href="/" class="btn btn-secondary">Назад</a>
                    <a href="/" class="btn btn-danger">Отказаться</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
