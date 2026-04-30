<?php

namespace GetStream\Generated;

use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;
use GetStream\GeneratedModels;

/**
 * Generated API methods for Stream Client
 * 
 * This trait contains auto-generated methods from the OpenAPI specification.
 * Include this trait in your Client class to add these methods.
 */
trait ChatTrait
{
    /**
     * Creates a campaign
     *
     * @param GeneratedModels\CreateCampaignRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateCampaignResponse>
     * @throws StreamException
     */
    public function createCampaign(GeneratedModels\CreateCampaignRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/campaigns';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateCampaignResponse::class);
    }
    /**
     * Query campaigns with filter query
     *
     * @param GeneratedModels\QueryCampaignsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCampaignsResponse>
     * @throws StreamException
     */
    public function queryCampaigns(GeneratedModels\QueryCampaignsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/campaigns/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCampaignsResponse::class);
    }
    /**
     * Delete campaign
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\DeleteCampaignResponse>
     * @throws StreamException
     */
    public function deleteCampaign(string $id): StreamResponse {
        $path = '/api/v2/chat/campaigns/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteCampaignResponse::class);
    }
    /**
     * Get campaign by ID.
     *
     * @param string $id
     * @param string $prev
     * @param string $next
     * @param int $limit
     * @return StreamResponse<GeneratedModels\GetCampaignResponse>
     * @throws StreamException
     */
    public function getCampaign(string $id, string $prev, string $next, int $limit): StreamResponse {
        $path = '/api/v2/chat/campaigns/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($prev !== null) {
            $queryParams['prev'] = $prev;
        }
        if ($next !== null) {
            $queryParams['next'] = $next;
        }
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCampaignResponse::class);
    }
    /**
     * Updates a campaign
     *
     * @param string $id
     * @param GeneratedModels\UpdateCampaignRequest $requestData
     * @return StreamResponse<GeneratedModels\CampaignResponse>
     * @throws StreamException
     */
    public function updateCampaign(string $id, GeneratedModels\UpdateCampaignRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/campaigns/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\CampaignResponse::class);
    }
    /**
     * Starts or schedules a campaign
     *
     * @param string $id
     * @param GeneratedModels\StartCampaignRequest $requestData
     * @return StreamResponse<GeneratedModels\StartCampaignResponse>
     * @throws StreamException
     */
    public function startCampaign(string $id, GeneratedModels\StartCampaignRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/campaigns/{id}/start';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StartCampaignResponse::class);
    }
    /**
     * Stops a campaign
     *
     * @param string $id
     * @param GeneratedModels\StopCampaignRequest $requestData
     * @return StreamResponse<GeneratedModels\CampaignResponse>
     * @throws StreamException
     */
    public function stopCampaign(string $id, GeneratedModels\StopCampaignRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/campaigns/{id}/stop';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CampaignResponse::class);
    }
    /**
     * Query channels with filter query
     *
     * @param GeneratedModels\QueryChannelsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryChannelsResponse>
     * @throws StreamException
     */
    public function queryChannels(GeneratedModels\QueryChannelsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryChannelsResponse::class);
    }
    /**
     * Update channels in batch
     * Sends events:
     * - channel.frozen
     * - channel.hidden
     * - channel.unfrozen
     * - channel.updated
     * - channel.visible
     * - member.added
     * - member.removed
     * - member.updated
     *
     * @param GeneratedModels\ChannelBatchUpdateRequest $requestData
     * @return StreamResponse<GeneratedModels\ChannelBatchUpdateResponse>
     * @throws StreamException
     */
    public function channelBatchUpdate(GeneratedModels\ChannelBatchUpdateRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/batch';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\ChannelBatchUpdateResponse::class);
    }
    /**
     * Allows to delete several channels at once asynchronously
     * Sends events:
     * - channel.deleted
     *
     * @param GeneratedModels\DeleteChannelsRequest $requestData
     * @return StreamResponse<GeneratedModels\DeleteChannelsResponse>
     * @throws StreamException
     */
    public function deleteChannels(GeneratedModels\DeleteChannelsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/delete';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\DeleteChannelsResponse::class);
    }
    /**
     * Mark the status of a channel message delivered.
     *
     * @param string $userID
     * @param GeneratedModels\MarkDeliveredRequest $requestData
     * @return StreamResponse<GeneratedModels\MarkDeliveredResponse>
     * @throws StreamException
     */
    public function markDelivered(string $userID, GeneratedModels\MarkDeliveredRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/delivered';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MarkDeliveredResponse::class);
    }
    /**
     * Query channels grouped into predefined buckets. Only available for enterprise apps.
     *
     * @param GeneratedModels\GroupedQueryChannelsRequest $requestData
     * @return StreamResponse<GeneratedModels\GroupedQueryChannelsResponse>
     * @throws StreamException
     */
    public function groupedQueryChannels(GeneratedModels\GroupedQueryChannelsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/grouped';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GroupedQueryChannelsResponse::class);
    }
    /**
     * Marks channels as read up to the specific message. If no channels is given, mark all channel as read
     * Sends events:
     * - message.read
     *
     * @param GeneratedModels\MarkChannelsReadRequest $requestData
     * @return StreamResponse<GeneratedModels\MarkReadResponse>
     * @throws StreamException
     */
    public function markChannelsRead(GeneratedModels\MarkChannelsReadRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/read';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MarkReadResponse::class);
    }
    /**
     * This Method creates a channel or returns an existing one with matching attributes
     * Sends events:
     * - channel.created
     * - member.added
     * - member.removed
     * - member.updated
     * - user.watching.start
     *
     * @param string $type
     * @param GeneratedModels\ChannelGetOrCreateRequest $requestData
     * @return StreamResponse<GeneratedModels\ChannelStateResponse>
     * @throws StreamException
     */
    public function getOrCreateDistinctChannel(string $type, GeneratedModels\ChannelGetOrCreateRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/query';
        $path = str_replace('{type}', (string) $type, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ChannelStateResponse::class);
    }
    /**
     * Deletes channel
     * Sends events:
     * - channel.deleted
     *
     * @param string $type
     * @param string $id
     * @param bool $hardDelete
     * @return StreamResponse<GeneratedModels\DeleteChannelResponse>
     * @throws StreamException
     */
    public function deleteChannel(string $type, string $id, bool $hardDelete): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($hardDelete !== null) {
            $queryParams['hard_delete'] = $hardDelete;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteChannelResponse::class);
    }
    /**
     * Updates certain fields of the channel
     * Sends events:
     * - channel.updated
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UpdateChannelPartialRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateChannelPartialResponse>
     * @throws StreamException
     */
    public function updateChannelPartial(string $type, string $id, GeneratedModels\UpdateChannelPartialRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateChannelPartialResponse::class);
    }
    /**
     * Change channel data
     * Sends events:
     * - channel.updated
     * - member.added
     * - member.removed
     * - member.updated
     * - message.new
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UpdateChannelRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateChannelResponse>
     * @throws StreamException
     */
    public function updateChannel(string $type, string $id, GeneratedModels\UpdateChannelRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpdateChannelResponse::class);
    }
    /**
     * Deletes a draft
     * Sends events:
     * - draft.deleted
     *
     * @param string $type
     * @param string $id
     * @param string $parentID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteDraft(string $type, string $id, string $parentID, string $userID): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/draft';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($parentID !== null) {
            $queryParams['parent_id'] = $parentID;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Get a draft
     *
     * @param string $type
     * @param string $id
     * @param string $parentID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\GetDraftResponse>
     * @throws StreamException
     */
    public function getDraft(string $type, string $id, string $parentID, string $userID): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/draft';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($parentID !== null) {
            $queryParams['parent_id'] = $parentID;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetDraftResponse::class);
    }
    /**
     * Sends event to the channel
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\SendEventRequest $requestData
     * @return StreamResponse<GeneratedModels\EventResponse>
     * @throws StreamException
     */
    public function sendEvent(string $type, string $id, GeneratedModels\SendEventRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/event';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\EventResponse::class);
    }
    /**
     * Deletes previously uploaded file
     *
     * @param string $type
     * @param string $id
     * @param string $url
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteChannelFile(string $type, string $id, string $url): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/file';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($url !== null) {
            $queryParams['url'] = $url;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Uploads file
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UploadChannelFileRequest $requestData
     * @return StreamResponse<GeneratedModels\UploadChannelFileResponse>
     * @throws StreamException
     */
    public function uploadChannelFile(string $type, string $id, GeneratedModels\UploadChannelFileRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/file';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UploadChannelFileResponse::class);
    }
    /**
     * Marks channel as hidden for current user
     * Sends events:
     * - channel.hidden
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\HideChannelRequest $requestData
     * @return StreamResponse<GeneratedModels\HideChannelResponse>
     * @throws StreamException
     */
    public function hideChannel(string $type, string $id, GeneratedModels\HideChannelRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/hide';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\HideChannelResponse::class);
    }
    /**
     * Deletes previously uploaded image
     *
     * @param string $type
     * @param string $id
     * @param string $url
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteChannelImage(string $type, string $id, string $url): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/image';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($url !== null) {
            $queryParams['url'] = $url;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Uploads image
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UploadChannelRequest $requestData
     * @return StreamResponse<GeneratedModels\UploadChannelResponse>
     * @throws StreamException
     */
    public function uploadChannelImage(string $type, string $id, GeneratedModels\UploadChannelRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/image';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UploadChannelResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param string $userID
     * @param GeneratedModels\UpdateMemberPartialRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateMemberPartialResponse>
     * @throws StreamException
     */
    public function updateMemberPartial(string $type, string $id, string $userID, GeneratedModels\UpdateMemberPartialRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/member';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateMemberPartialResponse::class);
    }
    /**
     * Sends new message to the specified channel
     * Sends events:
     * - message.new
     * - message.updated
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\SendMessageRequest $requestData
     * @return StreamResponse<GeneratedModels\SendMessageResponse>
     * @throws StreamException
     */
    public function sendMessage(string $type, string $id, GeneratedModels\SendMessageRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/message';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SendMessageResponse::class);
    }
    /**
     * Returns list messages found by IDs
     *
     * @param string $type
     * @param string $id
     * @param array $ids
     * @return StreamResponse<GeneratedModels\GetManyMessagesResponse>
     * @throws StreamException
     */
    public function getManyMessages(string $type, string $id, array $ids): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/messages';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($ids !== null) {
            $queryParams['ids'] = $ids;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetManyMessagesResponse::class);
    }
    /**
     * This Method creates a channel or returns an existing one with matching attributes
     * Sends events:
     * - channel.created
     * - member.added
     * - member.removed
     * - member.updated
     * - user.watching.start
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\ChannelGetOrCreateRequest $requestData
     * @return StreamResponse<GeneratedModels\ChannelStateResponse>
     * @throws StreamException
     */
    public function getOrCreateChannel(string $type, string $id, GeneratedModels\ChannelGetOrCreateRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/query';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ChannelStateResponse::class);
    }
    /**
     * Marks channel as read up to the specific message
     * Sends events:
     * - message.read
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\MarkReadRequest $requestData
     * @return StreamResponse<GeneratedModels\MarkReadResponse>
     * @throws StreamException
     */
    public function markRead(string $type, string $id, GeneratedModels\MarkReadRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/read';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MarkReadResponse::class);
    }
    /**
     * Shows previously hidden channel
     * Sends events:
     * - channel.visible
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\ShowChannelRequest $requestData
     * @return StreamResponse<GeneratedModels\ShowChannelResponse>
     * @throws StreamException
     */
    public function showChannel(string $type, string $id, GeneratedModels\ShowChannelRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/show';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ShowChannelResponse::class);
    }
    /**
     * Truncates messages from a channel. Can be applied to the entire channel or scoped to specific members.
     * Sends events:
     * - channel.truncated
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\TruncateChannelRequest $requestData
     * @return StreamResponse<GeneratedModels\TruncateChannelResponse>
     * @throws StreamException
     */
    public function truncateChannel(string $type, string $id, GeneratedModels\TruncateChannelRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/truncate';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\TruncateChannelResponse::class);
    }
    /**
     * Marks channel as unread from a specific message
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\MarkUnreadRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function markUnread(string $type, string $id, GeneratedModels\MarkUnreadRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channels/{type}/{id}/unread';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Lists all available channel types
     *
     * @return StreamResponse<GeneratedModels\ListChannelTypesResponse>
     * @throws StreamException
     */
    public function listChannelTypes(): StreamResponse {
        $path = '/api/v2/chat/channeltypes';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListChannelTypesResponse::class);
    }
    /**
     * Creates new channel type
     *
     * @param GeneratedModels\CreateChannelTypeRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateChannelTypeResponse>
     * @throws StreamException
     */
    public function createChannelType(GeneratedModels\CreateChannelTypeRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channeltypes';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateChannelTypeResponse::class);
    }
    /**
     * Deletes channel type
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteChannelType(string $name): StreamResponse {
        $path = '/api/v2/chat/channeltypes/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Gets channel type
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\GetChannelTypeResponse>
     * @throws StreamException
     */
    public function getChannelType(string $name): StreamResponse {
        $path = '/api/v2/chat/channeltypes/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetChannelTypeResponse::class);
    }
    /**
     * Updates channel type
     *
     * @param string $name
     * @param GeneratedModels\UpdateChannelTypeRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateChannelTypeResponse>
     * @throws StreamException
     */
    public function updateChannelType(string $name, GeneratedModels\UpdateChannelTypeRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/channeltypes/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateChannelTypeResponse::class);
    }
    /**
     * Returns all custom commands
     *
     * @return StreamResponse<GeneratedModels\ListCommandsResponse>
     * @throws StreamException
     */
    public function listCommands(): StreamResponse {
        $path = '/api/v2/chat/commands';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListCommandsResponse::class);
    }
    /**
     * Creates custom chat command
     *
     * @param GeneratedModels\CreateCommandRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateCommandResponse>
     * @throws StreamException
     */
    public function createCommand(GeneratedModels\CreateCommandRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/commands';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateCommandResponse::class);
    }
    /**
     * Deletes custom chat command
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\DeleteCommandResponse>
     * @throws StreamException
     */
    public function deleteCommand(string $name): StreamResponse {
        $path = '/api/v2/chat/commands/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteCommandResponse::class);
    }
    /**
     * Returns custom command by its name
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\GetCommandResponse>
     * @throws StreamException
     */
    public function getCommand(string $name): StreamResponse {
        $path = '/api/v2/chat/commands/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCommandResponse::class);
    }
    /**
     * Updates custom chat command
     *
     * @param string $name
     * @param GeneratedModels\UpdateCommandRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateCommandResponse>
     * @throws StreamException
     */
    public function updateCommand(string $name, GeneratedModels\UpdateCommandRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/commands/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateCommandResponse::class);
    }
    /**
     * Queries draft messages for a user
     *
     * @param GeneratedModels\QueryDraftsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryDraftsResponse>
     * @throws StreamException
     */
    public function queryDrafts(GeneratedModels\QueryDraftsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/drafts/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryDraftsResponse::class);
    }
    /**
     * Exports channel data to JSON file
     *
     * @param GeneratedModels\ExportChannelsRequest $requestData
     * @return StreamResponse<GeneratedModels\ExportChannelsResponse>
     * @throws StreamException
     */
    public function exportChannels(GeneratedModels\ExportChannelsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/export_channels';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ExportChannelsResponse::class);
    }
    /**
     * Find and filter channel members
     *
     * @param GeneratedModels\QueryMembersPayload $payload
     * @return StreamResponse<GeneratedModels\MembersResponse>
     * @throws StreamException
     */
    public function queryMembers(GeneratedModels\QueryMembersPayload $payload): StreamResponse {
        $path = '/api/v2/chat/members';

        $queryParams = [];
        if ($payload !== null) {
            try {
                $queryParams['payload'] = json_encode($payload, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                throw new StreamException('Failed to encode query parameter "payload" to JSON: ' . $e->getMessage());
            }
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\MembersResponse::class);
    }
    /**
     * Queries history for one message
     *
     * @param GeneratedModels\QueryMessageHistoryRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryMessageHistoryResponse>
     * @throws StreamException
     */
    public function queryMessageHistory(GeneratedModels\QueryMessageHistoryRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/history';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryMessageHistoryResponse::class);
    }
    /**
     * Deletes message
     * Sends events:
     * - message.deleted
     *
     * @param string $id
     * @param bool $hard
     * @param string $deletedBy
     * @param bool $deleteForMe
     * @return StreamResponse<GeneratedModels\DeleteMessageResponse>
     * @throws StreamException
     */
    public function deleteMessage(string $id, bool $hard, string $deletedBy, bool $deleteForMe): StreamResponse {
        $path = '/api/v2/chat/messages/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($hard !== null) {
            $queryParams['hard'] = $hard;
        }
        if ($deletedBy !== null) {
            $queryParams['deleted_by'] = $deletedBy;
        }
        if ($deleteForMe !== null) {
            $queryParams['delete_for_me'] = $deleteForMe;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteMessageResponse::class);
    }
    /**
     * Returns message by ID
     *
     * @param string $id
     * @param bool $showDeletedMessage
     * @return StreamResponse<GeneratedModels\GetMessageResponse>
     * @throws StreamException
     */
    public function getMessage(string $id, bool $showDeletedMessage): StreamResponse {
        $path = '/api/v2/chat/messages/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($showDeletedMessage !== null) {
            $queryParams['show_deleted_message'] = $showDeletedMessage;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetMessageResponse::class);
    }
    /**
     * Updates message with new data
     * Sends events:
     * - message.updated
     *
     * @param string $id
     * @param GeneratedModels\UpdateMessageRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateMessageResponse>
     * @throws StreamException
     */
    public function updateMessage(string $id, GeneratedModels\UpdateMessageRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpdateMessageResponse::class);
    }
    /**
     * Updates certain fields of the message
     * Sends events:
     * - message.updated
     *
     * @param string $id
     * @param GeneratedModels\UpdateMessagePartialRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateMessagePartialResponse>
     * @throws StreamException
     */
    public function updateMessagePartial(string $id, GeneratedModels\UpdateMessagePartialRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateMessagePartialResponse::class);
    }
    /**
     * Executes message command action with given parameters
     * Sends events:
     * - message.new
     *
     * @param string $id
     * @param GeneratedModels\MessageActionRequest $requestData
     * @return StreamResponse<GeneratedModels\MessageActionResponse>
     * @throws StreamException
     */
    public function runMessageAction(string $id, GeneratedModels\MessageActionRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/action';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MessageActionResponse::class);
    }
    /**
     * Commits a pending message, which will make it visible in the channel
     * Sends events:
     * - message.new
     * - message.updated
     *
     * @param string $id
     * @param GeneratedModels\CommitMessageRequest $requestData
     * @return StreamResponse<GeneratedModels\MessageActionResponse>
     * @throws StreamException
     */
    public function commitMessage(string $id, GeneratedModels\CommitMessageRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/commit';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MessageActionResponse::class);
    }
    /**
     * Updates message fields without storing in database, only sends update event
     * Sends events:
     * - message.updated
     *
     * @param string $id
     * @param GeneratedModels\UpdateMessagePartialRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateMessagePartialResponse>
     * @throws StreamException
     */
    public function ephemeralMessageUpdate(string $id, GeneratedModels\UpdateMessagePartialRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/ephemeral';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateMessagePartialResponse::class);
    }
    /**
     * Sends reaction to specified message
     * Sends events:
     * - reaction.new
     * - reaction.updated
     *
     * @param string $id
     * @param GeneratedModels\SendReactionRequest $requestData
     * @return StreamResponse<GeneratedModels\SendReactionResponse>
     * @throws StreamException
     */
    public function sendReaction(string $id, GeneratedModels\SendReactionRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/reaction';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SendReactionResponse::class);
    }
    /**
     * Removes user reaction from the message
     * Sends events:
     * - reaction.deleted
     *
     * @param string $id
     * @param string $type
     * @param string $userID
     * @return StreamResponse<GeneratedModels\DeleteReactionResponse>
     * @throws StreamException
     */
    public function deleteReaction(string $id, string $type, string $userID): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/reaction/{type}';
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{type}', (string) $type, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteReactionResponse::class);
    }
    /**
     * Returns list of reactions of specific message
     *
     * @param string $id
     * @param int $limit
     * @param int $offset
     * @return StreamResponse<GeneratedModels\GetReactionsResponse>
     * @throws StreamException
     */
    public function getReactions(string $id, int $limit, int $offset): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/reactions';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($offset !== null) {
            $queryParams['offset'] = $offset;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetReactionsResponse::class);
    }
    /**
     * Get reactions on a message
     *
     * @param string $id
     * @param GeneratedModels\QueryReactionsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryReactionsResponse>
     * @throws StreamException
     */
    public function queryReactions(string $id, GeneratedModels\QueryReactionsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/reactions';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryReactionsResponse::class);
    }
    /**
     * Translates message to a given language using automated translation software
     * Sends events:
     * - message.updated
     *
     * @param string $id
     * @param GeneratedModels\TranslateMessageRequest $requestData
     * @return StreamResponse<GeneratedModels\MessageActionResponse>
     * @throws StreamException
     */
    public function translateMessage(string $id, GeneratedModels\TranslateMessageRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/translate';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MessageActionResponse::class);
    }
    /**
     * Undelete a message that was previously soft-deleted
     * Sends events:
     * - message.undeleted
     *
     * @param string $id
     * @param GeneratedModels\UndeleteMessageRequest $requestData
     * @return StreamResponse<GeneratedModels\UndeleteMessageResponse>
     * @throws StreamException
     */
    public function undeleteMessage(string $id, GeneratedModels\UndeleteMessageRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{id}/undelete';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UndeleteMessageResponse::class);
    }
    /**
     * Cast a vote on a poll
     * Sends events:
     * - feeds.poll.vote_casted
     * - feeds.poll.vote_changed
     * - feeds.poll.vote_removed
     * - poll.vote_casted
     * - poll.vote_changed
     * - poll.vote_removed
     *
     * @param string $messageID
     * @param string $pollID
     * @param GeneratedModels\CastPollVoteRequest $requestData
     * @return StreamResponse<GeneratedModels\PollVoteResponse>
     * @throws StreamException
     */
    public function castPollVote(string $messageID, string $pollID, GeneratedModels\CastPollVoteRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{message_id}/polls/{poll_id}/vote';
        $path = str_replace('{message_id}', (string) $messageID, $path);
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PollVoteResponse::class);
    }
    /**
     * Delete a vote from a poll
     * Sends events:
     * - feeds.poll.vote_removed
     * - poll.vote_removed
     *
     * @param string $messageID
     * @param string $pollID
     * @param string $voteID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\PollVoteResponse>
     * @throws StreamException
     */
    public function deletePollVote(string $messageID, string $pollID, string $voteID, string $userID): StreamResponse {
        $path = '/api/v2/chat/messages/{message_id}/polls/{poll_id}/vote/{vote_id}';
        $path = str_replace('{message_id}', (string) $messageID, $path);
        $path = str_replace('{poll_id}', (string) $pollID, $path);
        $path = str_replace('{vote_id}', (string) $voteID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\PollVoteResponse::class);
    }
    /**
     * Deletes a user's created reminder
     * Sends events:
     * - reminder.deleted
     *
     * @param string $messageID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\DeleteReminderResponse>
     * @throws StreamException
     */
    public function deleteReminder(string $messageID, string $userID): StreamResponse {
        $path = '/api/v2/chat/messages/{message_id}/reminders';
        $path = str_replace('{message_id}', (string) $messageID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteReminderResponse::class);
    }
    /**
     * Updates an existing reminder
     * Sends events:
     * - reminder.updated
     *
     * @param string $messageID
     * @param GeneratedModels\UpdateReminderRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateReminderResponse>
     * @throws StreamException
     */
    public function updateReminder(string $messageID, GeneratedModels\UpdateReminderRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{message_id}/reminders';
        $path = str_replace('{message_id}', (string) $messageID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateReminderResponse::class);
    }
    /**
     * Creates a new reminder
     * Sends events:
     * - reminder.created
     *
     * @param string $messageID
     * @param GeneratedModels\CreateReminderRequest $requestData
     * @return StreamResponse<GeneratedModels\ReminderResponseData>
     * @throws StreamException
     */
    public function createReminder(string $messageID, GeneratedModels\CreateReminderRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/messages/{message_id}/reminders';
        $path = str_replace('{message_id}', (string) $messageID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ReminderResponseData::class);
    }
    /**
     * Returns replies (thread) of the message
     *
     * @param string $parentID
     * @param int $limit
     * @param string $idGte
     * @param string $idGt
     * @param string $idLte
     * @param string $idLt
     * @param string $idAround
     * @param array $sort
     * @return StreamResponse<GeneratedModels\GetRepliesResponse>
     * @throws StreamException
     */
    public function getReplies(string $parentID, int $limit, string $idGte, string $idGt, string $idLte, string $idLt, string $idAround, array $sort): StreamResponse {
        $path = '/api/v2/chat/messages/{parent_id}/replies';
        $path = str_replace('{parent_id}', (string) $parentID, $path);

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($idGte !== null) {
            $queryParams['id_gte'] = $idGte;
        }
        if ($idGt !== null) {
            $queryParams['id_gt'] = $idGt;
        }
        if ($idLte !== null) {
            $queryParams['id_lte'] = $idLte;
        }
        if ($idLt !== null) {
            $queryParams['id_lt'] = $idLt;
        }
        if ($idAround !== null) {
            $queryParams['id_around'] = $idAround;
        }
        if ($sort !== null) {
            $queryParams['sort'] = $sort;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetRepliesResponse::class);
    }
    /**
     * Find and filter message flags
     *
     * @param GeneratedModels\QueryMessageFlagsPayload $payload
     * @return StreamResponse<GeneratedModels\QueryMessageFlagsResponse>
     * @throws StreamException
     */
    public function queryMessageFlags(GeneratedModels\QueryMessageFlagsPayload $payload): StreamResponse {
        $path = '/api/v2/chat/moderation/flags/message';

        $queryParams = [];
        if ($payload !== null) {
            try {
                $queryParams['payload'] = json_encode($payload, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                throw new StreamException('Failed to encode query parameter "payload" to JSON: ' . $e->getMessage());
            }
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryMessageFlagsResponse::class);
    }
    /**
     * Mutes channel for user
     * Sends events:
     * - channel.muted
     *
     * @param GeneratedModels\MuteChannelRequest $requestData
     * @return StreamResponse<GeneratedModels\MuteChannelResponse>
     * @throws StreamException
     */
    public function muteChannel(GeneratedModels\MuteChannelRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/moderation/mute/channel';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MuteChannelResponse::class);
    }
    /**
     * Unmutes channel for user
     * Sends events:
     * - channel.unmuted
     *
     * @param GeneratedModels\UnmuteChannelRequest $requestData
     * @return StreamResponse<GeneratedModels\UnmuteResponse>
     * @throws StreamException
     */
    public function unmuteChannel(GeneratedModels\UnmuteChannelRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/moderation/unmute/channel';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnmuteResponse::class);
    }
    /**
     * Find and filter channel scoped or global user bans
     *
     * @param GeneratedModels\QueryBannedUsersPayload $payload
     * @return StreamResponse<GeneratedModels\QueryBannedUsersResponse>
     * @throws StreamException
     */
    public function queryBannedUsers(GeneratedModels\QueryBannedUsersPayload $payload): StreamResponse {
        $path = '/api/v2/chat/query_banned_users';

        $queryParams = [];
        if ($payload !== null) {
            try {
                $queryParams['payload'] = json_encode($payload, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                throw new StreamException('Failed to encode query parameter "payload" to JSON: ' . $e->getMessage());
            }
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryBannedUsersResponse::class);
    }
    /**
     * Find and filter future channel bans created by the authenticated user
     *
     * @param GeneratedModels\QueryFutureChannelBansPayload $payload
     * @return StreamResponse<GeneratedModels\QueryFutureChannelBansResponse>
     * @throws StreamException
     */
    public function queryFutureChannelBans(GeneratedModels\QueryFutureChannelBansPayload $payload): StreamResponse {
        $path = '/api/v2/chat/query_future_channel_bans';

        $queryParams = [];
        if ($payload !== null) {
            try {
                $queryParams['payload'] = json_encode($payload, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                throw new StreamException('Failed to encode query parameter "payload" to JSON: ' . $e->getMessage());
            }
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryFutureChannelBansResponse::class);
    }
    /**
     * Queries reminders
     *
     * @param GeneratedModels\QueryRemindersRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryRemindersResponse>
     * @throws StreamException
     */
    public function queryReminders(GeneratedModels\QueryRemindersRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/reminders/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryRemindersResponse::class);
    }
    /**
     * Returns all retention policies configured for the app. Server-side only.
     *
     * @return StreamResponse<GeneratedModels\GetRetentionPolicyResponse>
     * @throws StreamException
     */
    public function getRetentionPolicy(): StreamResponse {
        $path = '/api/v2/chat/retention_policy';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetRetentionPolicyResponse::class);
    }
    /**
     * Creates or updates a retention policy for the app. Server-side only.
     *
     * @param GeneratedModels\SetRetentionPolicyRequest $requestData
     * @return StreamResponse<GeneratedModels\SetRetentionPolicyResponse>
     * @throws StreamException
     */
    public function setRetentionPolicy(GeneratedModels\SetRetentionPolicyRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/retention_policy';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SetRetentionPolicyResponse::class);
    }
    /**
     * Removes a retention policy for the app. Server-side only.
     *
     * @param GeneratedModels\DeleteRetentionPolicyRequest $requestData
     * @return StreamResponse<GeneratedModels\DeleteRetentionPolicyResponse>
     * @throws StreamException
     */
    public function deleteRetentionPolicy(GeneratedModels\DeleteRetentionPolicyRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/retention_policy/delete';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\DeleteRetentionPolicyResponse::class);
    }
    /**
     * Returns filtered and sorted retention cleanup run history for the app. Supports filter_conditions on 'policy' (possible values: 'old-messages', 'inactive-channels') and 'date' fields. Server-side only.
     *
     * @param GeneratedModels\GetRetentionPolicyRunsRequest $requestData
     * @return StreamResponse<GeneratedModels\GetRetentionPolicyRunsResponse>
     * @throws StreamException
     */
    public function getRetentionPolicyRuns(GeneratedModels\GetRetentionPolicyRunsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/retention_policy/runs';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GetRetentionPolicyRunsResponse::class);
    }
    /**
     * Search messages across channels
     *
     * @param GeneratedModels\SearchPayload $payload
     * @return StreamResponse<GeneratedModels\SearchResponse>
     * @throws StreamException
     */
    public function search(GeneratedModels\SearchPayload $payload): StreamResponse {
        $path = '/api/v2/chat/search';

        $queryParams = [];
        if ($payload !== null) {
            try {
                $queryParams['payload'] = json_encode($payload, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                throw new StreamException('Failed to encode query parameter "payload" to JSON: ' . $e->getMessage());
            }
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\SearchResponse::class);
    }
    /**
     * Query segments
     *
     * @param GeneratedModels\QuerySegmentsRequest $requestData
     * @return StreamResponse<GeneratedModels\QuerySegmentsResponse>
     * @throws StreamException
     */
    public function querySegments(GeneratedModels\QuerySegmentsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/segments/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QuerySegmentsResponse::class);
    }
    /**
     * Delete a segment
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteSegment(string $id): StreamResponse {
        $path = '/api/v2/chat/segments/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Get segment
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetSegmentResponse>
     * @throws StreamException
     */
    public function getSegment(string $id): StreamResponse {
        $path = '/api/v2/chat/segments/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetSegmentResponse::class);
    }
    /**
     * Delete targets from a segment
     *
     * @param string $id
     * @param GeneratedModels\DeleteSegmentTargetsRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteSegmentTargets(string $id, GeneratedModels\DeleteSegmentTargetsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/segments/{id}/deletetargets';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Check whether a target exists in a segment. Returns 200 if the target exists, 404 otherwise
     *
     * @param string $id
     * @param string $targetID
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function segmentTargetExists(string $id, string $targetID): StreamResponse {
        $path = '/api/v2/chat/segments/{id}/target/{target_id}';
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{target_id}', (string) $targetID, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Query segment targets
     *
     * @param string $id
     * @param GeneratedModels\QuerySegmentTargetsRequest $requestData
     * @return StreamResponse<GeneratedModels\QuerySegmentTargetsResponse>
     * @throws StreamException
     */
    public function querySegmentTargets(string $id, GeneratedModels\QuerySegmentTargetsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/segments/{id}/targets/query';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QuerySegmentTargetsResponse::class);
    }
    /**
     * Retrieve team-level usage statistics from the warehouse database.
     * Returns all 16 metrics grouped by team with cursor-based pagination.
     * **Date Range Options (mutually exclusive):**
     * - Use 'month' parameter (YYYY-MM format) for monthly aggregated values
     * - Use 'start_date'/'end_date' parameters (YYYY-MM-DD format) for daily breakdown
     * - If neither provided, defaults to current month (monthly mode)
     * This endpoint is server-side only.
     *
     * @param GeneratedModels\QueryTeamUsageStatsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryTeamUsageStatsResponse>
     * @throws StreamException
     */
    public function queryTeamUsageStats(GeneratedModels\QueryTeamUsageStatsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/stats/team_usage';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryTeamUsageStatsResponse::class);
    }
    /**
     * Returns the list of threads for specific user
     *
     * @param GeneratedModels\QueryThreadsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryThreadsResponse>
     * @throws StreamException
     */
    public function queryThreads(GeneratedModels\QueryThreadsRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/threads';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryThreadsResponse::class);
    }
    /**
     * Return a specific thread
     *
     * @param string $messageID
     * @param int $replyLimit
     * @param int $participantLimit
     * @param int $memberLimit
     * @return StreamResponse<GeneratedModels\GetThreadResponse>
     * @throws StreamException
     */
    public function getThread(string $messageID, int $replyLimit, int $participantLimit, int $memberLimit): StreamResponse {
        $path = '/api/v2/chat/threads/{message_id}';
        $path = str_replace('{message_id}', (string) $messageID, $path);

        $queryParams = [];
        if ($replyLimit !== null) {
            $queryParams['reply_limit'] = $replyLimit;
        }
        if ($participantLimit !== null) {
            $queryParams['participant_limit'] = $participantLimit;
        }
        if ($memberLimit !== null) {
            $queryParams['member_limit'] = $memberLimit;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetThreadResponse::class);
    }
    /**
     * Updates certain fields of the thread
     * Sends events:
     * - thread.updated
     *
     * @param string $messageID
     * @param GeneratedModels\UpdateThreadPartialRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateThreadPartialResponse>
     * @throws StreamException
     */
    public function updateThreadPartial(string $messageID, GeneratedModels\UpdateThreadPartialRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/threads/{message_id}';
        $path = str_replace('{message_id}', (string) $messageID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateThreadPartialResponse::class);
    }
    /**
     * Fetch unread counts for a single user
     *
     * @param string $userID
     * @return StreamResponse<GeneratedModels\WrappedUnreadCountsResponse>
     * @throws StreamException
     */
    public function unreadCounts(string $userID): StreamResponse {
        $path = '/api/v2/chat/unread';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\WrappedUnreadCountsResponse::class);
    }
    /**
     * Fetch unread counts in batch for multiple users in one call
     *
     * @param GeneratedModels\UnreadCountsBatchRequest $requestData
     * @return StreamResponse<GeneratedModels\UnreadCountsBatchResponse>
     * @throws StreamException
     */
    public function unreadCountsBatch(GeneratedModels\UnreadCountsBatchRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/unread_batch';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnreadCountsBatchResponse::class);
    }
    /**
     * Sends a custom event to a user
     * Sends events:
     * - *
     *
     * @param string $userID
     * @param GeneratedModels\SendUserCustomEventRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function sendUserCustomEvent(string $userID, GeneratedModels\SendUserCustomEventRequest $requestData): StreamResponse {
        $path = '/api/v2/chat/users/{user_id}/event';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
}
