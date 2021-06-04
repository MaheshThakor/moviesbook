@extends('layouts.user-master')
@section('content')
    @if(isset($trending) && !$trending->isEmpty())
        <div class="text-center col-12 bg-primary text-dark mt-3">
                <h5 class="card-title">Trending Movies</h5>
        </div>
    @foreach($trending as $movies)
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
    @if(isset($popular) && !$popular->isEmpty())
        <div class="text-center col-12 bg-warning text-dark">
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
    @if(isset($search))
    @if(sizeof($search['movie']))
        <div class="text-center col-12 bg-light text-dark mt-3">
            <h5 class="card-title">Search Result For {{$query['searchbar']}} Movie</h5>
        </div>
        @foreach($search['movie'] as $movies)
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
    @if(sizeof($search['city']))
        <div class="text-center col-12 bg-light text-dark mt-3">
            <h5 class="card-title">Search Result For Movies Shows Available in {{$query['searchbar']}} </h5>
        </div>
        @foreach($search['city'] as $movies)
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
    @if(sizeof($search['theatre']))
        <div class="text-center col-12 bg-light text-dark mt-3">
            <h5 class="card-title">Available Show In {{$query['searchbar']}}... Theatre</h5>
        </div>
        @foreach($search['theatre'] as $movies)
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
    @endif
    @if(isset($trending,$popular) && $trending->isEmpty() && $popular->isEmpty() && !isset($search))
        <div class="col-12">
            <div class="card bg-dark text-white text-center">
                <div class="card-body">
                    <div class="table-responsive" style="height:500px;font-size: x-large;">
                        No Movies Available
                    </div>
                </div>
            </div>
        </div>
        @elseif(isset($search) && !sizeof($search['theatre']) && !sizeof($search['city']) && !sizeof($search['movie']) )
        <div class="col-12">
            <div class="card bg-dark text-white text-center">
                <div class="card-body">
                    <div class="table-responsive" style="height:550px;font-size: x-large;">
                        Not Found Anything
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
