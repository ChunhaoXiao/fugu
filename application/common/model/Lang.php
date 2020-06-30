<?php
namespace app\common\model;
trait Lang {

	public function getLangNameAttr($v, $data)
    {
    	return $this->getLang('name', $data);
    }

    public function getLangContentAttr($v, $data)
    {
    	return $this->getLang('content', $data);
    }

    public function getLangLocationAttr($v, $data)
    {
    	return $this->getLang('location', $data);
    }

    public function getLangSalaryAttr($v, $data)
    {
        return $this->getLang('salary', $data);
    }

   	protected function getLang($field, $data)
   	{
   		$lang = cookie('think_var');
        if(!empty($lang) && $lang == 'en-us')
        {
            if(!empty($data['en_'.$field]))
            {
                return $data['en_'.$field];
            }
        }
        return $data[$field];
   	}


}