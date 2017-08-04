@if(session()->has('category-added'))
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ session('category-added') }}
    </div>
@endif
<form method="post" action="/admin/add-category" class="text-center">
    {{ csrf_field() }}
    <h2>Add New Category</h2>
    <div class="form-group">
        <input type="text" id="category-name" name="name" class="form-control" placeholder="Category Name"">
        @if($errors->has('name'))
            <label class="error">{{ $errors->first('name') }}</label>
        @endif
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
