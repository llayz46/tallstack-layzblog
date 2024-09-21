<?php

use App\Models\Article;
use App\Models\Tag;

it('has a title', function () {
    $tag = new Tag();
    $tag->title = 'Laravel';
    expect($tag->title)->toBe('Laravel');
});

it('belongs to an article', function () {
    $article = Article::factory()->create();

    $tag = Tag::factory()->create([
        'article_id' => $article->id,
    ]);

    expect($tag->article_id)->toBe($article->id);
});

it('belongs to many articles', function () {
    $article1 = Article::factory()->create();
    $article2 = Article::factory()->create();

    $tag = Tag::factory()->create();

    $tag->articles()->attach($article1);
    $tag->articles()->attach($article2);

    expect($tag->articles())->get()->toHaveCount(2);
});

it('can be retired of an article', function () {
    $article = Article::factory()->create();
    $tag = Tag::factory()->create();

    $tag->articles()->attach($article);

    $tag->articles()->detach($article);

    expect($tag->articles())->get()->toHaveCount(0);
});

it('can be retired of all articles', function () {
    $article1 = Article::factory()->create();
    $article2 = Article::factory()->create();

    $tag = Tag::factory()->create();

    $tag->articles()->attach($article1);
    $tag->articles()->attach($article2);

    $tag->articles()->detach();

    expect($tag->articles())->get()->toHaveCount(0);
});
