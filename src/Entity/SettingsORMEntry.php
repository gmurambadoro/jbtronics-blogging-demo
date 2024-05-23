<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Jbtronics\SettingsBundle\Entity\AbstractSettingsORMEntry;

#[ORM\Entity]
#[ORM\Table(name: 'settings')]
class SettingsORMEntry extends AbstractSettingsORMEntry
{
    // The entity must extend the AbstractSettingsORMEntry class and must just define an ID field.
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: Types::INTEGER)]
    private int $id;
}