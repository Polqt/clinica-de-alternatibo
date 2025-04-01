<button
    type="{{ $type }}"
    class="{{ $class }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes }}>
    {{ $slot }}
</button>