 app/Notifications/ResetPassword.php
  ```
     public function toMail($notifiable)
     {
         return (new MailMessage)
             ->subject('重置密码')
             ->line('这是一封密码重置邮件，如果是您本人操作，请点击以下按钮继续：')
             ->action('重置密码', url(route('password.reset', $this->token, false)))
             ->line('如果您并没有执行此操作，您可以选择忽略此邮件。');
     } 
  ```
  这里面的 route('password.reset', $this->token, false) , 本书中第一回出现生成相对路径的情况(默认为true,生成绝对路径). 不知道这里为什么要生成相对路径, 生成绝对不可以吗? 是不是因为 mail 的缘故, 如下,mail 类的 action 方法里也没见到有说要相对链接什么的
  
  
  ```

   /**
     * Configure the "call to action" button.
     *
     * @param  string  $text
     * @param  string  $url
     * @return $this
     */
    public function action($text, $url)
    {
        $this->actionText = $text;
        $this->actionUrl = $url;

        return $this;
    }

```