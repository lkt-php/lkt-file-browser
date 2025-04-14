<?php

namespace Lkt\WebPages\Config\Schemas;

use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeysField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringChoiceField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\WebPages\Enums\FileEntityType;
use Lkt\WebPages\LktFileEntity;

return Schema::table('lkt_file_entities', LktFileEntity::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(LktFileEntity::class)
            ->setNamespaceForGeneratedClass('Lkt\WebPages\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../../Generated')
    )
    ->setItemsPerPage(20)
    ->setCountableField('id')
    ->setFieldsForRelatedMode('id', 'component', [
        'id',
        'component',
        'type',
        'props',
        'config',
        'layout',
        'children',
    ])
    ->addField(IdField::define('id'))
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setDefaultReadFormat('Y-m-d')
            ->setCurrentTimeStampAsDefaultValue()
    )
    ->addField(
        DateTimeField::define('updatedAt', 'updated_at')
            ->setDefaultReadFormat('Y-m-d')
            ->setCurrentTimeStampAsDefaultValue()
    )
    ->addField(StringChoiceField::choice(FileEntityType::Types, 'type'))
    ->addField(StringField::define('src'))
    ->addField(AssocJSONField::define('config'))
    ->addField(
        ForeignKeysField::defineRelation(LktFileEntity::COMPONENT, 'children')
    )
    ;