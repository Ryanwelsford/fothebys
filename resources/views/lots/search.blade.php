@extends('layouts.master-user')

@section('content')

@if($alert->heading != false)
    {{ $alert->build() }}
@endif

<div class="container-fluid mt-2 justify-content-center">
    <h2>Search Lots</h2>
    <form class="" action="{{ route("lot.find") }}" method="GET">
        <div class="input-group mb-3">
            <input type="text"  class="form-control" placeholder="Search lots here.." name="search" value="@if(isset($search)){{$search}}@endif">
            <button class="input-group-prepend ml-2 b-none" >
                <div class="input-group-text btn btn-outline-secondary custom-input">Search  <div class="ml-1">@include('icons.search')</div> </div>
              </button>
          </div>

      </form>

    @if(count($lots) > 0)

    @if(isset($search))
    <h6>Displaying {{ count($lots) }} Results</h6>
    @endif
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th>Lot #</th>
                <th>Name</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Price</th>
                <th>Category</th>
                <th>Links</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lots as $key => $lot)
            <tr>
                <td>{{ $lot->id }}</td>
                <td>{{ $lot->name }}</td>
                <td>{{ $lot->artist }}</td>
                <td>{{ $lot->year }}</td>
                <td>£ {{ number_format($lot->price) }}</td>
                <td>{{ $lot->category }}</td>
                <td class="table-links">

                    <a href="{{ route("lot.new", ["id" => $lot->id]) }}"class="btn btn-success bt-fn">Edit <i class="far fa-edit"></i></a>

                    <a href="{{ route("lot.view-single", ["id" => $lot->id]) }}" class="btn btn-warning btn-round">View <i class="far fa-eye"></i></a>

                    <form action="{{ route("lot.destroy", $lot) }}" method="POST" >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-round" type="submit">Delete <i class="far fa-trash-alt"> </i></button>
                    </form>

                    <a class="btn btn-info btn-round">Add <i class="fas fa-plus"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>


    </table>
    @else
        <h6>No results found..</h6>
    @endif

    <div class="border-spacer pt-2"> {{ $lots->links() }}</div>
</div>

@endsection
