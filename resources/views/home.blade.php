@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="row card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <p class="tile-content">Visual Testing Examination Report</p>
                    </a>

                    <a href="/rtreport" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-eercast" aria-hidden="true"></i>
                        <p class="tile-content">Radiographic Test Report</p>
                    </a>

                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-tint" aria-hidden="true"></i>
                        <p class="tile-content"> Liquid Penetration Test Report</p>
                    </a>
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-ravelry" aria-hidden="true"></i>
                        <p class="tile-content">Ultrasonic Test Report</p>
                    </a>
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-ravelry" aria-hidden="true"></i>
                        <p class="tile-content">Ultrsonic Test Report (Lamination)</p>
                    </a>
                    <a href="#" class="col-md-2 tile-card d-flex">
                        <i class="fa fa-ravelry" aria-hidden="true"></i>
                        <p class="tile-content">Ultrsonic Thickness Gauge Report</p>
                    </a>
            </div>
         </div>
    </div>
 </div>
</div>
@endsection
