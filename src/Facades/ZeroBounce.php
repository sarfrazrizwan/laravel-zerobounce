<?php

namespace Sarfrazrizwan\LaravelZerobounce\Facades;

use Illuminate\Support\Facades\Facade;
use ZeroBounce\SDK\{
    ZBActivityResponse,
    ZBApiUsageResponse,
    ZBBatchValidateResponse,
    ZBDeleteFileResponse,
    ZBFileStatusResponse,
    ZBGetCreditsResponse,
    ZBGetFileResponse,
    ZBGuessFormatResponse,
    ZBSendFileResponse,
    ZBValidateResponse
};

/**
 * @method static void initialize(string $apiKey)
 * @method static ZBValidateResponse validate(string $email, string|null $ipAddress = null)
 * @method static ZBBatchValidateResponse validateBatch(array $emails)
 * @method static ZBGetCreditsResponse getCredits()
 * @method static ZBApiUsageResponse getApiUsage(\DateTime $startDate, \DateTime $endDate)
 * @method static ZBActivityResponse getActivity(string $email)
 * @method static ZBSendFileResponse sendFile(string $filepath, int $emailAddressColumn, string|null $returnUrl = null, int|null $firstNameColumn = null, int|null $lastNameColumn = null, int|null $genderColumn = null, int|null $ipAddressColumn = null, bool|null $hasHeaderRow = null)
 * @method static ZBSendFileResponse scoringSendFile(string $filepath, int $emailAddressColumn, string|null $returnUrl = null, bool|null $hasHeaderRow = null)
 * @method static ZBFileStatusResponse fileStatus(string $fileId)
 * @method static ZBFileStatusResponse scoringFileStatus(string $fileId)
 * @method static ZBGetFileResponse getFile(string $fileId, string $downloadPath)
 * @method static ZBGetFileResponse scoringGetFile(string $fileId, string $downloadPath)
 * @method static ZBDeleteFileResponse deleteFile(string $fileId)
 * @method static ZBDeleteFileResponse scoringDeleteFile(string $fileId)
 * @method static ZBGuessFormatResponse guessFormat(string $domain, string $firstName, string $middleName, string $lastName)
 */

class ZeroBounce extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zerobounce';
    }
}