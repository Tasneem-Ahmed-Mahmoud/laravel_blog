@extends('admin.tamplet.master')

@section('page-title','admins')

@section('content')

<div class="card">

              <!-- /.card-header -->

              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">admins</h5>
                <div class="float-right">
                    <a href="{{route('admin.admins.create')}}"><i class="fa-solid fa-plus text-info"></i></a>
                </div>
              </div>
              <div class="card-body">
                <h6 class="card-title">
                </h6>

         @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
               <p>{{session('success')}}</p>
                </div>
                @endif


                <p class="card-text">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Approved</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($admins as $key => $admin)
                    <tr >

                    <td>{{$loop->iteration}}</td>
                      <td>{{$admin->name}}</td>
                      <td>{{$admin->email}}</td>
                      <td>{{$admin->approved}}</td>
                      <td class="d-flex">
                        <a href="{{route('admin.admins.edit',$admin->id)}}"><i class="fa-solid fa-edit" ></i></a>

                        <form action="{{route('admin.admins.destroy',$admin->id)}}" method="post">
                           @method('delete')
                            @csrf
                           <a class="px-5 delete-btn" href="javascript:;"><i  class="fa-solid fa-trash text-danger" ></i></a>
                        </form>

                        <div class="float-left">

                            <a href="{{ $admin->approved == 'Approved' ? route('admin.admins.reject',$admin->id) : route('admin.admins.approve',$admin->id) }}"><i class="fas fa-edit"></i>&nbsp;{{ $admin->approved == 'Approved' ? 'Reject' : 'Approve' }}</a>
                        </div>

                    </td>

                    </tr>

                   @endforeach
                  </tbody>
                </table>
                </p>
                </div>
            </div>
              </div>
              <!-- /.card-body -->
            {{ $admins->render('admin.components.pagination')}}


@endsection('content')
@section('extra-scripts')

<script>







    jQuery(function($){

         $('.delete-btn').click(function(e){
         e.preventDefault();
        //
         Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

        $(this).parent().submit();

  }
})

//




         })
    })
</script>
@endsection('extra-scripts')
