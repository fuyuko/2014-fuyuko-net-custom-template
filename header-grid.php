<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 8/4/14
 * Time: 6:59 AM
 */


/****************************************************************
 *
 * Grid Layout:
 *
 *
 *
 *  column: | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |10 |
 *
 *          -----------------------------------------
 *          | 1 | 2 |           | 7 |10 |       |15 |
 *          ---------           ---------  12   -----
 *          |   3   |     6     | 8 |   |       |   |
 *          ---------           -----11 ---------16 -
 *          | 4 | 5 |           | 9 |   |13 |14 |   |
 *          -----------------------------------------
 *
 *
 ****************************************************************/
?>


<div id="grids" class="row-3">
    <div class="column-2">
        <div class="row-1">
            <div id="grid-1" class="grid column-5">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-1.png" />'; ?>
            </div>
            <div id="grid-2" class="grid column-5">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-2.png" />'; ?>
            </div>
        </div>
        <div class="row-1">
            <div id="grid-3" class="grid column-10">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-3.png" />'; ?>
            </div>
        </div>
        <div class="row-1">
            <div id="grid-4" class="grid column-5">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-4.png" />'; ?>
            </div>
            <div id="grid-5" class="grid column-5">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-5.png" />'; ?>
            </div>
        </div>
    </div>
    <div id="grid-6" class="grid column-3">
        <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-6.png" />'; ?>
    </div>
    <div class="column-1">
        <div class="row-1">
            <div id="grid-7" class="grid column-10">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-7.png" />'; ?>
            </div>
        </div>
        <div class="row-1">
            <div id="grid-8" class="grid column-10">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-8.png" />'; ?>
            </div>
        </div>
        <div class="row-1">
            <div id="grid-9" class="grid column-10">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-9.png" />'; ?>
            </div>
        </div>
    </div>
    <div class="column-1">
        <div class="row-1">
            <div id="grid-10" class="grid column-10">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-10.png" />'; ?>
            </div>
        </div>
        <div class="row-2">
            <div id="grid-11" class="grid column-10">
                <?php echo '<img class="vertical" src="' . get_template_directory_uri() . '/images/header/header-11.png" />'; ?>
            </div>
        </div>
    </div>
    <div class="column-2">
        <div class="row-2">
            <div id="grid-12" class="grid column-10">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-12.png" />'; ?>
            </div>
        </div>
        <div class="row-1">
            <div id="grid-13" class="grid column-5">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-13.png" />'; ?>
            </div>
            <div id="grid-14" class="grid column-5">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-14.png" />'; ?>
            </div>
        </div>
    </div>
    <div class="column-1">
        <div class="row-1">
            <div id="grid-15" class="grid column-10">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/header/header-15.png" />'; ?>
            </div>
        </div>
        <div class="row-2">
            <div id="grid-16" class="grid column-10">
                <?php echo '<img class="vertical" src="' . get_template_directory_uri() . '/images/header/header-16.png" />'; ?>
            </div>
        </div>
    </div>

</div>