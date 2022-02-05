@props(['type'=>'text', 'name', 'placeholder','required'=>'true','value'])

<input type="{{ $type }}" id="{{ $name }}" value="{{ $value }}"
{{ $required == 'true' ? 'required' : '' }}
class="form-control" placeholder="{{ $placeholder }}" name="{{ $name }}" >

@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
