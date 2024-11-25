@extends('admin.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

<div class="mdk-drawer-layout__content page">
    
                        <div class="container-fluid page__container">
                            <div class="page__heading d-flex align-items-center">
                                <div class="flex">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                            <li class="breadcrumb-item active"
                                                aria-current="page">Product-Management</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Product-Management</h1>
                                </div>
                               {{--  <a href="#"
                                   class="btn btn-success ml-3">Add Product</a> --}}
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                        <div class="row">
                            <div class="card card-form col-lg-12">
                                <div class="row no-gutters">
                                   -
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="save_form">
                                            <input type="hidden" name="id" id="id" value="{{@$product->id}}">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputEmail1">Product-Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="name" 
                                                           id="name" 
                                                           placeholder="Enter Name .."
                                                           value="{{@$product->name}}">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="brand">Brand</label>
                                                    <select id="brand"
                                                            
                                                            class="form-control" name="brand">
                                                        <option value="">Select option</option>
                                                        @if(!empty($brand))
                                                        @foreach($brand as $key=>$value)
                                                        <option value="{{$value->id}}"{{@$product->brand_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="tax">Tax</label>
                                                    <select id="tax"
                                                            
                                                            class="form-control" name="tax">
                                                        <option value="">Select option</option>
                                                        @if(!empty($tax))
                                                        @foreach($tax as $key=>$value)
                                                        <option value="{{$value->id}}" {{@$product->tax_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="cat">Category</label>
                                                    <select id="cat"
                                                            
                                                            class="form-control" name="cat" onchange="sub_cats()">
                                                        <option value="">Select option</option>
                                                        @if(!empty($cat))
                                                        @foreach($cat as $key=>$value)
                                                        <option value="{{$value->id}}" {{@$product->cat_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="sub_cat">Sub-Category</label>
                                                    <select id="sub_cat"
                                                            
                                                            class="form-control" name="sub_cat">
                                                        <option value="">Select option</option>
                                                        @if(!empty($sub_cat))
                                                        @foreach($sub_cat as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                @if(!empty($variant))
                                                @php
                                                $i = 1;
                                                @endphp
                                                @foreach($variant as $key=>$value)

                                                <div class="col-lg-12">
                                                    <h3>Variant {{$i}}</h3>
                                                </div>

                                                 <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Variant</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="variant[]" 
                                                           id="variant" 
                                                           placeholder="Enter variant .."
                                                           value="{{@$value->variant}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Quantity</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="qty[]" 
                                                           id="qty" 
                                                           placeholder="Enter qty .."
                                                           value="{{@$value->qty}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Mrp</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="mrp[]" 
                                                           id="mrp" 
                                                           placeholder="Enter mrp .."
                                                           value="{{@$value->mrp}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="price[]" 
                                                           id="price" 
                                                           placeholder="Enter price .."
                                                           value="{{@$value->price}}">
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Length</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="length[]" 
                                                           id="length" 
                                                           placeholder="Enter length .."
                                                           value="{{@$value->length}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Breath</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="breath[]" 
                                                           id="breath" 
                                                           placeholder="Enter breath .."
                                                           value="{{@$value->breath}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Height</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="height[]" 
                                                           id="height" 
                                                           placeholder="Enter height .."
                                                           value="{{@$value->height}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Weight</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="weight[]" 
                                                           id="weight" 
                                                           placeholder="Enter weight .."
                                                           value="{{@$value->weight}}">
                                                </div>
                                                @if(!empty($key))
                                                <div class="col-md-2 mt-4">
                                                <a href="javascript:void(0)"class="remove_field btn btn-danger btn-xs">-</a>
                                                </div>
                                                @else
                                                <div class="col-md-2 mt-4">
                                                <a href="javascript:void(0)"class="add_field_button btn btn-success btn-xs">+</a>
                                                </div>
                                                @endif
                                                @php
                                                $i++;
                                                @endphp
                                            
                                            @endforeach
                                            @else

                                             <div class="col-lg-12">
                                                    <h3>Variant 1</h3>
                                                </div>

                                                 <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Variant</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="variant[]" 
                                                           id="variant" 
                                                           placeholder="Enter variant .."
                                                           value="{{@$product->variant}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Quantity</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="qty[]" 
                                                           id="qty" 
                                                           placeholder="Enter qty .."
                                                           value="{{@$product->qty}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Mrp</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="mrp[]" 
                                                           id="mrp" 
                                                           placeholder="Enter mrp .."
                                                           value="{{@$product->mrp}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="price[]" 
                                                           id="price" 
                                                           placeholder="Enter price .."
                                                           value="{{@$product->price}}">
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Length</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="length[]" 
                                                           id="length" 
                                                           placeholder="Enter length .."
                                                           value="{{@$product->length}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Breath</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="breath[]" 
                                                           id="breath" 
                                                           placeholder="Enter breath .."
                                                           value="{{@$product->breath}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Height</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="height[]" 
                                                           id="height" 
                                                           placeholder="Enter height .."
                                                           value="{{@$product->height}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Weight</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="weight[]" 
                                                           id="weight" 
                                                           placeholder="Enter weight .."
                                                           value="{{@$product->weight}}">
                                                </div>

                                                <div class="col-md-2 mt-4">
                                                <a href="javascript:void(0)"class="add_field_button btn btn-success btn-xs">+</a>
                                            </div>
                                            @endif
                                            <div id="appendData"></div>


                                                {{-- <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Stock Warning</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="stock_warning" 
                                                           id="stock_warning" 
                                                           placeholder="Enter stock_warning .."
                                                           value="{{@$product->stock_warning}}">
                                                </div> --}}

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">IS Return Available</label>
                                                    <input type="checkbox"
                                                    {{@!empty($product->is_return)?'checked':''}}
                                                           value="1" 
                                                           name="return" 
                                                           id="return" 
                                                           placeholder="Enter Category ..">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Best Selling</label>
                                                    <input type="checkbox"
                                                    {{@!empty($product->best_selling)?'checked':''}}
                                                           value="1" 
                                                           name="best_selling" 
                                                           id="best_selling" 
                                                           placeholder="Enter Category ..">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">On Sale</label>
                                                    <input type="checkbox"
                                                    {{@!empty($product->sale)?'checked':''}}
                                                           value="1" 
                                                           name="sale" 
                                                           id="sale" 
                                                           placeholder="Enter Category ..">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Self Shipping</label>
                                                    <input type="checkbox"
                                                    {{@!empty($product->self_shipping)?'checked':''}}
                                                           value="1" 
                                                           name="self_shipping" 
                                                           id="self_shipping" 
                                                           placeholder="Enter Category ..">
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Coupon valid</label>
                                                    <input type="checkbox" checked 
                                                    {{@!empty($product->coupon_valid)?'checked':''}}
                                                           value="1" 
                                                           name="coupon_valid" 
                                                           id="coupon_valid" 
                                                           placeholder="Enter Category ..">
                                                </div>


                                                <div class="form-group col-lg-12 pb-4">
                                                    <label for="exampleInputEmail1">Product Description</label>
                                                    <div id="editor">
                                             {!!@$product->description!!}
                                            
                                        </div>
                                                    
                                                </div>
                                               
                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <label for="exampleInputEmail1">Featured Image</label><span style="color:red">1080 x 1080 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image"
                                                           id="file" 
                                                           accept=".jpg,.png,.jpeg">
                                                </div>

                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{!empty($product)?$product->image:asset('uploads/default/default-image.jpg')}}" id="image">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputEmail1">Other Image</label>
                                                    <span style="color:red">1080 x 1080 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="o_image[]"
                                                           id="o_file" 
                                                           accept=".jpg,.png,.jpeg" multiple>
                                                </div>

                                                <div class="form-group col-lg-6" >
                                                    <div class="row" id="addImages">
                                                        <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                    </div>

@endsection
@section('extern-js')


<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('admin_assets/custom_js/product.js')}}"></script>
<script type="text/javascript">
    @if(!empty($product))
    sub_cats({{$product->cat_id}});
    @endif
</script>

@endsection