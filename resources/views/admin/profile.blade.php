@extends('layouts.app')

@section('title', 'Admin Profile')

@section('content')
    <div class="container py-4 pt-5">
        <!-- Profile Card -->
        <div class="profile-card">
            <!-- Profile Details -->
            <div class="profile-content">
                <h4 class="mb-4">
                    <i class="fas fa-id-card me-2"></i> Profile Information
                </h4>
                
                <div class="mb-4">
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-label">Email</div>
                        <div class="info-value">admin@example.com</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-label">Phone</div>
                        <div class="info-value">+1 (555) 123-4567</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="info-label">Position</div>
                        <div class="info-value">System Administrator</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="info-label">Joined</div>
                        <div class="info-value">January 15, 2023</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-label">Location</div>
                        <div class="info-value">New York, USA</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span class="badge bg-success">
                                <i class="fas fa-check-circle me-1"></i> Active
                            </span>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --light: #f8f9fa;
            --dark: #212529;
            --radius: 12px;
            --shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .profile-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            max-width: 900px;
            margin: 0 auto;
            overflow: hidden;
        }
        
        .profile-header {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 30px;
            position: relative;
        }
        
        .avatar-container {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .avatar-icon {
            font-size: 48px;
            color: var(--primary);
        }
        
        .profile-content {
            padding: 30px;
        }
        
        .info-row {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            margin-right: 15px;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
            min-width: 120px;
        }
        
        .info-value {
            color: var(--dark);
            flex: 1;
        }
        
        .btn-edit {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-edit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-logout {
            background: transparent;
            color: #dc3545;
            border: 1px solid #dc3545;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-logout:hover {
            background: #dc3545;
            color: white;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 25px;
        }
        
        .stat-card {
            background: var(--light);
            padding: 20px;
            border-radius: var(--radius);
            text-align: center;
            border-left: 4px solid var(--primary);
        }
        
        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 13px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        @media (max-width: 768px) {
            .profile-card {
                margin: 20px;
            }
            
            .profile-header {
                padding: 20px;
            }
            
            .profile-content {
                padding: 20px;
            }
            
            .info-label {
                min-width: 100px;
            }
            
            .btn-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-edit, .btn-logout {
                width: 100%;
            }
        }
    </style>

    <script>
        
        // Add hover effects to info rows
        const infoRows = document.querySelectorAll('.info-row');
        infoRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'rgba(67, 97, 238, 0.03)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    </script>
@endsection