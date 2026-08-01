@php
    $activePage = 'messages';

    $conversations = [
        ['name' => 'Rohit Kumar', 'role' => 'Full Stack Developer', 'preview' => 'Thank you for considering my application. I am very interested...', 'time' => '10:30 AM', 'unread' => 2, 'starred' => true, 'avatar' => 'RK', 'date' => '05 Jun 2024', 'messages' => [
            ['from' => 'candidate', 'text' => 'Hi, I wanted to follow up on my application for the Full Stack Developer position.', 'time' => '10:15 AM'],
            ['from' => 'company', 'text' => 'Hi Rohit,<br><br>Thank you for your interest in the role. We are reviewing applications and will get back to you soon.', 'time' => '10:18 AM'],
            ['from' => 'candidate', 'text' => 'Thank you for the update. I am very interested in this opportunity and look forward to hearing from you.', 'time' => '10:20 AM'],
            ['from' => 'company', 'text' => 'Great! We will keep you updated on the next steps.', 'time' => '10:22 AM'],
        ]],
        ['name' => 'Priya Singh', 'role' => 'Full Stack Developer', 'preview' => 'I wanted to follow up on my application for the Full Stack...', 'time' => 'Yesterday', 'unread' => 1, 'starred' => false, 'avatar' => 'PS', 'date' => '04 Jun 2024', 'messages' => [
            ['from' => 'candidate', 'text' => 'Hello, I wanted to follow up on my application for the Full Stack Developer role.', 'time' => '09:40 AM'],
            ['from' => 'company', 'text' => 'Hi Priya, your profile is under review. We will update you shortly.', 'time' => '10:05 AM'],
        ]],
        ['name' => 'Aman Sharma', 'role' => 'React Developer', 'preview' => 'Can you please share more details about the next steps?', 'time' => '02 Jun', 'unread' => 0, 'starred' => false, 'avatar' => 'AS', 'date' => '02 Jun 2024', 'messages' => [
            ['from' => 'candidate', 'text' => 'Can you please share more details about the next steps?', 'time' => '03:25 PM'],
            ['from' => 'company', 'text' => 'Sure Aman, the next step is a technical interview. We will share a schedule soon.', 'time' => '03:40 PM'],
        ]],
        ['name' => 'Sneha Patel', 'role' => 'UI/UX Designer', 'preview' => 'Thank you! I look forward to hearing from you.', 'time' => '31 May', 'unread' => 0, 'starred' => false, 'avatar' => 'SP', 'date' => '31 May 2024', 'messages' => [
            ['from' => 'company', 'text' => 'Hi Sneha, thanks for sharing your portfolio.', 'time' => '12:05 PM'],
            ['from' => 'candidate', 'text' => 'Thank you! I look forward to hearing from you.', 'time' => '12:22 PM'],
        ]],
        ['name' => 'Karan Mehta', 'role' => 'Backend Developer', 'preview' => 'I have attached my updated resume for your reference.', 'time' => '30 May', 'unread' => 0, 'starred' => false, 'avatar' => 'KM', 'date' => '30 May 2024', 'messages' => [
            ['from' => 'candidate', 'text' => 'I have attached my updated resume for your reference.', 'time' => '05:15 PM'],
            ['from' => 'company', 'text' => 'Thanks Karan. Our team will review it.', 'time' => '05:28 PM'],
        ]],
    ];

    $unreadCount = collect($conversations)->where('unread', '>', 0)->count();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - OnlyFreshers</title>
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
        .company-avatar, .top-avatar, .avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
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
        .message-card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); display: grid; grid-template-columns: 390px 1fr; min-height: 760px; overflow: hidden; }
        .inbox { border-right: 1px solid #dce7f8; display: flex; flex-direction: column; }
        .inbox-top { padding: 22px 18px 0; }
        .search-row { display: grid; grid-template-columns: 1fr 46px; gap: 12px; margin-bottom: 18px; }
        .search-row input { height: 42px; border: 1px solid #dce7f8; border-radius: 7px; padding: 0 14px; outline: none; font-size: 13px; }
        .filter-btn { border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #075fe4; cursor: pointer; font-size: 18px; }
        .tabs { display: grid; grid-template-columns: repeat(3, 1fr); border-bottom: 1px solid #dce7f8; }
        .tab { border: 0; background: transparent; padding: 13px 8px; font-size: 13px; color: #24344f; cursor: pointer; border-bottom: 3px solid transparent; }
        .tab.active { color: #075fe4; border-bottom-color: #075fe4; font-weight: 700; }
        .conversation { display: grid; grid-template-columns: 58px 1fr auto; gap: 14px; padding: 16px 18px; border-bottom: 1px solid #edf2fb; cursor: pointer; position: relative; }
        .conversation.active { background: #f5f8ff; border-left: 3px solid #9fc0f5; }
        .avatar { width: 52px; height: 52px; background: #eaf2ff; color: #075fe4; font-size: 13px; }
        .conversation h3 { margin: 0 0 8px; font-size: 13px; font-weight: 700; }
        .conversation p { margin: 0; color: #24344f; font-size: 12px; line-height: 1.45; }
        .conv-side { text-align: right; color: #24344f; font-size: 12px; }
        .unread { display: inline-flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: 50%; background: #075fe4; color: white; font-size: 11px; margin-top: 18px; font-weight: 700; }
        .inbox-footer { margin-top: auto; padding: 18px 26px; border-top: 1px solid #edf2fb; font-size: 13px; color: #24344f; }
        .chat { display: grid; grid-template-rows: 96px 1fr 112px; min-width: 0; }
        .chat-head { display: flex; align-items: center; justify-content: space-between; padding: 0 24px; border-bottom: 1px solid #dce7f8; }
        .chat-user { display: flex; align-items: center; gap: 16px; }
        .chat-user h2 { margin: 0 0 7px; font-size: 15px; font-weight: 700; }
        .chat-user p { margin: 0; color: #52607a; font-size: 12px; }
        .chat-actions { display: flex; gap: 16px; font-size: 22px; }
        .chat-actions button { border: 0; background: transparent; cursor: pointer; color: #061942; }
        .chat-body { padding: 18px 24px; overflow: auto; }
        .date-chip { width: max-content; margin: 0 auto 18px; padding: 8px 18px; border: 1px solid #dce7f8; border-radius: 20px; color: #52607a; font-size: 12px; }
        .bubble { max-width: 460px; padding: 16px 18px; border: 1px solid #dce7f8; border-radius: 12px; margin-bottom: 16px; font-size: 13px; line-height: 1.55; }
        .bubble p { margin: 0 0 12px; }
        .bubble time { color: #52607a; font-size: 12px; }
        .sent { margin-left: auto; background: #eaf2ff; }
        .received { background: white; }
        .composer { display: grid; grid-template-columns: 1fr 92px; gap: 16px; align-items: center; padding: 18px 24px; border-top: 1px solid #dce7f8; }
        .compose-box { min-height: 72px; border: 1px solid #dce7f8; border-radius: 8px; padding: 14px; box-sizing: border-box; }
        .compose-box textarea { width: 100%; border: 0; outline: none; resize: none; height: 32px; font-family: inherit; font-size: 13px; color: #061942; }
        .compose-tools { display: flex; gap: 18px; color: #24344f; font-size: 18px; }
        .send-btn { height: 46px; border: 0; border-radius: 7px; background: #075fe4; color: white; font-size: 13px; font-weight: 700; cursor: pointer; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .message-card { grid-template-columns: 1fr; } .inbox { border-right: 0; border-bottom: 1px solid #dce7f8; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar { flex-direction: column; align-items: flex-start; } .company-menu { grid-template-columns: 1fr; } .composer { grid-template-columns: 1fr; } .bubble { max-width: 100%; } }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Messages</h1>
                    <p>Communicate with candidates and manage conversations.</p>
                </div>
                <div class="top-actions">
                    <button class="bell" type="button">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>3</span>
                    </button>
                    <div class="top-user">
                        <div class="top-avatar">T</div>
                        <div><h3>TechNova Solutions</h3><p>Company</p></div>
                        <button type="button">⌄</button>
                    </div>
                </div>
            </header>

            <section class="message-card">
                <aside class="inbox">
                    <div class="inbox-top">
                        <div class="search-row">
                            <input id="searchInput" placeholder="Search messages...">
                            <button class="filter-btn" type="button">⌘</button>
                        </div>
                        <div class="tabs">
                            <button class="tab active" type="button" data-filter="all">All</button>
                            <button class="tab" type="button" data-filter="unread">Unread ({{ $unreadCount }})</button>
                            <button class="tab" type="button" data-filter="starred">Starred</button>
                        </div>
                    </div>

                    <div id="conversationList">
                        @foreach ($conversations as $conversation)
                            <div class="conversation {{ $loop->first ? 'active' : '' }}" data-index="{{ $loop->index }}" data-name="{{ strtolower($conversation['name'].' '.$conversation['preview']) }}" data-unread="{{ $conversation['unread'] > 0 ? 'yes' : 'no' }}" data-starred="{{ $conversation['starred'] ? 'yes' : 'no' }}">
                                <div class="avatar">{{ $conversation['avatar'] }}</div>
                                <div>
                                    <h3>{{ $conversation['name'] }}</h3>
                                    <p>{{ $conversation['preview'] }}</p>
                                </div>
                                <div class="conv-side">
                                    <div>{{ $conversation['time'] }}</div>
                                    @if ($conversation['unread'] > 0)
                                        <span class="unread">{{ $conversation['unread'] }}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="inbox-footer" id="inboxFooter">Showing 1 to {{ count($conversations) }} of 12 conversations</div>
                </aside>

                <div class="chat">
                    <div class="chat-head">
                        <div class="chat-user">
                            <div class="avatar" id="chatAvatar">RK</div>
                            <div>
                                <h2 id="chatName">Rohit Kumar</h2>
                                <p id="chatRole">Full Stack Developer</p>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <button type="button">☆</button>
                            <button type="button">⋮</button>
                        </div>
                    </div>

                    <div class="chat-body" id="chatBody">
                        <div class="date-chip">05 Jun 2024</div>
                        <div class="bubble received"><p>Hi, I wanted to follow up on my application for the Full Stack Developer position.</p><time>10:15 AM</time></div>
                        <div class="bubble sent"><p>Hi Rohit,<br><br>Thank you for your interest in the role. We are reviewing applications and will get back to you soon.</p><time>10:18 AM</time></div>
                        <div class="bubble received"><p>Thank you for the update. I am very interested in this opportunity and look forward to hearing from you.</p><time>10:20 AM</time></div>
                        <div class="bubble sent"><p>Great! We will keep you updated on the next steps.</p><time>10:22 AM</time></div>
                    </div>

                    <div class="composer">
                        <div class="compose-box">
                            <textarea id="messageInput" placeholder="Type your message..."></textarea>
                            <div class="compose-tools">⌕ ☺ ▤</div>
                        </div>
                        <button class="send-btn" type="button" id="sendMessage">Send</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const conversations = @json($conversations);
        const rows = document.querySelectorAll('.conversation');
        const chatName = document.getElementById('chatName');
        const chatRole = document.getElementById('chatRole');
        const chatAvatar = document.getElementById('chatAvatar');
        const chatBody = document.getElementById('chatBody');
        const searchInput = document.getElementById('searchInput');
        const inboxFooter = document.getElementById('inboxFooter');
        let activeConversation = 0;
        let activeFilter = 'all';

        function renderMessages(index) {
            const item = conversations[index];
            chatBody.innerHTML = '<div class="date-chip">' + item.date + '</div>';

            item.messages.forEach(function (message) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble ' + (message.from === 'company' ? 'sent' : 'received');
                bubble.innerHTML = '<p>' + message.text + '</p><time>' + message.time + '</time>';
                chatBody.appendChild(bubble);
            });

            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function openConversation(index) {
            const item = conversations[index];
            activeConversation = index;
            chatName.textContent = item.name;
            chatRole.textContent = item.role;
            chatAvatar.textContent = item.avatar;
            rows.forEach(function (row) { row.classList.remove('active'); });
            rows[index].classList.add('active');
            renderMessages(index);
        }

        rows.forEach(function (row) {
            row.addEventListener('click', function () {
                openConversation(Number(row.dataset.index));
            });
        });

        function filterConversations() {
            const search = searchInput.value.toLowerCase();
            let visibleCount = 0;
            rows.forEach(function (row) {
                const matchSearch = row.dataset.name.includes(search);
                const matchFilter = activeFilter === 'all' || row.dataset[activeFilter] === 'yes';
                const show = matchSearch && matchFilter;
                row.style.display = show ? 'grid' : 'none';
                if (show) visibleCount++;
            });
            inboxFooter.textContent = 'Showing 1 to ' + visibleCount + ' of 12 conversations';
        }

        document.querySelectorAll('.tab').forEach(function (tab) {
            tab.addEventListener('click', function () {
                document.querySelectorAll('.tab').forEach(function (item) { item.classList.remove('active'); });
                tab.classList.add('active');
                activeFilter = tab.dataset.filter;
                filterConversations();
            });
        });

        searchInput.addEventListener('input', filterConversations);

        document.getElementById('sendMessage').addEventListener('click', function () {
            const input = document.getElementById('messageInput');
            if (!input.value.trim()) return;
            const bubble = document.createElement('div');
            bubble.className = 'bubble sent';
            bubble.innerHTML = '<p>' + input.value + '</p><time>Now</time>';
            conversations[activeConversation].messages.push({
                from: 'company',
                text: input.value,
                time: 'Now'
            });
            chatBody.appendChild(bubble);
            input.value = '';
            chatBody.scrollTop = chatBody.scrollHeight;
        });

        renderMessages(0);
    </script>
</body>
</html>
