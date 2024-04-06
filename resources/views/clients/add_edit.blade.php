@extends('layouts.main')
@section('content')
    <!--begin::Container-->
    <div class=" container ">
        @if ($action == 'add')
            <?php 
            $title =  env('CREATE_NEW');
            $item_name = old('name');
            $item_last_name = old('last_name');
            $item_client_type_id = old('client_type_id');
            $item_client_district_id = old('client_district_id');
            $item_client_city_id = old('client_city_id');
            $item_client_gender_id = old('client_gender_id');
            $item_client_invalid_id = old('client_invalid_id');
            $item_client_conclusion_id = old('client_conclusion_id');
            $item_client_financial_status_id = old('client_financial_id');
            $item_client_current_status_id = old('client_current_id');
            $item_donor_id = old('donor_id');
            $item_date_birth = old('date_birth');
            $item_date_take = old('date_take');
            $item_date_stop = old('date_stop');
            $item_stop_reason = old('stop_reason');
            $item_social_score = old('social_score');
            $item_personal_id = old('personal_id');
            $item_physical_address = old('physical_address');
            $item_contact_person = old('contact_person');
            $item_phone = old('phone');
            $item_diagnosis = old('diagnosis');
            $item_comment = old('comment');
            $form_action = '/'.env('ADMIN_URL').'/clients';
            ?>
        @else
            <?php 
            $title = 'Edit';
            $item_name = $item->name;
            $item_last_name = $item->last_name;
            $item_client_type_id = $item->client_type_id;
            $item_client_district_id = $item->client_district_id;
            $item_client_city_id = $item->client_city_id;
            $item_client_gender_id = $item->client_gender_id;
            $item_client_invalid_id = $item->client_invalid_id;
            $item_client_conclusion_id = $item->client_conclusion_id;
            $item_client_financial_status_id = $item->client_financial_status_id;
            $item_client_current_status_id = $item->client_current_status_id;
            $item_donor_id = $item->donor_id;
            $item_date_birth = $item->date_birth;
            $item_date_take = $item->date_take;
            $item_date_stop = $item->date_stop;
            $item_stop_reason = $item->stop_reason;
            $item_social_score = $item->social_score;
            $item_personal_id = $item->personal_id;
            $item_physical_address = $item->physical_address;
            $item_contact_person = $item->contact_person;
            $item_phone = $item->phone;
            $item_diagnosis = $item->diagnosis;
            $item_comment = $item->comment;
            $form_action = '/'.env('ADMIN_URL').'/clients/'.$item->id;
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
                    <div class="row">
                        <div class="form-group col-3">
                            <label>Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Name" value="{{ $item_name }}"></input>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" placeholder="Last Name" value="{{ $item_last_name }}"></input>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client Type</label>
                            <select class="form-control"  name="client_type_id" >
                                <option value="0">Select Client Type</option>
                                @foreach($client_types as $client_type)
                                    <option {{ $client_type->id == $item_client_type_id ? 'selected' : '' }} value="{{ $client_type->id }}" >{{$client_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client City</label>
                            <select class="form-control"  name="client_city_id" >
                                <option value="0">Select</option>
                                @foreach($client_cities as $client_city)
                                    <option {{ $client_city->id == $item_client_city_id ? 'selected' : '' }} value="{{ $client_city->id }}" >{{$client_city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('client_city'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('client_city') }}</strong>
                            </div>
                        @endif
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client District</label>
                            <select class="form-control"  name="client_district_id" >
                                <option value="0">Select</option>
                                @foreach($client_districts as $client_district)
                                    <option {{ $client_district->id == $item_client_district_id ? 'selected' : '' }} value="{{ $client_district->id }}" >{{$client_district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('client_district'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('client_district') }}</strong>
                            </div>
                        @endif
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client Gender</label>
                            <select class="form-control" name="client_gender_id" >
                                <option value="0">Select</option>
                                @foreach($client_genders as $client_gender)
                                    <option {{ $client_gender->id == $item_client_gender_id ? 'selected' : '' }} value="{{ $client_gender->id }}" >{{$client_gender->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('client_gender'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('client_gender') }}</strong>
                            </div>
                        @endif
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client Invalid</label>
                            <select class="form-control"  name="client_invalid_id" >
                                <option value="0">Select</option>
                                @foreach($client_invalids as $client_invalid)
                                    <option {{ $client_invalid->id == $item_client_invalid_id ? 'selected' : '' }} value="{{ $client_invalid->id }}" >{{$client_invalid->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('client_invalid'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('client_invalid') }}</strong>
                            </div>
                        @endif
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client Conclusion</label>
                            <select class="form-control"  name="client_conclusion_id" >
                                <option value="0">Select</option>
                                @foreach($client_conclusions as $client_conclusion)
                                    <option {{ $client_conclusion->id == $item_client_conclusion_id ? 'selected' : '' }} value="{{ $client_conclusion->id }}" >{{$client_conclusion->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('client_conclusion'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('client_conclusion') }}</strong>
                            </div>
                        @endif
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client Financial Status</label>
                            <select class="form-control"  name="client_financial_status_id" >
                                <option value="0">Select</option>
                                @foreach($client_financial_statuses as $client_financial_status)
                                    <option {{ $client_financial_status->id == $item_client_financial_status_id ? 'selected' : '' }} value="{{ $client_financial_status->id }}" >{{$client_financial_status ->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('client_financial_status'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('client_financial_status') }}</strong>
                            </div>
                        @endif
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client Current Status</label>
                            <select class="form-control"  name="client_current_status_id" >
                                <option value="0">Select</option>
                                @foreach($client_current_statuses as $client_current_status)
                                    <option {{ $client_current_status->id == $item_client_current_status_id ? 'selected' : '' }} value="{{ $client_current_status->id }}" >{{$client_current_status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('client_current_status'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('client_current_status') }}</strong>
                            </div>
                        @endif
    
                        <div class="form-group col-3">
                            <label for="kt_select2_1">Client Donor</label>
                            <select class="form-control"  name="donor_id" >
                                <option value="0">Select Donor</option>
                                @foreach($donors as $donor)
                                    <option {{ $donor->id == $item_donor_id ? 'selected' : '' }} value="{{ $donor->id }}" >{{$donor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('donor_id'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('donor_id') }}</strong>
                            </div>
                        @endif
    
                        <div class="form-group col-3">
                            <label>Date Birth</label>
                            <input type="date" class="form-control {{ $errors->has('date_birth') ? 'is-invalid' : '' }}" name="date_birth" placeholder="Date Birth" value="{{ $item_date_birth }}"></input>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('date_birth') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Date Take</label>
                            <input type="text" class="form-control {{ $errors->has('date_take') ? 'is-invalid' : '' }}" name="date_take" placeholder="Date Take" value="{{ $item_date_take }}"></input>
                            @if($errors->has('date_take'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('date_take') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Date Stop</label>
                            <input type="text" class="form-control {{ $errors->has('date_stop') ? 'is-invalid' : '' }}" name="date_stop" placeholder="Date Stop" value="{{ $item_date_stop }}"></input>
                            @if($errors->has('date_stop'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('date_stop') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Stop Reason</label>
                            <input type="text" class="form-control {{ $errors->has('stop_reason') ? 'is-invalid' : '' }}" name="stop_reason" placeholder="Stop Reason" value="{{ $item_stop_reason }}"></input>
                            @if($errors->has('stop_reason'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('stop_reason') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Social Score</label>
                            <input type="text" class="form-control {{ $errors->has('social_score') ? 'is-invalid' : '' }}" name="social_score" placeholder="Social Score" value="{{ $item_social_score }}"></input>
                            @if($errors->has('social_score'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('social_score') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Personal ID</label>
                            <input type="text" class="form-control {{ $errors->has('personal_id') ? 'is-invalid' : '' }}" name="personal_id" placeholder="Personal ID" value="{{ $item_personal_id }}"></input>
                            @if($errors->has('personal_id'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('personal_id') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Physical Address</label>
                            <input type="text" class="form-control {{ $errors->has('physical_address') ? 'is-invalid' : '' }}" name="physical_address" placeholder="Physical Address" value="{{ $item_physical_address }}"></input>
                            @if($errors->has('physical_address'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('physical_address') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Contact Person</label>
                            <input type="text" class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" name="contact_person" placeholder="Contact Person" value="{{ $item_contact_person }}"></input>
                            @if($errors->has('contact_person'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('contact_person') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-3">
                            <label>Phone</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" placeholder="Phone" value="{{ $item_phone }}"></input>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Diagnosis</label>
                            <input type="text" class="form-control {{ $errors->has('diagnosis') ? 'is-invalid' : '' }}" name="diagnosis" placeholder="Diagnosis" value="{{ $item_diagnosis }}"></input>
                            @if($errors->has('diagnosis'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('diagnosis') }}</strong>
                                </div>
                            @endif
                        </div>
    
                        <div class="form-group col-3">
                            <label>Comment</label>
                            <input type="text" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" placeholder="Comment" value="{{ $item_comment }}"></input>
                            @if($errors->has('comment'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </div>
                            @endif
                        </div>
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