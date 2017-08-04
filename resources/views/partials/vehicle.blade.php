<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <img src="images/cars/{{ $vehicle->image_path }}" alt="{{ $vehicle->name }}">
        <div class="caption">
            <h4><a href="#">{{ $vehicle->name }}</a></h4>
            <p>
                <p><strong>Odometer: </strong>{{ number_format($vehicle->kilometers) }}
            </p>
        </div>
        <div class="ratings">
            <p class="pull-right">€{{ number_format($vehicle->price) }}</p>
            <p>{{ $vehicle->year }}</p>
        </div>
    </div>
</div>