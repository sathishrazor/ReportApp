@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
           <i class="fa fa-clock-o"></i> PROJECT INFO:{{$record->entity_id}}
        </div>
        <div class="card-body">
            <div class="btn btn-group">
            <a href="{{route("projects.edit",$record->id)}}" class="btn btn-success">Edit</a>
            <a href="{{route('projects.index')}}" class="btn btn-secondary">Back to List</a>
            </div>
                <table class="table table-borderless">
                    <tr>
                        <td>
                            Project Name
                        </td>
                        <td>
                            {{$record->name}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Project Description
                        </td>
                        <td>
                            {{$record->description}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Manager
                        </td>
                        <td>
                            {{$record->manager}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <i class="fa fa-clock-o"></i> Start Date
                        </td>
                        <td>
                            {{$record->start_date}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <i class="fa fa-clock-o"></i> End Date
                        </td>
                        <td>
                            {{$record->end_date}}
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
