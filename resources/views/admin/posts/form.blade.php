@extends('admin.tamplet.master')

@section('page-title','posts')

@section('content')


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Edit Post </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                @method('put')

                <div class="card-body">



                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input  value="{{old('title')?old('title'): $post->title}}"  name="title" type="text" class="form-control   @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="exampleInputdescriptio">Description</label>

                 <textarea    name="description"type="text" class="form-control  @error('description') is-invalid @enderror" id="exampleInputdescriptio" placeholder=""> {{old('description')?old('description'):$post->description}}</textarea>
                 @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="exampleInputdescriptio">Content</label>

                 <textarea    name="content"type="text" class="form-control  @error('content') is-invalid @enderror" id="exampleInputdescriptio" placeholder=""> {{old('content')?old('content'):$post->content}}</textarea>
                 @error('content')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>




                <div class="form-group">
                  <label>Categories</label>
                  <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;"  name="categories[]">
                 @foreach($categories as $id => $category)
                    <option value="{{$id}}"  @if(in_array($id,$selected_categories)) selected @endif >{{$category}}</option>
                    @endforeach
                  </select>

                  @error('category')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>



                  <div class="form-group">
                    <label for="exampleInputkeyword">Keywords</label>
                    <input  value="{{old('keywords')?old('keywords'):$post->keywords}}"  name="keywords"type="text" class="form-control  @error('keywords') is-invalid @enderror" id="exampleInputkeyword" placeholder="">
                    @error('keywords')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                <label for="approved">Image</label>
                @if($post->image)
                <div class="p-3">
               <a src="{{\Storage::disk('posts')->url($post->image)}}" target="_blank" > <img src="{{\Storage::disk('posts')->url($post->image)}}" alt="" srcset="" height="150px" width="150px"></a>

                </div>
                @endif
                <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile"  name="image">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                    <label for="approved">Approved</label>
                    <input  id="approved" type="checkbox"   checked data-bootstrap-switch    name="approved"     >
                    @error('approved')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                          </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>




              
            </div>

            @endsection('content')

@section('extra-scripts')
<script>

    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

   
})
</script>
@endsection('extra-scripts')
