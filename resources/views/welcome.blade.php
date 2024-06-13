<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-950">
        <div class="py-24 mx-auto sm:px-6 sm:py-32 lg:px-8">
            <div
                class="relative px-6 pt-16 overflow-hidden bg-gray-900 shadow-2xl isolate sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                <svg viewBox="0 0 1024 1024"
                    class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
                    aria-hidden="true">
                    <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                        fill-opacity="0.7" />
                    <defs>
                        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                            <stop stop-color="#7775D6" />
                            <stop offset="1" stop-color="#E935C1" />
                        </radialGradient>
                    </defs>
                </svg>
                <div class="max-w-md mx-auto text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Organize your sales with
                        efficiency and quality.</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-300">Register and consult your sales easily and
                        efficiently.</p>
                    <div class="flex items-center justify-center mt-10 gap-x-6 lg:justify-start">
                    </div>
                <div class="flex">
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </div>
                </div>
                <div class="relative mt-16 h-80 lg:mt-8">
                    <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10"
                        src="https://www.notion.so/image/https%3A%2F%2Fprod-files-secure.s3.us-west-2.amazonaws.com%2F9c5e180e-dcbb-483a-a1ab-f584b89f97be%2Fbcd5e727-b8d3-4ef3-8c19-fe4d9c4a44e7%2Fwelcome.png?table=block&id=a8b9709c-7b7b-47a9-b42a-0b9ce0d2f53c&spaceId=9c5e180e-dcbb-483a-a1ab-f584b89f97be&width=2000&userId=bf26322a-6e31-44d6-9ef3-265c0d6e8282&cache=v2"
                        alt="App screenshot" width="1824" height="1080">
                </div>
            </div>
        </div>
</body>

</html>
