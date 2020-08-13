@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><span id="page_name">{{ __('Dashboard') }}</span> </div>
                <div class="row card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a href="{{route('rtreport.index')}}" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-eercast" aria-hidden="true"></i>
                        <p class="tile-content">Radiographic Test Report</p>
                    </a>

                <a href="{{route("mptreport.index")}}" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-magnet" aria-hidden="true"></i>
                        <p class="tile-content">Magnetic Pole Test Report</p>
                    </a>

                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                        <p class="tile-content"> Liquid Penetration Test Report</p>
                    </a>
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-ravelry" aria-hidden="true"></i>
                        <p class="tile-content">Ultrasonic Test Report A(AWS)</p>
                    </a>
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-ravelry" aria-hidden="true"></i>
                        <p class="tile-content">Ultrasonic Test Report B(ASME)</p>
                    </a>
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-ravelry" aria-hidden="true"></i>
                        <p class="tile-content">Ultrasonic Test Report C(Lamination)</p>
                    </a>
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-ravelry" aria-hidden="true"></i>
                        <p class="tile-content">Ultrasonic Thickness Gauge Report</p>
                    </a>
            </div>
         </div>
    </div>
 </div>
</div>
@endsection
