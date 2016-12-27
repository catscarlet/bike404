<?php

namespace Home\Controller;

use Think\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function lost()
    {
        $this->display('report_lost');
    }

    public function clue()
    {
        $this->display('report_clue');
    }

    public function reportSuccess()
    {
        $id = I('id');
        $ReportDataModel = D('ReportData');
        $result = $ReportDataModel->getbyid($id);
        if (!$result) {
            $this->error('您请求的地址有误，3秒后跳转至主页', C('SITE_URL'));
            exit();
        }

        $this->assign('result', $result);
        $this->display('report_success');
    }

    public function postReportLostImage()
    {
        header('Content-Type: text/plain; charset=UTF-8');
        //I('data.file1','','',$_FILES);

        if (!$_FILES['files']['name']) {
            echo 'error';
            exit();
        }

        $files = $_FILES['files'];
        $files = $this->reArrayFiles($files);
        $uploaddir_root = C('POST_TMP');
        $timestamp = date('YmdHis', time()).mt_rand();
        $uploaddir = $uploaddir_root.$timestamp;
        mkdir($uploaddir);
        foreach ($files as $val) {
            move_uploaded_file($val['tmp_name'], $uploaddir.'/'.$val['name']);
        }

        echo $timestamp;

        exit();
    }

    public function postReportLostData()
    {
        $data = $_POST;
        $datacheck = $this->postDataCheck();
        if (!$datacheck) {
            header('HTTP/1.1 400 Bad Request');
            exit();
        }
        $ReportDataModel = D('ReportData');
        $result = $ReportDataModel->saveReportData($data);
        echo $result;
    }

    public function postclue()
    {
    }

    private function reArrayFiles($file)
    {
        $file_ary = array();
        $file_count = count($file['name']);
        $file_key = array_keys($file);

        for ($i = 0;$i < $file_count;++$i) {
            foreach ($file_key as $val) {
                $file_ary[$i][$val] = $file[$val][$i];
            }
        }

        return $file_ary;
    }

    private function postDataCheck($data)
    {
        $invalid = false;
        $keys = array_keys($data);
        $check_keys = array('user','area','brand','color','alerted_police','status','lost_time','info','email','timestamp','img_info_id');
        foreach ($check_keys as $key) {
            if (!in_array($key, $keys)) {
                $invalid = true;
                break;
            }
        }

        return $invalid;
    }
}
