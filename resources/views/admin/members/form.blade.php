<section class="row">
    <div class="col-12 col-lg-8">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Member</h4>
                </div>

                <div class="card-body">

                    <div class="card-content">
                        <div class="form-group">
                            <label for="name" class="mb-2">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{old('name') ?? $member->name}}" required>
                            @error('name')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="mb-2">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@email.com" value="{{old('email') ?? $member->email}}" name="email" required>
                            @error('email')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="type" class="mb-2">Type <span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="" disabled>Select Member Type</option>
                                        @foreach($member->typeOptions() as $typeOptionKey => $typeOptionValue)
                                        <option value="{{$typeOptionKey}}" {{$member->type == $typeOptionValue ? 'selected' : ''}}>{{$typeOptionValue}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="designation" class="mb-2">Designation</label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{old('designation') ?? $member->designation}}" name="designation">
                                    @error('designation')
                                    <span class="text-sm invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="batch" class="mb-2">Batch <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('batch') is-invalid @enderror" id="batch" value="{{old('batch') ?? $member->batch}}" name="batch" placeholder="2004" required>
                                    @error('batch')
                                    <span class="text-sm invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="facebook" class="mb-2">Facebook <span class="text-danger">*</span></label>
                            <input type="text" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{old('facebook') ?? $member->facebook}}" name="facebook" required>
                            @error('facebook')
                            <span class="text-sm invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="linkedin" class="mb-2">Linkedin</label>
                            <input type="text" id="linkedin" class="form-control" value="{{old('linkedin') ?? $member->linkedin}}" name="linkedin">
                        </div>

                        <div class="form-group">
                            <label for="testimonial" class="mb-2">Testimonial</label>
                            <textarea name="testimonial" class="form-control" id="" cols="10" rows="3">{{old('testimonial') ?? $member->testimonial}}</textarea>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <button class="btn btn-primary">{{$member->exists ? 'Update' : 'Create'}}</button>
                            <a href="{{route('admin.members.index')}}" class="btn btn-light-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-content ">
                <div class="card-body">
                    <h4 class="mb-2 card-title">Image <span class="text-danger">*</span></h4>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fixed fileinput-new img-thumbnail" style="width: 450px; height: 440px;">
                            @if($member->image)
                            <img src="{{$member->imageUrl}}" alt="...">
                            @else
                            <img src="http://placehold.it/450x440&text=Member+Image" alt="...">
                            @endif
                        </div>
                        <div class="fixed fileinput-preview fileinput-exists img-thumbnail" style="max-width: 450; max-height: 440;"></div>
                        <div class="mt-2">
                            <span class="btn btn-outline-secondary btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image" class="@error('image') is-invalid @enderror" {{$member->image ? '' : 'required'}}>
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
