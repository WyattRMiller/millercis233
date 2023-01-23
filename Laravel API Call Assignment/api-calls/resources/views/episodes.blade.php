<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Laravel API Call Assignment</title>
</head>

<body>
    <div class="card-group">
        <div class="row row-cols-1 row-cols-md-3 g-0">
            @foreach ($episodes as $episode)

            <div class="col">
                <div class="card h-100">

                    <img src="{{$episode->image}}" class="card-img-top" alt="{{$episode->name}} image">

                    <div class="card-body">
                        <h5 class="card-title">{{$episode->name}}</h5>
                        <p class="card-text">{!! $episode->summary !!}</p>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">Season {{$episode->season}}, Episode {{$episode->episode}}</small>
                    </div>

                </div>
            </div>

            @endforeach
        </div>
    </div>
</body>

</html>