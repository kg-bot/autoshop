@if(!isset($in_form))
<label for="categories-select">Select Category</label>
@endif
@if(isset($in_form))
    <select id="categories-select" class="categories-select form-control" name="category">
@else
    <select id="categories-select" class="categories-select form-control">
@endif
    <option></option>
    <optgroup label="Vehicles">
    @foreach($categories as $category)
        <option value="{{ $category->name }}">{{ $category->name }}</option>
    @endforeach
    </optgroup>
</select>
@push('scripts')
    <script>
        $(".categories-select").select2({
            placeholder: 'Select Vehicle Category'
        });
    </script>
@endpush