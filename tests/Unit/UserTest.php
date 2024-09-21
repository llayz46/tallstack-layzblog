<?php

use App\Models\User;

it('can create a user', function () {
    $user = User::factory()->create();

    expect($user)->toBeInstanceOf(User::class);
});

it('can create a user with a specific name and email', function () {
    $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@test.fr',
    ]);

    expect($user->name)->toBe('Test User')
        ->and($user->email)->toBe('test@test.fr');
});

it('can have a name', function () {
    $user = User::factory()->create(['name' => 'Test User']);

    expect($user->name)->toBe('Test User');
});

it('can have an email', function () {
    $user = User::factory()->create(['email' => 'test@test.fr']);

    expect($user->email)->toBe('test@test.fr');
});

it('can have a password', function () {
    $user = User::factory()->create(['password' => 'password']);

    expect(\Illuminate\Support\Facades\Hash::check('password', $user->password))->toBeTrue();
});

it('can have a remember token', function () {
    $user = User::factory()->create(['remember_token' => 'token']);

    expect($user->remember_token)->toBe('token');
});

it('can have a email verified at', function () {
    $user = User::factory()->create(['email_verified_at' => now()]);

    expect($user->email_verified_at)->toBeInstanceOf(\Illuminate\Support\Carbon::class);
});
