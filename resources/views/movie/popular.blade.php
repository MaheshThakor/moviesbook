@extends('layouts.user-master')
@section('content')
    @if(isset($popular) && !$popular->isEmpty())
        <div class="text-center col-12 bg-light text-dark mt-3">
            <h5 class="card-title">Popular Movies</h5>
        </div>
        @foreach($popular as $movies)
            <a href="/movie/{{$movies->id}}">
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body m-0 p-0">
                            <div class="table-responsive text-center">
                                <div class="text-center">
                                    <img src="data:image/png;base64, {{$movies->poster}}" alt="poster" width="250px" height="380px"/>
                                </div>
                                <div>
                                    <p class="text-dark h5 text-left ml-2">{{ucfirst($movies->title)}}</p>
                                </div>
                                <div>
                                    <p class="text-dark text-left ml-2 p-0 m-0">Runtime
                                        : {{floor($movies->runtime / 60).' H : '.($movies->runtime - floor($movies->runtime / 60) * 60).' M'}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    @endif
@endsection
