<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blog</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="mb-2 form-group">
                            <label for="title" class="mb-2">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{old('title') ?? $post->title}}" required>
                            @error('title')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-2 form-group">
                            <label for="slug" class="mb-2">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug') ?? $post->slug}}" required>
                            @error('slug')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-2 form-group">
                            <label for="author" class="mb-2">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" placeholder="Author" name="author" value="{{old('author') ?? $post->author}}" required>
                            @error('author')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group excerpt">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" rows="" name="excerpt">{{old('excerpt') ?? $post->excerpt}}</textarea>
                            @error('excerpt')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-4 form-group">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" id="body" rows="" name="body">{{old('body') ?? $post->body}}</textarea>
                            @error('body')
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
                    <h3 class="card-title">Publish</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control @error('published_at') is-invalid @enderror" id="published_at" value="{{old('published_at') ?? $post->published_at}}" placeholder="Y-m-d" name="published_at">
                        @error('published_at')
                        <span class="text-sm invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <a href="#" class="btn btn-light-primary" id="save-draft">Save Draft</a>
                        <button class="btn btn-primary" type="submit">Publish</button>
                        <a href="{{route('admin.posts.index')}}" class="btn btn-light-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-header">
                    <h4 class="card-title">Category</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="" class="disabled">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$post->category_id === $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-sm invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
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
                        <div class="fixed fileinput-new img-thumbnail" style="width: 320px; height: 190px;">
                            @if($post->image_url)
                            <img src="{{$post->image_url}}" alt="...">
                            @else
                            <img src="http://placehold.it/320x190&text=Feature+Image" alt="...">
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
