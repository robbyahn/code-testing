<?php
    class ThemePage extends Page {

        private static $db = array(        
            "ThemeList" => 'Text'
        );

        private static $has_one = array(            
        );    

        public function getThemeSet() {
            return $this->ThemeList;
        }

        public function getCMSFields() {                       
            $fields = parent::getCMSFields();
            $themesoptions = SiteConfig::current_site_config()->getAvailableThemes();   //get theme list 

            $fields->addFieldToTab("Root.Main", 
                DropdownField::create('ThemeList', 'choose a theme', $themesoptions)
            );

            return $fields;
        }
    }


    class ThemePage_Controller extends Page_Controller {
        private static $allowed_actions = array ();

        public function init() {           
            parent::init();           

            SSViewer::set_theme($this->getThemeSet());
        } 
    }