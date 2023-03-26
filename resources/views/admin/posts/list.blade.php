@extends('admin.tamplet.master')

@section('page-title','posts')

@section('content')

<div class="card">

              <!-- /.card-header -->

              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Posts</h5>

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
                      <th>Category</th>
                      <th>Approved</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $key => $post)
                    <tr >

                    <td>{{$loop->iteration}}</td>
                      <td>{{$post->title}}</td>
                      <td>
                        @foreach($post->categories as $category)
                    {{ isset($category)? $category->title:'not found'}}<br>
@endforeach
                      </td>
                      <td>{{$post->approved?'approved':'rejected'}}</td>
                      <td class="d-flex">
                        <a href="{{route('admin.posts.edit',$post->id)}}"><i class="fa-solid fa-edit" ></i></a>

                        <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                           @method('delete')
                            @csrf
                           <a class="px-5 delete-btn" href="javascript:;"><i  class="fa-solid fa-trash text-danger" ></i></a>
                        </form>


                        <div class="float-left">

                            <a href="{{ $post->approved == '1' ? route('admin.posts.reject',$post->id) : route('admin.posts.approve',$post->id) }}"><i class="fas fa-edit"></i>&nbsp;{{ $post->approved == '1' ? 'Reject' : 'Approve' }}</a>
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
            {{ $posts->render('admin.components.pagination')}}


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
