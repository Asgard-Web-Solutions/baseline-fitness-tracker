<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('generates the correct gravatar URL for a user', function () {
    // Create a user with a known email
    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    // Generate the expected hash
    $email = strtolower(trim($user->email));
    $hash = md5($email);

    // Define the size and default values
    $size = 80;
    $default = 'wavatar';

    // Build the expected URL
    $expectedUrl = "https://www.gravatar.com/avatar/{$hash}?s={$size}&d={$default}&r=pg";

    // Assert that the method returns the correct URL
    expect($user->gravatarUrl())->toBe($expectedUrl);
});

it('generates the correct gravatar URL with a custom size', function () {
    // Create a user with a known email
    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    // Generate the expected hash
    $email = strtolower(trim($user->email));
    $hash = md5($email);

    // Use a custom size for the test
    $customSize = 200;
    $default = 'wavatar';

    // Build the expected URL with the custom size
    $expectedUrl = "https://www.gravatar.com/avatar/{$hash}?s={$customSize}&d={$default}&r=pg";

    // Assert that the method returns the correct URL with the custom size
    expect($user->gravatarUrl($customSize))->toBe($expectedUrl);
});
