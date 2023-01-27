<?php

use App\Mail\LoginVerificationCodeMail;
use App\Mail\MailbookMail;
use App\Mail\RegisterVerificationCodeMail;
use Xammie\Mailbook\Facades\Mailbook;

Mailbook::add(MailbookMail::class);

Mailbook::add(LoginVerificationCodeMail::class);
Mailbook::add(RegisterVerificationCodeMail::class);
