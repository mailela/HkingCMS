<?php
hg_base::load_model('payment', 'pay', 0);
include $_SERVER["DOCUMENT_ROOT"] . "/common/plugin/wxpay/config.php";

class native
{
    static function getPayImage($para)
    {
        /*

        本页面基于Bootstrap登录模板制作： http://getbootstrap.com/docs/4.0/examples/signin/  。
        此页面用于显示二维码的用户交互界面。
        如果你使用移动设备访问的话，页面会自动跳转到微信支付APP

        ---------------------------------------------------------------------------------------

        此页面需要两个通过GET传递的参数
        参数1：'money' ： 付款总额，单位为分 人民币，数据类型：integer[16]
        参数2：'title' ：这个参数会显示在微信支付的标题里，数据类型：String[32]
        例子：https://xxx.xxx/payjs/?money=1000&title=XXX收款
         */
        require "action.php";
        $config = payment::wxpay_config();
        $GLOBALS['config_mchid'] = $config["app_id"];
        $GLOBALS['config_key'] = $config["app_secret"];
//==============================================================
        /*
         * 参数传入的过滤以及判断
         */
        if (!isset($para["money"]) || !isset($para["title"])) {
            die("缺少参数 | Lack of Parameters");
        }
        if (strlen($para["money"]) > 16 || strlen($para["title"]) > 32) {
            die("字符长度不对 | Incorrect data length");
        }
        if (!is_numeric($para["money"])) {
            die("请在参数 'money' 中输入数字 | Please input numbers in parameter 'money'");
        }

//===============================================================
        /*
         * 创建订单以及创建Session
         * 注意，本软件会用到两个Session变量：
         *  $_SESSION['payjs_payment_info']
            $_SESSION['payjs_paid']
         * 其中：
         * payjs_payment_info 是用于存放账单信息的对象，具体请看API文档：https://payjs.cn/help/api-lie-biao/sao-ma-zhi-fu.html
         * payjs_paid 是用于存放此账单是否付款的信息，boolearn数据类型。True代表已支付，False代表未支付
         */
        require $_SERVER["DOCUMENT_ROOT"] . "/common/plugin/wxpay/corn/payment.php";
        $info = create_payment_return_info($para["title"], (int)$para["money"]);
        if ($info == null) {
            die("Error | 错误");
        } else {
            session_start();
            after_payment_created($info->payjs_order_id, $info->out_trade_no, $info->total_fee, $info->code_url);
            $_SESSION['payjs_payment_info'] = $info;
            if ($use_asynchronous_payment_check) {
                create_payment_paid_index($info->payjs_order_id);
            } else {
                $_SESSION['payjs_paid'] = false;
            }
        }

        return $_SESSION['payjs_payment_info']->qrcode;
    }
}

?>