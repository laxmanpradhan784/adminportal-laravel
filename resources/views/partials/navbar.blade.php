<nav class="navbar navbar-expand-lg " style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3); border-bottom: 3px solid #4361ee;">
    <div class="container-fluid">
        <!-- Left: Menu Toggle with Police Badge Style -->
        <button class="navbar-toggler police-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
            <div class="police-badge">
                <i class="fas fa-bars"></i>
            </div>
            <span class="ms-2 d-none d-md-inline" style="color: white; font-weight: 500;">MENU</span>
        </button>
        
        <!-- Center: Brand with Police Shield -->
        <a class="navbar-brand mx-auto police-brand" href="{{ route('admin.dashboard') }}">
            <div class="shield-container">
                <div class="shield-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="brand-text">
                    <span class="brand-main">E-COMMERCE</span>
                    <span class="brand-sub">COMMAND CENTER</span>
                </div>
            </div>
        </a>
        
        <!-- Right: User Dropdown with Police Badge -->
        <div class="dropdown police-dropdown">
            <button class="btn police-user-btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                <div class="user-badge">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="user-info ms-2 text-start">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">ADMIN OFFICER</div>
                </div>
                <i class="fas fa-chevron-down ms-2"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end police-dropdown-menu">
                <li>
                    <a class="dropdown-item police-dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="fas fa-id-card me-2"></i>
                        <span>Officer Profile</span>
                        <span class="badge badge-pulse">ID</span>
                    </a>
                </li>
                
                <li><hr class="dropdown-divider police-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item police-dropdown-item police-logout">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            <span>Secure Logout</span>
                            <i class="fas fa-lock ms-auto"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Police Style Navbar */
    .police-toggler {
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid #4361ee;
        border-radius: 10px;
        padding: 8px 15px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .police-toggler:hover {
        background: rgba(67, 97, 238, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    }
    
    .police-badge {
        width: 35px;
        height: 35px;
        background: linear-gradient(135deg, #4361ee, #3a56d4);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        box-shadow: 0 3px 10px rgba(67, 97, 238, 0.5);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }
    
    /* Police Shield Brand */
    .police-brand {
        padding: 5px 20px;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 15px;
        border: 2px solid rgba(67, 97, 238, 0.5);
    }
    
    .shield-container {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .shield-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #4361ee, #7209b7);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        box-shadow: 0 4px 15px rgba(114, 9, 183, 0.5);
        border: 3px solid rgba(255, 255, 255, 0.4);
        animation: pulse 2s infinite;
    }
    
    .brand-text {
        display: flex;
        flex-direction: column;
        text-align: left;
    }
    
    .brand-main {
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        letter-spacing: 1.5px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }
    
    .brand-sub {
        color: #4cc9f0;
        font-size: 0.8rem;
        letter-spacing: 2px;
        font-weight: 600;
    }
    
    /* User Dropdown Police Style */
    .police-user-btn {
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(76, 201, 240, 0.5);
        border-radius: 10px;
        padding: 8px 15px;
        color: white;
        transition: all 0.3s ease;
    }
    
    .police-user-btn:hover {
        background: rgba(76, 201, 240, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(76, 201, 240, 0.4);
    }
    
    .user-badge {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #4cc9f0, #4361ee);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 3px 10px rgba(76, 201, 240, 0.5);
    }
    
    .user-name {
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }
    
    .user-role {
        color: #4cc9f0;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    
    /* Dropdown Menu Police Style */
    .police-dropdown-menu {
        background: #1a1a2e;
        border: 2px solid #4361ee;
        border-radius: 10px;
        padding: 10px;
        margin-top: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        min-width: 250px;
    }
    
    .police-dropdown-item {
        color: #e2e8f0;
        padding: 12px 15px;
        border-radius: 8px;
        margin: 3px 0;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .police-dropdown-item:hover {
        background: rgba(67, 97, 238, 0.3);
        color: white;
        transform: translateX(5px);
    }
    
    .police-dropdown-item i {
        color: #4cc9f0;
        width: 20px;
    }
    
    .badge-pulse {
        background: linear-gradient(135deg, #4361ee, #7209b7);
        color: white;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.7rem;
        margin-left: auto;
        animation: pulse 2s infinite;
    }
    
    .badge-count {
        background: #f72585;
        color: white;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.7rem;
        margin-left: auto;
    }
    
    .police-divider {
        border-color: #4361ee;
        opacity: 0.5;
        margin: 10px 0;
    }
    
    .police-logout {
        color: #f72585 !important;
        font-weight: 600;
    }
    
    .police-logout:hover {
        background: rgba(247, 37, 133, 0.2) !important;
    }
    
    /* Animations */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(67, 97, 238, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(67, 97, 238, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(67, 97, 238, 0);
        }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .police-brand .brand-text {
            display: none;
        }
        
        .user-info {
            display: none;
        }
        
        .police-user-btn {
            padding: 8px 10px;
        }
    }
</style>