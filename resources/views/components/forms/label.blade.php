<label for="{{ $for }}" class="{{ $class }}" {{ $required ? 'required' : '' }}>
    {{ $slot }}
    @if (!$required)
    <span class="text-red-500">Fakyow</span>
    @endif
</label>