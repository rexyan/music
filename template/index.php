<?php
/**
 *
 * 音乐搜索器 - 模版文件
 *
 * @author  MaiCong <i@maicong.me>
 * @link    https://github.com/maicong/music
 * @since   1.5.10
 *
 */

if (!defined('MC_CORE')) {
    header("Location: /");
    exit();
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>全站式音乐搜索 - 音乐搜索解决方案</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="author" content="maicong.me">
    <meta name="keywords" content="OurHome,OurHome音乐搜索,王力宏,全站式音乐搜索">
    <meta name="description" content="OurHome音乐搜索解决方案，可搜索试听网易云音乐、QQ音乐、酷狗音乐、酷我音乐、虾米音乐、百度音乐、一听音乐、咪咕音乐、荔枝FM、蜻蜓FM、喜马拉雅FM、全民K歌、5sing原创翻唱音乐。">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="音乐搜索器">
    <meta name="application-name" content="音乐搜索器">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="static/img/apple-touch-icon.png">
    <link rel="canonical" href="http://music.2333.me/">
    <link rel="stylesheet" href="//cdn.staticfile.org/amazeui/2.3.0/css/amazeui.min.css">
    <link rel="stylesheet" href="static/css/style.css?v<?php echo MC_VERSION; ?>">
</head>
<body>
    <!--[if lte IE 9]>
        <script type="text/javascript">
            (function(){
                var t = '你的浏览器也太挫了吧！大佬换一个噻！';
                document.body.innerHTML = t;
                document.body.style.fontSize = '66px';
                document.body.style.textAlign = 'center';
                document.body.style.background = '#000';
                document.body.style.color = '#fff';
                if (prompt('输入代号 666666 销毁此电脑: ', '') === '666666') {
                    alert('拜拜了您呢~')
                } else {
                    alert('总感觉哪里不对');
                }
                window.open('', '_self', '');
                window.close();
            })();
        </script>
    <![endif]-->
    <section class="am-g about">
        <div class="am-container am-margin-vertical-xl">
            <header class="am-padding-vertical">
                <h2 class="about-title about-color"><a href="./" style="cursor: pointer;">全站式音乐搜索</a></h2>
                <p class="am-text-center">音乐搜索解决方案</p>
            </header>
            <hr>
            <div class="am-u-lg-12 am-padding-vertical">
                <form id="j-validator" class="am-form am-margin-bottom-lg" method="post">
                    <div class="am-u-md-12 am-u-sm-centered">
                        <ul id="j-nav" class="am-nav am-nav-pills am-nav-justify  am-margin-bottom music-tabs">
                            <li class="am-active" data-filter="name">
                                <a>名称</a>
                            </li>
                            <li data-filter="id">
                                <a> ID</a>
                            </li>
                            <li data-filter="url">
                                <a>地址</a>
                            </li>
                        </ul>
                        <div class="am-form-group">
                            <input id="j-input" data-filter="name" class="am-form-field am-input-lg am-text-left am-radius" placeholder="例如: 王力宏 千秋万代" data-am-loading="{loadingText: ' '}" pattern="^.+$" required>
                            <div class="am-alert am-alert-danger am-animation-shake"></div>
                        </div>
                        <div id="j-type" class="am-form-group am-text-center music-type">
                            <select name="music_type" id="music_type">
                                <?php foreach ($music_type_list as $key => $val) { ?>
                                    <option value="<?php echo $key; ?>" data-am-ucheck<?php if ($key === 'netease') echo 'selected'; ?>><?php echo $val; ?></option>
                                    <?php if ($key === 'migu') echo '<br />'; ?>
                                <?php } ?>
                            </select>
                        </div>
                        <button id="j-submit" type="submit" class="am-btn am-btn-primary am-btn-lg am-btn-block am-radius" data-am-loading="{spinner: 'cog', loadingText: '正在搜索相关音乐...', resetText: '搜索'}">搜索</button>
                    </div>
                </form>
                <form id="j-main" class="am-form am-u-md-12 am-u-sm-centered music-main">
                    <a type="button" id="j-back" class="am-btn am-btn-success am-btn-lg am-btn-block am-radius am-margin-bottom-lg">返回 <i class="am-icon-reply am-icon-fw"></i></a>
                    <div class="am-g am-margin-bottom-sm">
                        <div class="am-u-lg-6">
                            <div class="am-input-group am-input-group-sm am-margin-bottom-sm" data-am-popover="{content: '音乐地址', trigger: 'hover'}">
                                <span class="am-input-group-label"><i class="am-icon-link am-icon-fw"></i></span>
                                <input id="j-link" class="am-form-field" readonly>
                                <span class="am-input-group-btn">
                                    <a id="j-link-btn" class="am-btn am-btn-default" target="_blank">
                                        <i class="am-icon-external-link"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="am-u-lg-6">
                            <div class="am-input-group am-input-group-sm am-margin-bottom-sm" data-am-popover="{content: '音乐链接', trigger: 'hover'}">
                                <span class="am-input-group-label"><i class="am-icon-music am-icon-fw"></i></span>
                                <input id="j-src" class="am-form-field" readonly>
                                <span class="am-input-group-btn">
                                    <a id="j-src-btn" class="am-btn am-btn-default" target="_blank">
                                        <i id="j-src-btn-icon" class="am-icon-external-link"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-lg-6">
                            <div class="am-input-group am-input-group-sm am-margin-bottom-sm" data-am-popover="{content: '音乐ID', trigger: 'hover'}">
                                <span class="am-input-group-label"><i class="am-icon-list-ol am-icon-fw"></i></span>
                                <input id="j-songid" class="am-form-field" readonly>
                            </div>
                        </div>
                        <div class="am-u-lg-6">
                            <div class="am-input-group am-input-group-sm am-margin-bottom-sm" data-am-popover="{content: '音乐歌词', trigger: 'hover'}">
                                <span class="am-input-group-label"><i class="am-icon-file-text-o am-icon-fw"></i></span>
                                <input id="j-lrc" class="am-form-field" readonly>
                                <span class="am-input-group-btn">
                                    <a id="j-lrc-btn" class="am-btn am-btn-default" target="_blank">
                                        <i id="j-lrc-btn-icon" class="am-icon-external-link"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-lg-6">
                            <div class="am-input-group am-input-group-sm am-margin-bottom-sm" data-am-popover="{content: '音乐名称', trigger: 'hover'}">
                                <span class="am-input-group-label"><i class="am-icon-tag am-icon-fw"></i></span>
                                <input id="j-name" class="am-form-field" readonly>
                            </div>
                        </div>
                        <div class="am-u-lg-6">
                            <div class="am-input-group am-input-group-sm am-margin-bottom-sm" data-am-popover="{content: '音乐作者', trigger: 'hover'}">
                                <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
                                <input id="j-author" class="am-form-field" readonly>
                            </div>
                        </div>
                    </div>
                    <div id="j-show" class="am-margin-vertical">
                        <div id="j-player" class="aplayer"></div>
                    </div>
                </form>
                <div class="am-u-md-12 am-u-sm-centered am-margin-vertical music-tips">
                    <div id="j-more" class="music-more" data-am-modal="{target: '#help-info'}">使用帮助</div>
                </div>
            </div>
        </div>
        <div class="am-popup" id="copr-info">
            <div class="am-popup-inner">
                <div class="am-popup-hd">
                    <h4 class="am-popup-title">声明&反馈</h4>
                    <span data-am-modal-close class="am-close">&times;</span>
                </div>
                <div class="am-popup-bd">
                    <p>本站音频文件来自各网站接口，本站不会修改任何音频文件</p>
                    <p>音频版权来自各网站，本站只提供数据查询服务，不提供任何音频存储和贩卖服务</p>
                    <p>如果您在使用总中遇到什么问题，或者有什么意见和反馈。还请将问题或者反馈信息进行简要描述发送到 support@ourhome-china.cn ，我们会尽快和您取得联系！</p>
                </div>
            </div>
        </div>

         <div class="am-popup" id="help-info">
            <div class="am-popup-inner">
                <div class="am-popup-hd">
                    <h4 class="am-popup-title">使用帮助</h4>
                    <span data-am-modal-close class="am-close">&times;</span>
                </div>
                <div class="am-popup-bd">
                    <p><b>标红</b> 为 <strong>音乐 ID</strong>，<u>下划线</u> 表示 <strong>音乐地址</strong></p>
                    <ul>
                        <li>蜻蜓 FM 的音乐 ID 需要使用 <code>| (管道符)</code> 组合，例如 <code>158696|5266259</code></li>
                        <li>全民 K 歌的音乐名称请输入 <code>shareuid</code>，这是用户的 uid，搜索结果是该用户的所有公开作品</li>
                        <li>全民 K 歌的音乐 ID 请输入 <code>shareid</code> 这是单曲分享 id，搜索结果是该单曲信息</li>
                        <li>酷我：http://www.kuwo.cn/yinyue/<span style="color: #c7254e">382425</span>/
                        <br>
                        <li>虾米：http://www.xiami.com/song/<span style="color: #c7254e">2113248</span>
                        <br>
                        <li>百度：http://music.baidu.com/song/<span style="color: #c7254e">266069</span>
                        <br>
                        ...      
                        </ul>
                </div>
            </div>
        </div>

    </section>
    <footer class="footer">
        <p class="am-text-sm">v<?php echo MC_VERSION; ?>&nbsp;&copy;&nbsp;<?php echo date('Y'); ?>&nbsp;OurHome</a>&nbsp;Powered by 2333 - Modified by <a href="http://ourhome-china.cn">OurHome-上海 </a>&nbsp;<a href="javascript:void(0)" data-am-modal="{target: '#copr-info'}">声明&反馈</a></p>
    </footer>
    <script src="//cdn.staticfile.org/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.staticfile.org/amazeui/2.3.0/js/amazeui.min.js"></script>
    <script src="//cdn.staticfile.org/aplayer/1.6.0/APlayer.min.js"></script>
    <script src="//cdn.staticfile.org/Base64/1.0.1/base64.min.js"></script>
    <script src="static/js/music.js?v<?php echo MC_VERSION; ?>"></script>
</body>
</html>
