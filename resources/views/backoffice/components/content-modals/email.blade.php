<button x-data="" x-on:click.prevent="$dispatch('open-modal', 'change-email')">
    Email <i class="fa-solid fa-plus fontawesome-icons"></i>
</button>

<x-modal name="change-email" focusable>
    <form id="emailForm" class="p-6">
        @csrf
        @method('patch')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('You wanna change email?') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="email" value="{{ __('Email') }}" class="sr-only" />

            <x-text-input id="email" name="email" type="text" class="mt-1 block w-3/4"
                placeholder="{{ __('Email') }}" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-green-button id="emailButton" class="ml-3">
                {{ __('Update email') }}
            </x-green-button>
        </div>
    </form>
</x-modal>

<script>
    const emailButton = document.getElementById('emailButton');
    emailButton.addEventListener('click', function(event) {
        event.preventDefault();
        const form = document.getElementById('emailForm');
        const formData = new FormData(form);

        fetch('{{ route('updateEmail') }}', {
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
