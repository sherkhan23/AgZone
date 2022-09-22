@extends('layouts.app')

@section('title') Register @endsection

<div class="modal modal-signin position-static d-block bg-secondary " tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow" style="border-radius: 30px">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h5 class="modal-title">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <a class="navbar-brand" href="/">
                    <img src="media/logoAgro.png" id="logoAgro">
                </a>
                <h2 class="fw-bold mb-0 text-center text-secondary">Регистрация</h2>
                <form action="{{ route("register_process") }}" class="space-y-5" method="POST">
                    @csrf

                    <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 " placeholder="Введите имя" />

                    @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input id="phoneNumber" name="phoneNumber" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Введите номер" />

                    @error('phoneNumber')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror


                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="farmer" id="1" value="1">
                        <label class="form-check-label" for="1">
                            Фермер
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="farmer" id="0" value="0">
                        <label class="form-check-label" for="0">
                            Продавец
                        </label>
                    </div>

                    @error('farmer')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3 " placeholder="Пароль" />

                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password_confirmation" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Подтверждение пароля" />

                    @error('password_confirmation')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <div>
                        <a href="{{ route("login") }}" class="font-medium text-secondary rounded-md p-2">Есть аккаунт?</a>
                    </div>

                    <button style="background-color: #00C759" type="submit" class="text-center w-full text-white py-3 font-medium">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</div>

