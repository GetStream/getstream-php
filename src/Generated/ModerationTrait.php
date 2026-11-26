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
     * @param ?string $queueType
     * @param ?string $entityType
     * @param ?bool $excludeDefaults
     * @param ?bool $onlyDefaults
     * @param ?string $userID
     * @return StreamResponse<GeneratedModels\GetActionConfigResponse>
     * @throws StreamException
     */
    public function getActionConfig(?string $queueType = null, ?string $entityType = null, ?bool $excludeDefaults = null, ?bool $onlyDefaults = null, ?string $userID = null): StreamResponse {
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BulkDeleteActionConfigResponse::class);
    }
    /**
     * Delete a specific moderation action config entry by its UUID.
     *
     * @param string $id
     * @param ?string $userID
     * @return StreamResponse<GeneratedModels\DeleteActionConfigResponse>
     * @throws StreamException
     */
    public function deleteActionConfig(string $id, ?string $userID = null): StreamResponse {
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\InsertActionLogResponse::class);
    }
    /**
     * List moderator corrections of Nora's reviews for this app, newest first
     *
     * @param ?int $limit
     * @param ?string $next
     * @return StreamResponse<GeneratedModels\ListAgentFeedbackResponse>
     * @throws StreamException
     */
    public function listAgentFeedback(?int $limit = null, ?string $next = null): StreamResponse {
        $path = '/api/v2/moderation/agent_feedback';

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($next !== null) {
            $queryParams['next'] = $next;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListAgentFeedbackResponse::class);
    }
    /**
     * Record a moderator correction when their action overturns Nora's review of a queue item
     *
     * @param GeneratedModels\SubmitAgentFeedbackRequest $requestData
     * @return StreamResponse<GeneratedModels\SubmitAgentFeedbackResponse>
     * @throws StreamException
     */
    public function submitAgentFeedback(GeneratedModels\SubmitAgentFeedbackRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/agent_feedback';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SubmitAgentFeedbackResponse::class);
    }
    /**
     * Last error and 7-day counts for the app's agent moderator
     *
     * @return StreamResponse<GeneratedModels\GetAgentReviewStatusResponse>
     * @throws StreamException
     */
    public function getAgentReviewStatus(): StreamResponse {
        $path = '/api/v2/moderation/agent_review_status';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetAgentReviewStatusResponse::class);
    }
    /**
     * Moderate named text fields and raw image bytes via multipart/form-data. Returns a per-field lightweight verdict.
     *
     * @param ?GeneratedModels\AnalyzeRequest $requestData
     * @return StreamResponse<GeneratedModels\AnalyzeResponse>
     * @throws StreamException
     */
    public function analyze(?GeneratedModels\AnalyzeRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/analyze';

        $queryParams = [];
        $requestData ??= new GeneratedModels\AnalyzeRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AnalyzeResponse::class);
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
     * @param ?GeneratedModels\QueryAppealsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryAppealsResponse>
     * @throws StreamException
     */
    public function queryAppeals(?GeneratedModels\QueryAppealsRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/appeals';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryAppealsRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryAppealsResponse::class);
    }
    /**
     * Process multiple appeals in a single request by applying the specified action to each. Supported actions: unban, restore, unblock, mark_reviewed, reject_appeal. Each appeal goes through the same path as a single submit_action call.
     *
     * @param GeneratedModels\BulkActionAppealsRequest $requestData
     * @return StreamResponse<GeneratedModels\BulkActionAppealsResponse>
     * @throws StreamException
     */
    public function bulkActionAppeals(GeneratedModels\BulkActionAppealsRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/appeals/bulk_action';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BulkActionAppealsResponse::class);
    }
    /**
     * Ban a user from a channel or the entire app
     *
     * @param GeneratedModels\BanRequest $requestData
     * @return StreamResponse<GeneratedModels\ModerationBanResponse>
     * @throws StreamException
     */
    public function ban(GeneratedModels\BanRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/ban';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ModerationBanResponse::class);
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CheckResponse::class);
    }
    /**
     * Verifies that the configured IAM role ARN can access private S3 images for moderation. Optionally accepts a stream+s3:// URL to check access to a specific object.
     *
     * @param ?GeneratedModels\CheckS3AccessRequest $requestData
     * @return StreamResponse<GeneratedModels\CheckS3AccessResponse>
     * @throws StreamException
     */
    public function checkS3Access(?GeneratedModels\CheckS3AccessRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/check_s3_access';

        $queryParams = [];
        $requestData ??= new GeneratedModels\CheckS3AccessRequest();
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertConfigResponse::class);
    }
    /**
     * Save a moderation configuration as a new version without making it live. The version takes effect once it is published.
     *
     * @param GeneratedModels\SaveConfigVersionRequest $requestData
     * @return StreamResponse<GeneratedModels\SaveConfigVersionResponse>
     * @throws StreamException
     */
    public function saveConfigVersion(GeneratedModels\SaveConfigVersionRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/config/versions';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SaveConfigVersionResponse::class);
    }
    /**
     * Delete a specific moderation policy by its name
     *
     * @param string $key
     * @param ?string $team
     * @param ?string $userID
     * @return StreamResponse<GeneratedModels\DeleteModerationConfigResponse>
     * @throws StreamException
     */
    public function deleteConfig(string $key, ?string $team = null, ?string $userID = null): StreamResponse {
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
     * @param ?string $team
     * @return StreamResponse<GeneratedModels\GetConfigResponse>
     * @throws StreamException
     */
    public function getConfig(string $key, ?string $team = null): StreamResponse {
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
     * List the retained versions of a moderation configuration, newest first, and which one is published.
     *
     * @param string $key
     * @param ?string $team
     * @return StreamResponse<GeneratedModels\ListConfigVersionsResponse>
     * @throws StreamException
     */
    public function listConfigVersions(string $key, ?string $team = null): StreamResponse {
        $path = '/api/v2/moderation/config/{key}/versions';
        $path = str_replace('{key}', (string) $key, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListConfigVersionsResponse::class);
    }
    /**
     * Retrieve the full moderation configuration stored in a specific version, whether or not it is published.
     *
     * @param string $key
     * @param int $version
     * @param ?string $team
     * @return StreamResponse<GeneratedModels\GetConfigVersionResponse>
     * @throws StreamException
     */
    public function getConfigVersion(string $key, int $version, ?string $team = null): StreamResponse {
        $path = '/api/v2/moderation/config/{key}/versions/{version}';
        $path = str_replace('{key}', (string) $key, $path);
        $path = str_replace('{version}', (string) $version, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetConfigVersionResponse::class);
    }
    /**
     * Make a stored version the moderation configuration in effect. Publishing an older version reverts to it without creating a new version.
     *
     * @param string $key
     * @param int $version
     * @param ?GeneratedModels\PublishConfigVersionRequest $requestData
     * @return StreamResponse<GeneratedModels\PublishConfigVersionResponse>
     * @throws StreamException
     */
    public function publishConfigVersion(string $key, int $version, ?GeneratedModels\PublishConfigVersionRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/config/{key}/versions/{version}/publish';
        $path = str_replace('{key}', (string) $key, $path);
        $path = str_replace('{version}', (string) $version, $path);

        $queryParams = [];
        $requestData ??= new GeneratedModels\PublishConfigVersionRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PublishConfigVersionResponse::class);
    }
    /**
     * Search and filter moderation configurations across your application. This endpoint is designed for building moderation dashboards and managing multiple configuration sets.
     *
     * @param ?GeneratedModels\QueryModerationConfigsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationConfigsResponse>
     * @throws StreamException
     */
    public function queryModerationConfigs(?GeneratedModels\QueryModerationConfigsRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/configs';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryModerationConfigsRequest();
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CustomCheckResponse::class);
    }
    /**
     * List moderation feedback submissions that have an item matching the filter, with those items, sorting and pagination. Server-side only.
     *
     * @param ?GeneratedModels\QueryModerationFeedbackRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationFeedbackResponse>
     * @throws StreamException
     */
    public function queryModerationFeedback(?GeneratedModels\QueryModerationFeedbackRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/feedback_items';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryModerationFeedbackRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryModerationFeedbackResponse::class);
    }
    /**
     * Delete a specific moderation template by its name
     *
     * @param ?string $name
     * @return StreamResponse<GeneratedModels\DeleteModerationTemplateResponse>
     * @throws StreamException
     */
    public function v2DeleteTemplate(?string $name = null): StreamResponse {
        $path = '/api/v2/moderation/feeds_moderation_template';

        $queryParams = [];
        if ($name !== null) {
            $queryParams['name'] = $name;
        }
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertModerationTemplateResponse::class);
    }
    /**
     * Flag any type of content (messages, users, channels, activities) for moderation review. Supports custom content types and additional metadata for flagged content.
     *
     * @param GeneratedModels\FlagRequest $requestData
     * @return StreamResponse<GeneratedModels\FlagItemResponse>
     * @throws StreamException
     */
    public function flag(GeneratedModels\FlagRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/flag';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\FlagItemResponse::class);
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GetFlagCountResponse::class);
    }
    /**
     * Query flags associated with moderation items. This is used for building a moderation dashboard.
     *
     * @param ?GeneratedModels\QueryModerationFlagsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationFlagsResponse>
     * @throws StreamException
     */
    public function queryModerationFlags(?GeneratedModels\QueryModerationFlagsRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/flags';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryModerationFlagsRequest();
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\LabelsResponse::class);
    }
    /**
     * Search and filter moderation label results with support for pagination and sorting. View the history of moderation labels applied to content.
     *
     * @param ?GeneratedModels\QueryLabelResultsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryLabelResultsResponse>
     * @throws StreamException
     */
    public function queryLabelResults(?GeneratedModels\QueryLabelResultsRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/labels/results';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryLabelResultsRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryLabelResultsResponse::class);
    }
    /**
     * Search and filter moderation action logs with support for pagination. View the history of moderation actions taken, including who performed them and when.
     *
     * @param ?GeneratedModels\QueryModerationLogsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationLogsResponse>
     * @throws StreamException
     */
    public function queryModerationLogs(?GeneratedModels\QueryModerationLogsRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/logs';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryModerationLogsRequest();
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertModerationRuleResponse::class);
    }
    /**
     * Delete an existing moderation rule
     *
     * @param string $id
     * @param ?string $userID
     * @return StreamResponse<GeneratedModels\DeleteModerationRuleResponse>
     * @throws StreamException
     */
    public function deleteModerationRule(string $id, ?string $userID = null): StreamResponse {
        $path = '/api/v2/moderation/moderation_rule/{id}';
        $path = str_replace('{id}', (string) $id, $path);

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
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetModerationRuleResponse>
     * @throws StreamException
     */
    public function getModerationRule(string $id): StreamResponse {
        $path = '/api/v2/moderation/moderation_rule/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetModerationRuleResponse::class);
    }
    /**
     * Search and filter moderation rules across your application. This endpoint is designed for building moderation dashboards and managing multiple rule sets.
     *
     * @param ?GeneratedModels\QueryModerationRulesRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryModerationRulesResponse>
     * @throws StreamException
     */
    public function queryModerationRules(?GeneratedModels\QueryModerationRulesRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/moderation_rules';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryModerationRulesRequest();
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MuteResponse::class);
    }
    /**
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\PolicyTestRunResponse>
     * @throws StreamException
     */
    public function getPolicyTestRun(string $id): StreamResponse {
        $path = '/api/v2/moderation/policy_tests/runs/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\PolicyTestRunResponse::class);
    }
    /**
     *
     * @param ?int $limit
     * @param ?int $offset
     * @return StreamResponse<GeneratedModels\PolicyTestSetListResponse>
     * @throws StreamException
     */
    public function listPolicyTestSets(?int $limit = null, ?int $offset = null): StreamResponse {
        $path = '/api/v2/moderation/policy_tests/sets';

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($offset !== null) {
            $queryParams['offset'] = $offset;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\PolicyTestSetListResponse::class);
    }
    /**
     * Save a labeled set of messages that can be re-run against the moderation policy.
     *
     * @param GeneratedModels\CreatePolicyTestSetRequest $requestData
     * @return StreamResponse<GeneratedModels\PolicyTestSetResponse>
     * @throws StreamException
     */
    public function createPolicyTestSet(GeneratedModels\CreatePolicyTestSetRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/policy_tests/sets';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PolicyTestSetResponse::class);
    }
    /**
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deletePolicyTestSet(string $id): StreamResponse {
        $path = '/api/v2/moderation/policy_tests/sets/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\PolicyTestSetResponse>
     * @throws StreamException
     */
    public function getPolicyTestSet(string $id): StreamResponse {
        $path = '/api/v2/moderation/policy_tests/sets/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\PolicyTestSetResponse::class);
    }
    /**
     * Enqueue a background run of the set against the saved live moderation config.
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\PolicyTestRunResponse>
     * @throws StreamException
     */
    public function startPolicyTestRun(string $id): StreamResponse {
        $path = '/api/v2/moderation/policy_tests/sets/{id}/runs';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PolicyTestRunResponse::class);
    }
    /**
     *
     * @param ?string $userID
     * @return StreamResponse<GeneratedModels\ListQueuesResponse>
     * @throws StreamException
     */
    public function listQueues(?string $userID = null): StreamResponse {
        $path = '/api/v2/moderation/queues';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListQueuesResponse::class);
    }
    /**
     *
     * @param GeneratedModels\CreateQueueRequest $requestData
     * @return StreamResponse<GeneratedModels\QueueResponse>
     * @throws StreamException
     */
    public function createQueue(GeneratedModels\CreateQueueRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/queues';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueueResponse::class);
    }
    /**
     *
     * @param string $id
     * @param ?string $userID
     * @return StreamResponse<GeneratedModels\QueueResponse>
     * @throws StreamException
     */
    public function getQueue(string $id, ?string $userID = null): StreamResponse {
        $path = '/api/v2/moderation/queues/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueueResponse::class);
    }
    /**
     *
     * @param string $id
     * @param ?GeneratedModels\UpdateQueueRequest $requestData
     * @return StreamResponse<GeneratedModels\QueueResponse>
     * @throws StreamException
     */
    public function updateQueue(string $id, ?GeneratedModels\UpdateQueueRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/queues/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData ??= new GeneratedModels\UpdateQueueRequest();
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\QueueResponse::class);
    }
    /**
     *
     * @param string $id
     * @param ?GeneratedModels\DeleteQueueRequest $requestData
     * @return StreamResponse<GeneratedModels\QueueResponse>
     * @throws StreamException
     */
    public function deleteQueue(string $id, ?GeneratedModels\DeleteQueueRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/queues/{id}/delete';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData ??= new GeneratedModels\DeleteQueueRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueueResponse::class);
    }
    /**
     * Authorize revealing a review queue item's blurred media. CSAM can only be revealed by users with the RevealProtectedMedia permission. Reveals of blurred CSAM or gore are recorded in the moderation action logs.
     *
     * @param GeneratedModels\RevealMediaRequest $requestData
     * @return StreamResponse<GeneratedModels\RevealMediaResponse>
     * @throws StreamException
     */
    public function revealMedia(GeneratedModels\RevealMediaRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/reveal_media';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\RevealMediaResponse::class);
    }
    /**
     * Query review queue items allows you to filter the review queue items. This is used for building a moderation dashboard.
     *
     * @param ?GeneratedModels\QueryReviewQueueRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryReviewQueueResponse>
     * @throws StreamException
     */
    public function queryReviewQueue(?GeneratedModels\QueryReviewQueueRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/review_queue';

        $queryParams = [];
        $requestData ??= new GeneratedModels\QueryReviewQueueRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryReviewQueueResponse::class);
    }
    /**
     * Count the review queue items matching a filter, so a moderation dashboard can show a total for a queue or view. Counts are kept up to date in the background while they are being requested.
     *
     * @param ?GeneratedModels\CountReviewQueueRequest $requestData
     * @return StreamResponse<GeneratedModels\CountReviewQueueResponse>
     * @throws StreamException
     */
    public function countReviewQueue(?GeneratedModels\CountReviewQueueRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/review_queue/count';

        $queryParams = [];
        $requestData ??= new GeneratedModels\CountReviewQueueRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CountReviewQueueResponse::class);
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
     * Retrieve a setup session for an app
     *
     * @return StreamResponse<GeneratedModels\GetSetupSessionResponse>
     * @throws StreamException
     */
    public function getSetupSession(): StreamResponse {
        $path = '/api/v2/moderation/setup';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetSetupSessionResponse::class);
    }
    /**
     * Update a setup session for an app
     *
     * @param GeneratedModels\UpsertSetupSessionRequest $requestData
     * @return StreamResponse<GeneratedModels\UpsertSetupSessionResponse>
     * @throws StreamException
     */
    public function upsertSetupSession(GeneratedModels\UpsertSetupSessionRequest $requestData): StreamResponse {
        $path = '/api/v2/moderation/setup';

        $queryParams = [];
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertSetupSessionResponse::class);
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SubmitActionResponse::class);
    }
    /**
     * Forward a moderator-supplied correction to the moderation feedback pipeline, optionally marking the referenced flags as false positives. Server-side only.
     *
     * @param ?GeneratedModels\SubmitModerationFeedbackRequest $requestData
     * @return StreamResponse<GeneratedModels\SubmitModerationFeedbackResponse>
     * @throws StreamException
     */
    public function submitModerationFeedback(?GeneratedModels\SubmitModerationFeedbackRequest $requestData = null): StreamResponse {
        $path = '/api/v2/moderation/submit_moderation_feedback';

        $queryParams = [];
        $requestData ??= new GeneratedModels\SubmitModerationFeedbackRequest();
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SubmitModerationFeedbackResponse::class);
    }
    /**
     * Unban a user from a channel or globally.
     *
     * @param GeneratedModels\UnbanRequest $requestData
     * @param string $targetUserID
     * @param ?string $channelCid
     * @param ?string $createdBy
     * @param ?bool $removeFutureChannelsBan
     * @param ?string $channelType
     * @return StreamResponse<GeneratedModels\UnbanResponse>
     * @throws StreamException
     */
    public function unban(GeneratedModels\UnbanRequest $requestData, string $targetUserID, ?string $channelCid = null, ?string $createdBy = null, ?bool $removeFutureChannelsBan = null, ?string $channelType = null): StreamResponse {
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
        if ($removeFutureChannelsBan !== null) {
            $queryParams['remove_future_channels_ban'] = $removeFutureChannelsBan;
        }
        if ($channelType !== null) {
            $queryParams['channel_type'] = $channelType;
        }
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
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnmuteResponse::class);
    }
}
