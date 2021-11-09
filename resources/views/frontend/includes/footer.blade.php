<footer>
    <div class="footer layout-row layout-wrap">
        <aside class="footer-col layout-m-flex-50">
            <h4>NAVIGATION</h4>
            <div><a href="">Home</a></div>
            <div><a href="">About Us</a></div>
            <div><a href="">Testiminials</a></div>
            <div><a href="">News</a></div>
            <div><a href="">Promotions</a></div>
            <div><a href="">Contect Us</a></div>
        </aside>
        <aside class="footer-col layout-m-flex-50" ng-controller="inboundDataCtrl">
            <h4>TOP PACKAGES</h4>
            <div ng-repeat="p in inboundPkg">
				<a href="" ng-bind="p.pkg_title"></a></div>

        </aside>
        <aside class="footer-col layout-m-flex-50" ng-controller="outboundDataCtrl">
            <h4>OUTBOUND</h4>
            <div ng-repeat="p in outboundPkg">
				<a href="" ng-bind="p.pkg_title"></a></div>

        </aside>
        <aside class="footer-col layout-column layout-m-flex-50">
            <aside>
                <h4>WE ACCEPT</h4>
                <!--<i class="fa fa-cc-visa f-32" aria-hidden="true"></i>-->
                <!--<i class="fa fa-cc-mastercard f-32" aria-hidden="true"></i>-->
                <img style="max-width: 100px" src="{{url('img/frontend/payments.png')}}"/>
            </aside>
            <aside>
                <h4>LANGUAGE</h4>
                <p>Select Language</p>
                <div id="google_translate_element"></div>
            </aside>

            <!--<div><a href="">Places to Visit</a></div>
            <div><a href="">Accommodation</a></div>-->
        </aside>
        <aside class="footer-col layout-m-flex-50">
            <h4>CONTACT US</h4>
            <p>No.70 -1/10, Lucky Plaza, St.Anthony’s Mawatha, Colombo - 03<br>Sri Lanka </p>
            <p>+94 774401486 | +94 112577188</p>
            <p>anura@amcholidays.com <br>tours@amcholidays.com </p>
        </aside>

    </div>
    <div class="footer-btm mt-lg">
        <div>
            <p class="mt-3"><i class="fa fa-copyright" aria-hidden="true"></i>Copyright 2018 | AMC Holidays | All Rights Reserved</p>
        </div>
    </div>
</footer>