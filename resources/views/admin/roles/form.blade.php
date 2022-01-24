<div class="form-row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="role_code">Role Code</label>
        <input type="text" class="form-control" value="{{old('role_code',optional($role ?? null)->Role_Code)}}" name="role_code" id="role_code" placeholder="Role code" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Role code is required</div>
        @error('role_code')<div class="error-message">{{$message}}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="role_name">Role Name</label>
        <input type="text" class="form-control" value="{{old('role_name',optional($role ?? null)->Role_Name)}}" name="role_name" id="role_name" placeholder="Role name" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Role name is required</div>
        @error('role_name')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Description">{{old('description',optional($role ?? null)->description)}}</textarea>
        @error('description')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="status" class="form-label col-form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="1" @if(old('show_menu',optional($function ?? null)->status) == 1) selected @endif>Active</option>
                <option value="0" @if(old('show_menu',optional($function ?? null)->status) == 0) selected @endif>Inactive</option>
            </select>
        </div>
        @error('show_menu')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
