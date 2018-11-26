@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
            <form method="POST">
            @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="card-header">Settings</div>
                <div class="card-body form-group">
                    <div class="mb-3 form-group">
                        <label for="InputDisplayName">Display name</label>
                        <input type="text" class="form-control" id="InputDisplayName" placeholder="{{$user->name}}" name="name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class=" mb-3 form-group">
                        <label for="InputEmail">Email address</label>
                        <input type="email" id="InputEmail" class="form-control" placeholder="{{$user->email}}" name="email" aria-label="Username"  disabled aria-describedby="basic-addon1">
                    </div>
                    <div class=" mb-3 form-group">
                        <label for="InputPassword">Password</label> 
                        <input type="password" id="InputPassword" class="form-control" placeholder="Password" name="password" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3 form-group"> 
                        <label for="InputCPassword">Confirm password</label>
                        <input type="password" id="InputCPassword" class="form-control" name="CPassword" placeholder="Confirm password" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="md-1 form-group"> 
                        <input type="submit" class="form-control btn btn-primary" placeholder="send" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
