<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - OnlyFreshers</title>
    <link rel="preconnect" href="https://fonts.bunny.net">

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #061942;
            background: white;
            font-weight: 500;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 82%;
            max-width: 1200px;
            margin: auto;
        }

        .navbar {
            border-bottom: 1px solid #dce7f8;
            background: white;
        }

        .nav-content {
            height: 88px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-image {
            width: 230px;
            height: auto;
            display: block;
        }

        .nav-content > .logo {
            margin-left: -18px;
        }

        .menu {
            display: flex;
            gap: 30px;
            font-size: 14px;
            font-weight: 700;
        }

        .menu a {
            padding: 34px 0;
        }

        .menu .active {
            color: #075fe4;
            border-bottom: 3px solid #075fe4;
        }

        .nav-buttons {
            display: flex;
            gap: 12px;
        }

        .button {
            padding: 14px 25px;
            border-radius: 7px;
            font-weight: 800;
            font-size: 14px;
            display: inline-block;
            text-align: center;
            border: 1px solid transparent;
            transition: 0.3s;
        }

        .blue-button {
            background: #075fe4;
            color: white;
            border-color: #075fe4;
        }

        .blue-button:hover {
            background: #003f9e;
            border-color: #003f9e;
        }

        .outline-button {
            background: white;
            color: #075fe4;
            border-color: #a9c5f6;
        }

        .outline-button:hover {
            background: #075fe4;
            color: white;
            border-color: #075fe4;
        }

        .hero {
            padding: 60px 0 50px;
            background: linear-gradient(120deg, #ffffff, #f4f8ff);
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 55px;
        }

        .hero-left {
            width: 48%;
        }

        .hero-left h1 {
            margin: 0 0 18px;
            font-size: 52px;
            line-height: 1.1;
            font-weight: 800;
        }

        .hero-left h1 span {
            color: #075fe4;
        }

        .hero-left p {
            margin: 0;
            color: #24344f;
            font-size: 21px;
            line-height: 1.7;
            font-weight: 500;
        }

        .hero-right {
            width: 52%;
        }

        .about-image {
            width: 100%;
            height: 310px;
            object-fit: contain;
            display: block;
        }

        .info-section {
            padding: 0 0 45px;
            margin-top: -28px;
        }

        .top-cards,
        .trust-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .info-card,
        .mode-card {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
            padding: 24px;
        }

        .info-card {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .circle-icon {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            background: #eff5ff;
            color: #075fe4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .orange-circle {
            background: #fff0e2;
            color: #f37a22;
        }

        .info-card h2,
        .mode-card h3 {
            margin: 0 0 9px;
            font-size: 18px;
            font-weight: 800;
        }

        .info-card p,
        .mode-card p,
        .trust-card p {
            margin: 0;
            color: #24344f;
            font-size: 14px;
            line-height: 1.7;
            font-weight: 500;
        }

        .section-title {
            margin: 42px 0 24px;
            text-align: center;
            font-size: 24px;
            font-weight: 800;
        }

        .section-title::after {
            content: "";
            display: block;
            width: 70px;
            height: 3px;
            border-radius: 20px;
            background: #075fe4;
            margin: 10px auto 0;
        }

        .help-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .mode-card {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        .mode-card ul {
            margin: 0;
            padding-left: 18px;
            color: #24344f;
            font-size: 14px;
            line-height: 1.9;
            font-weight: 500;
        }

        .mode-card li::marker {
            color: #075fe4;
        }

        .fast-mode {
            border-color: #f5d4ba;
            background: #fffaf5;
        }

        .trust-card {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .footer {
            border-top: 1px solid #dce7f8;
            padding: 22px 0 0;
            background: #dbeafe;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1.1fr 1.1fr 1.4fr;
            gap: 38px;
            align-items: start;
        }

        .footer-col {
            min-width: 0;
        }

        .footer h3 {
            margin: 0 0 8px;
            font-size: 16px;
        }

        .footer p,
        .footer a {
            color: #35445d;
            font-size: 14px;
            line-height: 1.7;
            font-weight: 500;
        }

        .footer p {
            margin: 0;
        }

        .copyright {
            margin-top: 16px;
            padding: 10px 0;
            border-top: 1px solid #dce7f8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            color: #536079;
            font-size: 13px;
        }

        .copyright-links {
            display: flex;
            gap: 45px;
        }

        @media (max-width: 950px) {
            .nav-content,
            .hero-content,
            .footer-content {
                grid-template-columns: 1fr 1fr;
                height: auto;
            }

            .nav-content {
                padding: 20px 0;
            }

            .menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 18px;
            }

            .menu a {
                padding: 8px 0;
            }

            .hero-left,
            .hero-right {
                width: 100%;
            }

            .top-cards,
            .trust-cards,
            .help-grid {
                grid-template-columns: 1fr;
            }

            .info-section {
                margin-top: 0;
                padding-top: 35px;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .nav-buttons {
                flex-direction: column;
                width: 100%;
            }

            .hero-left h1 {
                font-size: 40px;
            }

            .info-card,
            .mode-card,
            .trust-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .copyright {
                flex-direction: column;
                align-items: center;
                gap: 10px;
                text-align: center;
            }
        }

        h1,
        h2,
        h3 {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600 !important;
        }

        p,
        li,
        small,
        .button,
        .footer p,
        .footer a {
            font-weight: 500 !important;
        }

        .menu a,
        .nav-buttons .button {
            font-weight: 600 !important;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container nav-content">
            <a href="/" class="logo">
                <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo" class="logo-image">
            </a>

            <nav class="menu">
                <a href="/">Home</a>
                <a href="/job">Jobs</a>
                <a href="/fast-track">Fast Track Program</a>
                <a href="/training-partners">Training Partners</a>
                <a href="/about" class="active">About Us</a>
            </nav>

            <div class="nav-buttons">
                <a href="#" class="button outline-button">Login</a>
                <a href="#" class="button blue-button">Register</a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container hero-content">
            <div class="hero-left">
                <h1>About <span>OnlyFreshers</span></h1>
                <p>OnlyFreshers connects freshers, companies, and training partners in one place.</p>
            </div>

            <div class="hero-right">
                <img src="{{ asset('student.png') }}" alt="OnlyFreshers students" class="about-image">
            </div>
        </div>
    </section>

    <main class="info-section">
        <div class="container">
            <div class="top-cards">
                <div class="info-card">
                    <div class="circle-icon">M</div>
                    <div>
                        <h2>Our Mission</h2>
                        <p>To empower freshers by connecting them with the right opportunities, career-focused training, and industry partners.</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="circle-icon">V</div>
                    <div>
                        <h2>Our Vision</h2>
                        <p>To be the most trusted platform for freshers, enabling them to build successful and meaningful careers.</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="circle-icon">W</div>
                    <div>
                        <h2>What We Do</h2>
                        <p>We bridge the gap between talent and opportunity through jobs, training programs, and trusted partnerships.</p>
                    </div>
                </div>
            </div>

            <h2 class="section-title">How OnlyFreshers Helps</h2>

            <div class="help-grid">
                <div class="mode-card">
                    <div class="circle-icon">DM</div>
                    <div>
                        <h3>Direct Mode</h3>
                        <ul>
                            <li>Browse and apply to verified job openings.</li>
                            <li>Create your profile and showcase your skills.</li>
                            <li>Connect directly with top companies hiring freshers.</li>
                        </ul>
                    </div>
                </div>

                <div class="mode-card fast-mode">
                    <div class="circle-icon orange-circle">FT</div>
                    <div>
                        <h3>Fast Track Program</h3>
                        <ul>
                            <li>Get industry-aligned training from trusted partners.</li>
                            <li>Improve your skills with practical learning.</li>
                            <li>Get recommended for jobs and career opportunities.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <h2 class="section-title">Why Freshers Trust OnlyFreshers</h2>

            <div class="trust-cards">
                <div class="trust-card">
                    <div class="circle-icon">VO</div>
                    <div>
                        <h3>Verified Opportunities</h3>
                        <p>All job listings are verified to ensure legitimacy and trust.</p>
                    </div>
                </div>

                <div class="trust-card">
                    <div class="circle-icon">IT</div>
                    <div>
                        <h3>Industry-Aligned Training</h3>
                        <p>Learn the most in-demand skills from trusted training partners.</p>
                    </div>
                </div>

                <div class="trust-card">
                    <div class="circle-icon">CG</div>
                    <div>
                        <h3>Career Growth</h3>
                        <p>We help you build a strong foundation for a successful career.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <a href="/" class="logo">
                        <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo" class="logo-image">
                    </a>
                    <p>Connecting fresh talent with the right opportunities through jobs and training.</p>
                </div>

                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <p>
                        <a href="/">Home</a><br>
                        <a href="/job">Jobs</a><br>
                        <a href="/fast-track">Fast Track Program</a><br>
                        <a href="/training-partners">Training Partners</a><br>
                        <a href="/about">About Us</a>
                    </p>
                </div>

                <div class="footer-col">
                    <h3>For Freshers</h3>
                    <p>
                        <a href="/job">Browse Jobs</a><br>
                        <a href="/fast-track">Fast Track Program</a><br>
                        <a href="/training-partners">Training Partners</a><br>
                        <a href="#">Create Profile</a>
                    </p>
                </div>

                <div class="footer-col">
                    <h3>For Companies</h3>
                    <p>
                        <a href="#">Post a Job</a><br>
                        <a href="#">Find Fresh Talent</a><br>
                        <a href="#">Why OnlyFreshers?</a><br>
                        <a href="#">Partner With Us</a>
                    </p>
                </div>

                <div class="footer-col">
                    <h3>Support</h3>
                    <p>
                        support@onlyfreshers.com<br>
                        +91 6361 6361 669<br>
                        Mon - Sat: 9:00 AM - 6:00 PM
                    </p>
                </div>
            </div>

            <div class="copyright">
                <span>© 2025 OnlyFreshers. All rights reserved.</span>
                <div class="copyright-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
