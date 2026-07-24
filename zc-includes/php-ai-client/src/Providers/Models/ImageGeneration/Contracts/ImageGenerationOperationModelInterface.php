<?php

declare (strict_types=1);
namespace ZelocoreCMS\AiClient\Providers\Models\ImageGeneration\Contracts;

use ZelocoreCMS\AiClient\Messages\DTO\Message;
use ZelocoreCMS\AiClient\Operations\DTO\GenerativeAiOperation;
/**
 * Interface for models that support asynchronous image generation operations.
 *
 * Provides methods for initiating long-running image generation tasks.
 *
 * @since 0.1.0
 */
interface ImageGenerationOperationModelInterface
{
    /**
     * Creates an image generation operation.
     *
     * @since 0.1.0
     *
     * @param list<Message> $prompt Array of messages containing the image generation prompt.
     * @return GenerativeAiOperation The initiated image generation operation.
     */
    public function generateImageOperation(array $prompt): GenerativeAiOperation;
}
