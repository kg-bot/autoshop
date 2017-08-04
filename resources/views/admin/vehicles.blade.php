<table class="table table-striped table-hover">
  <thead>
  <tr>
    <th>#</th>
    <th>Category</th>
    <th>Name</th>
    <th>Price</th>
    <th>Year</th>
    <th>Pedometer</th>
    <th>Image</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  @foreach($vehicles as $vehicle)
    <tr>
      <td>{{ $loop->index + 1 }}</td>
      <td>{{ $vehicle->category }}</td>
      <td>{{ $vehicle->name }}</td>
      <td>€{{ number_format($vehicle->price) }}</td>
      <td>{{ $vehicle->year }}</td>
      <td>{{ number_format($vehicle->kilometers) }}</td>
      <td><img class="table-image" src="{{ url('images/cars/' . $vehicle->image_path) }}" alt="{{ $vehicle->name }}"</td>
      <td>
        <button type="button" class="btn btn-danger delete-vehicle" data-id="{{ $vehicle->id }}">Delete</button>
        @if(!$vehicle->approved)
          <button type="button" class="btn btn-success approve-vehicle" data-id="{{ $vehicle->id }}">Approve</button>
        @endif
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $vehicles->links() }}