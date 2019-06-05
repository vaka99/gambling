
@extends('layouts.app')

@section('content')
<div class="container">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links mb-2">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Gambling</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">

                <div class="links">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Money
                            <span class="badge badge-primary badge-pill">{{ $user->user_money }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Bonus
                            <span class="badge badge-primary badge-pill">{{ $user->user_bonus }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Items
                            <span class="badge badge-primary badge-pill">{{ implode( ", ", $user->user_item ) }}</span>
                        </li>
                    </ul>
                    @guest
                    Welcome to our website you can 
                    <a href="{{ route('login') }}">Login</a> Or

                    @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endguest
                </div>
            </div>
        </div>
</div>
@endsection

