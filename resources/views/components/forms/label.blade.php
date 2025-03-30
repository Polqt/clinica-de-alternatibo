
<label for="{{ $for }}">
    {{ $slot }}
    @if ($required)
        <span class="text-red-500">Fakyow</span>
    @endif
</label>