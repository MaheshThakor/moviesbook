@extends('layouts.user-master')
@section('content')
    @if(isset($trending) && !$trending->isEmpty())
        <div class="col-12 m-0">
            <div class="card  bg-danger">
            <div class="card-header m-0">
                <h5 class="card-title text-white">Trending Movies</h5>
            </div>
        </div>
    </div>
    @foreach($trending as $movies)
        <div class="col-auto">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <div class="text-center">
                            <img src="data:image/png;base64, {{$movies->poster}}" alt="poster" width="300px"
                                 height="450px"/>
                        </div>
                        <div>
                            <a href="/movie/{{$movies->id}}" class="text-info underline"><p>{{$movies->title}}</p></a>
                        </div>
                        <div>
                            <p>Runtime
                                : {{floor($movies->runtime / 60).' H : '.($movies->runtime - floor($movies->runtime / 60) * 60).' M'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
    @if(isset($popular) && !$popular->isEmpty())
    <div class="col-12">
        <div class="card bg-info">
            <div class="card-header m-0">
                <h5 class="card-title text-white">Popular Movies</h5>
            </div>
        </div>
    </div>
    @foreach($popular as $movies)
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table w-100">
                            <tr>
                                <td>
                                    <img src="data:image/png;base64, {{$movies->poster}}" alt="poster" width="250px"
                                         height="400px"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-info">
                                    <a href="/movie/{{$movies->id}}" class="text-info underline">
                                        <p>{{$movies->title}}</p></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    <p>Runtime
                                        : {{floor($movies->runtime / 60).' H : '.($movies->runtime - floor($movies->runtime / 60) * 60).' M'}}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
    @if(isset($search))
    @if(sizeof($search['movie']))
        @foreach($search['movie'] as $movie)
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <div class="text-center">
                                <img src="data:image/png;base64, {{$movie->poster}}" alt="poster" width="300px"
                                     height="450px"/>
                            </div>
                            <div>
                                <a href="/movie/{{$movie->id}}" class="text-info underline"><p>{{$movie->title}}</p></a>
                            </div>
                            <div>
                                <p>Runtime
                                    : {{floor($movie->runtime / 60).' H : '.($movie->runtime - floor($movie->runtime / 60) * 60).' M'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    @if(sizeof($search['city']))
        @foreach($search['city'] as $movie)
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <div class="text-center">
                                <img src="data:image/png;base64, {{$movie->poster}}" alt="poster" width="300px"
                                     height="450px"/>
                            </div>
                            <div>
                                <a href="/movie/{{$movie->id}}" class="text-info underline"><p>{{$movie->title}}</p></a>
                            </div>
                            <div>
                                <p>Runtime
                                    : {{floor($movie->runtime / 60).' H : '.($movie->runtime - floor($movie->runtime / 60) * 60).' M'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    @if(sizeof($search['theatre']))
        @foreach($search['theatre'] as $movie)
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <div class="text-center">
                                <img src="data:image/png;base64, {{$movie->poster}}" alt="poster" width="300px"
                                     height="450px"/>
                            </div>
                            <div>
                                <a href="/movie/{{$movie->id}}" class="text-info underline"><p>{{$movie->title}}</p></a>
                            </div>
                            <div>
                                <p>Runtime
                                    : {{floor($movie->runtime / 60).' H : '.($movie->runtime - floor($movie->runtime / 60) * 60).' M'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    @endif
@endsection
