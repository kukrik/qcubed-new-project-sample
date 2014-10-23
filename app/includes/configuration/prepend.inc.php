<?php
	if (!defined('__PREPEND_INCLUDED__')) {
		// Ensure prepend.inc is only executed once
		define('__PREPEND_INCLUDED__', 1);


		///////////////////////////////////
		// Define Server-specific constants
		///////////////////////////////////	
		/*
		 * This assumes that the configuration include file is in the same directory
		 * as this prepend include file.  For security reasons, you can feel free
		 * to move the configuration file anywhere you want.  But be sure to provide
		 * a relative or absolute path to the file.
		 */
		if (file_exists(dirname(__FILE__) . '/configuration.inc.php')) {
			require(dirname(__FILE__) . '/configuration.inc.php');
		}
		else {
			// The minimal constants set to work
			define ('__DOCROOT__', dirname(__FILE__) . '/../..');
			define ('__INCLUDES__', dirname(__FILE__) . '/..');
			define ('__QCUBED__', __INCLUDES__ . '/qcubed');
			define ('__PLUGINS__', __QCUBED__ . '/plugins');
			define ('__QCUBED_CORE__', __INCLUDES__ . '/qcubed/_core');
			define ('__APP_INCLUDES__', __INCLUDES__ . '/app_includes');
			define ('__MODEL__', __INCLUDES__ . '/model' );
			define ('__MODEL_GEN__', __MODEL__ . '/generated' );
		}

               
		//////////////////////////////
		// Include the QCubed Framework
		//////////////////////////////
		require(__QCUBED_CORE__ . '/framework/DisableMagicQuotes.inc.php');
		require(__QCUBED_CORE__ . '/qcubed.inc.php');
                
		///////////////////////////////
		// Define the Application Class
		///////////////////////////////
		/**
		 * The Application class is an abstract class that statically provides
		 * information and global utilities for the entire web application.
		 *
		 * Custom constants for this webapp, as well as global variables and global
		 * methods should be declared in this abstract class (declared statically).
		 *
		 * This Application class should extend from the ApplicationBase class in
		 * the framework.
		 */
		abstract class QApplication extends QApplicationBase {
			/**
			 * This is called by the PHP5 Autoloader.  This method overrides the
			 * one in ApplicationBase.
			 *
			 * @return void
			 */
			public static function Autoload($strClassName) {
				// First use the QCubed Autoloader
				if (!parent::Autoload($strClassName)) {
					// TODO: Run any custom autoloading functionality (if any) here...
                                            // Transform a class name that looks like "ControllerAction" to "/controller/action"
                                           $strClassPath = preg_replace_callback("/[A-Z]+/", function ($matches) { return strtolower(DIRECTORY_SEPARATOR .$matches[0]); },  $strClassName);
                                           $strFilePath = sprintf('%s%s.class.php', __PROJECT__. '/controller', $strClassPath);
                                                if (file_exists($strFilePath = sprintf('%s%s.class.php', __PROJECT__. '/controller', $strClassPath))) {
                                                require($strFilePath);
                                            }
				}
			}

			////////////////////////////
			// QApplication Customizations (e.g. EncodingType, etc.)
			////////////////////////////
			// public static $EncodingType = 'ISO-8859-1';

                        // Authentication class
                        // Use it with     QApplication::Authenticate();   at the end of controller class before Form Run line
                        // we need user table with 
                         public static function Authenticate(){
                                $currentPage = $_SERVER['REQUEST_URI'];  
                                // User authentication
                                if (!isset($_SESSION['User'])){
                                    self::Redirect('login?strReferrer='.urlencode($currentPage)); // If not authenticated redirect to login with url referrer
                                 }
                                $objUser = unserialize($_SESSION['User']);

                                // make sure no errors occurred in translation and the session's User variable is a User object
                                if (!($objUser instanceof User)){
                                QApplication::Redirect('index');
                                }
                               
                                // End user authentication
                                
                                
                        }

               
            
                        
                        
			////////////////////////////
			// Additional Static Methods
			////////////////////////////
			// TODO: Define any other custom global WebApplication functions (if any) here...
                        
                        /* This is the Dispatcher function that will convert url parameters to class names.
                            * Using PathInfo(), You could use query strings instead depending on your htaccess file.
                            */
                           public static function Dispatcher(){
                               $strController = QApplication::PathInfo(0);
                               
                               // Custom home page
                               if (!$strController ){
                                   $strClassName = 'Index';
                               }
                               // If there is a controller, but no action ( We don't use actions only get and post parameters)
                               elseif (ctype_alpha($strController) && QApplication::PathInfo(1)=='' ) {
                                   $strClassName = ucfirst(strtolower($strController));
                               }
                               // In all other situations, show a custom 404
                               else {
                                   $strClassName = 'Classnotfound';
                               }
                               // Check if the class exists through lazy loading, and else set to 404
                               if (!class_exists($strClassName)) {
                                   $strClassName = 'ClassNotfound';
                               }
                               // Return the class name
                               return $strClassName;
                           }
                           /* Dispatcher end */
                        
		}
    
		// Register the autoloader
		spl_autoload_register(array('QApplication', 'Autoload'));

		//////////////////////////
		// Custom Global Functions
		//////////////////////////	
		// TODO: Define any custom global functions (if any) here...

		////////////////
		// Include Files
		////////////////
		// TODO: Include any other include files (if any) here...


		///////////////////////
		// Setup Error Handling
		///////////////////////
		/*
		 * Set Error/Exception Handling to the default
		 * QCubed HandleError and HandlException functions
		 * (Only in non CLI mode)
		 *
		 * Feel free to change, if needed, to your own
		 * custom error handling script(s).
		 */
		if (array_key_exists('SERVER_PROTOCOL', $_SERVER)) {
			set_error_handler('QcodoHandleError', error_reporting());
			set_exception_handler('QcodoHandleException');
		}


		////////////////////////////////////////////////
		// Initialize the Application and DB Connections
		////////////////////////////////////////////////
		QApplication::Initialize();
		QApplication::InitializeDatabaseConnections();
		// Check if we are going to override PHP's default session handler
		QApplication::SessionOverride();


		/////////////////////////////
		// Start Session Handler (if required)
		/////////////////////////////
		session_start();


                
		//////////////////////////////////////////////
		// Setup Internationalization and Localization (if applicable)
		// Note, this is where you would implement code to do Language Setting discovery, as well, for example:
		// * Checking against $_GET['language_code']
		// * checking against session (example provided below)
		// * Checking the URL
		// * etc.
		// TODO: options to do this are left to the developer
		//////////////////////////////////////////////
		if (isset($_SESSION)) {
			if (array_key_exists('country_code', $_SESSION)){
                        QApplication::$CountryCode = $_SESSION['country_code'];}
			if (array_key_exists('language_code', $_SESSION)){
                        QApplication::$LanguageCode = $_SESSION['language_code'];}
		}

		// Initialize I18n if QApplication::$LanguageCode is set
               // $lang=  QApplication::$LanguageCode ;
		if (QApplication::$LanguageCode){
			QI18n::Initialize();
//		} elseif ( isset($_SESSION['User'])){                                
//                     $objUser = unserialize($_SESSION['User']);    
//                     QApplication::$CountryCode = $objUser->Countrycode ;
//		     QApplication::$LanguageCode = $objUser->Langcode ;
//		     QI18n::Initialize();
                }
                else {
			// QApplication::$CountryCode = 'us';
			// QApplication::$LanguageCode = 'en';
			// QI18n::Initialize();
		}
                
                
                
		require(__APP_INCLUDES__ . '/app_includes.inc.php');
	}
?>