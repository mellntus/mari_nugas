@extends('layouts.main')

@section('content')
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators" style="padding-bottom: 70px">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000" id="carousel-item-1">
            <div class="d-flex align-items-center justify-content-center min-vh-100">
                <img src="picture/2.jpg" class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block" id="carousel-caption">
                    <h5>Motivation 1</h5>
                    <p>Some representative placeholder content for the one slide.</p>
                </div>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000" id="carousel-item-2">
            <div class="d-flex align-items-center justify-content-center min-vh-100">
                <img src="picture/3.jpg" class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block" id="carousel-caption">
                    <h5>Motivation 2</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
          </div>
          <div class="carousel-item" id="carousel-item-3">
            <div class="d-flex align-items-center justify-content-center min-vh-100">
                <img src="picture/4.jpg" class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block" id="carousel-caption">
                    <h5>Motivation 3</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        
      </div>
@endsection