<div class="container">
    @foreach($subdivisions as $subdivision)
        <div id="subdivision{{$subdivision->id}}"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <h3 class="card-title">{{$subdivision->title}}</h3>
                </div>
            </div>
        </div>
    @endforeach
</div>
