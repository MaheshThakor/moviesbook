@extends('layouts.user-master')
@section('content')
    <div class="col-12">
        <div class="card bg-light">
            <div class="card-body">
                <div class="table-responsive">
                    @foreach($actor as $cast)
                        <table class="table table-borderless w-100 m-0">
                            <tr>
                                <td class="text-center">
                                    <img src="data:image/png;base64, {{$cast->image}}" alt="poster" width="400px"
                                         height="500px"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Actor Name : <a href="/movie/{{$cast->id}}" class="text-info underline"><p>{{$cast->name}}</p></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    DOB : <p>{{$cast->birth_date}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Bio Data : <p>{{$cast->bio}}</p>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
