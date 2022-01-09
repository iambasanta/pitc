<section class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Admin</h4>
            <x-util.flash />
        </div>
        <div class="card-body">
            <div class="card-content">
                <div class="form-group">
                    <label for="title" class="mb-2">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="User Name" name="name" value="{{old('name') ?? $user->name}}" required>
                    @error('name')
                    <span class="text-sm invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="mb-2">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="example@email.com" value="{{old('email') ?? $user->email}}" required>
                    @error('email')
                    <span class="text-sm invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role" class="mb-2">Role <span class="text-danger">*</span></label>
                    <p class="font-bold form-control-static">{{ $user->roles->first()->display_name }}</p>
                </div>

                <div class="form-group">
                    <label for="password" class="mb-2">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                    @error('password')
                    <span class="text-sm invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="mb-2">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                    <span class="text-sm invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <button class="mt-4 btn btn-primary">{{$user->exists ? 'Update' : 'Create'}}</button>
                    </div>
                    <div class="form-group">
                        <a href="{{route('admin.home')}}" class="mt-4 btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
