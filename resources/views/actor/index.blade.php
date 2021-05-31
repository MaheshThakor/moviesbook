@extends('layouts.user-master')
@section('content')
    <div class="col-12">
        <div class="card bg-light">
            <div class="card-body">
                @if(isset($actor))
                <div class="table-responsive">
                        <div class="w-auto d-inline-block">
                            <img src="data:image/png;base64, {{$actor->image}}" alt="poster" style="width: 450px;height: 500px;"/>
                        </div>
                        <div class="w-auto d-inline-block  font-icon-detail">
                            <div class="">
                                <a href="/movie/{{$actor->id}}" ><p>Name : {{$actor->name}}</p></a>
                            </div>
                            <div class="text-info mb-1">
                                DOB : {{date("d-m-Y",strtotime(trim($actor->birth_date," 00:00:00")))}}
                            </div>
                            <div style="width: 45vw;">
                                Bio Data : <p class="mt-1">{{$actor->bio}}</p>
                            </div>
                            <div style="width: 45vw;">
                                Movies : <br>
                                @foreach(\App\Models\Cast::select("*")->where("actor_id", "=", $actor->id)->get() as $castdata)
                                    @foreach(\App\Models\Movie::select("*")->where("id", "=", $castdata->movie_id)->get() as $movie)

                                    <div class="mt-1 d-inline-block bg-dark text-center">
                                        <a href="/movie/{{$movie->id}}"><img src="data:image/png;base64, {{$movie->poster}}" alt="poster" width="100px" height="150px" style="display: inline-block;"/></a>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                </div>
                @else
                    <div class="bg-dark col-12 text-center text-white" style="height: 400px;font-size: x-large;">
                        No Actor Details Found For That Actor ID
                    </div>

                    @endif
            </div>
        </div>
    </div>
@endsection
