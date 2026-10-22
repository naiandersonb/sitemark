<?php

use App\Models\Link;
use App\Models\User;
use App\Stream;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('a link is created with its image and the user is redirected to the homepage', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('links.create'), [
        'title' => 'Breaking Bad',
        'stream' => Stream::Netflix->value,
        'url' => 'https://netflix.com/breaking-bad',
        'image' => UploadedFile::fake()->image('cover.jpg'),
    ]);

    $response->assertRedirectToRoute('homepage');
    $link = $user->links()->sole();
    expect($link->title)->toBe('Breaking Bad');
    Storage::disk('public')->assertExists($link->image);
});

test('a new link is placed after the existing links', function () {
    $user = User::factory()->create();
    Link::factory()->for($user)->create(['sort' => 4]);

    $this->actingAs($user)->post(route('links.create'), [
        'title' => 'Breaking Bad',
        'stream' => Stream::Netflix->value,
        'url' => 'https://netflix.com/breaking-bad',
    ]);

    expect($user->links()->latest('id')->first()->sort)->toBe(5);
});

test('the form shows why an image that failed to upload was rejected', function () {
    $user = User::factory()->create();
    $imageAbovePhpUploadLimit = new UploadedFile(
        UploadedFile::fake()->image('cover.jpg')->getPathname(),
        'cover.jpg',
        'image/jpeg',
        UPLOAD_ERR_INI_SIZE,
        true,
    );

    $response = $this->actingAs($user)
        ->from(route('links.create'))
        ->followingRedirects()
        ->post(route('links.create'), [
            'title' => 'Breaking Bad',
            'stream' => Stream::Netflix->value,
            'url' => 'https://netflix.com/breaking-bad',
            'image' => $imageAbovePhpUploadLimit,
        ]);

    $response->assertSee('The image failed to upload.');
    expect($user->links()->count())->toBe(0);
});

test('the form shows why an unknown stream was rejected', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('links.create'))
        ->followingRedirects()
        ->post(route('links.create'), [
            'title' => 'Breaking Bad',
            'stream' => 'unknown_stream',
            'url' => 'https://netflix.com/breaking-bad',
        ]);

    $response->assertSee('The selected stream is invalid.');
});
