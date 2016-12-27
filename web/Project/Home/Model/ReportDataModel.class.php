<?php

namespace Home\Model;

class ReportDataModel
{
    public function __construct()
    {
    }

    public function saveReportData($data)
    {
        $McryptModel = D('Mcrypt');
        $data['email'] = $McryptModel->encrypt($data['email']);

        $ReportLost = M('report_lost');
        $id = $ReportLost->add($data);

        $MailModel = D('Mail');
        $MailModel->addToPoll($id);

        return $id;
    }

    public function getbyid($id)
    {
        if (!is_numeric($id)) {
            return false;
        }
        $ReportLost = M('report_lost');
        $where = array('id' => $id);
        $result = $ReportLost->where($where)->find();
        if (!$result) {
            return false;
        }
        unset($result['update_time']);

        $McryptModel = D('Mcrypt');
        $result['email'] = $McryptModel->decrypt($result['email']);
        $result['url'] = C('SITE_URL').'report/reportSuccess?id='.$id;

        return $result;
    }
}
