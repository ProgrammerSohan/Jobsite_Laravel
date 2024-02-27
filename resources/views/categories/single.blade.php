@extends('layouts.app')

@section('content')

<section class="site-section">
<div class="container">

  <div class="row mb-5 justify-content-center">
    <div class="col-md-7 text-center">
      <h2 class="section-title mb-2">{{ $totalJobs }} Job Listed</h2>
    </div>
  </div>
  
  <ul class="job-listings mb-5">

    @foreach($jobs as $job)

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <p>{{$job->id}}</p>
            <a href="{{route('single.job',$job->id)}}"></a>
            <div class="job-listing-logo">
              <img src="{{ $job->image}}" alt="{{ $job->job_title}}" class="img-fluid">
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
    {{ $jobs->links() }}
     
    
  </ul>



</div>
</section>

@endsection