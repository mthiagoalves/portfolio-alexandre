<button x-data="" x-on:click.prevent="$dispatch('open-modal', 'change-phone')">
    Phone <i class="fa-solid fa-plus fontawesome-icons"></i>
</button>

<x-modal name="change-phone" focusable>
    <form id="phoneForm" class="p-6">
        @csrf
        @method('patch')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('You wanna change first text?') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="phone" value="{{ __('Phone') }}" class="sr-only" />

            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-3/4"
                placeholder="{{ __('Phone') }}" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-green-button id="phoneButton" class="ml-3">
                {{ __('Update phone') }}
            </x-green-button>
        </div>
    </form>
</x-modal>

<script>
    const phoneButton = document.getElementById('phoneButton');
    phoneButton.addEventListener('click', function(event) {
        event.preventDefault();
        const form = document.getElementById('phoneForm');
        const formData = new FormData(form);

        fetch('{{ route('updatePhone') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 200) {
                    Swal.fire(
                        'Success',
                        data.message,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            })
            .catch(error => {
                console.log('error');
            });
    });
</script>
