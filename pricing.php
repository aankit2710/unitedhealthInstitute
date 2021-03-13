<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Title -->
<title>United Health Institute : Pricing</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="CreativeLayers" content="">
<link href="assets/css/pricing.css" rel="stylesheet"> 
<?php include'header.php';?>

<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Pricing</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Pricing</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- About Text Content -->
	<section class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-justify">
					<div class="about_content">
						<h3>Pricing and Program Options</h3>
						As a leading online training organization, United Health Institute's vocational training programs provide you with all the resources to develop the skills and knowledge you need to start working after completion. To view complete pricing details for an individual course, please click on the program name or the More Info button.
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
        $fetch233 = mysqli_query($conn,"SELECT DISTINCT category FROM pricing WHERE pricing.user_id='".$user_id."'");
        $num233 = mysqli_num_rows($fetch233);
        //print_r($show231);
        if($num233 > 0)
        {
            while($show233 = mysqli_fetch_assoc($fetch233)){
    ?>
	<section class="healthcare">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="margin:auto;">
                    <div class="section-header">
                        <h2><?=$show233['category']?></h2>
                        <span class="cost-header">Price</span>
                        <span class="affirm">&nbsp;</span>
                        <span class="enroll">&nbsp;</span>
                    </div>
                    <div class="accordion">
                        <?php
                        $t = $show233['category'];
                         $fetch23 = mysqli_query($conn,"SELECT pricing.service_id,pricing.category, pricing.pricing_id,pricing.price,services.program_name,pricing.content FROM pricing left join services on pricing.service_id = services.service_id WHERE pricing.user_id='".$user_id."' AND pricing.category ='".$t."' ORDER BY pricing_id ASC");
        $num23 = mysqli_num_rows($fetch23);
        //print_r($show231);
        if($num23 > 0)
                        while($show23 = mysqli_fetch_assoc($fetch23))
                        {
                            $service_id=$show23['pricing_id'];
                            $service_name=$show23['program_name'];
                            $price=$show23['price'];
                            $description=$show23['content'];
                            $service=$show23['service_id'];
                        ?>
                        <div class="accordion-button-wrapper">
                            <h4 class="accordion-button"><span class="plus-minus-icon">&nbsp;</span><?=$service_name?></h4>
                            <span class="cost">
                                <product-price class="ng-isolate-scope"><span class="ng-binding">$<?=$price?></span></product-price>
                            </span>
                            <span class="affirm"><a class="affirm-as-low-as" data-affirm-color="blue" data-page-type="product" data-learnmore-show="false" data-amount="00"></a></span>
                            <span class="enroll"><a href="register.php?course=<?=$service?>&mycourse=<?=$service_id?>">Sign Up <i class="fa fa-angle-right"></i></a></span>
                            
                        </div>
                        <?php } ?>
                    </div>
                    <div class="desktop-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container">
                                    <div class="desktop-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                        <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>
                    <div class="mobile-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container"><div class="desktop-only">
                                    <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                    <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>  
                </div>  
            </div>        
        </div>
    </section>
    <?php } } ?>
    
    <?php
        $fetch23 = mysqli_query($conn,"SELECT pricing.category, pricing.pricing_id,pricing.price,services.service_name,pricing.content FROM pricing left join services on pricing.service_id = services.service_id WHERE pricing.user_id='".$user_id."' AND pricing.category ='Administrative' ORDER BY pricing_id ASC");
        $num23 = mysqli_num_rows($fetch23);
        //print_r($show231);
        if($num23 > 0)
        {
    ?>
	<section class="healthcare">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="margin:auto;">
                    <div class="section-header">
                        <h2><?=mysqli_fetch_assoc($fetch23)['pricing.category']?></h2>
                        <span class="cost-header">Price</span>
                        <span class="affirm">&nbsp;</span>
                        <span class="enroll">&nbsp;</span>
                    </div>
                    <div class="accordion">
                        <?php
                        while($show23 = mysqli_fetch_assoc($fetch23))
                        {
                            $service_id=$show23['pricing_id'];
                            $service_name=$show23['service_name'];
                            $price=$show23['price'];
                            $description=$show23['content'];
                        ?>
                        <div class="accordion-button-wrapper">
                            <h4 class="accordion-button"><span class="plus-minus-icon">&nbsp;</span><?=$service_name?></h4>
                            <span class="cost">
                                <product-price class="ng-isolate-scope"><span class="ng-binding">$<?=$price?></span></product-price>
                            </span>
                            <span class="affirm"><a class="affirm-as-low-as" data-affirm-color="blue" data-page-type="product" data-learnmore-show="false" data-amount="00"></a></span>
                            <span class="enroll"><a href="register.php?course=<?=$service?>&mycourse=<?=$service_id?>">Sign Up <i class="fa fa-angle-right"></i></a></span>
                            
                        </div>
                        <?php } ?>
                    </div>
                    <div class="desktop-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container">
                                    <div class="desktop-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                        <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>
                    <div class="mobile-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container"><div class="desktop-only">
                                    <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                    <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>  
                </div>  
            </div>        
        </div>
    </section>
    <?php } ?>
    
    <?php/*
        $fetch23 = mysqli_query($conn,"SELECT pricing.category, pricing.pricing_id,pricing.price,services.service_name,pricing.content FROM pricing left join services on pricing.service_id = services.service_id WHERE pricing.user_id='".$user_id."' AND pricing.category ='Technology' ORDER BY pricing_id ASC");
        $num23 = mysqli_num_rows($fetch23);
        //print_r($show231);
        /*if($num23 > 0)
        {
    ?>
	<section class="healthcare">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="margin:auto;">
                    <div class="section-header">
                        <h2>Technology</h2>
                        <span class="cost-header">Price</span>
                        <span class="affirm">&nbsp;</span>
                        <span class="enroll">&nbsp;</span>
                    </div>
                    <div class="accordion">
                        <?php
                        while($show23 = mysqli_fetch_assoc($fetch23))
                        {
                            $service_id=$show23['pricing_id'];
                            $service_name=$show23['service_name'];
                            $price=$show23['price'];
                            $description=$show23['content'];
                        ?>
                        <div class="accordion-button-wrapper">
                            <h4 class="accordion-button"><span class="plus-minus-icon">&nbsp;</span><?=$service_name?></h4>
                            <span class="cost">
                                <product-price class="ng-isolate-scope"><span class="ng-binding">$<?=$price?></span></product-price>
                            </span>
                            <span class="affirm"><a class="affirm-as-low-as" data-affirm-color="blue" data-page-type="product" data-learnmore-show="false" data-amount="00"></a></span>
                            <span class="enroll"><a href="register.php?course=<?=$service?>&mycourse=<?=$service_id?>">Sign Up <i class="fa fa-angle-right"></i></a></span>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="desktop-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container">
                                    <div class="desktop-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                        <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>
                    <div class="mobile-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container"><div class="desktop-only">
                                    <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                    <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>  
                </div>  
            </div>        
        </div>
    </section>
    <?php }*/ ?>
    
    <?php/*
        $fetch23 = mysqli_query($conn,"SELECT pricing.category, pricing.pricing_id,pricing.price,services.service_name,pricing.content FROM pricing left join services on pricing.service_id = services.service_id WHERE pricing.user_id='".$user_id."' AND pricing.category ='Other Training Options' ORDER BY pricing_id ASC");
        $num23 = mysqli_num_rows($fetch23);*/
        //print_r($show231);
        /*if($num23 > 0)
        {
    ?>
	<!--<section class="healthcare">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="margin:auto;">
                    <div class="section-header">
                        <h2>Other Training Options</h2>
                        <span class="cost-header">Price</span>
                        <span class="affirm">&nbsp;</span>
                        <span class="enroll">&nbsp;</span>
                    </div>
                    <div class="accordion">
                        <?php
                        while($show23 = mysqli_fetch_assoc($fetch23))
                        {
                            $service_id=$show23['pricing_id'];
                            $service_name=$show23['service_name'];
                            $price=$show23['price'];
                            $description=$show23['content'];
                        ?>
                        <div class="accordion-button-wrapper">
                            <h4 class="accordion-button"><span class="plus-minus-icon">&nbsp;</span><?=$service_name?></h4>
                            <span class="cost">
                                <product-price class="ng-isolate-scope"><span class="ng-binding">$<?=$price?></span></product-price>
                            </span>
                            <span class="affirm"><a class="affirm-as-low-as" data-affirm-color="blue" data-page-type="product" data-learnmore-show="false" data-amount="00"></a></span>
                            <span class="enroll"><a href="register.php?course=<?=$service?>&mycourse=<?=$service_id?>">Sign Up <i class="fa fa-angle-right"></i></a></span>
                        </div>
                         
                        <?php } ?>
                    </div>
                    <div class="desktop-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container">
                                    <div class="desktop-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                        <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>
                    <div class="mobile-only">
                        <phone-cta-prospect class="ng-isolate-scope">
                            <section class="phone-cta-section">
                                <div class="container"><div class="desktop-only">
                                    <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><?=$phone_number?>.</a></h2>
                                    <h3>Find out how United Health Institute can meet your career training needs today.</h3>
                                </div>
                                </div>
                                <div class="container">
                                    <div class="mobile-only">
                                        <h2>Get Started Today! Call <a href="tel:<?=str_replace(array('-',' '),'',$phone_number)?>"><u><?=$phone_number?></u>.</a></h2>
                                    </div>
                                </div>
                            </section>
                        </phone-cta-prospect>
                    </div>  
                </div>  
            </div>        
        </div>
    </section>-->
    <?php } */?>

<?php include'footer.php';?>
<script>
          var acc = document.getElementsByClassName("accordion-button");
          var i;
          for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function(){
              if(this.classList.contains("active")){
                closeActivePanel();
             } else if(document.getElementsByClassName("active").length){
              closeActivePanel();
               this.classList.add("active");
                var panel = this.parentNode.nextElementSibling;
                panel.classList.add("active");
                if (panel.style.maxHeight){
                  panel.style.maxHeight = null;
                } else {
               panel.style.maxHeight = panel.scrollHeight + "px";
                }
              } else {
           this.classList.add("active");
              var panel = this.parentNode.nextElementSibling;
              panel.classList.add("active");
                if (panel.style.maxHeight){
               panel.style.maxHeight = null;
              } else {
                  panel.style.maxHeight = panel.scrollHeight + "px";
             }
              }
           }
          }
          function closeActivePanel() {
         var activeButton = document.getElementsByClassName("active accordion-button");
            var activePanel = document.getElementsByClassName("active accordion-panel");
            if(activeButton.length){
              for (var j = 0; j < activeButton.length; j++){
                activeButton[j].classList.remove("active");
                if (activePanel[j].style.maxHeight){
                activePanel[j].style.maxHeight = null;
                }
               activePanel[j].classList.remove("active");
             }
            }
          }
</script>

</body>
</html>