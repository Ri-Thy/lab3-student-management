<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SMS Lab Portal')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <div>
                <h1 class="text-xl font-bold text-primary">
                    SMS Lab Portal
                </h1>
            </div>

            <nav class="flex gap-4 text-sm font-medium">
                <a href="{{ route('dashboard') }}"
                   class="hover:text-secondary">
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}"
                   class="hover:text-secondary">
                    Students Registry
                </a>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-8">
        @yield('content')
    </main>

</body>
</html>