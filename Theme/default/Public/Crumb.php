
<div class="container" style="height: 50px;padding: 0px; line-height: 30px;">
<div class="row">

    <div class="col-md-12">


 

        <ul class="breadcrumb" style="background-color: #fff; margin-bottom: 0px;font-size: 12px;">
            <li><small><?php echo L("L_CURRLOCALTION");?>:</small></li>
            <li>
                <a href="<?php echo U("Index/Index") ?>"><?php echo L("L_NAV_HOME");?></a> 
            </li>
            <li><?php
                foreach ($data['data'] as $v) {
                    echo ' >  <a href="' . $v['path'] . '">';
                    echo $v['name'];
                    echo '</a>';
                }
                ?></li>
 
        </ul>

     </div>

</div>
</div>
<!-- END PAGE HEADER-->
