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
                <a href="{{route('posts.edit',$post->id)}}" class="p-2 text-success"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="p-2 text-danger" onclick="event.preventDefault();confirm('Move this post to trash?');document.getElementById('delete-form-{{$post->id}}').submit();">
                    <i class="bi bi-trash"></i>
                </a>
                <form id="delete-form-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" method="POST" class="d-none">
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
                {{$post->dateFormatted()}} | {!! $post->publicationStatus() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
