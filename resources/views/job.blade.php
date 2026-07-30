<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs - OnlyFreshers</title>
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
            cursor: pointer;
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

        .main-section {
            padding: 42px 0 65px;
            background: linear-gradient(120deg, #ffffff, #f8fbff);
        }

        .page-title {
            margin: 0;
            font-size: 34px;
            font-weight: 800;
        }

        .page-subtitle {
            margin: 8px 0 24px;
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
            margin-bottom: 18px;
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
        }

        .jobs-layout {
            display: grid;
            grid-template-columns: 230px 1fr;
            gap: 35px;
        }

        .filter-box,
        .job-card,
        .side-card {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
        }

        .filter-box {
            padding: 18px;
        }

        .filter-box h3 {
            margin: 0 0 18px;
            font-size: 16px;
            font-weight: 800;
        }

        .filter-group {
            padding-bottom: 14px;
            margin-bottom: 14px;
            border-bottom: 1px solid #dce7f8;
        }

        .filter-group:last-child {
            border-bottom: 0;
            margin-bottom: 0;
        }

        .filter-title {
            margin: 0 0 10px;
            font-size: 13px;
            font-weight: 800;
        }

        .check-row {
            display: block;
            margin-bottom: 8px;
            color: #24344f;
            font-size: 14px;
            font-weight: 500;
        }

        .check-row input {
            margin-right: 8px;
        }

        .show-more {
            color: #075fe4;
            font-size: 13px;
            font-weight: 700;
        }

        .jobs-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .sort-select {
            width: 140px;
        }

        .job-card {
            padding: 24px;
            display: grid;
            grid-template-columns: 75px 1fr 135px;
            gap: 22px;
            align-items: center;
            margin-bottom: 0;
            border-radius: 0;
        }

        .job-card:first-child {
            border-radius: 8px 8px 0 0;
        }

        .job-card:last-child {
            border-radius: 0 0 8px 8px;
        }

        .company-logo {
            width: 70px;
            height: 70px;
            border: 1px solid #dce7f8;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #075fe4;
            background: #fbfdff;
            font-size: 22px;
            font-weight: 800;
        }

        .job-card h2 {
            margin: 0 0 6px;
            font-size: 18px;
            font-weight: 800;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            color: #52607a;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .job-card p {
            margin: 0;
            color: #24344f;
            font-size: 14px;
            line-height: 1.6;
            font-weight: 500;
        }

        .job-action {
            text-align: right;
        }

        .posted {
            margin-bottom: 28px;
            color: #52607a;
            font-size: 13px;
            font-weight: 600;
        }

        .detail-view {
            display: none;
        }

        .detail-view.show {
            display: block;
        }

        .listing-view.hide {
            display: none;
        }

        .back-button {
            margin-bottom: 25px;
        }

        .detail-layout {
            display: flex;
            gap: 70px;
            align-items: flex-start;
        }

        .detail-left {
            flex: 1;
        }

        .detail-right {
            width: 320px;
            flex-shrink: 0;
        }

        .job-title {
            margin: 0 0 18px;
            font-size: 34px;
            line-height: 1.2;
            font-weight: 800;
        }

        .company-name {
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 17px;
            font-weight: 700;
        }

        .detail-info {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 28px;
            color: #52607a;
            font-size: 15px;
            font-weight: 600;
        }

        .intro-text {
            max-width: 720px;
            color: #24344f;
            font-size: 16px;
            line-height: 1.8;
            font-weight: 500;
        }

        .content-block {
            padding: 22px 0;
            border-bottom: 1px solid #dce7f8;
        }

        .content-block h2 {
            margin: 0 0 12px;
            font-size: 19px;
            font-weight: 800;
        }

        .content-block ul {
            margin: 0;
            padding-left: 20px;
            color: #24344f;
            font-size: 15px;
            line-height: 1.8;
            font-weight: 500;
        }

        .content-block li::marker {
            color: #075fe4;
        }

        .skill-list,
        .benefits {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill {
            padding: 8px 18px;
            border: 1px solid #a9c5f6;
            border-radius: 7px;
            color: #075fe4;
            background: white;
            font-size: 14px;
            font-weight: 700;
        }

        .benefits {
            gap: 35px;
        }

        .benefit {
            color: #24344f;
            font-size: 15px;
            font-weight: 600;
        }

        .small-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #eff5ff;
            color: #075fe4;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
            margin-right: 8px;
        }

        .side-card {
            padding: 22px;
            margin-bottom: 22px;
        }

        .apply-card .button {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 12px;
        }

        .side-card h2 {
            margin: 0 0 18px;
            font-size: 20px;
            font-weight: 800;
        }

        .overview-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid #dce7f8;
            color: #24344f;
            font-size: 14px;
            font-weight: 600;
        }

        .overview-row:last-child {
            border-bottom: 0;
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
            .jobs-layout {
                grid-template-columns: 1fr;
            }

            .detail-layout {
                flex-direction: column;
                gap: 35px;
            }

            .detail-right {
                width: 100%;
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

            .job-card {
                grid-template-columns: 1fr;
            }

            .job-action {
                text-align: left;
            }

            .job-title,
            .page-title {
                font-size: 28px;
            }

            .copyright {
                flex-direction: column;
                align-items: center;
                gap: 10px;
                text-align: center;
            }
        }

        @media (max-width: 900px) {
            .nav-content {
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

            .search-box {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .jobs-layout {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .detail-layout {
                flex-direction: column;
                gap: 28px;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

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
                width: 70px;
                margin: auto;
            }

            .nav-buttons {
                display: grid;
                grid-template-columns: 1fr;
                gap: 8px;
                width: 100%;
            }

            .job-card {
                grid-template-columns: 1fr;
                gap: 14px;
                padding: 18px;
            }

            .company-logo {
                width: 56px;
                height: 56px;
            }

            .job-action {
                text-align: left;
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
                width: 70px;
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
        label,
        .button,
        .field,
        .job-meta,
        .posted,
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
                <a href="/job" class="active">Jobs</a>
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

    <div id="mobileSidebar" class="mobile-sidebar">
        <button class="close-menu-button" type="button" onclick="toggleMobileMenu()">×</button>
        <nav class="side-links">
            <a href="/">Home</a>
            <a href="/job" class="active">Jobs</a>
            <a href="/fast-track">Fast Track Program</a>
            <a href="/training-partners">Training Partners</a>
            <a href="/about">About Us</a>
        </nav>
        <div class="side-buttons">
            <a href="#" class="button outline-button">Login</a>
            <a href="#" class="button blue-button">Register</a>
        </div>
    </div>

    <main class="main-section">
        <div class="container">
            <div id="listingView" class="listing-view">
                <h1 class="page-title">Find Your Dream Job</h1>
                <p class="page-subtitle">Explore the latest job openings and start your career today.</p>

                <div class="search-box">
                    <input class="field" type="text" placeholder="Search job title or keyword">
                    <select class="field">
                        <option>All Categories</option>
                        <option>Development</option>
                        <option>Analytics</option>
                        <option>Design</option>
                    </select>
                    <select class="field">
                        <option>All Locations</option>
                        <option>Bengaluru</option>
                        <option>Mumbai</option>
                        <option>Noida</option>
                    </select>
                    <button class="button blue-button">Search</button>
                </div>

                <div class="jobs-layout">
                    <aside class="filter-box">
                        <h3>Filters</h3>

                        <div class="filter-group">
                            <p class="filter-title">Job Type</p>
                            <label class="check-row"><input type="checkbox">Full Time</label>
                            <label class="check-row"><input type="checkbox">Part Time</label>
                            <label class="check-row"><input type="checkbox">Internship</label>
                            <label class="check-row"><input type="checkbox">Contract</label>
                            <a href="#" class="show-more">Show more</a>
                        </div>

                        <div class="filter-group">
                            <p class="filter-title">Experience Level</p>
                            <label class="check-row"><input type="checkbox">Fresher</label>
                            <label class="check-row"><input type="checkbox">0 - 1 Year</label>
                            <label class="check-row"><input type="checkbox">1 - 3 Years</label>
                            <label class="check-row"><input type="checkbox">3 - 5 Years</label>
                            <label class="check-row"><input type="checkbox">5+ Years</label>
                        </div>

                        <div class="filter-group">
                            <p class="filter-title">Work Mode</p>
                            <label class="check-row"><input type="checkbox">On-site</label>
                            <label class="check-row"><input type="checkbox">Hybrid</label>
                            <label class="check-row"><input type="checkbox">Remote</label>
                        </div>

                        <div class="filter-group">
                            <p class="filter-title">Location</p>
                            <input class="field" type="text" placeholder="Search location">
                            <label class="check-row"><input type="checkbox">Bengaluru</label>
                            <label class="check-row"><input type="checkbox">Hyderabad</label>
                            <label class="check-row"><input type="checkbox">Pune</label>
                            <label class="check-row"><input type="checkbox">Noida</label>
                            <label class="check-row"><input type="checkbox">Remote</label>
                        </div>
                    </aside>

                    <section>
                        <div class="jobs-top">
                            <span>4 Jobs Found</span>
                            <select class="field sort-select">
                                <option>Newest First</option>
                                <option>Oldest First</option>
                            </select>
                        </div>

                        <div class="job-card">
                            <div class="company-logo">TN</div>
                            <div>
                                <h2>Software Development Engineer</h2>
                                <div class="job-meta">
                                    <span>TechNova Solutions</span>
                                    <span>Bengaluru, India</span>
                                    <span>Full Time</span>
                                    <span>0 - 2 Years</span>
                                </div>
                                <p>Build scalable web applications and collaborate with cross-functional teams.</p>
                            </div>
                            <div class="job-action">
                                <div class="posted">Posted 2 days ago</div>
                                <button class="button outline-button" onclick="showDetail()">View Details</button>
                            </div>
                        </div>

                        <div class="job-card">
                            <div class="company-logo">FA</div>
                            <div>
                                <h2>Graduate Analyst</h2>
                                <div class="job-meta">
                                    <span>FinEdge Analytics</span>
                                    <span>Mumbai, India</span>
                                    <span>Full Time</span>
                                    <span>0 - 1 Year</span>
                                </div>
                                <p>Analyze business data, create insights, and support decision-making.</p>
                            </div>
                            <div class="job-action">
                                <div class="posted">Posted 3 days ago</div>
                                <button class="button outline-button" onclick="showDetail()">View Details</button>
                            </div>
                        </div>

                        <div class="job-card">
                            <div class="company-logo">UX</div>
                            <div>
                                <h2>Junior UI/UX Designer</h2>
                                <div class="job-meta">
                                    <span>PixelCraft Studios</span>
                                    <span>Pune, India</span>
                                    <span>Full Time</span>
                                    <span>0 - 2 Years</span>
                                </div>
                                <p>Design intuitive user interfaces and experiences for web and mobile apps.</p>
                            </div>
                            <div class="job-action">
                                <div class="posted">Posted 5 days ago</div>
                                <button class="button outline-button" onclick="showDetail()">View Details</button>
                            </div>
                        </div>

                        <div class="job-card">
                            <div class="company-logo">DA</div>
                            <div>
                                <h2>Data Analyst Trainee</h2>
                                <div class="job-meta">
                                    <span>Insitech Solutions</span>
                                    <span>Hyderabad, India</span>
                                    <span>Full Time</span>
                                    <span>0 - 1 Year</span>
                                </div>
                                <p>Work with datasets to extract insights and assist in building dashboards.</p>
                            </div>
                            <div class="job-action">
                                <div class="posted">Posted 1 week ago</div>
                                <button class="button outline-button" onclick="showDetail()">View Details</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div id="detailView" class="detail-view">
                <button class="button outline-button back-button" onclick="showListing()">Back to Jobs</button>

                <div class="detail-layout">
                    <div class="detail-left">
                        <h1 class="job-title">Software Development Engineer</h1>

                        <div class="company-name">
                            <span class="small-icon">CO</span>
                            <span>ABC Technologies</span>
                        </div>

                        <div class="detail-info">
                            <span>Noida, India</span>
                            <span>Full Time</span>
                            <span>Fresher</span>
                            <span>Posted 2 days ago</span>
                        </div>

                        <p class="intro-text">
                            Join our engineering team to build scalable, high-performance web applications
                            that solve real-world problems and create meaningful impact.
                        </p>

                        <div class="content-block">
                            <h2>Job Description</h2>
                            <ul>
                                <li>Work on end-to-end development of web applications.</li>
                                <li>Collaborate with cross-functional teams to define and deliver features.</li>
                                <li>Write clean, efficient, and well-documented code.</li>
                                <li>Troubleshoot, debug, and optimize application performance.</li>
                            </ul>
                        </div>

                        <div class="content-block">
                            <h2>Requirements</h2>
                            <ul>
                                <li>Bachelor's degree in Computer Science or related field.</li>
                                <li>Strong problem-solving skills and a keen eye for detail.</li>
                                <li>Good understanding of data structures, algorithms, and OOP concepts.</li>
                                <li>Basic knowledge of web technologies such as HTML, CSS, JavaScript.</li>
                            </ul>
                        </div>

                        <div class="content-block">
                            <h2>Key Skills</h2>
                            <div class="skill-list">
                                <span class="skill">JavaScript</span>
                                <span class="skill">React.js</span>
                                <span class="skill">HTML</span>
                                <span class="skill">CSS</span>
                                <span class="skill">Git</span>
                                <span class="skill">REST APIs</span>
                            </div>
                        </div>

                        <div class="content-block">
                            <h2>Benefits</h2>
                            <div class="benefits">
                                <div class="benefit"><span class="small-icon">HI</span>Health Insurance</div>
                                <div class="benefit"><span class="small-icon">FW</span>Flexible Work</div>
                                <div class="benefit"><span class="small-icon">LG</span>Learning & Growth</div>
                                <div class="benefit"><span class="small-icon">PB</span>Performance Bonus</div>
                            </div>
                        </div>
                    </div>

                    <aside class="detail-right">
                        <div class="side-card apply-card">
                            <a href="#" class="button blue-button">Apply Now</a>
                            <a href="#" class="button outline-button">Save Job</a>
                        </div>

                        <div class="side-card">
                            <h2>Job Overview</h2>

                            <div class="overview-row">
                                <span>Job Type</span>
                                <strong>Full Time</strong>
                            </div>

                            <div class="overview-row">
                                <span>Experience</span>
                                <strong>Fresher</strong>
                            </div>

                            <div class="overview-row">
                                <span>Location</span>
                                <strong>Noida, India</strong>
                            </div>

                            <div class="overview-row">
                                <span>Industry</span>
                                <strong>IT Services</strong>
                            </div>

                            <div class="overview-row">
                                <span>Salary</span>
                                <strong>Rs. 3.5 - 5 LPA</strong>
                            </div>
                        </div>
                    </aside>
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
        function toggleMobileMenu() {
            document.getElementById('mobileSidebar').classList.toggle('show');
        }

        function showDetail() {
            document.getElementById("listingView").classList.add("hide");
            document.getElementById("detailView").classList.add("show");
            window.scrollTo(0, 0);
        }

        function showListing() {
            document.getElementById("listingView").classList.remove("hide");
            document.getElementById("detailView").classList.remove("show");
            window.scrollTo(0, 0);
        }
    </script>
</body>
</html>
