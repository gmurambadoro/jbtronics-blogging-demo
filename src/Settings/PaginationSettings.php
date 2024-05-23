<?php

namespace App\Settings;

use Jbtronics\SettingsBundle\ParameterTypes\IntType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;
use Symfony\Component\Validator\Constraints\Range;

#[Settings(
    name: 'pagination',
    storageAdapter: PHPFileStorageAdapter::class,
    storageAdapterOptions: [
        'filename' => 'pagination.php',
    ],
    dependencyInjectable: true,
)]
class PaginationSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: IntType::class, name: 'postsPerPage', label: 'Number of posts per page')]
    #[Range(notInRangeMessage: 'The posts per page must be greater than 0 and cannot exceed 15.', min: 1, max: 15)]
    public int $postsPerPage = 10;
}