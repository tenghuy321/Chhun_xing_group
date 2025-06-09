@extends('admin.layouts.app')
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="w-full h-[80vh]">
        <div class="flex flex-col w-full h-full items-center justify-center gap-4">
            <img src="{{ asset("assets/images/logo.png") }}" alt="" class="w-40 h-auto" />
            <h1 class="text-center text-[30px] font-[600]">Welcome to Chhun Xing <br> Dashboard</h1>
        </div>
    </div>
@endsection
