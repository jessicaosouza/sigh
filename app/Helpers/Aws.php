<?php

namespace App\Helpers;

use Aws\Credentials\Credentials;
use Exception;
use Aws\S3\S3Client;
use Illuminate\Support\Str;
use Aws\S3\S3MultiRegionClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Aws\S3\Exception\S3Exception as S3Exeption;

class Aws
{

    public static function getS3Client()
    {
        return new S3Client([
            'version' => 'latest',
            'region'  => env('AWS_DEFAULT_REGION')
        ]);
    }

    public static function uploadPictureS3($path, $file)
    {
        try{
            Storage::disk('s3')->put($path, file_get_contents($file));
            return true;
        }
        catch (S3Exeption $e)
        {
            report($e);
            return false;
        }
    }

    public static function uploadFileS3($file, $filename, $bucket)
    {
        $credentials = new Credentials(
            env('AWS_ACCESS_KEY_ID'),
            env('AWS_SECRET_ACCESS_KEY')
        );
        $client = new S3MultiRegionClient([
            'credentials' => $credentials,
            'version' => 'latest',
        ]);
        try {
            $client->putObject(array(
                'Bucket'        => $bucket,
                'Key'           => $filename,
                'SourceFile'    => $file
            ));
            return true;
        } catch (Exception $e) {
            $error = (Object)[];
            $error->message = $e->getMessage();
            $error->line = $e->getLine();
            $error->file = $e->getFile();
            $error->file_name = (string) Str::orderedUuid();
            $error->project = 'sigh';
            $error->request_key = env('AWS_LAMBDA_REQUEST_KEY');
            $error->title = "Erro ao fazer upload de arquivos no S3 ==> uploadFileS3";
            Http::post('https://in5wusn4jncnjtjbpt7vbii5zq0mobte.lambda-url.sa-east-1.on.aws/', $error);
            report($e);
            return false;
        }
    }

    /**
     * @param String file_pah = paath do arquivo no s3
     * @param int expire = minutos para  expirar
     */
    public static function getTemporaryAwsUrl($file_path, $expire=60)
    {
        return Storage::disk('s3')->temporaryUrl($file_path, now()->addMinutes($expire));
    }

    public static function listObjects($bucket, $path, $sample)
    {
        $files = [];
        $s3 = AwsLib::getS3Client();
        $results = $s3->getPaginator('ListObjects', [
            'Bucket' => $bucket,
            'Prefix' => $path
        ]);

        foreach ($results as $result) {
            foreach ($result['Contents'] as $object) {
                $files[]= $object['Key'];
            }
        }
        return $files;
    }
}