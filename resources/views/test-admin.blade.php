@extends('layouts.master-user')

@section('content')
@if(isset($alert))
    {{ $alert->build() }}
@endif
<div class="">
    <h2 class="d-flex justify-content-between m-2">Upcoming Auctions <a href="#" class="btn btn-outline-secondary">View All</a></h2>

    <div class="container-fluid mt-2 justify-content-sm-center">
        <div class="row justify-content-center card-holder">
            <div class="card" style="width: 22rem;">
                <img src="images/img2.jpg" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title">Picasso Masterpieces</h5>
                <h6 class="card-subtitle displaydate">5 May 2021 | 12:00pm</h6>
                <p class="card-text">A range of masterpieces by the great Pablo Picasso, exceptional pieces in this rare auction.</p>
                <a href="#" class="btn btn-dark bt-fn bt-fn-solo mt-auto " style="background-color: #6943f5;">View Details</a>
                </div>
            </div>

            <div class="card" style="width: 22rem;">
                <img src="images/img2.jpg" class="card-img-top" alt="..." style="height: 15rem;">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="card-button-container d-flex mt-auto justify-content-between">
                    <a href="#" class="btn btn-dark bt-fn bt-fn-solo mt-auto" style="background-color: #6943f5;">View Details</a>
                </div>

                </div>
            </div>

            <div class="card" style="width: 22rem;">
                <img src="images/img1.jpg" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark bt-fn  bt-fn-solo mt-auto" style="background-color: #6943f5;">View Details</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="border-spacer">
    <h2 class="d-flex justify-content-between m-2">Recently Added Lots <a href="#" class="btn btn-outline-secondary">View All</a></h2>

    <div class="container-fluid mt-2 justify-content-sm-center">
        <div class="row justify-content-center">
            <div class="card m-2" style="width: 18rem;">
                <img src="images/img1.jpg" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark bt-fn" style="background-color: #6943f5;">View Lot</a>
                <a href="#" class="btn btn-dark bt-fn " style="background-color: #6943f5;">Bid</a>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <img src="images/img2.jpg" class="card-img-top" alt="..." style="height: 15rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="card-button-container">
                        <a href="#" class="btn btn-dark bt-fn" style="background-color: #6943f5;">View Lot</a>
                        <a href="#" class="btn btn-dark bt-fn ">Bid <i class="fas fa-pound-sign"></i></a>
                    </div>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <img src="images/img1.jpg" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark bt-fn" style="background-color: #6943f5;">Go somewhere</a>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <img src="images/img2.jpg" class="card-img-top" alt="..." style="height: 15rem;">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark bt-fn" style="background-color: #6943f5;">Go somewhere</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card m-2" style="width: 18rem;">
                <img src="images/img1.jpg" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark bt-fn" style="background-color: #6943f5;">Go somewhere</a>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <img src="images/img2.jpg" class="card-img-top" alt="..." style="height: 15rem;">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark bt-fn" style="background-color: #6943f5;">Go somewhere</a>
                </div>
            </div>
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

<div class="container-fluid mt-2 justify-content-center border-spacer">
    <h2>Table example</h2>
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th>Head</th>
                <th>Head</th>
                <th>Head</th>
                <th>Head</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Head</td>
                <td>Head</td>
                <td>Head</td>
                <td>Head</td>
            </tr>
            <tr>
                <td>Head</td>
                <td>Head</td>
                <td>Head</td>
                <td>Head</td>
            </tr>
        </tbody>


    </table>
</div>
@endsection
