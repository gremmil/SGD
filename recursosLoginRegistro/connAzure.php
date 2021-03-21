<?php
    require_once "../vendor/autoload.php";
    
    use MicrosoftAzure\Storage\Common\ServiceException;
    use MicrosoftAzure\Storage\Blob\BlobRestProxy;
    use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;

    /*use MicrosoftAzure\Storage\Blob\BlobSharedAccessSignatureHelper;
    use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

    use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
    use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
    use MicrosoftAzure\Storage\Blob\Models\DeleteBlobOptions;
    use MicrosoftAzure\Storage\Blob\Models\CreateBlobOptions;
    use MicrosoftAzure\Storage\Blob\Models\GetBlobOptions;
    use MicrosoftAzure\Storage\Blob\Models\ContainerACL;
    use MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesOptions;
    use MicrosoftAzure\Storage\Blob\Models\ListPageBlobRangesOptions;
    use MicrosoftAzure\Storage\Common\Exceptions\InvalidArgumentTypeException;
    use MicrosoftAzure\Storage\Common\Internal\Resources;
    use MicrosoftAzure\Storage\Common\Internal\StorageServiceSettings;
    use MicrosoftAzure\Storage\Common\Models\Range;
    use MicrosoftAzure\Storage\Common\Models\Logging;
    use MicrosoftAzure\Storage\Common\Models\Metrics;
    use MicrosoftAzure\Storage\Common\Models\RetentionPolicy;
    use MicrosoftAzure\Storage\Common\Models\ServiceProperties;*/
    
    //$accountName = "pryblobintegrador";
    //$accountKey = "epfdYB4IS6VtPgYrINoAzqcTdEq4OdLn+cNGBHr+EWqyehLQ/Z5GSLz3NUT/DPfNNKqO9aHVEsEh4m1VD+sWRQ==";

    $accountName = "sgdstorageutp";
    $accountKey = "qMQF39POHctnP6WGuHCw0gUhgMz91BGN1JMzoTTfld/PEzi2NZLSFS0FfW2RJw5f0eEXj0bU/eUZs8QDH5QHKw==";

    //$connectionString = "BlobEndpoint=$accBlobEndPoint;SharedAccessSignature=$sasToken";
    $connectionString = "DefaultEndpointsProtocol=https;AccountName=$accountName;AccountKey=$accountKey;EndpointSuffix=core.windows.net";

    $blobClient = BlobRestProxy::createBlobService($connectionString);

    $myContainer = "sgdcontainer";

// To upload a file as a blob, use the BlobRestProxy->createBlockBlob method. This operation will
// create the blob if it doesn't exist, or overwrite it if it does. The code example below assumes
// that the container has already been created and uses fopen to open the file as a stream.
    $responseUploadBlob= uploadBlobSample($blobClient, $urlImageBlob, $nameImageBlob);

// To download blob into a file, use the BlobRestProxy->getBlob method. The example below assumes
// the blob to download has been already created.
    //downloadBlobSample($blobClient);

//Generate a blob download link with a generated service level SAS token
    //generateBlobDownloadLinkWithSAS();

// To list the blobs in a container, use the BlobRestProxy->listBlobs method with a foreach loop to loop
// through the result. The following code outputs the name and URI of each blob in a container.
    $responseListBlob= listBlobsSample($blobClient, $nameImageBlob);

    function uploadBlobSample($blobClient, $urlImg, $nameImg)
{
    /*if (!file_exists("myfile.txt")) {
        $file = fopen("myfile.txt", 'w');
        fwrite($file, 'Hello World!');
        fclose($file);
    }*/

    $content = fopen($urlImg, "r");
    $blob_name = $nameImg;

    /*$content2 = "string content";
    $blob_name2 = "myblob2";*/

    try {
        //Upload blob
        global $myContainer;
        $blobClient->createBlockBlob($myContainer, $blob_name, $content);
        //$blobClient->createBlockBlob($myContainer, $blob_name2, $content2);
    } catch (ServiceException $e) {
        $code = $e->getCode();
        $error_message = $e->getMessage();
        $errorPrint = $code.": ".$error_message.PHP_EOL;
    
        return $errorPrint;
    }
}
function listBlobsSample($blobClient, $nameImg)
{
    try {
        // List blobs.
        $listBlobsOptions = new ListBlobsOptions();
        $listBlobsOptions->setPrefix($nameImg);

        // Setting max result to 1 is just to demonstrate the continuation token.
        // It is not the recommended value in a product environment.
        $listBlobsOptions->setMaxResults(1);

        do {
            global $myContainer;
            $blob_list = $blobClient->listBlobs($myContainer, $listBlobsOptions);
            foreach ($blob_list->getBlobs() as $blob) {
                //echo $blob->getName().": ".$blob->getUrl().PHP_EOL;
                $urlBlob = $blob->getUrl();
                return $urlBlob;
            }

            $listBlobsOptions->setContinuationToken($blob_list->getContinuationToken());
        } while ($blob_list->getContinuationToken());

        $response=$urlBlob;
        return $response;

    } catch (ServiceException $e) {
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message.PHP_EOL;
    }
}