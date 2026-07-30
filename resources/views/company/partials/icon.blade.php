@php
    $icons = [
        'briefcase' => '<rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M4 12h16"></path>',
        'users' => '<circle cx="9" cy="8" r="3"></circle><path d="M3 19c0-3 2.5-5 6-5"></path><circle cx="17" cy="9" r="2.5"></circle><path d="M14 19c0-2.4 1.8-4 4-4"></path>',
        'star' => '<path d="M12 3l2.7 5.4 6 .9-4.3 4.2 1 6-5.4-2.8-5.4 2.8 1-6-4.3-4.2 6-.9z"></path>',
        'calendar' => '<rect x="4" y="5" width="16" height="15" rx="2"></rect><path d="M8 3v4M16 3v4M4 10h16"></path>',
        'user-check' => '<circle cx="10" cy="8" r="4"></circle><path d="M3 21c0-4 3-7 7-7"></path><path d="M16 17l2 2 4-5"></path>',
        'user' => '<circle cx="12" cy="8" r="4"></circle><path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"></path>',
        'file' => '<path d="M14 2H6a2 2 0 0 0-2 2v16h16V8z"></path><path d="M14 2v6h6"></path><path d="M8 13h8M8 17h5"></path>',
    ];
@endphp

<svg viewBox="0 0 24 24" aria-hidden="true">{!! $icons[$icon] ?? $icons['briefcase'] !!}</svg>
