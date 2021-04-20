@props(['header', 'title', 'icon', 'anchor', 'action', 'desc', 'note' => null])

<div class="card home-card" style="width: 22rem;">
    <div class="card-header alert-purple d-flex align-items-center">
        <h2 class="mr-auto">{{ $header }} </h2>
        @if(isset($note))
            <div class="mr-4 counter">{{ $note }}</div>
        @endif
        <i class="{{ $icon }} icon-large"></i>
      </div>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $desc }}</p>
        <div class="card-button-container d-flex mt-auto justify-content-between">
            <a href="{{ $anchor }}" class="btn btn-dark bt-fn bt-fn-solo mt-auto" style="background-color: #6943f5;">{{ $action }}</a>
        </div>

    </div>
</div>
