
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{ __('former.js') }}"></script>
</head>
<body>
    

<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-around">


        </div>
        <form id="form" onsubmit="return false">
            <div class="form-group d-flex justify-content-around">
                <div class="form-group col-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Nilai') }}
                    </h2>
                    <input type="text" class="form-control mt-1" id="inputNilai" placeholder="Input Nilai">
                </div>
                <div class="form-group col-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Keterangan') }}
                    </h2>    
                    <h1 id="hasil"></h1>
                </div>
            </div>
            <button type="submit" class="btn border ml-3 -mt-4" onclick="cek()">Submit</button>
        </form>
        
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
