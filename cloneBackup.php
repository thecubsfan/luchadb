<?php

require('dbconnect.php');

// GitHub credentials
$username = 'thecubsfan';
$repository = 'luchadb';
$token = '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';


// Local directory to clone or pull into
$localDirectory = "$baseDirectory"."admin/archive/luchadb";

// GitHub repository URL with token authentication
$repositoryUrl = 'https://' . $username . ':' . $token . '@github.com/' . $username . '/' . $repository . '.git';

// Check if the local directory already exists
if (is_dir($localDirectory . '/.git')) {
    // If it's already a Git repository, pull the latest changes
    chdir($localDirectory);
    exec('git pull 2>&1', $output, $returnVar);
    if ($returnVar === 0) {
        echo "Successfully pulled latest changes into: $localDirectory\n";
    } else {
        echo "Error pulling changes: " . implode("\n", $output) . "\n";
    }
} else {
    // If the directory is not a Git repository, clone the repository
    exec('git clone ' . $repositoryUrl . ' ' . $localDirectory . ' 2>&1', $output, $returnVar);
    if ($returnVar === 0) {
        echo "Successfully cloned repository into: $localDirectory\n";
    } else {
        echo "Error cloning repository: " . implode("\n", $output) . "\n";
    }
}

?>