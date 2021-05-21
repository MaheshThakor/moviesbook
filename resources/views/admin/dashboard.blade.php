@extends('layouts.master')
@section('content')
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
{{--                <h5 class="card-category">Admin Profile</h5>--}}
                <h4 class="card-title text-info"> Change Password</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary w-50">
                          Old Password
                        </td>
                          <td class="">
                              <input type="password" name="old_password" class="input p-2 w-75" placeholder="Old Password">
                          </td>
                      </tr>
                      <tr>
                          <td class="text-primary">
                              New Password
                          </td>
                          <td class="">
                              <input type="password" name="new_password" class="input p-2 w-75" placeholder="New Password">
                          </td>
                      </tr>
                      <tr>
                          <td class="text-primary">
                              Confirm Password
                          </td>
                          <td class="">
                              <input type="password" name="confirm_password" class="input p-2 w-75" placeholder="Confirm Password">
                          </td>
                      </tr>
                      <tr>
                          <td class="text-primary text-center" colspan="2">
                              <input type="submit" name="change_password" class="btn btn-success" value="Change Password">
                          </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection
