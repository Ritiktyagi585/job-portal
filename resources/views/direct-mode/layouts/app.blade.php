@php
    $user = $user ?? ['name' => 'Ananya Gupta', 'avatar' => asset('student.png'), 'notifications' => 3];
    $menuItems = $menuItems ?? [];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Direct Mode - Only Freshers')</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#06123f;background:#f7fbff;font-weight:500}a{text-decoration:none;color:inherit}button,input,select,textarea{font:inherit}.shell{min-height:100vh;display:grid;grid-template-columns:238px minmax(0,1fr);background:linear-gradient(135deg,#fbfdff,#f1f7ff)}.sidebar{background:#fff;border-right:1px solid #d8e4f7;display:flex;flex-direction:column}.brand{height:76px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #d8e4f7}.brand img{width:200px;display:block}.menu{padding:30px 16px 12px;display:grid;gap:9px}.menu-item{height:46px;border-radius:8px;display:flex;align-items:center;gap:17px;padding:0 18px;font-size:14px;font-weight:700;position:relative;color:#06123f}.menu-item.active{background:#eaf2ff;color:#064cff}.menu-item.active:before{content:"";position:absolute;left:0;top:11px;bottom:11px;width:3px;background:#064cff;border-radius:6px}.icon{width:22px;height:22px;display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto}.icon svg{width:21px;height:21px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.boost{margin:31px 18px 18px;padding:20px;border-radius:9px;background:#eef5ff;text-align:center}.rocket{height:105px;position:relative}.rocket:before{content:"";position:absolute;left:50px;top:17px;width:70px;height:70px;background:linear-gradient(135deg,#0d67ff,#163ade);clip-path:polygon(50% 0,82% 23%,68% 68%,100% 82%,65% 88%,50% 100%,35% 88%,0 82%,32% 68%,18% 23%);transform:rotate(35deg)}.rocket:after{content:"";position:absolute;left:30px;right:15px;bottom:6px;height:21px;border-radius:50%;background:#dce8ff}.boost h3{margin:0 0 10px;font-size:15px;line-height:1.25}.boost p{margin:0 0 16px;font-size:13px;line-height:1.35;color:#26375e}.primary{height:36px;border:1px solid #064cff;border-radius:6px;background:#064cff;color:#fff;font-size:13px;font-weight:800;padding:0 20px;cursor:pointer}.main{min-width:0;display:grid;grid-template-rows:76px 1fr auto}.topbar{background:#fff;border-bottom:1px solid #d8e4f7;display:grid;grid-template-columns:54px minmax(320px,570px) 1fr;align-items:center;gap:30px;padding:0 30px}.hamb{font-size:25px}.search-top{height:46px;border:1px solid #cbd8ee;border-radius:7px;background:#fbfdff;display:flex;align-items:center;gap:14px;padding:0 16px;color:#26375e}.search-top input{border:0;outline:0;background:transparent;width:100%;color:#26375e}.top-user{justify-self:end;display:flex;align-items:center;gap:19px}.top-bell{position:relative;border:0;background:transparent;color:#06123f;padding:0;cursor:pointer}.top-bell b{position:absolute;right:-8px;top:-11px;background:#064cff;color:#fff;border-radius:50%;width:18px;height:18px;font-size:11px;display:grid;place-items:center}.top-avatar{width:48px;height:48px;border-radius:50%;border:5px solid #e6eefb;background:url('{{ $user['avatar'] }}') center top/cover}.footer{height:58px;border-top:1px solid #d8e4f7;background:#fff;display:flex;align-items:center;justify-content:space-between;padding:0 32px;font-size:13px;color:#26375e}.footer nav{display:flex;gap:26px}.footer i{height:16px;width:1px;background:#7d8aaa}.page{padding:24px 28px 16px}.welcome{margin:0 0 14px 4px}.welcome small{font-size:13px}.welcome h1{margin:4px 0 0;font-size:21px}@media(max-width:1240px){.shell{grid-template-columns:1fr}.sidebar{display:none}.topbar{grid-template-columns:44px 1fr}.top-user{grid-column:2;justify-self:end}}@media(max-width:760px){.topbar{height:auto;grid-template-columns:1fr;padding:14px}.hamb{display:none}.top-user{grid-column:auto;justify-self:start}.page{padding:14px}.footer,.footer nav{height:auto;flex-direction:column;align-items:flex-start;gap:12px;padding:16px}.footer i{display:none}}
    </style>
    @stack('styles')
</head>
<body>
    <div class="shell">
        <aside class="sidebar">
            <a class="brand" href="/direct-mode/dashboard"><img src="{{ asset('ofclogo1.png') }}" alt="Only Freshers"></a>
            <nav class="menu">
                @foreach ($menuItems as $item)
                    <a class="menu-item {{ ($activePage ?? '') === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}"><span class="icon" data-icon="{{ $item['icon'] }}"></span>{{ $item['title'] }}</a>
                @endforeach
            </nav>
            <div class="boost">
                <div class="rocket"></div>
                <h3>Complete your profile<br>get better matches!</h3>
                <p>A complete profile gets you 3x more job opportunities.</p>
                <button class="primary" type="button">Improve Profile</button>
            </div>
        </aside>
        <main class="main">
            <header class="topbar">
                <div class="hamb">=</div>
                <label class="search-top"><span class="icon" data-icon="search"></span><input type="search" placeholder="Search jobs, companies, skills..."></label>
                <div class="top-user"><button class="top-bell" type="button"><b>{{ $user['notifications'] }}</b><span class="icon" data-icon="bell"></span></button><div class="top-avatar"></div><strong>{{ $user['name'] }}</strong><span class="icon" data-icon="chevron"></span></div>
            </header>
            @yield('content')
            <footer class="footer"><span>© 2024 Only Freshers. All rights reserved.</span><nav><a href="#">About Us</a><i></i><a href="#">Privacy Policy</a><i></i><a href="#">Terms & Conditions</a><i></i><a href="#">Contact Us</a></nav></footer>
        </main>
    </div>
    <script>
        window.directModeIcons={home:'<svg viewBox="0 0 24 24"><path d="m3 11 9-8 9 8"></path><path d="M5 10v10h14V10"></path></svg>',user:'<svg viewBox="0 0 24 24"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>',clipboard:'<svg viewBox="0 0 24 24"><rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M9 7h6M9 12h6"></path></svg>',briefcase:'<svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2"></rect><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>',file:'<svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"></path><path d="M14 2v6h6"></path></svg>',clock:'<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>',chart:'<svg viewBox="0 0 24 24"><path d="M3 17 9 11l4 4 8-8"></path><path d="M14 7h7v7"></path></svg>',activity:'<svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>',settings:'<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-2.83 2.83-.06-.06A1.7 1.7 0 0 0 15 19.4 1.7 1.7 0 0 0 14 21h-4a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.88.34l-.06.06-2.83-2.83.06-.06A1.7 1.7 0 0 0 4.6 15 1.7 1.7 0 0 0 3 14v-4a1.7 1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.34-1.88l-.06-.06 2.83-2.83.06.06A1.7 1.7 0 0 0 9 4.6 1.7 1.7 0 0 0 10 3h4a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.88-.34l.06-.06 2.83 2.83-.06.06A1.7 1.7 0 0 0 19.4 9 1.7 1.7 0 0 0 21 10v4a1.7 1.7 0 0 0-1.6 1Z"></path></svg>',logout:'<svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="m16 17 5-5-5-5M21 12H9"></path></svg>',search:'<svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>',bell:'<svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>',chevron:'<svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg>'};
        Object.assign(window.directModeIcons,{
            users:'<svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-8 0v2"></path><circle cx="12" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path></svg>',
            calendar:'<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"></rect><path d="M16 2v4M8 2v4M3 10h18"></path></svg>',
            trophy:'<svg viewBox="0 0 24 24"><path d="M8 21h8M12 17v4"></path><path d="M7 4h10v4a5 5 0 0 1-10 0V4Z"></path><path d="M5 5H3v3a4 4 0 0 0 4 4M19 5h2v3a4 4 0 0 1-4 4"></path></svg>',
            pin:'<svg viewBox="0 0 24 24"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
            bookmark:'<svg viewBox="0 0 24 24"><path d="M19 21 12 17 5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2Z"></path></svg>',
            star:'<svg viewBox="0 0 24 24"><path d="m12 2 3 7 7 .6-5.4 4.7 1.6 7-6.2-3.7-6.2 3.7 1.6-7L2 9.6 9 9l3-7Z"></path></svg>',
            x:'<svg viewBox="0 0 24 24"><path d="M18 6 6 18M6 6l12 12"></path></svg>'
        });
        document.querySelectorAll('[data-icon]').forEach(el=>{el.innerHTML=window.directModeIcons[el.dataset.icon]||el.innerHTML});
    </script>
    @stack('scripts')
</body>
</html>
