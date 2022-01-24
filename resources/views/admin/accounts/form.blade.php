<div class="form-row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="full_name">Full Name</label>
        <input type="text" class="form-control" name="full_name" value="{{old('full_name',optional($account ?? null)->fullname)}}" id="full_name" placeholder="Full Name" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Full Name is required</div>
        @error('full_name')<div class="error-message">{{$message}}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="email" class="form-control" id="email" value="{{old('email',optional($account ?? null)->email)}}" name="email" placeholder="Email" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Email is required</div>
        @error('email')<div class="error-message">{{$message}}</div>@enderror

    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="username">Username</label>
        <div class="input-group position-relative">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
            </div>
            <input type="text" class="form-control" value="{{old('username',optional($account ?? null)->username)}}" id="username" name="username" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
            <div class="invalid-feedback">Username is required</div>
        </div>
        @error('username')<div class="error-message">{{$message}}</div>@enderror
    </div>
    <div class="col-md-4 mb-3 position-relative">
        <label class="form-label" for="password">Password</label>
        <input type="password" class="form-control" value="{{old('password')}}" id="password" name="password" placeholder="Password" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Password is required</div>
        @error('password')<div class="error-message">{{$message}}</div>@enderror
    </div>
    <div class="col-md-4 mb-3 position-relative">
        <label class="form-label" for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" value="{{old('confirm_password')}}" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Confirm Password is required</div>
    </div>
</div>
<div class="form-row">
    <div class="form-label col-md-6 mb-3 position-relative">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" value="{{old('phone',optional($account ?? null)->phone)}}" id="phone" name="phone" placeholder="Phone" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Phone is required</div>
    </div>
    <div class="col-md-6 mb-3 position-relative">
        <label class="form-label" for="address">Address</label>
        <input type="text" class="form-control" id="address" value="{{old('address',optional($account ?? null)->address)}}" name="address" placeholder="Address" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Address is required</div>
        @error('address')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Upload Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" value="{{old('image')}}" name="image" id="image">
                <label class="custom-file-label" for="image">{{optional($account ?? null)->image}}</label>
                <div class="invalid-feedback">Image is required</div>
            </div>
        </div>
        @error('image')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        @php $userStatus = ["1"=>"Login Accept","0"=>"Login Deny"]; @endphp
        <div class="form-group">
            <label for="status" class="form-label col-form-label">Choose Status</label>
            <select class="custom-select" id="status" name="status" required="">
                @foreach ($userStatus as $key => $status)
                    <option value="{{$key}}"
                            @if(isset($account))
                            @if($key == $account->$status)
                            selected
                        @endif
                        @endif
                    >{{$status}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Status is required</div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="isAccept" checked="{{old('isAccept')}}" id="invalidCheck" required="">
        <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
        <div class="invalid-feedback">You must agree before submitting.</div>
    </div>
</div>
