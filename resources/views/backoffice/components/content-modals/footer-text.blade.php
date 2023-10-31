<button x-data="" x-on:click.prevent="$dispatch('open-modal', 'change-text-footer')">
    Text Footer <i class="fa-solid fa-plus fontawesome-icons"></i>
</button>

<x-modal name="change-text-footer" focusable>
    <form id="footerForm" class="p-6">
        @csrf
        @method('patch')
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('You wanna change text of footer?') }}
        </h2>

        <div class="mt-6">

            <textarea cols="10" rows="3" id="text-footer" name="text-footer" class="mt-1 block w-3/4"
                placeholder="{{ __('Text Footer') }}">
            </textarea>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-green-button id="footerButton" class="ml-3">
                {{ __('Update Text') }}
            </x-green-button>
        </div>
    </form>
</x-modal>

<script>
    const footerButton = document.getElementById('footerButton');
    footerButton.addEventListener('click', function(event) {
        event.preventDefault();
        const form = document.getElementById('footerForm');
        const formData = new FormData(form);

        fetch('{{ route('updateTextFooter') }}', {
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
