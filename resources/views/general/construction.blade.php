@extends('layouts.master-user')

@section('content')



@if(isset($alert))
    {{ $alert->build() }}
@endif


@endsection
