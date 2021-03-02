$(document).ready(function(){
    /*preloader*/
    setTimeout(function(){
        $('.preloader').fadeOut(200);
        setTimeout(function(){
            $(document).scrollTop(0); 
        },210);  
    },200);
    /*display name of uploaded file*/
    $('#curriculum').change(function() {
        var file = $('#curriculum')[0].files[0].name;
        $("#fileName").text(file);
    });
    /*hide pause icon in ourconcept animation section by default*/
    $("#pauseIcon").hide();
    $("#uparrow").hide();
    /*part of rating system in products.html --> displaying of the stars*/
    $(".star").addClass("noSelect");
    $("input[type=radio]").click(function(){
        $(".star").removeClass("noSelect");
        var val=$("input[name=rate]:checked").val();
        for(var i=0;i<val;i++){
            var textVal;
            switch(i){
                case 1:
                    textVal="one";
                    break;
                case 2:
                    textVal="two";
                    break;
                case 3:
                    textVal="three";
                    break;
                case 4:
                    textVal="four";
                    break;
                case 5:
                    textVal="five";
                    break;
            }
            $("label[for="+textVal+"]").addClass("selectedBefore");
        }
        for(var i=0;i<=5;i++){
            var textVal;
            switch(i){
                case 1:
                    textVal="one";
                    break;
                case 2:
                    textVal="two";
                    break;
                case 3:
                    textVal="three";
                    break;
                case 4:
                    textVal="four";
                    break;
                case 5:
                    textVal="five";
                    break;
            }
            if($("label[for="+textVal+"]").hasClass("selectedBefore")&&i>=val){
                $("label[for="+textVal+"]").removeClass("selectedBefore");
            }
        }
    });
	/*von Felix, ein Versuch das Svg zu animieren
	$("circle").hover(function() {
		console.log("TEST START");
		var anim = document.getElementById("anim1");
		anim.addEventListener('myEvent', function() {
			anim.beginElement();
		})
	}, function() {
		
		console.log("TEST END");
	});*/
});
$(window).scroll(function(){
    /*onscroll navigation bar*/
    if($(document).scrollTop() > 50 && $('.preloader').css("display") == "none"){
        $('nav').addClass('onscroll_nav');
    }else{
        $('nav').removeClass('onscroll_nav');
    }
	toScroll = $(document).height() - $(window).height() - 250;
    //when too display which nextsection arrows
    if ( $(this).scrollTop() > toScroll ) {
        $("#downarrow").hide();
        if($(document).width() > 950) {$("#uparrow").show();}
	}else if($(document).scrollTop()==0){
        $("#uparrow").hide();
        if($(document).width() > 950) {$("#downarrow").show();}
    }
});
/**
 * this function scrolls the page down the height of one section == 100vh 
 */ 
function downScrollIt(){
    var vheight=document.documentElement.clientHeight;
    var step=0;
    if($(document).scrollTop() > 0){
        step=vheight;
    }
	var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var test=1000;
	if ((scrollHeight-scrollPosition)<test) {
        $("html, body").animate({ scrollTop: $(document).height() }, 800);
        return false;      
	}
    $("body,html").animate({scrollTop: vheight+=step},800);
}
/**
 * this function scrolls the page up to the top
 */
function upScrollIt(){
    $("body,html").animate({scrollTop: 0},800);
}


/**
 * sidebar navigation mobile
 */
function showSidebar(){
    document.getElementById("toggle-btn").classList.toggle("show");
    document.getElementById("sidebar").classList.toggle("show");
    document.getElementById("body_wrapper").classList.toggle("show");
}
/**
 * this function fills the subject if url parameter is given
 */
function fillSubject(){
    fillField("subjectURL","subject");
    fillField("emailURL","email");
}
/**
 * fills the subject field if URL-Params "subjectURL" or any other are given 
 * used in our products --> choose one --> click on buy
 * --> subject in contact form changes
 */
function fillField(urlParamName, idToChangeVal) {
    var url_string = window.location.href;
    var url = new URL(url_string);
    //get value of urlParam by urlParamName
    var urlParamVal = url.searchParams.get(urlParamName);
    if(urlParamVal != null){
        document.getElementById(idToChangeVal).value=urlParamVal;
    }
}
/**
 * shows popup if url param is given --> shows popup after sending a contact request
 */
function showPopup() {
    var url_string = window.location.href; 
    var urlParamI = url_string.lastIndexOf("?");
    var url = new URL(url_string);
    var popup = url.searchParams.get("popup");
    var test=document.getElementsByTagName("body");
    if(popup!=null){
        var textnode=document.createTextNode("Sent successfully!");
        var node=document.createElement("div");
        node.appendChild(textnode);
        node.id="popup";
        document.getElementsByTagName('body')[0].appendChild(node);
            setTimeout(function(){
                $("#popup").fadeOut(300);
            },800);          
            setTimeout(function(){
                if(urlParamI!=-1){
                    var test=url_string.substring(0,urlParamI);
                }    
                window.location.replace(test);
            },1100);
    }
}
/**
 * this function opens a popup form when clicking on rate 
 * this product in the customer testimonials section
 */
function popupForm(){
    var popup=document.getElementById("popupForm");
    popup.style.visibility="visible";
    popup.style.height="auto";
    popup.style.padding="2em";
}

/**
 * this function closes the popup form from above again when clicking on the 
 */
function closeForm(){
    var popup=document.getElementById("popupForm");
    popup.style.visibility="hidden";
    popup.style.height="0";
    popup.style.padding="0";
}

/**
 * this function retrieves the testimonials - data from my database 
 * lying on the ossblog.at server
 */
function getTestimonials(){
    $.ajax({
        url:'getTestimonial.php',
        method:'GET',
        dataType: 'html',
        success: function(data){
            console.log("success");
            $("#sliderwrap").append(data);
            testimonialSlider();
        },
        error:function(data){
            console.log("error");
        }
    });
}

function testimonialSlider() {
    /*
    testimonial slider with slick plugin:
    ich habe alles selbst gecodet vom design und dem rating formular bis zur datenbank anbindung und abrufung
    dieses plugin dient nur der darstellung als slider weil ich keine lust und zeit mehr hatte das zu machen. LG Ben :)
    */
    $('#sliderwrap').slick({
        dots: true,
        infinite: true,
        speed: 600,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<div class="leftarrow" id="leftarrow"><svg style="transform:rotate(90deg);z-index:1000000;" xmlns="http://www.w3.org/2000/svg" width="16" height="9" viewBox="0 0 16 9"><path fill="#FFF" fill-rule="evenodd" d="M0 1.519L1.5.185 8 5.963 14.5.185 16 1.52l-8 7.11z"></path></svg></div>',
        nextArrow: '<div class="rightarrow" id="rightarrow"><svg style="transform:rotate(-90deg);" xmlns="http://www.w3.org/2000/svg" width="16" height="9" viewBox="0 0 16 9"><path fill="#FFF" fill-rule="evenodd" d="M0 1.519L1.5.185 8 5.963 14.5.185 16 1.52l-8 7.11z"></path></svg></div>',
        responsive: [
        {
            breakpoint: 1024,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            }
        }
        ]
    });
}

/**
 *  functionality of the getInTouch - Field in the footer area
 */
function getInTouch() {
    var x = document.getElementById("getInTouchText").value;
    window.location.href = "contact.html?emailURL="+x;
}

/* Ich versuche hier was. Kein Plan ob das so funktioniert ~Felix*/
function chooseJob(location) {
	var jobs = document.getElementsByClassName("job");
	for(var i=0;i < jobs.length; i++) {
		jobs[i].setAttribute("style", "display:none");
	}
	switch(location) {
		case "Vienna":
            document.getElementsByClassName("jobWien")[0].setAttribute("style", "display:flex");
			break;
		case "Salzburg":
			document.getElementsByClassName("jobSalzburg")[0].setAttribute("style", "display:flex");
			break;
		case "Klagenfurt":
			document.getElementsByClassName("jobKlagenfurt")[0].setAttribute("style", "display:flex");
			break;
		default:
			console.log("Error");
			document.getElementsByClassName("default")[0].setAttribute("style", "display:flex");
	}
}

/**
 * this function gives the playPause functionality to the 
 * buttons in the animation section (ourconcept.html)
 */
function playPause() { 
    var playIcon = document.getElementById("playIcon");
    var pauseIcon = document.getElementById("pauseIcon");
    var animation = document.getElementById("sf_animation");
    if (animation.paused) {
        animation.play(); 
        playIcon.style.display = "none";
        pauseIcon.style.display = "block";
    }else {
        animation.pause(); 
        playIcon.style.display = "block";
        pauseIcon.style.display = "none";
    }
    if(animation.currentTime = 0){
        playIcon.style.display = "block";
        pauseIcon.style.display = "none";
    }
} 

/**
 * this function restarts the animation (ourconcept.html)
 */
function restart() {
    document.getElementById("sf_animation").currentTime = 0;
}

/**
 * this function show a timer of  the animation (ourconcept.html)
 */
function whereInVid(){
    setInterval(function() {
        var animation = document.getElementById("sf_animation");
        var whereYouAt = animation.currentTime;
        var minutes = Math.floor(whereYouAt / 60);   
        var seconds = Math.floor(whereYouAt - minutes * 60)
        var x = minutes < 10 ? "0" + minutes : minutes;
        var y = seconds < 10 ? "0" + seconds : seconds;
    
        document.getElementById("currentTime").innerHTML = x + ":" + y;
    
    }, 400);
}