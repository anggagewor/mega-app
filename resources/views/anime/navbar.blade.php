<ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a href="{{ route('animes.show',['id'=>$anime->id]) }}"
           class="nav-link @if (request()->routeIs('animes.show')) active @endif">Details</a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="{{ route('animes.characters',['id'=>$anime->id]) }}"
           class="nav-link @if (request()->routeIs('animes.characters')) active @endif">Characters & Staff</a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="{{ route('animes.episodes',['id'=>$anime->id]) }}"
           class="nav-link @if (request()->routeIs('animes.episodes*')) active @endif">Episodes</a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="{{ route('animes.pictures',['id'=>$anime->id]) }}"
           class="nav-link @if (request()->routeIs('animes.pictures')) active @endif">Pictures</a>
    </li>
</ul>
