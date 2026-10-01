<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DineEase Admin')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; }
        .sidebar-link { transition: all 0.3s ease; border-left: 3px solid transparent; }
        .sidebar-link:hover, .sidebar-link.active { 
            background: linear-gradient(90deg, rgba(99,102,241,0.2), transparent); 
            border-left-color: #818cf8; 
            transform: translateX(4px);
        }
        .card-3d { transition: all 0.3s ease; }
        .card-3d:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,0.15); }
        .btn-gradient {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99,102,241,0.4);
        }
        .btn-danger-gradient {
            background: linear-gradient(135deg, #ef4444, #f97316);
            transition: all 0.3s ease;
        }
        .btn-danger-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239,68,68,0.4);
        }
        @keyframes fadeIn { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }
        .fade-in { animation: fadeIn 0.4s ease forwards; }
    </style>
</head>
<body class="bg-slate-100">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white p-0 flex flex-col shadow-2xl">
            
            <!-- Logo -->
            <div class="p-6 border-b border-slate-700">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                    <i class="fas fa-utensils mr-2 text-indigo-400"></i>DineEase
                </h2>
                <p class="text-slate-400 text-sm mt-1">Restaurant Admin</p>
            </div>

            <!-- Nav -->
            <nav class="flex-1 p-4 space-y-1">
                <a href="/dashboard" class="sidebar-link flex items-center gap-3 py-3 px-4 rounded-lg text-slate-300 hover:text-white">
                    <i class="fas fa-chart-pie w-5 text-center"></i> Dashboard
                </a>
                <a href="/categories" class="sidebar-link active flex items-center gap-3 py-3 px-4 rounded-lg text-white">
                    <i class="fas fa-tags w-5 text-center"></i> Categories
                </a>
                <a href="#" class="sidebar-link flex items-center gap-3 py-3 px-4 rounded-lg text-slate-400 hover:text-white">
                    <i class="fas fa-hamburger w-5 text-center"></i> Menu Items
                </a>
                <a href="#" class="sidebar-link flex items-center gap-3 py-3 px-4 rounded-lg text-slate-400 hover:text-white">
                    <i class="fas fa-chair w-5 text-center"></i> Tables
                </a>
                <a href="#" class="sidebar-link flex items-center gap-3 py-3 px-4 rounded-lg text-slate-400 hover:text-white">
                    <i class="fas fa-receipt w-5 text-center"></i> Orders
                </a>
                <a href="#" class="sidebar-link flex items-center gap-3 py-3 px-4 rounded-lg text-slate-400 hover:text-white">
                    <i class="fas fa-cog w-5 text-center"></i> Settings
                </a>
            </nav>

            <!-- User -->
            <div class="p-4 border-t border-slate-700">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center font-bold">
                        {{ auth()->user()->name[0] ?? 'A' }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <a href="{{ route('logout') }}" class="text-xs text-slate-400 hover:text-indigo-400" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <!-- Top Bar -->
            <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-10">
                <div>
                    <h1 class="text-xl font-bold text-slate-800">@yield('page_title', 'Dashboard')</h1>
                    <p class="text-sm text-slate-400">@yield('page_subtitle', '')</p>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-500">{{ now()->format('M d, Y') }}</span>
                </div>
            </header>

            <!-- Content -->
            <div class="p-8 fade-in">
                @yield('content')
            </div>
        </main>

    </div>
</body>
</html>