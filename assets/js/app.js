jQuery(document).ready(function($) {
    $('.ba-slider').beforeAfter();
        // jQuery('#q_data').DataTable ({
        //       "bLengthChange": false,
        //       "bAutoWidth" : true,
		//       "bProcessing": true,
		// 	  "bServerSide": false,
		// 	url : datatablesajax.ajaxurl
        //     });
    });


function myFunction(imgs) {
    let main = document.getElementById("main");
    let compare = document.getElementById("compare");
    let container = document.getElementById("container")

    console.log(imgs)

    // let name = imgs.src
    // name = name.slice( - (7 - name.length) , name.length)
    // let letter_index = name.slice(0, 1)
    // let number_index = Number(name.slice(1, 2))
    //
    main.src = imgs.before_img;
    // if ( letter_index ) {
        compare.src = imgs.after_img
        container.style.display = "block"

        // initComparisons()
    // }
}

function initComparisons() {
    let x, i;
    x = ''
    i = ''
    let p = ''
    /*find all elements with an "overlay" class:*/
    x = document.getElementsByClassName("img-comp-overlay");
    for (i = 0; i < x.length; i++) {
        /*once for each "overlay" element:
        pass the "overlay" element as a parameter when executing the compareImages function:*/
        compareImages(x[i]);
    }
    function compareImages(img) {
        let slider, clicked = 0, w, h;

        /*get the width and height of the img element*/
        w = img.offsetWidth;
        h = img.offsetHeight;

        /*create slider:*/
        slider = document.createElement("DIV");
        // slider.removeAttribute( "img-comp-slider" );
        p = document.getElementsByClassName("img-comp-slider")
        if (p.length < 1 ) {
            /*set the width of the img element to 50%:*/
            img.style.width = (w / 2) + "px";
            img.style.width = img.style.width + " !important";
            slider.setAttribute("class", "img-comp-slider");
        }

        /*insert slider*/
        img.parentElement.insertBefore(slider, img);
        /*position the slider in the middle:*/
        slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
        slider.style.top = slider.style.top + " !important";
        slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
        slider.style.left = slider.style.left + " !important";
        /*execute a function when the mouse button is pressed:*/
        slider.addEventListener("mousedown", slideReady);
        /*and another function when the mouse button is released:*/
        window.addEventListener("mouseup", slideFinish);
        /*or touched (for touch screens:*/
        slider.addEventListener("touchstart", slideReady);
        /*and released (for touch screens:*/
        window.addEventListener("touchend", slideFinish);
        function slideReady(e) {
            /*prevent any other actions that may occur when moving over the image:*/
            e.preventDefault();
            /*the slider is now clicked and ready to move:*/
            clicked = 1;
            /*execute a function when the slider is moved:*/
            window.addEventListener("mousemove", slideMove);
            window.addEventListener("touchmove", slideMove);
        }
        function slideFinish() {
            /*the slider is no longer clicked:*/
            clicked = 0;
        }
        function slideMove(e) {
            let pos;
            /*if the slider is no longer clicked, exit this function:*/
            if (clicked == 0) return false;
            /*get the cursor's x position:*/
            pos = getCursorPos(e)
            /*prevent the slider from being positioned outside the image:*/
            if (pos < 0) pos = 0;
            if (pos > w) pos = w;
            /*execute a function that will resize the overlay image according to the cursor:*/
            slide(pos);
        }
        function getCursorPos(e) {
            let a, x = 0;
            e = (e.changedTouches) ? e.changedTouches[0] : e;
            /*get the x positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x coordinate, relative to the image:*/
            x = e.pageX - a.left;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            return x;
        }
        function slide(x) {
            /*resize the image:*/
            img.style.width = x + "px";
            img.style.width = img.style.width + " !important"
            /*position the slider:*/
            slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
            slider.style.left = slider.style.left + " !important"
        }
    }
}