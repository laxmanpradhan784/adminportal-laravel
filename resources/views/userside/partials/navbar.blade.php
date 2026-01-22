<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-store text-primary me-2"></i>
            <span class="fw-bold">ShopEasy</span>
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left Side Links -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">
                        <i class="fas fa-shopping-bag me-1"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact')}}">
                        <i class="fas fa-envelope me-1"></i> Contact
                    </a>
                </li>
            </ul>
            
            <!-- Right Side Links -->
            <ul class="navbar-nav">
                @auth
                <!-- Logged In - Show Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user me-2"></i> My Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <!-- Not Logged In - Show Login/Register -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary ms-2" href="{{ route('register') }}">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        padding: 12px 0;
    }
    
    .nav-link {
        font-weight: 500;
        padding: 8px 12px !important;
        border-radius: 6px;
        transition: all 0.3s;
    }
    
    .nav-link:hover {
        background-color: rgba(67, 97, 238, 0.1);
        color: #4361ee !important;
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-radius: 10px;
        padding: 8px;
        margin-top: 8px;
    }
    
    .dropdown-item {
        padding: 10px 15px;
        border-radius: 6px;
        margin: 2px 0;
    }
    
    .dropdown-item:hover {
        background-color: #f8f9fa;
    }
    
    .btn-primary {
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: 500;
    }
    
    @media (max-width: 768px) {
        .navbar-nav {
            margin-top: 15px;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .btn-primary {
            margin-top: 10px;
            width: 100%;
        }
    }
</style>