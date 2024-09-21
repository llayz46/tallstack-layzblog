<?php

use App\Models\Category;

it('can be created', function () {
    $category = Category::factory()->create();

    expect($category)->toBeInstanceOf(Category::class);
});

it('has a name', function () {
    $category = new Category();
    $category->name = 'Category 1';
    $category->save();

    expect($category->name)->toBe('Category 1');
});

it('can have a parent category', function () {
    $parentCategory = Category::factory()->create();
    $childCategory = Category::factory()->create([
        'parent_id' => $parentCategory->id,
    ]);

    expect($childCategory->parent->id)->toBe($parentCategory->id);
});

it('can have multiple child categories', function () {
    $parentCategory = Category::factory()->create();
    $childCategory1 = Category::factory()->create([
        'parent_id' => $parentCategory->id,
    ]);
    $childCategory2 = Category::factory()->create([
        'parent_id' => $parentCategory->id,
    ]);

    expect($parentCategory->children->count())->toBe(2)
        ->and($parentCategory->children->first()->id)->toBe($childCategory1->id)
        ->and($parentCategory->children->last()->id)->toBe($childCategory2->id);
});

it('can have multiple articles', function () {
    $category = Category::factory()->hasArticles(3)->create();

    expect($category->articles->count())->toBe(3);
});
