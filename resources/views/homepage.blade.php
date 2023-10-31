@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AP.</title>
@endsection

@section('style-include')
    <style>
        .text-left-after-banner {
            font-size: 2.375rem;
            line-height: 3.135rem;
        }

        .text-right-after-banner {
            font-size: 1.5rem;
            line-height: 1.758rem;
        }

        @media(max-width: 756px) {
            .container-text-in-mobile {
                position: relative;
                height: 220px;
            }

            .text-left-after-banner {
                font-size: 1.5rem;
                line-height: 1.758rem;
                text-align: justify;
                text-align-last: left;
            }

            .text-right-after-banner {
                text-align: justify;
                text-align-last: right;
            }

            .div-text-left-in-mobile {
                position: absolute;
                top: 0;
                left: 0;
                transition: all 0.5s ease 0s;
            }

            .div-text-right-in-mobile {
                position: absolute;
                top: 0;
                left: 100vw;
                transition: all 0.5s ease 0s;
            }

            .text-in-mobile {
                display: flex;
            }

            .arrows {
                margin: auto;
            }

            .arrows i {
                color: #212529;
            }
        }
    </style>
@endsection

<x-master-layout>
    <x-slot name="content" class="page1">
        <div class="container p-0 my-5 container-text-in-mobile">
            <div class="row justify-content-between m-0">
                <div class="col-sm-8 col-12 div-text-left-in-mobile">
                    <div class="text-in-mobile">
                        <div class="col-11 p-2 col-sm-12 p-sm-0">
                            <p class="text-left-after-banner">
                                {!! $content->first_text !!}
                            </p>
                        </div>
                        <div class="col-1 p-2 d-block d-sm-none arrows">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-12 div-text-right-in-mobile">
                    <div class="text-in-mobile">
                        <div class="col-1 p-2 d-block d-sm-none arrows">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <div class="col-11 p-2 col-sm-12 p-sm-0">
                            <p class="text-right-after-banner">
                                {!! $content->second_text !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid offset-sm-1 p-sm-0 my-5">
            @include('components.slide-projects')
        </div>
        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </x-slot>
</x-master-layout>
