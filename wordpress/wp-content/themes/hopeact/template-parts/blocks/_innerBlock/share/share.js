/*********************************
    Share JS Class
*********************************/
// IF THIS FILE IS NOT USED REMOVE IT

// Init JS class object
const fn__shareBlock = new Fn__ShareBlock();

// Init JS methods on Doc Ready
jQuery(document).ready(function ($) {
    fn__shareBlock.init();
});


/**
 * Functions used for the block
 * 
 * @constructor
 */
function Fn__ShareBlock() {
    let $ = jQuery;
    let $this = this;
    let vars = {};

    /**
     * INIT Function - Fired on doc ready
     *
     * @example
     * fn__shareBlock.init();
     */
    this.init = function () {

        // Init Click Events
        $this.click_events();

    };

    /**
    * Function - Set up click events
    */
    this.click_events = function () {

    }

    return this;
};