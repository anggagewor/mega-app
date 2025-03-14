<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::prefix('animes')->group(function () {
    Route::get('/', [AnimeController::class, 'index'])->name('animes.index');
    Route::get('/{id}', [AnimeController::class, 'show'])->name('animes.show');
    Route::get('/{id}/characters', [AnimeController::class, 'characters'])->name('animes.characters');
    Route::get('/{id}/episodes', [AnimeController::class, 'episodes'])->name('animes.episodes');
    Route::get('/{id}/episodes/{episode_id}', [AnimeController::class, 'episodeShow'])->name('animes.episodes.show');
    Route::get('/{id}/episodes/{episode_id}/create', [AnimeController::class, 'createEpisodeLink'])->name('animes.episodes.link.create');
    Route::post('/{id}/episodes/{episode_id}/create', [AnimeController::class, 'storeEpisodeLink'])->name('animes.episodes.link.store');
    Route::get('/{id}/episodes/{episode_id}/{link_id}', [AnimeController::class, 'episodeDetails'])->name('animes.episodes.show.link');
    Route::get('/{id}/pictures', [AnimeController::class, 'pictures'])->name('animes.pictures');
    Route::get('/{id}/sync', [AnimeController::class, 'sync'])->name('animes.sync');
    Route::get('/{id}/sync-episodes', [AnimeController::class, 'syncEpisodes'])->name('animes.sync.episodes');
});

Route::prefix('topics')->group(function () {
    Route::get('/', [TopicController::class, 'index'])->name('topics.index');
    Route::get('/create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('/create', [TopicController::class, 'store'])->name('topics.store');
    Route::get('/create/{id}', [TopicController::class, 'createSub'])->name('topics.create-sub');
    Route::post('/create/{id}', [TopicController::class, 'storeSub'])->name('topics.store-sub');
    Route::get('/{id}', [TopicController::class, 'show'])->name('topics.show');
    Route::get('/{id}/sub/{sub_id}', [TopicController::class, 'subtopic'])->name('topics.subtopic.show');
    Route::get('/{id}/sub/{sub_id}/create', [TopicController::class, 'createContent'])->name('topics.subtopic.content.create');
    Route::post('/{id}/sub/{sub_id}/create', [TopicController::class, 'storeContent'])->name('topics.subtopic.content.store');
    Route::get('/{id}/sub/{sub_id}/{content_id}', [TopicController::class, 'showContent'])->name('topics.subtopic.show.content');
    Route::get('/{id}/sub/{sub_id}/{content_id}/edit', [TopicController::class, 'editContent'])->name('topics.subtopic.show.content.edit');
    Route::post('/{id}/sub/{sub_id}/{content_id}/edit', [TopicController::class, 'updateContent'])->name('topics.subtopic.show.content.update');
});

Route::prefix('laptops')->group(function () {
    Route::get('/', [LaptopController::class, 'index'])->name('laptops.index');
    Route::post('/fetch', [LaptopController::class, 'fetch'])->name('laptops.fetch');
    Route::get('/show/{id}', [LaptopController::class, 'show'])->name('laptops.show');
});


Route::prefix('tools')->group(function () {
    Route::get('ip-finder',[\App\Http\Controllers\ToolsController::class,'IpFinder'])->name('tools.ip-finder');
});
