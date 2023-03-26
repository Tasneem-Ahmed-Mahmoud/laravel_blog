@extends('admin.tamplet.master')

@section('page-title','tags')

@section('content')


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $tag->id ? 'Edit ' .$tag->title:'Create tag'}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ $tag->id? route('admin.tags.update',$tag->id)  :route('admin.tags.store')}}" method="post"> 
                @csrf
                @if( $tag->id)
                @method('put')
                @endif
                <div class="card-body">
                   


                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input  value="{{old('title')?old('title'): $tag->title}}"  name="title" type="text" class="form-control   @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input   value="{{old('slug')?old('slug'):$tag->slug}}"  name="slug"type="text" class="form-control  @error('slug') is-invalid @enderror" id="exampleInputPassword1" placeholder="">
                    @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputdescriptio">Description</label>
                   
                 <textarea    name="description"type="text" class="form-control  @error('description') is-invalid @enderror" id="exampleInputdescriptio" placeholder=""> {{old('description')?old('description'):$tag->description}}</textarea>
                 @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputkeyword">Keywords</label>
                    <input  value="{{old('keywords')?old('keywords'):$tag->keywords}}"  name="keywords"type="text" class="form-control  @error('keywords') is-invalid @enderror" id="exampleInputkeyword" placeholder="">
                    @error('keywords')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ $tag->id ? 'Update' :'Create '}}</button>
                </div>
              </form>
            </div>

            @endsection('content')
