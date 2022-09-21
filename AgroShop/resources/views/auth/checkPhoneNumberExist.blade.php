@extends('layouts.app')
<head>
    <!-- Подключение библиотеки jQuery -->
    <script src="jquery.js"></script>
    <!-- Подключение jQuery плагина Masked Input -->
    <script src="jquery.maskedinput.min.js"></script>
</head>

<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow" style="border-radius: 30px">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h5 class="modal-title">Modal title</h5> -->

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">



                <form class="" method="POST" action="{{ route("checkPhoneNumberExist") }}">
                    @csrf
                    <a class="navbar-brand mt-2 mt-lg-0 p-3" href="/">
                        <img src="media/logoAgro.png" id="logoAgro">
                    </a>
                    <h2 class="fw-bold mb-0 mb-3 text-secondary">Проверка номера</h2>
                    <div class="form-floating mb-3">
                        <input id="phoneNumber"  name="phoneNumber" type="text" class="form-control rounded-3" placeholder="Номер">
                    </div>


                    <button style="background-color: #00C759" class="w-100 mb-2 btn btn-lg text-white" type="submit">Проверить</button>
                    <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                    <hr class="my-4">
                    <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>
                    <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit">
                        <svg class="bi me-1" width="16" height="16"><use xlink:href="#twitter"></use></svg>
                        Sign up with Twitter
                    </button>
                    <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                        <svg class="bi me-1" width="16" height="16"><use xlink:href="#facebook"></use></svg>
                        Sign up with Facebook
                    </button>
                </form>
                <?php
                if(isset($_POST['phoneNumber'])) {
                    session_start();
                    $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
                }
                ?>
            </div>
        </div>
    </div>
</div>


