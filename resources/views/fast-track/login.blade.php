<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Track Login - OnlyFreshers</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #071743; background: #ffffff; }
        .page { min-height: 100vh; display: grid; grid-template-columns: 40% 60%; }
        .left-panel { position: relative; overflow: hidden; padding: 30px 38px 0; background: radial-gradient(circle at 82% 45%, #1046b6 0, #062a78 34%, #061c56 72%); color: white; }
        .left-panel::before { content: ""; position: absolute; inset: 0; background-image: radial-gradient(circle, rgba(255,255,255,.18) 1px, transparent 2px); background-size: 68px 68px; opacity: .38; }
        .left-content { position: relative; z-index: 2; min-height: 100vh; display: flex; flex-direction: column; }
        .logo { width: 250px; max-width: 100%; filter: brightness(0) invert(1); }
        .welcome { margin-top: 78px; max-width: 300px; }
        .welcome h1 { margin: 0 0 14px; font-size: 30px; line-height: 1.08; font-weight: 700; }
        .welcome p { margin: 0; font-size: 18px; line-height: 1.42; font-weight: 400; }
        .hero-img { position: absolute; left: 50%; bottom: 34px; transform: translateX(-50%); width: min(410px, 82%); height: 330px; object-fit: contain; object-position: center bottom; z-index: 1; }
        .bubble { position: absolute; width: 60px; height: 60px; border-radius: 50%; background: rgba(255,255,255,.13); border: 1px solid rgba(255,255,255,.08); display: flex; align-items: center; justify-content: center; color: white; font-size: 22px; z-index: 1; }
        .bubble.one { right: 70px; bottom: 37%; }
        .bubble.two { right: 60px; bottom: 24%; }
        .bubble.three { left: 46px; bottom: 30%; }
        .right-panel { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 22px; }
        .login-card { width: min(500px, 100%); border: 1px solid #dce7f8; border-radius: 14px; background: white; padding: 30px 40px 26px; box-shadow: 0 12px 34px rgba(6,25,66,.08); }
        .login-card h2 { margin: 0 0 24px; text-align: center; font-size: 22px; line-height: 1.1; font-weight: 700; }
        label { display: block; margin: 0 0 8px; font-size: 13px; font-weight: 500; color: #071743; }
        .field { display: grid; grid-template-columns: 44px 1fr 42px; align-items: center; min-height: 46px; border: 1px solid #cddbf0; border-radius: 7px; margin-bottom: 18px; overflow: hidden; }
        .field.simple { grid-template-columns: 44px 1fr; }
        .icon { display: flex; align-items: center; justify-content: center; color: #52668e; }
        .icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        input { width: 100%; height: 100%; border: 0; outline: none; padding: 0 10px; font-size: 13px; color: #071743; font-family: inherit; }
        input::placeholder { color: #6f7ea0; }
        .show-pass { border: 0; background: transparent; color: #52668e; cursor: pointer; display: flex; align-items: center; justify-content: center; }
        .show-pass svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; }
        .row { display: flex; justify-content: space-between; align-items: center; gap: 18px; margin: 4px 0 26px; font-size: 13px; }
        .remember { display: flex; align-items: center; gap: 12px; }
        .remember input { width: 17px; height: 17px; accent-color: #075fe4; }
        .forgot, .register-link { color: #075fe4; text-decoration: none; font-weight: 700; }
        .login-btn { width: 100%; height: 48px; border: 0; border-radius: 7px; background: #075fe4; color: white; font-size: 16px; font-weight: 700; cursor: pointer; box-shadow: 0 9px 18px rgba(7,95,228,.2); }
        .divider { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 18px; margin: 28px 0 20px; color: #52668e; font-size: 12px; text-transform: uppercase; }
        .divider::before, .divider::after { content: ""; height: 1px; background: #dce7f8; }
        .google-btn { width: 100%; height: 44px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #071743; font-size: 13px; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 12px; }
        .google { color: #075fe4; font-weight: 800; font-size: 17px; }
        .bottom-text { margin: 24px 0 0; text-align: center; font-size: 13px; }
        @media (max-width: 1050px) {
            .page { grid-template-columns: 1fr; }
            .left-panel { min-height: 380px; }
            .left-content { min-height: 360px; }
            .welcome { margin-top: 48px; }
            .hero-img { width: 360px; height: 230px; bottom: 26px; }
        }
        @media (max-width: 620px) {
            .left-panel { padding: 28px 24px; min-height: 360px; }
            .logo { width: 250px; }
            .welcome { margin-top: 52px; }
            .welcome h1 { font-size: 32px; }
            .welcome p { font-size: 18px; }
            .hero-img, .bubble { display: none; }
            .right-panel { padding: 18px 12px; min-height: auto; }
            .login-card { padding: 28px 18px; border-radius: 12px; }
            .login-card h2 { font-size: 21px; margin-bottom: 24px; }
            label, input, .google-btn { font-size: 13px; }
            .field { min-height: 46px; margin-bottom: 18px; }
            .row { align-items: flex-start; flex-direction: column; margin-bottom: 24px; }
            .login-btn { height: 48px; font-size: 16px; }
        }
    </style>
</head>
<body>
    <main class="page">
        <section class="left-panel">
            <div class="left-content">
                <img class="logo" src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers">
                <div class="welcome">
                    <h1>Welcome Back!</h1>
                    <p>Login to continue your career journey.</p>
                </div>
            </div>
            <span class="bubble one">></span>
            <span class="bubble two">^</span>
            <span class="bubble three">!</span>
            <img class="hero-img" src="{{ asset('register.png') }}" alt="Student learning">
        </section>

        <section class="right-panel">
            <form class="login-card" id="loginForm">
                <h2>Login to Your Account</h2>

                <label for="email">Email Address</label>
                <div class="field simple">
                    <span class="icon">
                        <svg viewBox="0 0 24 24"><path d="M4 6h16v12H4z"></path><path d="m4 7 8 6 8-6"></path></svg>
                    </span>
                    <input id="email" type="email" placeholder="Enter your email address">
                </div>

                <label for="password">Password</label>
                <div class="field">
                    <span class="icon">
                        <svg viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path></svg>
                    </span>
                    <input id="password" type="password" placeholder="Enter your password">
                    <button class="show-pass" type="button" id="togglePassword" aria-label="Show password">
                        <svg viewBox="0 0 24 24"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </button>
                </div>

                <div class="row">
                    <label class="remember"><input type="checkbox"> Remember me</label>
                    <a class="forgot" href="#">Forgot Password?</a>
                </div>

                <button class="login-btn" type="submit">Login</button>

                <div class="divider">or</div>

                <button class="google-btn" type="button"><span class="google">G</span> Continue with Google</button>

                <p class="bottom-text">Don't have an account? <a class="register-link" href="#">Register</a></p>
            </form>
        </section>
    </main>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const password = document.getElementById('password');
            password.type = password.type === 'password' ? 'text' : 'password';
        });

        document.getElementById('loginForm').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Fast Track login submitted.');
        });
    </script>
</body>
</html>




