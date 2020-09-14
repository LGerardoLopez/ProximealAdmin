<?php

namespace App\Repositories;

use App\Models\ModelHasRole;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModelHasRoleRepository
*/
class ModelHasRoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'model_type',
        'model_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ModelHasRole::class;
    }
}
