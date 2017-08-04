@extends('templates.master')

@section('content')
    <div class="row">

        <div class="col-md-3">
            <div class="list-group">
                @include('categories.select')
            </div>
            <!-- TODO: Change this to authenticated user -->
            @if(auth()->check())
                @include('forms.add_new_vehicle')
            @endif
        </div>
        
        <div class="col-md-9 main-content">

            <div class="row carousel-holder">

                @include('partials.carousel')

            </div>

            <div class="row vehicles">

                @each('partials.vehicle', $vehicles, 'vehicle')

            </div>
            <div class="col-sm-12">
                {{ $vehicles->appends(['category' => $category])->links() }}
            </div>


            <!-- Audi update external link and fetch alert-->
            @if($category == 'Audi' && auth()->check())
                <button type="button" class="btn btn-info center-block" id="update-audi">Update Category</button>

                <div class="clearfix"></div>
                <div class="alert alert-info alert-dismissible hidden" role="alert" id="audi-alert">
                  Please be patient while we fetch newest vehicles
                </div>
            @endif

        </div>

    </div>
@endsection