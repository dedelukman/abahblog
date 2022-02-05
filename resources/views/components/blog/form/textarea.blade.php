@props([ 'name', 'placeholder','required'=>'true','value'])

<textarea  id="{{ $name }}" value="{{ $value }}"
{{ $required == 'true' ? 'required' : '' }}
class="form-control" placeholder="{{ $placeholder }}" name="{{ $name }}" cols="30" rows="10"></textarea>

@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
