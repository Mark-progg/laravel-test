<?php

namespace App\DTOs;

class CompanyData
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly string $name = '',
        public readonly string $inn = '',
        public readonly ?array $userIds = [],
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            inn: $data['inn'],
            userIds: $data['user_ids'] ?? [],
        );
    }

    public static function fromModel(Company $company): self
    {
        return new self(
            id: $company->id,
            name: $company->name,
            inn: $company->inn,
            userIds: $company->users->pluck('id')->toArray(),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'inn' => $this->inn,
        ];
    }

    public function toJson(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'inn' => $this->inn,
            'user_ids' => $this->userIds,
        ];
    }
}