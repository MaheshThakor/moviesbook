@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info">Movie Screening Time Details</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('screening-save')}}" method="post">
                        @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="text-primary w-25">
                                Theatre Name
                            </td>
                            <td class="text-primary w-25">
                                Movie Name
                            </td>
                            <td class="text-primary w-25">
                                Screening Time
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <select name="theatre_id" class="form-control form-control-lg w-100 border-none" required>
                                    @foreach($theatre as $theatres)
                                        <option value="{{$theatres->id}}">{{$theatres->theatre_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="">
                                <select name="movie_id" class="form-control form-control-lg w-100 border-none" required>
                                    @foreach($movie as $movies)
                                        <option value="{{$movies->id}}">{{$movies->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="w-100 text-center" colspan="">
                                <input type="datetime-local" name="screening_time" class="input p-2 w-100" placeholder="Screening Time" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary text-center" colspan="3">
                                <input type="submit" name="theatre_submit" class="btn btn-success" value="Add">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
