<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Student Management System')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-primary text-white">
            <div class="p-6">
                <h1 class="text-xl font-bold">
                    SMS Workspace
                </h1>

                <p class="mt-1 text-sm text-slate-200">
                    Student Management
                </p>
            </div>

            <nav class="space-y-1 px-3">

                <a href="{{ route('dashboard') }}"
                   class="block rounded-lg px-4 py-3 hover:bg-white/10">
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}"
                   class="block rounded-lg px-4 py-3 hover:bg-white/10">
                    Students Directory
                </a>

            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">

            <!-- Top Header -->
            <header class="border-b bg-white px-6 py-4">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            @yield('parent', 'Student Management System')
                        </p>

                        <h2 class="text-xl font-semibold">
                            @yield('page', 'Dashboard')
                        </h2>
                    </div>

                    <div class="text-sm font-medium text-slate-600">
                        Classman: Dara M1
                    </div>

                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">

    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</main>

        </div>

    </div>

</body>
</html>