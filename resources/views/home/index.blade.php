<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List Q</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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

        /* Moving Background */
        body {
            background: linear-gradient(-45deg, #0d0d0d, #1b1f38, #212a45, #0d0d0d);
            background-size: 400% 400%;
            animation: gradientMove 15s infinite linear;
        }

        /* Efek Gelombang */
        @keyframes waveText {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .wave-text span {
            display: inline-block;
            animation: waveText 1s ease-in-out;
            transition-delay: 3s;
        }
    </style>
</head>

<body class="h-screen flex flex-col justify-center text-white text-left px-10 md:px-20 lg:px-40">

    <!-- Navbar -->
    <nav class="absolute top-5 left-5">
        <a href="#" class="text-3xl font-bold">Q</a>
    </nav>

    <!-- Konten -->
    <div class="z-20 max-w-5.8xl">
        <h1 id="animatedText" class="wave-text text-9xl md:text-5xl lg:text-7xl font-bold leading-snug">
            Welcome&nbsp; to&nbsp; <span class="text-blue-400">To&nbsp; Do &nbsp;List-Q</span> <br><br><br>
            <span class="text-gray-400">&nbsp;Streamline &nbsp;Your &nbsp;Workflows</span>
        </h1>
        <p class="mt-3 text-lg md:text-xl text-gray-300">
            Plan, manage, and track all your team's projects on one customizable platform. <br>
            Select what you'd like to manage:
        </p>

        <!-- Buttons -->
        <div class="mt-5 flex gap-4">

            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <!-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> -->

            @if (Route::has('register'))
            <a href="{{ route('register') }}">
                <button class="px-6 py-3 text-lg font-semibold uppercase border-2 border-white text-white rounded-full transition-all relative overflow-hidden group">
                    Get Started
                </button>
            </a>
            @endif
            @endauth
            @endif

            <button class="px-6 py-3 text-lg font-semibold uppercase border-2 border-white text-white rounded-full transition-all relative overflow-hidden group">
                About
            </button>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Efek Gelombang per Huruf
        const textElement = document.getElementById("animatedText");
        const textContent = textElement.innerText;
        textElement.innerHTML = "";

        textContent.split("").forEach((char, index) => {
            const span = document.createElement("span");
            span.textContent = char;
            span.style.animationDelay = `${index * 50}ms`;
            textElement.appendChild(span);
        });
    </script>

</body>

</html>