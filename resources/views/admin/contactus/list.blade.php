@extends('admin.tamplet.master')

@section('contactus-title','contuctus')

@section('content')

<div class="card">

              <!-- /.card-header -->

              <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">contuctus</h5>
                
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Read</th>
                      <th>View</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($contactus as $key => $contact)
                    <tr >

                    <td>{{$loop->iteration}}</td>
                      <td>{{$contact->name}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->read}}</td>
                      <td> <a  class="load-message" href="javascript:;" data-id="{{$contact->id}}"  data-bs-toggle="modal" data-bs-target="#messageModal"><i  class="fa-solid fa-eye" style="color:hotpink" ></i>&nbsp; View</a></td>
                     
                      <td class="d-flex">
        
                      <form action="{{route('admin.contactus.destroy',$contact->id)}}" method="post">
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





              <!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Message Content</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body   message-area">
        loading
      </div>
      <div class="modal-footer">

        <a href="#" class="btn btn-info toggle-url"></a>
        <form action="#" class="delete-ur">
        @method('delete')
        @csrf
        <button  type="submit" class="btn btn-primary l">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

              <!-- /.card-body -->
            {{ $contactus->render('admin.components.pagination')}}


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

         $('.load-message').click(function($event){
            $id = $(this).data('id');
            $('#messageModal .message-area').text('Loading');
            $.ajax({
                url: '/admin/contactus/'+$id,
                type: 'GET',
                data: { '_token': '{{ csrf_token() }}'},
                dataType: 'json',
                success: function( data ) {
                    console.log(data)
                    $('#messageModal .message-area').text(data.message);
                    $('#messageModal .toggle-url').attr('href',data.toggle_read);
                    $('#messageModal .delete-url').attr('action',data.delete_url);
                    if(data.message_status === "Read") {
                        $('#messageModal .toggle-url').text('Unread');
                    }else {
                        $('#messageModal .toggle-url').text('Read');
                    }
                }
            })
        });







    })
</script>
@endsection('extra-scripts')
