@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  @include('layouts/list_header')
  <section class="content">
    @include('layouts/responseMessage')
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.ListingCustomerAddresses') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addressDialog">{{ trans('labels.AddAddress') }}</button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.BasicInfo') }}</th>
                      <th>{{ trans('labels.AddressInfo') }}</th>
                      <th>{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody class="contentAttribute">                   
                    @if (count($result['customer_address']) > 0)
                      @foreach($result['customer_address'] as $customer_address)
                        <tr>
                            <td>{{ $customer_address->id }}</td>
                            <td>
                                <strong>{{ trans('labels.Company') }}:</strong> {{ $customer_address->company }}<br>
                                <strong>{{ trans('labels.FirstName') }}:</strong> {{ $customer_address->firstname }}<br>
                                <strong>{{ trans('labels.LastName') }}:</strong> {{ $customer_address->lastname }}
                            </td>
                            <td>
                                <strong>{{ trans('labels.Zone') }}:</strong> {{ $customer_address->zone_id }}<br>
                            </td>
                            <td>
                                <a class="badge bg-light-blue editAddressModal" customer_id = '{{$result['customer_id']}}' address_book_id = "{{$customer_address->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                    
                                {{-- <a customers_id = '{{ $result['customers_id'] }}' id = "{{ $customer_address->id }}" class="badge bg-red deleteAddressModal"><i class="fa fa-trash " aria-hidden="true"></i></a></td> --}}
                        </tr> 
                      @endforeach
                    @else
                      <tr>
                          <td colspan="5">{{ trans('labels.NoRecordFound') }}</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
                 </div>
              </div>
              <div class="box-footer text-center">
                <a href="{{ URL::to('admin/customers')}}" class="btn btn-primary">{{ trans('labels.SaveComplete') }}</a>
            </div>
          </div>
          @include('admin/customer/addressDialog.blade')
          <!-- editAddressModal -->
          <div id="editAddressModal"></div>
          {{-- <div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content editContent">             
              </div>
            </div>
          </div> --}}
          <!-- deleteAddressModal -->
          {{-- <div class="modal fade" id="deleteAddressModal" tabindex="-1" role="dialog" aria-labelledby="deleteAddressModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="deleteAddressModalLabel">{{ trans('labels.DeleteAddress') }}</h4>
                    </div>
                    {!! Form::open(array('url' =>'admin/deleteAddress', 'name'=>'deleteAddress', 'id'=>'deleteAddress', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                            {!! Form::text('customer_id',  '', array('class'=>'form-control', 'id'=>'customer_id')) !!}
                            {!! Form::text('id',  '', array('class'=>'form-control', 'id'=>'id')) !!}
                    <div class="modal-body">
                      <p>{{ trans('labels.DeleteAddressText') }}</p>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                      <button type="button" class="btn btn-primary" id="deleteAddressBtn">{{ trans('labels.Delete') }}</button>
                    </div>
                    @include('layouts/submit_back_button')
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          @include('admin/customer/deleteAddressDialog.blade')
        </div>
      </div>
    </div>
  </section>
</div>
@endsection