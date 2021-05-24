@extends('layouts.user-master')
@section('content')
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="table-responsive">
                        @foreach($movie as $movies)
                        <table class="table table-borderless w-100 m-0">
                            <tr>
                                <td class="text-center">
                                    <img src="data:image/png;base64, {{$movies->poster}}" alt="poster" width="250px"
                                         height="400px"/>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    @foreach($screening as $screen)
                                        @if($screen->movie_id != "")
                                            <a href="/book/{{$screen->id}}" class="btn btn-info">Book Ticket</a>
                                        @else
                                            @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Movie Name : <a href="/movie/{{$movies->id}}" class="text-info underline"><p>{{$movies->title}}</p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Runtime : <p class="text-primary">{{floor($movies->runtime / 60).' H : '.($movies->runtime - floor($movies->runtime / 60) * 60).' M'}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Release Date : <p>{{$movies->release_year}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Overview : <p>{{$movies->overview}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    cast :
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    @foreach(\App\Models\Cast::select("*")->where("movie_id", "=", $movies->id)->get() as $castdata)
                                    @foreach(\App\Models\Actor::select("*")->where("id", "=", $castdata->actor_id)->get() as $cast)
                                    @endforeach
                                    <div class="mt-1 d-inline-block bg-light text-center">
                                            <img src="data:image/png;base64, {{$cast->image}}" alt="poster" width="100px" height="100px" style="display: inline-block;"/>
                                            <br><a href="/actor/{{$cast->id}}" class="text-info">{{$cast->name}}</a><br>
                                                <span class="text-primary">{{$castdata->role}}</span>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
@endsection
