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
trait VideoTrait
{
    /**
     * Get the current status of all active calls including metrics and summary information
     *
     * @return StreamResponse<GeneratedModels\GetActiveCallsStatusResponse>
     * @throws StreamException
     */
    public function getActiveCallsStatus(): StreamResponse {
        $path = '/api/v2/video/active_calls_status';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetActiveCallsStatusResponse::class);
    }
    /**
     *
     * @param bool $full
     * @param GeneratedModels\QueryUserFeedbackRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryUserFeedbackResponse>
     * @throws StreamException
     */
    public function queryUserFeedback(bool $full, GeneratedModels\QueryUserFeedbackRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/feedback';

        $queryParams = [];
        if ($full !== null) {
            $queryParams['full'] = $full;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryUserFeedbackResponse::class);
    }
    /**
     * Query call members with filter query
     *
     * @param GeneratedModels\QueryCallMembersRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCallMembersResponse>
     * @throws StreamException
     */
    public function queryCallMembers(GeneratedModels\QueryCallMembersRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/members';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCallMembersResponse::class);
    }
    /**
     *
     * @param GeneratedModels\QueryCallStatsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCallStatsResponse>
     * @throws StreamException
     */
    public function queryCallStats(GeneratedModels\QueryCallStatsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/stats';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCallStatsResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param int $membersLimit
     * @param bool $ring
     * @param bool $notify
     * @param bool $video
     * @return StreamResponse<GeneratedModels\GetCallResponse>
     * @throws StreamException
     */
    public function getCall(string $type, string $id, int $membersLimit, bool $ring, bool $notify, bool $video): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($membersLimit !== null) {
            $queryParams['members_limit'] = $membersLimit;
        }
        if ($ring !== null) {
            $queryParams['ring'] = $ring;
        }
        if ($notify !== null) {
            $queryParams['notify'] = $notify;
        }
        if ($video !== null) {
            $queryParams['video'] = $video;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCallResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UpdateCallRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateCallResponse>
     * @throws StreamException
     */
    public function updateCall(string $type, string $id, GeneratedModels\UpdateCallRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateCallResponse::class);
    }
    /**
     * Gets or creates a new call
     * Sends events:
     * - call.created
     * - call.notification
     * - call.ring
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\GetOrCreateCallRequest $requestData
     * @return StreamResponse<GeneratedModels\GetOrCreateCallResponse>
     * @throws StreamException
     */
    public function getOrCreateCall(string $type, string $id, GeneratedModels\GetOrCreateCallRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GetOrCreateCallResponse::class);
    }
    /**
     * Block a user, preventing them from joining the call until they are unblocked.
     * Sends events:
     * - call.blocked_user
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\BlockUserRequest $requestData
     * @return StreamResponse<GeneratedModels\BlockUserResponse>
     * @throws StreamException
     */
    public function blockUser(string $type, string $id, GeneratedModels\BlockUserRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/block';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\BlockUserResponse::class);
    }
    /**
     * Sends a closed caption event to the call
     * Sends events:
     * - call.closed_caption
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\SendClosedCaptionRequest $requestData
     * @return StreamResponse<GeneratedModels\SendClosedCaptionResponse>
     * @throws StreamException
     */
    public function sendClosedCaption(string $type, string $id, GeneratedModels\SendClosedCaptionRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/closed_captions';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SendClosedCaptionResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\DeleteCallRequest $requestData
     * @return StreamResponse<GeneratedModels\DeleteCallResponse>
     * @throws StreamException
     */
    public function deleteCall(string $type, string $id, GeneratedModels\DeleteCallRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/delete';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\DeleteCallResponse::class);
    }
    /**
     * Sends custom event to the call
     * Sends events:
     * - custom
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\SendCallEventRequest $requestData
     * @return StreamResponse<GeneratedModels\SendCallEventResponse>
     * @throws StreamException
     */
    public function sendCallEvent(string $type, string $id, GeneratedModels\SendCallEventRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/event';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SendCallEventResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\CollectUserFeedbackRequest $requestData
     * @return StreamResponse<GeneratedModels\CollectUserFeedbackResponse>
     * @throws StreamException
     */
    public function collectUserFeedback(string $type, string $id, GeneratedModels\CollectUserFeedbackRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/feedback';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CollectUserFeedbackResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\GoLiveRequest $requestData
     * @return StreamResponse<GeneratedModels\GoLiveResponse>
     * @throws StreamException
     */
    public function goLive(string $type, string $id, GeneratedModels\GoLiveRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/go_live';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GoLiveResponse::class);
    }
    /**
     * Kicks a user from the call. Optionally block the user from rejoining by setting block=true.
     * Sends events:
     * - call.blocked_user
     * - call.kicked_user
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\KickUserRequest $requestData
     * @return StreamResponse<GeneratedModels\KickUserResponse>
     * @throws StreamException
     */
    public function kickUser(string $type, string $id, GeneratedModels\KickUserRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/kick';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\KickUserResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @return StreamResponse<GeneratedModels\EndCallResponse>
     * @throws StreamException
     */
    public function endCall(string $type, string $id): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/mark_ended';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\EndCallResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UpdateCallMembersRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateCallMembersResponse>
     * @throws StreamException
     */
    public function updateCallMembers(string $type, string $id, GeneratedModels\UpdateCallMembersRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/members';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpdateCallMembersResponse::class);
    }
    /**
     * Mutes users in a call
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\MuteUsersRequest $requestData
     * @return StreamResponse<GeneratedModels\MuteUsersResponse>
     * @throws StreamException
     */
    public function muteUsers(string $type, string $id, GeneratedModels\MuteUsersRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/mute_users';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\MuteUsersResponse::class);
    }
    /**
     * Returns a list of participants connected to the call
     *
     * @param string $id
     * @param string $type
     * @param int $limit
     * @param GeneratedModels\QueryCallParticipantsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCallParticipantsResponse>
     * @throws StreamException
     */
    public function queryCallParticipants(string $id, string $type, int $limit, GeneratedModels\QueryCallParticipantsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/participants';
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{type}', (string) $type, $path);

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCallParticipantsResponse::class);
    }
    /**
     * Pins a track for all users in the call.
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\PinRequest $requestData
     * @return StreamResponse<GeneratedModels\PinResponse>
     * @throws StreamException
     */
    public function videoPin(string $type, string $id, GeneratedModels\PinRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/pin';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PinResponse::class);
    }
    /**
     * Lists recordings
     *
     * @param string $type
     * @param string $id
     * @return StreamResponse<GeneratedModels\ListRecordingsResponse>
     * @throws StreamException
     */
    public function listRecordings(string $type, string $id): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/recordings';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListRecordingsResponse::class);
    }
    /**
     * Starts recording
     * Sends events:
     * - call.recording_started
     *
     * @param string $type
     * @param string $id
     * @param string $recordingType
     * @param GeneratedModels\StartRecordingRequest $requestData
     * @return StreamResponse<GeneratedModels\StartRecordingResponse>
     * @throws StreamException
     */
    public function startRecording(string $type, string $id, string $recordingType, GeneratedModels\StartRecordingRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/recordings/{recording_type}/start';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{recording_type}', (string) $recordingType, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StartRecordingResponse::class);
    }
    /**
     * Stops recording
     * Sends events:
     * - call.recording_stopped
     *
     * @param string $type
     * @param string $id
     * @param string $recordingType
     * @param GeneratedModels\StopRecordingRequest $requestData
     * @return StreamResponse<GeneratedModels\StopRecordingResponse>
     * @throws StreamException
     */
    public function stopRecording(string $type, string $id, string $recordingType, GeneratedModels\StopRecordingRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/recordings/{recording_type}/stop';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{recording_type}', (string) $recordingType, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopRecordingResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param string $sessionID
     * @return StreamResponse<GeneratedModels\GetCallReportResponse>
     * @throws StreamException
     */
    public function getCallReport(string $type, string $id, string $sessionID): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/report';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($sessionID !== null) {
            $queryParams['session_id'] = $sessionID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCallReportResponse::class);
    }
    /**
     * Sends a ring notification to the provided users who are not already in the call. All users should be members of the call
     * Sends events:
     * - call.ring
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\RingCallRequest $requestData
     * @return StreamResponse<GeneratedModels\RingCallResponse>
     * @throws StreamException
     */
    public function ringCall(string $type, string $id, GeneratedModels\RingCallRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/ring';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\RingCallResponse::class);
    }
    /**
     * Starts RTMP broadcasts for the provided RTMP destinations
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\StartRTMPBroadcastsRequest $requestData
     * @return StreamResponse<GeneratedModels\StartRTMPBroadcastsResponse>
     * @throws StreamException
     */
    public function startRTMPBroadcasts(string $type, string $id, GeneratedModels\StartRTMPBroadcastsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/rtmp_broadcasts';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StartRTMPBroadcastsResponse::class);
    }
    /**
     * Stop all RTMP broadcasts for the provided call
     *
     * @param string $type
     * @param string $id
     * @return StreamResponse<GeneratedModels\StopAllRTMPBroadcastsResponse>
     * @throws StreamException
     */
    public function stopAllRTMPBroadcasts(string $type, string $id): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/rtmp_broadcasts/stop';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopAllRTMPBroadcastsResponse::class);
    }
    /**
     * Stop RTMP broadcasts for the provided RTMP destinations
     *
     * @param string $type
     * @param string $id
     * @param string $name
     * @param GeneratedModels\StopRTMPBroadcastsRequest $requestData
     * @return StreamResponse<GeneratedModels\StopRTMPBroadcastsResponse>
     * @throws StreamException
     */
    public function stopRTMPBroadcast(string $type, string $id, string $name, GeneratedModels\StopRTMPBroadcastsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/rtmp_broadcasts/{name}/stop';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopRTMPBroadcastsResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param string $session
     * @param string $user
     * @param string $userSession
     * @param \DateTime $since
     * @param \DateTime $until
     * @return StreamResponse<GeneratedModels\GetCallParticipantSessionMetricsResponse>
     * @throws StreamException
     */
    public function getCallParticipantSessionMetrics(string $type, string $id, string $session, string $user, string $userSession, \DateTime $since, \DateTime $until): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/session/{session}/participant/{user}/{user_session}/details/track';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{session}', (string) $session, $path);
        $path = str_replace('{user}', (string) $user, $path);
        $path = str_replace('{user_session}', (string) $userSession, $path);

        $queryParams = [];
        if ($since !== null) {
            $queryParams['since'] = $since;
        }
        if ($until !== null) {
            $queryParams['until'] = $until;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCallParticipantSessionMetricsResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param string $session
     * @param int $limit
     * @param string $prev
     * @param string $next
     * @param object $filterConditions
     * @return StreamResponse<GeneratedModels\QueryCallParticipantSessionsResponse>
     * @throws StreamException
     */
    public function queryCallParticipantSessions(string $type, string $id, string $session, int $limit, string $prev, string $next, object $filterConditions): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/session/{session}/participant_sessions';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{session}', (string) $session, $path);

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($prev !== null) {
            $queryParams['prev'] = $prev;
        }
        if ($next !== null) {
            $queryParams['next'] = $next;
        }
        if ($filterConditions !== null) {
            try {
                $queryParams['filter_conditions'] = json_encode($filterConditions, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                throw new StreamException('Failed to encode query parameter "filter_conditions" to JSON: ' . $e->getMessage());
            }
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryCallParticipantSessionsResponse::class);
    }
    /**
     * Starts HLS broadcasting
     *
     * @param string $type
     * @param string $id
     * @return StreamResponse<GeneratedModels\StartHLSBroadcastingResponse>
     * @throws StreamException
     */
    public function startHLSBroadcasting(string $type, string $id): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/start_broadcasting';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StartHLSBroadcastingResponse::class);
    }
    /**
     * Starts closed captions
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\StartClosedCaptionsRequest $requestData
     * @return StreamResponse<GeneratedModels\StartClosedCaptionsResponse>
     * @throws StreamException
     */
    public function startClosedCaptions(string $type, string $id, GeneratedModels\StartClosedCaptionsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/start_closed_captions';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StartClosedCaptionsResponse::class);
    }
    /**
     * Starts frame by frame recording
     * Sends events:
     * - call.frame_recording_started
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\StartFrameRecordingRequest $requestData
     * @return StreamResponse<GeneratedModels\StartFrameRecordingResponse>
     * @throws StreamException
     */
    public function startFrameRecording(string $type, string $id, GeneratedModels\StartFrameRecordingRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/start_frame_recording';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StartFrameRecordingResponse::class);
    }
    /**
     * Starts transcription
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\StartTranscriptionRequest $requestData
     * @return StreamResponse<GeneratedModels\StartTranscriptionResponse>
     * @throws StreamException
     */
    public function startTranscription(string $type, string $id, GeneratedModels\StartTranscriptionRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/start_transcription';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StartTranscriptionResponse::class);
    }
    /**
     * Stops HLS broadcasting
     *
     * @param string $type
     * @param string $id
     * @return StreamResponse<GeneratedModels\StopHLSBroadcastingResponse>
     * @throws StreamException
     */
    public function stopHLSBroadcasting(string $type, string $id): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/stop_broadcasting';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopHLSBroadcastingResponse::class);
    }
    /**
     * Stops closed captions
     * Sends events:
     * - call.transcription_stopped
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\StopClosedCaptionsRequest $requestData
     * @return StreamResponse<GeneratedModels\StopClosedCaptionsResponse>
     * @throws StreamException
     */
    public function stopClosedCaptions(string $type, string $id, GeneratedModels\StopClosedCaptionsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/stop_closed_captions';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopClosedCaptionsResponse::class);
    }
    /**
     * Stops frame recording
     * Sends events:
     * - call.frame_recording_stopped
     *
     * @param string $type
     * @param string $id
     * @return StreamResponse<GeneratedModels\StopFrameRecordingResponse>
     * @throws StreamException
     */
    public function stopFrameRecording(string $type, string $id): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/stop_frame_recording';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopFrameRecordingResponse::class);
    }
    /**
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\StopLiveRequest $requestData
     * @return StreamResponse<GeneratedModels\StopLiveResponse>
     * @throws StreamException
     */
    public function stopLive(string $type, string $id, GeneratedModels\StopLiveRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/stop_live';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopLiveResponse::class);
    }
    /**
     * Stops transcription
     * Sends events:
     * - call.transcription_stopped
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\StopTranscriptionRequest $requestData
     * @return StreamResponse<GeneratedModels\StopTranscriptionResponse>
     * @throws StreamException
     */
    public function stopTranscription(string $type, string $id, GeneratedModels\StopTranscriptionRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/stop_transcription';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\StopTranscriptionResponse::class);
    }
    /**
     * Lists transcriptions
     *
     * @param string $type
     * @param string $id
     * @return StreamResponse<GeneratedModels\ListTranscriptionsResponse>
     * @throws StreamException
     */
    public function listTranscriptions(string $type, string $id): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/transcriptions';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListTranscriptionsResponse::class);
    }
    /**
     * Removes the block for a user on a call. The user will be able to join the call again.
     * Sends events:
     * - call.unblocked_user
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UnblockUserRequest $requestData
     * @return StreamResponse<GeneratedModels\UnblockUserResponse>
     * @throws StreamException
     */
    public function unblockUser(string $type, string $id, GeneratedModels\UnblockUserRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/unblock';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnblockUserResponse::class);
    }
    /**
     * Unpins a track for all users in the call.
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UnpinRequest $requestData
     * @return StreamResponse<GeneratedModels\UnpinResponse>
     * @throws StreamException
     */
    public function videoUnpin(string $type, string $id, GeneratedModels\UnpinRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/unpin';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnpinResponse::class);
    }
    /**
     * Updates user permissions
     * Sends events:
     * - call.permissions_updated
     *
     * @param string $type
     * @param string $id
     * @param GeneratedModels\UpdateUserPermissionsRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateUserPermissionsResponse>
     * @throws StreamException
     */
    public function updateUserPermissions(string $type, string $id, GeneratedModels\UpdateUserPermissionsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/user_permissions';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpdateUserPermissionsResponse::class);
    }
    /**
     * Deletes recording
     *
     * @param string $type
     * @param string $id
     * @param string $session
     * @param string $filename
     * @return StreamResponse<GeneratedModels\DeleteRecordingResponse>
     * @throws StreamException
     */
    public function deleteRecording(string $type, string $id, string $session, string $filename): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/{session}/recordings/{filename}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{session}', (string) $session, $path);
        $path = str_replace('{filename}', (string) $filename, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteRecordingResponse::class);
    }
    /**
     * Deletes transcription
     *
     * @param string $type
     * @param string $id
     * @param string $session
     * @param string $filename
     * @return StreamResponse<GeneratedModels\DeleteTranscriptionResponse>
     * @throws StreamException
     */
    public function deleteTranscription(string $type, string $id, string $session, string $filename): StreamResponse {
        $path = '/api/v2/video/call/{type}/{id}/{session}/transcriptions/{filename}';
        $path = str_replace('{type}', (string) $type, $path);
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{session}', (string) $session, $path);
        $path = str_replace('{filename}', (string) $filename, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteTranscriptionResponse::class);
    }
    /**
     *
     * @param GeneratedModels\QueryCallSessionStatsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCallSessionStatsResponse>
     * @throws StreamException
     */
    public function queryCallSessionStats(GeneratedModels\QueryCallSessionStatsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/call_stats';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCallSessionStatsResponse::class);
    }
    /**
     *
     * @param string $callType
     * @param string $callID
     * @param string $session
     * @param \DateTime $startTime
     * @param \DateTime $endTime
     * @param bool $excludePublishers
     * @param bool $excludeSubscribers
     * @param bool $excludeSfus
     * @return StreamResponse<GeneratedModels\QueryCallStatsMapResponse>
     * @throws StreamException
     */
    public function getCallStatsMap(string $callType, string $callID, string $session, \DateTime $startTime, \DateTime $endTime, bool $excludePublishers, bool $excludeSubscribers, bool $excludeSfus): StreamResponse {
        $path = '/api/v2/video/call_stats/{call_type}/{call_id}/{session}/map';
        $path = str_replace('{call_type}', (string) $callType, $path);
        $path = str_replace('{call_id}', (string) $callID, $path);
        $path = str_replace('{session}', (string) $session, $path);

        $queryParams = [];
        if ($startTime !== null) {
            $queryParams['start_time'] = $startTime;
        }
        if ($endTime !== null) {
            $queryParams['end_time'] = $endTime;
        }
        if ($excludePublishers !== null) {
            $queryParams['exclude_publishers'] = $excludePublishers;
        }
        if ($excludeSubscribers !== null) {
            $queryParams['exclude_subscribers'] = $excludeSubscribers;
        }
        if ($excludeSfus !== null) {
            $queryParams['exclude_sfus'] = $excludeSfus;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryCallStatsMapResponse::class);
    }
    /**
     *
     * @param string $callType
     * @param string $callID
     * @param string $session
     * @param string $user
     * @param string $userSession
     * @param string $since
     * @param string $until
     * @param int $maxPoints
     * @return StreamResponse<GeneratedModels\GetCallSessionParticipantStatsDetailsResponse>
     * @throws StreamException
     */
    public function getCallSessionParticipantStatsDetails(string $callType, string $callID, string $session, string $user, string $userSession, string $since, string $until, int $maxPoints): StreamResponse {
        $path = '/api/v2/video/call_stats/{call_type}/{call_id}/{session}/participant/{user}/{user_session}/details';
        $path = str_replace('{call_type}', (string) $callType, $path);
        $path = str_replace('{call_id}', (string) $callID, $path);
        $path = str_replace('{session}', (string) $session, $path);
        $path = str_replace('{user}', (string) $user, $path);
        $path = str_replace('{user_session}', (string) $userSession, $path);

        $queryParams = [];
        if ($since !== null) {
            $queryParams['since'] = $since;
        }
        if ($until !== null) {
            $queryParams['until'] = $until;
        }
        if ($maxPoints !== null) {
            $queryParams['max_points'] = $maxPoints;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCallSessionParticipantStatsDetailsResponse::class);
    }
    /**
     *
     * @param string $callType
     * @param string $callID
     * @param string $session
     * @param int $limit
     * @param string $prev
     * @param string $next
     * @param array $sort
     * @param object $filterConditions
     * @return StreamResponse<GeneratedModels\QueryCallSessionParticipantStatsResponse>
     * @throws StreamException
     */
    public function queryCallSessionParticipantStats(string $callType, string $callID, string $session, int $limit, string $prev, string $next, array $sort, object $filterConditions): StreamResponse {
        $path = '/api/v2/video/call_stats/{call_type}/{call_id}/{session}/participants';
        $path = str_replace('{call_type}', (string) $callType, $path);
        $path = str_replace('{call_id}', (string) $callID, $path);
        $path = str_replace('{session}', (string) $session, $path);

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($prev !== null) {
            $queryParams['prev'] = $prev;
        }
        if ($next !== null) {
            $queryParams['next'] = $next;
        }
        if ($sort !== null) {
            $queryParams['sort'] = $sort;
        }
        if ($filterConditions !== null) {
            try {
                $queryParams['filter_conditions'] = json_encode($filterConditions, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                throw new StreamException('Failed to encode query parameter "filter_conditions" to JSON: ' . $e->getMessage());
            }
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryCallSessionParticipantStatsResponse::class);
    }
    /**
     *
     * @param string $callType
     * @param string $callID
     * @param string $session
     * @param string $user
     * @param string $userSession
     * @param string $startTime
     * @param string $endTime
     * @param array $severity
     * @return StreamResponse<GeneratedModels\QueryCallSessionParticipantStatsTimelineResponse>
     * @throws StreamException
     */
    public function getCallSessionParticipantStatsTimeline(string $callType, string $callID, string $session, string $user, string $userSession, string $startTime, string $endTime, array $severity): StreamResponse {
        $path = '/api/v2/video/call_stats/{call_type}/{call_id}/{session}/participants/{user}/{user_session}/timeline';
        $path = str_replace('{call_type}', (string) $callType, $path);
        $path = str_replace('{call_id}', (string) $callID, $path);
        $path = str_replace('{session}', (string) $session, $path);
        $path = str_replace('{user}', (string) $user, $path);
        $path = str_replace('{user_session}', (string) $userSession, $path);

        $queryParams = [];
        if ($startTime !== null) {
            $queryParams['start_time'] = $startTime;
        }
        if ($endTime !== null) {
            $queryParams['end_time'] = $endTime;
        }
        if ($severity !== null) {
            $queryParams['severity'] = $severity;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\QueryCallSessionParticipantStatsTimelineResponse::class);
    }
    /**
     * Query calls with filter query
     *
     * @param GeneratedModels\QueryCallsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCallsResponse>
     * @throws StreamException
     */
    public function queryCalls(GeneratedModels\QueryCallsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/calls';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCallsResponse::class);
    }
    /**
     *
     * @return StreamResponse<GeneratedModels\ListCallTypeResponse>
     * @throws StreamException
     */
    public function listCallTypes(): StreamResponse {
        $path = '/api/v2/video/calltypes';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListCallTypeResponse::class);
    }
    /**
     *
     * @param GeneratedModels\CreateCallTypeRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateCallTypeResponse>
     * @throws StreamException
     */
    public function createCallType(GeneratedModels\CreateCallTypeRequest $requestData): StreamResponse {
        $path = '/api/v2/video/calltypes';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateCallTypeResponse::class);
    }
    /**
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteCallType(string $name): StreamResponse {
        $path = '/api/v2/video/calltypes/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     *
     * @param string $name
     * @return StreamResponse<GeneratedModels\GetCallTypeResponse>
     * @throws StreamException
     */
    public function getCallType(string $name): StreamResponse {
        $path = '/api/v2/video/calltypes/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCallTypeResponse::class);
    }
    /**
     *
     * @param string $name
     * @param GeneratedModels\UpdateCallTypeRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateCallTypeResponse>
     * @throws StreamException
     */
    public function updateCallType(string $name, GeneratedModels\UpdateCallTypeRequest $requestData): StreamResponse {
        $path = '/api/v2/video/calltypes/{name}';
        $path = str_replace('{name}', (string) $name, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateCallTypeResponse::class);
    }
    /**
     * Returns the list of all edges available for video calls.
     *
     * @return StreamResponse<GeneratedModels\GetEdgesResponse>
     * @throws StreamException
     */
    public function getEdges(): StreamResponse {
        $path = '/api/v2/video/edges';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetEdgesResponse::class);
    }
    /**
     * Determine authentication requirements for an inbound SIP call before sending a digest challenge
     *
     * @param GeneratedModels\ResolveSipAuthRequest $requestData
     * @return StreamResponse<GeneratedModels\ResolveSipAuthResponse>
     * @throws StreamException
     */
    public function resolveSipAuth(GeneratedModels\ResolveSipAuthRequest $requestData): StreamResponse {
        $path = '/api/v2/video/sip/auth';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ResolveSipAuthResponse::class);
    }
    /**
     * List all SIP Inbound Routing Rules for the application
     *
     * @return StreamResponse<GeneratedModels\ListSIPInboundRoutingRuleResponse>
     * @throws StreamException
     */
    public function listSIPInboundRoutingRule(): StreamResponse {
        $path = '/api/v2/video/sip/inbound_routing_rules';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListSIPInboundRoutingRuleResponse::class);
    }
    /**
     * Create a new SIP Inbound Routing Rule with either direct routing or PIN routing configuration
     *
     * @param GeneratedModels\SIPInboundRoutingRuleRequest $requestData
     * @return StreamResponse<GeneratedModels\SIPInboundRoutingRuleResponse>
     * @throws StreamException
     */
    public function createSIPInboundRoutingRule(GeneratedModels\SIPInboundRoutingRuleRequest $requestData): StreamResponse {
        $path = '/api/v2/video/sip/inbound_routing_rules';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SIPInboundRoutingRuleResponse::class);
    }
    /**
     * Delete a SIP Inbound Routing Rule for the application
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\DeleteSIPInboundRoutingRuleResponse>
     * @throws StreamException
     */
    public function deleteSIPInboundRoutingRule(string $id): StreamResponse {
        $path = '/api/v2/video/sip/inbound_routing_rules/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteSIPInboundRoutingRuleResponse::class);
    }
    /**
     * Update an existing SIP Inbound Routing Rule with new configuration
     *
     * @param string $id
     * @param GeneratedModels\UpdateSIPInboundRoutingRuleRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateSIPInboundRoutingRuleResponse>
     * @throws StreamException
     */
    public function updateSIPInboundRoutingRule(string $id, GeneratedModels\UpdateSIPInboundRoutingRuleRequest $requestData): StreamResponse {
        $path = '/api/v2/video/sip/inbound_routing_rules/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateSIPInboundRoutingRuleResponse::class);
    }
    /**
     * List all SIP trunks for the application
     *
     * @return StreamResponse<GeneratedModels\ListSIPTrunksResponse>
     * @throws StreamException
     */
    public function listSIPTrunks(): StreamResponse {
        $path = '/api/v2/video/sip/inbound_trunks';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListSIPTrunksResponse::class);
    }
    /**
     * Create a new SIP trunk for the application
     *
     * @param GeneratedModels\CreateSIPTrunkRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateSIPTrunkResponse>
     * @throws StreamException
     */
    public function createSIPTrunk(GeneratedModels\CreateSIPTrunkRequest $requestData): StreamResponse {
        $path = '/api/v2/video/sip/inbound_trunks';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateSIPTrunkResponse::class);
    }
    /**
     * Delete a SIP trunk for the application
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\DeleteSIPTrunkResponse>
     * @throws StreamException
     */
    public function deleteSIPTrunk(string $id): StreamResponse {
        $path = '/api/v2/video/sip/inbound_trunks/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteSIPTrunkResponse::class);
    }
    /**
     * Update a SIP trunk for the application
     *
     * @param string $id
     * @param GeneratedModels\UpdateSIPTrunkRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateSIPTrunkResponse>
     * @throws StreamException
     */
    public function updateSIPTrunk(string $id, GeneratedModels\UpdateSIPTrunkRequest $requestData): StreamResponse {
        $path = '/api/v2/video/sip/inbound_trunks/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateSIPTrunkResponse::class);
    }
    /**
     * Resolve SIP inbound routing based on trunk number, caller number, and challenge authentication
     *
     * @param GeneratedModels\ResolveSipInboundRequest $requestData
     * @return StreamResponse<GeneratedModels\ResolveSipInboundResponse>
     * @throws StreamException
     */
    public function resolveSipInbound(GeneratedModels\ResolveSipInboundRequest $requestData): StreamResponse {
        $path = '/api/v2/video/sip/resolve';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ResolveSipInboundResponse::class);
    }
    /**
     *
     * @param GeneratedModels\QueryAggregateCallStatsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryAggregateCallStatsResponse>
     * @throws StreamException
     */
    public function queryAggregateCallStats(GeneratedModels\QueryAggregateCallStatsRequest $requestData): StreamResponse {
        $path = '/api/v2/video/stats';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryAggregateCallStatsResponse::class);
    }
}
