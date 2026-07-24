<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_upload_media_to_workspace()
    {
        Storage::fake('local');

        $user = User::factory()->create();
        $workspace = Workspace::create([
            'id' => '019f8aad-f96d-702b-87f2-a8a9744c90b7',
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
        $file = UploadedFile::fake()->create('test.jpg', 100, 'image/jpeg');

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->postJson('/api/workspaces/test-workspace/media/upload', [
            'file' => $file,
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'id',
                    'filename',
                    'original_name',
                    'mime_type',
                    'size',
                    'storage_path',
                ],
            ]);
    }
}
