@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

            .text-left-after-banner,
            .text-right-after-banner {
                font-size: 1.4rem;
                line-height: 1.758rem;
                text-align: start;
            }

            .text-right-after-banner {
                font-size: 1.2rem;
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
        <div class="container p-0 margin-y-80 give-margin">
            <div class="row justify-content-between m-0">
                <div class="col-sm-8 col-12">
                    <div class="col-11 p-2 col-sm-12 p-sm-0">
                        <p class="text-left-after-banner">
                            {!! $content->first_text !!}
                        </p>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="col-11 p-2 col-sm-12 p-sm-0">
                        <p class="text-right-after-banner">
                            {!! $content->second_text !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-sm-0 margin-mb-80">
            @include('components.slide-projects')
        </div>

        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </x-slot>
</x-master-layout>
