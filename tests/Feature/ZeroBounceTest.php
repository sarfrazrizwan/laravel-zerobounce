<?php

use Sarfrazrizwan\LaravelZerobounce\Facades\ZeroBounce;
use ZeroBounce\SDK\ZBValidateResponse;
use ZeroBounce\SDK\ZBBatchValidateResponse;
use ZeroBounce\SDK\ZBGetCreditsResponse;
use ZeroBounce\SDK\ZBApiUsageResponse;
use ZeroBounce\SDK\ZBActivityResponse;
use ZeroBounce\SDK\ZBSendFileResponse;
use ZeroBounce\SDK\ZBFileStatusResponse;
use ZeroBounce\SDK\ZBGetFileResponse;
use ZeroBounce\SDK\ZBDeleteFileResponse;
use ZeroBounce\SDK\ZBGuessFormatResponse;


$fileId = "";

it('can validate an email', function () {
    $response = ZeroBounce::validate('test@example.com');
    expect($response)->toBeInstanceOf(ZBValidateResponse::class);
});

it('can validate a batch of emails', function () {
    $emails = ['test1@example.com', 'test2@example.com'];
    $response = ZeroBounce::validateBatch($emails);
    expect($response)->toBeInstanceOf(ZBBatchValidateResponse::class);
});

it('can get credits', function () {
    $response = ZeroBounce::getCredits();
    expect($response)->toBeInstanceOf(ZBGetCreditsResponse::class);
});

it('can get API usage', function () {
    $startDate = new DateTime('2023-01-01');
    $endDate = new DateTime('2023-12-31');
    $response = ZeroBounce::getApiUsage($startDate, $endDate);
    expect($response)->toBeInstanceOf(ZBApiUsageResponse::class);
});

it('can get email activity', function () {
    $response = ZeroBounce::getActivity('test@example.com');
    expect($response)->toBeInstanceOf(ZBActivityResponse::class);
});

it('can send a file for validation', function () use(&$fileId) {
    $response = ZeroBounce::sendFile(__DIR__ . '/email_file.csv', 1);
    $fileId = $response->fileId;

    expect($response)->toBeInstanceOf(ZBSendFileResponse::class);
});

it('can check file status', function () use(&$fileId) {
    $response = ZeroBounce::fileStatus($fileId);
    expect($response)->toBeInstanceOf(ZBFileStatusResponse::class);
});

it('can get validation results file', function () use(&$fileId) {
    $response = ZeroBounce::getFile($fileId, 'email_file.csv');
    expect($response)->toBeInstanceOf(ZBGetFileResponse::class);
});

it('can delete a file', function () use(&$fileId) {
    $response = ZeroBounce::deleteFile($fileId);
    expect($response)->toBeInstanceOf(ZBDeleteFileResponse::class);
});

it('can guess email format', function () {
    $response = ZeroBounce::guessFormat('example.com', 'John', 'A', 'Doe');
    expect($response)->toBeInstanceOf(ZBGuessFormatResponse::class);
});
