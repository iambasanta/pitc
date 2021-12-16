<section class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Category</h4>
        </div>
        <div class="card-body">
            <div class="card-content">
                <div class="form-group">
                    <label for="title" class="mb-2">Category Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Category Title" name="title" value="{{old('title') ?? $category->title}}" required>
                    @error('title')
                    <span class="text-sm invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug" class="mb-2">Slug <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug') ?? $category->slug}}" required>
                    @error('slug')
                    <span class="text-sm invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <button class="btn btn-primary mt-4">{{$category->exists ? 'Update' : 'Create'}}</button>
                    </div>
                    <div class="form-group">
                        <a href="{{route('categories.index')}}" class="btn btn-outline-secondary mt-4">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
