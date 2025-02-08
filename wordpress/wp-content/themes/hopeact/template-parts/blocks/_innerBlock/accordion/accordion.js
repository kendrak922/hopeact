/*********************************
    Accordion Tabs JS Class
*********************************/

// Init JS class object
const fn__accordionTabs = new Fn__AccordionTabs();

// Init JS methods on Doc Ready
jQuery(document).ready(function($){
    fn__accordionTabs.init();
});

// Create Resize event listener
jQuery(window).on('resize', function(e){
    // Swap "accordions -> tabs" layout sections
    // fn__accordionTabs.tabs_to_accordion(global.breakpoints.mobile);
});


/**
 * Functions used for the block 
 * 
 * @constructor
 */
function Fn__AccordionTabs() { 
    let $ = jQuery;
    let $this = this;
    let vars = {};


    /**
     * INIT Function - Fired on doc ready
     *
     * @example
     * fn__accordionTabs.init();
     */
    this.init = function () {
        // console.log('fn__accordionTabs.init()');
        // $this.tabs_to_accordion();
        $this.accordion_toggle();
        // Event Handlers
        $this.event_handlers();
    };


    /**
     * Event Handlers
     *
     * @example
     * fn__accordionTabs.accordion_toggle();
     */
    this.event_handlers = function () {
        if( $('.inner-block--accordion').length ){
            /***** ACCORDION TOGGLE *****/
            $(document).on('click', '.inner-block--accordion .accordionTab__trigger', function(e){
                $this.accordion_toggle(this);
            });
        }
    };


    /**
     * General function used to handle accordion sections
     *
     * @example
     * fn__accordionTabs.accordion_toggle();
     */
    this.accordion_toggle = function (trigger){
        let target = $(trigger).siblings('.accordionTab__content'); // get this accordion content
        let wrapper = $(trigger).closest('.accordionTabs__wrapper');
        // If not visible, show it. Else, hide all contents
        if( !$(target).is(':visible') ){
            // Close all - Comment out to allow multiple open at once
            $(wrapper).find('.accordionTab').removeClass('active');
            $(trigger).attr('aria-expanded', false);
            $(wrapper).find('.accordionTab__content').attr('aria-hidden', true);
            $(wrapper).find('.accordionTab__trigger').removeClass('active');
            $(wrapper).find('.accordionTab__content').slideUp();
            // Open This
            $(trigger).addClass('active');
            $(trigger).parent().addClass('active');
            $(trigger).attr('aria-expanded', true);
            $(target).slideDown(); 
            $(target).attr('aria-hidden', false);
        }else{
            // Close all
            $(wrapper).find('.accordionTab').removeClass('active');
            $(wrapper).find('.accordionTab__trigger').removeClass('active');
            $(trigger).attr('aria-expanded', false)
            $(wrapper).find('.accordionTab__content').slideUp();
            $(wrapper).find('.accordionTab__content').attr('aria-hidden', true);
        }
    };


    /**
     * General function used to handle accordion sections
     *
     * @example
     * fn__accordionTabs.tabs_toggle();
     */
    // this.tabs_toggle = function (trigger){
    //     // Define Vars
    //     let active = 'active',
    //         wrapper = $(trigger).closest('.accordionTabs__wrapper'),
    //         tab_id = $(trigger).attr('data-tab');
    //     // Disable current tab
    //     $(wrapper).find('.accordionTab__trigger').removeClass(active);
    //     $('.accordionTab__content.'+active).removeClass(active).stop(true).fadeOut(300, function(e){
    //         // Enable this tab
    //         $(trigger).addClass(active);
    //         $("#"+tab_id).addClass(active).stop(true).fadeIn(300);
    //     });
    // };


    /**
     * Window Resize event 
     *
     * @example
     * fn__accordionTabs.tabs_to_accordion();
     */
    // this.tabs_to_accordion = function (breakpoint) {
    //     if( $('.block--accordionTabs').length ){
    //         // console.log('fn__accordionTabs.tabs_to_accordion()');
    //         breakpoint = typeof breakpoint !== 'undefined' ? breakpoint : global.breakpoints.mobile;
    //         // If window width beyond defined breakpoint, swap layouts
    //         if( global.general.window_width > breakpoint ){
    //             // console.log('Tabs');
    //             // Update Dom
    //             $('[data-type="accordion-tabs"]').find('.accordionTabs__top div:first-child .accordionTab__trigger').addClass('active');
    //             $('[data-type="accordion-tabs"]').find('.accordionTabs__bottom div:first-child').slideDown();
    //             // Change data type
    //             $('[data-type="accordion-tabs"]').attr('data-type', 'tabs-accordion');
    //         }else{
    //             // console.log('Accordions');
    //             // Update Dom
    //             $('[data-type="tabs-accordion"] .accordionTab__trigger, [data-type="tabs-accordion"] .accordionTab__content').removeClass('active');
    //             $('[data-type="tabs-accordion"]').find('.accordionTab__trigger').removeClass('active');
    //             $('[data-type="tabs-accordion"]').find('.accordionTab__content').slideUp();
    //             // Change data type
    //             $('[data-type="tabs-accordion"]').attr('data-type', 'accordion-tabs');
    //         }
    //     }
    // };

    
    // return this;
};