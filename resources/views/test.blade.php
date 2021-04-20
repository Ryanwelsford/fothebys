@extends('layouts.master-user')
@section('content')
<div class="alert alert-dark mt-2 alert-purple" role="alert">
    <h3>Welcome to Fotheby's</h3>
    <h4>Featured</h4>
    <p>Picasso masterpieces in our latest auction view <a class="purple-link" href='#'>here</a></p>
    <button type="button" class="btn-close close-button" onclick="closeDiv(event, 'DIV')">X</button>
</div>

<div class="">
    <h2 class="d-flex justify-content-between m-2">Upcoming Auctions <a href="#" class="btn btn-outline-secondary">View All</a></h2>

    <div class="container-fluid mt-2 justify-content-sm-center">
        <div class="row justify-content-center card-holder">
            <div class="card" style="width: 22rem;">
                <img src="images/le1.jpg" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title">Picasso Masterpieces</h5>
                <h6 class="card-subtitle displaydate">5 May 2021 | 12:00pm</h6>
                <p class="card-text">A range of masterpieces by the great Pablo Picasso, exceptional pieces in this rare auction.</p>
                <a href="#" class="btn btn-dark bt-fn bt-fn-solo mt-auto " style="background-color: #6943f5;">View Details</a>
                </div>
            </div>

            <div class="card" style="width: 22rem;">
                <img src="images/ren.jpg" class="card-img-top" alt="..." style="height: 15rem;">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title">Sculptures from the renaissance period</h5>
                <h6 class="card-subtitle displaydate">12 May 2021 | 16:00pm</h6>
                <p class="card-text">Various artists sculpture from the 15th and 16th centuries</p>
                <div class="card-button-container d-flex mt-auto justify-content-between">
                    <a href="#" class="btn btn-dark bt-fn bt-fn-solo mt-auto" style="background-color: #6943f5;">View Details</a>
                </div>

                </div>
            </div>

            <div class="card" style="width: 22rem;">
                <img src="images/photo3.jpg" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title">Famous Photos from the 20th Century</h5>
                <h6 class="card-subtitle displaydate">Auction date to be confirmed</h6>
                <p class="card-text">Stunning photos of the 20th century have been made available in this once in a life time auction.</p>
                <a href="#" class="btn btn-dark bt-fn  bt-fn-solo mt-auto" style="background-color: #6943f5;">View Details</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="border-spacer">
    <h2 class="d-flex justify-content-between m-2">Latest Lots <a href="{{ route("lot.view") }}" class="btn btn-outline-secondary">View All Lots</a></h2>
            <div class="row justify-content-center">

                @for($i=0; $i < count($lots); $i++)
                @if($i % 3 == 0)
                </div>
                <div class="row justify-content-center">
                @endif
                    <div class="card m-2" style="width: 18rem;">
                        <img src="@if(isset($lots[$i]->images) && count($lots[$i]->images) > 1) {{ "/storage/images/uploads/".$lots[$i]->images[0]->url }} @else {{ "/images/img1.jpg" }} @endif" class="card-img-top" style="height: 15rem;" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title fancy-font mb-2 ">{{ $lots[$i]->name }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $lots[$i]->category }} by {{ $lots[$i]->artist }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Estimated at: £ {{ number_format($lots[$i]->price) }}</h6>
                            <p class="card-text">{{ $lots[$i]->description }}</p>
                            <div class="card-button-container mt-10">
                                <a href="{{ route("lot.view-single", ["id" => $lots[$i]->id]) }}" class="btn btn-dark bt-fn" style="background-color: #6943f5;">
                                    View
                                </a>
                                <a href="#" class="btn btn-dark bt-fn ">Follow @include('icons.follow')</i></a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

</div>
<div class="border-spacer"></div>
<div class="my-2 bg-secondary text-white p-2 banner">
    <div class="container">
        <h2>Stay informed with our newsletter</h2>
        <h5>Recieve all the latest updates</h5>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
            <div id="emailHelp" class="form-text small-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
                    <div class="valid-feedback">
                        Looks good!
                      </div>
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
                </div>
              </div>

            <p class="small-text">By subscribing you agree to our <a class="purple" href="#">privacy policy</a>, you can unsubscribe from Fothebys emails at any time.</p>
            <div class="card-button-container justify-content-center">
                <button type="submit" class="btn btn-primary bt-fn">Submit</button>
            </div>




        </form>
    </div>
</div>

@endsection
