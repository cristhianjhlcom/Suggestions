<?php

declare(strict_types=1);

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Enums\SuggestionStatus;
use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class SuggestionTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_suggestion(): void
    {
        $user = User::factory()->create();

        $suggestion = Suggestion::create([
            'owner_id' => 1,
            'user_id' => $user->id,
            'title' => 'Test Suggestion',
            'slug' => 'test-suggestion',
            'description' => 'This is a test suggestion',
            'status' => SuggestionStatus::Planning->value,
        ]);

        $this->assertDatabaseHas('suggestions', [
            'title' => 'Test Suggestion',
            'slug' => 'test-suggestion',
            'description' => 'This is a test suggestion',
            'user_id' => $user->id,
            'owner_id' => 1,
            'status' => SuggestionStatus::Planning->value,
        ]);

        $this->assertEquals($user->id, $suggestion->user_id);
        $this->assertEquals('Test Suggestion', $suggestion->title);
    }

    #[Test]
    public function it_creates_suggestion_with_default_pending_status()
    {
        $user = User::factory()->create();

        $suggestion = Suggestion::create([
            'user_id' => $user->id,
            'title' => 'Test Suggestion',
            'slug' => 'test-suggestion',
            'description' => 'This is a test suggestion',
            'owner_id' => 1,
        ])->fresh();

        $this->assertEquals(SuggestionStatus::Pending, $suggestion->status);
    }
}
