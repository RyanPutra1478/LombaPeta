@php
    $profile = auth()->user()->profile;
    $avatar = $profile && $profile->avatar ? asset('storage/' . $profile->avatar) : null;
    $initial = substr(auth()->user()->name, 0, 1);
    
    // Choose colors based on role
    $role = auth()->user()->role;
    $bgColor = 'bg-blue-100';
    $textColor = 'text-blue-600';
    $borderColor = 'border-blue-200';
    
    if ($role === 'penyelenggara') {
        $bgColor = 'bg-green-100';
        $textColor = 'text-green-700';
        $borderColor = 'border-green-200';
    }
@endphp

<a href="{{ route('profile.show') }}" class="w-9 h-9 rounded-full {{ $bgColor }} {{ $textColor }} font-bold text-sm flex items-center justify-center border {{ $borderColor }} overflow-hidden group hover:shadow-md transition-all">
    @if($avatar)
        <img src="{{ $avatar }}" alt="Profile" class="w-full h-full object-cover transition-transform group-hover:scale-110">
    @else
        {{ $initial }}
    @endif
</a>
