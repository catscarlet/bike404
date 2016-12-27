<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $ListModel = D('List');
        $list = $ListModel->getall();
        foreach ($list as $key => &$value) {
            $this->unixtimestampToHumanreadable($value);
        }

        $this->assign('result', $list);

        $this->display();
    }

    public function getbyid()
    {
        $ListModel = D('List');
        $id = I('get.id');
        if (!is_numeric($id)) {
            $this->returnFailure('Parameter error, !is_integer($id)', 1);
        }

        $result = $ListModel->getbyid($id);
        if (!$result) {
            $this->returnFailure('Query Failed', 1);
        }

        if ($result['image']) {
            $imgUrlList = $this->generateImgUrl($result);
        }

        $this->unixtimestampToHumanreadable($result);
        $result['url'] = C('SITE_URL').'index/getbyid?id='.$id;

        $this->assign('result', $result);
        $this->assign('imgUrlList', $imgUrlList);

        $this->display('get');
    }

    private function generateImgUrl($result)
    {
        $Generator = D('Generator');
        $imgUrlList = $Generator->generateImgUrl($result);

        return $imgUrlList;
    }

    private function unixtimestampToHumanreadable(&$value)
    {
        $data_format = 'Y年n月d日';
        $value['lost_time'] = date($data_format, $value['lost_time']);
        $value['create_time'] = date($data_format, $value['create_time']);
        $value['update_time'] = date($data_format, $value['update_time']);

        return;
    }
}
