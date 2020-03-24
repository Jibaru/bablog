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
            <div>
                <router-view></router-view>
            </div>
        @else
            <div >No puedes acceder a este sitio</div>
        @endif
    @endif



@endsection
