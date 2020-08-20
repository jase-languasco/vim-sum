<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vim Sum</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('favicon.png') }}">
    </head>
    <body x-data="{ focused: false, hasSearchResults: false, searchResultContent: [], hash: window.location.hash }" x-on:keyup.slash="$refs.search.focus()" class="text-gray-800" style="background-color: #efef19;">
        <div class="w-full max-w-screen-xl mx-auto px-6">
            <header class="mb-8 p-2 sm:flex sm:justify-between sm:items-center">
                <img class="w-64" src="{{ asset('logo.svg') }}">
                <div class="mt-8 sm:mt-0 sm:flex-grow sm:ml-8">
                    <x-search />
                </div>
            </header>
            <main class="p-2 flex justify-between">
                <div class="hidden static inset-0 sm:block sm:w-1/5">
                    <nav>
                        @foreach ($vimCommands as $sections)
                            <a href="/#{{ $sections['section'] }}" class="block py-1 pl-2 rounded hover:bg-pink-600 hover:text-white">{{ $sections['section'] }}</a>
                        @endforeach
                    </nav>
                </div>
                <div class="w-4/5 pl-8">
                    @foreach ($vimCommands as $sectionIndex => $sections)
                        <h3 id="{{ $sections['section'] }}" class="text-2xl font-bold mt-8">{{ $sections['section'] }}</h3>
                        @foreach ($sections['commands'] as $commandIndex => $commands)
                            <div id="{{$sectionIndex}}{{$commandIndex}}" class="rounded p-3">
                                <x-code-snippet code="{{ $commands['command'] }}" /> - {{ $commands['description'] }}
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <script src="{{ asset('js/app.js') }}"></script>
            </main>
            <footer class="text-center mt-20 mb-8">
                <p>Built with <a class="text-pink-600" href="https://laravel.com/">Laravel</a>, <a class="text-pink-600" href="https://tailwindcss.com/">Tailwind CSS</a>, and <a class="text-pink-600" href="https://github.com/alpinejs/alpine/">Alpine.js</a></p>
                <span>&copy; {{ now()->format('Y') }} Vim Sum.</span>
                <span>
                    <span>
                        Made in the
                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="hand-peace" class="w-4 inline transform rotate-180" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M362.146 191.976c-13.71-21.649-38.761-34.016-65.006-30.341V74c0-40.804-32.811-74-73.141-74-40.33 0-73.14 33.196-73.14 74L160 168l-18.679-78.85C126.578 50.843 83.85 32.11 46.209 47.208 8.735 62.238-9.571 104.963 5.008 142.85l55.757 144.927c-30.557 24.956-43.994 57.809-24.733 92.218l54.853 97.999C102.625 498.97 124.73 512 148.575 512h205.702c30.744 0 57.558-21.44 64.555-51.797l27.427-118.999a67.801 67.801 0 0 0 1.729-15.203L448 256c0-44.956-43.263-77.343-85.854-64.024zM399.987 326c0 1.488-.169 2.977-.502 4.423l-27.427 119.001c-1.978 8.582-9.29 14.576-17.782 14.576H148.575c-6.486 0-12.542-3.621-15.805-9.449l-54.854-98c-4.557-8.141-2.619-18.668 4.508-24.488l26.647-21.764a16 16 0 0 0 4.812-18.139l-64.09-166.549C37.226 92.956 84.37 74.837 96.51 106.389l59.784 155.357A16 16 0 0 0 171.227 272h11.632c8.837 0 16-7.163 16-16V74c0-34.375 50.281-34.43 50.281 0v182c0 8.837 7.163 16 16 16h6.856c8.837 0 16-7.163 16-16v-28c0-25.122 36.567-25.159 36.567 0v28c0 8.837 7.163 16 16 16h6.856c8.837 0 16-7.163 16-16 0-25.12 36.567-25.16 36.567 0v70z"></path>
                        </svg>tl.
                    </span>
                    <span>
                        Contribute on <a href="https://github.com/jase-languasco/vim-sum" class="ml-1"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github" class="w-4 inline" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg></a>
                    </span>
                </span>
            </footer>
        </div>
    </body>
</html>
