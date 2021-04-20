@if($type == "purple")
    <?php
        $type = "alert-dark alert-".$type
    ?>
@else
    <?php
        $type = "alert-".$type
    ?>
@endif

<div class="alert mt-2 {{ $type }}" role="alert">
    <h3>{{ $heading }}</h3>
    <p>{{ $message }}</p>
    <button type="button" class="btn-close close-button" onclick="closeDiv(event, 'DIV')">X</button>
</div>
