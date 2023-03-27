@extends('admin.tamplet.master')

@section('page-title','users')

@section('content')


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $user->id ? 'Edit ' .$user->title:'Create user'}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ $user->id? route('admin.users.update',$user->id)  :route('admin.users.store')}}" method="post"> 
                @csrf
                @if( $user->id)
                @method('put')
                @endif
                <div class="card-body">
                   


                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input  value="{{old('name')?old('name'): $user->name}}"  name="name" type="text" class="form-control   @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input   value="{{old('email')?old('email'):$user->email}}"  name="email"type="text" class="form-control  @error('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputkeyword"> Password</label>
                    <input  type="passowrd" value="{{old('password')?old('password'):$user->password}}"  name="password"class="form-control  @error('password') is-invalid @enderror" id="exampleInputkeyword" placeholder="">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                  
                  <div class="form-group">
                    <label for="exampleInputkeyword">Confirm Password</label>
                    <input  type="passowrd" value="{{old('confirm_password')?old('confirm_password'):$user->confirm_password}}"  name="confirm_password"class="form-control  @error('confirm_password') is-invalid @enderror" id="exampleInputkeyword" placeholder="">
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
                  <button type="submit" class="btn btn-primary   ">{{ $user->id ? 'Update' :'Create '}}</button>
                </div>
              </form>
            </div>

            @endsection('content')
