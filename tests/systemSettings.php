<?php require_once __DIR__ . '/../vendor/autoload.php';

use Itau\Models\Settings;

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    //ambiente
    $settings = new Settings();
    $settings->sandBox = false;

    $settings->clientId = $_ENV['CLIENT_ID'];
    $settings->clientSecret = $_ENV['CLIENT_SECRET'];
    $settings->correlationID = '1';

    //certificado digital
    $settings->certificate->folder = $_ENV['FOLDER'];
    $settings->certificate->certFile = $_ENV['CERTIFICATE_NAME'];
    $settings->certificate->privateKey = $_ENV['PRIVATE_NAME'];

} catch (\Exception $e) {
    dd($e);
}
