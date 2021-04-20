@extends('layouts.master-user')

@section('content')

@if(isset($alert) && $alert)
    {{ $alert->build() }}
@endif

<div class="">
    <h2 class="d-flex justify-content-between m-2">{{ $title }}</h2>

    <div class="container-fluid mt-2 justify-content-sm-center home-card-holder">
        <div class="row justify-content-center card-holder home-card-holder">
            <?php
                $counter = 0;
            ?>
            @foreach($list as $item)

            @if($counter % 3 == 0)
            </div>
            <div class="row justify-content-center card-holder home-card-holder">
            @endif

            <?php
                if(isset($item['note'])) {
                    $note = $item['note'];
                }
                else {
                    $note = null;
                }
                ?>
                <x-menu-card
                    header="{{ $item['header'] }}"
                    title="{{ $item['title'] }}"
                    icon="{{ $item['icon'] }}"
                    desc="{{ $item['desc'] }}"
                    action="{{ $item['action'] }}"
                    anchor="{{ $item['anchor'] }}"
                    note="{{ $note }}"
                    >
                </x-menu-card>
                <?php
                $counter++;
            ?>
            @endforeach

        </div>
        </div>
    </div>
</div>
@endsection
