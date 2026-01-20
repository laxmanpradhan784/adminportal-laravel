<div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse police-sidebar" id="sidebar" style="background: linear-gradient(180deg, #0f0f23 0%, #1a1a2e 100%); border-right: 3px solid #4361ee; box-shadow: 5px 0 25px rgba(0, 0, 0, 0.4);">
    <div class="position-sticky pt-4">
        <!-- Navigation Menu -->
        <ul class="nav flex-column police-nav">
            <li class="nav-item police-nav-item">
                <a class="nav-link police-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div class="nav-icon-container">
                        <i class="fas fa-tachometer-alt"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="nav-text">
                        <div class="nav-title">DASHBOARD</div>
                        <div class="nav-subtitle">System Overview</div>
                    </div>
                    <div class="nav-badge">
                        <span class="badge badge-stat">12</span>
                    </div>
                </a>
            </li>
            
            <li class="nav-item police-nav-item">
                <a class="nav-link police-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <div class="nav-icon-container">
                        <i class="fas fa-box"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="nav-text">
                        <div class="nav-title">PRODUCTS</div>
                        <div class="nav-subtitle">Manage Inventory</div>
                    </div>
                    <div class="nav-badge">
                        <span class="badge badge-alert">5</span>
                    </div>
                </a>
            </li>
            
            <li class="nav-item police-nav-item">
                <a class="nav-link police-nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <div class="nav-icon-container">
                        <i class="fas fa-users"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="nav-text">
                        <div class="nav-title">USERS</div>
                        <div class="nav-subtitle">User Management</div>
                    </div>
                    <div class="nav-badge">
                        <span class="badge badge-new">3</span>
                    </div>
                </a>
            </li>
            
            <li class="nav-item police-nav-item">
                <a class="nav-link police-nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}" href="{{ route('contacts.index') }}">
                    <div class="nav-icon-container">
                        <i class="fas fa-envelope"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="nav-text">
                        <div class="nav-title">CONTACTS</div>
                        <div class="nav-subtitle">Messages & Inquiries</div>
                    </div>
                    <div class="nav-badge">
                        <span class="badge badge-warning">8</span>
                    </div>
                </a>
            </li>
            
            <li class="nav-item police-nav-item">
                <a class="nav-link police-nav-link {{ request()->routeIs('sliders.*') ? 'active' : '' }}" href="{{ route('sliders.index') }}">
                    <div class="nav-icon-container">
                        <i class="fas fa-images"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="nav-text">
                        <div class="nav-title">SLIDERS</div>
                        <div class="nav-subtitle">Media Content</div>
                    </div>
                    <div class="nav-badge">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </a>
            </li>
        </ul>
        
        <!-- Sidebar Footer -->
        <div class="sidebar-footer mt-5 pt-4 border-top border-secondary">
            <div class="logout-section mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn police-logout-btn w-100">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        SECURE LOGOUT
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Police Sidebar Styles */
    .police-sidebar {
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }
    
    .police-sidebar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 80%, rgba(67, 97, 238, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(76, 201, 240, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }
    
    /* Sidebar Header */
    .sidebar-header {
        padding: 0 15px;
    }
    
    .sidebar-logo {
        padding: 20px 0;
        border-bottom: 1px solid rgba(67, 97, 238, 0.3);
    }
    
    .logo-shield {
        width: 70px;
        height: 70px;
        margin: 0 auto;
        background: linear-gradient(135deg, #4361ee, #7209b7);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        box-shadow: 0 6px 20px rgba(114, 9, 183, 0.7);
        border: 3px solid rgba(255, 255, 255, 0.5);
        position: relative;
        animation: pulse 3s infinite;
    }
    
    .shield-glow {
        position: absolute;
        top: -15px;
        left: -15px;
        right: -15px;
        bottom: -15px;
        background: radial-gradient(circle, rgba(76, 201, 240, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        animation: rotate 15s linear infinite;
    }
    
    .logo-text {
        color: white;
    }
    
    .logo-title {
        font-size: 1.8rem;
        font-weight: 900;
        letter-spacing: 3px;
        background: linear-gradient(135deg, #fff, #4cc9f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 2px 10px rgba(76, 201, 240, 0.3);
    }
    
    .logo-subtitle {
        font-size: 0.85rem;
        color: #4cc9f0;
        letter-spacing: 2px;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: -3px;
    }
    
    .logo-version {
        font-size: 0.65rem;
        color: rgba(255, 255, 255, 0.5);
        letter-spacing: 1px;
        font-family: monospace;
        margin-top: 5px;
    }
    
    .status-indicators {
        display: flex;
        gap: 20px;
    }
    
    .status-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .status-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-bottom: 5px;
    }
    
    .status-dot.online {
        background: #06d6a0;
        box-shadow: 0 0 10px #06d6a0;
        animation: blink 2s infinite;
    }
    
    .status-dot.secure {
        background: #4361ee;
        box-shadow: 0 0 10px #4361ee;
        animation: blink 2s infinite 0.5s;
    }
    
    .status-label {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.7rem;
        letter-spacing: 1px;
        font-weight: 600;
    }
    
    /* Navigation Menu */
    .police-nav {
        padding: 20px 15px;
    }
    
    .police-nav-item {
        margin-bottom: 10px;
    }
    
    .police-nav-link {
        display: flex;
        align-items: center;
        padding: 15px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid transparent;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .police-nav-link::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: #4361ee;
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }
    
    .police-nav-link:hover {
        background: rgba(67, 97, 238, 0.15);
        border-color: rgba(67, 97, 238, 0.5);
        transform: translateX(5px);
        box-shadow: 0 5px 20px rgba(67, 97, 238, 0.3);
    }
    
    .police-nav-link:hover::before {
        transform: scaleY(1);
    }
    
    .police-nav-link.active {
        background: linear-gradient(90deg, rgba(67, 97, 238, 0.2), rgba(76, 201, 240, 0.1));
        border: 1px solid #4361ee;
        box-shadow: 0 5px 20px rgba(67, 97, 238, 0.4);
    }
    
    .police-nav-link.active::before {
        transform: scaleY(1);
        background: #4cc9f0;
    }
    
    .police-nav-link.active .nav-icon-container {
        background: linear-gradient(135deg, #4361ee, #7209b7);
    }
    
    .nav-icon-container {
        width: 40px;
        height: 40px;
        background: rgba(67, 97, 238, 0.2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #4cc9f0;
        font-size: 1.1rem;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .icon-glow {
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        background: radial-gradient(circle, rgba(76, 201, 240, 0.2) 0%, transparent 70%);
        border-radius: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .police-nav-link:hover .icon-glow {
        opacity: 1;
    }
    
    .nav-text {
        flex: 1;
    }
    
    .nav-title {
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    
    .nav-subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.75rem;
        margin-top: 2px;
    }
    
    .nav-badge {
        margin-left: 10px;
    }
    
    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1px;
        min-width: 25px;
        text-align: center;
    }
    
    .badge-stat {
        background: linear-gradient(135deg, #4361ee, #7209b7);
        color: white;
    }
    
    .badge-alert {
        background: linear-gradient(135deg, #f72585, #b5179e);
        color: white;
        animation: pulse-red 1.5s infinite;
    }
    
    .badge-new {
        background: linear-gradient(135deg, #06d6a0, #0496c7);
        color: white;
    }
    
    .badge-warning {
        background: linear-gradient(135deg, #ff9e00, #ff5400);
        color: white;
        animation: pulse-orange 1.5s infinite;
    }
    
    .badge-info {
        background: linear-gradient(135deg, #4cc9f0, #4361ee);
        color: white;
    }
    
    /* Sidebar Footer */
    .sidebar-footer {
        padding: 0 20px 20px;
    }
    
    .footer-time {
        color: #4cc9f0;
        font-family: monospace;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 2px;
    }
    
    .footer-date {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        letter-spacing: 1px;
    }
    
    .system-progress {
        margin-top: 15px;
    }
    
    .progress-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.8rem;
        margin-bottom: 5px;
    }
    
    .police-progress {
        height: 6px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 3px;
        overflow: hidden;
    }
    
    .police-progress .progress-bar {
        background: linear-gradient(90deg, #06d6a0, #4cc9f0);
        border-radius: 3px;
        animation: progress-pulse 2s infinite;
    }
    
    .police-logout-btn {
        background: linear-gradient(135deg, rgba(247, 37, 133, 0.2), rgba(183, 23, 158, 0.2));
        border: 1px solid rgba(247, 37, 133, 0.4);
        color: #f72585;
        padding: 12px;
        border-radius: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    
    .police-logout-btn:hover {
        background: linear-gradient(135deg, rgba(247, 37, 133, 0.3), rgba(183, 23, 158, 0.3));
        border-color: rgba(247, 37, 133, 0.7);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(247, 37, 133, 0.4);
        color: white;
    }
    
    /* Animations */
    @keyframes pulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(67, 97, 238, 0.7);
        }
        50% {
            box-shadow: 0 0 0 15px rgba(67, 97, 238, 0);
        }
    }
    
    @keyframes pulse-red {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(247, 37, 133, 0.7);
        }
        50% {
            box-shadow: 0 0 0 8px rgba(247, 37, 133, 0);
        }
    }
    
    @keyframes pulse-orange {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(255, 158, 0, 0.7);
        }
        50% {
            box-shadow: 0 0 0 8px rgba(255, 158, 0, 0);
        }
    }
    
    @keyframes progress-pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }
    
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .police-sidebar {
            width: 280px;
        }
        
        .nav-subtitle {
            display: none;
        }
        
        .logo-text {
            display: none;
        }
        
        .sidebar-footer {
            display: none;
        }
    }
</style>

<script>
    // Update sidebar time
    function updateSidebarTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', {hour12: false});
        const timeElement = document.getElementById('sidebar-time');
        if(timeElement) {
            timeElement.textContent = timeString;
        }
    }
    
    setInterval(updateSidebarTime, 1000);
    
    // Add active state animation
    document.querySelectorAll('.police-nav-link').forEach(link => {
        link.addEventListener('click', function() {
            // Remove active class from all links
            document.querySelectorAll('.police-nav-link').forEach(l => {
                l.classList.remove('active');
            });
            
            // Add active class to clicked link
            this.classList.add('active');
        });
    });
    
    // Animate progress bar
    const progressBar = document.querySelector('.police-progress .progress-bar');
    let progress = 42;
    let direction = 1;
    
    function animateProgressBar() {
        if(progressBar) {
            progress += direction;
            if(progress > 70 || progress < 30) direction *= -1;
            progressBar.style.width = progress + '%';
            progressBar.parentElement.querySelector('.progress-label span:last-child').textContent = progress + '%';
        }
    }
    
    setInterval(animateProgressBar, 3000);
</script>