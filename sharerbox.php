<?php

namespace abdelrahmannourallah\sharerbox;

use yii\base\Component;

/*
 * You can not redistribution  this code without contact Abdelrahman Nourallah
 */

/**
 * Description of sharerbox
 *
 * @author abdelrahman nourallah <info@ip4t.net>
 * AMMAN - Jordan
 */
class Sharerbox extends Component
{

    const PAYMENT_METHOD_paypal = 'paypal';
    const PAYMENT_METHOD_CREADIT_CARD = 'credit_card';
    const PAYMENT_METHOD_PAY_UPON_INVOICE = 'pay_upon_invoice';
    const PAYMENT_METHOD_CARRIER = 'carrier';
    const PAYMENT_METHOD_ALTERNATE_PAYMENT = 'alternate_payment';
    const PAYMENT_METHOD_BANK = 'bank';

    public $url , $title;
 
  
    public function init()
    { 
     $http =  (isset($_SERVER['HTTPS'])  && $_SERVER['HTTPS'] == 'on')  ? 'https://' : 'http://';
     $this->url = $http . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     $this->title = '';
     $this->setConfig();
 
\Yii::$app->view->registerCss("
/**********Sharerbox************************/
.says, .screen-reader-text {clip: rect(1px, 1px, 1px, 1px);position: absolute !important;height: 1px;
    width: 1px; overflow: hidden;
}
.share-links a.facebook-share-btn {
    background: #5d82d1;
}
.share-links a.twitter-share-btn {
    background: #40bff5;
}
.share-links a.linkedin-share-btn {
    background: #238cc8;
}
.share-links a.email-share-btn {
    background: #333333;
} 
.share-links a.whatsapp-share-btn {
    background: #01e675;
} 
.share-links a {
    display: inline-block;margin: 2px;height: 40px;overflow: hidden;
    color: #ffffff;background: #444444;position: relative;
    transition: 0.3s;border-radius: 2px;width: 40px;
}
.share-links a .fa {
    float: right;
}
.share-links a .fa {
    width: 40px;height: 40px;
    float: left;display: block;
    text-align: center;line-height: 40px;
}
.share-links .fa {
    font-size: 15px;
}
.fa, .fa-before::before {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-family: 'FontAwesome' !important;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.share-links a:hover {
    opacity: 0.8;
    color: #fff;
}
/*******SharerBox*********************/"
);

    }

    private function setConfig()
    {
      
    }
 
    public function show($url ='')
    {
         
        if ($url != ''){
            $this->url = $url;
        }        
           ?>
            <div class="post-footer post-footer-on-bottom">
            <div class="share-links  share-centered icons-only">
                  <div class="share-title">
                        <span class="fa fa-share-alt" aria-hidden="true"></span>
                        <span> شاركها</span>
                        </div>
                        <a href="https://www.facebook.com/sharer.php?u=<?=$this->url?>" rel="external noopener" target="_blank" class="facebook-share-btn"><span class="fa fa-facebook"></span> 
                            <span class="screen-reader-text">Facebook</span></a>

                        <a href="https://twitter.com/intent/tweet?text=<?=$this->url?>" rel="external noopener" target="_blank" class="twitter-share-btn"><span class="fa fa-twitter"></span> 
                            <span class="screen-reader-text">Twitter</span></a>

                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$this->url?>" rel="external noopener" target="_blank" class="linkedin-share-btn"><span class="fa fa-linkedin"></span> <span class="screen-reader-text">LinkedIn</span></a>

                        <a href="https://api.whatsapp.com/send?text=<?= $this->title?><?=$this->url?>" rel="external noopener" target="_blank" class="whatsapp-share-btn"><span class="fa fa-whatsapp"></span> <span class="screen-reader-text">WhatsApp</span></a>

                        <a href="mailto:?subject=<?= $this->title?>&amp;body=<?=$this->url?>" rel="external noopener" target="_blank" class="email-share-btn"><span class="fa fa-envelope"></span> <span class="screen-reader-text">مشاركة عبر البريد</span></a><a href="#" rel="external noopener" target="_blank" class="print-share-btn"><span class="fa fa-print"></span> <span class="screen-reader-text">طباعة</span></a>  </div><!-- .share-links /-->
        </div>

           <?php
            
        
    }

    public function setReturnUrl($url)
    {
        $this->returnUrl = $url;
    }
    public function setCancelUrl($url)
    {
        $this->cancelUrl = $url;
    }
    public function setPaymentMethod($value)
    {
        $this->paymentMethod =  strtolower($value);
    }
}
