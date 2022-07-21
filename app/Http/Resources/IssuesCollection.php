<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IssuesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [
        //     'id' => $this->id,
        //     'dept_id' => $this->dept_id,
        //     'issue_details' => $this->issue_details,
        //     'priority' => $this->priority

        // ];
    }
}
