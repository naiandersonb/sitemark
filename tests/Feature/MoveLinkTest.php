<?php

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/**
 * @return list<int>
 */
function linkIdsInDisplayOrder(User $user): array
{
    return $user->links()->orderBy('sort')->orderBy('id')->pluck('id')->all();
}

test('moving a link up swaps it with the previous link', function () {
    $user = User::factory()->create();
    [$first, $second, $third] = Link::factory()->for($user)->count(3)->sequence(
        ['sort' => 0], ['sort' => 1], ['sort' => 2],
    )->create();

    $this->actingAs($user)->put(route('up.link', $third))->assertRedirect();

    expect(linkIdsInDisplayOrder($user))->toBe([$first->id, $third->id, $second->id]);
});

test('moving a link down swaps it with the next link', function () {
    $user = User::factory()->create();
    [$first, $second, $third] = Link::factory()->for($user)->count(3)->sequence(
        ['sort' => 0], ['sort' => 1], ['sort' => 2],
    )->create();

    $this->actingAs($user)->put(route('down.link', $first))->assertRedirect();

    expect(linkIdsInDisplayOrder($user))->toBe([$second->id, $first->id, $third->id]);
});

test('links that share the same sort value can still be reordered', function () {
    $user = User::factory()->create();
    [$first, $second, $third] = Link::factory()->for($user)->count(3)->create(['sort' => 0]);

    $this->actingAs($user)->put(route('down.link', $first))->assertRedirect();

    expect(linkIdsInDisplayOrder($user))->toBe([$second->id, $first->id, $third->id]);
});

test('links with gaps between sort values can still be reordered', function () {
    $user = User::factory()->create();
    [$first, $second] = Link::factory()->for($user)->count(2)->sequence(
        ['sort' => 2], ['sort' => 4],
    )->create();

    $this->actingAs($user)->put(route('up.link', $second))->assertRedirect();

    expect(linkIdsInDisplayOrder($user))->toBe([$second->id, $first->id]);
});

test('moving the first link up or the last link down keeps the order', function () {
    $user = User::factory()->create();
    [$first, $last] = Link::factory()->for($user)->count(2)->sequence(
        ['sort' => 0], ['sort' => 1],
    )->create();

    $this->actingAs($user)->put(route('up.link', $first))->assertRedirect();
    $this->actingAs($user)->put(route('down.link', $last))->assertRedirect();

    expect(linkIdsInDisplayOrder($user))->toBe([$first->id, $last->id]);
});

test('a user cannot move a link that belongs to another user', function () {
    $owner = User::factory()->create();
    [$first, $second] = Link::factory()->for($owner)->count(2)->sequence(
        ['sort' => 0], ['sort' => 1],
    )->create();

    $this->actingAs(User::factory()->create())
        ->put(route('up.link', $second))
        ->assertNotFound();

    expect(linkIdsInDisplayOrder($owner))->toBe([$first->id, $second->id]);
});
