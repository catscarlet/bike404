<?php

namespace Home\Controller;

use Think\Controller;

class MailController extends Controller
{
    public function checkMailPoll()
    {
        $MailModel = D('Mail');

        $result = $MailModel->checkMailPoll();

        if (count($result) == 0) {
            exit();
        }

        foreach ($result as $value) {
            $rst = $this->mailSender($value['report_id']);
            if ($rst) {
                $MailModel->updateMailPoll($value['id'], 1);
            } else {
                $MailModel->updateMailPoll($value['id'], 2);
            }
        }
    }

    public function mailSender($report_id)
    {
        if (!$report_id) {
            return false;
        }
        $ReportDataModel = D('ReportData');
        $result = $ReportDataModel->getbyid($report_id);

        $user = $result['user'];
        $sendTo = $result['email'];

        $this->assign('result', $result);
        $body = $this->fetch(T('Public/lost_information'));

        $MailModel = D('Mail');
        $MailModel->sendMail($user, $sendTo, $body);

        return true;
    }
}
