<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>爱特文件管理器安装脚本</title>
  </head>
  <body>
    <h3>爱特文件管理器安装脚本</h3>
    <?php if(!isset($_GET['install'])){ ?>
    <p>
      本工具用于快捷安装爱特文件管理器，而不用把程序解压并一个个文件通过FTP上传，节约你的时间。<br/>
      <a href="<?=$_SERVER['PHP_SELF']?>?install"/>点击这里开始自动安装</a>
    </p>
    <?php }else{
      if(ini_get('allow_url_fopen') && class_exists('ZipArchive')){
        if($file = file_get_contents('http://aite.me/fileadmin.zip')){
          echo '<p>下载程序成功</p>';
        }else{
          echo '<p>下载程序失败</p>';
          exit;
        }
        if(file_put_contents('fileadmin.zip', $file)){
          echo '<p>保存程序成功</p>';
        }else{
          echo '<p>保存程序失败！<br/>可能脚本没有写入权限。</p>';
          exit;
        }
        $zip = new ZipArchive;
        if($zip->open('./fileadmin.zip') && $zip->extractTo('./')){
          echo '<p>程序解压成功</p>';
        }else{
          echo '<p>程序解压失败</p>';
          exit;
        }
        echo '<p><a href="./fileadmin">点击这里开始安装程序</a><hr/><pre>'.file_get_contents('./readme.txt').'</pre></p>';
      }else{ ?>
    <p>
      由于功能问题，该脚本无法在您的空间运行。<br/>
      错误：无法打开远程文件或<b>ZipArchive</b>类不存在！
    </p>
    <?php }} ?>
  </body>
</html>
<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
