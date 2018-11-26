@extends('layouts.app')

@section('content')
<script>
function redirect(url)
{
    window.location='pages/'+url;
    // console.log("pages/"+url);
}
</script>
<div class="container">
        @foreach($pages as $page)
        <div class="card mx-auto mt-2 mb-2 w-100 h-25">
            <div class="card-header" onclick=redirect('{{$page['url']}}')>
               {{ $page['title']}}
            </div>
            <div class="card-body row">
                <div class="container col" >
                    <img class="img-responsive" src="http://dsi-vd.github.io/patternlab-vd/images/fpo_avatar.png" width="50px"  alt=""/>
                    <p>{{$page['owner']}}</p>
                </div>
                <div class="w-90 container-fluid col-md-11 col-sm-6">
                {{ $page['description']}}
                </div>
            </div>
        </div>
        @endforeach
            
    </div>
</div>

@endsection
