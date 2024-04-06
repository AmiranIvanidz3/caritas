@extends('layouts.main')
@section('content')
    <!--begin::Container-->
    <div class=" container ">
        @if ($action == 'add')
            <?php 
            $title =  env('CREATE_NEW');
            $item_name = old('name');
            $item_city_id = old('client_city_id');
            $form_action = '/'.env('ADMIN_URL').'/client-districts';
            ?>
        @else
            <?php 
            $title = 'Edit';
            $item_name = $item->name;
            $item_city_id = $item->client_city_id;
            $form_action = '/'.env('ADMIN_URL').'/client-districts/'.$item->id;
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
                        <label for="kt_select2_1">City</label>
                        <select class="form-control select2" id="kt_select2_1" name="client_city_id" >
                            <option value="0">Select City</option>
                            @foreach($cities as $city)
                                <option {{ $city->id == $item_city_id ? 'selected' : '' }} value="{{ $city->id }}" >{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>

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