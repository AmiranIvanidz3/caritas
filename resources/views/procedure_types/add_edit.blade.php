@extends('layouts.main')
@section('content')
    <!--begin::Container-->
    <div class=" container ">
        @if ($action == 'add')
            <?php 
            $title =  env('CREATE_NEW');
            $item_name = old('name');
            $item_procedure_group_id = old('procedure_group_id');
            $form_action = '/'.env('ADMIN_URL').'/procedure_types';
            ?>
        @else
            <?php 
            $title = 'Edit';
            $item_name = $item->name;
            $item_procedure_group_id = $item->procedure_group_id;
            $form_action = '/'.env('ADMIN_URL').'/procedure_types/'.$item->id;
            ?>
        @endif
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    <a class="btn mr-5 go-back" onclick="history.back()"><i class='flaticon2-back'></i></a>
                    {{$title}} 
                </h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{$form_action}}">
                @if ($action == 'edit')
                    @method('PUT')
                @endif
                <div class="card-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item_name }}"></input>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="kt_select2_1">Procedure Group</label>
                        <select class="form-control select2" id="kt_select2_1" name="procedure_group_id" >
                            <option value="0">Select Group</option>
                            @foreach($procedure_groups as $procedure_group)
                                <option {{ $procedure_group->id == $item_procedure_group_id ? 'selected' : '' }} value="{{ $procedure_group->id }}" >{{$procedure_group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('procedure_group_id'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('procedure_group_id') }}</strong>
                        </div>
                    @endif

                 

                





                
                    
                <div class="card-footer">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    @csrf
                </div>
            </form>
            <!--end::Form-->

        </div>

    </div>
    <!--end::Container-->
@endsection