<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="title" class="mb-2">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{old('title') ?? $event->title}}">
                            @error('title')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="slug" class="mb-2">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug') ?? $event->slug}}">
                            @error('slug')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="address" class="mb-2">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" name="address" value="{{old('address') ?? $event->address}}">
                            @error('address')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="" name="description">{{old('description') ?? $event->description}}</textarea>
                            @error('description')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">

        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <h4 class="card-title">Event Category</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <select name="event_category_id" class="form-control @error('event_category_id') is-invalid @enderror">
                            <option value="" class="disabled">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($event->event_category_id === $category->id) ? ' selected' : ''}}> {{$category->title}} </option>
                            @endforeach
                        </select>
                        @error('event_category_id')
                        <span class="text-sm invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">

                <div class="card-header">
                    <h3 class="card-title">Date and Time</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" value="{{old('date') ?? $event->date}}" placeholder="Y-m-d" name="date">
                                @error('date')
                                <span class="text-sm invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control @error('time') is-invalid @enderror" id="time" value="{{old('time') ?? $event->time}}" placeholder="H:i" name="time">
                                @error('time')
                                <span class="text-sm invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <h3 class="card-title">Publish At</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control @error('published_at') is-invalid @enderror" id="published_at" value="{{old('published_at') ?? $event->published_at}}" placeholder="Y-m-d" name="published_at">
                        @error('published_at')
                        <span class="text-sm invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button class="btn btn-primary" type="submit">{{ $event->exists ? 'Update Event' : 'Create Event'}}</button>
                        <a href="{{route('admin.events.index')}}" class="btn btn-light-primary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content ">
                <div class="card-header">
                    <h4 class="card-title">Image</h4>
                </div>
                <div class="card-body">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail fixed" style="width: 320px; height: 190px;">
                            @if($event->image_url)
                            <img src="{{$event->image_url}}" alt="...">
                            @else
                            <img src="http://placehold.it/320x190&text=Feature+Image" alt="...">
                            @endif
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail fixed" style="max-width: 320px; max-height: 190px;"></div>
                        <div class="mt-2">
                            <span class="btn btn-outline-secondary btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image" class="@error('image') is-invalid @enderror">
                                @error('image')
                                <span class="text-sm invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </span>
                            <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
