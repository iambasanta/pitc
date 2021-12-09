@if(session('success'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,3000)" x-show="show" class="alert alert-light-success color-success mt-4">
    {{session('success')}}
</div>
@endif
