<?php

namespace Lkt\FileBrowser;

use Lkt\Factory\Schemas\Schema;
use Lkt\FileBrowser\Generated\GeneratedLktFileEntity;

class LktFileEntity extends GeneratedLktFileEntity
{
    const COMPONENT = 'lkt-file-entity';

    public function read()
    {
        $fields = Schema::get(static::COMPONENT)->getAllFields();
        return $this->readFields($fields);
    }

    public function doCreate(array $data): static
    {
        LktFileEntity::feedInstance($this, $data, 'create');
        return $this->save();
    }

    public function doUpdate(array $data): static
    {
        LktFileEntity::feedInstance($this, $data, 'update');
        return $this->save();
    }
}