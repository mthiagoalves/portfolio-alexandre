<button class="btn btn-success" x-data="" x-on:click.prevent="$dispatch('open-modal', 'show-socials')">
    Edit
</button>

<x-modal name="show-socials" focusable>
    <form method="post" action="" class="p-6">
        @csrf
        @method('patch')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('What socials do you wanna edit?') }}
        </h2>

        <div class="col-12 mt-6">
            <div class="row">
                @for ($i = 1; $i < 5; $i++)
                    <div class="col-6 p-3">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <p class="text-modal-socials">
                                        Social
                                    </p>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            @include('backoffice.components.content-modals.edit-social')
                                        </div>
                                        <div class="col-6">
                                            @include('backoffice.components.content-modals.delete-social')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>
        </div>
    </form>
</x-modal>
