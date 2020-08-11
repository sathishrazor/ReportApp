@extends('layouts.app')
@section('content')
    <div class="container">
                 <form method="POST" action="/picklist/{{$record->id}}">
                    @csrf

                    @method("PUT")
                    <h4>PickList Create</h4>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name')??$record->name }}" required  autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text"  value="{{ old('description')??$record->description }}" class="form-control @error('description') is-invalid @enderror" name="description" required>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                 <div class="form-group row">

                    <label class="col-md-4 col-form-label text-md-right">Options</label>
                    <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Value</th>
                            <th>Text</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($record->options as $option)
                                <tr>
                                    <td><input type="text" name="Options[{{$loop->index}}][value]" class="form-control form-control-sm" value="{{$option->value}}"></td>
                                    <td><input type="text"  name="Options[{{$loop->index}}][text]" class="form-control form-control-sm" value="{{$option->text}}"></td>
                                    <td>
                                        <button class="btn editbtn btn-sm btn-warning">Edit</button>
                                        <button class="btn delbtn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td><input type="text"  class="value form-control form-control-sm"></td>
                            <td><input type="text" class="text form-control form-control-sm"></td>
                            <td><button class="btn btn-sm btn-success addbtn">Add</button></td>
                        </tr>
                        </tfoot>

                    </table>
                </div>
                 </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
    </div>

<script>
    $(function(){
        console.log("doc loaded")

        $(document).on('click','.addbtn',function(e){
            e.preventDefault();
           var value = $(".value").val()
           var txt = $(".text").val()
           console.log({value,txt});
           if(isNullorDefault(txt)||isNullorDefault(value))
           {
               alert("invalid value");
           }else{
            var index = $("tbody tr").length;
            var tpl = tplrow.replace(/{value}/g,value)
                            .replace(/{text}/g,txt)
                            .replace(/{index}/g,index);
            $("tbody").append(tpl);
             $(".value").val("")
             $(".text").val("")
           }
        });

        $(document).on('click','.editbtn',function(e){
            e.preventDefault();
            console.log(e);
            $(this).parents('tr').find('input').removeAttr('readonly').addClass("editing");
        });

        $(document).on('blur','.editing',function(e){
            console.log(e);
            $(this).parents('tr').find('input').attr('readonly',"readonly").removeClass("editing");
        });


        $(document).on('click','.delbtn',function(e){
            e.preventDefault();
            console.log(e);
            $(this).parents('tr').remove();
            updateindex();
        })


        function updateindex()
        {
            $("tbody tr").each(function(index,tr){
                var row = $(tr);
                row.each(function(i,td){
                    var col = $(td).find('input');
                    var prev = col.attr("name")
                    col.attr({
                        name:prev.replace(/\d+/g,index)
                    })
                })
            });
        }

        var tplrow = `
            <tr>
                <td>
                    <input type="text" name="Options[{index}][value]" readonly="readonly" class="form-control form-control-sm" value="{value}" />
                </td>
                <td>
                    <input type="text" name="Options[{index}][text]" readonly="readonly" class="form-control form-control-sm" value="{text}" />
                </td>
                <td>
                    <div class="btn-group">

                    <button class="btn editbtn btn-sm btn-warning">Edit</button>
                    <button class="btn delbtn btn-sm btn-danger">Delete</button>
                        </div>
                </td>
            </tr>
        `;
    })


    function isNullorDefault(str)
    {
        if(str==null||str==undefined||str=="")
        return true;
        else
        return false;
    }


</script>
@endsection
