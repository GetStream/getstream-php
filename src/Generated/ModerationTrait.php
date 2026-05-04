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
     * Returns moderation action configs grouped by entity type, sorted by order ascending. Supports fetching DB-configured actions, hardcoded defaults, or both.
     *
     * @param string $queueType
     * @param string $entityType
     * @param bool $excludeDefaults
     * @param bool $onlyDefaults
     * @param string $userID
     * @return StreamResponse<GeneratedModels\GetActionConfigResponse>
     * @throws StreamException
     */
    public function getActionConfig(string $queueType, string $entityType, bool $excludeDefaults, bool $onlyDefaults, string $userID): StreamResponse {
        $path = '/api/v2/moderation/action_config';

        $queryParams = [];
        if ($queueType !== null) {
            $queryParams['queue_type'] = $queueType;
        }
        if ($entityType !== null) {
            $queryParams['entity_type'] = $entityType;
        }
        if ($excludeDefaults !== null) {
            $queryParams['exclude_defaults'] = $excludeDefaults;
        }
        if ($onlyDefaults !== null) {
            $queryParams['only_defaults'] = $onlyDefaults;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetActionConfigResponse::class);
    }
    /**
     * Create a new moderation action config entry or update an existing one. Action configs control the action buttons displayed in the moderation dashboard for each entity type.
     *
     * @param GeneratedModels\UpsertActionConfigRequest $requestData
     * @return StreamResponse<GeneratedModels\UpsertActionConfigResponse>
     * @throws StreamException
     */
    public function upsertActionConfig(GeneratedModels\UpsertActionConfigRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/action_config';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertActionConfigResponse::class);
    }
    /**
     * Create or update multiple moderation action config entries in a single request. Omit the ID field to create; provide an ID to update.
     *
     * @param GeneratedModels\BulkUpsertActionConfigRequest $requestData
     * @return StreamResponse<GeneratedModels\BulkUpsertActionConfigResponse>
     * @throws StreamException
     */
    public function bulkUpsertActionConfig(GeneratedModels\BulkUpsertActionConfigRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/action_config/bulk';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BulkUpsertActionConfigResponse::class);
    }
    /**
     * Delete multiple moderation action config entries by UUID in a single request.
     *
     * @param GeneratedModels\BulkDeleteActionConfigRequest $requestData
     * @return StreamResponse<GeneratedModels\BulkDeleteActionConfigResponse>
     * @throws StreamException
     */
    public function bulkDeleteActionConfig(GeneratedModels\BulkDeleteActionConfigRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/action_config/bulk_delete';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BulkDeleteActionConfigResponse::class);
    }
    /**
     * Delete a specific moderation action config entry by its UUID.
     *
     * @param string $id
     * @param string $userID
     * @return StreamResponse<GeneratedModels\DeleteActionConfigResponse>
     * @throws StreamException
     */
    public function deleteActionConfig(string $id, string $userID): StreamResponse {
        $path = '/api/v2/moderation/action_config/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteActionConfigResponse::class);
    }
    /**
     * Insert a moderation action log entry. Server-side only. Used by product services to log moderation-related actions.
     *
     * @param GeneratedModels\InsertActionLogRequest $requestData
     * @return StreamResponse<GeneratedModels\InsertActionLogResponse>
     * @throws StreamException
     */
    public function insertActionLog(GeneratedModels\InsertActionLogRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/action_logs';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\InsertActionLogResponse::class);
    }
    /**
     * Appeal against the moderation decision
     *
     * @param GeneratedModels\AppealRequest $requestData
     * @return StreamResponse<GeneratedModels\AppealResponse>
     * @throws StreamException
     */
    public function appeal(GeneratedModels\AppealRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/appeal';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AppealResponse::class);
    }
    /**
     * Retrieve a specific appeal item by its ID
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetAppealResponse>
     * @throws StreamException
     */
    public function getAppeal(string $id): StreamResponse {
        $path = '/api/v2/moderation/appeal/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetAppealResponse::class);
    }
    /**
     * Query Appeals
     *
     * @param GeneratedModels\QueryAppealsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryAppealsResponse>
     * @throws StreamException
     */
    public function queryAppeals(GeneratedModels\QueryAppealsRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/appeals';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryAppealsResponse::class);
    }
    /**
     * Ban a user from a channel or the entire app
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
     * Enable or disable moderation bypass for a user. This endpoint is server-side only.
     *
     * @param GeneratedModels\BypassRequest $requestData
     * @return StreamResponse<GeneratedModels\BypassResponse>
     * @throws StreamException
     */
    public function bypass(GeneratedModels\BypassRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/bypass';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BypassResponse::class);
    }
    /**
     * Run moderation checks on the provided content
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
     * Verifies that the configured IAM role ARN can access private S3 images for moderation. Optionally accepts a stream+s3:// URL to check access to a specific object.
     *
     * @param GeneratedModels\CheckS3AccessRequest $requestData
     * @return StreamResponse<GeneratedModels\CheckS3AccessResponse>
     * @throws StreamException
     */
    public function checkS3Access(GeneratedModels\CheckS3AccessRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/check_s3_access';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CheckS3AccessResponse::class);
    }
    /**
     * Create a new moderation configuration or update an existing one. Configure settings for content filtering, AI analysis, toxicity detection, and other moderation features.
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
     * @param string $key
     * @param string $team
     * @param string $userID
     * @return StreamResponse<GeneratedModels\DeleteModerationConfigResponse>
     * @throws StreamException
     */
    public function deleteConfig(string $key, string $team, string $userID): StreamResponse {
        $path = '/api/v2/moderation/config/{key}';
        $path = str_replace('{key}', (string) $key, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteModerationConfigResponse::class);
    }
    /**
     * Retrieve a specific moderation configuration by its key and team. This configuration contains settings for various moderation features like toxicity detection, AI analysis, and filtering rules.
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
     * Returns the number of moderation flags created against a specific user's content. Optionally filter by entity type.
     *
     * @param GeneratedModels\GetFlagCountRequest $requestData
     * @return StreamResponse<GeneratedModels\GetFlagCountResponse>
     * @throws StreamException
     */
    public function getFlagCount(GeneratedModels\GetFlagCountRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/flag_count';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GetFlagCountResponse::class);
    }
    /**
     * Query flags associated with moderation items. This is used for building a moderation dashboard.
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
     * Run moderation on text and return labels
     *
     * @param GeneratedModels\LabelsRequest $requestData
     * @return StreamResponse<GeneratedModels\LabelsResponse>
     * @throws StreamException
     */
    public function labels(GeneratedModels\LabelsRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/labels';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\LabelsResponse::class);
    }
    /**
     * Search and filter moderation label results with support for pagination and sorting. View the history of moderation labels applied to content.
     *
     * @param GeneratedModels\QueryLabelResultsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryLabelResultsResponse>
     * @throws StreamException
     */
    public function queryLabelResults(GeneratedModels\QueryLabelResultsRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/labels/results';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryLabelResultsResponse::class);
    }
    /**
     * Search and filter moderation action logs with support for pagination. View the history of moderation actions taken, including who performed them and when.
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
     * @param string $userID
     * @return StreamResponse<GeneratedModels\DeleteModerationRuleResponse>
     * @throws StreamException
     */
    public function deleteModerationRule(string $userID): StreamResponse {
        $path = '/api/v2/moderation/moderation_rule/{id}';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteModerationRuleResponse::class);
    }
    /**
     * Get a specific moderation rule by ID
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
