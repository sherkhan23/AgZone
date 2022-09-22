@extends('layouts.app')
@section('title') AgroShop @endsection

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Пакет JavaScript с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <!-- Только CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{--  Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{--  /Bootstrap icons --}}

    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Подключение библиотеки jQuery -->
    <script src="jquery.js"></script>
    <!-- Подключение jQuery плагина Masked Input -->
    <script src="jquery.maskedinput.min.js"></script>
</head>

@section('content') @endsection
@include('inc.navbar')
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-2 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                    <li class="breadcrumb-item">
                        <a class="rounded" style="color: #00C759" href="{{route('catalog')}}">Каталог</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="#">Закладки</a></li>
                    <li class="breadcrumb-item active"><a href="#">Заявки</a></li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container-fluid">
    <div class="row" id="header-row">
        <div class="col-md-4 mt-2">
            <div class="card flex-shrink-0 p-3 bg-white shadow">
                <h5 class="text-muted mb-0">Фильтры</h5>
                <script>
                    function hide(form) {
                        if (form.style.display == "none") {
                            form.style.display = "block";
                        } else {
                            form.style.display = "none";
                        }
                    }
                </script>
                <small class="text-muted">Нажмите в инконку чтобы открыть фильтр</small>
                <form action="{{ route("catalog") }}" method="GET"  id="search-head" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 mb-3" role="search">
                    <input name="search_field" type="search" id="mainSearch" class="form-control" placeholder="Поиск" aria-label="Search">
{{--                    <button style="  border: 2px solid #FFC528; border-radius: 10px;" class="btn" type="submit">Искать</button>--}}
                    <img src="media/Frame 24.png" class="btn border-0 my-3"
                         onclick="hide(document.getElementById('form1'))">
                    </img>
                </form>



                    <form id="form1" method="GET" action="{{ route("catalog") }}" role="search" >
                            <livewire:brand-producer></livewire:brand-producer>
                    </form>
                <form>
                    <button class="button form-control text-dark" style="background-color: #FFC528"  type="submit">Сбросить фильтр</button>
                </form>
            </div>

        </div>
        <div class="col-md-8">
            @foreach($aids as $el)
                <div class="card shadow-sm border-5 rounded-3 mt-2" style="border: 1px solid gray">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 col-lg-6 col-xl-6">

                                <h5>{{$el->aidName}}</h5>
                                <div class="d-flex flex-row">
                                    <span class="text-muted">Категория: </span>
                                    <span class="ml-1"> {{$el->categoryName}}</span>
                                </div>

                                <div class="mt-1 mb-0 text-muted small">
                                    <span>{{$el->ProducerName}}</span>
                                    <span>{{$el->producerCountry}}</span>
                                    <span class="text-primary"> • </span>
                                </div>

                                <div class="mb-2 text-muted small">
                                    <span>{{$el->BrandName}}</span>
{{--                                    component--}}
                                    <span class="text-primary"> • </span>
                                </div>

                            </div>

                            <div class="col-md-3"></div>

                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                <div class="d-flex flex-row align-items-center mb-1">

                                </div>
                                <div class="d-flex flex-column mt-4">

                                    <a style="background-color: #00C759" class="text-black btn btn-sm" href="{{ route('show_aids', $el->aids_id) }}">
                                        Перейти

                                    </a>

                                    <button style="background-color: #FFC528" class="btn btn-outline btn-sm mt-2" type="button">
                                        Добавить в корзину
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

                <div class="d-flex justify-content-center align-content-center mt-3">
                    <a href="{{ $aids->previousPageUrl() }}"><button style="background-color: #00C759" class="btn btn-md" type="button">Назад</button></a>
                    <span class="ml-3">
                       {{ $aids->withQueryString()->links() }}
                   </span>
                    <a href={{ $aids->nextPageUrl()  }}>   <button style="background-color: #00C759" class="btn btn-md ml-3" type="button">Следущий</button></a>
                </div>
        </div>
    </div>
</div>
</div>

@section('scripts')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#brand_id').change(function () {--}}
{{--                var $producer = $('#producer_id');--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('producer.index') }}",--}}
{{--                    data: {--}}
{{--                        country_id: $(this).val()--}}
{{--                    },--}}
{{--                    success: function (data) {--}}
{{--                        $producer.html('<option value="" selected>Choose state</option>');--}}
{{--                        $.each(data, function (id, value) {--}}
{{--                            $producer.append('<option value="' + id + '">' + value + '</option>');--}}
{{--                        });--}}
{{--                    }--}}
{{--                });--}}
{{--                $('#producer_id, #brand_id').val("");--}}
{{--                $('#producer_id').removeClass('d-none');--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
