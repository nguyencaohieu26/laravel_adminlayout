<div class="form-row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="function_code">Function Code</label>
        <input type="text" class="form-control" value="{{old('function_code',optional($function ?? null)->Func_Code)}}" name="function_code" id="function_code" placeholder="Function code" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Function code is required</div>
            @error('function_code')<div class="error-message">{{$message}}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="function_url">Function Url</label>
        <input type="text" class="form-control" value="{{old('function_url',optional($function ?? null)->Func_Url)}}" id="function_url" name="function_url" placeholder="Function url" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Function url is required</div>
        @error('function_url')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label class="form-label" for="function_name">Function Name</label>
        <input type="text" class="form-control" value="{{old('function_name',optional($function ?? null)->Func_Name)}}" id="function_name" name="function_name" placeholder="Function name" required="">
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Function name is required</div>
        @error('function_name')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Description">{{old('description',optional($function ?? null)->Description)}}</textarea>
        @error('description')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
<div class="form-row">
{{--   <div class="col-md-4 mb-3">--}}
{{--       <div class="form-group">--}}
{{--           <label for="function_level" class="col-form-label">Function Level</label>--}}
{{--           <select class="form-control" id="function_level" name="function_level">--}}
{{--               <option>Large select</option>--}}
{{--               <option>Small select</option>--}}
{{--           </select>--}}
{{--       </div>--}}
{{--   </div>--}}
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="show_menu" class="form-label col-form-label">Show Menu</label>
            <select class="form-control" id="show_menu" name="show_menu">
                <option value="1" @if(old('show_menu',optional($function ?? null)->Show_Menu) == 1) selected @endif>Show</option>
                <option value="0" @if(old('show_menu',optional($function ?? null)->Show_Menu) == 0) selected @endif>Hidden</option>
            </select>
        </div>
        @error('show_menu')<div class="error-message">{{$message}}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="status" class="form-label col-form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="1" @if(old('status',optional($function ?? null)->status) == 1) selected @endif>Active</option>
                <option value="0" @if(old('status',optional($function ?? null)->status) == 0) selected @endif>Inactive</option>
            </select>
        </div>
        @error('status')<div class="error-message">{{$message}}</div>@enderror
    </div>
</div>
