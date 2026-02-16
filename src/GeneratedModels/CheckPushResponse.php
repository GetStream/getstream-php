<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class CheckPushResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $eventType = null, // The event type that was tested
        public ?string $renderedApnTemplate = null,
        public ?string $renderedFirebaseTemplate = null,
        public ?bool $skipDevices = null, // Don't require existing devices to render templates
        public ?array $generalErrors = null, // List of general errors
        /** @var array<DeviceErrorInfo>|null */
        #[ArrayOf(DeviceErrorInfo::class)]
        public ?array $deviceErrors = null, // Object with device errors
        public ?array $renderedMessage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
