@extends('layouts.admin.app')
@section('content')

<div class="mt-3">
    <div class="row">
        <div class="col-md-9 ">
            <h4>Recipes List</h4>
            @if(session()->has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route ('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Recipes List</li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recipes Data</h6>
                    <!-- <a href="" class="btn btn-primary">Add User</a> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                                   
                                    <th>Title</th>                                  
                                    <th>Description	</th>                        
                                    <th>Category</th> 
                                    <th>Time To Prepare</th> 
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                                 
                                    <th>Title</th>                                 
                                    <th>Description</th>                         
                                    <th>Category</th>
                                    <th>Time To Prepare</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($recipes as $key=>$recipe)                            
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $recipe->title }}</td>
                                        <td>{{ $recipe->description }}</td>
                                        <td>{{ $recipe->category}}</td>
                                        <td>{{ $recipe->time_to_prepare}} Mins</td>
                                        <td><img class="img-profile rounded-circle btn-circle" src="{{ asset($recipe->image) }}">
                                        </td>
                                        
                                        <td>                                            
                                            <div class="row pl-3">                                                    
                                                <div class = "col-md-2 col-6">
                                                    <form action="{{ route('admin.recipes.destroy', $recipe->id) }}" method = "POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type = "submit" name = "submit" value = "submit" data-toggle="tooltip" title="Delete User" onclick = "return confirm('Do You Really Want to Delete?')" class = "btn btn-sm btn-circle btn-outline-danger" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
                                                    </form>
                                                </div> 
                                            </div>                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Add New Recipe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <form action="{{ route('admin.recipes.store') }}" method="POST" enctype="multipart/form-data" >
                              @csrf  
                              <div class="form-group row">
                                 <label for="p_number" min="0" step="00" class="col-sm-3 col-form-label">
                                 Title</label
                                    >
                                 <div class="col-sm-9">
                                    <input
                                       type="text"
                                       class="form-control"
                                       name="title"
                                       required
                                       />
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="p_title" class="col-sm-3 col-form-label"
                                    >Description</label
                                    >
                                 <div class="col-sm-9">
                                    <textarea id="description" name="description" rows="5" class="w-100"></textarea>
                                 </div>
                                 
                              </div>
                              <div class="form-group row">
                                 <label for="p_title" class="col-sm-3 col-form-label"
                                    >Category</label
                                    >
                                 <div class="col-sm-9">
                                    <select name ="food_id" class="form-control" id="" required>
                                        <option value = "" >Select Option</option>
                                        @foreach($categories as $category)
                                           <option  value="{{ $category->id }}"> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="p_number" min="0" step="00" class="col-sm-3 col-form-label">
                                 Time To Prepare (In Mins)</label
                                    >
                                 <div class="col-sm-9">
                                    <input
                                       type="number"
                                       class="form-control"
                                       name="time_to_prepare"
                                       required
                                       />
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="p_title" class="col-sm-3 col-form-label"
                                    >Image</label
                                    >
                                 <div class="col-sm-9">
                                    <input
                                       type="file"
                                       class="form-control"
                                       name="image"
                                       required
                                       accept="image/*"
                                       />
                                 </div>
                              </div>
                              <div class="form-group row">
                                  <button type="submit" class="w-100 btn btn-primary">Add</button>
                              </div>
                              
                           </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div> 
</div> 
    
@endsection
<script>
    setTimeout(() => {
    $('.alert').alert('close');
  }, 2000);
</script>