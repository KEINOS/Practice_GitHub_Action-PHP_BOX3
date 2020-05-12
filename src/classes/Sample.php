<?php
namespace KEINOS\Sample;

use \KEINOS\HelloWorld\Hello;

class Sample
{
    public function saySomethingTo(string $somebody): string
    {
        $hello = new Hello();
        $msg = $hello->to($somebody);

        return addHowAreYou($msg);
    }
}
