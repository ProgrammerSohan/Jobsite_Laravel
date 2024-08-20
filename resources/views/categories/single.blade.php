@extends('layouts.app')

@section('content')


 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url(); margin-top:-24px;" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">{{ $name}}</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>{{ $name}}</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="site-section">
<div class="container">

  <div class="row mb-5 justify-content-center">
    <div class="col-md-7 text-center">
      <h2 class="section-title mb-2">{{ $name }}</h2>
    </div>
  </div>

  <ul class="job-listings mb-5">
    @if($jobs->count()> 0)

    @foreach($jobs as $job)

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <p>{{$job->id}}</p>
            <a href="{{route('single.job',$job->id)}}"></a>
            <div class="job-listing-logo">
              <img src="{{ asset('assets/images/'.$job->image) }}" alt="{{ $job->job_title}}" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{ $job->job_title}}</h2>
                <strong>{{$job->company}}</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> {{ $job->job_region}}
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger"> {{$job->job_type}}</span>
              </div>
            </div>

          </li>

    @endforeach
   {{--  {{ $jobs->links() }} --}}

    @else
        <div class="container">
            <div class="alert alert-success">
                <h3 class="bg-warning">No Jobs Found In This Category!!!</h3>
                <p>This site is made by Programmer Sohan</p>
            </div>

        </div>

    @endif




  </ul>



</div>
</section>

@endsection
