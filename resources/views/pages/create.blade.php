@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form method="POST">
            @csrf

                <div class="card-header">Settings</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Title" name="title" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                 
                    <div class="input-group mb-3"> 
                        <textarea  id="editor" placeholder="Description" name="description" aria-label="With textarea"></textarea>
                    </div>
                    <div class="input-group mb-1"> 
                        <input type="submit" class="form-control" placeholder="send" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
