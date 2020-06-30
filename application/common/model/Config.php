<?php

namespace app\common\model;

use think\Model;

class Config extends Model
{
    public function scopeName($query, $name)
    {
    	$query->where('name', $name);
    }
}
