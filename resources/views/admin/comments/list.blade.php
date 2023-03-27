@extends('admin.tamplet.master')

@section('page-title','comments')

@section('content')

<div class="card">

              <!-- /.card-header -->

              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">comments</h5>

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
                      <th>User</th>
                      <th>Post</th>
                      <th>View</th>

                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($comments as $key => $comment)
                    <tr >

                    <td>{{$loop->iteration}}</td>
                      <td>{{$comment->name}}</td>
                      <td>{{$comment->email}}</td>
                      <td>{{$comment->approved}}</td>
                      <td>{{ $comment->user?$comment->user->name:''}}</td>
                      <td>{{ $comment->post?$comment->post->title:''}}</td>
                      <td> <a  class="load-comment" href="javascript:;" data-id="{{$comment->id}}"  data-bs-toggle="modal" data-bs-target="#commentModal"><i  class="fa-solid fa-eye" style="color:hotpink" ></i>&nbsp; View</a></td>
                      <td class="d-flex">

                        <form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
                           @method('delete')
                            @csrf
                           <a class="px-5 delete-btn" href="javascript:;" ><i  class="fa-solid fa-trash text-danger" ></i></a>
                        </form>

                        <div class="float-left">

                            <a href="{{ $comment->approved == 'Approved' ? route('admin.comments.reject',$comment->id) : route('admin.comments.approve',$comment->id) }}"><i class="fas fa-edit"></i>&nbsp;{{ $comment->approved == 'Approved' ? 'Reject' : 'Approve' }}</a>
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


<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Comment Content</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body   comment-area">
        loading
      </div>
      <div class="modal-footer">

        <a href="#" class="btn btn-info reject-url">Reject</a>
        <a href="#" class="btn btn-primary approve-url">Approve</a>
      </div>
    </div>
  </div>
</div>

            {{ $comments->render('admin.components.pagination')}}


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
})
    // comment
   $('.load-comment').click(function(e){
$id=$(this).data('id');
$('#CommentModal .comment-area').text('Loading');
            $.ajax({
                url: '/admin/comments/'+$id,
                type: 'GET',
                data: { '_token': '{{ csrf_token() }}'},
                dataType: 'json',
                success: function( data ) {
                    $('#commentModal .comment-area').text(data.comment);
                    $('#commentModal .reject-url').attr('href',data.reject_url);
                    $('#commentModal .approve-url').attr('href',data.approve-url);
                }
            })
   }) ;



    })
</script>
@endsection('extra-scripts')
