<?php defined('ABSPATH') or die("No script kiddies please!");  ?>
<div class="et-settings-main-wrapper">
<div class="et-header">
<div class="et-header-section">
<div class="et-left-wrap et-clearfix">
<div class="et-plugin-logo">
   <img src='<?php echo ETAB_IMAGE_DIR; ?>everest-tab-logo-backend.png' alt="plugin-logo" /> 
</div>
<div class="et-settings-title">
       <?php esc_html_e(' How To Use', ETAB_TD); ?>
</div>
</div>
</div>
</div>
<div class="et-container etab-about-main-wrapper">
<div class="etab-column-one-wrap">
    <div class="etab-panel-body">
        <div class="etab-row">
            <div class="etab-col-three-third">
                <h2><?php esc_html_e('How To Use',ETAB_TD); ?></h2>
               
                <div class="egpr-tab-wrapper">
                    
            <div class="etab-main-wrap etab-htu-settings">
            <div class="etab_main_wrapper etab_clearfix">
               <h5><?php esc_html_e('For detailed documentation, please visit here. ',ETAB_TD); ?><a href="https://accesspressthemes.com/documentation/everest-tab/" target="_blank">VIEW DOCUMENTATION</a></h5>
                <p>
                <b><?php esc_html_e('Everest Tab' ,ETAB_TD); ?> </b> <?php esc_html_e('is one of the is one of the best premium wordpress tab plugin to show different components as content inside tab with 22 pre available beautiful and responsive tab layouts.',ETAB_TD);
                 ?>
                </p>
                <p>
                 <?php 
                 esc_html_e(' A standout amongst the most powerful tab display platform with 22 pre available templates to show various components in its specific tab content section in an most attractive and easy way.
                    Display tab components using generated shortcode or even transform your own custom html data into tab layout more easily.',ETAB_TD);?>
                </p>
                <p>
                 <?php 
                     esc_html_e('This plugin is useful since you can display different components such as html, social feeds, recent posts, woocommmerce products, contact form , google map integration and many more with tab layout.',ETAB_TD); ?>
                </p><p>
                    <?php 
                     esc_html_e(' There are basically 3 main plugin configuration settings which are described below more briefly.',ETAB_TD); ?>
                </p>
                  <div class="etab-content-section">
                        <h5><?php esc_html_e('Social Feeds Settings',ETAB_TD); ?></h5>
                        <p><?php  esc_html_e('Our plugin also provide feature to add different components on specific tab content section. One of them includes Social Feeds. This tab is required to fill the api key, token key ,access key for neccessary social media so that it will help you to display specific feeds on specific tab content
                        as per setup.
                        This tab includes api setup for social feeds such as facebook,twitter and
                        google map integration api key.',ETAB_TD); ?>
                        </p>
                         
                        <h5><?php  esc_html_e('Cache Settings',ETAB_TD); ?></h5>
                        <p><?php  esc_html_e('The plugin has inbuilt caching method to prevent the frequent API calls due to which site won’t get slow. So in this tab you can set up the cache period on how often the latest social feeds should be fetched from API.
                        Fill the time in hours in which social feeds should be updated. Default is 24 hours. The minimum cache period you can setup is 1 hour.',ETAB_TD); ?>
                        </p>

                        <h5><?php  esc_html_e('Shortcode Settings',ETAB_TD); ?></h5>
                        <p><?php  esc_html_e('The plugin has inbuilt shortcodes. Basically you will find shortcode in this plugin. One shortcode will be automatically generated after you create new tab post type data from "Everest Tab" > Add New. Here create tab system which after save will provide you shortcode with specific tab id . This shortcode , you can use anywhere to display tab form as per your setup.',ETAB_TD); ?>
                        </p>
                        <p><?php  esc_html_e('Another shortcode is related with this tab. In order to activate shortcode you need to enable "Enable Shortcode Generator" button at first on this tab page.
                        After enabling this button, you will find "Everest Tab Shortcode" button on specific edit page,post or post type top of wp editor.
                        Using this shortcode generator you can create any html content and transform it into beatufully designed tab layout using our plugin simply by assigned available templates.',ETAB_TD); ?>
                        </p>

                        <h5><?php  esc_html_e('All Everest Tabs',ETAB_TD); ?></h5>
                        <p><?php  esc_html_e('Create multiple tabs and assign each tab with different 6 available components and display it using its specific tab anywhere you prefer.
                            There is mainly 1 "Main Common Settings" for overall tab configuration setup and "Tab Settings" to create multiple tab and assign components for specific tab content.',ETAB_TD); ?>
                            
                        </p>
                        <div class="second-info">
                        <h5><?php  esc_html_e('1. Main Settings',ETAB_TD); ?></h5>
                        <p><?php  esc_html_e('This settings is overall common main settings for specific tab. Here you can find 4 different tab options as "General Settings","Display Settings","Animation Settings", "Custom Styling" and "Background Image Settings".',ETAB_TD); ?>

                        </p>
                         <ul>
                            <li><strong><?php  esc_html_e('General Settings:',ETAB_TD); ?></strong>
                            <?php  esc_html_e('This tab options includes orientation type choose options as horizontal or vertical tab,choose tab position for horizontal and vertical orienation, choose icon position as left , right or top of the tab title. Also, tab label display format as show only title,show icon and title both or show only icon options
                            Even our plugin provides options to choose trigger event for tab as on click event or on hover and set total width column as per your requirement.',ETAB_TD); ?>
                             
                             <ul>
                                  <li><?php  esc_html_e('Orientation Type: Choose orientation type as horizontal or vertical type.',ETAB_TD); ?></li>
                                  <li><?php  esc_html_e('Tabs Position:',ETAB_TD); ?><?php  esc_html_e('Choose tab position according to orientation type. Horizontal orientation includes top left, top right, top center,top compact, bottom left, bottom right, bottom center and bottom compact. 
                                  Whereas, vertical orientation includes vertical top left and vertical top right position.',ETAB_TD); ?>
                                   </li>
                                  <li><?php  esc_html_e('Show Icon Position: Display tab icon position as left , right , top or bottom position of tab title.',ETAB_TD); ?></li>
                                  <li><?php  esc_html_e('Tab Labels Display Format: ',ETAB_TD); ?><?php  esc_html_e(' Set label display format as  Show Tab title only, Show icon and title both or Show icon only format type.',ETAB_TD); ?>
                                  </li>
                                  <li><?php  esc_html_e('Show Tab On:',ETAB_TD); ?><?php _e('Set tab event trigger effect as On Click or On hover effect. </li>
                                  <li>Width Column: Set total width column as per your requirement as 1 (15% Width),2 (32% Width),3 (50% Width),4 (66% Width),5 (83% Width) or 6 (100% Width) defined width.',ETAB_TD); ?>
                                   </li>
                                   <li><?php  esc_html_e('Enable Deeplinking: ',ETAB_TD); ?><?php esc_html_e('Enable and use deep-linking to create bookmarkable tabs and SEO-Friendly content.',ETAB_TD); ?>
                                    </li>
                              </ul>
                            </li>
                            <li><strong><?php  esc_html_e('Display Settings:',ETAB_TD); ?></strong> <?php esc_html_e('Altogether our plugin includes 22 beautifully designed template layout for tab. Here you can choose template layout for specific tab.',ETAB_TD); ?>
                            </li>
                            <li><strong><?php  esc_html_e('Animation Settings:',ETAB_TD); ?></strong> <?php esc_html_e('Enable animation and choose animation type for tab content.',ETAB_TD); ?>
                            </li>
                            <li><strong><?php  esc_html_e('Custom Styling Settings:',ETAB_TD); ?></strong> <?php esc_html_e('Set custom configuration for overall tab settings.You can change the color configuration for assigned template. There are many customization options such as set tab background color, background hover color, font color, font hover color, tab active background color , tab content color.',ETAB_TD); ?>
                             </li>
                             <li><strong><?php  esc_html_e('Background Image Settings:',ETAB_TD); ?></strong> <?php esc_html_e('Enable background image and upload background image for specific tab inside content section.',ETAB_TD); ?>

                              <p class="descripion"><?php esc_html_e('Note: This options is only available for 2 pre available template layout i.e for template 14 and template 15.',ETAB_TD); ?>
                              </p> 
                              </li>
                        </ul>
                        
                        <h5><?php  esc_html_e('2. Tab Settings',ETAB_TD); ?></h5>
                        <p><?php esc_html_e('This is the tab settings to create multiple tab and assign components for each tab.Below are options available on this settings described:',ETAB_TD); ?>

                        </p>
                        <ul>
                            <li>Active: <?php esc_html_e('Enable any one radio button among multiple tab in order to choose one tab as active by default.',ETAB_TD); ?></li>
                            <li>Tab Label : Fill tab title here.</li>
                            <li>Enable Description : <?php esc_html_e('Check to enable this button in order to display descripion for specific tab.',ETAB_TD); ?>
                            </li>
                            <li>Short Description: <?php esc_html_e('Fill Short Description here.',ETAB_TD); ?></li>
                            <li>Choose Icon Type : <?php _e('Choose icon as Available Fonts (Font Awesome/Dashicons/Genericons) or Upload your own custom icon here.</li>
                            <li>Choose Components : This options includes altogether 6 advanced components to fill on tab content which are mentioned below:',ETAB_TD); ?>
                                <ul>
                                  <li><strong>WYSIWYG Editor :</strong> <?php esc_html_e('Fill any html content here.',ETAB_TD); ?></li>
                                  <li><strong>Custom Link Tab :</strong> <?php esc_html_e('Set custom link and link target for this tab.',ETAB_TD); ?></li>
                                  <li><strong>Recent Posts:</strong><?php esc_html_e('Display recent post or products as tab content.',ETAB_TD); ?> </li>
                                  <li><strong>Social Feeds:</strong> <?php esc_html_e('Display social feeds such as facebook, twitter and RSS feeds with its different configuration options.',ETAB_TD); ?></li>
                                  <li><strong>Contact Form and Google Map:</strong> <?php esc_html_e('Show contact form 7 using "Contact Form 7 " Plugin or add any other custom form shortcode and show google map of specific latitude and longitude.',ETAB_TD); ?></li>
                                  <li><strong>External Shortcode : </strong><?php _e('Fill any external shortcode.',ETAB_TD); ?></li>
                                </ul>
                            </li>
                        </ul>
                        <h5><?php esc_html_e('Shortcode Settings',ETAB_TD); ?></h5>
                        <p><?php esc_html_e('You can get shortcode of specific tab post type from its edit page > Everest Tab Shortcode Usage metabox shown on left section or else you can get shortcode on main tab lists for specific tab on its specific row. For more details go to "Shortcode Settings" Tab.',ETAB_TD); ?>
                        </p>     
                </div>
   </div>
   </div>
  </div>
        </div>
    </div>
</div>
</div>
</div>
</div>