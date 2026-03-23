<?php

namespace App\DTOs\Role;

use App\Models\Role;

class RoleData
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly string $name = '',
        public readonly ?string $description = null,
        public readonly ?string $color = null,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            label: $data['description'] ?? null,
            color: $data['color'] ?? null,
        );
    }

    public static function fromModel(Role $role): self
    {
        return new self(
            id: $role->id,
            name: $role->name,
            description: $role->description,
            color: $role->color,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'color' => $this->color,
        ];
    }
}