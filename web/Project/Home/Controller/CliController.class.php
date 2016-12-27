<?php

namespace Home\Controller;

class CliController
{
    public function test()
    {
        $MailAction = A('Mail');
        $MailAction->checkMailPoll();
    }
}
