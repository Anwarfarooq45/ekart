@extends('admin.layout.master')
@section('content')


<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add Product
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row g-4"> <!--begin::Col-->
                 <!--end::Col--> <!--begin::Col-->
                <div class="col-md-6"> <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Add Product</div>
                        </div> <!--end::Header--> 
                        <!--begin::Form-->
                        <form method="POST" action="{{route('admin.product.save')}}" enctype="multipart/form-data"> <!--begin::Body-->
                            @csrf
                            <div class="card-body">
                                <div class="mb-3"> 
                                    <label for="inputName" class="form-label">Name</label> 
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name">
                                </div>
                                <div class="mb-3"> 
                                    <label for="inputPrice" class="form-label">Price</label> 
                                    <input type="text" class="form-control" name="price" id="inputPrice" placeholder="Price"> 
                                </div>
                                <div class="mb-3"> 
                                    <label for="exampleInputPassword1" class="form-label">Category</label><br>
                                    <select class="form-control" name="category_id">
                                        <option value="">Select an option</option>
                                        @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                            
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <label for="inputGroupFile02" class="form-label">Image</label>
                                <div class="input-group mb-3"> 
                                     <input type="file" name="image" class="form-control" id="inputGroupFile02"> 
                                     <label class="input-group-text" name="image" for="inputGroupFile02">Upload</label> 
                                </div>
                                <div class="mb-3">
                                    <label for="inputStatus" class="form-label">Status</label><br>
                                    <input type="radio" name="status" id="inputStatus" value="1">Active
                                    <input type="radio" name="status" id="inputStatus" value="0">Inactive

                                </div>
                                <div class="mb-3">
                                    <label for="inputfavourite" class="form-label">Is Favourite</label><br>
                                    <input type="radio" name="is_favourite" id="inputStatus" value="1">Yes
                                    <input type="radio" name="is_favourite" id="inputStatus" value="0">No

                                </div>
                            </div> <!--end::Body--> <!--begin::Footer-->
                            <div class="card-footer"> <button type="submit" class="btn btn-primary">Save</button> </div> <!--end::Footer-->
                        </form> <!--end::Form-->
                    </div> <!--end::Quick Example-->
                      <!--begin::Col-->
                
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main--> <!--begin::Footer-->
    
@endsection

