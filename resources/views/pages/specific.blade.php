@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{$info->getOriginal('url')}}</div>
<div class="card-body col">
        <form method="post" action="{{$info->getOriginal('url')}}/create" class="d-flex flex-column">
        
        @csrf
        <input type="hidden" name="id" value="{{$info->getOriginal('id')}}">
        <input type="text" name="title" placeholder="Post titel" required/>
        <textarea name="description" cols="30" required rows="10"></textarea>
        <input type="submit" class="btn btn-primary" value="verstuur post!"/>
        </form>
        </div>
    </div>
    <div class="d-flex flex-column center">
     @foreach($comments as $comment)
     <div class="card mx-auto mt-2 mb-2 w-50 h-30">
            <div class="card-header">
                <button class="pull-left"></button>
                <a class="pull-right">{{$comment->title}}</a>
                <button class="btn float-right"><i class="fas fa-times"></i></button>
            </div>
            <div class="card-body">
                {{--<img src="{{$comment->}}" alt="" class="rounded-circle">--}}
                <a href="">{{$comment->description}}</a>
            </div>
        </div>
     @endforeach   
     </div>    
    </div>
</div>
@endsection
