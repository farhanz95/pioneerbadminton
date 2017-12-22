<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 

<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>019 -  382 4192</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>pioneerbadmintoncourt.farhanresources@gmail.com</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                 
                    <li><a href="" data-toggle="modal" data-target="#myModal">Sign In</a></li>
                                            <li><a href="register_user.php">Registration</a></li>
                                                                  
                </ul>
            </div>                <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>
<!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
<div class="header">
  <div class="container">
    <a class="site-logo" href=""><img src="<?= Url::base() ?>/img/logo/logo88.jpg" alt=""></a>
    <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

<!-- BEGIN NAVIGATION -->
    <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li>
              <a href="index.php">
                <font color="">Home</font> 
              </a>
            </li>
             <li>
                <a href="about_us.php">
                    <font color="">About Us</font> 
                </a>
            </li>
            <li>
                <a href="shopping.php">
                   <font color="">Shopping</font> 
               </a>
           </li>
           <li>
                <a href="contact_us.php">
                    <font color="">Contact Us</font> 
                </a>
            </li>
            <li>
                <a href="policy.php">
                   <font color="">Policy</font>
                </a>
            </li> 
          </ul>
    </div>        
<!-- END NAVIGATION -->

    </div>
</div>
<!-- Header END -->
    
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>



    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
            
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>About us</h2>
            <p>Book badminton, futsal and ping pong courts online. We work hard to get you the best rates in the most popular sports center in Malaysia. We pride ourselves on offering best deal in badminton, futsal or ping pong courts you like.</p>

            <div class="photo-stream">
              <h2>Payment Methods</h2>
              <ul class="list-unstyled">
                <li><a href="javascript:;"><img alt="" src="img/payment/visa.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/master.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/paypal.jpg"></a></li>
                   <li><a href="javascript:;"><img alt="" src="img/payment/american.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/cimb.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/maybank.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/hlb.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/rhb.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/bankislam.jpg"></a></li> 
                <li><a href="javascript:;"><img alt="" src="img/payment/ambank.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/pb.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/alliance.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/fpx.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/bsn.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/bankrakyat.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/affinbank.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/meps.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/mobilemoney.jpg"></a></li>
                <li><a href="javascript:;"><img alt="" src="img/payment/webcash.jpg"></a></li>
              </ul>                    
            </div>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              <b>Book Court 88</b><br>
              H/P: 019-516 3710 / 016-419 5881 <br>
        Tel: 603-5021 9219<br>
        Fax: 603-5021 9220<br>
              e-Mail: <a href="mailto:bookcourt88@gmail.com">bookcourt88@gmail.com</a><br>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->

          <!-- BEGIN TWITTER BLOCK --> 
              <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2 class="margin-bottom-0">Latest News</h2><br>
               <h5>Badminton</h5>
               <ul><li><a href = 'http://www.thestar.com.my/sport/badminton/2017/12/14/angers-my-fuel-angus-ruthless-chong-wei-gets-even-with-hong-kong-shuttler-in-dubai/' style='text-decoration:none;' target='_blank'>Ruthless Chong Wei gets even with Hong Kong shuttler in Dubai</a></li></ul><ul><li><a href = 'http://www.thestar.com.my/sport/badminton/2017/12/14/leaky-roof-poses-glitch-ahead-of-handover/' style='text-decoration:none;' target='_blank'>Leaky roof poses glitch ahead of handover</a></li></ul><ul><li><a href = 'http://www.thestar.com.my/sport/badminton/2017/12/13/dubai-deliverance-chong-wei-out-to-make-amends-after-glasgow-disaster/' style='text-decoration:none;' target='_blank'>Chong Wei out to make amends after Glasgow disaster</a></li></ul>          <br>
               <h5>Football</h5>
             
               <ul><li><a href = 'http://www.thestar.com.my/sport/football/2017/09/10/jdt-roar-at-home-ghaddar-fires-a-brace-to-extend-southern-tigers-unbeaten-run/' style='text-decoration:none;' target='_blank'>JDT roar at home  </a></li></ul><ul><li><a href = 'http://www.thestar.com.my/sport/football/2017/09/10/hodak-to-continue-rotation-to-test-squad/' style='text-decoration:none;' target='_blank'>Hodak to continue rotation to test squad</a></li></ul><ul><li><a href = 'http://www.thestar.com.my/sport/football/2017/09/10/only-seven-teams-meet-conditions-for-super-league/' style='text-decoration:none;' target='_blank'>Only seven teams meet conditions for Super League</a></li></ul>         <br>
               <h5>Motorsport</h5>
             
               <ul><li><a href = 'http://www.thestar.com.my/sport/golf/2017/09/09/golfthompson-ko-set-for-final-round-showdown-in-indianapolis/' style='text-decoration:none;' target='_blank'>Golf-Thompson, Ko set for final round showdown in Indianapolis</a></li></ul><ul><li><a href = 'http://www.thestar.com.my/sport/golf/2017/09/08/pgm-humbled-in-ryder-cupstyle-pgmigt-championship/' style='text-decoration:none;' target='_blank'>PGM humbled in Ryder Cup-style PGM-IGT Cham&#173;pionship</a></li></ul><ul><li><a href = 'http://www.thestar.com.my/sport/golf/2017/09/08/wie-will-miss-evian-championship-as-she-recovers-from-surgery/' style='text-decoration:none;' target='_blank'>Wie will miss Evian Championship as she recovers from surgery</a></li></ul>     
              </div>
          <!-- END TWITTER BLOCK -->

        </div>
      </div>
    </div>      <!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
  <div class="container">
    <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2017 © pioonerbadmintoncourt.com ALL Rights Reserved. <a href="policy.php">Privacy Policy</a> | <a href="javascript:;">Terms of Service</a>
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-footer list-unstyled list-inline pull-right">
              <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
             <!--  <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li> -->
              <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-skype"></i></a></li>
              <!--   <li><a href="javascript:;"><i class="fa fa-github"></i></a></li> -->
              <li><a href="javascript:;"><i class="fa fa-youtube"></i></a></li>
              <!--   <li><a href="javascript:;"><i class="fa fa-dropbox"></i></a></li> -->
            </ul>  
          </div>
          <!-- END PAYMENTS -->
    </div>
  </div>
</div>      <!-- END FOOTER -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
