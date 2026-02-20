<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PushNotificationFields extends BaseModel
{
    public function __construct(
        public ?string $version = null,
        public ?bool $offlineOnly = null,
        public ?APNConfigFields $apn = null,
        public ?FirebaseConfigFields $firebase = null,
        public ?HuaweiConfigFields $huawei = null,
        public ?XiaomiConfigFields $xiaomi = null,
        /** @var array<PushProvider>|null */
        #[ArrayOf(PushProvider::class)]
        public ?array $providers = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
