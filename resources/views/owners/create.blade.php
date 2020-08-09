@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form method="POST" enctype="application/x-www-form-urlencoded" action="/owners">
        @csrf
        <h4>Create Owner</h4>
        <div class="form-row">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="submit" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-secondary">Back</button>
            </div>

        </div>
        <br />
        <div class="card">
            <div class="card-header">Primary Details</div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Name</label>
                        <input name="name" type="text" class="form-control form-control-sm" placeholder="">
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Owner Ref No</label>
                        <input name="entity_id" type="text" class="form-control form-control-sm" placeholder="">
                        @error('client_name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control form-control-sm" placeholder="">
                        @error('client_address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Phone</label>
                        <input name="phone" type="text" class="form-control form-control-sm" placeholder="">
                        @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label>Address</label>
                        <textarea name="address" type="text" class="form-control form-control-sm" placeholder=""></textarea>
                        @error('address')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <br />
    </form>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .ui-autocomplete-loading {
        background: white url("/img/ui-anim_basic_16x16.gif") right center no-repeat;
    }
</style>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/form_auto_complete.js')}}"></script>

@endsection
