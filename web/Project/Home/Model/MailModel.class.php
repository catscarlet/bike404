<?php

namespace Home\Model;

class MailModel extends PhpmailerModel
{
    public function __construct()
    {
        $this->isSMTP();
        //$this->SMTPDebug = 3;
        $this->Host = '';
        $this->SMTPAuth = true;
        $this->Username = '';
        $this->Password = '';
        $this->SMTPSecure = 'tls';
        $this->Port = 587;
        $this->isHTML(true);
        $this->CharSet = 'UTF-8';
        //$this->addReplyTo('', 'Information');
        $this->setFrom('', 'Bike404');
        //$this->addBCC('');
    }

    public function sendMail($user, $sendTo, $body)
    {
        $this->clearAddresses();
        $this->addAddress($sendTo, $user);
        $this->Subject = '=?UTF-8?B?'.base64_encode('Bike404: 提交的提醒已记录在数据库').'?=';
        $this->Body = $body;

        $rst = $this->send();

        return $rst;
    }

    public function addToPoll($report_id)
    {
        $MailPool = M('mailpool');
        $data = array('report_id' => $report_id);
        $id = $MailPool->add($data);

        return $id;
    }

    public function checkMailPoll()
    {
        $MailPool = M('mailpool');
        $where = array('status' => 0);
        $field = array('id','report_id');

        $result = $MailPool->where($where)->field($field)->select();

        return $result;
    }

    public function updateMailPoll($id, $status)
    {
        $MailPool = M('mailpool');
        $where = array('id' => $id);

        $save = array('status' => $status);

        $result = $MailPool->where($where)->save($save);

        return $result;
    }
}
