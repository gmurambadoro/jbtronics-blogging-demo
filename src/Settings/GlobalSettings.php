<?php

namespace App\Settings;

use Jbtronics\SettingsBundle\ParameterTypes\StringType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\ORMStorageAdapter;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

#[Settings(
    name: 'global',
    storageAdapter: ORMStorageAdapter::class,
    dependencyInjectable: true,
)]
class GlobalSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class, name: 'applicationName', label: 'Application Name')]
    #[Length(max: 150)]
    #[NotBlank(message: 'The application name cannot be blank!')]
    public string $applicationName = 'Simple Demo repo';

    #[SettingsParameter(type: StringType::class, name: 'applicationTagline', label: 'Application Tagline')]
    #[Length(max: 255)]
    #[NotBlank(message: 'The tagline cannot be blank!')]
    public string $applicationTagline = 'Simple blogging application to demonstrate usage of jbtronics/settings-bundle';
}