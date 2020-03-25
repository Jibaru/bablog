@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if(Auth::check())
        @if(Auth::user()->role_id == 1)
            <app-administrator></app-administrator>
            <div class="p-2">
                <router-view></router-view>
            </div>
        @else
            <div class="container h-100 pt-5">
                <div class="alert alert-warning text-center">No puedes acceder a este sitio</div>
            </div>
        @endif
    @endif



@endsection
