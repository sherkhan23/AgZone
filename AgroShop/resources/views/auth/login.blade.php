@extends('layouts.app')
@section('title') Login @endsection
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap 5 -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css">


</head>
<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow" style="border-radius: 30px">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h5 class="modal-title">Modal title</h5> -->
                <h2 class="fw-bold mb-0">Вход в систему</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <a class="navbar-brand mt-2 mt-lg-0 p-3" href="/">
                    <img src="media/logoAgro.png" id="logoAgro">
                </a>
                <form method="POST" action="{{ route("login_process") }}" class="space-y-5">
                    @csrf
                    <input
                        value="<?php
                        session_start();
                        if(isset($_SESSION['phoneNumber'])) {
                            echo $_SESSION['phoneNumber'];
                        } ?>"
                        id="phoneNumber" name="phoneNumber" type="text" class="w-full h-12 border border-gray-800 rounded px-3 " placeholder="Введите номер" />

                    @error('phoneNumber')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль" />

                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <div>
                        <a href="" class="font-medium text-secondary rounded-md p-2">Забыли пароль?</a>
                    </div>

                    <div>
                        <a href="{{ route("register") }}" class="font-medium  text-secondary rounded-md p-2">Регистрация</a>
                    </div>

                    <button type="submit" class="text-center w-full text-white rounded py-3 font-medium" style="background-color: #00C759">Войти</button>
                </form>

            </div>
        </div>
    </div>
</div>


