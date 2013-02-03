<!DOCTYPE html>
<html>
<head>
    <title>Simoleons Converter</title>
    <link href="<?base_url()?>static/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?base_url()?>static/css/sim.css" rel="stylesheet">
    <script src="//static.jariz.pro/js/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>static/js/sim.js"></script>
</head>
<body>
<div id="error" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Unable to convert your <span class="inline">$</span>'s </h3>
    </div>
    <div class="modal-body">
        <p><i class="icon-remove-circle"></i> <span id="message">You're not supposed to see this</span></p>
    </div>
    <div class="modal-footer">
        <a href="javascript:$('#error').modal('hide')" class="btn btn-danger"><i class="icon-remove icon-white"></i> Close</a>
    </div>
</div>
<div class="navbar navbar-fixed-top"">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?=base_url()?>">Simoleons Converter</a>
            <ul class="nav">
                {nav}<li{active}><a href="<?=base_url()?>{url}">{name}</a></li>{/nav}
            </ul>
        </div>
    </div>
</div>
<div class="container">

    {content}

    <div class="well well-small footer">
        Another bullshit project made with &hearts; and without <span class="inline">$</span> by <a href="https://github.com/jariz">@jariz</a>
        <span class="stats">Styled with <a href="http://bootswatch.com">Bootswatch Cerulean</a> and Rendered by <a href="http://codeiginiter.com">CodeIgniter</a> in {elapsed_time} secs using {memory_usage}</span>
        <span class="stats">This site is not connected to EA/Maxis. All rights reserved. <a href="http://simcity.com">Buy SimCity now</a></span>
        <iframe src="http://ghbtns.com/github-btn.html?user=jariz&repo=simoleons&type=watch" allowtransparency="true" frameborder="0" scrolling="0" width="62" height="20"></iframe>
        <a href="https://twitter.com/_JariZ" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-dnt="true"></a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        <a href="http://www.reddit.com/submit?url=<?=urlencode(current_url())?>"><img src="http://www.reddit.com/static/spreddit1.gif" alt="submit to reddit" border="0" /></a>
        <form style="display: inline-block" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>
</div>
</body>
</html>