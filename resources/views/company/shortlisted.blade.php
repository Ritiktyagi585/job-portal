@php
    $activePage = 'shortlisted';

    $candidates = [
        ['name' => 'Rohit Kumar', 'role' => 'Full Stack Developer', 'education' => 'Tech', 'experience' => '0 - 1 Year', 'score' => 85, 'date' => '02 Jun 2024', 'avatar' => 'RK'],
        ['name' => 'Priya Singh', 'role' => 'Full Stack Developer', 'education' => 'Tech', 'experience' => '0 - 1 Year', 'score' => 78, 'date' => '31 May 2024', 'avatar' => 'PS'],
        ['name' => 'Aman Sharma', 'role' => 'React Developer', 'education' => 'BCA', 'experience' => '0 - 1 Year', 'score' => 75, 'date' => '29 May 2024', 'avatar' => 'AS'],
        ['name' => 'Sneha Patel', 'role' => 'Full Stack Developer', 'education' => 'BCA', 'experience' => '0 - 1 Year', 'score' => 45, 'date' => '30 May 2024', 'avatar' => 'SP'],
    ];

    $jobs = ['All Jobs', 'Full Stack Developer', 'React Developer'];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortlisted Candidates - OnlyFreshers</title>
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
        .company-avatar, .top-avatar, .candidate-avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
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
        .card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 26px; }
        .filters { display: grid; grid-template-columns: 1fr 240px 120px 190px; gap: 18px; margin-bottom: 26px; }
        input, select, .filter-button, .view-button { height: 42px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 16px; font-size: 13px; outline: none; box-sizing: border-box; }
        .filter-button, .view-button { color: #075fe4; font-weight: 700; cursor: pointer; }
        .candidate-list { display: grid; gap: 12px; }
        .candidate-row { display: grid; grid-template-columns: 1fr 180px 170px; align-items: center; gap: 24px; min-height: 126px; padding: 20px; border: 1px solid #dce7f8; border-radius: 8px; box-sizing: border-box; }
        .person { display: flex; align-items: center; gap: 22px; }
        .candidate-avatar { width: 86px; height: 86px; background: #eaf2ff; color: #075fe4; font-size: 18px; }
        .person h3 { margin: 0 0 12px; font-size: 16px; font-weight: 700; }
        .person p { margin: 0 0 12px; color: #24344f; font-size: 14px; }
        .meta { display: flex; gap: 12px; color: #24344f; font-size: 13px; }
        .score-wrap p { margin: 0 0 8px; font-size: 12px; font-weight: 700; }
        .score { --score: 0; --color: #33c477; width: 82px; height: 82px; border-radius: 50%; background: conic-gradient(var(--color) calc(var(--score) * 1%), #d9f2e5 0); display: flex; align-items: center; justify-content: center; position: relative; color: var(--color); font-size: 16px; font-weight: 700; }
        .score::before { content: ""; position: absolute; inset: 7px; border-radius: 50%; background: white; }
        .score span { position: relative; z-index: 1; }
        .low { --color: #ff4d57; background: conic-gradient(var(--color) calc(var(--score) * 1%), #ffd9dc 0); }
        .date { font-size: 13px; line-height: 1.7; color: #061942; }
        .footer-row { display: flex; align-items: center; justify-content: space-between; margin-top: 18px; color: #24344f; font-size: 13px; }
        .pages { display: flex; gap: 10px; align-items: center; }
        .page-btn { min-width: 38px; height: 38px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; cursor: pointer; font-weight: 700; }
        .page-btn.active { background: #075fe4; color: white; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .filters { grid-template-columns: 1fr 1fr; } .candidate-row { grid-template-columns: 1fr; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar, .footer-row { flex-direction: column; align-items: flex-start; } .company-menu, .filters { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Shortlisted Candidates</h1>
                    <p>View and manage all candidates you have shortlisted.</p>
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

            <section class="card">
                <div class="filters">
                    <input id="searchInput" placeholder="Search by name or skills...">
                    <select id="jobFilter">
                        @foreach ($jobs as $job)
                            <option>{{ $job }}</option>
                        @endforeach
                    </select>
                    <button class="filter-button" type="button">Filters</button>
                    <button class="view-button" type="button" id="viewAll">View All Shortlisted</button>
                </div>

                <div class="candidate-list" id="candidateList">
                    @foreach ($candidates as $candidate)
                        <div class="candidate-row" data-name="{{ strtolower($candidate['name'].' '.$candidate['role'].' '.$candidate['education']) }}" data-job="{{ $candidate['role'] }}">
                            <div class="person">
                                <div class="candidate-avatar">{{ $candidate['avatar'] }}</div>
                                <div>
                                    <h3>{{ $candidate['name'] }}</h3>
                                    <p>{{ $candidate['role'] }}</p>
                                    <div class="meta"><span>{{ $candidate['education'] }}</span><span>•</span><span>{{ $candidate['experience'] }}</span></div>
                                </div>
                            </div>
                            <div class="score-wrap">
                                <p>Match Score</p>
                                <div class="score {{ $candidate['score'] < 50 ? 'low' : '' }}" style="--score: {{ $candidate['score'] }}"><span>{{ $candidate['score'] }}%</span></div>
                            </div>
                            <div class="date">Shortlisted on<br>{{ $candidate['date'] }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="footer-row">
                    <span id="resultText">Showing 1 to 4 of 12 shortlisted candidates</span>
                    <div class="pages">
                        <button class="page-btn">‹</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <span>...</span>
                        <button class="page-btn">3</button>
                        <button class="page-btn">›</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const jobFilter = document.getElementById('jobFilter');
        const rows = document.querySelectorAll('.candidate-row');
        const resultText = document.getElementById('resultText');

        function filterCandidates() {
            const search = searchInput.value.toLowerCase();
            const job = jobFilter.value;
            let count = 0;

            rows.forEach(function (row) {
                const matchesSearch = row.dataset.name.includes(search);
                const matchesJob = job === 'All Jobs' || row.dataset.job === job;
                const show = matchesSearch && matchesJob;
                row.style.display = show ? 'grid' : 'none';
                if (show) count++;
            });

            resultText.textContent = 'Showing 1 to ' + count + ' of 12 shortlisted candidates';
        }

        searchInput.addEventListener('input', filterCandidates);
        jobFilter.addEventListener('change', filterCandidates);
        document.getElementById('viewAll').addEventListener('click', function () {
            searchInput.value = '';
            jobFilter.value = 'All Jobs';
            filterCandidates();
        });
    </script>
</body>
</html>
