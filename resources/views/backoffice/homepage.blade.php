<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>
    <div class="container pt-5">
        <div class="row">
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white">
                    @include('backoffice.components.content-modals.initial-banner')
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white">
                    @include('backoffice.components.content-modals.occupation')
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white">
                    @include('backoffice.components.content-modals.first-text')
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white">
                    @include('backoffice.components.content-modals.second-text')
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white">
                    @include('backoffice.components.content-modals.footer-text')
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white position-relative">
                    <p class="add-socials">
                        Socials <i class="fa-solid fa-plus fa-bounce fontawesome-icons"></i>
                    </p>
                    <div class="btns-socials">
                        <div class="row">
                            <div class="col-6">
                                @include('backoffice.components.content-modals.add-socials')
                            </div>
                            <div class="col-6">
                                @include('backoffice.components.content-modals.show-socials')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white">
                    @include('backoffice.components.content-modals.email')
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 p-2">
                <div class="col-12 p-6 bg-white">
                    @include('backoffice.components.content-modals.phone')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    let isLeftHidden = false;
    document.querySelector('.add-socials').addEventListener('click', function() {
        const socials = document.querySelector('.btns-socials');

        if (isLeftHidden) {
            socials.style.opacity = '0';
            socials.style.left = '17%';
            socials.style.visibility = 'hidden';

        } else {
            socials.style.opacity = '1';
            socials.style.left = '43%';
            socials.style.visibility = 'visible';
        }

        isLeftHidden = !isLeftHidden;
    });
</script>
