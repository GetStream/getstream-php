<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for PIN routing rule calls
 *
 * @property string|null $customWebhookUrl
 * @property string|null $pinFailedAttemptPrompt
 * @property string|null $pinHangupPrompt
 * @property string|null $pinPrompt
 * @property string|null $pinSuccessPrompt
 */
class SIPInboundRoutingRulePinConfigsRequest extends BaseModel
{
    public function __construct(
        public ?string $customWebhookUrl = null, // Optional webhook URL for custom PIN handling
        public ?string $pinFailedAttemptPrompt = null, // Prompt message for failed PIN attempts
        public ?string $pinHangupPrompt = null, // Prompt message for hangup after PIN input
        public ?string $pinPrompt = null, // Prompt message for PIN input
        public ?string $pinSuccessPrompt = null, // Prompt message for successful PIN input
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
