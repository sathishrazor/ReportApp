@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            Employee:{{$record->entity_id}}
        </div>
        <div class="card-body">
            <div class="btn btn-group">
                <a href="{{route("employees.edit",$record->id)}}" class="btn btn-success">Edit</a>
                <a href="{{route('employees.index')}}" class="btn btn-secondary">Back to List</a>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            {{$record->name}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            {{$record->email}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Phone
                        </td>
                        <td>
                            {{$record->phone}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Created on
                        </td>
                        <td>
                            {{$record->created_at}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Created by
                        </td>
                        <td>
                            {{$record->created_by}}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Last Modified
                        </td>
                        <td>
                            {{$record->updated_at}}
                        </td>
                    </tr>
                </table>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            Address Book
        </div>

        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Attention</th>
                        <th>Address L1</th>
                        <th>Address L2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Zip</th>
                    </tr>
                </thead>
                @foreach ($record->addressbook as $item)
                        <tr>
                            <td>
                                {{$item->attention}}
                            </td>
                            <td>
                                {{$item->addr1}}
                            </td>
                            <td>
                                {{$item->addr2}}
                            </td>
                            <td>
                                {{$item->city}}
                            </td>
                            <td>
                                {{$item->state}}
                            </td>
                            <td>
                                {{$item->country}}
                            </td>
                            <td>
                                {{$item->zip}}
                            </td>
                        </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection
