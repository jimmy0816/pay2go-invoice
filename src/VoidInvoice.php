<?php

namespace Treerful\Pay2goInvoice;

class VoidInvoice extends Pay2GoInvoice
{
    /*
     * 作廢發票的 class
     */

    // 設定串接的網址
    protected function setUrl()
    {
        if (!$this->debugMode) { // product mode, 串正式網址
            $this->pay2goUrl = config('pay2goinv.Url_Void');
        } else { // debug mode, 串測試網址
            $this->pay2goUrl = config('pay2goinv.Url_Void_Test');
        }
    }

    // 設定預設值，讀取 config
    protected function setDefault()
    {
        $this->postData = [
            'RespondType' => config('pay2goinv.RespondType'),
            'Version' => config('pay2goinv.Version_Void'),
            'TimeStamp' => time(), // 需要為 time() 格式
            'InvoiceNumber' => '',
            'InvalidReason' => ''
        ];
    }
}