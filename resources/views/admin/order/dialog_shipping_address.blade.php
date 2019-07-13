{{-- @include('generic/order_function') --}}
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="ShippingInfo">{{ trans('labels.ShippingInfo') }}</h4>
        </div>

        {!! Form::open(array('url' =>'admin/updateOrder', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DeliveryName') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('delivery_name', 
                        empty($result['order']->delivery_name) ? '' : print_value($result['operation'],$result['order']->delivery_name),
                        array('class'=>'form-control datepicker','id'=>'delivery_name')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('delivery_street_address', 
                        empty($result['order']->delivery_street_address) ? '' : print_value($result['operation'],$result['order']->delivery_street_address),
                        array('class'=>'form-control datepicker','id'=>'delivery_street_address')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ShippingMethod') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('shipping_method', 
                        empty($result['order']->customer_company) ? '' : print_value($result['operation'],$result['order']->shipping_method),
                        array('class'=>'form-control datepicker','id'=>'shipping_method')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ShippingCost') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('shipping_cost', 
                        empty($result['order']->customer_telephone) ? '' : print_value($result['operation'],$result['order']->shipping_cost),
                        array('class'=>'form-control datepicker','id'=>'shipping_cost')) !!}
                    </div>
                </div>
               
            </div>
            @include('layouts/dialog_submit_back_button')
        {!! Form::close() !!}
    </div>
</div>