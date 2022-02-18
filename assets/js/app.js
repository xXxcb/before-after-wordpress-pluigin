jQuery(document).ready(function($) {
    $('.ba-slider').beforeAfter();
});

function myFunction(imgs) {
    let main = document.getElementById("main");
    let compare = document.getElementById("compare");

    main.src = imgs.before_img;
    compare.src = imgs.after_img;
}

( function($) {
    function drags(dragElement, resizeElement, container) {

        // Initialize the dragging event on mousedown.
        dragElement.on('mousedown.ba-events touchstart.ba-events', function(e) {

            dragElement.addClass('ba-draggable');
            resizeElement.addClass('ba-resizable');

            // Check if it's a mouse or touch event and pass along the correct value
            let startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

            // Get the initial position
            let dragWidth = dragElement.outerWidth(),
                posX = dragElement.offset().left + dragWidth - startX,
                containerOffset = container.offset().left,
                containerWidth = container.outerWidth();

            // Set limits
            minLeft = containerOffset + 1;
            maxLeft = containerOffset + containerWidth - dragWidth - 1;

            // Calculate the dragging distance on mousemove.
            dragElement.parents().on("mousemove.ba-events touchmove.ba-events", function(e) {

                // Check if it's a mouse or touch event and pass along the correct value
                let moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

                leftValue = moveX + posX - dragWidth;

                // Prevent going off limits
                if ( leftValue < minLeft) {
                    leftValue = minLeft;
                } else if (leftValue > maxLeft) {
                    leftValue = maxLeft;
                }

                // Translate the handle's left value to masked divs width.
                widthValue = (leftValue + dragWidth/2 - containerOffset)*100/containerWidth+'%';

                // Set the new values for the slider and the handle.
                $('.ba-draggable').css('left', widthValue);
                $('.ba-resizable').css('width', widthValue);
                // Bind mouseup events to stop dragging.
            }).on('mouseup.ba-events touchend.ba-events touchcancel.ba-events', function(){
                dragElement.removeClass('ba-draggable');
                resizeElement.removeClass('ba-resizable');
                // Unbind all events for performance
                $(this).off('.ba-events');
            });
            e.preventDefault();
        });
    }

    // Define plugin
    $.fn.beforeAfter = function() {
        var cur = this;
        // Adjust the slider
        var width = cur.width()+'px';
        cur.find('.resize img').css('width', width);
        // Bind dragging events
        drags(cur.find('.handle'), cur.find('.resize'), cur);

        // Update sliders on resize.
        // Because we all do this: i.imgur.com/YkbaV.gif
        $(window).resize(function(){
            var width = cur.width()+'px';
            cur.find('.resize img').css('width', width);
        });
    }
}(jQuery));