@extends('layouts.app')

<div class="container-fluid px-5">
    <div class="row" id="header-row">
        <div class="col-md-4">
            <div style="display: inline-flex; flex-wrap: wrap">
                <div class="text-center d-flex">
                    <a href="{{route("catalog")}}">
                        <button class="card-main btn p-4">
                            Каталог
                        </button>
                    </a>
                </div>
                <div class="text-center d-flex ml-3">
                    <button class="card-main btn p-4">
                        Избранное
                    </button>
                </div> <br>
                <div class="text-center d-flex">
                    <button class="card-main btn p-4 mt-3">
                        Заявки
                    </button>
                </div>
                <div class="text-center d-flex ml-3">
                    <button class="card-main btn p-4 mt-3">
                        Заказы
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="border-radius: 30px">
                    <div class="carousel-item active">
                        <img class="d-block w-100 rounded-3" src="https://attuale.ru/wp-content/uploads/2018/06/tdleto_blog-56-02_1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 rounded-3" src="https://protambov.ru/wp-content/uploads/2019/06/gerbicidy.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 rounded-3" src="https://modamix.net/wp-content/uploads/2019/09/i67AM9WIT.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
        <div class="row mt-5">
            <div class="col-12 col-md-6 mb-3 mb-lg-0">
                <div>
                    <div class="py-10 px-8 rounded-3" style="background: url('https://envato-shoebox-0.imgix.net/ba8f/4e41-d826-4ec8-aab0-b430d1925467/Plum+Agriculture_424.jpg?auto=compress%2Cformat&fit=max&mark=https%3A%2F%2Felements-assets.envato.com%2Fstatic%2Fwatermark2.png&markalign=center%2Cmiddle&markalpha=18&w=1600&s=6255d928093c7de326ca8bf6f33a5106'); background-size: cover; background-position: center;">
                        <div>
                            <h3 class="fw-bold mb-1">Fruits &amp; Vegetables
                            </h3>
                            <p class="mb-4">Get Upto <span class="fw-bold">30%</span> Off</p>
                            <a href="#!" class="btn btn-dark">Shop Now</a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-6 ">

                <div>
                    <div class="py-10 px-8 rounded-3" style="background: url('https://rshn32.ru/files/2021/10/shutterstock_608381930.jpg'); background-size: cover; background-position: center;">
                        <div>
                            <h3 class="fw-bold mb-1">Freshly Baked
                                Buns
                            </h3>
                            <p class="mb-4">Get Upto <span class="fw-bold">25%</span> Off</p>
                            <a href="#!" class="btn btn-dark">Shop Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Популярные</h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-warning mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn btn-warning mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card rounded-3 shadow">
                                        <img class="img-fluid rounded-3" alt="100%x280" src="https://sc02.alicdn.com/kf/HTB1Iw6JelaE3KVjSZLeq6xsSFXaf/228459776/HTB1Iw6JelaE3KVjSZLeq6xsSFXaf.jpg">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
