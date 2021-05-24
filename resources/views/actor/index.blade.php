@extends('layouts.user-master')
@section('content')
    <div class="col-12">
        <div class="card bg-light">
            <div class="card-body">
                <div class="table-responsive">
                    @foreach($actor as $cast)
                        <div class="w-auto d-inline-block">
                            <img src="data:image/png;base64, {{$cast->image}}" alt="poster" style="width: 450px;height: 500px;"/>
                        </div>
                        <div class="w-auto d-inline-block  font-icon-detail">
                            <div class="">
                                <a href="/movie/{{$cast->id}}" ><p>Name : {{$cast->name}}</p></a>
                            </div>
                            <div class="text-info mb-1">
                                DOB : {{date("d-m-Y",strtotime(trim($cast->birth_date," 00:00:00")))}}
                            </div>
                            <div style="width: 45vw;">
                                Bio Data : <p class="mt-1">{{$cast->bio}}</p>
                            </div>
                            <div style="width: 45vw;">
                                Movies : <br>
                                @foreach(\App\Models\Cast::select("*")->where("actor_id", "=", $cast->id)->get() as $castdata)
                                    @foreach(\App\Models\Movie::select("*")->where("id", "=", $castdata->movie_id)->get() as $movie)

                                    <div class="mt-1 d-inline-block bg-dark text-center">
                                        <a href="/movie/{{$movie->id}}"><img src="data:image/png;base64, {{$movie->poster}}" alt="poster" width="100px" height="150px" style="display: inline-block;"/></a>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

{{--                        <table class="table table-bordered w-100 m-0">--}}
{{--                            <tr>--}}
{{--                                <td class="text-center" colspan="3" width="500px">--}}
{{--                         --}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    Actor Name : --}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    DOB : <p>{{$cast->birth_date}}</p>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--
{{--                                </td>--}}

{{--                            </tr>--}}

{{--                        </table>--}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
