@extends('admin.tamplet.master')

@section('page-title','admins')

@section('content')


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $admin->id ? 'Edit ' .$admin->title:'Create admin'}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ $admin->id? route('admin.admins.update',$admin->id)  :route('admin.admins.store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                @if( $admin->id)
                @method('put')
                @endif
                <div class="card-body">
                   


                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input  value="{{old('name')?old('name'): $admin->name}}"  name="name" type="text" class="form-control   @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input   value="{{old('email')?old('email'):$admin->email}}"  name="email"type="text" class="form-control  @error('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputkeyword"> Password</label>
                    <input  type="passowrd" value="{{old('password')?old('password'):$admin->password}}"  name="password"class="form-control  @error('password') is-invalid @enderror" id="exampleInputkeyword" placeholder="">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                <label for="approved">Image</label>
                @if($admin->image)
                <div class="p-3">
               <a src="{{\Storage::disk('admins')->url($admin->image)}}" target="_blank" > <img src="{{\Storage::disk('admins')->url($admin->image)}}" alt="" srcset="" height="150px" width="150px"></a>

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
                    <label for="exampleInputkeyword">Confirm Password</label>
                    <input  type="passowrd" value="{{old('confirm_password')?old('confirm_password'):$admin->confirm_password}}"  name="confirm_password"class="form-control  @error('confirm_password') is-invalid @enderror" id="exampleInputkeyword" placeholder="">
                    @error('confirm_password')
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

                <div class="card-footer  ">
                  <button type="submit" class="btn btn-primary   ">{{ $admin->id ? 'Update' :'Create '}}</button>
                </div>
              </form>
            </div>

            @endsection('content')
