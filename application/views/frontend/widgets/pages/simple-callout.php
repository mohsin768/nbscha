
<!-- Diver: Video Background  -->
<section class="divider parallax layer-overlay pt-10 pb-20 overlay-theme-colored-9" data-bg-img="" data-parallax-ratio="0.7">
    <div class="container pt-60 pb-50">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
        <div class="col-md-6 p-20 pt-0">
            <h3 class="text-white text-uppercase font-30 font-weight-600 mt-0 mb-20">How NBSCHA works for you?</h3>
            <p class="text-white lead p-5 pl-0 text-left">The association does for its members what they cannot easily do for themselves. The Group Benefit program has been helpful to many and has potential to improve and expand. Working with government on wage, per diem, and issues of standards is a very important role that no individual home can do.</p>
            <p class="text-white lead text-left">
                                                    The re-branding as illustrated in these videos is yet another major element of service.  The new corporate structure of the association represents a commitment to strengthen its organization in its drive to become increasingly strong as a support to individual homes.  Enhanced and expanded education, group purchasing, collaboration with government and other associations is yet another role.  The association becomes stronger as more service providers get involved.</p>
        </div>
        <div class="col-md-6">
            <div class="fluid-video-wrapper">
            <!-- <iframe width="100%" height="371" src="https://nbscha.ca/public/video/NBSCHA-MASTER-Sept-8-2020.mp4?rel=0" allowfullscreen></iframe> -->
            <img src="https://nbscha.ca/public/btnplaybtn.png" id="playbtnimg" style="             width: 100px;
                position: absolute;
                left: 40%;
                top: 35%;
            ">
            <video id="mediavid" width="100%" height="371" controls="" name="media"><source src="https://nbscha.ca/public/video/nbcsha-quality.mp4" type="video/mp4"></video>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<script>
	window.mobileCheck = function() {
	  let check = false;
	  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	  return check;
	};
	if(mobileCheck){
		var vid = document.getElementById("mediavid");
		vid.addEventListener('play',function(){
			$("#playbtnimg").hide();
		});
		vid.addEventListener('pause',function(){
			$("#playbtnimg").show();
		});
	}

</script>