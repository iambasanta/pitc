@if(session('success'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="alert alert-light-success color-success mt-4">
    {{session('success')}}
</div>
@elseif(session('error-message'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="alert alert-light-danger color-danger mt-4">
    {{session('error-message')}}
</div>
@endif
