@extends('layouts.master-user')

@section('content')

<div class="container-fluid mt-2 justify-content-center mb-2">
    <h2 class="d-flex justify-content-between m-2">Viewing Full Lot Details <a href="{{ route("lot.view") }}" class="btn btn-outline-secondary">View All Lots</a></h2>
    <div class="border-spacer mb-2"></div>

    <div class="card m-auto p-3 large-card" >
        <h4 class="purple">Lot Number #{{ $lot->id }}</h4>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            @if(isset($lot->images) && $lot->images != false)
                @for($i = 0; $i < count($lot->images) ; $i++)
                @if($i == 0)
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                @else
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                @endif
                @endfor
            @else
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            @endif
              </ol>
            <div class="carousel-inner justify-content-center fixed-carousel">
            @if(isset($lot->images) && $lot->images != false)
                @for($i = 0; $i < count($lot->images) ; $i++)
                @if($i == 0)
                    <div class="carousel-item active">
                @else
                <div class="carousel-item">
                @endif
                        <img class="d-block carousel-image" src="{{ $imagesPath.$lot->images[$i]->url }}" alt="{{ $slides[$i] }}">
                    </div>
                @endfor
            @else
                <div class="carousel-item active">
                    <img class="d-block carousel-image" src="/images/cubic1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-image" src="/images/cubic2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-image" src="/images/img1.jpg" alt="Third slide">
                </div>
            @endif
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        <div class="card-body">
            <h3 class="card-title fancy-font mb-2 ">{{ $lot->name }}</h3>
            <h5 class="card-subtitle mb-2 text-muted justify-content-between d-flex" >
                <div>By {{ $lot->artist }} made in {{ $lot->year }}</div>
                <div class="ml-10">Estimated at £ {{ number_format($lot->price) }}</div>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $lot->category }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Auction date not yet set</h6>
            <p class="card-text mb-2 ">{{ $lot->description }}</p>
            <div class="card-button-container">
                <a href="#" class="btn btn-dark bt-fn ">Follow @include('icons.follow')</i></a>
                <a href="{{ route("lot.view", ["search" => $lot->artist]) }}" class="btn btn-dark bt-fn ">More Like This @include('icons.more')</i></a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a class="fancy-font login-logo purple" href="{{ route("home") }}">Fothebys <img src="/images/logo-450.png" class="logo-img"></a>
        </div>
    </div>

</div>

@endsection
