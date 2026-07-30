<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Track Program - OnlyFreshers</title>
    <link rel="preconnect" href="https://fonts.bunny.net">

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #061942;
            background: #ffffff;
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

        .logo {
            display: flex;
            align-items: center;
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
            transition: 0.3s;
        }

        .blue-button {
            background: #075fe4;
            color: white;
            border: 1px solid #075fe4;
        }

        .blue-button:hover {
            background: #003f9e;
            border-color: #003f9e;
        }

        .outline-button {
            background: white;
            color: #075fe4;
            border: 1px solid #a9c5f6;
        }

        .outline-button:hover {
            background: #075fe4;
            color: white;
            border-color: #075fe4;
        }

        .hero {
            padding: 55px 0 35px;
            background: linear-gradient(120deg, #ffffff, #f4f8ff);
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .hero-left {
            width: 50%;
        }

        .hero-left h1 {
            margin: 0 0 18px;
            font-size: 54px;
            line-height: 1.08;
            font-weight: 800;
        }

        .hero-left h1 span {
            color: #075fe4;
        }

        .hero-left p {
            margin: 0;
            color: #34445e;
            font-size: 19px;
            line-height: 1.7;
            font-weight: 500;
        }

        .hero-right {
            width: 50%;
            text-align: center;
        }

        .learning-box {
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .study-image {
            width: 100%;
            max-width: 520px;
            height: 260px;
            object-fit: contain;
            display: block;
        }

        .steps-section {
            padding: 35px 0 45px;
        }

        .steps-box {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            padding: 28px;
            background: white;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
        }

        .step {
            text-align: center;
        }

        .step-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: #eff5ff;
            color: #075fe4;
            border: 1px solid #dce7f8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .step h3 {
            margin: 0 0 8px;
            font-size: 14px;
            font-weight: 800;
        }

        .number {
            display: inline-flex;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #075fe4;
            color: white;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin-right: 6px;
        }

        .step p {
            margin: 0;
            color: #34445e;
            font-size: 13px;
            line-height: 1.6;
            font-weight: 500;
        }

        .tracks-section {
            padding: 0 0 40px;
        }

        .section-title {
            margin: 0 0 20px;
            text-align: center;
            font-size: 24px;
            font-weight: 800;
        }

        .track-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .track-card {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
            padding: 24px;
            display: flex;
            gap: 20px;
        }

        .track-icon {
            width: 64px;
            height: 64px;
            border-radius: 14px;
            background: #eff5ff;
            color: #075fe4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .orange-icon {
            background: #fff0e2;
            color: #f37a22;
        }

        .green-icon {
            background: #eafaf8;
            color: #17a6a8;
        }

        .track-card h3 {
            margin: 0 0 8px;
            font-size: 18px;
            font-weight: 800;
        }

        .track-card p {
            margin: 0 0 12px;
            color: #34445e;
            font-size: 14px;
            line-height: 1.6;
            font-weight: 500;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 14px;
        }

        .tag {
            padding: 6px 12px;
            border-radius: 6px;
            background: #dbeafe;
            color: #075fe4;
            font-size: 12px;
            font-weight: 700;
        }

        .bottom-cta {
            padding: 0 0 55px;
        }

        .cta-box {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: #eaf2ff;
            padding: 22px 40px;
            text-align: center;
        }

        .cta-points {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-bottom: 20px;
        }

        .cta-point {
            display: flex;
            align-items: center;
            gap: 12px;
            text-align: left;
            font-size: 15px;
            font-weight: 700;
        }

        .cta-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: white;
            color: #075fe4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .footer {
            border-top: 1px solid #dce7f8;
            padding: 22px 0 0;
            background: #f4f8ff;
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

            .steps-box,
            .track-cards,
            .cta-points {
                grid-template-columns: 1fr 1fr;
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

            .study-image {
                height: auto;
            }

            .steps-box,
            .track-cards,
            .cta-points {
                grid-template-columns: 1fr;
            }

            .track-card {
                flex-direction: column;
            }

            .copyright {
                flex-direction: column;
                align-items: center;
                gap: 10px;
                text-align: center;
            }
        }

        @media (max-width: 900px) {
            .nav-content,
            .hero-content {
                flex-direction: column;
                align-items: center;
                gap: 18px;
            }

            .nav-content > .logo {
                margin-left: 0;
            }

            .logo-image {
                width: 210px;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero {
                text-align: center;
            }

            .hero-left,
            .hero-right {
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .menu {
                display: grid;
                grid-template-columns: 1fr;
                text-align: center;
                gap: 14px;
            }

            .menu a {
                padding: 0 0 8px;
            }

            .menu .active {
                width: 150px;
                margin: auto;
            }

            .nav-buttons {
                display: grid;
                grid-template-columns: 1fr;
                gap: 8px;
                width: 100%;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .copyright-links {
                gap: 18px;
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        .side-menu-button,
        .close-menu-button,
        .mobile-sidebar {
            display: none;
        }

        @media (max-width: 600px) {
            .nav-content {
                flex-direction: row !important;
                align-items: center !important;
                justify-content: space-between;
                padding: 12px 0;
            }

            .logo-image {
                width: 185px;
            }

            .menu,
            .nav-buttons {
                display: none !important;
            }

            .side-menu-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 42px;
                height: 42px;
                border: 1px solid #a9c5f6;
                border-radius: 7px;
                background: white;
                color: #075fe4;
                font-size: 24px;
                font-weight: 700;
            }

            .mobile-sidebar {
                position: fixed;
                top: 0;
                right: -260px;
                z-index: 50;
                width: 230px;
                height: 100vh;
                padding: 42px 16px 20px;
                box-sizing: border-box;
                background: white;
                border-left: 1px solid #dce7f8;
                box-shadow: -10px 0 25px rgba(6, 25, 66, 0.12);
                display: block;
                transition: 0.25s;
            }

            .mobile-sidebar.show {
                right: 0;
            }

            .close-menu-button {
                position: absolute;
                top: 10px;
                right: 12px;
                display: inline-flex;
                border: 0;
                background: white;
                color: #061942;
                font-size: 24px;
            }

            .side-links {
                display: grid;
                gap: 14px;
                text-align: center;
                font-size: 13px;
                font-weight: 700;
            }

            .side-links a {
                padding-bottom: 8px;
            }

            .side-links .active {
                color: #075fe4;
                border-bottom: 2px solid #075fe4;
                width: 150px;
                margin: auto;
            }

            .side-buttons {
                display: grid;
                gap: 8px;
                margin-top: 16px;
            }

            .side-buttons .button {
                padding: 11px 16px;
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
        .tag,
        .step,
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

            <button class="side-menu-button" type="button" onclick="toggleMobileMenu()">☰</button>

            <nav class="menu">
                <a href="/">Home</a>
                <a href="/job">Jobs</a>
                <a href="/fast-track" class="active">Fast Track Program</a>
                <a href="/training-partners">Training Partners</a>
                <a href="/about">About Us</a>
            </nav>

            <div class="nav-buttons">
                <a href="#" class="button outline-button">Login</a>
                <a href="#" class="button blue-button">Register</a>
            </div>
        </div>
    </header>

    <div id="mobileSidebar" class="mobile-sidebar">
        <button class="close-menu-button" type="button" onclick="toggleMobileMenu()">×</button>
        <nav class="side-links">
            <a href="/">Home</a>
            <a href="/job">Jobs</a>
            <a href="/fast-track" class="active">Fast Track Program</a>
            <a href="/training-partners">Training Partners</a>
            <a href="/about">About Us</a>
        </nav>
        <div class="side-buttons">
            <a href="#" class="button outline-button">Login</a>
            <a href="#" class="button blue-button">Register</a>
        </div>
    </div>

    <section class="hero">
        <div class="container hero-content">
            <div class="hero-left">
                <h1>Fast Track <span>Program</span></h1>
                <p>Learn in-demand skills, get trained by verified partners, and become job-ready.</p>
            </div>

            <div class="hero-right">
                <div class="learning-box">
                    <img src="{{ asset('study.png') }}" alt="Fast Track Study" class="study-image">
                </div>
            </div>
        </div>
    </section>

    <section class="steps-section">
        <div class="container">
            <div class="steps-box">
                <div class="step">
                    <div class="step-icon">📋</div>
                    <h3><span class="number">1</span>Initial Assessment</h3>
                    <p>Evaluate your skills and career goals.</p>
                </div>

                <div class="step">
                    <div class="step-icon">👤</div>
                    <h3><span class="number">2</span>Recommended Career Track</h3>
                    <p>Get a personalized career track.</p>
                </div>

                <div class="step">
                    <div class="step-icon">🏛</div>
                    <h3><span class="number">3</span>Training with Partners</h3>
                    <p>Learn from verified training partners.</p>
                </div>

                <div class="step">
                    <div class="step-icon">📝</div>
                    <h3><span class="number">4</span>Final Assessment</h3>
                    <p>Prove your skills with assessment.</p>
                </div>

                <div class="step">
                    <div class="step-icon">🏅</div>
                    <h3><span class="number">5</span>Certificate</h3>
                    <p>Earn your certificate of completion.</p>
                </div>

                <div class="step">
                    <div class="step-icon">💼</div>
                    <h3><span class="number">6</span>Get Hired</h3>
                    <p>Apply to top companies and start.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="tracks-section">
        <div class="container">
            <h2 class="section-title">Explore Career Tracks</h2>

            <div class="track-cards">
                <div class="track-card">
                    <div class="track-icon">⌨</div>
                    <div>
                        <h3>Full Stack Development</h3>
                        <p>Build end-to-end web applications and modern solutions.</p>
                        <div class="tags">
                            <span class="tag">HTML</span>
                            <span class="tag">CSS</span>
                            <span class="tag">JavaScript</span>
                            <span class="tag">React</span>
                        </div>
                        <a href="#" class="button outline-button">View Details</a>
                    </div>
                </div>

                <div class="track-card">
                    <div class="track-icon green-icon">▮</div>
                    <div>
                        <h3>Data Science & Analytics</h3>
                        <p>Turn data into insights and build intelligent solutions.</p>
                        <div class="tags">
                            <span class="tag">Python</span>
                            <span class="tag">SQL</span>
                            <span class="tag">Machine Learning</span>
                        </div>
                        <a href="#" class="button outline-button">View Details</a>
                    </div>
                </div>

                <div class="track-card">
                    <div class="track-icon orange-icon">📣</div>
                    <div>
                        <h3>Digital Marketing</h3>
                        <p>Grow brands and businesses in the digital world.</p>
                        <div class="tags">
                            <span class="tag">SEO</span>
                            <span class="tag">Google Ads</span>
                            <span class="tag">Social Media</span>
                        </div>
                        <a href="#" class="button outline-button">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bottom-cta">
        <div class="container">
            <div class="cta-box">
                <div class="cta-points">
                    <div class="cta-point"><span class="cta-icon">🎓</span>Industry-relevant learning</div>
                    <div class="cta-point"><span class="cta-icon">👥</span>Expert training partners</div>
                    <div class="cta-point"><span class="cta-icon">🏅</span>Final assessment & certificate</div>
                    <div class="cta-point"><span class="cta-icon">💼</span>Better job opportunities</div>
                </div>

                <a href="#" class="button blue-button">Start Your Fast Track Journey →</a>
            </div>
        </div>
    </section>

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
    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileSidebar').classList.toggle('show');
        }
    </script>
</body>
</html>
