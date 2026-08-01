@php
    $activePage = 'post-job';

    $experienceLevels = ['0 - 1 Year', '1 - 3 Years', '3 - 5 Years', '5+ Years'];
    $employmentTypes = ['Full Time', 'Part Time', 'Internship', 'Contract'];
    $skills = [];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job - OnlyFreshers</title>

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
        .job-card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 28px 30px; box-sizing: border-box; }
        .card-top { display: flex; justify-content: flex-end; margin-bottom: 12px; }
        .draft-button { width: 118px; height: 40px; border: 1px solid #9fc0f5; border-radius: 8px; background: white; color: #075fe4; font-size: 13px; font-weight: 700; cursor: pointer; }
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px 28px; }
        .field.full { grid-column: 1 / -1; }
        label { display: block; margin: 0 0 9px; font-size: 13px; font-weight: 700; }
        .required { color: #ff3045; }
        input, select, textarea { width: 100%; border: 1px solid #dce7f8; border-radius: 7px; outline: none; box-sizing: border-box; color: #24344f; font-size: 15px; font-family: inherit; background: white; }
        input, select { height: 50px; padding: 0 18px; }
        textarea { min-height: 120px; padding: 18px; line-height: 1.6; resize: vertical; border-radius: 0 0 7px 7px; }
        .skills { display: flex; flex-wrap: wrap; gap: 14px 18px; align-items: center; }
        .skill-tag { min-width: 104px; height: 42px; padding: 0 16px; border: 0; border-radius: 7px; background: #eef3ff; color: #061942; font-size: 14px; display: inline-flex; align-items: center; justify-content: center; gap: 14px; }
        .skill-tag button { border: 0; background: transparent; color: #061942; cursor: pointer; font-size: 18px; line-height: 1; }
        .add-skill { width: 122px; height: 42px; border: 1px dashed #9fc0f5; border-radius: 7px; background: white; color: #075fe4; font-size: 14px; font-weight: 700; cursor: pointer; }
        .editor { border: 1px solid #dce7f8; border-radius: 7px; overflow: hidden; }
        .toolbar { height: 48px; display: flex; align-items: center; gap: 18px; padding: 0 20px; border-bottom: 1px solid #dce7f8; box-sizing: border-box; }
        .tool { border: 0; background: transparent; color: #24344f; font-size: 17px; font-weight: 700; cursor: pointer; }
        .publish-button { grid-column: 1 / -1; height: 52px; border: 0; border-radius: 7px; background: #075fe4; color: white; font-size: 16px; font-weight: 700; cursor: pointer; box-shadow: 0 10px 20px rgba(7, 95, 228, 0.16); }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar { flex-direction: column; align-items: flex-start; } .company-menu, .form-grid { grid-template-columns: 1fr; } .field.full, .publish-button { grid-column: auto; } .job-card { padding: 22px 16px; } }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Post a Job</h1>
                    <p>Fill in the details to post a new job.</p>
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

            <section class="job-card">
                <div class="card-top">
                    <button class="draft-button" type="button" id="saveDraft">Save Draft</button>
                </div>

                <form class="form-grid" id="postJobForm">
                    <div class="field">
                        <label for="jobTitle">Job Title <span class="required">*</span></label>
                        <input id="jobTitle" placeholder="Enter job title">
                    </div>
                    <div class="field">
                        <label for="jobRole">Job Role <span class="required">*</span></label>
                        <input id="jobRole" placeholder="Enter job role">
                    </div>
                    <div class="field">
                        <label for="experience">Experience Level <span class="required">*</span></label>
                        <select id="experience">
                            <option value="">Select experience level</option>
                            @foreach ($experienceLevels as $level)
                                <option>{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="employmentType">Employment Type <span class="required">*</span></label>
                        <select id="employmentType">
                            <option value="">Select employment type</option>
                            @foreach ($employmentTypes as $type)
                                <option>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field full">
                        <label for="location">Location <span class="required">*</span></label>
                        <input id="location" placeholder="Enter job location">
                    </div>
                    <div class="field full">
                        <label>Skills <span style="font-weight:500;">(Add up to 10 skills)</span></label>
                        <div class="skills" id="skillsList">
                            @foreach ($skills as $skill)
                                <span class="skill-tag">{{ $skill }} <button type="button">×</button></span>
                            @endforeach
                            <button class="add-skill" type="button" id="addSkill">+ Add Skill</button>
                        </div>
                    </div>
                    <div class="field full">
                        <label for="description">Job Description <span class="required">*</span></label>
                        <div class="editor">
                            <div class="toolbar">
                                <button class="tool" type="button">B</button>
                                <button class="tool" type="button"><i>I</i></button>
                                <button class="tool" type="button"><u>U</u></button>
                                <button class="tool" type="button">☷</button>
                                <button class="tool" type="button">☰</button>
                                <button class="tool" type="button">🔗</button>
                            </div>
                            <textarea id="description" placeholder="Write job description"></textarea>
                        </div>
                    </div>
                    <button class="publish-button" type="submit">Publish Job</button>
                </form>
            </section>
        </main>
    </div>

    <script>
        document.querySelectorAll('.skill-tag button').forEach(function (button) {
            button.addEventListener('click', function () {
                button.closest('.skill-tag').remove();
            });
        });

        document.getElementById('addSkill').addEventListener('click', function () {
            const skillName = prompt('Enter skill name');
            if (!skillName) return;

            const tag = document.createElement('span');
            tag.className = 'skill-tag';
            tag.innerHTML = skillName + ' <button type="button">×</button>';
            tag.querySelector('button').addEventListener('click', function () {
                tag.remove();
            });
            document.getElementById('skillsList').insertBefore(tag, document.getElementById('addSkill'));
        });

        function getSkills() {
            const skills = [];
            document.querySelectorAll('.skill-tag').forEach(function (tag) {
                skills.push(tag.firstChild.textContent.trim());
            });
            return skills;
        }

        function saveCompanyJob(status) {
            const jobs = JSON.parse(localStorage.getItem('companyJobs') || '[]');
            const today = new Date();
            const dateText = today.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }).replace(/ /g, ' ');

            jobs.unshift({
                title: document.getElementById('jobTitle').value || 'Untitled Job',
                role: document.getElementById('jobRole').value,
                experience: document.getElementById('experience').value || '0 - 1 Year',
                type: document.getElementById('employmentType').value || 'Full Time',
                location: document.getElementById('location').value || 'Not added',
                description: document.getElementById('description').value,
                skills: getSkills(),
                applications: 0,
                status: status,
                date: dateText
            });

            localStorage.setItem('companyJobs', JSON.stringify(jobs));
            window.location.href = '/company/jobs';
        }

        document.getElementById('saveDraft').addEventListener('click', function () {
            saveCompanyJob('Draft');
        });

        document.getElementById('postJobForm').addEventListener('submit', function (event) {
            event.preventDefault();
            saveCompanyJob('Active');
        });
    </script>
</body>
</html>
