<?php

namespace App\Http\Controllers;

//引入邮件类
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController
{
    public function sendMessage($title, $message) {
        $mail = new PHPMailer(true);
        try {
            /*
             * 【一】服务器配置
             */
            $mail->CharSet ="UTF-8";                                         //设定邮件编码
            $mail->SMTPDebug = 0;                                            //调试模式输出：0 不输出，2 输出
            $mail->isSMTP();                                                 //使用SMTP
            $mail->Host = 'smtp.qq.com';                                     // SMTP服务器：以QQ为例
            $mail->SMTPAuth = true;                                          // 允许 SMTP 认证
            $mail->Username = "1352476070@qq.com";                     // SMTP用户名: 即发送方的邮箱
            $mail->Password = "exmvjsbbuxfihhaj";               // SMTP授权码: 即发送方的邮箱授权码
            $mail->SMTPSecure = 'ssl';                                       // 允许 TLS 或者ssl协议
            $mail->Port = 465;                                               // 服务器端口： 25 或者465 或者587 具体要看邮箱服务器支持

            /*
             * 【二】收件人
             */
            $mail->setFrom("1352476070@qq.com", "张杰");              //发件人：邮箱与用户名
            $mail->addAddress("826494556@qq.com", '周星星');     //收件人1：可添加多个收件人
            //$mail->addAddress("收件人2的邮箱", '收件人2的用户名');                  //收件人2：可添加多个收件人

            //$mail->addReplyTo('xxxx@163.com', 'info');                          //回复的时候回复给哪个邮箱 建议和发件人一致
            //$mail->addCC('cc@example.com');                                     //抄送人
            //$mail->addBCC('bcc@example.com');                                   //密送人

            /*
             * 【三】发送附件
             */
            //$mail->addAttachment('王庆国.mp4');           // 添加附件
            //$mail->addAttachment('fzs.png', 'haha.png');     // 发送附件并且重命名

            /*
             * 【四】发送内容
             */
            $mail->isHTML(true);    //是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = $title;   //邮件标题
            $mail->Body    = '<b><span style="font-size: 20px;color:red;">' . $message . '</span></b>';      //邮件内容
            $mail->AltBody = $message;      //邮件内容：如果邮件客户端不支持HTML则显示此内容

            /*
             * 【五】发送请求
             */
            $mail->send();
            return ['msg' => 'send mail success'];
        } catch (Exception $e) {
            return ['msg' => 'send mail failed：'.$mail->ErrorInfo];
        }
    }
    /**
     * 发送邮件
     * @return array
     */
    public function send(){
        $this->sendMessage("鸟人接受", "送你一份大礼 哦");
    }
}
