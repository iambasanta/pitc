<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 form-group">
                            <label for="title" class="mb-2">Title  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{old('title') ?? $event->title}}">
                            @error('title')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-2 form-group">
                            <label for="slug" class="mb-2">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug') ?? $event->slug}}">
                            @error('slug')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-2 form-group">
                            <label for="address" class="mb-2">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" name="address" value="{{old('address') ?? $event->address}}">
                            @error('address')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-2 form-group description">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="" name="description">{{old('description') ?? $event->description}}</textarea>
                            @error('description')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-2 form-group">
                            <label for="registration_link" class="mb-2">Registration Link</span></label>
                            <input type="text" class="form-control @error('registration_link') is-invalid @enderror" id="registration_link" placeholder="link" name="registration_link" value="{{old('registration_link') ?? $event->registration_link}}">
                            @error('registration_link')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <h4>Resource Person Details</h4>
                        </div>

                        <div class="col-12 col-lg-8">

                            <div class="mb-2 form-group">
                                <label for="resource_person_name" class="mb-2">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('resource_person_name') is-invalid @enderror" id="resource_person_name" placeholder="Resource Person Name" name="resource_person_name" value="{{old('resource_person_name') ?? $event->resource_person_name}}">
                                @error('resource_person_name')
                                <span class="text-sm invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-2 form-group">
                                <label for="resource_person_designation" class="mb-2">Person Designation <span class="text-danger">*</span></label>
                                <textarea name="resource_person_designation" id="resource_person_designation" class="form-control  @error('resource_person_designation') is-invalid @enderror" cols="10" rows="5">{{old('resource_person_designation') ?? $event->resource_person_designation}}</textarea>
                                @error('resource_person_designation')
                                <span class="text-sm invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mx-auto col-12 col-lg-3">
                            <div class="card-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fixed fileinput-new img-thumbnail" style="width: 190px; height: 190px;">
                                        @if($event->person_image_url)
                                        <img src="{{$event->person_image_url}}" alt="...">
                                        @else
                                        <img src="http://placehold.it/190x190&text=Person+Image" alt="...">
                                        @endif
                                    </div>
                                    <div class="fixed fileinput-preview fileinput-exists img-thumbnail" style="max-width: 190px; max-height: 190px;"></div>
                                    <div class="mt-2">
                                        <span class="btn btn-outline-secondary btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="resource_person_image" class="@error('resource_person_image') is-invalid @enderror">
                                            @error('resource_person_image')
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
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">

        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <h4 class="card-title">Event Category <span class="text-danger">*</span></h4>
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
                    <h3 class="card-title">Date and Time <span class="text-danger">*</span></h3>
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
                    <h3 class="card-title">Publish At <span class="text-danger">*</span></h3>
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
                    <h4 class="card-title">Event Thumbnail</h4>
                </div>
                <div class="card-body">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fixed fileinput-new img-thumbnail" style="width: 320px; height: 190px;">
                            @if($event->image_url)
                            <img src="{{$event->image_url}}" alt="...">
                            @else
                            <img src="http://placehold.it/330x190&text=Event+Thumbnail" alt="...">
                            @endif
                        </div>
                        <div class="fixed fileinput-preview fileinput-exists img-thumbnail" style="max-width: 320px; max-height: 190px;"></div>
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
