<table class="table" id="">
    <thead>
        <tr>
            <th>Action</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>
                <a href="#" class="p-2 text-xl text-warning" onclick="event.preventDefault();document.getElementById('restore-form-{{$post->id}}').submit();">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
                <form id="restore-form-{{$post->id}}" action="{{route('posts.restore',$post->id)}}" method="POST" class="d-none">
                    @csrf

                    @method('PATCH')
                </form>

                <a href="#" class="p-2 text-danger" onclick="event.preventDefault();confirm('You are about to delete this post permanently. Are you sure ?');document.getElementById('delete-form-{{$post->id}}').submit();">
                    <i class="bi bi-trash"></i>
                </a>
                <form id="delete-form-{{$post->id}}" action="{{route('posts.force-destroy',$post->id)}}" method="POST" class="d-none">
                    @csrf

                    @method('DELETE')
                </form>
            </td>
            <td>
                {{$post->title}}
            </td>
            <td>{{$post->author}}</td>
            <td>{{$post->category->title}}</td>
            <td>
                {{$post->dateFormatted()}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
