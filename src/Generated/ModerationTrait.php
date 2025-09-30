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
trait ModerationTrait
{
    /**
     * Ban a user from a channel or the entire app
     * 
     *
     * @param GeneratedModels\BanRequest $requestData
     * @return StreamResponse<GeneratedModels\BanResponse>
     * @throws StreamException
     */
    public function ban(GeneratedModels\BanRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/ban';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BanResponse::class);
    }
    /**
     * Moderate multiple images in bulk using a CSV file
     * 
     *
     * @param GeneratedModels\BulkImageModerationRequest $requestData
     * @return StreamResponse<GeneratedModels\BulkImageModerationResponse>
     * @throws StreamException
     */
    public function bulkImageModeration(GeneratedModels\BulkImageModerationRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/bulk_image_moderation';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BulkImageModerationResponse::class);
    }
    /**
     * Run moderation checks on the provided content
     * 
     *
     * @param GeneratedModels\CheckRequest $requestData
     * @return StreamResponse<GeneratedModels\CheckResponse>
     * @throws StreamException
     */
    public function check(GeneratedModels\CheckRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/check';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CheckResponse::class);
    }
    /**
     * Create a new moderation configuration or update an existing one. Configure settings for content filtering, AI analysis, toxicity detection, and other moderation features.
     * 
     *
     * @param GeneratedModels\UpsertConfigRequest $requestData
     * @return StreamResponse<GeneratedModels\UpsertConfigResponse>
     * @throws StreamException
     */
    public function upsertConfig(GeneratedModels\UpsertConfigRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/config';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertConfigResponse::class);
    }
    /**
     * Delete a specific moderation policy by its name
     * 
     *
     * @param string $key
     * @param string $team
     * @return StreamResponse<GeneratedModels\DeleteModerationConfigResponse>
     * @throws StreamException
     */
    public function deleteConfig(string $key, string $team): StreamResponse {
        $path = '/api/v2/moderation/config/{key}';
        $path = str_replace('{key}', (string) $key, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteModerationConfigResponse::class);
    }
    /**
     * Retrieve a specific moderation configuration by its key and team. This configuration contains settings for various moderation features like toxicity detection, AI analysis, and filtering rules.
     * 
     *
     * @param string $key
     * @param string $team
     * @return StreamResponse<GeneratedModels\GetConfigResponse>
     * @throws StreamException
     */
    public function getConfig(string $key, string $team): StreamResponse {
        $path = '/api/v2/moderation/config/{key}';
        $path = str_replace('{key}', (string) $key, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetConfigResponse::class);
    }
    /**
     * Search and filter moderation configurations across your application. This endpoint is designed for building moderation dashboards and managing multiple configuration sets.
     * 
     *
     * @param GeneratedModels\QueryModerationConfigsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationConfigsResponse>
     * @throws StreamException
     */
    public function queryModerationConfigs(GeneratedModels\QueryModerationConfigsRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/configs';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryModerationConfigsResponse::class);
    }
    /**
     * Custom check, add your own AI model reports to the review queue
     * 
     *
     * @param GeneratedModels\CustomCheckRequest $requestData
     * @return StreamResponse<GeneratedModels\CustomCheckResponse>
     * @throws StreamException
     */
    public function customCheck(GeneratedModels\CustomCheckRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/custom_check';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CustomCheckResponse::class);
    }
    /**
     * Delete a specific moderation template by its name
     * 
     *
     * @return StreamResponse<GeneratedModels\DeleteModerationTemplateResponse>
     * @throws StreamException
     */
    public function v2DeleteTemplate(): StreamResponse {
        $path = '/api/v2/moderation/feeds_moderation_template';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteModerationTemplateResponse::class);
    }
    /**
     * Retrieve a list of feed moderation templates that define preset moderation rules and configurations. Limited to 100 templates per request.
     * 
     *
     * @return StreamResponse<GeneratedModels\QueryFeedModerationTemplatesResponse>
     * @throws StreamException
     */
    public function v2QueryTemplates(): StreamResponse {
        $path = '/api/v2/moderation/feeds_moderation_template';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryFeedModerationTemplatesResponse::class);
    }
    /**
     * Upsert feeds template for moderation
     * 
     *
     * @param GeneratedModels\UpsertModerationTemplateRequest $requestData
     * @return StreamResponse<GeneratedModels\UpsertModerationTemplateResponse>
     * @throws StreamException
     */
    public function v2UpsertTemplate(GeneratedModels\UpsertModerationTemplateRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/feeds_moderation_template';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertModerationTemplateResponse::class);
    }
    /**
     * Flag any type of content (messages, users, channels, activities) for moderation review. Supports custom content types and additional metadata for flagged content.
     * 
     *
     * @param GeneratedModels\FlagRequest $requestData
     * @return StreamResponse<GeneratedModels\FlagResponse>
     * @throws StreamException
     */
    public function flag(GeneratedModels\FlagRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/flag';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\FlagResponse::class);
    }
    /**
     * Query flags associated with moderation items. This is used for building a moderation dashboard.
     * 
     *
     * @param GeneratedModels\QueryModerationFlagsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationFlagsResponse>
     * @throws StreamException
     */
    public function queryModerationFlags(GeneratedModels\QueryModerationFlagsRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/flags';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryModerationFlagsResponse::class);
    }
    /**
     * Search and filter moderation action logs with support for pagination. View the history of moderation actions taken, including who performed them and when.
     * 
     *
     * @param GeneratedModels\QueryModerationLogsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationLogsResponse>
     * @throws StreamException
     */
    public function queryModerationLogs(GeneratedModels\QueryModerationLogsRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/logs';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryModerationLogsResponse::class);
    }
    /**
     * Create or update a moderation rule that can apply app-wide or to specific moderation configs
     * 
     *
     * @param GeneratedModels\UpsertModerationRuleRequest $requestData
     * @return StreamResponse<GeneratedModels\UpsertModerationRuleResponse>
     * @throws StreamException
     */
    public function upsertModerationRule(GeneratedModels\UpsertModerationRuleRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/moderation_rule';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertModerationRuleResponse::class);
    }
    /**
     * Delete an existing moderation rule
     * 
     *
     * @return StreamResponse<GeneratedModels\DeleteModerationRuleResponse>
     * @throws StreamException
     */
    public function deleteModerationRule(): StreamResponse {
        $path = '/api/v2/moderation/moderation_rule/{id}';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteModerationRuleResponse::class);
    }
    /**
     * Get a specific moderation rule by ID
     * 
     *
     * @return StreamResponse<GeneratedModels\GetModerationRuleResponse>
     * @throws StreamException
     */
    public function getModerationRule(): StreamResponse {
        $path = '/api/v2/moderation/moderation_rule/{id}';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetModerationRuleResponse::class);
    }
    /**
     * Search and filter moderation rules across your application. This endpoint is designed for building moderation dashboards and managing multiple rule sets.
     * 
     *
     * @param GeneratedModels\QueryModerationRulesRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationRulesResponse>
     * @throws StreamException
     */
    public function queryModerationRules(GeneratedModels\QueryModerationRulesRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/moderation_rules';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryModerationRulesResponse::class);
    }
    /**
     * Mute a user. Mutes are generally not visible to the user you mute, while block is something you notice.
     * 
     *
     * @param GeneratedModels\MuteRequest $requestData
     * @return StreamResponse<GeneratedModels\MuteResponse>
     * @throws StreamException
     */
    public function mute(GeneratedModels\MuteRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/mute';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MuteResponse::class);
    }
    /**
     * Query review queue items allows you to filter the review queue items. This is used for building a moderation dashboard.
     * 
     *
     * @param GeneratedModels\QueryReviewQueueRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryReviewQueueResponse>
     * @throws StreamException
     */
    public function queryReviewQueue(GeneratedModels\QueryReviewQueueRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/review_queue';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryReviewQueueResponse::class);
    }
    /**
     * Retrieve a specific review queue item by its ID
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetReviewQueueItemResponse>
     * @throws StreamException
     */
    public function getReviewQueueItem(string $id): StreamResponse {
        $path = '/api/v2/moderation/review_queue/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetReviewQueueItemResponse::class);
    }
    /**
     * Take action on flagged content, such as marking content as safe, deleting content, banning users, or executing custom moderation actions. Supports various action types with configurable parameters.
     * 
     *
     * @param GeneratedModels\SubmitActionRequest $requestData
     * @return StreamResponse<GeneratedModels\SubmitActionResponse>
     * @throws StreamException
     */
    public function submitAction(GeneratedModels\SubmitActionRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/submit_action';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SubmitActionResponse::class);
    }
    /**
     * Unban a user from a channel or globally.
     * 
     *
     * @param string $targetUserID
     * @param string $channelCid
     * @param string $createdBy
     * @param GeneratedModels\UnbanRequest $requestData
     * @return StreamResponse<GeneratedModels\UnbanResponse>
     * @throws StreamException
     */
    public function unban(string $targetUserID, string $channelCid, string $createdBy, GeneratedModels\UnbanRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/unban';

        $queryParams = [];
        if ($targetUserID !== null) {
            $queryParams['target_user_id'] = $targetUserID;
        }
        if ($channelCid !== null) {
            $queryParams['channel_cid'] = $channelCid;
        }
        if ($createdBy !== null) {
            $queryParams['created_by'] = $createdBy;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnbanResponse::class);
    }
    /**
     * Unmute a user
     * 
     *
     * @param GeneratedModels\UnmuteRequest $requestData
     * @return StreamResponse<GeneratedModels\UnmuteResponse>
     * @throws StreamException
     */
    public function unmute(GeneratedModels\UnmuteRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/unmute';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnmuteResponse::class);
    }
}
