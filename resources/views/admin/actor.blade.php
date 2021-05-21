@extends('layouts.master')
@section('content')
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-info">Actor Details</h4>
              </div>
                <form method="POST" action="{{route('actor-save')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary w-50">
                         Actor Name
                        </td>
                          <td class="">
                              <input type="text" name="actor_name" class="input p-2 w-100" placeholder="Actor Name" required>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-primary" colspan="2">
                              Actor Bio-Data
                          </td>
                      </tr>
                      <tr style="height: auto;">
                          <td class="h-auto" colspan="2" style="height: auto;">
                              <textarea type="text" name="actor_bio" class="input p-2 w-100" placeholder="Actor Bio-Data" style="height: 150px;" required></textarea>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-primary">
                              Born
                          </td>
                          <td class="">
                              <input type="date" name="actor_dob" class="input p-2 w-100" placeholder="Select Date Of Birth" required>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-primary">
                              Profile Image
                          </td>
                          <td class="">
                              <input type="file" name="actor_image" class="input p-2 w-100" required>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-primary text-center" colspan="2">
                              <input type="submit" name="actor_submit" class="btn btn-success" value="Submit">
                          </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
                </form>
            </div>
          </div>

          <div class="col-md-12">
              <div class="card">


                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table">
                                  <tbody>
                                  <tr>
                                      <td class="text-primary">
                                          Actor Name
                                      </td>
                                      <td class="text-primary" colspan="">
                                          Actor Bio-Data
                                      </td>
                                      <td class="text-primary">
                                          Born
                                      </td>
                                      <td class="text-primary">
                                          Profile Image
                                      </td>
                                  </tr>
                                  @foreach($actor as $cast)
                                  <tr>
                                      <td class="w-25">
                                          <p>{{$cast->name}}</p>
                                      </td>
                                      <td class="w-25">
                                          <p>{{$cast->bio}}</p>
                                      </td>
                                      <td class="w-25">
                                          <p>{{$cast->birth_date}}</p>
                                      </td>
                                      <td class="w-25">
                                          <img src="data:image/png;base64, {{$cast->image}}" alt="Red dot" width="200px"/>
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
