<?php

namespace App\Repositories;


use App\Models\Vehicle;
use InfyOm\Generator\Common\BaseRepository;


/**
 * Interface VehicleRepository.
 *
 * @package namespace App\Repositories;
 */
class VehicleRepository extends  BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brand',
        'model',
        'plates'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehicle::class;
    }
}
