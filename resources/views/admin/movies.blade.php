@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info"> Movies Details</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{route('movies-save')}}" enctype="multipart/form-data">
                        @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="text-primary w-50">
                                Title
                            </td>
                            <td class="">
                                <input type="text" name="movie_title" class="input p-2 w-100" placeholder="Movie Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary w-50">
                                Poster
                            </td>
                            <td class="">
                                <input type="file" name="movie_image" class="input p-2 w-100" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary w-50">
                                Runtime
                            </td>
                            <td class="">
                                <input type="number" name="movie_runtime" class="input p-2 w-100" placeholder="Run Time In Total Minutes" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary" colspan="2">
                                Overview
                            </td>
                        </tr>
                        <tr style="height: auto;">
                            <td class="h-auto" colspan="2" style="height: auto;">
                                <textarea type="text" name="movie_overview" class="input p-2 w-100" placeholder="Movie Overview ..." style="height: 150px;" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary">
                                Release Year
                            </td>
                            <td class="">
                                <input type="date" name="movie_release_year" class="input p-2 w-100" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary">
                               Is Popular   <input type="checkbox" name="movie_popular" class="input p-2 w-50">
                            </td>
                            <td class="text-primary">
                                Is Trending   <input type="checkbox" name="movie_trending" class="input p-2 w-50">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary text-center" colspan="2">
                                <input type="submit" name="movie_submit" class="btn btn-success" value="Submit">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info">Add Cast</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('cast-save')}}" method="post">
                        @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="text-primary w-25">
                                Movie
                            </td>
                            <td class="text-primary w-25">
                                Actor Name
                            </td>
                            <td class="text-primary w-25">
                                Roll Name
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <select name="movie_id" class="form-control form-control-lg w-100 border-none" required>
                                    @foreach($movie as $movies)
                                    <option value="{{$movies->id}}">{{$movies->title}}</option>
                                     @endforeach
                                </select>
                            </td>
                            <td class="">
                                <select name="movie_actor_id" class="form-control form-control-lg w-100 border-none" required>
                                    @foreach($actor as $cast)
                                        <option value="{{$cast->id}}">{{$cast->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="w-100 text-center" colspan="2">
                                <input type="text" name="movie_actor_roll" class="input p-2 w-100" placeholder="Roll Name In Movie" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary text-center" colspan="3">
                                <input type="submit" name="cast_submit" class="btn btn-success" value="Add">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info">Movies And Cast</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="text-primary">
                                    Movie Title
                                </td>
                                <td class="text-primary" colspan="">
                                    Movie Poster
                                </td>
                                <td class="text-primary">
                                    Run Time
                                </td>
                                <td class="text-primary">
                                    overview
                                </td>
                                <td class="text-primary">
                                    Release Year
                                </td>
                                <td class="text-primary">
                                    Cast
                                </td>
                            </tr>
                            @foreach($movie as $movies)
                                <tr>
                                    <td>
                                        <p>{{$movies->title}}</p>
                                    </td>
                                    <td>
                                        <img src="data:image/png;base64, {{$movies->poster}}" alt="poster" width="100px"/>
                                    </td>
                                    <td>
                                        <p>{{floor($movies->runtime / 60).' H : '.($movies->runtime - floor($movies->runtime / 60) * 60).' M'}}</p>
                                    </td>
                                    <td class="w-25">
                                        <p>{{$movies->overview}}</p>
                                    </td>
                                    <td >
                                        <p>{{$movies->release_year}}</p>
                                    </td>
                                    <td>
                                        @foreach(\App\Models\Cast::select("actor_id")->where("movie_id", "=", $movies->id)->get() as $castdata)
                                            @foreach(\App\Models\Actor::select("image")->where("id", "=", $castdata->actor_id)->get() as $cast)
                                            @endforeach
                                            <img src="data:image/png;base64, {{$cast->image}}" alt="poster" width="40px" height="40px" style="display: inline-block;"/>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
