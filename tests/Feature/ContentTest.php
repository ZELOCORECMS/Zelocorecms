<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_content_type(): void
    {
        $user = User::factory()->create(['is_super_admin' => true]);
        $workspace = Workspace::create([
            'name' => 'Test Workspace',
            'slug' => 'test-workspace',
            'plan' => 'free',
        ]);
        WorkspaceMember::create([
            'workspace_id' => $workspace->id,
            'user_id' => $user->id,
            'joined_at' => now(),
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->postJson('/api/workspaces/test-workspace/content-types', [
            'name' => 'Blog Post',
            'slug' => 'blog-post',
            'schema' => [
                [
                    'name' => 'title',
                    'type' => 'text',
                    'required' => true,
                ],
            ],
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'id',
                    'name',
                    'slug',
                    'schema',
                ],
            ]);

        $this->assertDatabaseHas('zc_content_types', [
            'slug' => 'blog-post',
        ]);
    }

    public function test_can_create_content_item(): void
    {
        $user = User::factory()->create(['is_super_admin' => true]);
        $workspace = Workspace::create([
            'name' => 'Test Workspace 2',
            'slug' => 'test-workspace-2',
            'plan' => 'free',
        ]);
        WorkspaceMember::create([
            'workspace_id' => $workspace->id,
            'user_id' => $user->id,
            'joined_at' => now(),
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        // First create a content type
        $typeResponse = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->postJson('/api/workspaces/test-workspace-2/content-types', [
            'name' => 'Blog Post',
            'slug' => 'blog-post',
            'schema' => [
                [
                    'name' => 'title',
                    'type' => 'text',
                    'required' => true,
                ],
            ],
        ]);

        // Then create a content item
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->postJson('/api/workspaces/test-workspace-2/content/blog-post', [
            'title' => 'My First Post',
            'slug' => 'my-first-post',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'id',
                    'data',
                    'status',
                ],
            ]);

        $this->assertDatabaseHas('zc_content_items', [
            'status' => 'draft',
        ]);
    }
}
