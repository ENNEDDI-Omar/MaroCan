<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- message.blade.php -->

    <div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <button onclick="this.parentElement.parentElement.style.display='none';"
                        class="text-green-700">
                        <svg class="fill-current h-6 w-6" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Fermer</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.896l-2.651 2.953a1.2 1.2 0 1 1-1.697-1.697l2.951-2.651-2.951-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.202l2.651-2.951a1.2 1.2 0 1 1 1.697 1.697L11.697 10l2.651 2.651a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </button>
                </span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <button onclick="this.parentElement.parentElement.style.display='none';"
                        class="text-red-700">
                        <svg class="fill-current h-6 w-6" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Fermer</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.896l-2.651 2.953a1.2 1.2 0 1 1-1.697-1.697l2.951-2.651-2.951-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.202l2.651-2.951a1.2 1.2 0 1 1 1.697 1.697L11.697 10l2.651 2.651a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </button>
                </span>
            </div>
        @endif
    </div>





    @yield('content')



    {{-- @if (session('success'))
         <script>
             swal.fire({
                 title: 'Succès!',
                 text: '{{ session('success') }}',
                 icon: 'success',
                 button: 'OK'
             });
         </script>
     @endif --}}
</body>

</html>
