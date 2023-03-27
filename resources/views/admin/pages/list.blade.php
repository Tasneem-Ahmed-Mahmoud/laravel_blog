@extends('admin.tamplet.master')

@section('page-title','pages')

@section('content')

<div class="card">

              <!-- /.card-header -->

              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">pages</h5>
                <div class="float-right">
                    <a href="{{route('admin.pages.create')}}"><i class="fa-solid fa-plus text-info"></i></a>
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
                    @foreach($pages as $key => $page)
                    <tr >

                    <td>{{$loop->iteration}}</td>
                      <td>{{$page->title}}</td>
                      <td class="d-flex">
                        <a href="{{route('admin.pages.edit',$page->id)}}"><i class="fa-solid fa-edit" ></i></a>

                        <form action="{{route('admin.pages.destroy',$page->id)}}" method="post">
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
            {{ $pages->render('admin.components.pagination')}}


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
