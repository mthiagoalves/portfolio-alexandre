<button x-data="" x-on:click.prevent="$dispatch('open-modal', 'change-ocupattion')">
    Occupation <i class="fa-solid fa-plus fontawesome-icons"></i>
</button>

<x-modal name="change-ocupattion" focusable>
    <form id="occupation-form" class="p-6">
        @csrf
        @method('patch')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('You wanna to change Occupation?') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="occupation" value="{{ __('Password') }}" class="sr-only" />
            <textarea cols="10" rows="3" id="occupation" name="occupation" class="mt-1 block w-3/4"
                placeholder="{{ __('Password') }}">
            </textarea>

        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-green-button id="occupation-button" class="ml-3">
                {{ __('Update Occupation') }}
            </x-green-button>
        </div>
    </form>
</x-modal>

<script>
    const occupationButton = document.getElementById('occupation-button');
    occupationButton.addEventListener('click', function(event) {
        event.preventDefault();
        const form = document.getElementById('occupation-form');
        const formData = new FormData(form);

        fetch('{{ route('updateOccupation') }}', {
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
