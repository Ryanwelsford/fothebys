@extends('layouts.master-user')

@section('content')

@if(isset($alert))
    {{ $alert->build() }}
@endif

<div class="my-2 bg-secondary text-white p-2 banner">
    <div class="container">
        <h2>Create a Carving</h2>
        <h5 class="divide-spacer">Enter the carving details below</h5>
        <form name="new_lot" method="POST" id="new_lot" action="{{ route('lot.save') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category[id]" value="@if(isset($category['id'])){{$category['id']}}@endif" >
            @include('lots.lot-hidden')
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Material</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Material"
                    name="category[material]" value="@if(isset($category['material'])){{$category['material']}}@endif">
                    <div class="error-feedback">

                    </div>
                </div>

                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Weight</label>

                    <div class="input-group mb-2">
                        <input type="number" min="0" step="0.01" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Weight" class="br-none" name="category[weight]" value="@if(isset($category['weight'])){{$category['weight']}}@endif">
                        <div class="input-group-prepend">
                            <div class="input-group-text custom-input-right">Kg</div>
                          </div>
                        <div class="error-feedback">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Width</label>
                    <div class="input-group mb-2">
                        <input type="number" min="0" step="0.01" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Width" name="category[width]" value="@if(isset($category['width'])){{$category['width']}}@endif">
                        <div class="input-group-prepend">
                            <div class="input-group-text custom-input-right">m</div>
                          </div>
                        <div class="error-feedback">

                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Height</label>

                    <div class="input-group mb-2">
                        <input type="number" min="0" step="0.01" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Height" name="category[height]" value="@if(isset($category['height'])){{$category['height']}}@endif">
                        <div class="input-group-prepend">
                            <div class="input-group-text custom-input-right">m</div>
                          </div>
                        <div class="error-feedback">

                        </div>
                    </div>
                </div>
              </div>


              <p class="small-text">Picked the wrong category go back <a class="purple" href="{{ $return }}">here.</a></p>
            <div class="border-spacer card-button-container justify-content-center">
                <button type="submit" form="new_lot" class="btn btn-primary bt-fn mt-2">Submit</button>
            </div>




        </form>
    </div>
</div>

@endsection
