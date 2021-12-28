<table class="table" id="">
    <thead>
        <tr>
            <th>Action</th>
            <th>Title</th>
            <th>Address</th>
            <th>Event Date</th>
            <th>Event Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>
                <a href="{{route('admin.events.edit',$event->id)}}" class="p-2 text-success"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="p-2 text-danger" onclick="event.preventDefault();confirm('Delete event?');document.getElementById('delete-form-{{$event->id}}').submit();">
                    <i class="bi bi-trash"></i>
                </a>
                <form id="delete-form-{{$event->id}}" action="{{route('admin.events.destroy',$event->id)}}" method="POST" class="d-none">
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
                {{$event->timeFormatted()}}
            </td>
            <td>
                {!! $event->eventStatus() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
