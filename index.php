<?php
include_once 'lib/config.php';
include_once 'header.php';
?>
<body>
<div class="container">
    <?php include_once 'nav.php';?>

    <div class="jumbotron">
        <h2><?php echo $site_name; ?></h2>
        <p class="lead"> 免费！每个月<?php echo $togb_gb_size?>G流量，日本、美国等节点。</p>
        <p><a class="btn btn-lg btn-success" href="user/reg.php" role="button">立即注册</a></p>
    </div>

    <div class="row marketing">
        <div class="col-lg-6">
            <a href="https://play.google.com/store/apps/details?id=com.github.shadowsocks"><h4>Android</h4></a>
            <p>Android客户端</p>
            <h4><a href="http://sourceforge.net/projects/shadowsocksgui/files/dist/">Shadowsocks C#</a></h4>
            <p> Windows用户推荐此客户端.</p>
        </div>

        <div class="col-lg-6">
            <a href="https://itunes.apple.com/us/app/shadowsocks/id665729974?mt=8"><h4>iOS</h4></a>
            <p>iOS客户端</p>

            <h4><a href="https://github.com/shadowsocks/shadowsocks-iOS/wiki/Shadowsocks-for-OSX-Help">ShadowsocksX</a></h4>
            <p> Mac用户推荐此客户端.</p>
        </div>
    </div><?php
            include_once 'footer.php';
            include_once 'ana.php';?>
</div> <!-- /container -->
</body>
</html>
