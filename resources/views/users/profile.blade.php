@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image" id="next" style="margin-top: -24px;background-image: url('{{ asset('assets/images/hero_1.jpg') }}');">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">

                <div class="text-center">
                    <img src="{{ asset('assets/images/me1.jpg')}}" width="100" class="" alt="">
                </div>

                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">Sohanur Rahman Sohan</h5>
                    <span>Software Engineer</span>
                    <div class="px-4 mt-1">
                        <p class="fonts">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam similique officia culpa exercitationem, saepe, maiores eum minus harum rerum quam ipsam et laudantium suscipit sint adipisci, eius repellat dolore quas?</p>
                    </div>



                </div>


            </div>
        </div>
      </div>

    </div>
    </section>

    @endsection
