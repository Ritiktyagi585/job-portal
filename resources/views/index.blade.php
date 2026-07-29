<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlyFreshers</title>
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
            gap: 10px;
            font-weight: 800;
        }

        .logo-image {
            width: 230px;
            height: auto;
            display: block;
        }

        .nav-content > .logo {
            margin-left: -18px;
        }

        .logo-title {
            font-size: 20px;
            line-height: 20px;
        }

        .logo-title span {
            color: #075fe4;
        }

        .logo-text small {
            font-size: 10px;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .menu {
            display: flex;
            gap: 30px;
            font-size: 14px;
            font-weight: 700;
        }

        .menu a {
            padding: 26px 0;
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

        .orange-button {
            background: white;
            color: #f37a22;
            border: 1px solid #f2b17e;
        }

        .orange-button:hover {
            background: #f37a22;
            color: white;
            border-color: #f37a22;
        }

        .hero {
            padding: 60px 0 50px;
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
            margin: 0;
            font-size: 54px;
            line-height: 1.08;
            font-weight: 800;
        }

        .hero-left h1 span {
            color: #075fe4;
        }

        .hero-left p {
            margin: 22px 0 28px;
            color: #34445e;
            font-size: 17px;
            line-height: 1.7;
            font-weight: 500;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
        }

        .hero-right {
            width: 50%;
            text-align: center;
        }

        .students-box {
            height: 320px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .student-image {
            width: 100%;
            max-width: 560px;
            height: 320px;
            object-fit: contain;
            display: block;
        }

        .mode-section {
            padding: 45px 0;
        }

        .mode-cards {
            display: flex;
            gap: 25px;
        }

        .mode-card {
            width: 50%;
            border: 1px solid #dce7f8;
            border-radius: 8px;
            padding: 25px;
            display: flex;
            gap: 25px;
            background: white;
        }

        .fast-card {
            border-color: #f5d4ba;
            background: #fffaf5;
        }

        .card-icon {
            width: 105px;
            height: 105px;
            border-radius: 50%;
            background: #f1f6ff;
            color: #075fe4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            flex-shrink: 0;
            overflow: hidden;
        }

        .card-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .fast-card .card-icon {
            background: #fff0e2;
            color: #f37a22;
        }

        .mode-card h2 {
            margin: 0 0 15px;
            text-align: center;
            font-size: 20px;
        }

        .points {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 25px;
            padding: 0;
            margin: 0;
            list-style: none;
            font-size: 14px;
            font-weight: 600;
            color: #293850;
        }

        .points li::before {
            content: "✓";
            color: #075fe4;
            margin-right: 8px;
            font-weight: 800;
        }

        .fast-card .points li::before {
            color: #f37a22;
        }

        .partners {
            text-align: center;
            padding: 45px 0;
            background: white;
        }

        .partners h2 {
            margin: 0 0 22px;
            font-size: 22px;
        }

        .partner-list {
            display: flex;
            gap: 22px;
            margin-bottom: 20px;
        }

        .partner-box {
            flex: 1;
            border: 1px solid #dce7f8;
            border-radius: 8px;
            padding: 15px 10px;
            background: white;
            font-weight: 800;
        }

        .partner-box small {
            display: block;
            color: #4d5c75;
            font-size: 9px;
            margin-top: 4px;
            letter-spacing: 1px;
        }

        .company-section {
            padding: 45px 0 55px;
        }

        .company-box {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            padding: 18px 55px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            background: white;
        }

        .company-left {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .company-box h2 {
            margin: 0 0 5px;
            font-size: 20px;
        }

        .company-box p {
            margin: 0;
            color: #4a5871;
            line-height: 1.5;
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

        @media (max-width: 900px) {
            .nav-content,
            .hero-content,
            .mode-cards,
            .partner-list,
            .company-box,
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
            .hero-right,
            .mode-card {
                width: 100%;
            }

            .hero-left h1 {
                font-size: 40px;
            }

            .company-left {
                flex-direction: column;
                text-align: center;
            }

            .copyright {
                flex-direction: column;
                align-items: center;
                gap: 10px;
                text-align: center;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .hero-buttons,
            .nav-buttons {
                flex-direction: column;
                width: 100%;
            }

            .button {
                text-align: center;
            }

            .students-box {
                height: auto;
                margin: 0;
            }

            .student-image {
                height: auto;
            }

            .mode-card {
                flex-direction: column;
                align-items: center;
            }

            .points {
                grid-template-columns: 1fr;
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
        .points,
        .partner-box,
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
            <a href="#" class="logo">
                <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo" class="logo-image">
            </a>

            <nav class="menu">
                <a href="#" class="active">Home</a>
                <a href="/job">Jobs</a>
                <a href="/fast-track">Fast Track Program</a>
                <a href="/training-partners">Training Partners</a>
                <a href="/about">About Us</a>
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
                <h1>Bridging Fresh Talent With <span>Great Opportunities</span></h1>
                <p>
                    OnlyFreshers is a job, training, and hiring platform that connects freshers
                    with companies and training partners.
                </p>

                <div class="hero-buttons">
                    <a href="#" class="button blue-button">Browse Jobs</a>
                    <a href="/fast-track" class="button orange-button">Explore Fast Track Program</a>
                </div>
            </div>

            <div class="hero-right">
                <div class="students-box">
                    <img src="{{ asset('student.png') }}" alt="Students" class="student-image">
                </div>
            </div>
        </div>
    </section>

    <section class="mode-section">
        <div class="container mode-cards">
            <div class="mode-card">
                <div class="card-icon">
                    <img src="{{ asset('direct.png') }}" alt="Direct Mode">
                </div>
                <div>
                    <h2>Direct Mode</h2>
                    <ul class="points">
                        <li>Create profile</li>
                        <li>Browse jobs and apply</li>
                        <li>Upload resume</li>
                        <li>Company reviews profile</li>
                        <li>Give initial assessment</li>
                    </ul>
                </div>
            </div>

            <div class="mode-card fast-card">
                <div class="card-icon">Go</div>
                <div>
                    <h2>Fast Track Mode</h2>
                    <ul class="points">
                        <li>Give initial assessment</li>
                        <li>Give final assessment</li>
                        <li>Get recommended career track</li>
                        <li>Earn certificate</li>
                        <li>Enroll in a course</li>
                        <li>Apply for Fast Track jobs</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <h2>Trusted Training Partners</h2>

            <div class="partner-list">
                <div class="partner-box">NEXORA<small>TECHNOLOGIES</small></div>
                <div class="partner-box">CodeVista<small>ACADEMY</small></div>
                <div class="partner-box">Skillance<small>LEARNING</small></div>
                <div class="partner-box">Logixperts<small>INSTITUTE</small></div>
                <div class="partner-box">DataVance<small>ACADEMY</small></div>
                <div class="partner-box">CloudKnot<small>TECHNOLOGIES</small></div>
            </div>

            <a href="#" class="button outline-button">View All Training Partners</a>
        </div>
    </section>

    <section class="company-section">
        <div class="container">
            <div class="company-box">
                <div class="company-left">
                    <div class="card-icon">Co</div>
                    <div>
                        <h2>Hire Freshers with Confidence</h2>
                        <p>Post jobs, review applications, shortlist candidates, and hire top talent.</p>
                    </div>
                </div>

                <a href="#" class="button blue-button">Post a Job</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <a href="#" class="logo">
                        <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo" class="logo-image">
                    </a>
                    <p>Connecting fresh talent with the right opportunities through jobs and training.</p>
                </div>

                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <p>
                        <a href="/job">Jobs</a><br>
                        <a href="/fast-track">Fast Track Program</a><br>
                        <a href="/training-partners">Training Partners</a><br>
                        <a href="/about">About Us</a>
                    </p>
                </div>

                <div class="footer-col">
                    <h3>For Freshers</h3>
                    <p>
                        <a href="#">Browse Jobs</a><br>
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
