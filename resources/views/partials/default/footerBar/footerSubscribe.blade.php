<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
<div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
<form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post"
      class="nobottommargin">
    <div class="input-group divcenter">
        <span class="input-group-addon"><i class="icon-email2"></i></span>
        <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
               class="form-control required email" placeholder="Enter your Email">
        <span class="input-group-btn">
            <button class="btn btn-success" type="submit">Subscribe</button>
        </span>
    </div>
</form>
<script type="text/javascript">
    $("#widget-subscribe-form").validate({
        submitHandler: function (form) {
            $(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
            $(form).ajaxSubmit({
                target: '#widget-subscribe-form-result',
                success: function () {
                    $(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                    $('#widget-subscribe-form').find('.form-control').val('');
                    $('#widget-subscribe-form-result').attr('data-notify-msg', $('#widget-subscribe-form-result').html()).html('');
                    SEMICOLON.widget.notifications($('#widget-subscribe-form-result'));
                }
            });
        }
    });
</script>
