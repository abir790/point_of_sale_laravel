@extends('layout/main')
@section('main')
<div class="container-fluid">
    @if(session()->has('delete'))
    <div class="alert alert-danger" role="alert">
       {{session('delete')}}
</div>
    @endif
    @if(session('create'))
        <div class="alert alert-success" role="alert">
  {{ session('create') }}
</div>
    @endif
        @if(session()->has('update'))
    <div class="alert alert-primary" role="alert">
       {{session('update')}}
</div>
    @endif


    <div class="row clearfix">
        <div class="col-lg-6">
            <h1 class="h3 mb-4 text-gray-800">Users List</h1>
        </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-primary" href="{{url('users/create')}}"><i class="fa fa-plus"></i>Create User</a>

        </div>

        
    </div>
    
</div>
                <div class="container-fluid">

                    <!-- Page Heading -->
                                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Group_id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    	@foreach($user as $us)
                                        <tr> 
                                        	<td>{{$us->id}}</td>
                                            <td>{{$us->group->title}}</td>
                                            <td>{{$us->name}}</td>
                                            <td>{{$us->email}}</td>
                                            <td>{{$us->address}}</td>
                                            <td>{{$us->phone}}</td>

                                             <td>
                                        <form class="form-control" action="{{route('users.destroy',['delete'=>$us->id])}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="btn-primary" href="users/{{$us->id}}/edit">Edit</a>
                                                    <a class="btn-success" href="{{url('users/'.$us->id)}}">S</a>
                                                    <a class="btn-success" href="{{route('users.destroy',$us->id)}}">D</a>
                                                    <button class="btn btn-danger" style="position: ;"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



@endsection