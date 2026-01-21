<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <i class="fas fa-store text-primary me-2"></i>
            <span class="fw-bold">ShopEasy</span>
        </a>
        
        <!-- Right Links -->
        <ul class="navbar-nav ms-auto">
            @auth
            <!-- Logged In: Show Profile -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user me-1"></i>
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <!-- Not Logged In: Show Login/Register -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt me-1"></i> Login
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    <i class="fas fa-user-plus me-1"></i> Register
                </a>
            </li>
            @endauth
        </ul>
    </div>
</nav>

<style>
    .navbar {
        padding: 15px 0;
    }
    
    .nav-link {
        font-weight: 500;
        padding: 8px 12px !important;
    }
    
    .btn-link {
        text-decoration: none;
        padding: 8px 12px;
    }
    
    .btn-link:hover {
        background-color: rgba(220, 53, 69, 0.1);
        border-radius: 5px;
    }
</style>