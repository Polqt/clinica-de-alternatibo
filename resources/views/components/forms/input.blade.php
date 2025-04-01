<input 
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value }}"
    placeholder="{{ $placeholder }}"
    {{ $required ? 'required' : '' }}
    {{ $attributes }}
>