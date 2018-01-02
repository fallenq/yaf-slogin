<?php
namespace Modules\SSO\Models\user;

use Extension\DB\BaseModelExtend;
use Extension\DB\ModelExtend;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \EloquentModel
{
    use SoftDeletes, BaseModelExtend, ModelExtend;

//    protected $table = 'sparrow_test';

//    protected $primaryKey = 'id';

//    protected $incrementing = false;

//    const UPDATED_AT = 'updated_at';
//    const DELETED_AT = 'delete_at';

    const COLUMN_FIELDS = ['name', 'password', 'salt'];

}