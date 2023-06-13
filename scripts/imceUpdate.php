<?php

use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Site\Settings;
use Symfony\Component\DependencyInjection\ContainerInterface;

$fileSystem = \Drupal::service('file_system');
// $fileSystem = $container->get('file_system');

$source_directory = 'public://LucasFolder/';
$destination_directory = 'public://lucas-folder/';
$files = $fileSystem->scanDirectory($source_directory, '/.*/');

foreach ($files as $file) {
  $new_uri = str_replace($source_directory, $destination_directory, $file->uri);
  $fileSystem->move($file->uri, $new_uri, FileSystemInterface::EXISTS_RENAME);
}
