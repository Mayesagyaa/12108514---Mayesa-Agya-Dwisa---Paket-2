@extends('layouts.index')

@section('content.index')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <br>
            <div class="card" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="card-body">
                     @if(Auth::check())
                         <p style="font-size: 20px;">Selamat datang, {{ Auth::user()->name }}!</p>
                     @endif              
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

   
@endsection

