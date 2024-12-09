
@extends('admin.layout.master')

@section('content')
<div class="app-content-header"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Products ({{$products->total()}})</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Products
                    </li>
                </ol>
            </div>
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div> <!--end::App Content Header--> <!--begin::App Content-->
<div class="app-content"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="class-header">
                        
                        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add Product</a>
                        
                            @if(session()->has('message')) <p class="flashMessage  border border-1 border-success text-bg-success"> {{session()->get('message')}}</p> @endif
                    </div>
                 <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Favourite</th>
                                    <th style="width: 15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $products as $product )
                                <tr class="align-middle">
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{ asset("images/".$product->image)}}" width="100px" alt=""></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{number_format($product->price)}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>{{$product->is_favourite}}</td>
                                    <td>
                                        <a href="{{route('admin.product.edit',encrypt($product->id))}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('admin.product.delete',encrypt($product->id))}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{$products->links()}}
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div> <!--end::Row-->
    </div> <!--end::Container-->
</div>
@endsection

