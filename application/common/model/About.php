<?php

namespace app\common\model;

use think\Model;

class About extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function getHonorPicsAttr($v, $data)
    {
        return explode(',', $data['content']);
    }

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


    public function getCultureAttr($v, $data)
    {
        $lang = cookie('think_var');
        $content = $lang && $lang == 'en-us' && !empty($data['en_content']) ? $data['en_content'] : $data['content'];

        $contentArr = explode('|#|', $content);
        if(count($contentArr) == 3)
        {
        	$picture = array_pop($contentArr);
        }

        foreach($contentArr as $k => $value)
        {
            $dataArr = explode('###', $value);
            $row = [];
            foreach($dataArr as $k1 =>  $v)
            {
                $lines = explode(PHP_EOL, $v);
                $lines = array_values(array_filter($lines));
                $row[$k1]['title'] = $lines[0]??'';
                $row[$k1]['contents'] = array_slice($lines, 1);
            }
            $res[$k] = $row;
        }
        $res['picture'] = $picture??'';
        return $res;
    }

    public function setContentAttr($v)
    {
        return str_replace('<p></p>', '', $v);
    }
}
