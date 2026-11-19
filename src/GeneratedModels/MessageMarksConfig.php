<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The app's message marks policy: the mark types it defines or overrides, and the privacy switch. The channel type's mark_types says which of them are on in its channels.
 */
class MessageMarksConfig extends BaseModel
{
    public function __construct(
        /** @var array<string, MarkTypeConfig>|null */
        #[MapOf(MarkTypeConfig::class)]
        public ?array $types = null, // Mark type definitions by name. A built-in name such as played overrides its defaults; a custom name must be namespaced, for example acme.viewed. At most 20 types
        public ?MarkPrivacyConfig $privacy = null, // How marks follow the marker's privacy settings.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
