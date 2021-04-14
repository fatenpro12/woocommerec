<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'=>$this->title,
            'decription'=>$this->decription,
            'options'=>$this->options,
            'discount'=>$this->discount,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'address'=>$this->address->city->name.'-'.$this->address->post_code.'-'.$this->address->street.'-'.$this->address->house_number,
            'unit'=>$this->unit->name,
            'category'=>$this->category->name
        ];
    }
}
