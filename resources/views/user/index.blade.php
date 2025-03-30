<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List-Q - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi background gradient */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        body {
            background: linear-gradient(-45deg, #0d0d0d, #1b1f38, #212a45, #0d0d0d);
            background-size: 400% 400%;
            animation: gradientMove 15s infinite linear;
        }
        /* Sidebar dan konten transition */
        .sidebar { transition: transform 0.3s, width 0.3s; }
        .content { transition: margin-left 0.3s; }
        .sidebar.active { transform: translateX(0); }
        .content.active { margin-left: 16rem; }
    </style>
</head>
<body class="h-screen flex text-white">

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed top-0 left-0 w-64 h-full bg-gray-900 p-5 transform -translate-x-full md:translate-x-0">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">List-Q</h2>
            <button onclick="toggleSidebar()" class="text-white text-2xl md:hidden">&times;</button>
        </div>
        <nav class="mt-10 space-y-4">
            <a href="#" onclick="showPage('dashboard')" class="block px-4 py-2 rounded hover:bg-gray-700">🏠 Dashboard</a>
            <a href="#" onclick="showPage('tasks')" class="block px-4 py-2 rounded hover:bg-gray-700">📋 My Tasks</a>
            <a href="#" onclick="showPage('settings')" class="block px-4 py-2 rounded hover:bg-gray-700">⚙️ Settings</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div id="content" class="content flex-1 flex flex-col ml-0 md:ml-64">
        <!-- Navbar -->
        <nav class="bg-gray-800 p-4 flex items-center">
            <button onclick="toggleSidebar()" class="text-white text-2xl mr-4 md:hidden">&#9776;</button>
            <h1 class="text-xl font-semibold">Welcome, User</h1>
            <div class="ml-auto">
                <button class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center">
                    <span class="text-xl">👤</span>
                </button>
            </div>
        </nav>

        <!-- Dashboard Page -->
        <section id="dashboard" class="p-6">
            <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
            <p>Selamat datang di List-Q! Mulai kelola tugasmu dengan lebih efisien 🚀</p>
        </section>

        <!-- My Tasks Page -->
        <section id="tasks" class="p-6 hidden">
            <h2 class="text-2xl font-bold mb-4">📋 My Tasks</h2>
            <input type="text" placeholder="Cari tugas..." class="p-2 rounded bg-gray-900 text-white w-full mb-4">
            <div class="flex space-x-2 mb-4">
                <select class="p-2 rounded bg-gray-900 text-white">
                    <option>Status: All</option>
                    <option>Complete</option>
                    <option>In Progress</option>
                    <option>To Do</option>
                </select>
                <select class="p-2 rounded bg-gray-900 text-white">
                    <option>Priority: All</option>
                    <option>Low</option>
                    <option>Medium</option>
                    <option>High</option>
                </select>
                <button class="bg-blue-500 px-3 py-2 rounded">➕ Add Task</button>
            </div>
            <table class="min-w-full bg-gray-800 border border-gray-700 rounded-lg">
                <thead>
                    <tr class="bg-gray-700 text-gray-300">
                        <th class="py-3 px-4 text-left">Task</th>
                        <th class="py-3 px-4 text-left">Due Date</th>
                        <th class="py-3 px-4 text-left">Priority</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-700">
                        <td class="py-3 px-4">Complete UI Design</td>
                        <td class="py-3 px-4">April 5, 2025</td>
                        <td class="py-3 px-4">High</td>
                        <td class="py-3 px-4">In Progress</td>
                        <td class="py-3 px-4">
                            <button class="bg-blue-500 px-3 py-1 rounded text-white">Edit</button>
                            <button class="bg-red-500 px-3 py-1 rounded text-white ml-2">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Settings Page -->
        <section id="settings" class="p-6 hidden">
            <h2 class="text-2xl font-bold mb-4">⚙️ Settings</h2>
            <div class="mb-4">
                <label class="block mb-2">Mode Tampilan</label>
                <select class="p-2 rounded bg-gray-900 text-white">
                    <option>Dark Mode</option>
                    <option>Light Mode</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Notifikasi Pengingat</label>
                <input type="checkbox" checked class="mr-2"> Aktifkan Pengingat
            </div>
            <div class="mb-4">
                <label class="block mb-2">Kategori Tugas</label>
                <input type="text" placeholder="Tambah kategori..." class="p-2 rounded bg-gray-900 text-white w-full">
            </div>
        </section>
    </div>

    <!-- JavaScript -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const content = document.getElementById("content");
            sidebar.classList.toggle("-translate-x-full");
            content.classList.toggle("ml-0");
            content.classList.toggle("ml-64");
        }

        function showPage(page) {
            document.querySelectorAll("section").forEach(sec => sec.classList.add("hidden"));
            document.getElementById(page).classList.remove("hidden");
        }
    </script>

</body>
</html>
