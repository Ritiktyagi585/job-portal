<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Partners - OnlyFreshers</title>
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
            cursor: pointer;
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

        .main-section {
            padding: 48px 0 60px;
            background: linear-gradient(120deg, #ffffff, #f8fbff);
        }

        .page-title {
            margin: 0;
            font-size: 42px;
            line-height: 1.2;
            font-weight: 800;
        }

        .page-title span {
            color: #075fe4;
        }

        .page-subtitle {
            margin: 10px 0 24px;
            color: #34445e;
            font-size: 16px;
            font-weight: 500;
        }

        .search-box {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
            padding: 16px;
            display: grid;
            grid-template-columns: 1.3fr 1fr 1fr 160px;
            gap: 24px;
            margin-bottom: 24px;
        }

        .field {
            height: 46px;
            border: 1px solid #dce7f8;
            border-radius: 7px;
            padding: 0 16px;
            color: #52607a;
            font-size: 14px;
            font-weight: 600;
            background: white;
            box-sizing: border-box;
            width: 100%;
        }

        .partner-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .partner-card,
        .partner-detail-card,
        .detail-section-card {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
        }

        .partner-card {
            padding: 28px 24px 22px;
        }

        .partner-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 18px;
        }

        .partner-brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .partner-icon {
            width: 58px;
            height: 58px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eff5ff;
            color: #075fe4;
            font-size: 24px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .green-icon {
            background: #eafaf8;
            color: #17a078;
        }

        .purple-icon {
            background: #f1efff;
            color: #5142b9;
        }

        .orange-icon {
            background: #fff0e2;
            color: #f37a22;
        }

        .cyan-icon {
            background: #eafaff;
            color: #159abd;
        }

        .partner-name {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
            line-height: 1.1;
        }

        .partner-name small {
            display: block;
            margin-top: 5px;
            color: #24344f;
            font-size: 11px;
            letter-spacing: 2px;
        }

        .rating,
        .location {
            font-size: 14px;
            font-weight: 700;
        }

        .location {
            margin-top: 9px;
            color: #34445e;
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-bottom: 16px;
        }

        .tag {
            padding: 7px 12px;
            border: 1px solid #a9c5f6;
            border-radius: 6px;
            color: #075fe4;
            background: #f8fbff;
            font-size: 12px;
            font-weight: 800;
        }

        .partner-card p {
            margin: 0 0 18px;
            color: #34445e;
            font-size: 14px;
            line-height: 1.7;
            font-weight: 500;
        }

        .card-button {
            width: 170px;
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
        }

        .center-button {
            text-align: center;
            margin-top: 26px;
        }

        .listing-view.hide,
        .detail-view {
            display: none;
        }

        .detail-view.show {
            display: block;
        }

        .back-button {
            margin-bottom: 22px;
        }

        .partner-detail-card {
            padding: 28px;
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 45px;
            margin-bottom: 22px;
        }

        .detail-main {
            display: flex;
            gap: 32px;
        }

        .detail-logo {
            width: 160px;
            height: 135px;
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: #f8fbff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #17a078;
            font-size: 46px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .detail-title {
            margin: 0 0 14px;
            font-size: 34px;
            font-weight: 800;
        }

        .review-line {
            display: flex;
            gap: 18px;
            margin-bottom: 18px;
            color: #075fe4;
            font-size: 15px;
            font-weight: 800;
        }

        .detail-location {
            margin-bottom: 20px;
            color: #34445e;
            font-size: 16px;
            font-weight: 600;
        }

        .detail-text {
            max-width: 520px;
            margin: 0 0 22px;
            color: #24344f;
            font-size: 16px;
            line-height: 1.8;
            font-weight: 500;
        }

        .stats-box {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: #f8fbff;
            padding: 18px;
        }

        .stat-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 17px 0;
            border-bottom: 1px solid #dce7f8;
            font-size: 14px;
            font-weight: 700;
        }

        .stat-row:last-child {
            border-bottom: 0;
        }

        .stat-value {
            font-size: 18px;
            font-weight: 800;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 22px;
        }

        .detail-section-card {
            padding: 24px;
        }

        .detail-section-card h2 {
            margin: 0 0 18px;
            font-size: 20px;
            font-weight: 800;
        }

        .course-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .course-card {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            padding: 16px;
        }

        .course-icon,
        .why-icon {
            background: #eff5ff;
            color: #075fe4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            flex-shrink: 0;
        }

        .course-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .course-card h3,
        .why-item h3 {
            margin: 0 0 8px;
            font-size: 16px;
            font-weight: 800;
        }

        .course-card p,
        .why-item p {
            margin: 0;
            color: #34445e;
            font-size: 14px;
            line-height: 1.7;
            font-weight: 500;
        }

        .course-meta {
            margin-top: 14px;
            color: #24344f;
            font-size: 13px;
            line-height: 1.8;
            font-weight: 600;
        }

        .course-button {
            margin: 18px auto 0;
            width: 220px;
            display: block;
            box-sizing: border-box;
        }

        .why-item {
            display: flex;
            gap: 14px;
            margin-bottom: 20px;
        }

        .why-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            font-size: 13px;
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

            .search-box,
            .partner-grid,
            .partner-detail-card,
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-main {
                flex-direction: column;
            }

            .course-list {
                grid-template-columns: 1fr;
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

            .page-title {
                font-size: 32px;
            }

            .partner-top {
                flex-direction: column;
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
        .field,
        .tag,
        .rating,
        .location,
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
                <a href="/training-partners" class="active">Training Partners</a>
                <a href="/about">About Us</a>
            </nav>

            <div class="nav-buttons">
                <a href="#" class="button outline-button">Login</a>
                <a href="#" class="button blue-button">Register</a>
            </div>
        </div>
    </header>

    <main class="main-section">
        <div class="container">
            <div id="partnerListing" class="listing-view">
                <h1 class="page-title">Our Trusted <span>Training Partners</span></h1>
                <p class="page-subtitle">Explore our verified and industry-aligned training partners who help freshers build job-ready skills.</p>

                <div class="search-box">
                    <input class="field" type="text" placeholder="Search by partner or course">
                    <select class="field">
                        <option>All Categories</option>
                        <option>Full Stack Development</option>
                        <option>Data Analytics</option>
                        <option>Cloud Computing</option>
                    </select>
                    <select class="field">
                        <option>All Locations</option>
                        <option>Bangalore</option>
                        <option>Pune</option>
                        <option>Hyderabad</option>
                    </select>
                    <button class="button blue-button">Search</button>
                </div>

                <div class="partner-grid">
                    <div class="partner-card">
                        <div class="partner-top">
                            <div class="partner-brand">
                                <div class="partner-icon">N</div>
                                <h2 class="partner-name">NEXORA<small>TECHNOLOGIES</small></h2>
                            </div>
                            <div>
                                <div class="rating">Star 4.6</div>
                                <div class="location">Bangalore, India</div>
                            </div>
                        </div>
                        <div class="tag-list">
                            <span class="tag">Full Stack Development</span>
                            <span class="tag">Data Analytics</span>
                            <span class="tag">UI/UX Design</span>
                        </div>
                        <p>Industry-focused programs designed to build in-demand skills and real-world experience.</p>
                        <button class="button outline-button card-button" onclick="showPartnerDetail()">View Details</button>
                    </div>

                    <div class="partner-card">
                        <div class="partner-top">
                            <div class="partner-brand">
                                <div class="partner-icon green-icon">CV</div>
                                <h2 class="partner-name">CodeVista<small>ACADEMY</small></h2>
                            </div>
                            <div>
                                <div class="rating">Star 4.7</div>
                                <div class="location">Pune, India</div>
                            </div>
                        </div>
                        <div class="tag-list">
                            <span class="tag">Full Stack Development</span>
                            <span class="tag">Data Science</span>
                            <span class="tag">DevOps</span>
                        </div>
                        <p>Hands-on training with real-time projects and expert mentorship.</p>
                        <button class="button outline-button card-button" onclick="showPartnerDetail()">View Details</button>
                    </div>

                    <div class="partner-card">
                        <div class="partner-top">
                            <div class="partner-brand">
                                <div class="partner-icon purple-icon">SL</div>
                                <h2 class="partner-name">Skillance<small>LEARNING</small></h2>
                            </div>
                            <div>
                                <div class="rating">Star 4.5</div>
                                <div class="location">Hyderabad, India</div>
                            </div>
                        </div>
                        <div class="tag-list">
                            <span class="tag">Python Programming</span>
                            <span class="tag">Cloud Computing</span>
                            <span class="tag">AI/ML</span>
                        </div>
                        <p>Career-aligned courses to help freshers transition into top tech roles.</p>
                        <button class="button outline-button card-button" onclick="showPartnerDetail()">View Details</button>
                    </div>

                    <div class="partner-card">
                        <div class="partner-top">
                            <div class="partner-brand">
                                <div class="partner-icon orange-icon">LX</div>
                                <h2 class="partner-name">Logixperts<small>INSTITUTE</small></h2>
                            </div>
                            <div>
                                <div class="rating">Star 4.6</div>
                                <div class="location">Noida, India</div>
                            </div>
                        </div>
                        <div class="tag-list">
                            <span class="tag">Software Testing</span>
                            <span class="tag">Automation Testing</span>
                            <span class="tag">QA & QC</span>
                        </div>
                        <p>Practical learning approach with industry use-cases and certification support.</p>
                        <button class="button outline-button card-button" onclick="showPartnerDetail()">View Details</button>
                    </div>

                    <div class="partner-card">
                        <div class="partner-top">
                            <div class="partner-brand">
                                <div class="partner-icon cyan-icon">DV</div>
                                <h2 class="partner-name">DataVance<small>ACADEMY</small></h2>
                            </div>
                            <div>
                                <div class="rating">Star 4.6</div>
                                <div class="location">Mumbai, India</div>
                            </div>
                        </div>
                        <div class="tag-list">
                            <span class="tag">Data Analytics</span>
                            <span class="tag">Business Intelligence</span>
                            <span class="tag">SQL</span>
                        </div>
                        <p>Data-driven training programs to turn freshers into analytics professionals.</p>
                        <button class="button outline-button card-button" onclick="showPartnerDetail()">View Details</button>
                    </div>

                    <div class="partner-card">
                        <div class="partner-top">
                            <div class="partner-brand">
                                <div class="partner-icon">CM</div>
                                <h2 class="partner-name">CloudMindz<small>TECHNOLOGIES</small></h2>
                            </div>
                            <div>
                                <div class="rating">Star 4.5</div>
                                <div class="location">Chennai, India</div>
                            </div>
                        </div>
                        <div class="tag-list">
                            <span class="tag">Cloud Computing</span>
                            <span class="tag">AWS</span>
                            <span class="tag">DevOps</span>
                        </div>
                        <p>Cloud and DevOps training with hands-on labs and real-world projects.</p>
                        <button class="button outline-button card-button" onclick="showPartnerDetail()">View Details</button>
                    </div>
                </div>

                <div class="center-button">
                    <a href="#" class="button outline-button">View All Partners</a>
                </div>
            </div>

            <div id="partnerDetail" class="detail-view">
                <button class="button outline-button back-button" onclick="showPartnerListing()">Back to Partners</button>

                <div class="partner-detail-card">
                    <div class="detail-main">
                        <div class="detail-logo">CV</div>
                        <div>
                            <h1 class="detail-title">CodeVista Academy</h1>
                            <div class="review-line">
                                <span>Star 4.7</span>
                                <span>120 Reviews</span>
                            </div>
                            <div class="detail-location">Bangalore, Karnataka, India</div>
                            <p class="detail-text">
                                CodeVista Academy is a leading training partner dedicated to empowering freshers and professionals with industry-relevant skills. Our expert-led programs focus on practical learning, real-world projects, and career support to help you build a successful future in tech.
                            </p>
                            <a href="#" class="button blue-button">Visit Website</a>
                        </div>
                    </div>

                    <div class="stats-box">
                        <div class="stat-row">
                            <span>Popular Course Areas</span>
                            <span class="stat-value">5+</span>
                        </div>
                        <div class="stat-row">
                            <span>Students Trained</span>
                            <span class="stat-value">25,000+</span>
                        </div>
                        <div class="stat-row">
                            <span>Placement Support</span>
                            <span class="stat-value">Yes</span>
                        </div>
                        <div class="stat-row">
                            <span>Certification</span>
                            <span class="stat-value">Yes</span>
                        </div>
                    </div>
                </div>

                <div class="detail-grid">
                    <div class="detail-section-card">
                        <h2>Popular Courses</h2>
                        <div class="course-list">
                            <div class="course-card">
                                <div class="course-icon">FS</div>
                                <h3>Full Stack Development</h3>
                                <p>Learn end-to-end web development using modern technologies.</p>
                                <div class="course-meta">4 - 6 Months<br>Online / Live Classes</div>
                            </div>

                            <div class="course-card">
                                <div class="course-icon">DS</div>
                                <h3>Data Science & Analytics</h3>
                                <p>Master data analysis, machine learning, and visualization techniques.</p>
                                <div class="course-meta">4 - 6 Months<br>Online / Live Classes</div>
                            </div>

                            <div class="course-card">
                                <div class="course-icon">ST</div>
                                <h3>Software Testing</h3>
                                <p>Learn manual and automation testing with real-world projects.</p>
                                <div class="course-meta">2 - 3 Months<br>Online / Live Classes</div>
                            </div>
                        </div>

                        <a href="#" class="button outline-button course-button">Explore All Courses</a>
                    </div>

                    <div class="detail-section-card">
                        <h2>Why Learn with CodeVista Academy?</h2>

                        <div class="why-item">
                            <div class="why-icon">TR</div>
                            <div>
                                <h3>Industry-relevant Training</h3>
                                <p>Curriculum designed by industry experts with real-world applications.</p>
                            </div>
                        </div>

                        <div class="why-item">
                            <div class="why-icon">EX</div>
                            <div>
                                <h3>Experienced Trainers</h3>
                                <p>Learn from professionals with years of hands-on experience.</p>
                            </div>
                        </div>

                        <div class="why-item">
                            <div class="why-icon">LV</div>
                            <div>
                                <h3>Live Interactive Sessions</h3>
                                <p>Engaging live classes with doubt-solving and hands-on practice.</p>
                            </div>
                        </div>

                        <div class="why-item">
                            <div class="why-icon">CT</div>
                            <div>
                                <h3>Certificate on Completion</h3>
                                <p>Earn a recognized certificate to boost your career opportunities.</p>
                            </div>
                        </div>
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

    <script>
        function showPartnerDetail() {
            document.getElementById("partnerListing").classList.add("hide");
            document.getElementById("partnerDetail").classList.add("show");
            window.scrollTo(0, 0);
        }

        function showPartnerListing() {
            document.getElementById("partnerListing").classList.remove("hide");
            document.getElementById("partnerDetail").classList.remove("show");
            window.scrollTo(0, 0);
        }
    </script>
</body>
</html>
