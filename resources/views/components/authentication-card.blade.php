<div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
    {{-- <div>
        {{ $logo }}
    </div> --}}



    <!-- component -->
    <div class="flex flex-col justify-center min-h-screen py-6 bg-gray-100 sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">

            <div
                class="absolute inset-0 transform -skew-y-6 shadow-lg bg-gradient-to-r from-purple-300 to-purple-600 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>

            <div class="relative px-4 py-6 bg-white shadow-lg sm:rounded-3xl sm:p-20">

                <div class="pb-4 max-w-mda">
                    {{$logo}}
                </div>

                <div class="max-w-md mx-auto">
                    {{$slot}}
                </div>
            </div>

        </div>
    </div>

</div>




