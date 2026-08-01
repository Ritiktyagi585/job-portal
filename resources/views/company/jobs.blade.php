@php
    $activePage = 'jobs';

    $defaultJobs = [
        ['title' => 'Full Stack Developer', 'experience' => '0 - 1 Year', 'location' => 'Bangalore', 'applications' => 56, 'status' => 'Active', 'date' => '01 Jun 2024'],
        ['title' => 'React Developer', 'experience' => '0 - 1 Year', 'location' => 'Remote', 'applications' => 32, 'status' => 'Active', 'date' => '25 May 2024'],
        ['title' => 'UI/UX Designer', 'experience' => '0 - 1 Year', 'location' => 'Bangalore', 'applications' => 18, 'status' => 'Active', 'date' => '10 May 2024'],
        ['title' => 'Backend Developer', 'experience' => '1 - 3 Years', 'location' => 'Hyderabad', 'applications' => 0, 'status' => 'Draft', 'date' => '05 Jun 2024'],
        ['title' => 'DevOps Engineer', 'experience' => '2 - 4 Years', 'location' => 'Pune', 'applications' => 0, 'status' => 'Draft', 'date' => '02 Jun 2024'],
        ['title' => 'Data Analyst', 'experience' => '0 - 1 Year', 'location' => 'Bangalore', 'applications' => 27, 'status' => 'Closed', 'date' => '20 Apr 2024'],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Jobs - OnlyFreshers</title>
    <style>
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f4f8ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .layout { min-height: 100vh; display: grid; grid-template-columns: 250px 1fr; }
        .company-sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; justify-content: space-between; padding: 0 18px 28px; box-sizing: border-box; }
        .company-logo img { width: 205px; height: auto; display: block; margin: 0 0 42px; }
        .company-menu { display: grid; gap: 8px; }
        .company-menu-item { position: relative; display: flex; align-items: center; gap: 14px; min-height: 44px; padding: 6px 14px; border-radius: 8px; color: #24344f; font-size: 14px; font-weight: 500; box-sizing: border-box; }
        .company-menu-item.active { color: #075fe4; background: #eaf2ff; font-weight: 700; }
        .company-menu-icon { width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .company-menu-icon svg { width: 21px; height: 21px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .menu-badge { margin-left: auto; min-width: 22px; height: 22px; border-radius: 50%; background: #ff3045; color: white; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; }
        .company-account { display: flex; align-items: center; gap: 12px; padding: 14px; border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 8px 22px rgba(6, 25, 66, 0.04); }
        .company-avatar, .top-avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
        .company-avatar { width: 34px; height: 34px; }
        .company-account h3 { margin: 0 0 4px; font-size: 14px; font-weight: 700; }
        .company-account p { margin: 0; color: #075fe4; font-size: 12px; }
        .company-account button { margin-left: auto; border: 0; background: transparent; color: #061942; cursor: pointer; font-size: 18px; }
        .main { padding: 0 38px 38px; box-sizing: border-box; }
        .topbar { min-height: 100px; display: flex; align-items: center; justify-content: space-between; gap: 24px; margin-bottom: 24px; }
        .page-title h1 { margin: 0 0 8px; font-size: 22px; font-weight: 700; }
        .page-title p { margin: 0; color: #24344f; font-size: 12px; }
        .top-actions { display: flex; align-items: center; gap: 18px; }
        .bell { position: relative; width: 42px; height: 42px; border: 0; background: white; border-radius: 50%; color: #061942; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(6, 25, 66, 0.05); }
        .bell svg { width: 23px; height: 23px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; right: 5px; top: 4px; width: 17px; height: 17px; border-radius: 50%; background: #ff3045; color: white; font-size: 11px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-user { display: flex; align-items: center; gap: 14px; }
        .top-avatar { width: 50px; height: 50px; font-size: 22px; }
        .top-user h3 { margin: 0 0 5px; font-size: 14px; font-weight: 700; }
        .top-user p { margin: 0; color: #52607a; font-size: 12px; }
        .top-user button { border: 0; background: transparent; cursor: pointer; font-size: 20px; }
        .jobs-card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 24px; }
        .jobs-head { display: flex; align-items: center; justify-content: space-between; gap: 18px; margin-bottom: 16px; }
        .tabs { display: flex; gap: 36px; }
        .tab { border: 0; background: transparent; color: #24344f; font-size: 14px; font-weight: 600; cursor: pointer; padding: 12px 18px; border-bottom: 3px solid transparent; }
        .tab.active { color: #075fe4; border-bottom-color: #075fe4; }
        .post-button { width: 148px; height: 42px; border: 1px solid #9fc0f5; border-radius: 8px; background: white; color: #075fe4; font-size: 13px; font-weight: 700; display: flex; align-items: center; justify-content: center; }
        .job-list { border: 1px solid #dce7f8; border-radius: 8px; overflow: hidden; }
        .job-row { display: grid; grid-template-columns: 1fr auto 36px; gap: 22px; align-items: center; padding: 20px 18px; border-bottom: 1px solid #dce7f8; }
        .job-row:last-child { border-bottom: 0; }
        .job-title { margin: 0 0 10px; font-size: 16px; font-weight: 700; }
        .job-meta { display: flex; flex-wrap: wrap; gap: 10px; color: #24344f; font-size: 13px; margin-bottom: 8px; }
        .applications { color: #061942; font-size: 13px; }
        .job-side { text-align: right; }
        .status { display: inline-flex; align-items: center; justify-content: center; min-width: 64px; height: 34px; border-radius: 10px; font-size: 12px; font-weight: 700; margin-bottom: 16px; }
        .Active { color: #00a65a; background: #dbf8e9; }
        .Draft { color: #075fe4; background: #eaf2ff; }
        .Closed { color: #52607a; background: #edf2fb; }
        .date { color: #24344f; font-size: 13px; }
        .dots { border: 0; background: transparent; font-size: 24px; line-height: 1; cursor: pointer; color: #061942; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar, .jobs-head { flex-direction: column; align-items: flex-start; } .company-menu { grid-template-columns: 1fr; } .job-row { grid-template-columns: 1fr; } .job-side { text-align: left; } }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>My Jobs</h1>
                    <p>Manage and view all your posted jobs.</p>
                </div>
                <div class="top-actions">
                    <button class="bell" type="button">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>3</span>
                    </button>
                    <div class="top-user">
                        <div class="top-avatar">T</div>
                        <div>
                            <h3>TechNova Solutions</h3>
                            <p>Company</p>
                        </div>
                        <button type="button">⌄</button>
                    </div>
                </div>
            </header>

            <section class="jobs-card">
                <div class="jobs-head">
                    <div class="tabs">
                        <button class="tab active" data-status="Active" type="button">Active (<span id="activeCount">0</span>)</button>
                        <button class="tab" data-status="Draft" type="button">Draft (<span id="draftCount">0</span>)</button>
                        <button class="tab" data-status="Closed" type="button">Closed (<span id="closedCount">0</span>)</button>
                    </div>
                    <a href="/company/post-job" class="post-button">+ Post New Job</a>
                </div>
                <div class="job-list" id="jobList"></div>
            </section>
        </main>
    </div>

    <script>
        const defaultJobs = @json($defaultJobs);
        const savedJobs = JSON.parse(localStorage.getItem('companyJobs') || '[]');
        const allJobs = savedJobs.concat(defaultJobs);
        const jobList = document.getElementById('jobList');

        function countJobs(status) {
            return allJobs.filter(function (job) { return job.status === status; }).length;
        }

        function renderJobs(status) {
            jobList.innerHTML = '';

            allJobs.filter(function (job) {
                return job.status === status;
            }).forEach(function (job) {
                const row = document.createElement('div');
                const dateLabel = job.status === 'Draft' ? 'Last edited on ' : job.status === 'Closed' ? 'Closed on ' : 'Posted on ';
                row.className = 'job-row';
                row.innerHTML = `
                    <div>
                        <h3 class="job-title">${job.title}</h3>
                        <div class="job-meta"><span>${job.experience}</span><span>•</span><span>${job.location}</span></div>
                        <div class="applications">${job.applications || 0} Applications</div>
                    </div>
                    <div class="job-side">
                        <div class="status ${job.status}">${job.status}</div>
                        <div class="date">${dateLabel}${job.date}</div>
                    </div>
                    <button class="dots" type="button">⋮</button>
                `;
                jobList.appendChild(row);
            });
        }

        document.getElementById('activeCount').textContent = countJobs('Active');
        document.getElementById('draftCount').textContent = countJobs('Draft');
        document.getElementById('closedCount').textContent = countJobs('Closed');

        document.querySelectorAll('.tab').forEach(function (tab) {
            tab.addEventListener('click', function () {
                document.querySelectorAll('.tab').forEach(function (item) {
                    item.classList.remove('active');
                });
                tab.classList.add('active');
                renderJobs(tab.dataset.status);
            });
        });

        renderJobs('Active');
    </script>
</body>
</html>
