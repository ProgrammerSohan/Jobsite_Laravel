@extends('layouts.admin')

@section('content')
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Job Applications</h5>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">cv</th>
                    <th scope="col">job_id</th>
                    <th scope="col">job_title</th>
                    <th scope="col">company</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td><a class="btn btn-success" href="#">CV</a></td>
                    <td>1</td>
                    <td>Web Dev</td>
                     <td>Web Coding</td>
                     <td><a href="#" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

      @endsection