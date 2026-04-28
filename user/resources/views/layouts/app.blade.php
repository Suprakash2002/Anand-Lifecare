<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anand Lifecare</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen" x-data="specialitiesModalData()">

    {{-- Header --}}
    @include('partials.header')

    {{-- Flash Messages --}}
    <div class="max-w-6xl mx-auto px-4 py-4 w-full">
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                <p class="text-green-700 font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                <p class="text-red-700 font-semibold">{{ session('error') }}</p>
            </div>
        @endif
    </div>

    {{-- Page Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <script>
        function specialitiesModalData() {
            return {
                openDropdown: ''
            }
        }
    </script>
</body>
</html>
