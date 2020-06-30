<?php

namespace app\common\model;

use think\Model;

class HrRule extends Model
{
    public function getLangConAttr($v, $data)
    {
        $lang = cookie('think_var');
        
        if(!empty($lang) && $lang == 'en-us')
        {
            if(!empty($data['en_content']))
            {
                return $data['en_content'];
            }
        }
        return $data['content'];
    }
}
