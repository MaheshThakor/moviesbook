@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info">City Details</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('city-save')}}" method="post">
                        @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="text-primary w-50">
                                City
                            </td>
                            <td class="">
                                <input type="text" name="city_name" class="input p-2 w-100" placeholder="Add City" required>
                            </td>
                            <td class="">
                                <input type="submit" name="add_city" class="btn btn-success" value="Add">
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
                <h4 class="card-title text-info">Theatres Details</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('theatres-save')}}" method="post">
                        @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="text-primary w-25">
                                City
                            </td>
                            <td class="text-primary w-25">
                                Theatre Name
                            </td>
                            <td class="text-primary w-25">
                                Total Seats
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <select name="city_id" class="form-control form-control-lg w-100 border-none" required>
                                    @foreach($city as $cities)
                                        <option value="{{$cities->id}}">{{$cities->city_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="">
                                <input type="text" name="theatre_name" class="input p-2 w-100" placeholder="Theatre Name" required>
                            </td>
                            <td class="w-100 text-center" colspan="2">
                                <input type="number" name="total_seats" class="input p-2 w-100" placeholder="Total Seats" required>
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

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-info">Add Seats</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('add-seat')}}" method="post">
                        @csrf
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="text-primary w-25">
                                    Row Number
                                </td>
                                <td class="text-primary w-25">
                                    Seat Number
                                </td>
                                <td class="text-primary w-25">
                                    theatre
                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    <input type="number"name="row_number" placeholder="Row Number For Seat">
                                </td>
                                <td class="">
                                    <input type="number" name="seat_number" placeholder="Seat Number">
                                </td>
                                <td class="w-100 text-center" colspan="2">
                                    <select name="theatre_id" class="form-control form-control-lg w-100 border-none" required>
                                        @foreach($theatre as $theatres)
                                            <option value="{{$theatres->id}}">{{$theatres->theatre_name}}</option>
                                        @endforeach
                                    </select>
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
@endsection
