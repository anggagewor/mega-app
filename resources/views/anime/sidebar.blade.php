<div class="card">
    @if($anime->cover)
        <img src="{{ $anime->cover }}" alt="">
    @else
        @include('layouts.not-found-svg')
    @endif
    <div class="card-body">
        <div class="card-title">
            Basic info
        </div>
        <a href="{{ route('animes.sync',['id'=>$anime->id]) }}" class="btn btn-primary btn-3 mb-2">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
            Sync Details
        </a>
        <div class="mb-2">
            Type: <strong>{{ $anime->type }}</strong>
        </div>
        <div class="mb-2">
            Episodes: <strong>{{ $anime->episodes }}</strong>
        </div>
        <div class="mb-2">
            Aired: <strong>{{ $anime->start_date }} - {{ $anime->end_date }}</strong>
        </div>
        <div class="mb-2">
            Status: <strong>{{ $anime->status }}</strong>
        </div>
        <div class="mb-2">
            Producers: <strong>{!! convert_to_tags($anime->producers) !!}</strong>
        </div>
        <div class="mb-2">
            Licensors: <strong>{!! convert_to_tags($anime->licensors) !!}</strong>
        </div>
        <div class="mb-2">
            Studios: <strong>{!! convert_to_tags($anime->studios) !!}</strong>
        </div>
        <div class="mb-2">
            Score: <strong>{{ $anime->score }}</strong>
        </div>
        <div class="mb-2">
            Genres: <strong>{!! convert_to_tags($anime->genres) !!}</strong>
        </div>

        <div class="mb-2">
            MAL: <a href="{{ $anime->url }}" target="_blank"><strong>MAL Page</strong></a>
        </div>
    </div>
</div>
