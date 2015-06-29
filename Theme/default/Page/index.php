  
<?php v_template_part(array("name" => "header", "path" => "Public")); ?>
<?php
v_template_part(array("name" => "Crumb", "path" => "Public",
    "data" => array(array("name" => $article[0]['title']))));
?> 
 
<script>$("title").html($("title").html() + "  -  <?php echo $article[0]['title']; ?>");</script>
<div class="container" >
    <div class="row">
        <div class="col-md-12">
  <?php v_template_part(array("name" => "PageSiderbar","title"=>L("L_PRODUCT_CATEGORY"), "path" => "Public")); ?>

            <div class="col-xs-10 col-md-10" style="width: 800px; " >
                <!--            <div class="col-md-12 article-title">
                                <h2><?php echo $article[0]['title'] ?></h2>
                            </div>-->
                <div class="col-xs-12 article-body">
                    <?php echo html_entity_decode($article[0]['body']) ?>

                    <?php if ($article[0]['callcode'] == "contact") { ?>
                        <form class="form-horizontal" action="###" method="POST">
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="email" placeholder="<?php echo L("L_SIDER_ENTEREMAIL"); ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-12">
                                    <textarea class="form-control" rows="5" name="body" placeholder="<?php echo L("L_SIDER_FANKUIJIANYI"); ?>"></textarea>  
                                </div>
                            </div>  
                            <div class="form-group">

                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-primary form_submit message" ><?php echo L("L_PUBLIC_SEND") ?></button>
                                </div>
                            </div> 

                        </form>

                    <?php } ?>
                </div>


            </div>
        </div>
    </div>


</div>
</div>



<script>
    $(".form_submit").click(function () {
        if ($("textarea[name*='body']").val() != "") {
            $.ajax({
                //提交数据的类型 POST GET
                type: "POST",
                //提交的网址
                url: '<?php echo U("SendEmail/Index/send") ?>',
                //提交的数据
                data: {email: $("input[name*='email']").val(), body: $("textarea[name*='body']").val()}, //{Name: "sanmao", Password: "sanmaoword"},
                //返回数据的格式
                datatype: "json", //"xml", "html", "script", "json", "jsonp", "text".
                //在请求之前调用的函数
                beforeSend: function () {
//                   alert("befor");
                    $(".message").html("<?php echo L("L_SIDER_NOWSEND"); ?>");

                },
                success: function (data) {


                    $('#showlodding').modal('hide');
                    if (data == "200") {
                        $(".message").html("<?php echo L("L_SIDER_SENDSUCCESS"); ?>");

                    } else {
                        $(".message").html("<?php echo L("L_SIDER_SENDERRORMESSAGE"); ?>");
                    }

                },
                //调用执行后调用的函数
                complete: function (XMLHttpRequest, textStatus) {

                },
                //调用出错执行的函数
                error: function () {
                    //请求出错处理
//                 alert("error");
                }
            });
        } else {
            $(".message").html("<?php echo L("L_SIDER_ENTERINFO"); ?>");
        }
    });
 
</script>

<?php v_template_part(array("name" => "footer", "path" => "Public")); ?>