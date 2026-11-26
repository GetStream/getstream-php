<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BudgetsResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $all = null, // Map of endpoint budgets shared by all platforms. Set when budgets are not tracked per platform
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $serverSide = null, // Map of endpoint budgets for the server-side platform
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $android = null, // Map of endpoint budgets for the Android platform
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $ios = null, // Map of endpoint budgets for the iOS platform
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $web = null, // Map of endpoint budgets for the web platform
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $unity = null, // Map of endpoint budgets for the Unity platform
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $unityDesktop = null, // Map of endpoint budgets for the Unity desktop platform
        /** @var array<string, BudgetStatusResponse>|null */
        #[MapOf(BudgetStatusResponse::class)]
        public ?array $unityConsole = null, // Map of endpoint budgets for the Unity console platform
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
