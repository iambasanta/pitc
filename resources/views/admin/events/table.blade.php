<table class="table" id="">
    <thead>
        <tr>
            <th>Action</th>
            <th>Title</th>
            <th>Address</th>
            <th>Event Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>
                <a href="{{route('events.edit',$event->id)}}" class="p-2 text-success"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="p-2 text-danger" onclick="event.preventDefault();confirm('Move this post to trash?');document.getElementById('delete-form-{{$event->id}}').submit();">
                    <i class="bi bi-trash"></i>
                </a>
                <form id="delete-form-{{$event->id}}" action="{{route('events.destroy',$event->id)}}" method="POST" class="d-none">
                    @csrf

                    @method('DELETE')
                </form>
            </td>
            <td>
                {{$event->title}}
            </td>
            <td>
                {{$event->address}}
            </td>
            <td>
                {{$event->dateFormatted()}}
            </td>
            <td>
                {!! $event->eventStatus() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
