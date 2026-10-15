<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

/**
 * Marker for request models whose body is sent as multipart/form-data.
 *
 * The generator adds it to the body model of every multipart operation
 * (GetStream/chat#17967). Client::makeRequest still picks the multipart
 * encoding from its own list of upload types; switching it to this marker is
 * the follow-up CHA-5084 SDK change.
 */
interface MultipartRequest
{
}
