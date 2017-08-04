
<div class="row carousel-holder">

    @include('partials.carousel')

</div>

<div class="row vehicles">

    @foreach($vehicles as $vehicle)
        @include('partials.vehicle')
    @endforeach 

</div>
<div class="pagination col-sm-12">
    {{ $vehicles->appends(['category' => $category])->links() }}
</div>

<!-- Audi update external link and fetch alert-->
@if($category == 'Audi' && auth()->check())
    <button type="button" class="btn btn-info center-block" id="update-audi">Update Category</button>

    <div class="clearfix"></div>
    <div class="alert alert-info hidden" role="alert" id="audi-alert">
      Please be patient while we fetch newest vehicles
    </div>
@endif