@if(session('success'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="alert alert-light-success color-success mt-4">
    {{session('success')}}
</div>

@elseif(session('trash-message'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="alert alert-light-warning color-danger mt-4">

    <?php list($message, $postId) = session('trash-message')  ?>
    <div class="d-flex justify-content-between text-center">
        {{$message}}

        <form action="{{route('posts.restore',$postId)}}" method="POST">
            @csrf

            @method('PATCH')

            <button type="submit" class="btn btn-sm btn-warning"> <i class="bi bi-arrow-counterclockwise"></i> Undo</button>
        </form>

    </div>
</div>

@elseif(session('error-message'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="alert alert-light-danger color-danger mt-4">
    {{session('error-message')}}
</div>
@endif
