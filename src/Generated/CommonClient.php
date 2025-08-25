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
trait CommonClient
{
    /**
     * This Method returns the application settings
     * 
     *
     * @return StreamResponse<GeneratedModels\GetApplicationResponse>
     * @throws StreamException
     */
    public function getApp(): StreamResponse {
        $path = '/api/v2/app';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetApplicationResponse::class);
    }
    /**
     * This Method updates one or more application settings
     * 
     *
     * @param GeneratedModels\UpdateAppRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function updateApp(GeneratedModels\UpdateAppRequest $requestData): StreamResponse {
        $path = '/api/v2/app';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Returns all available block lists
     * 
     *
     * @param string $team
     * @return StreamResponse<GeneratedModels\ListBlockListResponse>
     * @throws StreamException
     */
    public function listBlockLists(string $team): StreamResponse {
        $path = '/api/v2/blocklists';

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListBlockListResponse::class);
    }
    /**
     * Creates a new application blocklist, once created the blocklist can be used by any channel type
     * 
     *
     * @param GeneratedModels\CreateBlockListRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateBlockListResponse>
     * @throws StreamException
     */
    public function createBlockList(GeneratedModels\CreateBlockListRequest $requestData): StreamResponse {
        $path = '/api/v2/blocklists';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateBlockListResponse::class);
    }
    /**
     * Deletes previously created application blocklist
     * 
     *
     * @param string $name
     * @param string $team
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteBlockList(string $name, string $team): StreamResponse {
        $path = '/api/v2/blocklists/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Returns block list by given name
     * 
     *
     * @param string $name
     * @param string $team
     * @return StreamResponse<GeneratedModels\GetBlockListResponse>
     * @throws StreamException
     */
    public function getBlockList(string $name, string $team): StreamResponse {
        $path = '/api/v2/blocklists/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetBlockListResponse::class);
    }
    /**
     * Updates contents of the block list
     * 
     *
     * @param string $name
     * @param GeneratedModels\UpdateBlockListRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateBlockListResponse>
     * @throws StreamException
     */
    public function updateBlockList(string $name, GeneratedModels\UpdateBlockListRequest $requestData): StreamResponse {
        $path = '/api/v2/blocklists/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateBlockListResponse::class);
    }
    /**
     * Sends a test message via push, this is a test endpoint to verify your push settings
     * 
     *
     * @param GeneratedModels\CheckPushRequest $requestData
     * @return StreamResponse<GeneratedModels\CheckPushResponse>
     * @throws StreamException
     */
    public function checkPush(GeneratedModels\CheckPushRequest $requestData): StreamResponse {
        $path = '/api/v2/check_push';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CheckPushResponse::class);
    }
    /**
     * Validates Amazon SNS configuration
     * 
     *
     * @param GeneratedModels\CheckSNSRequest $requestData
     * @return StreamResponse<GeneratedModels\CheckSNSResponse>
     * @throws StreamException
     */
    public function checkSNS(GeneratedModels\CheckSNSRequest $requestData): StreamResponse {
        $path = '/api/v2/check_sns';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CheckSNSResponse::class);
    }
    /**
     * Validates Amazon SQS credentials
     * 
     *
     * @param GeneratedModels\CheckSQSRequest $requestData
     * @return StreamResponse<GeneratedModels\CheckSQSResponse>
     * @throws StreamException
     */
    public function checkSQS(GeneratedModels\CheckSQSRequest $requestData): StreamResponse {
        $path = '/api/v2/check_sqs';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CheckSQSResponse::class);
    }
    /**
     * Deletes one device
     * 
     *
     * @param string $id
     * @param string $userID
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteDevice(string $id, string $userID): StreamResponse {
        $path = '/api/v2/devices';

        $queryParams = [];
        if ($id !== null) {
            $queryParams['id'] = $id;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Returns all available devices
     * 
     *
     * @param string $userID
     * @return StreamResponse<GeneratedModels\ListDevicesResponse>
     * @throws StreamException
     */
    public function listDevices(string $userID): StreamResponse {
        $path = '/api/v2/devices';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListDevicesResponse::class);
    }
    /**
     * Adds a new device to a user, if the same device already exists the call will have no effect
     * 
     *
     * @param GeneratedModels\CreateDeviceRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function createDevice(GeneratedModels\CreateDeviceRequest $requestData): StreamResponse {
        $path = '/api/v2/devices';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Exports user profile, reactions and messages for list of given users
     * 
     *
     * @param GeneratedModels\ExportUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\ExportUsersResponse>
     * @throws StreamException
     */
    public function exportUsers(GeneratedModels\ExportUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/export/users';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ExportUsersResponse::class);
    }
    /**
     * Lists external storage
     * 
     *
     * @return StreamResponse<GeneratedModels\ListExternalStorageResponse>
     * @throws StreamException
     */
    public function listExternalStorage(): StreamResponse {
        $path = '/api/v2/external_storage';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListExternalStorageResponse::class);
    }
    /**
     * Creates new external storage
     * 
     *
     * @param GeneratedModels\CreateExternalStorageRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateExternalStorageResponse>
     * @throws StreamException
     */
    public function createExternalStorage(GeneratedModels\CreateExternalStorageRequest $requestData): StreamResponse {
        $path = '/api/v2/external_storage';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateExternalStorageResponse::class);
    }
    /**
     * Deletes external storage
     * 
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\DeleteExternalStorageResponse>
     * @throws StreamException
     */
    public function deleteExternalStorage(string $name): StreamResponse {
        $path = '/api/v2/external_storage/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteExternalStorageResponse::class);
    }
    /**
     * 
     * 
     *
     * @param string $name
     * @param GeneratedModels\UpdateExternalStorageRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateExternalStorageResponse>
     * @throws StreamException
     */
    public function updateExternalStorage(string $name, GeneratedModels\UpdateExternalStorageRequest $requestData): StreamResponse {
        $path = '/api/v2/external_storage/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateExternalStorageResponse::class);
    }
    /**
     * 
     * 
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\CheckExternalStorageResponse>
     * @throws StreamException
     */
    public function checkExternalStorage(string $name): StreamResponse {
        $path = '/api/v2/external_storage/{name}/check';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\CheckExternalStorageResponse::class);
    }
    /**
     * 
     * 
     *
     * @param GeneratedModels\CreateGuestRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateGuestResponse>
     * @throws StreamException
     */
    public function createGuest(GeneratedModels\CreateGuestRequest $requestData): StreamResponse {
        $path = '/api/v2/guest';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateGuestResponse::class);
    }
    /**
     * Creates a new import URL
     * 
     *
     * @param GeneratedModels\CreateImportURLRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateImportURLResponse>
     * @throws StreamException
     */
    public function createImportURL(GeneratedModels\CreateImportURLRequest $requestData): StreamResponse {
        $path = '/api/v2/import_urls';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateImportURLResponse::class);
    }
    /**
     * Gets an import
     * 
     *
     * @return StreamResponse<GeneratedModels\ListImportsResponse>
     * @throws StreamException
     */
    public function listImports(): StreamResponse {
        $path = '/api/v2/imports';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListImportsResponse::class);
    }
    /**
     * Creates a new import
     * 
     *
     * @param GeneratedModels\CreateImportRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateImportResponse>
     * @throws StreamException
     */
    public function createImport(GeneratedModels\CreateImportRequest $requestData): StreamResponse {
        $path = '/api/v2/imports';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateImportResponse::class);
    }
    /**
     * Gets an import
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetImportResponse>
     * @throws StreamException
     */
    public function getImport(string $id): StreamResponse {
        $path = '/api/v2/imports/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetImportResponse::class);
    }
    /**
     * Get an OpenGraph attachment for a link
     * 
     *
     * @param string $url
     * @return StreamResponse<GeneratedModels\GetOGResponse>
     * @throws StreamException
     */
    public function getOG(string $url): StreamResponse {
        $path = '/api/v2/og';

        $queryParams = [];
        if ($url !== null) {
            $queryParams['url'] = $url;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetOGResponse::class);
    }
    /**
     * Lists all available permissions
     * 
     *
     * @return StreamResponse<GeneratedModels\ListPermissionsResponse>
     * @throws StreamException
     */
    public function listPermissions(): StreamResponse {
        $path = '/api/v2/permissions';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListPermissionsResponse::class);
    }
    /**
     * Gets custom permission
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetCustomPermissionResponse>
     * @throws StreamException
     */
    public function getPermission(string $id): StreamResponse {
        $path = '/api/v2/permissions/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCustomPermissionResponse::class);
    }
    /**
     * Creates a new poll
     * 
     *
     * @param GeneratedModels\CreatePollRequest $requestData
     * @return StreamResponse<GeneratedModels\PollResponse>
     * @throws StreamException
     */
    public function createPoll(GeneratedModels\CreatePollRequest $requestData): StreamResponse {
        $path = '/api/v2/polls';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PollResponse::class);
    }
    /**
     * Updates a poll
     * 
     * Sends events:
     * - feeds.poll.closed
     * - feeds.poll.updated
     * - poll.closed
     * - poll.updated
     * 
     *
     * @param GeneratedModels\UpdatePollRequest $requestData
     * @return StreamResponse<GeneratedModels\PollResponse>
     * @throws StreamException
     */
    public function updatePoll(GeneratedModels\UpdatePollRequest $requestData): StreamResponse {
        $path = '/api/v2/polls';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\PollResponse::class);
    }
    /**
     * Queries polls
     * 
     *
     * @param string $userID
     * @param GeneratedModels\QueryPollsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryPollsResponse>
     * @throws StreamException
     */
    public function queryPolls(string $userID, GeneratedModels\QueryPollsRequest $requestData): StreamResponse {
        $path = '/api/v2/polls/query';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryPollsResponse::class);
    }
    /**
     * Deletes a poll
     * 
     * Sends events:
     * - feeds.poll.deleted
     * - poll.deleted
     * 
     *
     * @param string $pollID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deletePoll(string $pollID, string $userID): StreamResponse {
        $path = '/api/v2/polls/{poll_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Retrieves a poll
     * 
     *
     * @param string $pollID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\PollResponse>
     * @throws StreamException
     */
    public function getPoll(string $pollID, string $userID): StreamResponse {
        $path = '/api/v2/polls/{poll_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\PollResponse::class);
    }
    /**
     * Updates a poll partially
     * 
     * Sends events:
     * - feeds.poll.closed
     * - feeds.poll.updated
     * - poll.closed
     * - poll.updated
     * 
     *
     * @param string $pollID
     * @param GeneratedModels\UpdatePollPartialRequest $requestData
     * @return StreamResponse<GeneratedModels\PollResponse>
     * @throws StreamException
     */
    public function updatePollPartial(string $pollID, GeneratedModels\UpdatePollPartialRequest $requestData): StreamResponse {
        $path = '/api/v2/polls/{poll_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\PollResponse::class);
    }
    /**
     * Creates a poll option
     * 
     * Sends events:
     * - feeds.poll.updated
     * - poll.updated
     * 
     *
     * @param string $pollID
     * @param GeneratedModels\CreatePollOptionRequest $requestData
     * @return StreamResponse<GeneratedModels\PollOptionResponse>
     * @throws StreamException
     */
    public function createPollOption(string $pollID, GeneratedModels\CreatePollOptionRequest $requestData): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PollOptionResponse::class);
    }
    /**
     * Updates a poll option
     * 
     * Sends events:
     * - feeds.poll.updated
     * - poll.updated
     * 
     *
     * @param string $pollID
     * @param GeneratedModels\UpdatePollOptionRequest $requestData
     * @return StreamResponse<GeneratedModels\PollOptionResponse>
     * @throws StreamException
     */
    public function updatePollOption(string $pollID, GeneratedModels\UpdatePollOptionRequest $requestData): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\PollOptionResponse::class);
    }
    /**
     * Deletes a poll option
     * 
     * Sends events:
     * - feeds.poll.updated
     * - poll.updated
     * 
     *
     * @param string $pollID
     * @param string $optionID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deletePollOption(string $pollID, string $optionID, string $userID): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options/{option_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);
        $path = str_replace('{option_id}', (string) $optionID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Retrieves a poll option
     * 
     *
     * @param string $pollID
     * @param string $optionID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\PollOptionResponse>
     * @throws StreamException
     */
    public function getPollOption(string $pollID, string $optionID, string $userID): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options/{option_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);
        $path = str_replace('{option_id}', (string) $optionID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\PollOptionResponse::class);
    }
    /**
     * Queries votes
     * 
     *
     * @param string $pollID
     * @param string $userID
     * @param GeneratedModels\QueryPollVotesRequest $requestData
     * @return StreamResponse<GeneratedModels\PollVotesResponse>
     * @throws StreamException
     */
    public function queryPollVotes(string $pollID, string $userID, GeneratedModels\QueryPollVotesRequest $requestData): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/votes';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PollVotesResponse::class);
    }
    /**
     * List details of all push providers.
     * 
     *
     * @return StreamResponse<GeneratedModels\ListPushProvidersResponse>
     * @throws StreamException
     */
    public function listPushProviders(): StreamResponse {
        $path = '/api/v2/push_providers';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListPushProvidersResponse::class);
    }
    /**
     * Upsert a push provider for v2 with multi bundle/package support
     * 
     *
     * @param GeneratedModels\UpsertPushProviderRequest $requestData
     * @return StreamResponse<GeneratedModels\UpsertPushProviderResponse>
     * @throws StreamException
     */
    public function upsertPushProvider(GeneratedModels\UpsertPushProviderRequest $requestData): StreamResponse {
        $path = '/api/v2/push_providers';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertPushProviderResponse::class);
    }
    /**
     * Delete a push provider from v2 with multi bundle/package support. v1 isn't supported in this endpoint
     * 
     *
     * @param string $type
     * @param string $name
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deletePushProvider(string $type, string $name): StreamResponse {
        $path = '/api/v2/push_providers/{type}/{name}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Get rate limits usage and quotas
     * 
     *
     * @param bool $serverSide
     * @param bool $android
     * @param bool $ios
     * @param bool $web
     * @param string $endpoints
     * @return StreamResponse<GeneratedModels\GetRateLimitsResponse>
     * @throws StreamException
     */
    public function getRateLimits(bool $serverSide, bool $android, bool $ios, bool $web, string $endpoints): StreamResponse {
        $path = '/api/v2/rate_limits';

        $queryParams = [];
        if ($serverSide !== null) {
            $queryParams['server_side'] = $serverSide;
        }
        if ($android !== null) {
            $queryParams['android'] = $android;
        }
        if ($ios !== null) {
            $queryParams['ios'] = $ios;
        }
        if ($web !== null) {
            $queryParams['web'] = $web;
        }
        if ($endpoints !== null) {
            $queryParams['endpoints'] = $endpoints;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetRateLimitsResponse::class);
    }
    /**
     * Lists all available roles
     * 
     *
     * @return StreamResponse<GeneratedModels\ListRolesResponse>
     * @throws StreamException
     */
    public function listRoles(): StreamResponse {
        $path = '/api/v2/roles';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListRolesResponse::class);
    }
    /**
     * Creates custom role
     * 
     *
     * @param GeneratedModels\CreateRoleRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateRoleResponse>
     * @throws StreamException
     */
    public function createRole(GeneratedModels\CreateRoleRequest $requestData): StreamResponse {
        $path = '/api/v2/roles';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateRoleResponse::class);
    }
    /**
     * Deletes custom role
     * 
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteRole(string $name): StreamResponse {
        $path = '/api/v2/roles/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Gets status of a task
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetTaskResponse>
     * @throws StreamException
     */
    public function getTask(string $id): StreamResponse {
        $path = '/api/v2/tasks/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetTaskResponse::class);
    }
    /**
     * Deletes previously uploaded file
     * 
     *
     * @param string $url
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteFileGlobal(string $url): StreamResponse {
        $path = '/api/v2/uploads/file';

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
     *
     * @param GeneratedModels\FileUploadRequest $requestData
     * @return StreamResponse<GeneratedModels\FileUploadResponse>
     * @throws StreamException
     */
    public function uploadFileGlobal(GeneratedModels\FileUploadRequest $requestData): StreamResponse {
        $path = '/api/v2/uploads/file';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\FileUploadResponse::class);
    }
    /**
     * Deletes previously uploaded image
     * 
     *
     * @param string $url
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteImageGlobal(string $url): StreamResponse {
        $path = '/api/v2/uploads/image';

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
     *
     * @param GeneratedModels\ImageUploadRequest $requestData
     * @return StreamResponse<GeneratedModels\ImageUploadResponse>
     * @throws StreamException
     */
    public function uploadImageGlobal(GeneratedModels\ImageUploadRequest $requestData): StreamResponse {
        $path = '/api/v2/uploads/image';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ImageUploadResponse::class);
    }
    /**
     * Find and filter users
     * 
     *
     * @param GeneratedModels\QueryUsersPayload $payload
     * @return StreamResponse<GeneratedModels\QueryUsersResponse>
     * @throws StreamException
     */
    public function queryUsers(GeneratedModels\QueryUsersPayload $payload): StreamResponse {
        $path = '/api/v2/users';

        $queryParams = [];
        if ($payload !== null) {
            $queryParams['payload'] = $payload;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryUsersResponse::class);
    }
    /**
     * Updates certain fields of the user
     * 
     * Sends events:
     * - user.presence.changed
     * - user.updated
     * - user.presence.changed
     * 
     *
     * @param GeneratedModels\UpdateUsersPartialRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateUsersResponse>
     * @throws StreamException
     */
    public function updateUsersPartial(GeneratedModels\UpdateUsersPartialRequest $requestData): StreamResponse {
        $path = '/api/v2/users';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateUsersResponse::class);
    }
    /**
     * Update or create users in bulk
     * 
     * Sends events:
     * - user.updated
     * 
     *
     * @param GeneratedModels\UpdateUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateUsersResponse>
     * @throws StreamException
     */
    public function updateUsers(GeneratedModels\UpdateUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/users';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpdateUsersResponse::class);
    }
    /**
     * Get list of blocked Users
     * 
     *
     * @param string $userID
     * @return StreamResponse<GeneratedModels\GetBlockedUsersResponse>
     * @throws StreamException
     */
    public function getBlockedUsers(string $userID): StreamResponse {
        $path = '/api/v2/users/block';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetBlockedUsersResponse::class);
    }
    /**
     * Block users
     * 
     *
     * @param GeneratedModels\BlockUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\BlockUsersResponse>
     * @throws StreamException
     */
    public function blockUsers(GeneratedModels\BlockUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/users/block';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BlockUsersResponse::class);
    }
    /**
     * Deactivate users in batches
     * 
     * Sends events:
     * - user.deactivated
     * 
     *
     * @param GeneratedModels\DeactivateUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\DeactivateUsersResponse>
     * @throws StreamException
     */
    public function deactivateUsers(GeneratedModels\DeactivateUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/users/deactivate';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\DeactivateUsersResponse::class);
    }
    /**
     * Deletes users and optionally all their belongings asynchronously.
     * 
     * Sends events:
     * - channel.deleted
     * - user.deleted
     * 
     *
     * @param GeneratedModels\DeleteUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\DeleteUsersResponse>
     * @throws StreamException
     */
    public function deleteUsers(GeneratedModels\DeleteUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/users/delete';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\DeleteUsersResponse::class);
    }
    /**
     * Retrieves all active live locations for a user
     * 
     *
     * @param string $userID
     * @return StreamResponse<GeneratedModels\SharedLocationsResponse>
     * @throws StreamException
     */
    public function getUserLiveLocations(string $userID): StreamResponse {
        $path = '/api/v2/users/live_locations';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\SharedLocationsResponse::class);
    }
    /**
     * Updates an existing live location with new coordinates or expiration time
     * 
     *
     * @param string $userID
     * @param GeneratedModels\UpdateLiveLocationRequest $requestData
     * @return StreamResponse<GeneratedModels\SharedLocationResponse>
     * @throws StreamException
     */
    public function updateLiveLocation(string $userID, GeneratedModels\UpdateLiveLocationRequest $requestData): StreamResponse {
        $path = '/api/v2/users/live_locations';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\SharedLocationResponse::class);
    }
    /**
     * Reactivate users in batches
     * 
     * Sends events:
     * - user.reactivated
     * - user.reactivated
     * 
     *
     * @param GeneratedModels\ReactivateUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\ReactivateUsersResponse>
     * @throws StreamException
     */
    public function reactivateUsers(GeneratedModels\ReactivateUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/users/reactivate';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ReactivateUsersResponse::class);
    }
    /**
     * Restore soft deleted users
     * 
     *
     * @param GeneratedModels\RestoreUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function restoreUsers(GeneratedModels\RestoreUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/users/restore';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Unblock users
     * 
     *
     * @param GeneratedModels\UnblockUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\UnblockUsersResponse>
     * @throws StreamException
     */
    public function unblockUsers(GeneratedModels\UnblockUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/users/unblock';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnblockUsersResponse::class);
    }
    /**
     * Deactivates user with possibility to activate it back
     * 
     * Sends events:
     * - user.deactivated
     * 
     *
     * @param string $userID
     * @param GeneratedModels\DeactivateUserRequest $requestData
     * @return StreamResponse<GeneratedModels\DeactivateUserResponse>
     * @throws StreamException
     */
    public function deactivateUser(string $userID, GeneratedModels\DeactivateUserRequest $requestData): StreamResponse {
        $path = '/api/v2/users/{user_id}/deactivate';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\DeactivateUserResponse::class);
    }
    /**
     * Exports the user's profile, reactions and messages. Raises an error if a user has more than 10k messages or reactions
     * 
     *
     * @param string $userID
     * @return StreamResponse<GeneratedModels\ExportUserResponse>
     * @throws StreamException
     */
    public function exportUser(string $userID): StreamResponse {
        $path = '/api/v2/users/{user_id}/export';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ExportUserResponse::class);
    }
    /**
     * Activates user who's been deactivated previously
     * 
     * Sends events:
     * - user.reactivated
     * 
     *
     * @param string $userID
     * @param GeneratedModels\ReactivateUserRequest $requestData
     * @return StreamResponse<GeneratedModels\ReactivateUserResponse>
     * @throws StreamException
     */
    public function reactivateUser(string $userID, GeneratedModels\ReactivateUserRequest $requestData): StreamResponse {
        $path = '/api/v2/users/{user_id}/reactivate';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ReactivateUserResponse::class);
    }
}
