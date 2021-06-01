@extends('layouts.user-master')
@section('content')
    <form action="{{route('ticket-save')}}" method="post">
        @csrf
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info">Book Ticket</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="text-primary w-25">
                                    Movie
                                </td>
                                <td class="text-primary w-25">
                                    City
                                </td>
                                <td class="text-primary w-25">
                                    theatre
                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    <select name="movie_id" class="form-control form-control-lg w-100 border-none" required>

                                            <option value="{{$movie->id}}">{{$movie->title}}</option>

                                    </select>
                                </td>
                                <td class="">
                                    <select name="city_id" class="form-control form-control-lg w-100 border-none" required>
                                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                                    </select>
                                </td>
                                <td class="">

                                    <select name="theatre_id" class="form-control form-control-lg w-100 border-none" required>
                                            <option value="{{$theatre->id}}">{{$theatre->theatre_name}}</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive text-center">
                    @foreach($seat as $seats)
                            <div class="d-inline-block" style="height: 40px; width: 135px;">
                                <input type="checkbox" {{--class="fas fa-chair text-info"--}} id="{{$seats->id}}" name="seat_id[]" value="{{$seats->id}}"
                                @foreach(\App\Models\SeatReserved::select('seat_id')->where('screening_id',$screening->id)->get() as $rs)
                                @if(isset($rs) && $rs->seat_id == $seats->id) disabled @endif
                                    @endforeach
                                >
                            </div>
                    @endforeach
                    <input type="hidden" name="screening_id" value="{{$screening->id}}">
                    <input type="submit" name="submit_seats" class="btn btn-success" value="Book">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
