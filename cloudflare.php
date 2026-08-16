<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$bucket_name = "portfolio";
// Provide your Cloudflare account ID
$account_id = $_ENV['CLOUDFLARE_ACCOUNT_ID'];
// Retrieve your S3 API credentials for your R2 bucket via API tokens
$access_key_id = $_ENV['CLOUDFLARE_ACCESS_KEY_ID'];
$access_key_secret = $_ENV['CLOUDFLARE_SECRET_ACCESS_KEY'];

$credentials = new Aws\Credentials\Credentials($access_key_id, $access_key_secret);

$options = [
    'region' => 'auto', // Required by SDK but not used by R2
    'endpoint' => "https://$account_id.r2.cloudflarestorage.com",
    'version' => 'latest',
    'credentials' => $credentials
];

$s3_client = new Aws\S3\S3Client($options);

$contents = $s3_client->listObjectsV2([
    'Bucket' => $bucket_name
]);
