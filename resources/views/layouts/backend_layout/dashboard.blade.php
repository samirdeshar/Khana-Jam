@extends('layouts.backend_layout.template')
@section('title','Admin || Dashboard')

@section('main-content')
<div class="pagetitle">
    <h1>Admin Dashboard</h1>

  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">


          <div class="col-xxl-4 col-md-4">
            <a href="{{route('all-messages.index')}}">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">All Messages</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{@$comments->count()}}</h6>
                    </div>
                  </div>

                </div>
              </div>
            </a>
          </div><!-- End Project -->


        </div>
      </div><!-- End Left side columns -->




    </div>
  </section>

@endsection
