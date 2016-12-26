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
        $this->addReplyTo('', 'Information');
        $this->setFrom('', 'Bike404');
        $this->addBCC('');
    }

    public function sendMail($data)
    {
        $user = $data['user'];
        $sendTo = $data['email'];
        $body = getEmailContent($data);

        $this->addAddress($sendTo, $user);     // Add a recipient

        $this->isHTML(true);                             // Set email format to HTML

        $this->Subject = 'Bike404: 提交的提醒已记录在数据库';

        $this->Body = $body;
        //$this->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $rst = $this->send();

        return $rst;
    }

    private function getEmailContent($data)
    {
        $site_url = C('SITE_URL');
        $empty = '_';
        $area = $data['area'];
        $brand = $data['brand'];
        $color = $data['color'];
        $type = $data['type'];
        $alerted_police = $data['alerted_police'];
        $status = $data['status'];
        $lost_time = $data['lost_time'];
        $info = $data['info'];

        $template = '<p>您好：'.$empty.'</p>
        <p>您提交的信息已经记录到 Bike404 数据库。数据将很快进行人工审核。审核通过后您提交的信息将可在 Bike404 上查询。</p>
        <p>您提交的信息如下：</p>
        <ul>
            <li>地区：'.$area.'</li>
            <li>品牌：'.$brand.'</li>
            <li>颜色：'.$color.'</li>
            <li>车型：'.$type.'</li>
            <li>报警状态：'.$alerted_police.'</li>
            <li>找回状态：'.$status.'</li>
            <li>丢失时间：'.$lost_time.'</li>
            <li>其他信息：'.$info.'</li>
            <!--<li>图片信息：'.$empty.'</li>-->
        </ul>
        <p>感谢您使用
            <a href="'.$site_url.'" target="_blank">Bike404</a>
        </p>
';

        return $template;
    }
}
