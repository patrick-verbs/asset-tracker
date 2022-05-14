<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    /**
     * The name of the asset.
     *
     * @var string
     */
    protected $name;

    /**
     * The date the asset was added to my collection.
     *
     * @var date
     */
    protected $date_added_to_collection;

    /**
     * The license.
     *
     * @var string
     */
    protected $license;

    /**
     * The location of the asset.
     *
     * @var string
     */
    protected $location;

}
