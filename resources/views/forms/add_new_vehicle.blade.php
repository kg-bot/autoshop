<form method="post" action="/vehicles" enctype="multipart/form-data" id="add-new-vehicle">
    {{ csrf_field() }}
    <h2>Add New Vehicle</h2>
    <div class="form-group">
        @include('categories.select', ['in_form' => 'true'])
        @if($errors->has('category'))
            <label class="error">{{ $errors->first('category') }}</label>
        @endif
    </div>
    <div class="form-group">
        <input type="text" id="addVehicleName" name="name" class="form-control" placeholder="Vehicle Name"">
        @if($errors->has('name'))
            <label class="error">{{ $errors->first('name') }}</label>
        @endif
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">€</div>
            <input type="number" class="form-control" id="addVehiclePrice" name="price" placeholder="Vehicle Price">
            @if($errors->has('price'))
                <label class="error">{{ $errors->first('price') }}</label>
            @endif
        </div>
    </div>
    <div class="form-group">
        <input type="number" id="addVehicleYear" name="year" class="form-control" placeholder="Vehicle Year">
        @if($errors->has('year'))
            <label class="error">{{ $errors->first('year') }}</label>
        @endif
    </div>
    <div class="form-group">
        <input type="number" id="addVehicleKilometers" name="kilometers" class="form-control" placeholder="Vehicle Pedometer">
        @if($errors->has('kilometers'))
            <label class="error">{{ $errors->first('kilometers') }}</label>
        @endif
    </div>
    <div class="form-group">
        <input type="file" id="addVehicleImage" name="image" accept="image/*">
        <p class="help-block">Select vehicle image, it must be larger then 800x500.</p>
        @if($errors->has('image'))
            <label class="error">{{ $errors->first('image') }}</label>
        @endif
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@if(session()->has('vehicle-added'))
    <div class="clearfix"></div>
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ session('vehicle-added') }}
    </div>
@endif