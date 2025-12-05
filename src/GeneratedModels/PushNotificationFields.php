<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $offlineOnly
 * @property string $version
 * @property APNConfigFields $apn
 * @property FirebaseConfigFields $firebase
 * @property HuaweiConfigFields $huawei
 * @property XiaomiConfigFields $xiaomi
 * @property array<PushProvider>|null $providers
 */
class PushNotificationFields extends BaseModel
{
    public function __construct(
        public ?bool $offlineOnly = null,
        public ?string $version = null,
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
