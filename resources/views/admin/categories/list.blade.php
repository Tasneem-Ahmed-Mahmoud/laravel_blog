@extends('admin.tamplet.master')

@section('page-title','categories')

@section('content')

<div class="card">

              <!-- /.card-header -->

              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Categories</h5>
                <div class="float-right">
                    <a href="{{route('admin.categories.create')}}"><i class="fa-solid fa-plus text-info"></i></a>
                </div>
              </div>
              <div class="card-body">
                <h6 class="card-title">'
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
                      <th>Title</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $key => $category)
                    <tr >

                    <td>{{$loop->iteration}}</td>
                      <td>{{$category->title}}</td>
                      <td class="d-flex">
                        <a href="{{route('admin.categories.edit',$category->id)}}"><i class="fa-solid fa-edit" ></i></a>

                        <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                           @method('delete')
                            @csrf
                           <a class="px-5 delete-btn" href="javascript:;"><i  class="fa-solid fa-trash text-danger" ></i></a>
                        </form>

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
            {{ $categories->render('admin.components.pagination')}}


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
