@extends('layouts.user-master')
@section('content')
<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info">Book Ticket</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('ticket-save')}}" method="post">
                        @csrf
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
                                <td class="text-primary w-25">
                                    Seat Number
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
                                    <select name="city_id" class="form-control form-control-lg w-100 border-none" required>
                                        @foreach($city as $cities)
                                            <option value="{{$cities->id}}">{{$cities->city_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="">
                                    <select name="theatre_id" class="form-control form-control-lg w-100 border-none" required>
                                        @foreach($theatre as $theatres)
                                            <option value="{{$theatres->id}}">{{$theatres->theatre_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="">
                                    <select name="seat_id" class="form-control form-control-lg w-100 border-none" required>
                                    @foreach($seat as $seats)
                                        @foreach(\App\Models\SeatReserved::select('seat_id')->where('reservation_id','=',$reserved)->get() as $rs)
                                            @if($rs->seat_id != $seats->id)
                                           {<option value="{{$seats->id}}">{{$seats->id}}</option>
                                             @endif
                                        @endforeach
                                            @if(!isset($rs))
                                                <option value="{{$seats->id}}">{{$seats->id}}</option>
                                            @endif
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary text-center" colspan="3">
                                    <input type="hidden" name="screening_id" value="{{$screening}}">
                                    <input type="submit" name="seat_submit" class="btn btn-success" value="Add">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<form action="/test" method="post" class="w-100">
    @csrf
    <div class="col-12">
        <div class="card bg-light">
            <div class="card-body">
                <div class="table-responsive text-center">

                    @foreach($seat as $seats)
                        @foreach(\App\Models\SeatReserved::select('seat_id')->where('reservation_id','=',$reserved)->get() as $rs)
{{--                            @if($rs->seat_id != $seats->id)--}}
                                <div class="d-inline-block" style="height: 40px; width: 135px;">
                                    <input type="checkbox" class="fas fa-chair" id="{{$seats->id}}" name="seat[]" value="{{$seats->id}}">
                                </div>
{{--                            @endif--}}
                        @endforeach
                        @if(!isset($rs))
                                <div class="d-inline-block" style="height: 40px; width: 135px;">
                                    <input type="checkbox" class="fas fa-chair" id="{{$seats->id}}" name="seat[]" value="{{$seats->id}}">
                                </div>
                        @endif
                    @endforeach
{{--                    --}}
{{--                    --}}
{{--                    @for($i = 1; $i < 101; $i++)--}}
{{--                    <div class="d-inline-block" style="height: 40px; width: 135px;">--}}
{{--                        <input type="checkbox" class="fas fa-chair" id="{{$i}}" name="seat[]" value="{{$i}}">--}}
{{--                    </div>--}}
{{--                    @endfor--}}
{{--                        <table class="table table-borderless w-100 mt-2">--}}
{{--                            @for ($i = 0; $i < 10; $i++)--}}
{{--                                <tr class="text-center">--}}
{{--                                    @for ($j = 1; $j < 11; $j++)--}}
{{--                                        <td class="text-success m-1">--}}

{{--                                                <input type="checkbox" class="fas fa-chair fa-3x" id="{{$j}}" name="seat[]" value="{{$j}}">--}}
{{--                                            <a href="/BookSeat/{{$j}}"><i class="now-ui-icons shopping_credit-card"></i></a>--}}
{{--                                        </td>--}}
{{--                                    @endfor--}}
{{--                                </tr>--}}
{{--                            @endfor--}}
{{--                        </table>--}}
                    <input type="submit" name="submit_seats" class="btn btn-success" value="Book">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
