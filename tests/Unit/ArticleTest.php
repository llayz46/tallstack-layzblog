<?php

use App\Models\Article;
use App\Models\Tag;

it('has a title', function () {
    $article = Article::factory()->create();

    expect($article->title)->toBe($article->title);
});

it('has a slug', function () {
    $article = Article::factory()->create(['slug' => 'my-slug']);

    expect($article->slug)->toBe('my-slug');
});

it('has a unique slug', function () {
    Article::factory()->create(['slug' => 'my-slug']);

    $this->expectException(Illuminate\Database\QueryException::class);

    Article::factory()->create(['slug' => 'my-slug']);
});

it('has a content', function () {
    $article = Article::factory()->create(['content' => 'My content']);

    expect($article->content)->toBe('My content');
});

it('has a resume', function () {
    $article = Article::factory()->create(['resume' => 'My resume']);

    expect($article->resume)->toBe('My resume');
});

it('has views', function () {
    $article = Article::factory()->create(['views' => 10]);

    expect($article->views)->toBe(10);
});

it('has likes', function () {
    $article = Article::factory()->create(['likes' => 10]);

    expect($article->likes)->toBe(10);
});

test('views can be incremented', function () {
    $article = Article::factory()->create(['views' => 10]);

    $article->increment('views');

    expect($article->views)->toBe(11);
});

test('likes can be incremented', function () {
    $article = Article::factory()->create(['likes' => 10]);

    $article->increment('likes');

    expect($article->likes)->toBe(11);
});

test('views can be decremented', function () {
    $article = Article::factory()->create(['views' => 10]);

    $article->decrement('views');

    expect($article->views)->toBe(9);
});

test('likes can be decremented', function () {
    $article = Article::factory()->create(['likes' => 10]);

    $article->decrement('likes');

    expect($article->likes)->toBe(9);
});

it('has a category', function () {
    $article = Article::factory()->create();

    expect($article->category)->toBe($article->category);
});

it('has tags', function () {
    $article = Article::factory()->create();

    expect($article->tags)->toBe($article->tags);
});

it('can un attach tags', function () {
    $article = Article::factory()->hasTags(3)->create();

    $article->tags()->detach();

    expect($article->tags)->toBeEmpty();
});

it('can attach tags', function () {
    $article = Article::factory()->create();
    $tag = Tag::factory()->create();

    $article->tags()->attach($tag);

    expect($article->tags->count())->toBe(1);
});

it('can attach multiple tags', function () {
    $article = Article::factory()->create();
    $tags = Tag::factory(3)->create();

    $article->tags()->attach($tags);

    expect($article->tags->count())->toBe(3);
});
