<?php namespace App\Extensions;

use Illuminate\Database\Eloquent\Collection;
use App\Products;
use Illuminate\Database\Eloquent\Model;

trait ListsTrait
{
    /**
     * Loop through the Collection and call the productLists function
     *
     * @param Collection $collection
     * @param array $functions
     */
    public function addListsCollection(Collection &$collection, array $functions)
    {
        // loop through the Collection
        foreach ($collection as $key => $product) {
            foreach ($functions as $function) {
                $this->addLists($product, $function);
            }
        }
    }

    /**
     * Add the relationship to a Product object
     *
     * @param Model $model
     * @param string $function
     * @return $this
     */
    public function addLists(Model &$model, $function)
    {
        $model->{$function}->lists('id', 'name');

        return $this;
    }
}