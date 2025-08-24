<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeployChangesCommand extends Command
{
    protected $signature = 'blog:deploy';
    protected $description = 'Upload blog.zip to cPanel and extract using API Token authentication';

    public function handle()
    {
        $username       = env('CPANEL_USER');
        $apiToken       = env('CPANEL_DEPLOY_API');
        $cpanelHost     = env('CPANEL_HOST', 'localhost');
        $destinationDir = '/'; // always root
        $uploadFile     = base_path('blog.zip');

        if (!file_exists($uploadFile)) {
            $this->error("❌ File blog.zip not found at project root!");
            return Command::FAILURE;
        }

        // Step 1: Upload zip file
        if (!$this->uploadArchive($cpanelHost, $username, $apiToken, $destinationDir, $uploadFile)) {
            return Command::FAILURE;
        }
        $this->info("✅ blog.zip uploaded successfully");

        // Step 2: Extract zip file
        if (!$this->extractArchiveApi2($cpanelHost, $username, $apiToken, $destinationDir, 'blog.zip')) {
            return Command::FAILURE;
        }
        $this->info("✅ blog.zip extracted successfully");

        return Command::SUCCESS;
    }

    private function uploadArchive($host, $user, $token, $dir, $filePath)
    {
        $url = "https://{$host}:2083/execute/Fileman/upload_files";

        $cf = function_exists('curl_file_create')
            ? curl_file_create($filePath)
            : '@' . realpath($filePath);

        $payload = [
            'dir'       => $dir,
            'file-1'    => $cf,
            'overwrite' => '1'
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: cpanel {$user}:{$token}"
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $this->error("❌ Upload cURL Error: {$err}");
            return false;
        }

        $json = json_decode($res, true);
        if (empty($json) || empty($json['status'])) {
            $this->error("❌ Upload failed: " . $res);
            return false;
        }

        return true;
    }

    private function extractArchiveApi2($host, $user, $token, $dir, $fileName)
    {
        $url = "https://{$host}:2083/json-api/cpanel";
        $params = [
            'cpanel_jsonapi_user'       => $user,
            'cpanel_jsonapi_apiversion' => '2',
            'cpanel_jsonapi_module'     => 'Fileman',
            'cpanel_jsonapi_func'       => 'fileop',
            'op'                        => 'extract',
            'sourcefiles'               => $dir . $fileName,
            'destfiles'                 => $dir,
            'doubledecode'              => '1',
        ];

        $ch = curl_init("{$url}?" . http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: cpanel {$user}:{$token}"
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $res = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $this->error("❌ Extract cURL Error: {$err}");
            return false;
        }

        $json = json_decode($res, true);
        if (empty($json['cpanelresult']['event']['result'])) {
            $this->error("❌ Extract failed: " . json_encode($json));
            return false;
        }

        return true;
    }
}
