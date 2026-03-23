<?php

namespace App\DTOs\User;

use App\Models\User;

class UserData
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly string $name = '',
        public readonly string $email = '',
        public readonly ?string $password = null,
        public readonly ?int $roleId = null,
        public readonly array $companyIds = [],
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'] ?? null,
            roleId: $data['role_id'] ?? null,
            companyIds: $data['company_ids'] ?? [],
        );
    }

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            roleId: $user->role_id,
            companyIds: $user->companies->pluck('id')->toArray(),
        );
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->password) {
            $data['password'] = $this->password;
        }

        if ($this->roleId) {
            $data['role_id'] = $this->roleId;
        }

        return $data;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->roleId,
            'company_ids' => $this->companyIds,
        ];
    }
}