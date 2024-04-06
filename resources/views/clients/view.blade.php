@extends('layouts.main')

@section('styles')
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--begin::Card-->
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                @can('parameter:add')
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ url(adminUrl('clients/create')) }}" class="btn btn-primary font-weight-bolder">
                            <i class='flaticon-add'></i> {{\App\Models\Parameter::getValue('create_new')}}
                        </a>
                        <!--end::Button-->
                    </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="row">
                    
                </div>
               <!--begin: Datatable-->
               <table class="table table-bordered table-hover table-checkable" id="datatable"></table>
                <!--end: Datatable-->
            </div>
       </div>
    </div>
    <!--end::Container-->
        <!--end::Card-->
@endsection
@section('js_scripts')

<script>


    DataTableHelper.initDatatable('#datatable', [0, 'desc'], 'POST', '{{ adminUrl('clients/list') }}', [
            {
                title: 'ID',
                data: 'id',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            }, 
            {
                title: 'Name',
                data: 'name',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Type',
                data: 'client_type',
                render: function(data, type, row)
                {
                    console.log(row)

                    return data ? data : "";
                    
                }
            },
            {
                title: 'City',
                data: 'client_city',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'District',
                data: 'client_district',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Gender',
                data: 'client_gender',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Invalid',
                data: 'client_invalid',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Conclusion',
                data: 'client_conclusion',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Financial Status',
                data: 'client_financial_status',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Current Status',
                data: 'client_current_status',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Donor',
                data: 'donor',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Date Birth',
                data: 'date_birth',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Date Take',
                data: 'date_take',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Date Stop',
                data: 'date_stop',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Stop Reason',
                data: 'stop_reason',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Social Score',
                data: 'social_score',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Personal ID',
                data: 'personal_id',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Physical Address',
                data: 'physical_address',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Contact Person',
                data: 'contact_person',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Phone',
                data: 'phone',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Diagnosis',
                data: 'diagnosis',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Comment',
                data: 'comment',
                render: function(data, type, row)
                {

                    return data ? data : "";
                    
                }
            },
            {
                title: 'Edit',
                data: 'id',
                sWidth:'1px',
                orderable: false,
                render: function(data, type, row)
                {
                    let  html = '<a href="{{ adminUrl('clients') }}/'+ data +'/edit" class="btn btn-sm btn-clean btn-icon" title="Edit"><i class="la la-edit"></i></a>';
                    return data ? html : "";
                }
            },
            {
                title: 'Del',
                data: 'id',
                sWidth:'1px',
                orderable: false,
                render: function(data, type, row)
                {
                    let  html = '<button onclick="DataTableHelper.deleteRecord(\'{{ adminUrl('clients') }}/'+ data +'\')" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-remove"></i></button>';
                    return data ? html : "";
                }
            },
        ],
        false,
        [{width:20, searchable: false, targets: [0]}]);





    
</script>
@endsection
