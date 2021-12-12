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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="designation" class="mb-2">Designation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{old('designation') ?? $member->designation}}" name="designation" required>
                                    @error('designation')
                                    <span class="text-sm invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="batch" class="mb-2">Batch <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('batch') is-invalid @enderror" id="batch" value="{{old('batch') ?? $member->batch}}" name="batch" required>
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
                            <button class="btn btn-primary mt-4">Save Member</button>
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
                    <h4 class="card-title mb-2">Image</h4>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail fixed" style="width: 450px; height: 440px;">
                            @if($member->image)
                            <img src="{{asset('storage/'.$member->image)}}" alt="...">
                            @else
                            <img src="http://placehold.it/450x440&text=Member+Image" alt="...">
                            @endif
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail fixed" style="max-width: 450; max-height: 440;"></div>
                        <div class="mt-2">
                            <span class="btn btn-outline-secondary btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image" >
                            </span>
                            <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
