@php
    $title = 'Landing Page List';
@endphp
@extends('layouts.app')
@section('page_css')
<style>
    .card {
      box-shadow: 0 5px 15px rgba(0, 0, 0, .35);
      transition: all .2s;
      border-radius: 10px;
      position: relative;
      height: 100%;
      
  }

  .card-img-top {
      width: 100%;
      height: 150px;
      object-fit: cover;
      object-position: center;
  }
  
  .card-title{
    margin-bottom: 40px;
    font-size: 15px;
  }

  .card-body {
      padding: 1rem;
  }

  .button-fixed{
      position: absolute;
      margin: 0 auto;
      bottom: 20px;
      left: 0;
      right: 0;
  }

  .mx-auto {
      display: block;
      margin-left: auto;
      margin-right: auto;
      padding-top: 13px;
  }

  .card-mobile {
          margin-bottom: 30px;
      }
</style>
@endsection
@section('page_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header py-2">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0">{{ $title }}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card">
                                <img src="{{ asset('assets\images\landing_page\landing-1.jpg') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Wireless Induction Car Holder</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card">
                                <img src="{{ asset('assets\images\landing_page\landing-2.jpg') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Light Wireless Charger Speaker Alarm Clock</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page_two') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card">
                                <img src="{{ asset('assets\images\landing_page\landing-3.jpg') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Multifunctional Wireless Charger</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page_three') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card" >
                                <img src="{{ asset('assets\images\landing_page\powerbank.png') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Portable 10000 mAh Powerbank</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page_four') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card" >
                                <img src="{{ asset('assets\images\landing_page\landing-5.jpg') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Magnetic Wireless Charging Power Bank</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page_five') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card" >
                                <img src="{{ asset('assets\images\landing_page\landing-6.jpg') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Car Headrest Tablet Mount Holder</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page_six') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card" >
                                <img src="{{ asset('assets\images\landing_page\landing-7.png') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">500ml Smart Insulation Cup Vacuum Bottle</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page_seven') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 card-mobile">
                            <div class="card" >
                                <img src="{{ asset('assets\images\landing_page\landing-8.jpg') }}"  class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">15W Wireless Smartphone Charger</h5>
                                </div>
                                <div class="d-flex justify-content-center button-fixed ">
                                    <a href="{{ route('show_landing_page_eight') }}" target="_blank" class="btn btn-primary">Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
