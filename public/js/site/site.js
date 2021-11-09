/**
 * Created by sasanka on 8/9/2017.
 */
$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    var windowWidth = $(window).width();
   // console.log(scroll);
        if (scroll >= 200){
            $(".site-logo").addClass("resize-logo")
        }else $(".site-logo").removeClass("resize-logo")
    //if (windowWidth >= 820){
      //  if (scroll >= 100) {
            //clearHeader, not clearheader - caps H
        //    $("header").addClass("scrolled")
        //}else  $("header").removeClass("scrolled")
   // }
});
