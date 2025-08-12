<?php

namespace GetStream\Generated;

use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;

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
     * @return StreamResponse
     * @throws StreamException
     */
    public function getApp(): StreamResponse {
        $path = '/api/v2/app';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * This Method updates one or more application settings
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateApp(array $requestData = []): StreamResponse {
        $path = '/api/v2/app';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Returns all available block lists
     * 
     *
     * @param string|null $team
     * @return StreamResponse
     * @throws StreamException
     */
    public function listBlockLists(?string $team = null): StreamResponse {
        $path = '/api/v2/blocklists';

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Creates a new application blocklist, once created the blocklist can be used by any channel type
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createBlockList(array $requestData = []): StreamResponse {
        $path = '/api/v2/blocklists';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes previously created application blocklist
     * 
     *
     * @param string $name
     * @param string|null $team
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteBlockList(string $name, ?string $team = null): StreamResponse {
        $path = '/api/v2/blocklists/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Returns block list by given name
     * 
     *
     * @param string $name
     * @param string|null $team
     * @return StreamResponse
     * @throws StreamException
     */
    public function getBlockList(string $name, ?string $team = null): StreamResponse {
        $path = '/api/v2/blocklists/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        if ($team !== null) {
            $queryParams['team'] = $team;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Updates contents of the block list
     * 
     *
     * @param string $name
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateBlockList(string $name, array $requestData = []): StreamResponse {
        $path = '/api/v2/blocklists/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * Sends a test message via push, this is a test endpoint to verify your push settings
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function checkPush(array $requestData = []): StreamResponse {
        $path = '/api/v2/check_push';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Validates Amazon SNS configuration
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function checkSNS(array $requestData = []): StreamResponse {
        $path = '/api/v2/check_sns';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Validates Amazon SQS credentials
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function checkSQS(array $requestData = []): StreamResponse {
        $path = '/api/v2/check_sqs';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes one device
     * 
     *
     * @param string|null $id
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteDevice(?string $id = null, ?string $userID = null): StreamResponse {
        $path = '/api/v2/devices';

        $queryParams = [];
        if ($id !== null) {
            $queryParams['id'] = $id;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Returns all available devices
     * 
     *
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function listDevices(?string $userID = null): StreamResponse {
        $path = '/api/v2/devices';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Adds a new device to a user, if the same device already exists the call will have no effect
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createDevice(array $requestData = []): StreamResponse {
        $path = '/api/v2/devices';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Exports user profile, reactions and messages for list of given users
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function exportUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/export/users';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Lists external storage
     * 
     *
     * @return StreamResponse
     * @throws StreamException
     */
    public function listExternalStorage(): StreamResponse {
        $path = '/api/v2/external_storage';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Creates new external storage
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createExternalStorage(array $requestData = []): StreamResponse {
        $path = '/api/v2/external_storage';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes external storage
     * 
     *
     * @param string $name
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteExternalStorage(string $name): StreamResponse {
        $path = '/api/v2/external_storage/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * 
     * 
     *
     * @param string $name
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateExternalStorage(string $name, array $requestData = []): StreamResponse {
        $path = '/api/v2/external_storage/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * 
     * 
     *
     * @param string $name
     * @return StreamResponse
     * @throws StreamException
     */
    public function checkExternalStorage(string $name): StreamResponse {
        $path = '/api/v2/external_storage/{name}/check';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * 
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createGuest(array $requestData = []): StreamResponse {
        $path = '/api/v2/guest';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Creates a new import URL
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createImportURL(array $requestData = []): StreamResponse {
        $path = '/api/v2/import_urls';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Gets an import
     * 
     *
     * @return StreamResponse
     * @throws StreamException
     */
    public function listImports(): StreamResponse {
        $path = '/api/v2/imports';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Creates a new import
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createImport(array $requestData = []): StreamResponse {
        $path = '/api/v2/imports';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Gets an import
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function getImport(string $id): StreamResponse {
        $path = '/api/v2/imports/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Get an OpenGraph attachment for a link
     * 
     *
     * @param string|null $url
     * @return StreamResponse
     * @throws StreamException
     */
    public function getOG(?string $url = null): StreamResponse {
        $path = '/api/v2/og';

        $queryParams = [];
        if ($url !== null) {
            $queryParams['url'] = $url;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Lists all available permissions
     * 
     *
     * @return StreamResponse
     * @throws StreamException
     */
    public function listPermissions(): StreamResponse {
        $path = '/api/v2/permissions';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Gets custom permission
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function getPermission(string $id): StreamResponse {
        $path = '/api/v2/permissions/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Creates a new poll
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createPoll(array $requestData = []): StreamResponse {
        $path = '/api/v2/polls';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
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
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updatePoll(array $requestData = []): StreamResponse {
        $path = '/api/v2/polls';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * Queries polls
     * 
     *
     * @param string|null $userID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryPolls(?string $userID = null, array $requestData = []): StreamResponse {
        $path = '/api/v2/polls/query';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
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
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function deletePoll(string $pollID, ?string $userID = null): StreamResponse {
        $path = '/api/v2/polls/{poll_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Retrieves a poll
     * 
     *
     * @param string $pollID
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function getPoll(string $pollID, ?string $userID = null): StreamResponse {
        $path = '/api/v2/polls/{poll_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
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
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updatePollPartial(string $pollID, array $requestData = []): StreamResponse {
        $path = '/api/v2/polls/{poll_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
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
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createPollOption(string $pollID, array $requestData = []): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
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
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updatePollOption(string $pollID, array $requestData = []): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
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
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function deletePollOption(string $pollID, string $optionID, ?string $userID = null): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options/{option_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);
        $path = str_replace('{option_id}', (string) $optionID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Retrieves a poll option
     * 
     *
     * @param string $pollID
     * @param string $optionID
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function getPollOption(string $pollID, string $optionID, ?string $userID = null): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/options/{option_id}';
        $path = str_replace('{poll_id}', (string) $pollID, $path);
        $path = str_replace('{option_id}', (string) $optionID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Queries votes
     * 
     *
     * @param string $pollID
     * @param string|null $userID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryPollVotes(string $pollID, ?string $userID = null, array $requestData = []): StreamResponse {
        $path = '/api/v2/polls/{poll_id}/votes';
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * List details of all push providers.
     * 
     *
     * @return StreamResponse
     * @throws StreamException
     */
    public function listPushProviders(): StreamResponse {
        $path = '/api/v2/push_providers';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Upsert a push provider for v2 with multi bundle/package support
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function upsertPushProvider(array $requestData = []): StreamResponse {
        $path = '/api/v2/push_providers';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Delete a push provider from v2 with multi bundle/package support. v1 isn't supported in this endpoint
     * 
     *
     * @param string $type
     * @param string $name
     * @return StreamResponse
     * @throws StreamException
     */
    public function deletePushProvider(string $type, string $name): StreamResponse {
        $path = '/api/v2/push_providers/{type}/{name}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Get rate limits usage and quotas
     * 
     *
     * @param bool|null $serverSide
     * @param bool|null $android
     * @param bool|null $ios
     * @param bool|null $web
     * @param string|null $endpoints
     * @return StreamResponse
     * @throws StreamException
     */
    public function getRateLimits(?bool $serverSide = null, ?bool $android = null, ?bool $ios = null, ?bool $web = null, ?string $endpoints = null): StreamResponse {
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

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Lists all available roles
     * 
     *
     * @return StreamResponse
     * @throws StreamException
     */
    public function listRoles(): StreamResponse {
        $path = '/api/v2/roles';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Creates custom role
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createRole(array $requestData = []): StreamResponse {
        $path = '/api/v2/roles';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes custom role
     * 
     *
     * @param string $name
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteRole(string $name): StreamResponse {
        $path = '/api/v2/roles/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Gets status of a task
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function getTask(string $id): StreamResponse {
        $path = '/api/v2/tasks/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Deletes previously uploaded file
     * 
     *
     * @param string|null $url
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteFileGlobal(?string $url = null): StreamResponse {
        $path = '/api/v2/uploads/file';

        $queryParams = [];
        if ($url !== null) {
            $queryParams['url'] = $url;
        }
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Uploads file
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function uploadFileGlobal(array $requestData = []): StreamResponse {
        $path = '/api/v2/uploads/file';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes previously uploaded image
     * 
     *
     * @param string|null $url
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteImageGlobal(?string $url = null): StreamResponse {
        $path = '/api/v2/uploads/image';

        $queryParams = [];
        if ($url !== null) {
            $queryParams['url'] = $url;
        }
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Uploads image
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function uploadImageGlobal(array $requestData = []): StreamResponse {
        $path = '/api/v2/uploads/image';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Find and filter users
     * 
     *
     * @param QueryUsersPayload|null $payload
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryUsers(?QueryUsersPayload $payload = null): StreamResponse {
        $path = '/api/v2/users';

        $queryParams = [];
        if ($payload !== null) {
            $queryParams['payload'] = $payload;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
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
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateUsersPartial(array $requestData = []): StreamResponse {
        $path = '/api/v2/users';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Update or create users in bulk
     * 
     * Sends events:
     * - user.updated
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/users';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Get list of blocked Users
     * 
     *
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function getBlockedUsers(?string $userID = null): StreamResponse {
        $path = '/api/v2/users/block';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Block users
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function blockUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/users/block';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deactivate users in batches
     * 
     * Sends events:
     * - user.deactivated
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function deactivateUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/users/deactivate';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes users and optionally all their belongings asynchronously.
     * 
     * Sends events:
     * - channel.deleted
     * - user.deleted
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/users/delete';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Retrieves all active live locations for a user
     * 
     *
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function getUserLiveLocations(?string $userID = null): StreamResponse {
        $path = '/api/v2/users/live_locations';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Updates an existing live location with new coordinates or expiration time
     * 
     *
     * @param string|null $userID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateLiveLocation(?string $userID = null, array $requestData = []): StreamResponse {
        $path = '/api/v2/users/live_locations';

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * Reactivate users in batches
     * 
     * Sends events:
     * - user.reactivated
     * - user.reactivated
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function reactivateUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/users/reactivate';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Restore soft deleted users
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function restoreUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/users/restore';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Unblock users
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function unblockUsers(array $requestData = []): StreamResponse {
        $path = '/api/v2/users/unblock';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deactivates user with possibility to activate it back
     * 
     * Sends events:
     * - user.deactivated
     * 
     *
     * @param string $userID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function deactivateUser(string $userID, array $requestData = []): StreamResponse {
        $path = '/api/v2/users/{user_id}/deactivate';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Exports the user's profile, reactions and messages. Raises an error if a user has more than 10k messages or reactions
     * 
     *
     * @param string $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function exportUser(string $userID): StreamResponse {
        $path = '/api/v2/users/{user_id}/export';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Activates user who's been deactivated previously
     * 
     * Sends events:
     * - user.reactivated
     * 
     *
     * @param string $userID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function reactivateUser(string $userID, array $requestData = []): StreamResponse {
        $path = '/api/v2/users/{user_id}/reactivate';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
}
