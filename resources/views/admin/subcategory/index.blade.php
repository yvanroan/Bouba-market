@extends('admin.layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subcategory Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Subcategory Tables</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Category Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Subcategory Tables</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Category's name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- this categories(its the one from the database) comes from CategoryController.php and it can be retrieved because this page is related to it using the index method. -->
                      @if(count($subcategories)>0)
                        @foreach($subcategories as $key=>$subcategory)
                          <tr>
                            <td><a href="#">{{$key+1}}</a></td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td><a href="{{route('subcategory.edit', [$subcategory->id])}}"><button class="btn btn-primary">Edit</button></a></td>
                            <td>
                              <form method="POST" action="{{route('subcategory.destroy',[$subcategory->id])}}" onsubmit="return confirmDelete()"> @csrf
                                <!-- confirmDelete is a method in footer.blade.php -->
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger">Delete</button>

                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else 
                        <td>No subcategory created yet</td>
                      @endif
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
@endsection