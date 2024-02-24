<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>quora/reddit</title>
    <script src="https://cdn.tailwindcss.com/3.1.4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style type="text/tailwindcss">
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    </style>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {}
            }
        }
    </script>
</head>


<body class="h-full bg-gray-100">


<div class="min-h-full">
    <!-- When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars -->
    @include('components.header')

    <div class="py-10">
        <div class="mx-auto max-w-3xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-8 lg:px-8">

            @include('components.sidebar')

            {{ $slot }}

        </div>
    </div>
</div>

</body>
</html>
