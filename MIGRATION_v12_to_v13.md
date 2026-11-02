# Migrating from v12 to v13

v13 regenerates the client from the current v2 serverside spec (FLU-1105). **HTTP JSON is unchanged.** Most fields stay `string`. The compile and call-site breaks are below.

Full diff: [v12.1.1...v13.0.0](https://github.com/GetStream/getstream-php/compare/v12.1.1...v13.0.0).

## Installation

```bash
composer require getstream/getstream-php:^13.0
```

## `stopCampaign` and `commitMessage`

Both drop `$requestData`. PHP ignores an extra positional argument, so `stopCampaign($id, $request)` still runs and sends no body. A named `requestData:` argument is an error.

```php
// v13
$client->stopCampaign($id);
$client->commitMessage($id);
```

The return types changed. The campaign is nested.

```php
// v12
$campaign = $client->updateCampaign($id, $request)->getData();
$id = $campaign->id;

// v13
$campaign = $client->updateCampaign($id, $request)->getData()->campaign;
$id = $campaign->id;
```

`stopCampaign` returns `StopCampaignResponse`. Read `->campaign` the same way. `updateCampaign` returns `UpdateCampaignResponse`.

## `getActivity` argument order

`$skipOwnFollowings` is inserted before `$userID`. A positional user id is now passed as `skip_own_followings`.

```php
// v12
$client->getActivity($id, null, null, $userID);

// v13
$client->getActivity($id, null, null, null, $userID);
```

`getActivity($id)` with no further arguments is unchanged.

These gained an optional argument at the end, so existing positional calls stay valid:

- `unreadCounts($userID, $includeLargeChannels = null)`
- `getPollOption($pollID, $optionID, $userID = null)`
- `deleteCollections($collectionRefs, $hardDelete = null)`
- `getComments(..., $includeTopLevelCommentCount = null)`

## Named enums

These values are named types now. **Properties stay `string`**, so `"all"` and `"flag"` still compile and still go out on the wire. Each type is a class of `public const` strings. Use the constants when you want a typo to fail in your editor. You do not have to.

```php
// v12
$request = new CreateChannelTypeRequest(name: 'team', automodBehavior: 'flag', pushLevel: 'all');
if ($channel->pushLevel === 'none') {
}

// v13 — string still works; constants are optional
$request = new CreateChannelTypeRequest(
    name: 'team',
    automodBehavior: ChannelModerationBehavior::FLAG,
    pushLevel: PushLevel::ALL,
);
if ($channel->pushLevel === PushLevel::NONE) {
}
```

`ChannelOwnCapability`, `FeedOwnCapability`, and `OwnCapability` no longer extend `BaseModel`. They are constant classes. `ownCapabilities` was `array<ChannelOwnCapability>` and is now a plain `array` of strings.

```php
// v12 — entries were ChannelOwnCapability models
// v13
if (in_array(ChannelOwnCapability::SEND_MESSAGE, $channel->ownCapabilities ?? [], true)) {
}
if (in_array(OwnCapability::JOIN_CALL, $call->ownCapabilities ?? [], true)) {
}
```

On `CampaignResponse`, `$senderMode` and `$senderVisibility` are still `?string`, documented as `CampaignSenderMode` and `CampaignSenderVisibility` (`"exclude"` / `"include"`, `"hidden"` / `"archived"`). A missing key is `null`, not `""`.

### New constant classes

`ActivitySelectorType`, `ActivityVisibility`, `AudioDefaultDevice`, `AutomodMode`, `BlocklistBehavior`, `CallLifecycleMode`, `CameraFacing`, `CampaignSenderMode`, `CampaignSenderVisibility`, `ChannelModerationBehavior`, `ChannelOwnCapability`, `CollectionStatus`, `CommentStatus`, `DeleteMessages`, `FeatureActivationMode`, `FeedMemberStatus`, `FeedOwnCapability`, `FeedVisibility`, `FollowPushPreference`, `FollowStatus`, `FriendReactionType`, `LayoutName`, `ModerationAction`, `OwnCapability`, `PushLevel`, `PushProviderName`, `RecordingType`, `RestrictReplies`, `RetentionPolicyType`, `ScheduledMessageFailureReason`, `ScheduledMessageQueryStatus`, `ScheduledMessageStatus`, `SetupStatus`, `SetupStep`, `SortParamType`, `TranscriptionLanguage`, `VideoCodec`, `VotingVisibility`.

| Field | v12 | v13 property | Constants |
|---|---|---|---|
| `pushLevel` | `?string` | `?string` | `PushLevel::ALL`, `NONE`, `ALL_MENTIONS`, `DIRECT_MENTIONS`, `MENTIONS` |
| `automodBehavior` | `?string` | `?string` | `ChannelModerationBehavior::FLAG`, `BLOCK`, `SHADOW_BLOCK` |
| `blocklistBehavior` | `?string` | `?string` | `BlocklistBehavior::FLAG`, `BLOCK` |
| feeds `visibility` | `?string` | `?string` | `FeedVisibility::*`, `ActivityVisibility::PUBLIC`, `PRIVATE`, `TAG` |
| `votingVisibility` | `?string` | `?string` | `VotingVisibility::PUBLIC`, `ANONYMOUS` |
| push provider | `?string` | `?string` | `PushProviderName::FIREBASE`, `APN`, `HUAWEI`, `XIAOMI` |
| `ownCapabilities` | `array<ChannelOwnCapability>` | `array` of strings | `ChannelOwnCapability::SEND_MESSAGE`, `OwnCapability::JOIN_CALL`, … |

## AI video config

`AIVideoConfig::$provider` is removed.

## When to stay on v12

Stay on **12.1.1** until you can fix the calls above. The server does not require v13.
