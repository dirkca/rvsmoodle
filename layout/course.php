<?php
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$bodyclasses = array();
if ($hassidepre && !$hassidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($hassidepost && !$hassidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$hassidepost && !$hassidepre) {
    $bodyclasses[] = 'content-only';
}
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
  <title><?php echo $PAGE->title; ?></title>
  <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
  <meta charset="utf-8" /> 
  <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>   
  <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>
     <?php require_once('topmenu.php');  ?> 
    <div id="page" class="coursep">     
      <div class="clearer2"></div>
      <?php require_once('nav.php');  ?> 
      <div class="clearer2"></div>
      <div class="navbar">
        <div class="wrapper clearfix">
        <?php if ($hasnavbar) { ?>    <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>  <?php } ?>  
        <div class="navbutton"> <?php echo $PAGE->button; ?></div>
        </div>   
      </div>  <!-- END navbar -->  
      
      <div id="page-content"> 
            <div id="region-main-box">
                <div id="region-post-box">
                     <div id="region-main-wrap">
                        <div id="region-main">
                           
<div class="region-content">
 <?php if(isset($coursecontentheader)) echo $coursecontentheader; ?>
 <?php echo $OUTPUT->main_content() ?>
 <?php if(isset($coursecontentfooter)) echo $coursecontentfooter; ?>
 </div>  <!-- END region-content --> 
                            <div id="spacer"></div>
                         </div> <!-- END region-main -->
                </div> <!-- END region-main-wrap -->
                    
                    <?php if ($hassidepre) { ?>
               <div id="region-pre" class="block-region">   
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
                </div> <!-- END region-pre -->
                <?php } ?>

                <?php if ($hassidepost) { ?>
                   <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
                </div> <!-- END region-post -->
                <?php } ?>
      </div> <!-- END region-post-box -->
        </div> <!-- END region-main-box -->
    </div> <!-- END page-content -->
    <div class="documentActions">
        <a title="" href=""></a>
    </div>
    </div> <!-- END page -->  
        <div class="clearfix"></div>
    <p id="back-top">
        <a href="#top"><span><br></span></a>
    </p>
   
    <!-- START OF FOOTER -->
    <?php if ($hasfooter) { ?>
    
    <div id="page-footer" >
        <div id="footer-wrapper" class="coursef">
          <table><tr>
            <td id="left"><img src="http://moodle2.rockyview.ab.ca/EXTERNAL/rvs_logo.jpg" alt="" /></td>
            <td id="footer-container">
                 <?php    if ($hasfootnote) { ?>
                    <div id="footnote"><?php echo $PAGE->theme->settings->footnote; ?></div>
                 <?php } ?>
                 <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
                <?php 
                echo $OUTPUT->login_info(); 
                ?>
              </td> 
             </tr></table>
                 </div> <!-- END footer-wrap -->
            </div>  </div> <!-- END page-footer -->
            <?php } ?>
            
            <!-- Twitter Bird Widget for Blogger by Way2blogging.org
<script src="http://widgets.way2blogging.org/blogger-widgets/w2b-tripleflap.js"></script> 
<script type="text/javascript">
var twitterAccount = "rvsed";
var tweetThisText = " Tweeting from RVS Moodle : @rvsed ";
tripleflapInit();
</script>
<span style="font-size:11px;position:absolute;"><a  href="#" target='_blank'></a></span>-->
            
    
<?php echo $OUTPUT->standard_end_of_body_html() ?>
<script type="text/javascript">
    $(document).ready(function() {
       
        $("#back-top").hide();
    
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    });
    </script> 
</body>
</html>


