@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Selamat Datang {{ Auth::user()->fullName() }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Anda Login Sebagai ({{ Auth::user()->role->name }})
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
