@extends('layouts.master-user')

@section('content')

<div class="container-fluid mt-2 justify-content-sm-center">
    <h2>Search Lots</h2>
    <form class="" action="{{ route("lot.view") }}" method="GET">
        <div class="input-group mb-3">
            <input type="text"  class="form-control" placeholder="Search lots here.." name="search" value="@if(isset($search)){{$search}}@endif">
            <button class="input-group-prepend ml-2 b-none" >
                <div class="input-group-text btn btn-outline-secondary custom-input">Search  <div class="ml-1">@include('icons.search')</div> </div>
              </button>
          </div>

      </form>

      <div class="border-spacer"></div>
        <h2 class="d-flex justify-content-between m-2">Latest Lots <a href="#" class="btn btn-outline-secondary">View Auctions</a></h2>
        @if(isset($search))
            <h6>Displaying search results for.. <span class="font-italic">"{{ $search }}"</span></h6>
        @endif
            <div class="row justify-content-center">

                @for($i=0; $i < count($lots); $i++)
                @if($i % 3 == 0)
                </div>
                <div class="row justify-content-center">
                @endif
                    <div class="card m-2" style="width: 20rem;">
                        <img src="@if(isset($lots[$i]->images) && count($lots[$i]->images) > 1) {{ "/storage/images/uploads/".$lots[$i]->images[0]->url }} @else {{ "/images/img1.jpg" }} @endif" class="card-img-top" style="height: 15rem;" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title fancy-font mb-2 ">{{ $lots[$i]->name }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $lots[$i]->category }} by {{ $lots[$i]->artist }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Estimated at: £ {{ number_format($lots[$i]->price) }}</h6>
                            <p class="card-text hide-overflow">{{ $lots[$i]->description }}</p>
                            <div class="card-button-container">
                                <a href="{{ route("lot.view-single", ["id" => $lots[$i]->id]) }}" class="btn btn-dark bt-fn" style="background-color: #6943f5;">
                                    View
                                </a>
                                <a href="#" class="btn btn-dark bt-fn ">Follow @include('icons.follow')</i></a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="border-spacer pt-2"> {{ $lots->links() }}</div>
        </div>

@endsection
