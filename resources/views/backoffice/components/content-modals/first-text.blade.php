<button x-data="" x-on:click.prevent="$dispatch('open-modal', 'change-first-text')">
    First Text <i class="fa-solid fa-plus fontawesome-icons"></i>
</button>

<x-modal name="change-first-text" focusable>
    <form id="firstTextForm" class="p-6">
        @csrf
        @method('patch')
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('You wanna change first text?') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="first-text" value="{{ __('First Text') }}" class="sr-only" />
            <textarea cols="10" rows="3" id="first-text" name="first-text" class="mt-1 block w-3/4"
                placeholder="{{ __('First Text') }}">
            </textarea>

        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-green-button id="firstTextButton" class="ml-3">
                {{ __('Update Text') }}
            </x-green-button>
        </div>
    </form>
</x-modal>

<script>
    const firstTextButton = document.getElementById('firstTextButton');
    firstTextButton.addEventListener('click', function(event) {
        event.preventDefault();
        const form = document.getElementById('firstTextForm');
        const formData = new FormData(form);
        fetch('{{ route('updateFirstText') }}', {
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
