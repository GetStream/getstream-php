<?php declare(strict_types=1);

namespace GetStream;

use GetStream\Generated\FeedsTrait;

class FeedsV3Client extends Client
{
    //    function __construct(Client $client){
    //        parent::__construct($client);
    //    }
    use FeedsTrait;
}
