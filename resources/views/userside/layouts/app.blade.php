<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Account')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', system-ui, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex: 1;
            padding-top: 20px;
            padding-bottom: 40px;
        }
        
        .container {
            max-width: 1200px;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    @include('userside.partials.navbar')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('userside.partials.footer')
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Live time update
        function updateTime() {
            const now = new Date();
            const timeElement = document.getElementById('live-time');
            if(timeElement) {
                const timeString = now.toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                timeElement.textContent = timeString;
            }
        }
        
        setInterval(updateTime, 60000);
        updateTime();
    </script>
    
    @stack('scripts')
</body>
</html>