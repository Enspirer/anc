<header>
    <div class="header-upper">
        <div class="layout-row">
            <aside class="caps sub-font-reg">
                <a href="">Home</a>
                <a href="about-us">About Us</a>
                <a href="contact-us">Contact Us</a>
                <a href="gallery">Gallery</a>
            </aside>
            <aside class="header-social-icons layout-row layout-align-end center">
                <a href="https://www.facebook.com/amcholidays/" target="_blank" class="fab fa-facebook-f" 
                style="display: inline-block; min-width: 25px; min-height: 25px; -webkit-border-radius: 50%; border-radius: 50%; background-color: #0054a6; text-align: center;
                    line-height: 25px; color:white; overflow: hidden; font-size:11px">
                </a>
                <a href="https://twitter.com/AMC_Holidays" target="_blank" class="fab fa-twitter ml-1" 
                style="display: inline-block; min-width: 25px; min-height: 25px; -webkit-border-radius: 50%; border-radius: 50%; background-color: #00aeef; text-align: center;
                    line-height: 25px; color:white; overflow: hidden; font-size:11px">
                </a>
               <!-- <a href="" class="social-icon color-youtube"><span>
            <i class="fa fa-youtube" aria-hidden="true"></i>
        </span></a>-->
                <a class="f-14 contact-n">Contact : 0094 77 440 1486</a>
                <!--sccial icons-->
            </aside>
        </div>
    </div>
    <div class="header-nav layout-row">
        <a href="about-sri-lanka">About sri lanka</a>
        <a href="inbound">Inbound</a>
        <a href="outbound">Outbound</a>
        <a href="" class="site-logo">
		<img src="{{url('img/site-logo.png')}}"/></a>
        <a href="testimonials">Testimonials</a>
        <a href="news">News</a>
        <a href="promotions">Promotions</a>
    </div>
    <div class="mob-nav">
        <div class="tp-mob layout-row">
            <aside class="layout-row">
                <a href="" class="mob-site-logo">
			<img src="{{url('img/site-logo.png')}}"/></a>
                <div class="layout-row layout-align-start center title-font-con f-14">AMC Holidays</div>
            </aside>
            <aside class="layout-row layout-align-end center">
                <a href="" class="nav-bt" ng-click="mobNavOpen()">
                    <span></span>
                </a>
            </aside>
        </div>
        <div class="mob-nav-f layout-column layout-align-center center">
            <a href="" ng-click="closeNav()">Home</a>
            <a href="about-us" ng-click="closeNav()">About Us</a>
            <a href="about-sri-lanka" ng-click="closeNav()">About sri lanka</a>
            <a href="inbound" ng-click="closeNav()">Inbound</a>
            <a href="outbound" ng-click="closeNav()">Outbound</a>
            <a href="testimonials" ng-click="closeNav()">Testimonials</a>
            <a href="news" ng-click="closeNav()">News</a>
            <a href="promotions" ng-click="closeNav()">Promotions</a>
            <a href="contact-us" ng-click="closeNav()">Contact Us</a>
            <a href="gallery" ng-click="closeNav()">Gallery</a>
        </div>
    </div>
</header>