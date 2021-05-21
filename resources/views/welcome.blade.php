@extends('layouts.user-master')
@section('content')
    <div class="col-12 m-0">
        <div class="card  bg-danger">
            <div class="card-header m-0">
                <h5 class="card-title text-white">Trending Movies</h5>
            </div>
        </div>
    </div>
    @foreach($trending as $movies)
        <div class="col-3">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless w-100 m-0">
                            <tr>
                                <td class="text-center">
                                    <img src="data:image/png;base64, {{$movies->poster}}" alt="poster" width="250px"
                                         height="400px"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="/movie/{{$movies->id}}" class="text-info underline"><p>{{$movies->title}}</p></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">
                                    <p>Runtime : {{floor($movies->runtime / 60).' H : '.($movies->runtime - floor($movies->runtime / 60) * 60).' M'}}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
                                    <a href="/movie/{{$movies->id}}" class="text-info underline"><p>{{$movies->title}}</p></a>
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
@endsection
