@extends('layouts.master-user')

@section('content')

@if(isset($alert) && $alert)
    {{ $alert->build() }}
@endif

<div class="my-2 bg-secondary text-white p-2 banner">
    <div class="container">
        <h2>Create a lot</h2>
        <h5 class="divide-spacer">Enter the lot details below</h5>
        <form id="new_lot" method="POST" action="{{ route('lot.stage') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="lot[id]" value="@if(isset($lot['id'])){{$lot['id']}}@endif">
            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label">Lot Name</label>
                    <input type="text" name="lot[name]"class="form-control" id="name" aria-describedby="emailHelp" placeholder="Lot Name" value="@if(isset($lot['name'])){{$lot['name']}}@endif">
                    <div class="error-feedback">
                        @error("lot.name")
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <label for="subject" class="form-label">Lot Subject</label>
                    <input type="text" name="lot[subject]" class="form-control" id="subject" aria-describedby="emailHelp" placeholder="Lot Subject" value="@if(isset($lot['subject'])){{$lot['subject']}}@endif">
                    <div class="error-feedback">
                        @error("lot.subject")
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Artist Name</label>
                    <input type="text" name="lot[artist]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Artist Name" value="@if(isset($lot['artist'])){{$lot['artist']}}@endif">
                    <div class="error-feedback">
                        @error("lot.artist")
                            {{ $message }}
                        @enderror
                      </div>
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Year of Creation</label>
                    <input name="lot[year]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Year" value="@if(isset($lot['year'])){{$lot['year']}}@endif">
                    <div class="error-feedback">
                        @error("lot.year")
                            {{ $message }}
                        @enderror
                    </div>
                </div>
              </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Lot Description</label>
                <textarea name="lot[description]" class="form-control" aria-label="With textarea" type="email"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lot Description">@if(isset($lot['description'])){{$lot['description']}}@endif</textarea>
                <div class="error-feedback">
                    @error("lot.description")
                            {{ $message }}
                        @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Estimated Price</label>


                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text custom-input">@include('icons.pound')</div>
                        </div>
                        <input type="number" min="5000" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Estimated Price" name="lot[price]" value="@if(isset($lot['price'])){{$lot['price']}}@endif">
                      </div>

                      <div class="error-feedback">
                        @error("lot.price")
                        {{ $message }}
                    @enderror
                    </div>
                </div>

                <div class="col">
                    <label for="exampleInputEmail1" placeholder="Select Category" class="form-label">Lot Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="lot[category]">
                        <option @if(isset($lot['category']) && $lot['category'] == "Painting") {{ "selected=true" }} @endif value="Painting">Painting</option>
                        <option @if(isset($lot['category']) && $lot['category'] == "Sculpture") {{ "selected=true" }} @endif value="Sculpture">Sculpture</option>
                        <option @if(isset($lot['category']) && $lot['category'] == "Carving") {{ "selected=true" }} @endif value="Carving">Carving</option>
                        <option @if(isset($lot['category']) && $lot['category'] == "Photographic Image") {{ "selected=true" }} @endif value="Photographic Image">Photographic Image</option>
                        <option @if(isset($lot['category']) && $lot['category'] == "Drawing") {{ "selected=true" }} @endif value="Drawing">Drawing</option>
                        <option @if(isset($lot['category']) && $lot['category'] == "Rare Coin") {{ "selected=true" }} @endif value="Rare Coin">Rare Coin</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" placeholder="Add Images" class="form-label">Lot Images</label>
                <input type="file" name="lot[file][]" class="form-control" multiple=true  accept=".png, .jpg, .jpeg">
                <p class="small-text mt-2">Multiple images can be attached by holding control</p>
                <div class="error-feedback">
                    @error("lot.file.*")
                    {{ "Ensure at least 1 image is entered, images can only be JPEG, JPG or PNG files" }}
                    @enderror
                </div>

            <p class="small-text mt-2">Need to edit a lot instead, click <a class="purple" href="#">here</a></p>
            <div class="border-spacer card-button-container justify-content-center">
                <button type="submit" form="new_lot" class="btn btn-primary bt-fn mt-2">Next</button>
            </div>




        </form>
    </div>
</div>

@endsection
