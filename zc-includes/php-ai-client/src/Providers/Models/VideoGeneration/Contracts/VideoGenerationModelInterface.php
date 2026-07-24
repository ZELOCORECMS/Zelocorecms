<?php

declare (strict_types=1);
namespace ZelocoreCMS\AiClient\Providers\Models\VideoGeneration\Contracts;

use ZelocoreCMS\AiClient\Messages\DTO\Message;
use ZelocoreCMS\AiClient\Results\DTO\GenerativeAiResult;
/**
 * Interface for models that support video generation.
 *
 * Provides synchronous methods for generating videos from prompts.
 *
 * @since 1.3.0
 */
interface VideoGenerationModelInterface
{
    /**
     * Generates videos from a prompt.
     *
     * @since 1.3.0
     *
     * @param list<Message> $prompt Array of messages containing the video generation prompt.
     * @return GenerativeAiResult Result containing generated videos.
     */
    public function generateVideoResult(array $prompt): GenerativeAiResult;
}
