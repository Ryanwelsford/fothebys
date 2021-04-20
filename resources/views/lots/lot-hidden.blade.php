<input type="hidden" name="lot[id]" value = "{{ $lot['id'] }}">
<input type="hidden" name="lot[name]" value = "{{ $lot['name'] }}">
<input type="hidden" name="lot[subject]" value = "{{ $lot['subject'] }}">
<input type="hidden" name="lot[artist]" value = "{{ $lot['artist'] }}">
<input type="hidden" name="lot[year]" value = "{{ $lot['year'] }}">
<input type="hidden" name="lot[description]" value = "{{ $lot['description'] }}">
<input type="hidden" name="lot[price]" value = "{{ $lot['price'] }}">
<input type="hidden" name="lot[category]" value = "{{ $lot['category'] }}">
@foreach($lot['file'] as $file)
    <input type="hidden" name="lot[file][]" value = "{{ $file }}">
@endforeach
