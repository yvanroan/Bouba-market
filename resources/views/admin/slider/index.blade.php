@extends('admin.layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Slider Tables</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Category Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Slider Tables</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- this categories(its the one from the database) comes from CategoryController.php and it can be retrieved because this page is related to it using the index method. -->
                      @if(count($sliders)>0)
                        @foreach($sliders as $key=>$slider)
                          <tr>
                            <td><a href="#">{{$key+1}}</a></td>
                            <td><img src="{{Storage::url($slider->image)}}" width="500"></td>
                            <td>
                              <form method="POST" action="{{route('slider.destroy',[$slider->id])}}" onsubmit="return confirmDelete()"> @csrf
                                 <!-- confirmDelete is a method in footer.blade.php  -->
                                {{method_field('DELETE')}}
                                <!-- since we specified the method above, we have to use delete method in its route.
                                 If you dont want to do so, you can just remove it and use post instead of delete -->
                                <button class="btn btn-danger">Delete</button>

                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else 
                        <td>No slider created yet</td>
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