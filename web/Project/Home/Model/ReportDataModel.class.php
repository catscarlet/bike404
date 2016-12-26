<?php

namespace Home\Model;

class ReportDataModel
{
    public function __construct()
    {
    }

    public function saveReportData($data)
    {
        $MailModel = D('Mail');
        $MailModel->sendMail($data);

        $McryptModel = D('Mcrypt');
        $data['email'] = $McryptModel->encrypt($data['email']);

        $ReportLost = M('report_lost');
        $result = $ReportLost->add($data);

        return $result;
    }

    public function getbyid($id)
    {
        if (!is_numeric($id)) {
            return false;
        }
        $ReportLost = M('report_lost');
        $where = array('id' => $id);
        $result = $ReportLost->where($where)->find();
        unset($result['update_time']);

        $McryptModel = D('Mcrypt');
        $result['email'] = $McryptModel->decrypt($result['email']);

        return $result;
    }
}
