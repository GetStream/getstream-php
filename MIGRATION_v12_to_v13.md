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

## Own capabilities

`ChannelOwnCapability`, `FeedOwnCapability`, and `OwnCapability` are classes of `public const` strings. They no longer extend `BaseModel`. Channel `ownCapabilities` is a list of strings.

```php
// v13
if (in_array(ChannelOwnCapability::SEND_MESSAGE, $channel->ownCapabilities ?? [], true)) {
}
```

## Named enum constants

New types such as `PushLevel` and `ChannelModerationBehavior` are the same kind of constants class. Fields that use them are still `string`, so existing string assignments keep working.

```php
$request = new CreateChannelTypeRequest(
    name: 'team',
    automodBehavior: ChannelModerationBehavior::FLAG,
    pushLevel: PushLevel::ALL,
);
```

## AI video config

`AIVideoConfig::$provider` is removed.

## When to stay on v12

Stay on **12.1.1** until you can fix the calls above. The server does not require v13.
