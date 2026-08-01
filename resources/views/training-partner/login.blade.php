@php
    $stats = [
        ['value' => '500+', 'label' => 'Courses Listed', 'icon' => 'CL'],
        ['value' => '1000+', 'label' => 'Freshers Trained', 'icon' => 'FT'],
        ['value' => '200+', 'label' => 'Hiring Companies', 'icon' => 'HC'],
    ];
    $features = [
        ['title' => 'Industry Relevant Courses', 'text' => 'Create and manage in-demand courses', 'icon' => 'IR'],
        ['title' => 'Track & Monitor', 'text' => 'Monitor training progress in real-time', 'icon' => 'TM'],
        ['title' => 'Assess & Certify', 'text' => 'Assess skills and issue certificates', 'icon' => 'AC'],
        ['title' => 'Placement Support', 'text' => 'Help freshers get placed in top companies', 'icon' => 'PS'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Partner Login</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#071849;background:#fff;font-weight:500}
        a{text-decoration:none;color:inherit}
        .page{min-height:100vh;padding:22px 24px 18px;background:linear-gradient(135deg,#fff,#f7f3ff)}
        .topbar{height:58px;display:flex;align-items:center;justify-content:space-between;gap:22px;margin-bottom:20px}
        .logo img{width:245px;display:block}
        .top-right{display:flex;align-items:center;gap:18px}
        .stats{display:grid;grid-template-columns:repeat(3,1fr);border:1px solid #d8dff1;border-radius:7px;overflow:hidden;background:#fff}
        .stat{min-width:145px;height:50px;display:flex;align-items:center;gap:12px;padding:8px 14px;border-right:1px solid #d8dff1}
        .stat:last-child{border-right:0}
        .icon{width:34px;height:34px;border-radius:10px;background:#f0eaff;color:#5a2ee6;display:inline-flex;align-items:center;justify-content:center;font-size:10px;font-weight:800;flex:0 0 auto}
        .stat strong{display:block;font-size:15px}
        .stat span:last-child{font-size:11px;color:#41527d}
        .role{height:50px;border:0;border-radius:6px;background:#5b2ce1;color:#fff;padding:0 24px;font-size:15px;font-weight:700}
        .auth-card{border:1px solid #d8d4ff;border-radius:8px;background:#fff;box-shadow:0 14px 34px rgba(60,35,150,.08);display:grid;grid-template-columns:40% 60%;overflow:hidden}
        .intro{padding:58px 54px 36px;background:linear-gradient(145deg,#fff,#faf7ff)}
        .intro h1{margin:0 0 20px;font-size:34px;line-height:1.35;font-weight:800;letter-spacing:0}
        .intro h1 span{color:#5b2ce1}
        .intro p{margin:0;color:#41527d;font-size:16px;line-height:1.7;max-width:470px}
        .illustration{margin-top:34px;display:flex;justify-content:center}
        .illustration img{width:min(480px,100%);height:430px;object-fit:contain;object-position:center bottom}
        .form-wrap{padding:24px 38px 18px;display:flex;align-items:center}
        .form-panel{width:100%;border:1px solid #dfe6f5;border-radius:8px;padding:22px 24px 18px;background:#fff}
        .tabs{display:grid;grid-template-columns:1fr 1fr;border-bottom:1px solid #dfe6f5;margin-bottom:24px}
        .tab{height:44px;border:0;background:transparent;color:#657190;font-size:18px;font-weight:800;cursor:pointer}
        .tab.active{color:#5b2ce1;border-bottom:3px solid #5b2ce1}
        [hidden]{display:none!important}
        .form{display:none}
        .form.active{display:block}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:24px 34px}
        .field.full{grid-column:1/-1}
        label{display:block;margin-bottom:9px;font-size:13px;font-weight:800}
        label span{color:#ff2036}
        .control{height:46px;border:1px solid #cfd8eb;border-radius:6px;display:grid;grid-template-columns:48px 1fr;align-items:center;background:#fff;overflow:hidden}
        .control .input-icon{height:100%;border-right:1px solid #dfe6f5;display:flex;align-items:center;justify-content:center;color:#657190;font-weight:800}
        input,select{width:100%;height:100%;border:0;outline:0;padding:0 14px;font-size:13px;color:#071849;background:transparent}
        input::placeholder{color:#6e7da2}
        .password{grid-template-columns:48px 1fr 42px}
        .eye{border:0;background:transparent;color:#657190;font-weight:800;cursor:pointer}
        .terms{display:flex;align-items:center;gap:10px;margin:18px 0;font-size:13px;color:#41527d}
        .terms input{width:18px;height:18px}
        .terms a{color:#5b2ce1;font-weight:800}
        .primary{width:100%;height:44px;border:0;border-radius:6px;background:#5b2ce1;color:#fff;font-size:15px;font-weight:800;cursor:pointer}
        .divider{display:flex;align-items:center;gap:18px;margin:20px auto 16px;max-width:280px;color:#657190;font-size:13px}
        .divider:before,.divider:after{content:"";height:1px;background:#e3e8f4;flex:1}
        .google{height:42px;width:46%;min-width:260px;margin:0 auto;display:flex;align-items:center;justify-content:center;gap:14px;border:1px solid #d2dbea;border-radius:6px;background:#fff;font-weight:800;cursor:pointer}
        .google span{color:#ea4335;font-size:18px}
        .switch{text-align:center;margin:18px 0 0;color:#657190;font-size:13px}
        .switch button{border:0;background:transparent;color:#5b2ce1;font-weight:800;cursor:pointer}
        .feature-bar{margin-top:24px;border:1px solid #dfe6f5;border-radius:8px;background:#fff;display:grid;grid-template-columns:repeat(4,1fr);gap:0;padding:14px 22px}
        .feature{display:flex;align-items:center;gap:16px;padding:0 20px;border-right:1px solid #eef2f8}
        .feature:last-child{border-right:0}
        .feature h3{margin:0 0 6px;font-size:14px}
        .feature p{margin:0;color:#41527d;font-size:12px}
        .copyright{text-align:center;color:#41527d;font-size:12px;margin:16px 0 0}
        @media(max-width:1100px){.topbar,.top-right{align-items:flex-start}.stats{display:none}.auth-card{grid-template-columns:1fr}.intro{padding:34px}.illustration img{height:300px}.feature-bar{grid-template-columns:repeat(2,1fr);gap:18px}.feature{border-right:0}}
        @media(max-width:760px){.page{padding:14px}.topbar{height:auto;flex-direction:column}.logo img{width:220px}.role{width:100%}.form-wrap{padding:16px}.form-panel{padding:18px}.grid{grid-template-columns:1fr;gap:16px}.intro h1{font-size:28px}.intro p{font-size:14px}.google{width:100%;min-width:0}.feature-bar{grid-template-columns:1fr}.feature{padding:10px 0}}
    </style>
</head>
<body>
    <main class="page">
        <header class="topbar">
            <a class="logo" href="/"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <div class="top-right">
                <div class="stats" id="stats"></div>
                <button class="role">Role: Training Partner</button>
            </div>
        </header>
        <!-- End Topbar Section -->

        <section class="auth-card">
            <div class="intro">
                <h1>Partner with <span>OnlyFreshers</span><br>and Empower Freshers</h1>
                <p>Create and manage industry-relevant training courses, track enrollments and build job-ready talent.</p>
                <div class="illustration"><img src="{{ asset('register.png') }}" alt="Training partner registration"></div>
            </div>
            <!-- End Intro Section -->

            <div class="form-wrap">
                <div class="form-panel">
                    <div class="tabs">
                        <button class="tab active" data-form="registerForm">Register</button>
                        <button class="tab" data-form="loginForm">Login</button>
                    </div>
                    <!-- End Tabs Section -->

                    <form class="form active" id="registerForm">
                        <div class="grid">
                            <div class="field"><label>Full Name <span>*</span></label><div class="control"><span class="input-icon">US</span><input type="text" placeholder="Enter your full name"></div></div>
                            <div class="field"><label>Email Address <span>*</span></label><div class="control"><span class="input-icon">@</span><input type="email" placeholder="Enter your email"></div></div>
                            <div class="field"><label>Mobile Number <span>*</span></label><div class="control"><span class="input-icon">PH</span><input type="tel" placeholder="Enter mobile number"></div></div>
                            <div class="field"><label>Institute / Company Name <span>*</span></label><div class="control"><span class="input-icon">IN</span><input type="text" placeholder="Enter institute name"></div></div>
                            <div class="field"><label>Password <span>*</span></label><div class="control password"><span class="input-icon">LK</span><input type="password" placeholder="Create a password"><button class="eye" type="button">👁</button></div></div>
                            <div class="field"><label>Confirm Password <span>*</span></label><div class="control password"><span class="input-icon">LK</span><input type="password" placeholder="Confirm your password"><button class="eye" type="button">👁</button></div></div>
                            <div class="field full"><label>Role <span>*</span></label><div class="control" style="grid-template-columns:1fr 44px"><select><option>Select your role</option><option>Training Partner</option><option>Institute Admin</option><option>Course Manager</option></select><span class="input-icon">⌄</span></div></div>
                        </div>
                        <label class="terms"><input type="checkbox"> <span>I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></span></label>
                        <button class="primary" type="button">Create Account</button>
                        <div class="divider">OR</div>
                        <button class="google" type="button"><span>G</span> Sign up with Google</button>
                        <p class="switch">Already have an account? <button type="button" data-switch="loginForm">Login</button></p>
                    </form>
                    <!-- End Register Form Section -->

                    <form class="form" id="loginForm" hidden>
                        <div class="grid">
                            <div class="field full"><label>Email Address <span>*</span></label><div class="control"><span class="input-icon">@</span><input type="email" placeholder="Enter your email"></div></div>
                            <div class="field full"><label>Password <span>*</span></label><div class="control password"><span class="input-icon">LK</span><input type="password" placeholder="Enter your password"><button class="eye" type="button">👁</button></div></div>
                        </div>
                        <label class="terms"><input type="checkbox"> <span>Remember me</span></label>
                        <button class="primary" type="button">Login</button>
                        <div class="divider">OR</div>
                        <button class="google" type="button"><span>G</span> Continue with Google</button>
                        <p class="switch">Don't have an account? <button type="button" data-switch="registerForm">Register</button></p>
                    </form>
                    <!-- End Login Form Section -->
                </div>
            </div>
            <!-- End Form Section -->
        </section>
        <!-- End Auth Section -->

        <section class="feature-bar" id="features"></section>
        <!-- End Feature Section -->

        <p class="copyright">© 2024 OnlyFreshers. All rights reserved.</p>
        <!-- End Footer Section -->
    </main>

    <script>
        const stats = @json($stats);
        const features = @json($features);

        document.getElementById('stats').innerHTML = stats.map(item => `
            <div class="stat">
                <span class="icon">${item.icon}</span>
                <span><strong>${item.value}</strong><span>${item.label}</span></span>
            </div>
        `).join('');

        document.getElementById('features').innerHTML = features.map(item => `
            <article class="feature">
                <span class="icon">${item.icon}</span>
                <div><h3>${item.title}</h3><p>${item.text}</p></div>
            </article>
        `).join('');

        function showForm(formId) {
            document.querySelectorAll('.form').forEach(form => {
                form.classList.remove('active');
                form.hidden = true;
            });
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.getElementById(formId).hidden = false;
            document.getElementById(formId).classList.add('active');
            document.querySelector(`[data-form="${formId}"]`).classList.add('active');
        }

        document.querySelectorAll('[data-form]').forEach(tab => {
            tab.addEventListener('click', () => showForm(tab.dataset.form));
        });

        document.querySelectorAll('[data-switch]').forEach(button => {
            button.addEventListener('click', () => showForm(button.dataset.switch));
        });

        showForm('registerForm');
    </script>
</body>
</html>






