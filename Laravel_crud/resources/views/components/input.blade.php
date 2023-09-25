<div>
    <div class="form-group">
        <label for="name" class="form-label">{{$lable}}</label>
        <input type="{{$type}}" class="form-control" id="name" name="{{$name}}" placeholder="Enter Your Name">
        <span class="text-danger">
            {{-- @error('name')
                {{ $message }}
            @enderror --}}
        </span>
    </div>
    <br>
</div>