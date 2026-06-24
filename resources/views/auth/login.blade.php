<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome - Login</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --primary: #4F46E5;
        --primary-hover: #4338CA;
        --bg-color: #F3F4F6;
        --text-main: #111827;
        --text-muted: #6B7280;
    }
    * { box-sizing: border-box; font-family: 'Inter', sans-serif; }
    body, html {
        margin: 0; padding: 0; height: 100%;
        background-color: var(--bg-color);
    }
    .wrapper {
        display: flex;
        height: 100vh;
        width: 100%;
    }
    .left-panel {
        flex: 1;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.9) 0%, rgba(59, 130, 246, 0.9) 100%), url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1453&q=80') center/cover;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        padding: 40px;
        text-align: center;
    }
    .left-panel h1 { font-size: 3rem; font-weight: 700; margin-bottom: 20px; }
    .left-panel p { font-size: 1.25rem; font-weight: 300; opacity: 0.9; max-width: 500px; line-height: 1.6; }
    
    .right-panel {
        width: 100%;
        max-width: 500px;
        background: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 60px;
        box-shadow: -10px 0 30px rgba(0,0,0,0.05);
    }
    
    .login-container h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 10px;
    }
    .login-container p.subtitle {
        color: var(--text-muted);
        margin-bottom: 40px;
        font-size: 1rem;
    }
    
    .form-group { margin-bottom: 24px; }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-main);
        font-size: 0.9rem;
    }
    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #D1D5DB;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
    }
    
    .checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    .checkbox input { margin-right: 10px; width: 16px; height: 16px; cursor: pointer; }
    .checkbox label { font-size: 0.9rem; color: var(--text-muted); cursor: pointer; user-select: none; }
    
    .btn-login {
        width: 100%;
        padding: 14px;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.1s;
    }
    .btn-login:hover { background-color: var(--primary-hover); }
    .btn-login:active { transform: scale(0.98); }
    
    .alert {
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 0.9rem;
    }
    .alert-success { background-color: #D1FAE5; color: #065F46; border: 1px solid #A7F3D0; }
    .alert-danger { background-color: #FEE2E2; color: #991B1B; border: 1px solid #FECACA; }
    .alert button.close {
        float: right;
        background: none;
        border: none;
        font-size: 1.2rem;
        cursor: pointer;
        color: inherit;
        opacity: 0.7;
    }
    .alert button.close:hover { opacity: 1; }
    
    @media (max-width: 768px) {
        .wrapper { flex-direction: column; }
        .left-panel { display: none; }
        .right-panel { max-width: 100%; padding: 40px 20px; }
    }
</style>
</head>
<body>
    <div class="wrapper">
        <div class="left-panel">
            <h1>{{ isset($setting) ? $setting->name : 'Clinic Management System' }}</h1>
            <p>Welcome to our modern, secure, and fully-featured clinic management portal. Streamline your workflow and focus on what matters most: patient care.</p>
        </div>
        
        <div class="right-panel">
            <div class="login-container">
                <h2>Sign In</h2>
                <p class="subtitle">Access your dashboard</p>

                @if ($success = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                    <strong>{{ $success }}</strong>
                </div>
                @endif
                
                @if(isset($errors) && count($errors))
                <div class="alert alert-danger">
                    <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                    @foreach($errors->all() as $error)
                         <div style="margin-bottom: 4px;"><strong>{{ $error }}</strong></div>
                    @endforeach
                </div>
                @endif

                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input class="form-control" id="name" placeholder="Enter your username" name="name" type="text" autofocus required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" placeholder="Enter your password" name="password" type="password" required>
                    </div>
                    
                    <div class="checkbox">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me for 30 days</label>
                    </div>
                    
                    <button type="submit" class="btn-login">Login to Dashboard</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
