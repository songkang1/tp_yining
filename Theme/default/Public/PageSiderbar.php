<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>


    .accordion {

        padding:0px;

        max-width: 360px;


    }

    .accordion .link {
        height:50px;
        cursor: pointer;
        display: block;
        padding: 15px 15px 15px 42px;
        color: #4D4D4D;
        font-size: 14px;
        font-weight: 700;
        border-bottom: 1px solid #CCC;
        position: relative;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .accordion li:last-child .link {
        border-bottom: 0;
    }

    .accordion li i {
        position: absolute;
        top: 16px;
        left: 12px;
        font-size: 18px;
        color: #595959;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .accordion li i.fa-chevron-down {
        right: 12px;
        left: auto;
        font-size: 16px;
    }

    .accordion li.open .link {
        color: #393939;
    }

    .accordion li.open i {
        color: #393939;
    }
    .accordion li.open i.fa-chevron-down {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .accordion li.open .submenu{display: block;}

    /**
     * Submenu
     -----------------------------*/
    .submenu {
        display: none;
        /*background: #444359;*/
        font-size: 14px;
        padding:0px;
    }

    .submenu li {
        /*border-bottom: 1px solid #4b4a5e;*/
        padding: 0px;
        margin:0px;
    }

    .submenu a {
        display: block;
        text-decoration: none;
        color: #4D4D4D;
        padding: 12px;
        padding-left: 63px;
        -webkit-transition: all 0.25s ease;
        -o-transition: all 0.25s ease;
        transition: all 0.25s ease;
    }

    .submenu a:hover {
        background: #317fc9;
        color: #FFF;
    }
    .open-active{
        background: #317fc9;
        color: #FFF;}

</style>
<div class="col-md-2  col-xs-2 sider-bar" style=" padding:5px; width:240px;
     background-image: url(<?php echo v_theme_url() ?>/img/<?php echo $backup; ?>_<?php echo LANG_SET;?>.png);
     background-repeat: no-repeat;
     filter:\"progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')\";  
     -moz-background-size:100% 100%;  
     background-size:100% 100%;  " >
    <div class="siderbar" >
        <div class="col-md-12 text-center category-title">
            <?php // echo $data['title'];?>
        </div>
        <!-- Contenedor -->
        <ul id="accordion" class="accordion col-md-12">
            <?php
            $childsid = 0;
            foreach ($categorylist as $category) {
                foreach ($category['childs'] as $childs) {
                    if ($currcategory["id"] == $childs["id"]) {
                        $childsid = $childs["id"];
                    }
                }
            }
            foreach ($categorylist as $value) {
                 $class = "";
                foreach ($value['childs'] as $ch) {
                if ($currcategory["id"] == $ch["id"] || $currcategory['id'] == $value['id']) {
                        $class =  "class='open'";
                    }
                }
                ?>
                <li <?php echo $class; ?>>
                    <!--<div class="link"><a style="color:#393939" href="<?php echo U("Page/Index/index/id/".$value['callcode']) ?>"><?php echo $value['title']; ?></a><i class="fa fa-chevron-down"></i></div>-->
                    <ul class="submenu ">
                        <?php
                        foreach ($value['childs'] as $childs) {
                            $class = "";
                             if ($currcategory["id"] == $childs["id"]) {
                                $class =  "class='open-active' style='color:#fff'";
                            }
                            ?> 
                        <li><a <?php echo $class;?> href="<?php echo U("Page/Index/single/id/" . $childs['id']."/s/".$value['callcode']); ?>"><?php echo $childs['title']; ?></a></li>
                            <?php
                        }
                        ?>

                    </ul>
                </li>
            <?php } ?>

        </ul>
    </div>
     
</div>

<script>
   

    $(function () {
        var Accordion = function (el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function (e) {
            var $el = e.data.el;
            $this = $(this),
                    $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            }
            ;
        }

        var accordion = new Accordion($('#accordion'), false);
    });
</script>
