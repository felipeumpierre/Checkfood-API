<?php namespace App\Extensions;

use Illuminate\Database\Eloquent\Collection;
use App\Products;

trait ProductsTrait
{
    /**
     * Loop through the Collection and call the productLists function
     *
     * @param Collection $collection
     * @param array $functions
     */
    public function addProductsListsCollection(Collection &$collection, array $functions)
    {
        // loop through the Collection
        foreach ($collection as $key => $product) {
            foreach ($functions as $function) {
                $this->addProductLists($product, $function);
            }
        }
    }

    /**
     * Add the relationship to a Product object
     *
     * @param Products $product
     * @param string $function
     * @return $this
     */
    public function addProductLists(Products &$product, $function)
    {
        $product->{$function}->lists('id', 'name');

        return $this;
    }
}