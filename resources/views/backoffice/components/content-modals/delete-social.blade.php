<button class="btn btn-danger" x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-social-deletion-{{$i}}')">
    Del
</button>

<x-modal name="confirm-social-deletion-{{$i}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="">
        @csrf
        @method('delete')
        <div class="col-12 p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </div>
    </form>
</x-modal>
