<div class="col-md-12">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($carousel_images as $image)
                @if($loop->first)
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="active"></li>
                @else
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}"></li>
                @endif
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($carousel_images as $image)
                @if($loop->first)
                    <div class="item active">
                @else
                    <div class="item">
                @endif
                    <img class="slide-image" src="images/cars/{{ $image }}" alt="">
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>