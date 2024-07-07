<?php

namespace App\Filters\V1;



use App\Filters\ApiFilter;

class CustomersFilter extends ApiFilter
{
    protected $safeParms = [
        'name' => ['eq', 'lk'],
        'type' => ['eq', 'lk'],
        'email' => ['eq', 'lk'],
        'address' => ['eq', 'lk'],
        'city' => ['eq', 'lk'],
        'state' => ['eq', 'lk'],
        'postalCode' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code',
    ];

    protected $operatorMap = [
        'lk' => 'like',
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥',
    ];
}
