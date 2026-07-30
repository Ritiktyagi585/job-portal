<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Account - OnlyFreshers</title>

    <style>
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #eaf3ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .page { min-height: 100vh; display: grid; grid-template-columns: 0.95fr 0.78fr; align-items: stretch; padding: 8px 88px; box-sizing: border-box; background: linear-gradient(130deg, #ffffff, #dfeeff); }
        .left-panel, .form-panel { min-height: calc(100vh - 16px); box-sizing: border-box; }
        .left-panel { position: relative; overflow: hidden; padding: 30px 38px; background: radial-gradient(circle at 72% 52%, rgba(7, 95, 228, 0.08) 0 210px, transparent 211px), linear-gradient(140deg, #ffffff, #d8eaff); border-radius: 16px 0 0 16px; }
        .logo img { width: 195px; height: auto; display: block; }
        .welcome-text { margin-top: 58px; max-width: 340px; }
        .welcome-text h1 { margin: 0 0 18px; font-size: 34px; line-height: 1.12; font-weight: 700; }
        .welcome-text span { color: #075fe4; }
        .welcome-text p { margin: 0; color: #34445e; font-size: 15px; line-height: 1.5; }
        .blue-line { width: 58px; height: 3px; border-radius: 20px; background: #075fe4; margin-top: 20px; }
        .illustration { position: absolute; left: 54px; right: 54px; bottom: 32px; height: 210px; }
        .register-img { width: 100%; height: 100%; object-fit: contain; object-position: left bottom; display: block; }
        .form-panel { display: flex; justify-content: center; padding: 22px 36px 16px; background: white; border-left: 1px solid #dce7f8; border-radius: 0 16px 16px 0; }
        .form-wrap { width: 100%; max-width: 360px; }
        .tabs { display: grid; grid-template-columns: 1fr 1fr; border-bottom: 2px solid #edf2fb; margin-bottom: 20px; }
        .tab { padding: 0 0 8px; text-align: center; color: #7a849c; font-size: 13px; font-weight: 700; border: 0; background: transparent; cursor: pointer; font-family: inherit; }
        .tab.active { color: #075fe4; border-bottom: 3px solid #075fe4; margin-bottom: -2px; }
        .form-box { display: none; }
        .form-box.active { display: block; }
        .form-title h2 { margin: 0 0 6px; font-size: 19px; line-height: 1.2; font-weight: 700; }
        .form-title p { margin: 0 0 16px; color: #52607a; font-size: 12px; }
        .form-group { margin-bottom: 11px; }
        label { display: block; margin-bottom: 5px; font-size: 11px; font-weight: 600; }
        .input-box { display: flex; align-items: center; height: 30px; border: 1px solid #cbd8ea; border-radius: 8px; overflow: hidden; background: white; }
        .input-icon { width: 34px; height: 30px; display: flex; align-items: center; justify-content: center; color: #52607a; border-right: 1px solid #dce7f8; font-size: 12px; font-weight: 700; flex-shrink: 0; }
        input { width: 100%; height: 30px; border: 0; outline: none; padding: 0 12px; box-sizing: border-box; color: #061942; font-size: 12px; font-weight: 500; }
        input::placeholder { color: #8a96ad; }
        .password-eye { width: 44px; border: 0; background: transparent; color: #52607a; cursor: pointer; font-size: 11px; }
        .primary-button { width: 100%; height: 32px; border: 0; border-radius: 7px; background: #075fe4; color: white; font-size: 13px; font-weight: 700; cursor: pointer; box-shadow: 0 10px 20px rgba(7, 95, 228, 0.16); margin-top: 4px; }
        .primary-button:hover { background: #004fc3; }
        .divider { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 24px; color: #6b7892; margin: 16px 0; font-size: 12px; }
        .divider span { height: 1px; background: #dce7f8; }
        .divider p { margin: 0; }
        .google-button { width: 100%; height: 32px; border: 1px solid #cbd8ea; border-radius: 8px; background: white; color: #061942; font-size: 13px; font-weight: 700; cursor: pointer; }
        .google-button span { color: #075fe4; font-size: 16px; margin-right: 14px; }
        .bottom-text { text-align: center; color: #52607a; font-size: 12px; margin: 12px 0 0; }
        .bottom-text button { border: 0; background: transparent; padding: 0; color: #075fe4; font-family: inherit; font-size: inherit; font-weight: 700; cursor: pointer; }
        @media (max-width: 1050px) { .page { grid-template-columns: 1fr; padding: 10px; } .left-panel, .form-panel { min-height: auto; border-radius: 16px; } .illustration { position: relative; left: auto; right: auto; bottom: auto; margin-top: 30px; } }
        @media (max-width: 650px) { .left-panel, .form-panel { padding: 24px 18px; } .logo img { width: 190px; } .welcome-text { margin-top: 38px; } .welcome-text h1 { font-size: 32px; } .welcome-text p { font-size: 15px; } .illustration { height: 210px; } }
    </style>
</head>
<body>
    <main class="page">
        <section class="left-panel">
            <a href="/" class="logo">
                <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo">
            </a>

            <div class="welcome-text">
                <h1>Welcome to <span>OnlyFreshers</span></h1>
                <p>Join thousands of companies hiring the best fresh talent. Post jobs, review candidates and hire with ease.</p>
                <div class="blue-line"></div>
            </div>

            <div class="illustration">
                <img class="register-img" src="{{ asset('register.png') }}" alt="Company registration">
            </div>
        </section>

        <section class="form-panel">
            <div class="form-wrap">
                <div class="tabs">
                    <button class="tab" type="button" data-form="login">Login</button>
                    <button class="tab active" type="button" data-form="register">Register</button>
                </div>

                <div class="form-box" id="loginBox">
                    <div class="form-title">
                        <h2>Company Login</h2>
                        <p>Login to manage jobs and candidates</p>
                    </div>

                    <form id="companyLoginForm">
                        <div class="form-group">
                            <label for="loginEmail">Email Address</label>
                            <div class="input-box">
                                <div class="input-icon">@</div>
                                <input type="email" id="loginEmail" placeholder="Enter email address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <div class="input-box">
                                <div class="input-icon">#</div>
                                <input type="password" id="loginPassword" placeholder="Enter password">
                                <button class="password-eye" type="button" data-target="loginPassword">Show</button>
                            </div>
                        </div>

                        <button class="primary-button" type="submit">Login</button>
                    </form>

                    <div class="divider"><span></span><p>or</p><span></span></div>
                    <button class="google-button" type="button"><span>G</span>Continue with Google</button>
                    <p class="bottom-text">Don't have an account? <button type="button" data-form="register">Register</button></p>
                </div>

                <div class="form-box active" id="registerBox">
                    <div class="form-title">
                        <h2>Create Company Account</h2>
                        <p>Fill in the details to get started</p>
                    </div>

                    <form id="companyRegisterForm">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <div class="input-box">
                                <div class="input-icon">U</div>
                                <input type="text" id="name" placeholder="Enter full name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-box">
                                <div class="input-icon">@</div>
                                <input type="email" id="email" placeholder="Enter email address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <div class="input-box">
                                <div class="input-icon">P</div>
                                <input type="tel" id="phone" placeholder="Enter phone number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-box">
                                <div class="input-icon">#</div>
                                <input type="password" id="password" placeholder="Enter password">
                                <button class="password-eye" type="button" data-target="password">Show</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <div class="input-box">
                                <div class="input-icon">#</div>
                                <input type="password" id="confirmPassword" placeholder="Confirm password">
                                <button class="password-eye" type="button" data-target="confirmPassword">Show</button>
                            </div>
                        </div>

                        <button class="primary-button" type="submit">Create Account</button>
                    </form>

                    <div class="divider"><span></span><p>or</p><span></span></div>
                    <button class="google-button" type="button"><span>G</span>Continue with Google</button>
                    <p class="bottom-text">Already have an account? <button type="button" data-form="login">Login</button></p>
                </div>
            </div>
        </section>
    </main>

    <script>
        function showForm(formName) {
            document.querySelectorAll('.tab').forEach(function (tab) {
                tab.classList.toggle('active', tab.dataset.form === formName);
            });

            document.getElementById('loginBox').classList.toggle('active', formName === 'login');
            document.getElementById('registerBox').classList.toggle('active', formName === 'register');
        }

        document.querySelectorAll('[data-form]').forEach(function (button) {
            button.addEventListener('click', function () {
                showForm(button.dataset.form);
            });
        });

        document.querySelectorAll('.password-eye').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = document.getElementById(button.dataset.target);
                input.type = input.type === 'password' ? 'text' : 'password';
                button.textContent = input.type === 'password' ? 'Show' : 'Hide';
            });
        });

        document.getElementById('companyLoginForm').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Company login successful.');
        });

        document.getElementById('companyRegisterForm').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Company account request submitted.');
        });
    </script>
</body>
</html>
