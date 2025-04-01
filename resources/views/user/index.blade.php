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
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        body {
            background: linear-gradient(-45deg, #0d0d0d, #1b1f38, #212a45, #0d0d0d);
            background-size: 400% 400%;
            animation: gradientMove 15s infinite linear;
        }

        /* Sidebar dan konten transition */
        .sidebar {
            transition: transform 0.3s, width 0.3s;
        }

        .content {
            transition: margin-left 0.3s;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .content.active {
            margin-left: 16rem;
        }
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
                <form id="taskForm">
                    <input type="text" id="taskTitle" placeholder="Task Name" required class="rounded bg-gray-900 text-white border p-2 rounded">
                    <input type="date" id="taskDueDate" required class="rounded bg-gray-900 text-white border p-2 rounded">
                    <select id="taskPriority" class="rounded bg-gray-900 text-white border p-2 rounded">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    <select id="taskStatus" class="rounded bg-gray-900 text-white border p-2 rounded">
                        <option value="to_do">To Do</option>
                        <option value="in_progress">In Progress</option>
                        <option value="complete">Complete</option>
                    </select>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Task</button>
                </form>

            </div>
            <table class="w-full border-collapse border border-gray-300 text-white">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="border p-2">Task</th>
                        <th class="border p-2">Due Date</th>
                        <th class="border p-2">Priority</th>
                        <th class="border p-2">Status</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                </thead>
                <tbody id="taskTableBody">
                    <!-- Data dari backend akan dimasukkan di sini -->
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

<script>
document.getElementById("taskForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let title = document.getElementById("taskTitle").value;
    let dueDate = document.getElementById("taskDueDate").value;
    let priority = document.getElementById("taskPriority").value;
    let status = document.getElementById("taskStatus").value;

    fetch("http://127.0.0.1:8000/api/tasks", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            title: title,
            due_date: dueDate,
            priority: priority,
            status: status
        })
    })
    .then(response => response.json())
    .then(() => {
        fetchTasks(); // Refresh data di tabel
        document.getElementById("taskForm").reset();
    })
    .catch(error => console.error("Error adding task:", error));
});
</script>
y
    <script>
        document.getElementById("taskForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let title = document.getElementById("taskTitle").value;
            let dueDate = document.getElementById("taskDueDate").value;
            let priority = document.getElementById("taskPriority").value;
            let status = document.getElementById("taskStatus").value;

            fetch("http://127.0.0.1:8000/api/tasks", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        title: title,
                        due_date: dueDate,
                        priority: priority,
                        status: status
                    })
                })
                .then(response => response.json())
                .then(() => {
                    fetchTasks(); // Refresh data di tabel
                    document.getElementById("taskForm").reset();
                })
                .catch(error => console.error("Error adding task:", error));
        });
    </script>

    <script>
        function deleteTask(taskId) {
            if (confirm("Are you sure you want to delete this task?")) {
                fetch(`http://127.0.0.1:8000/api/tasks/${taskId}`, {
                        method: "DELETE"
                    })
                    .then(() => fetchTasks())
                    .catch(error => console.error("Error deleting task:", error));
            }
        }
    </script>


</body>

</html>