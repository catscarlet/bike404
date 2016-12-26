<?php

namespace Home\Controller;

class MailController
{
    public function test()
    {
        $mail = D('Mail');
        $mail->sendMail();
    }
}
