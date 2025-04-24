<flux:modal name="delete_doctor" class="md:max-w-2xl">
    <form method="POST" action="">
        @csrf
        @method('DELETE')
    </form>

</flux:modal>