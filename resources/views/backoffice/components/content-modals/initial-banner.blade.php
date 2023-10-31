<style>
    @media (min-width: 576px) {
        .col-sm-3 {
            flex: 0 0 auto;
            width: 27.8888888%;
        }
    }
</style>

<button x-data="" x-on:click.prevent="$dispatch('open-modal', 'change-banner-initial')">
    Initial Banner <i class="fa-solid fa-plus fontawesome-icons"></i>
</button>

<x-modal name="change-banner-initial" focusable>
    <form id="banner-upload-form" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('You wanna change initial banner?') }}
        </h2>
        <div class="container mt-3">
            <div class="row justify-content-around">
                <div class="col-sm-8 col-12 imgUp">
                    <div class="imagePreview">
                        <img src="/img/homepage/banner-initial.png" class="img-fluid" alt="">
                    </div>
                    <label class="btn btn-light">
                        Upload Desktop
                        <input name="banner-desktop" type="file" class="uploadFile img" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
                <div class="col-sm-3 col-12 imgUp">
                    <div class="imagePreview">
                        <img src="/img/homepage/banner-initial-m.png" class="img-fluid" alt="">
                    </div>
                    <label class="btn btn-light">
                        Upload Mobile
                        <input name="banner-mobile" type="file" class="uploadFile img" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-green-button id="upload-button" class="ml-3">
                {{ __('Update banner') }}
            </x-green-button>
        </div>
    </form>
</x-modal>

<script>
    const imageInputs = document.querySelectorAll('.uploadFile');

    imageInputs.forEach(function(inputElement) {
        inputElement.addEventListener('change', function() {
            previewImages2(this);
        });
    });

    function previewImages2(inputElement) {
        const preview = inputElement.closest('.imgUp').querySelector('.imagePreview');
        preview.innerHTML = '';

        const files = inputElement.files;

        function readAndPreview(file) {
            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    const image = new Image();
                    image.src = this.result;
                    image.classList.add('img-fluid'); // Adicione a classe "img-fluid"
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);
            }
        }

        if (files) {
            Array.from(files).forEach(readAndPreview);
        }
    }
    const uploadButton = document.getElementById('upload-button');
    uploadButton.addEventListener('click', function(event) {
        event.preventDefault();
        const form = document.getElementById('banner-upload-form');
        const formData = new FormData(form);

        fetch('{{ route('changeInitialBanner') }}', {
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
