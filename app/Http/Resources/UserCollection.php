<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public $preserveKeys = true;

    // public function toArray(Request $request): array
    // {
    //     return [
    //         'data' => $this->collection,
    //         'links' => [
    //             'self' => 'link-value',
    //         ],
    //     ];
    // }

    /**
 * Customize the pagination information for the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  array $paginated
 * @param  array $default
 * @return array
 */
public function paginationInformation($request, $paginated, $default)
{
    $default['links']['custom'] = 'https://example.com';

    return $default;
}

    public function toArray(Request $request): array
    {
        return ['data' => $this->collection];
    }
}
