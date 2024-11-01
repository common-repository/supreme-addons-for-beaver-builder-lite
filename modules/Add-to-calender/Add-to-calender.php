<?php


/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class FLISModule
 */
class FLAddtoCalModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __(' Add to Calender', 'fl-builder'),
            'description'   => __('An basic example for coding new modules.', 'fl-builder'),
            'category'		=> __('Supreme Modules', 'Sabb'),
            'dir'           => BB_SUPREME_ADDON_DIR . 'modules/Add-to-calender',
            'url'           => BB_SUPREME_ADDON_DIR . 'modules/Add-to-calender',
            'group'         => 'Sabb',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLAddtoCalModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Event Add to Calender', 'fl-builder'), // Section Title
                'fields'        =>array(
                    'default_event_title' => array(
                        'type'          => 'text',
                        'label'         => __('Title', 'fl-builder'),
                        'default'       => '',
                        'help'          => 'Title comes here',
                       
                    ),'default_event_start' => array(
                        'type'          => 'text',
                        'label'         => __('  Start Date', 'fl-builder'),
                        'default'       => 'MM/DD/YYYY',
                        'help'          => 'Event Start date',
                       
                    ),'default_event_end' => array(
                        'type'          => 'text',
                        'label'         => __('  End Date', 'fl-builder'),                        
                        'default'       => 'MM/DD/YYYY',
                        'help'          => 'Event End date'
                       
                    ),'default_event_name' => array(
                        'type'          => 'text',
                        'label'         => __('Name', 'fl-builder'),
                        //'default'       => isset($get_event->address->city)?$get_eventaddress->city:"Please Select Event From The Top Event Setting Tab To Get Event Title",
                        'help'          => 'Event Name'
                       
                    ),'default_event_address' => array(
                        'type'          => 'text',
                        'label'         => __('Address', 'fl-builder'),
                        //'default'       => isset($get_event->address->city)?$get_eventaddress->city:"Please Select Event From The Top Event Setting Tab To Get Event Title",
                        'help'          => 'Event Address'
                       
                    )
          
          )
            )
        )
    )
));
