<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes }}
    class="{{ $class }}"
    @if($required) required @endif>
{{ $value }}
</textarea>