@extends('layouts.app')
@section('content')
<h5>
    Delete Confirmation
</h5>

<div class="alert alert-danger">Warning:Irreversable action</div>

<p>
    Are you sure want to deletet this record?
    <dl>
        {{$record->id}}

    </dl>
    <dt>
        {{$record->name}}
    </dt>

<form method="POST" action="/picklist/{{$record->id}}">
        @csrf
        @method("DELETE")
        <button class="btn btn-danger" type="submit">Delete</button>
</form>


</p>

