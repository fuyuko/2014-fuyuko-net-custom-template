/**
 * Created by fuyukogratton on 8/5/14.
 */

jQuery( document ).ready(function( $ ) {

    function grid_resize(){
        //get the vertical height of the product image
        var sample_grid = document.getElementById('grid-1');
        var new_height = sample_grid.offsetWidth;
        //apply to standard and metric that as its height
        for(i=1; i < 4; i++){
            var class_name = ".row-".concat(i);
            $(class_name).css( "height", new_height*i + "px");
        }

$(".vertical").css("height", "100%");
$(".vertical").css("width", "200%");
}

$( window ).load(function() {
    grid_resize();
    });

$( window ).resize(function() {
    grid_resize();
    });
});
