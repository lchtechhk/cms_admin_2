@extends('admin.layout') @section('content')
<div class="content-wrapper">
    @include('layouts/add_header')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info"><br>
                                @include('layouts/responseMessage')
                                <div class="box-body">
                                    @if ($result['operation'] == 'listing' || $result['operation'] == 'add' || $result['operation'] == 'view_add' )
                                        {!! Form::open(array('url' =>'admin/viewManufacturer', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        {!! Form::open(array('url' =>'admin/viewManufacturer', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @endif
                                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ManufacturerId') }}
                                            <span style="color:red">★</span>
                                        </label>
                                        <div class="col-sm-10 col-md-4">
                                            {!! Form::text('manufacturer_id', empty($result['manufacturer']->manufacturer_id) ? '' :
                                            print_value($result['operation'],$result['manufacturer']->manufacturer_id),
                                            array('class'=>'form-control', 'id'=>'manufacturer_id','readonly')) !!}
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        @foreach($result['languages'] as $language)
                                            {{$language_id = $language->languages_id}}
                                            {{$language_name = $language->name}}
                                            <label for="name" class="col-sm-2 col-md-3 control-label">
                                                {{ trans('labels.Name') }}
                                                ({{ $language_name}})
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text("language_array[".$language_id."]", empty($result['manufacturer']['language_array'][$language_id]->name) ? '' :
                                                print_value($result['operation'],$result['manufacturer']['language_array'][$language_id]->name), array('class'=>'form-control
                                                field-validate', 'id'=>'name')) !!}
                                                <span class="help-block"
                                                style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.manufacturerName') }}({{ $language_name}})</span>
                                                <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    @include('layouts/submit_back_button')
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection