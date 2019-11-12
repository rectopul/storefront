<?php

namespace MailPoetGenerated;

if (!defined('ABSPATH')) exit;


use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use MailPoetVendor\Symfony\Component\DependencyInjection\ContainerInterface;
use MailPoetVendor\Symfony\Component\DependencyInjection\Container;
use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\LogicException;
use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\RuntimeException;
use MailPoetVendor\Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class FreeCachedContainer extends Container
{
    private $parameters;
    private $targetDirs = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = [];
        $this->normalizedIds = [
            'mailpoet\\adminpages\\pagerenderer' => 'MailPoet\\AdminPages\\PageRenderer',
            'mailpoet\\adminpages\\pages\\experimentalfeatures' => 'MailPoet\\AdminPages\\Pages\\ExperimentalFeatures',
            'mailpoet\\adminpages\\pages\\formeditor' => 'MailPoet\\AdminPages\\Pages\\FormEditor',
            'mailpoet\\adminpages\\pages\\forms' => 'MailPoet\\AdminPages\\Pages\\Forms',
            'mailpoet\\adminpages\\pages\\help' => 'MailPoet\\AdminPages\\Pages\\Help',
            'mailpoet\\adminpages\\pages\\mp2migration' => 'MailPoet\\AdminPages\\Pages\\MP2Migration',
            'mailpoet\\adminpages\\pages\\newslettereditor' => 'MailPoet\\AdminPages\\Pages\\NewsletterEditor',
            'mailpoet\\adminpages\\pages\\newsletters' => 'MailPoet\\AdminPages\\Pages\\Newsletters',
            'mailpoet\\adminpages\\pages\\premium' => 'MailPoet\\AdminPages\\Pages\\Premium',
            'mailpoet\\adminpages\\pages\\revenuetrackingpermission' => 'MailPoet\\AdminPages\\Pages\\RevenueTrackingPermission',
            'mailpoet\\adminpages\\pages\\segments' => 'MailPoet\\AdminPages\\Pages\\Segments',
            'mailpoet\\adminpages\\pages\\settings' => 'MailPoet\\AdminPages\\Pages\\Settings',
            'mailpoet\\adminpages\\pages\\subscribers' => 'MailPoet\\AdminPages\\Pages\\Subscribers',
            'mailpoet\\adminpages\\pages\\subscribersapikeyinvalid' => 'MailPoet\\AdminPages\\Pages\\SubscribersAPIKeyInvalid',
            'mailpoet\\adminpages\\pages\\subscribersexport' => 'MailPoet\\AdminPages\\Pages\\SubscribersExport',
            'mailpoet\\adminpages\\pages\\subscribersimport' => 'MailPoet\\AdminPages\\Pages\\SubscribersImport',
            'mailpoet\\adminpages\\pages\\subscriberslimitexceeded' => 'MailPoet\\AdminPages\\Pages\\SubscribersLimitExceeded',
            'mailpoet\\adminpages\\pages\\update' => 'MailPoet\\AdminPages\\Pages\\Update',
            'mailpoet\\adminpages\\pages\\welcomewizard' => 'MailPoet\\AdminPages\\Pages\\WelcomeWizard',
            'mailpoet\\adminpages\\pages\\woocommercelistimport' => 'MailPoet\\AdminPages\\Pages\\WooCommerceListImport',
            'mailpoet\\analytics\\reporter' => 'MailPoet\\Analytics\\Reporter',
            'mailpoet\\api\\json\\api' => 'MailPoet\\API\\JSON\\API',
            'mailpoet\\api\\json\\responsebuilders\\newslettersresponsebuilder' => 'MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder',
            'mailpoet\\api\\json\\v1\\analytics' => 'MailPoet\\API\\JSON\\v1\\Analytics',
            'mailpoet\\api\\json\\v1\\automatedlatestcontent' => 'MailPoet\\API\\JSON\\v1\\AutomatedLatestContent',
            'mailpoet\\api\\json\\v1\\customfields' => 'MailPoet\\API\\JSON\\v1\\CustomFields',
            'mailpoet\\api\\json\\v1\\featureflags' => 'MailPoet\\API\\JSON\\v1\\FeatureFlags',
            'mailpoet\\api\\json\\v1\\forms' => 'MailPoet\\API\\JSON\\v1\\Forms',
            'mailpoet\\api\\json\\v1\\importexport' => 'MailPoet\\API\\JSON\\v1\\ImportExport',
            'mailpoet\\api\\json\\v1\\mailer' => 'MailPoet\\API\\JSON\\v1\\Mailer',
            'mailpoet\\api\\json\\v1\\mp2migrator' => 'MailPoet\\API\\JSON\\v1\\MP2Migrator',
            'mailpoet\\api\\json\\v1\\newsletters' => 'MailPoet\\API\\JSON\\v1\\Newsletters',
            'mailpoet\\api\\json\\v1\\newslettertemplates' => 'MailPoet\\API\\JSON\\v1\\NewsletterTemplates',
            'mailpoet\\api\\json\\v1\\segments' => 'MailPoet\\API\\JSON\\v1\\Segments',
            'mailpoet\\api\\json\\v1\\sendingqueue' => 'MailPoet\\API\\JSON\\v1\\SendingQueue',
            'mailpoet\\api\\json\\v1\\sendingtasksubscribers' => 'MailPoet\\API\\JSON\\v1\\SendingTaskSubscribers',
            'mailpoet\\api\\json\\v1\\services' => 'MailPoet\\API\\JSON\\v1\\Services',
            'mailpoet\\api\\json\\v1\\settings' => 'MailPoet\\API\\JSON\\v1\\Settings',
            'mailpoet\\api\\json\\v1\\setup' => 'MailPoet\\API\\JSON\\v1\\Setup',
            'mailpoet\\api\\json\\v1\\subscribers' => 'MailPoet\\API\\JSON\\v1\\Subscribers',
            'mailpoet\\api\\json\\v1\\userflags' => 'MailPoet\\API\\JSON\\v1\\UserFlags',
            'mailpoet\\api\\mp\\v1\\api' => 'MailPoet\\API\\MP\\v1\\API',
            'mailpoet\\config\\accesscontrol' => 'MailPoet\\Config\\AccessControl',
            'mailpoet\\config\\activator' => 'MailPoet\\Config\\Activator',
            'mailpoet\\config\\changelog' => 'MailPoet\\Config\\Changelog',
            'mailpoet\\config\\databaseinitializer' => 'MailPoet\\Config\\DatabaseInitializer',
            'mailpoet\\config\\hooks' => 'MailPoet\\Config\\Hooks',
            'mailpoet\\config\\initializer' => 'MailPoet\\Config\\Initializer',
            'mailpoet\\config\\menu' => 'MailPoet\\Config\\Menu',
            'mailpoet\\config\\mp2migrator' => 'MailPoet\\Config\\MP2Migrator',
            'mailpoet\\config\\populator' => 'MailPoet\\Config\\Populator',
            'mailpoet\\config\\renderer' => 'MailPoet\\Config\\Renderer',
            'mailpoet\\config\\rendererfactory' => 'MailPoet\\Config\\RendererFactory',
            'mailpoet\\config\\serviceschecker' => 'MailPoet\\Config\\ServicesChecker',
            'mailpoet\\config\\shortcodes' => 'MailPoet\\Config\\Shortcodes',
            'mailpoet\\cron\\crontrigger' => 'MailPoet\\Cron\\CronTrigger',
            'mailpoet\\cron\\daemon' => 'MailPoet\\Cron\\Daemon',
            'mailpoet\\cron\\daemonhttprunner' => 'MailPoet\\Cron\\DaemonHttpRunner',
            'mailpoet\\cron\\workers\\sendingqueue\\sendingerrorhandler' => 'MailPoet\\Cron\\Workers\\SendingQueue\\SendingErrorHandler',
            'mailpoet\\cron\\workers\\statsnotifications\\scheduler' => 'MailPoet\\Cron\\Workers\\StatsNotifications\\Scheduler',
            'mailpoet\\cron\\workers\\workersfactory' => 'MailPoet\\Cron\\Workers\\WorkersFactory',
            'mailpoet\\customfields\\apidatasanitizer' => 'MailPoet\\CustomFields\\ApiDataSanitizer',
            'mailpoet\\di\\containerwrapper' => 'MailPoet\\DI\\ContainerWrapper',
            'mailpoet\\doctrine\\configurationfactory' => 'MailPoet\\Doctrine\\ConfigurationFactory',
            'mailpoet\\doctrine\\connectionfactory' => 'MailPoet\\Doctrine\\ConnectionFactory',
            'mailpoet\\doctrine\\entitymanagerfactory' => 'MailPoet\\Doctrine\\EntityManagerFactory',
            'mailpoet\\doctrine\\eventlisteners\\timestamplistener' => 'MailPoet\\Doctrine\\EventListeners\\TimestampListener',
            'mailpoet\\features\\featureflagscontroller' => 'MailPoet\\Features\\FeatureFlagsController',
            'mailpoet\\features\\featureflagsrepository' => 'MailPoet\\Features\\FeatureFlagsRepository',
            'mailpoet\\features\\featurescontroller' => 'MailPoet\\Features\\FeaturesController',
            'mailpoet\\form\\assetscontroller' => 'MailPoet\\Form\\AssetsController',
            'mailpoet\\form\\util\\fieldnameobfuscator' => 'MailPoet\\Form\\Util\\FieldNameObfuscator',
            'mailpoet\\listing\\bulkactioncontroller' => 'MailPoet\\Listing\\BulkActionController',
            'mailpoet\\listing\\bulkactionfactory' => 'MailPoet\\Listing\\BulkActionFactory',
            'mailpoet\\listing\\handler' => 'MailPoet\\Listing\\Handler',
            'mailpoet\\listing\\pagelimit' => 'MailPoet\\Listing\\PageLimit',
            'mailpoet\\mailer\\mailer' => 'MailPoet\\Mailer\\Mailer',
            'mailpoet\\mailer\\metainfo' => 'MailPoet\\Mailer\\MetaInfo',
            'mailpoet\\mailer\\methods\\common\\blacklistcheck' => 'MailPoet\\Mailer\\Methods\\Common\\BlacklistCheck',
            'mailpoet\\mailer\\wordpress\\wordpressmailerreplacer' => 'MailPoet\\Mailer\\WordPress\\WordpressMailerReplacer',
            'mailpoet\\newsletter\\automatedlatestcontent' => 'MailPoet\\Newsletter\\AutomatedLatestContent',
            'mailpoet\\newsletter\\newslettersrepository' => 'MailPoet\\Newsletter\\NewslettersRepository',
            'mailpoet\\newsletter\\scheduler\\postnotificationscheduler' => 'MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler',
            'mailpoet\\newsletter\\scheduler\\welcomescheduler' => 'MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler',
            'mailpoet\\referrals\\referraldetector' => 'MailPoet\\Referrals\\ReferralDetector',
            'mailpoet\\router\\endpoints\\crondaemon' => 'MailPoet\\Router\\Endpoints\\CronDaemon',
            'mailpoet\\router\\endpoints\\subscription' => 'MailPoet\\Router\\Endpoints\\Subscription',
            'mailpoet\\router\\endpoints\\track' => 'MailPoet\\Router\\Endpoints\\Track',
            'mailpoet\\router\\endpoints\\viewinbrowser' => 'MailPoet\\Router\\Endpoints\\ViewInBrowser',
            'mailpoet\\router\\router' => 'MailPoet\\Router\\Router',
            'mailpoet\\segments\\subscribersfinder' => 'MailPoet\\Segments\\SubscribersFinder',
            'mailpoet\\segments\\subscriberslistings' => 'MailPoet\\Segments\\SubscribersListings',
            'mailpoet\\segments\\woocommerce' => 'MailPoet\\Segments\\WooCommerce',
            'mailpoet\\services\\authorizedemailscontroller' => 'MailPoet\\Services\\AuthorizedEmailsController',
            'mailpoet\\services\\bridge' => 'MailPoet\\Services\\Bridge',
            'mailpoet\\settings\\settingscontroller' => 'MailPoet\\Settings\\SettingsController',
            'mailpoet\\settings\\userflagscontroller' => 'MailPoet\\Settings\\UserFlagsController',
            'mailpoet\\settings\\userflagsrepository' => 'MailPoet\\Settings\\UserFlagsRepository',
            'mailpoet\\statistics\\track\\clicks' => 'MailPoet\\Statistics\\Track\\Clicks',
            'mailpoet\\statistics\\track\\opens' => 'MailPoet\\Statistics\\Track\\Opens',
            'mailpoet\\statistics\\track\\woocommercepurchases' => 'MailPoet\\Statistics\\Track\\WooCommercePurchases',
            'mailpoet\\subscribers\\confirmationemailmailer' => 'MailPoet\\Subscribers\\ConfirmationEmailMailer',
            'mailpoet\\subscribers\\inactivesubscriberscontroller' => 'MailPoet\\Subscribers\\InactiveSubscribersController',
            'mailpoet\\subscribers\\linktokens' => 'MailPoet\\Subscribers\\LinkTokens',
            'mailpoet\\subscribers\\newsubscribernotificationmailer' => 'MailPoet\\Subscribers\\NewSubscriberNotificationMailer',
            'mailpoet\\subscribers\\requiredcustomfieldvalidator' => 'MailPoet\\Subscribers\\RequiredCustomFieldValidator',
            'mailpoet\\subscribers\\subscriberactions' => 'MailPoet\\Subscribers\\SubscriberActions',
            'mailpoet\\subscription\\captcha' => 'MailPoet\\Subscription\\Captcha',
            'mailpoet\\subscription\\captcharenderer' => 'MailPoet\\Subscription\\CaptchaRenderer',
            'mailpoet\\subscription\\captchasession' => 'MailPoet\\Subscription\\CaptchaSession',
            'mailpoet\\subscription\\comment' => 'MailPoet\\Subscription\\Comment',
            'mailpoet\\subscription\\form' => 'MailPoet\\Subscription\\Form',
            'mailpoet\\subscription\\manage' => 'MailPoet\\Subscription\\Manage',
            'mailpoet\\subscription\\pages' => 'MailPoet\\Subscription\\Pages',
            'mailpoet\\subscription\\registration' => 'MailPoet\\Subscription\\Registration',
            'mailpoet\\subscription\\subscriptionurlfactory' => 'MailPoet\\Subscription\\SubscriptionUrlFactory',
            'mailpoet\\tasks\\state' => 'MailPoet\\Tasks\\State',
            'mailpoet\\util\\cookies' => 'MailPoet\\Util\\Cookies',
            'mailpoet\\util\\installation' => 'MailPoet\\Util\\Installation',
            'mailpoet\\util\\notices\\permanentnotices' => 'MailPoet\\Util\\Notices\\PermanentNotices',
            'mailpoet\\util\\url' => 'MailPoet\\Util\\Url',
            'mailpoet\\woocommerce\\helper' => 'MailPoet\\WooCommerce\\Helper',
            'mailpoet\\woocommerce\\settings' => 'MailPoet\\WooCommerce\\Settings',
            'mailpoet\\woocommerce\\subscription' => 'MailPoet\\WooCommerce\\Subscription',
            'mailpoet\\woocommerce\\transactionalemails' => 'MailPoet\\WooCommerce\\TransactionalEmails',
            'mailpoet\\wp\\functions' => 'MailPoet\\WP\\Functions',
            'mailpoetvendor\\doctrine\\dbal\\connection' => 'MailPoetVendor\\Doctrine\\DBAL\\Connection',
            'mailpoetvendor\\doctrine\\orm\\configuration' => 'MailPoetVendor\\Doctrine\\ORM\\Configuration',
            'mailpoetvendor\\doctrine\\orm\\entitymanager' => 'MailPoetVendor\\Doctrine\\ORM\\EntityManager',
        ];
        $this->syntheticIds = [
            'premium_container' => true,
        ];
        $this->methodMap = [
            'MailPoetVendor\\Doctrine\\DBAL\\Connection' => 'getConnectionService',
            'MailPoetVendor\\Doctrine\\ORM\\Configuration' => 'getConfigurationService',
            'MailPoetVendor\\Doctrine\\ORM\\EntityManager' => 'getEntityManagerService',
            'MailPoet\\API\\JSON\\API' => 'getAPIService',
            'MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder' => 'getNewslettersResponseBuilderService',
            'MailPoet\\API\\JSON\\v1\\Analytics' => 'getAnalyticsService',
            'MailPoet\\API\\JSON\\v1\\AutomatedLatestContent' => 'getAutomatedLatestContentService',
            'MailPoet\\API\\JSON\\v1\\CustomFields' => 'getCustomFieldsService',
            'MailPoet\\API\\JSON\\v1\\FeatureFlags' => 'getFeatureFlagsService',
            'MailPoet\\API\\JSON\\v1\\Forms' => 'getFormsService',
            'MailPoet\\API\\JSON\\v1\\ImportExport' => 'getImportExportService',
            'MailPoet\\API\\JSON\\v1\\MP2Migrator' => 'getMP2MigratorService',
            'MailPoet\\API\\JSON\\v1\\Mailer' => 'getMailerService',
            'MailPoet\\API\\JSON\\v1\\NewsletterTemplates' => 'getNewsletterTemplatesService',
            'MailPoet\\API\\JSON\\v1\\Newsletters' => 'getNewslettersService',
            'MailPoet\\API\\JSON\\v1\\Segments' => 'getSegmentsService',
            'MailPoet\\API\\JSON\\v1\\SendingQueue' => 'getSendingQueueService',
            'MailPoet\\API\\JSON\\v1\\SendingTaskSubscribers' => 'getSendingTaskSubscribersService',
            'MailPoet\\API\\JSON\\v1\\Services' => 'getServicesService',
            'MailPoet\\API\\JSON\\v1\\Settings' => 'getSettingsService',
            'MailPoet\\API\\JSON\\v1\\Setup' => 'getSetupService',
            'MailPoet\\API\\JSON\\v1\\Subscribers' => 'getSubscribersService',
            'MailPoet\\API\\JSON\\v1\\UserFlags' => 'getUserFlagsService',
            'MailPoet\\API\\MP\\v1\\API' => 'getAPI2Service',
            'MailPoet\\AdminPages\\PageRenderer' => 'getPageRendererService',
            'MailPoet\\AdminPages\\Pages\\ExperimentalFeatures' => 'getExperimentalFeaturesService',
            'MailPoet\\AdminPages\\Pages\\FormEditor' => 'getFormEditorService',
            'MailPoet\\AdminPages\\Pages\\Forms' => 'getForms2Service',
            'MailPoet\\AdminPages\\Pages\\Help' => 'getHelpService',
            'MailPoet\\AdminPages\\Pages\\MP2Migration' => 'getMP2MigrationService',
            'MailPoet\\AdminPages\\Pages\\NewsletterEditor' => 'getNewsletterEditorService',
            'MailPoet\\AdminPages\\Pages\\Newsletters' => 'getNewsletters2Service',
            'MailPoet\\AdminPages\\Pages\\Premium' => 'getPremiumService',
            'MailPoet\\AdminPages\\Pages\\RevenueTrackingPermission' => 'getRevenueTrackingPermissionService',
            'MailPoet\\AdminPages\\Pages\\Segments' => 'getSegments2Service',
            'MailPoet\\AdminPages\\Pages\\Settings' => 'getSettings2Service',
            'MailPoet\\AdminPages\\Pages\\Subscribers' => 'getSubscribers2Service',
            'MailPoet\\AdminPages\\Pages\\SubscribersAPIKeyInvalid' => 'getSubscribersAPIKeyInvalidService',
            'MailPoet\\AdminPages\\Pages\\SubscribersExport' => 'getSubscribersExportService',
            'MailPoet\\AdminPages\\Pages\\SubscribersImport' => 'getSubscribersImportService',
            'MailPoet\\AdminPages\\Pages\\SubscribersLimitExceeded' => 'getSubscribersLimitExceededService',
            'MailPoet\\AdminPages\\Pages\\Update' => 'getUpdateService',
            'MailPoet\\AdminPages\\Pages\\WelcomeWizard' => 'getWelcomeWizardService',
            'MailPoet\\AdminPages\\Pages\\WooCommerceListImport' => 'getWooCommerceListImportService',
            'MailPoet\\Analytics\\Reporter' => 'getReporterService',
            'MailPoet\\Config\\AccessControl' => 'getAccessControlService',
            'MailPoet\\Config\\Activator' => 'getActivatorService',
            'MailPoet\\Config\\Changelog' => 'getChangelogService',
            'MailPoet\\Config\\DatabaseInitializer' => 'getDatabaseInitializerService',
            'MailPoet\\Config\\Hooks' => 'getHooksService',
            'MailPoet\\Config\\Initializer' => 'getInitializerService',
            'MailPoet\\Config\\MP2Migrator' => 'getMP2Migrator2Service',
            'MailPoet\\Config\\Menu' => 'getMenuService',
            'MailPoet\\Config\\Populator' => 'getPopulatorService',
            'MailPoet\\Config\\Renderer' => 'getRendererService',
            'MailPoet\\Config\\RendererFactory' => 'getRendererFactoryService',
            'MailPoet\\Config\\ServicesChecker' => 'getServicesCheckerService',
            'MailPoet\\Config\\Shortcodes' => 'getShortcodesService',
            'MailPoet\\Cron\\CronTrigger' => 'getCronTriggerService',
            'MailPoet\\Cron\\Daemon' => 'getDaemonService',
            'MailPoet\\Cron\\DaemonHttpRunner' => 'getDaemonHttpRunnerService',
            'MailPoet\\Cron\\Workers\\SendingQueue\\SendingErrorHandler' => 'getSendingErrorHandlerService',
            'MailPoet\\Cron\\Workers\\StatsNotifications\\Scheduler' => 'getSchedulerService',
            'MailPoet\\Cron\\Workers\\WorkersFactory' => 'getWorkersFactoryService',
            'MailPoet\\CustomFields\\ApiDataSanitizer' => 'getApiDataSanitizerService',
            'MailPoet\\DI\\ContainerWrapper' => 'getContainerWrapperService',
            'MailPoet\\Doctrine\\ConfigurationFactory' => 'getConfigurationFactoryService',
            'MailPoet\\Doctrine\\ConnectionFactory' => 'getConnectionFactoryService',
            'MailPoet\\Doctrine\\EntityManagerFactory' => 'getEntityManagerFactoryService',
            'MailPoet\\Doctrine\\EventListeners\\TimestampListener' => 'getTimestampListenerService',
            'MailPoet\\Features\\FeatureFlagsController' => 'getFeatureFlagsControllerService',
            'MailPoet\\Features\\FeatureFlagsRepository' => 'getFeatureFlagsRepositoryService',
            'MailPoet\\Features\\FeaturesController' => 'getFeaturesControllerService',
            'MailPoet\\Form\\AssetsController' => 'getAssetsControllerService',
            'MailPoet\\Form\\Util\\FieldNameObfuscator' => 'getFieldNameObfuscatorService',
            'MailPoet\\Listing\\BulkActionController' => 'getBulkActionControllerService',
            'MailPoet\\Listing\\BulkActionFactory' => 'getBulkActionFactoryService',
            'MailPoet\\Listing\\Handler' => 'getHandlerService',
            'MailPoet\\Listing\\PageLimit' => 'getPageLimitService',
            'MailPoet\\Mailer\\Mailer' => 'getMailer2Service',
            'MailPoet\\Mailer\\MetaInfo' => 'getMetaInfoService',
            'MailPoet\\Mailer\\Methods\\Common\\BlacklistCheck' => 'getBlacklistCheckService',
            'MailPoet\\Mailer\\WordPress\\WordpressMailerReplacer' => 'getWordpressMailerReplacerService',
            'MailPoet\\Newsletter\\AutomatedLatestContent' => 'getAutomatedLatestContent2Service',
            'MailPoet\\Newsletter\\NewslettersRepository' => 'getNewslettersRepositoryService',
            'MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler' => 'getPostNotificationSchedulerService',
            'MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler' => 'getWelcomeSchedulerService',
            'MailPoet\\Referrals\\ReferralDetector' => 'getReferralDetectorService',
            'MailPoet\\Router\\Endpoints\\CronDaemon' => 'getCronDaemonService',
            'MailPoet\\Router\\Endpoints\\Subscription' => 'getSubscriptionService',
            'MailPoet\\Router\\Endpoints\\Track' => 'getTrackService',
            'MailPoet\\Router\\Endpoints\\ViewInBrowser' => 'getViewInBrowserService',
            'MailPoet\\Router\\Router' => 'getRouterService',
            'MailPoet\\Segments\\SubscribersFinder' => 'getSubscribersFinderService',
            'MailPoet\\Segments\\SubscribersListings' => 'getSubscribersListingsService',
            'MailPoet\\Segments\\WooCommerce' => 'getWooCommerceService',
            'MailPoet\\Services\\AuthorizedEmailsController' => 'getAuthorizedEmailsControllerService',
            'MailPoet\\Services\\Bridge' => 'getBridgeService',
            'MailPoet\\Settings\\SettingsController' => 'getSettingsControllerService',
            'MailPoet\\Settings\\UserFlagsController' => 'getUserFlagsControllerService',
            'MailPoet\\Settings\\UserFlagsRepository' => 'getUserFlagsRepositoryService',
            'MailPoet\\Statistics\\Track\\Clicks' => 'getClicksService',
            'MailPoet\\Statistics\\Track\\Opens' => 'getOpensService',
            'MailPoet\\Statistics\\Track\\WooCommercePurchases' => 'getWooCommercePurchasesService',
            'MailPoet\\Subscribers\\ConfirmationEmailMailer' => 'getConfirmationEmailMailerService',
            'MailPoet\\Subscribers\\InactiveSubscribersController' => 'getInactiveSubscribersControllerService',
            'MailPoet\\Subscribers\\LinkTokens' => 'getLinkTokensService',
            'MailPoet\\Subscribers\\NewSubscriberNotificationMailer' => 'getNewSubscriberNotificationMailerService',
            'MailPoet\\Subscribers\\RequiredCustomFieldValidator' => 'getRequiredCustomFieldValidatorService',
            'MailPoet\\Subscribers\\SubscriberActions' => 'getSubscriberActionsService',
            'MailPoet\\Subscription\\Captcha' => 'getCaptchaService',
            'MailPoet\\Subscription\\CaptchaRenderer' => 'getCaptchaRendererService',
            'MailPoet\\Subscription\\CaptchaSession' => 'getCaptchaSessionService',
            'MailPoet\\Subscription\\Comment' => 'getCommentService',
            'MailPoet\\Subscription\\Form' => 'getFormService',
            'MailPoet\\Subscription\\Manage' => 'getManageService',
            'MailPoet\\Subscription\\Pages' => 'getPagesService',
            'MailPoet\\Subscription\\Registration' => 'getRegistrationService',
            'MailPoet\\Subscription\\SubscriptionUrlFactory' => 'getSubscriptionUrlFactoryService',
            'MailPoet\\Tasks\\State' => 'getStateService',
            'MailPoet\\Util\\Cookies' => 'getCookiesService',
            'MailPoet\\Util\\Installation' => 'getInstallationService',
            'MailPoet\\Util\\Notices\\PermanentNotices' => 'getPermanentNoticesService',
            'MailPoet\\Util\\Url' => 'getUrlService',
            'MailPoet\\WP\\Functions' => 'getFunctionsService',
            'MailPoet\\WooCommerce\\Helper' => 'getHelperService',
            'MailPoet\\WooCommerce\\Settings' => 'getSettings3Service',
            'MailPoet\\WooCommerce\\Subscription' => 'getSubscription2Service',
            'MailPoet\\WooCommerce\\TransactionalEmails' => 'getTransactionalEmailsService',
        ];
        $this->privates = [
            'MailPoetVendor\\Doctrine\\ORM\\Configuration' => true,
            'MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder' => true,
            'MailPoet\\Config\\DatabaseInitializer' => true,
            'MailPoet\\Config\\MP2Migrator' => true,
            'MailPoet\\Config\\Populator' => true,
            'MailPoet\\Config\\ServicesChecker' => true,
            'MailPoet\\Config\\Shortcodes' => true,
            'MailPoet\\Cron\\Workers\\StatsNotifications\\Scheduler' => true,
            'MailPoet\\CustomFields\\ApiDataSanitizer' => true,
            'MailPoet\\Doctrine\\ConfigurationFactory' => true,
            'MailPoet\\Doctrine\\ConnectionFactory' => true,
            'MailPoet\\Doctrine\\EntityManagerFactory' => true,
            'MailPoet\\Doctrine\\EventListeners\\TimestampListener' => true,
            'MailPoet\\Features\\FeatureFlagsRepository' => true,
            'MailPoet\\Features\\FeaturesController' => true,
            'MailPoet\\Form\\AssetsController' => true,
            'MailPoet\\Mailer\\Mailer' => true,
            'MailPoet\\Mailer\\MetaInfo' => true,
            'MailPoet\\Mailer\\Methods\\Common\\BlacklistCheck' => true,
            'MailPoet\\Mailer\\WordPress\\WordpressMailerReplacer' => true,
            'MailPoet\\Newsletter\\NewslettersRepository' => true,
            'MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler' => true,
            'MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler' => true,
            'MailPoet\\Referrals\\ReferralDetector' => true,
            'MailPoet\\Router\\Router' => true,
            'MailPoet\\Segments\\SubscribersFinder' => true,
            'MailPoet\\Services\\AuthorizedEmailsController' => true,
            'MailPoet\\Services\\Bridge' => true,
            'MailPoet\\Settings\\UserFlagsController' => true,
            'MailPoet\\Statistics\\Track\\Clicks' => true,
            'MailPoet\\Statistics\\Track\\Opens' => true,
            'MailPoet\\Statistics\\Track\\WooCommercePurchases' => true,
            'MailPoet\\Subscribers\\InactiveSubscribersController' => true,
            'MailPoet\\Subscribers\\LinkTokens' => true,
            'MailPoet\\Subscription\\CaptchaSession' => true,
            'MailPoet\\Subscription\\SubscriptionUrlFactory' => true,
            'MailPoet\\Tasks\\State' => true,
            'MailPoet\\Util\\Cookies' => true,
            'MailPoet\\Util\\Installation' => true,
            'MailPoet\\Util\\Notices\\PermanentNotices' => true,
            'MailPoet\\WooCommerce\\TransactionalEmails' => true,
        ];

        $this->aliases = [];
    }

    public function getRemovedIds()
    {
        return [
            'MailPoetVendor\\Doctrine\\ORM\\Configuration' => true,
            'MailPoetVendor\\Psr\\Container\\ContainerInterface' => true,
            'MailPoetVendor\\Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder' => true,
            'MailPoet\\Config\\DatabaseInitializer' => true,
            'MailPoet\\Config\\MP2Migrator' => true,
            'MailPoet\\Config\\Populator' => true,
            'MailPoet\\Config\\ServicesChecker' => true,
            'MailPoet\\Config\\Shortcodes' => true,
            'MailPoet\\Cron\\Workers\\StatsNotifications\\Scheduler' => true,
            'MailPoet\\CustomFields\\ApiDataSanitizer' => true,
            'MailPoet\\Doctrine\\ConfigurationFactory' => true,
            'MailPoet\\Doctrine\\ConnectionFactory' => true,
            'MailPoet\\Doctrine\\EntityManagerFactory' => true,
            'MailPoet\\Doctrine\\EventListeners\\TimestampListener' => true,
            'MailPoet\\Features\\FeatureFlagsRepository' => true,
            'MailPoet\\Features\\FeaturesController' => true,
            'MailPoet\\Form\\AssetsController' => true,
            'MailPoet\\Mailer\\Mailer' => true,
            'MailPoet\\Mailer\\MetaInfo' => true,
            'MailPoet\\Mailer\\Methods\\Common\\BlacklistCheck' => true,
            'MailPoet\\Mailer\\WordPress\\WordpressMailerReplacer' => true,
            'MailPoet\\Newsletter\\NewslettersRepository' => true,
            'MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler' => true,
            'MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler' => true,
            'MailPoet\\Referrals\\ReferralDetector' => true,
            'MailPoet\\Router\\Router' => true,
            'MailPoet\\Segments\\SubscribersFinder' => true,
            'MailPoet\\Services\\AuthorizedEmailsController' => true,
            'MailPoet\\Services\\Bridge' => true,
            'MailPoet\\Settings\\UserFlagsController' => true,
            'MailPoet\\Statistics\\Track\\Clicks' => true,
            'MailPoet\\Statistics\\Track\\Opens' => true,
            'MailPoet\\Statistics\\Track\\WooCommercePurchases' => true,
            'MailPoet\\Subscribers\\InactiveSubscribersController' => true,
            'MailPoet\\Subscribers\\LinkTokens' => true,
            'MailPoet\\Subscription\\CaptchaSession' => true,
            'MailPoet\\Subscription\\SubscriptionUrlFactory' => true,
            'MailPoet\\Tasks\\State' => true,
            'MailPoet\\Util\\Cookies' => true,
            'MailPoet\\Util\\Installation' => true,
            'MailPoet\\Util\\Notices\\PermanentNotices' => true,
            'MailPoet\\WooCommerce\\TransactionalEmails' => true,
        ];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the public 'MailPoetVendor\Doctrine\DBAL\Connection' shared autowired service.
     *
     * @return \MailPoetVendor\Doctrine\DBAL\Connection
     */
    protected function getConnectionService()
    {
        return $this->services['MailPoetVendor\\Doctrine\\DBAL\\Connection'] = ${($_ = isset($this->services['MailPoet\\Doctrine\\ConnectionFactory']) ? $this->services['MailPoet\\Doctrine\\ConnectionFactory'] : ($this->services['MailPoet\\Doctrine\\ConnectionFactory'] = new \MailPoet\Doctrine\ConnectionFactory())) && false ?: '_'}->createConnection();
    }

    /**
     * Gets the public 'MailPoetVendor\Doctrine\ORM\EntityManager' shared autowired service.
     *
     * @return \MailPoetVendor\Doctrine\ORM\EntityManager
     */
    protected function getEntityManagerService()
    {
        return $this->services['MailPoetVendor\\Doctrine\\ORM\\EntityManager'] = ${($_ = isset($this->services['MailPoet\\Doctrine\\EntityManagerFactory']) ? $this->services['MailPoet\\Doctrine\\EntityManagerFactory'] : $this->getEntityManagerFactoryService()) && false ?: '_'}->createEntityManager();
    }

    /**
     * Gets the public 'MailPoet\API\JSON\API' shared autowired service.
     *
     * @return \MailPoet\API\JSON\API
     */
    protected function getAPIService()
    {
        return $this->services['MailPoet\\API\\JSON\\API'] = new \MailPoet\API\JSON\API(${($_ = isset($this->services['MailPoet\\DI\\ContainerWrapper']) ? $this->services['MailPoet\\DI\\ContainerWrapper'] : $this->getContainerWrapperService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\AccessControl']) ? $this->services['MailPoet\\Config\\AccessControl'] : ($this->services['MailPoet\\Config\\AccessControl'] = new \MailPoet\Config\AccessControl())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Analytics' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Analytics
     */
    protected function getAnalyticsService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Analytics'] = new \MailPoet\API\JSON\v1\Analytics(${($_ = isset($this->services['MailPoet\\Analytics\\Reporter']) ? $this->services['MailPoet\\Analytics\\Reporter'] : $this->getReporterService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\AutomatedLatestContent' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\AutomatedLatestContent
     */
    protected function getAutomatedLatestContentService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\AutomatedLatestContent'] = new \MailPoet\API\JSON\v1\AutomatedLatestContent(${($_ = isset($this->services['MailPoet\\Newsletter\\AutomatedLatestContent']) ? $this->services['MailPoet\\Newsletter\\AutomatedLatestContent'] : ($this->services['MailPoet\\Newsletter\\AutomatedLatestContent'] = new \MailPoet\Newsletter\AutomatedLatestContent())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\CustomFields' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\CustomFields
     */
    protected function getCustomFieldsService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\CustomFields'] = new \MailPoet\API\JSON\v1\CustomFields();
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\FeatureFlags' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\FeatureFlags
     */
    protected function getFeatureFlagsService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\FeatureFlags'] = new \MailPoet\API\JSON\v1\FeatureFlags(${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeatureFlagsController']) ? $this->services['MailPoet\\Features\\FeatureFlagsController'] : $this->getFeatureFlagsControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Forms' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Forms
     */
    protected function getFormsService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Forms'] = new \MailPoet\API\JSON\v1\Forms(${($_ = isset($this->services['MailPoet\\Listing\\BulkActionController']) ? $this->services['MailPoet\\Listing\\BulkActionController'] : $this->getBulkActionControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\Handler']) ? $this->services['MailPoet\\Listing\\Handler'] : ($this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\ImportExport' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\ImportExport
     */
    protected function getImportExportService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\ImportExport'] = new \MailPoet\API\JSON\v1\ImportExport();
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\MP2Migrator' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\MP2Migrator
     */
    protected function getMP2MigratorService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\MP2Migrator'] = new \MailPoet\API\JSON\v1\MP2Migrator(${($_ = isset($this->services['MailPoet\\Config\\MP2Migrator']) ? $this->services['MailPoet\\Config\\MP2Migrator'] : $this->getMP2Migrator2Service()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Mailer' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Mailer
     */
    protected function getMailerService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Mailer'] = new \MailPoet\API\JSON\v1\Mailer(${($_ = isset($this->services['MailPoet\\Services\\AuthorizedEmailsController']) ? $this->services['MailPoet\\Services\\AuthorizedEmailsController'] : $this->getAuthorizedEmailsControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Services\\Bridge']) ? $this->services['MailPoet\\Services\\Bridge'] : $this->getBridgeService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Mailer\\MetaInfo']) ? $this->services['MailPoet\\Mailer\\MetaInfo'] : ($this->services['MailPoet\\Mailer\\MetaInfo'] = new \MailPoet\Mailer\MetaInfo())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\NewsletterTemplates' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\NewsletterTemplates
     */
    protected function getNewsletterTemplatesService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\NewsletterTemplates'] = new \MailPoet\API\JSON\v1\NewsletterTemplates();
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Newsletters' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Newsletters
     */
    protected function getNewslettersService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Newsletters'] = new \MailPoet\API\JSON\v1\Newsletters(${($_ = isset($this->services['MailPoet\\Listing\\BulkActionController']) ? $this->services['MailPoet\\Listing\\BulkActionController'] : $this->getBulkActionControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\Handler']) ? $this->services['MailPoet\\Listing\\Handler'] : ($this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Services\\AuthorizedEmailsController']) ? $this->services['MailPoet\\Services\\AuthorizedEmailsController'] : $this->getAuthorizedEmailsControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\NewslettersRepository']) ? $this->services['MailPoet\\Newsletter\\NewslettersRepository'] : $this->getNewslettersRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder']) ? $this->services['MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder'] : ($this->services['MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder'] = new \MailPoet\API\JSON\ResponseBuilders\NewslettersResponseBuilder())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler'] = new \MailPoet\Newsletter\Scheduler\PostNotificationScheduler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Mailer\\MetaInfo']) ? $this->services['MailPoet\\Mailer\\MetaInfo'] : ($this->services['MailPoet\\Mailer\\MetaInfo'] = new \MailPoet\Mailer\MetaInfo())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Segments' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Segments
     */
    protected function getSegmentsService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Segments'] = new \MailPoet\API\JSON\v1\Segments(${($_ = isset($this->services['MailPoet\\Listing\\BulkActionController']) ? $this->services['MailPoet\\Listing\\BulkActionController'] : $this->getBulkActionControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\Handler']) ? $this->services['MailPoet\\Listing\\Handler'] : ($this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Segments\\WooCommerce']) ? $this->services['MailPoet\\Segments\\WooCommerce'] : $this->getWooCommerceService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\SendingQueue' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\SendingQueue
     */
    protected function getSendingQueueService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\SendingQueue'] = new \MailPoet\API\JSON\v1\SendingQueue();
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\SendingTaskSubscribers' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\SendingTaskSubscribers
     */
    protected function getSendingTaskSubscribersService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\SendingTaskSubscribers'] = new \MailPoet\API\JSON\v1\SendingTaskSubscribers(${($_ = isset($this->services['MailPoet\\Listing\\Handler']) ? $this->services['MailPoet\\Listing\\Handler'] : ($this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Services' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Services
     */
    protected function getServicesService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Services'] = new \MailPoet\API\JSON\v1\Services();
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Settings' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Settings
     */
    protected function getSettingsService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Settings'] = new \MailPoet\API\JSON\v1\Settings(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Services\\Bridge']) ? $this->services['MailPoet\\Services\\Bridge'] : $this->getBridgeService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Services\\AuthorizedEmailsController']) ? $this->services['MailPoet\\Services\\AuthorizedEmailsController'] : $this->getAuthorizedEmailsControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Setup' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Setup
     */
    protected function getSetupService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Setup'] = new \MailPoet\API\JSON\v1\Setup(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Activator']) ? $this->services['MailPoet\\Config\\Activator'] : $this->getActivatorService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\Subscribers' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\Subscribers
     */
    protected function getSubscribersService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\Subscribers'] = new \MailPoet\API\JSON\v1\Subscribers(${($_ = isset($this->services['MailPoet\\Listing\\BulkActionController']) ? $this->services['MailPoet\\Listing\\BulkActionController'] : $this->getBulkActionControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Segments\\SubscribersListings']) ? $this->services['MailPoet\\Segments\\SubscribersListings'] : $this->getSubscribersListingsService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\SubscriberActions']) ? $this->services['MailPoet\\Subscribers\\SubscriberActions'] : $this->getSubscriberActionsService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\RequiredCustomFieldValidator']) ? $this->services['MailPoet\\Subscribers\\RequiredCustomFieldValidator'] : ($this->services['MailPoet\\Subscribers\\RequiredCustomFieldValidator'] = new \MailPoet\Subscribers\RequiredCustomFieldValidator())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\Handler']) ? $this->services['MailPoet\\Listing\\Handler'] : ($this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\Captcha']) ? $this->services['MailPoet\\Subscription\\Captcha'] : $this->getCaptchaService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\CaptchaSession']) ? $this->services['MailPoet\\Subscription\\CaptchaSession'] : $this->getCaptchaSessionService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\ConfirmationEmailMailer']) ? $this->services['MailPoet\\Subscribers\\ConfirmationEmailMailer'] : $this->getConfirmationEmailMailerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\SubscriptionUrlFactory']) ? $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] : $this->getSubscriptionUrlFactoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\JSON\v1\UserFlags' shared autowired service.
     *
     * @return \MailPoet\API\JSON\v1\UserFlags
     */
    protected function getUserFlagsService()
    {
        return $this->services['MailPoet\\API\\JSON\\v1\\UserFlags'] = new \MailPoet\API\JSON\v1\UserFlags(${($_ = isset($this->services['MailPoet\\Settings\\UserFlagsController']) ? $this->services['MailPoet\\Settings\\UserFlagsController'] : $this->getUserFlagsControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\API\MP\v1\API' shared autowired service.
     *
     * @return \MailPoet\API\MP\v1\API
     */
    protected function getAPI2Service()
    {
        return $this->services['MailPoet\\API\\MP\\v1\\API'] = new \MailPoet\API\MP\v1\API(${($_ = isset($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer']) ? $this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] : ($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] = new \MailPoet\Subscribers\NewSubscriberNotificationMailer())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\ConfirmationEmailMailer']) ? $this->services['MailPoet\\Subscribers\\ConfirmationEmailMailer'] : $this->getConfirmationEmailMailerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\RequiredCustomFieldValidator']) ? $this->services['MailPoet\\Subscribers\\RequiredCustomFieldValidator'] : ($this->services['MailPoet\\Subscribers\\RequiredCustomFieldValidator'] = new \MailPoet\Subscribers\RequiredCustomFieldValidator())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\CustomFields\\ApiDataSanitizer']) ? $this->services['MailPoet\\CustomFields\\ApiDataSanitizer'] : ($this->services['MailPoet\\CustomFields\\ApiDataSanitizer'] = new \MailPoet\CustomFields\ApiDataSanitizer())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] = new \MailPoet\Newsletter\Scheduler\WelcomeScheduler())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\PageRenderer' shared autowired service.
     *
     * @return \MailPoet\AdminPages\PageRenderer
     */
    protected function getPageRendererService()
    {
        return $this->services['MailPoet\\AdminPages\\PageRenderer'] = new \MailPoet\AdminPages\PageRenderer(${($_ = isset($this->services['MailPoet\\Config\\Renderer']) ? $this->services['MailPoet\\Config\\Renderer'] : $this->getRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\ExperimentalFeatures' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\ExperimentalFeatures
     */
    protected function getExperimentalFeaturesService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\ExperimentalFeatures'] = new \MailPoet\AdminPages\Pages\ExperimentalFeatures(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\FormEditor' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\FormEditor
     */
    protected function getFormEditorService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\FormEditor'] = new \MailPoet\AdminPages\Pages\FormEditor(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Forms' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Forms
     */
    protected function getForms2Service()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Forms'] = new \MailPoet\AdminPages\Pages\Forms(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\PageLimit']) ? $this->services['MailPoet\\Listing\\PageLimit'] : $this->getPageLimitService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Installation']) ? $this->services['MailPoet\\Util\\Installation'] : $this->getInstallationService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Help' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Help
     */
    protected function getHelpService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Help'] = new \MailPoet\AdminPages\Pages\Help(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Tasks\\State']) ? $this->services['MailPoet\\Tasks\\State'] : ($this->services['MailPoet\\Tasks\\State'] = new \MailPoet\Tasks\State())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\MP2Migration' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\MP2Migration
     */
    protected function getMP2MigrationService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\MP2Migration'] = new \MailPoet\AdminPages\Pages\MP2Migration(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\MP2Migrator']) ? $this->services['MailPoet\\Config\\MP2Migrator'] : $this->getMP2Migrator2Service()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\NewsletterEditor' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\NewsletterEditor
     */
    protected function getNewsletterEditorService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\NewsletterEditor'] = new \MailPoet\AdminPages\Pages\NewsletterEditor(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\UserFlagsController']) ? $this->services['MailPoet\\Settings\\UserFlagsController'] : $this->getUserFlagsControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Newsletters' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Newsletters
     */
    protected function getNewsletters2Service()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Newsletters'] = new \MailPoet\AdminPages\Pages\Newsletters(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\PageLimit']) ? $this->services['MailPoet\\Listing\\PageLimit'] : $this->getPageLimitService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\UserFlagsController']) ? $this->services['MailPoet\\Settings\\UserFlagsController'] : $this->getUserFlagsControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Installation']) ? $this->services['MailPoet\\Util\\Installation'] : $this->getInstallationService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Premium' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Premium
     */
    protected function getPremiumService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Premium'] = new \MailPoet\AdminPages\Pages\Premium(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\RevenueTrackingPermission' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\RevenueTrackingPermission
     */
    protected function getRevenueTrackingPermissionService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\RevenueTrackingPermission'] = new \MailPoet\AdminPages\Pages\RevenueTrackingPermission(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Segments' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Segments
     */
    protected function getSegments2Service()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Segments'] = new \MailPoet\AdminPages\Pages\Segments(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\PageLimit']) ? $this->services['MailPoet\\Listing\\PageLimit'] : $this->getPageLimitService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Settings' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Settings
     */
    protected function getSettings2Service()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Settings'] = new \MailPoet\AdminPages\Pages\Settings(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\ServicesChecker']) ? $this->services['MailPoet\\Config\\ServicesChecker'] : ($this->services['MailPoet\\Config\\ServicesChecker'] = new \MailPoet\Config\ServicesChecker())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Installation']) ? $this->services['MailPoet\\Util\\Installation'] : $this->getInstallationService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\Captcha']) ? $this->services['MailPoet\\Subscription\\Captcha'] : $this->getCaptchaService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Subscribers' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Subscribers
     */
    protected function getSubscribers2Service()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Subscribers'] = new \MailPoet\AdminPages\Pages\Subscribers(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\PageLimit']) ? $this->services['MailPoet\\Listing\\PageLimit'] : $this->getPageLimitService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\SubscribersAPIKeyInvalid' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\SubscribersAPIKeyInvalid
     */
    protected function getSubscribersAPIKeyInvalidService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\SubscribersAPIKeyInvalid'] = new \MailPoet\AdminPages\Pages\SubscribersAPIKeyInvalid(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\SubscribersExport' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\SubscribersExport
     */
    protected function getSubscribersExportService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\SubscribersExport'] = new \MailPoet\AdminPages\Pages\SubscribersExport(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\SubscribersImport' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\SubscribersImport
     */
    protected function getSubscribersImportService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\SubscribersImport'] = new \MailPoet\AdminPages\Pages\SubscribersImport(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Installation']) ? $this->services['MailPoet\\Util\\Installation'] : $this->getInstallationService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\SubscribersLimitExceeded' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\SubscribersLimitExceeded
     */
    protected function getSubscribersLimitExceededService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\SubscribersLimitExceeded'] = new \MailPoet\AdminPages\Pages\SubscribersLimitExceeded(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\Update' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\Update
     */
    protected function getUpdateService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\Update'] = new \MailPoet\AdminPages\Pages\Update(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\WelcomeWizard' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\WelcomeWizard
     */
    protected function getWelcomeWizardService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\WelcomeWizard'] = new \MailPoet\AdminPages\Pages\WelcomeWizard(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\AdminPages\Pages\WooCommerceListImport' shared autowired service.
     *
     * @return \MailPoet\AdminPages\Pages\WooCommerceListImport
     */
    protected function getWooCommerceListImportService()
    {
        return $this->services['MailPoet\\AdminPages\\Pages\\WooCommerceListImport'] = new \MailPoet\AdminPages\Pages\WooCommerceListImport(${($_ = isset($this->services['MailPoet\\AdminPages\\PageRenderer']) ? $this->services['MailPoet\\AdminPages\\PageRenderer'] : $this->getPageRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Analytics\Reporter' shared autowired service.
     *
     * @return \MailPoet\Analytics\Reporter
     */
    protected function getReporterService()
    {
        return $this->services['MailPoet\\Analytics\\Reporter'] = new \MailPoet\Analytics\Reporter(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Config\AccessControl' shared autowired service.
     *
     * @return \MailPoet\Config\AccessControl
     */
    protected function getAccessControlService()
    {
        return $this->services['MailPoet\\Config\\AccessControl'] = new \MailPoet\Config\AccessControl();
    }

    /**
     * Gets the public 'MailPoet\Config\Activator' shared autowired service.
     *
     * @return \MailPoet\Config\Activator
     */
    protected function getActivatorService()
    {
        return $this->services['MailPoet\\Config\\Activator'] = new \MailPoet\Config\Activator(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Populator']) ? $this->services['MailPoet\\Config\\Populator'] : $this->getPopulatorService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Config\Changelog' shared autowired service.
     *
     * @return \MailPoet\Config\Changelog
     */
    protected function getChangelogService()
    {
        return $this->services['MailPoet\\Config\\Changelog'] = new \MailPoet\Config\Changelog(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\MP2Migrator']) ? $this->services['MailPoet\\Config\\MP2Migrator'] : $this->getMP2Migrator2Service()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Config\Hooks' shared autowired service.
     *
     * @return \MailPoet\Config\Hooks
     */
    protected function getHooksService()
    {
        return $this->services['MailPoet\\Config\\Hooks'] = new \MailPoet\Config\Hooks(${($_ = isset($this->services['MailPoet\\Subscription\\Form']) ? $this->services['MailPoet\\Subscription\\Form'] : $this->getFormService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\Comment']) ? $this->services['MailPoet\\Subscription\\Comment'] : $this->getCommentService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\Manage']) ? $this->services['MailPoet\\Subscription\\Manage'] : $this->getManageService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\Registration']) ? $this->services['MailPoet\\Subscription\\Registration'] : $this->getRegistrationService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Subscription']) ? $this->services['MailPoet\\WooCommerce\\Subscription'] : $this->getSubscription2Service()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Segments\\WooCommerce']) ? $this->services['MailPoet\\Segments\\WooCommerce'] : $this->getWooCommerceService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Settings']) ? $this->services['MailPoet\\WooCommerce\\Settings'] : $this->getSettings3Service()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Statistics\\Track\\WooCommercePurchases']) ? $this->services['MailPoet\\Statistics\\Track\\WooCommercePurchases'] : $this->getWooCommercePurchasesService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler'] = new \MailPoet\Newsletter\Scheduler\PostNotificationScheduler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Mailer\\WordPress\\WordpressMailerReplacer']) ? $this->services['MailPoet\\Mailer\\WordPress\\WordpressMailerReplacer'] : $this->getWordpressMailerReplacerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Config\Initializer' shared autowired service.
     *
     * @return \MailPoet\Config\Initializer
     */
    protected function getInitializerService()
    {
        $a = ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'};
        $b = ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'};

        return $this->services['MailPoet\\Config\\Initializer'] = new \MailPoet\Config\Initializer(${($_ = isset($this->services['MailPoet\\Config\\RendererFactory']) ? $this->services['MailPoet\\Config\\RendererFactory'] : ($this->services['MailPoet\\Config\\RendererFactory'] = new \MailPoet\Config\RendererFactory())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\AccessControl']) ? $this->services['MailPoet\\Config\\AccessControl'] : ($this->services['MailPoet\\Config\\AccessControl'] = new \MailPoet\Config\AccessControl())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\API\\JSON\\API']) ? $this->services['MailPoet\\API\\JSON\\API'] : $this->getAPIService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Activator']) ? $this->services['MailPoet\\Config\\Activator'] : $this->getActivatorService()) && false ?: '_'}, $a, ${($_ = isset($this->services['MailPoet\\Router\\Router']) ? $this->services['MailPoet\\Router\\Router'] : $this->getRouterService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Hooks']) ? $this->services['MailPoet\\Config\\Hooks'] : $this->getHooksService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Changelog']) ? $this->services['MailPoet\\Config\\Changelog'] : $this->getChangelogService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Menu']) ? $this->services['MailPoet\\Config\\Menu'] : $this->getMenuService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Cron\\CronTrigger']) ? $this->services['MailPoet\\Cron\\CronTrigger'] : $this->getCronTriggerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Notices\\PermanentNotices']) ? $this->services['MailPoet\\Util\\Notices\\PermanentNotices'] : $this->getPermanentNoticesService()) && false ?: '_'}, new \MailPoet\Config\Shortcodes(new \MailPoet\Subscription\Pages(${($_ = isset($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer']) ? $this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] : ($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] = new \MailPoet\Subscribers\NewSubscriberNotificationMailer())) && false ?: '_'}, $b, $a, ${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\CaptchaRenderer']) ? $this->services['MailPoet\\Subscription\\CaptchaRenderer'] : $this->getCaptchaRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] = new \MailPoet\Newsletter\Scheduler\WelcomeScheduler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\SubscriptionUrlFactory']) ? $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] : $this->getSubscriptionUrlFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Form\\AssetsController']) ? $this->services['MailPoet\\Form\\AssetsController'] : $this->getAssetsControllerService()) && false ?: '_'}), $b), ${($_ = isset($this->services['MailPoet\\Config\\DatabaseInitializer']) ? $this->services['MailPoet\\Config\\DatabaseInitializer'] : ($this->services['MailPoet\\Config\\DatabaseInitializer'] = new \MailPoet\Config\DatabaseInitializer($this))) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Config\Menu' shared autowired service.
     *
     * @return \MailPoet\Config\Menu
     */
    protected function getMenuService()
    {
        return $this->services['MailPoet\\Config\\Menu'] = new \MailPoet\Config\Menu(${($_ = isset($this->services['MailPoet\\Config\\AccessControl']) ? $this->services['MailPoet\\Config\\AccessControl'] : ($this->services['MailPoet\\Config\\AccessControl'] = new \MailPoet\Config\AccessControl())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\ServicesChecker']) ? $this->services['MailPoet\\Config\\ServicesChecker'] : ($this->services['MailPoet\\Config\\ServicesChecker'] = new \MailPoet\Config\ServicesChecker())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\DI\\ContainerWrapper']) ? $this->services['MailPoet\\DI\\ContainerWrapper'] : $this->getContainerWrapperService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Config\Renderer' shared service.
     *
     * @return \MailPoet\Config\Renderer
     */
    protected function getRendererService()
    {
        return $this->services['MailPoet\\Config\\Renderer'] = ${($_ = isset($this->services['MailPoet\\Config\\RendererFactory']) ? $this->services['MailPoet\\Config\\RendererFactory'] : ($this->services['MailPoet\\Config\\RendererFactory'] = new \MailPoet\Config\RendererFactory())) && false ?: '_'}->getRenderer();
    }

    /**
     * Gets the public 'MailPoet\Config\RendererFactory' shared autowired service.
     *
     * @return \MailPoet\Config\RendererFactory
     */
    protected function getRendererFactoryService()
    {
        return $this->services['MailPoet\\Config\\RendererFactory'] = new \MailPoet\Config\RendererFactory();
    }

    /**
     * Gets the public 'MailPoet\Cron\CronTrigger' shared autowired service.
     *
     * @return \MailPoet\Cron\CronTrigger
     */
    protected function getCronTriggerService()
    {
        return $this->services['MailPoet\\Cron\\CronTrigger'] = new \MailPoet\Cron\CronTrigger(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Cron\Daemon' shared autowired service.
     *
     * @return \MailPoet\Cron\Daemon
     */
    protected function getDaemonService()
    {
        return $this->services['MailPoet\\Cron\\Daemon'] = new \MailPoet\Cron\Daemon(${($_ = isset($this->services['MailPoet\\Cron\\Workers\\WorkersFactory']) ? $this->services['MailPoet\\Cron\\Workers\\WorkersFactory'] : $this->getWorkersFactoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Cron\DaemonHttpRunner' shared autowired service.
     *
     * @return \MailPoet\Cron\DaemonHttpRunner
     */
    protected function getDaemonHttpRunnerService()
    {
        return $this->services['MailPoet\\Cron\\DaemonHttpRunner'] = new \MailPoet\Cron\DaemonHttpRunner(${($_ = isset($this->services['MailPoet\\Cron\\Daemon']) ? $this->services['MailPoet\\Cron\\Daemon'] : $this->getDaemonService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Cron\Workers\SendingQueue\SendingErrorHandler' shared autowired service.
     *
     * @return \MailPoet\Cron\Workers\SendingQueue\SendingErrorHandler
     */
    protected function getSendingErrorHandlerService()
    {
        return $this->services['MailPoet\\Cron\\Workers\\SendingQueue\\SendingErrorHandler'] = new \MailPoet\Cron\Workers\SendingQueue\SendingErrorHandler();
    }

    /**
     * Gets the public 'MailPoet\Cron\Workers\WorkersFactory' shared autowired service.
     *
     * @return \MailPoet\Cron\Workers\WorkersFactory
     */
    protected function getWorkersFactoryService()
    {
        return $this->services['MailPoet\\Cron\\Workers\\WorkersFactory'] = new \MailPoet\Cron\Workers\WorkersFactory(${($_ = isset($this->services['MailPoet\\Cron\\Workers\\SendingQueue\\SendingErrorHandler']) ? $this->services['MailPoet\\Cron\\Workers\\SendingQueue\\SendingErrorHandler'] : ($this->services['MailPoet\\Cron\\Workers\\SendingQueue\\SendingErrorHandler'] = new \MailPoet\Cron\Workers\SendingQueue\SendingErrorHandler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Cron\\Workers\\StatsNotifications\\Scheduler']) ? $this->services['MailPoet\\Cron\\Workers\\StatsNotifications\\Scheduler'] : $this->getSchedulerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Mailer\\Mailer']) ? $this->services['MailPoet\\Mailer\\Mailer'] : $this->getMailer2Service()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Renderer']) ? $this->services['MailPoet\\Config\\Renderer'] : $this->getRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Segments\\WooCommerce']) ? $this->services['MailPoet\\Segments\\WooCommerce'] : $this->getWooCommerceService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\InactiveSubscribersController']) ? $this->services['MailPoet\\Subscribers\\InactiveSubscribersController'] : ($this->services['MailPoet\\Subscribers\\InactiveSubscribersController'] = new \MailPoet\Subscribers\InactiveSubscribersController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Statistics\\Track\\WooCommercePurchases']) ? $this->services['MailPoet\\Statistics\\Track\\WooCommercePurchases'] : $this->getWooCommercePurchasesService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Services\\AuthorizedEmailsController']) ? $this->services['MailPoet\\Services\\AuthorizedEmailsController'] : $this->getAuthorizedEmailsControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Segments\\SubscribersFinder']) ? $this->services['MailPoet\\Segments\\SubscribersFinder'] : $this->getSubscribersFinderService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Mailer\\MetaInfo']) ? $this->services['MailPoet\\Mailer\\MetaInfo'] : ($this->services['MailPoet\\Mailer\\MetaInfo'] = new \MailPoet\Mailer\MetaInfo())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\DI\ContainerWrapper' shared service.
     *
     * @return \MailPoet\DI\ContainerWrapper
     */
    protected function getContainerWrapperService()
    {
        return $this->services['MailPoet\\DI\\ContainerWrapper'] = \MailPoet\DI\ContainerWrapper::getInstance();
    }

    /**
     * Gets the public 'MailPoet\Features\FeatureFlagsController' shared autowired service.
     *
     * @return \MailPoet\Features\FeatureFlagsController
     */
    protected function getFeatureFlagsControllerService()
    {
        return $this->services['MailPoet\\Features\\FeatureFlagsController'] = new \MailPoet\Features\FeatureFlagsController(${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeatureFlagsRepository']) ? $this->services['MailPoet\\Features\\FeatureFlagsRepository'] : $this->getFeatureFlagsRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Form\Util\FieldNameObfuscator' shared autowired service.
     *
     * @return \MailPoet\Form\Util\FieldNameObfuscator
     */
    protected function getFieldNameObfuscatorService()
    {
        return $this->services['MailPoet\\Form\\Util\\FieldNameObfuscator'] = new \MailPoet\Form\Util\FieldNameObfuscator();
    }

    /**
     * Gets the public 'MailPoet\Listing\BulkActionController' shared autowired service.
     *
     * @return \MailPoet\Listing\BulkActionController
     */
    protected function getBulkActionControllerService()
    {
        return $this->services['MailPoet\\Listing\\BulkActionController'] = new \MailPoet\Listing\BulkActionController(${($_ = isset($this->services['MailPoet\\Listing\\BulkActionFactory']) ? $this->services['MailPoet\\Listing\\BulkActionFactory'] : ($this->services['MailPoet\\Listing\\BulkActionFactory'] = new \MailPoet\Listing\BulkActionFactory())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Listing\\Handler']) ? $this->services['MailPoet\\Listing\\Handler'] : ($this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Listing\BulkActionFactory' shared autowired service.
     *
     * @return \MailPoet\Listing\BulkActionFactory
     */
    protected function getBulkActionFactoryService()
    {
        return $this->services['MailPoet\\Listing\\BulkActionFactory'] = new \MailPoet\Listing\BulkActionFactory();
    }

    /**
     * Gets the public 'MailPoet\Listing\Handler' shared autowired service.
     *
     * @return \MailPoet\Listing\Handler
     */
    protected function getHandlerService()
    {
        return $this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler();
    }

    /**
     * Gets the public 'MailPoet\Listing\PageLimit' shared autowired service.
     *
     * @return \MailPoet\Listing\PageLimit
     */
    protected function getPageLimitService()
    {
        return $this->services['MailPoet\\Listing\\PageLimit'] = new \MailPoet\Listing\PageLimit(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Newsletter\AutomatedLatestContent' shared autowired service.
     *
     * @return \MailPoet\Newsletter\AutomatedLatestContent
     */
    protected function getAutomatedLatestContent2Service()
    {
        return $this->services['MailPoet\\Newsletter\\AutomatedLatestContent'] = new \MailPoet\Newsletter\AutomatedLatestContent();
    }

    /**
     * Gets the public 'MailPoet\Router\Endpoints\CronDaemon' shared autowired service.
     *
     * @return \MailPoet\Router\Endpoints\CronDaemon
     */
    protected function getCronDaemonService()
    {
        return $this->services['MailPoet\\Router\\Endpoints\\CronDaemon'] = new \MailPoet\Router\Endpoints\CronDaemon(${($_ = isset($this->services['MailPoet\\Cron\\DaemonHttpRunner']) ? $this->services['MailPoet\\Cron\\DaemonHttpRunner'] : $this->getDaemonHttpRunnerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Router\Endpoints\Subscription' shared autowired service.
     *
     * @return \MailPoet\Router\Endpoints\Subscription
     */
    protected function getSubscriptionService()
    {
        return $this->services['MailPoet\\Router\\Endpoints\\Subscription'] = new \MailPoet\Router\Endpoints\Subscription(new \MailPoet\Subscription\Pages(${($_ = isset($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer']) ? $this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] : ($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] = new \MailPoet\Subscribers\NewSubscriberNotificationMailer())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\CaptchaRenderer']) ? $this->services['MailPoet\\Subscription\\CaptchaRenderer'] : $this->getCaptchaRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] = new \MailPoet\Newsletter\Scheduler\WelcomeScheduler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\SubscriptionUrlFactory']) ? $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] : $this->getSubscriptionUrlFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Form\\AssetsController']) ? $this->services['MailPoet\\Form\\AssetsController'] : $this->getAssetsControllerService()) && false ?: '_'}));
    }

    /**
     * Gets the public 'MailPoet\Router\Endpoints\Track' shared autowired service.
     *
     * @return \MailPoet\Router\Endpoints\Track
     */
    protected function getTrackService()
    {
        return $this->services['MailPoet\\Router\\Endpoints\\Track'] = new \MailPoet\Router\Endpoints\Track(${($_ = isset($this->services['MailPoet\\Statistics\\Track\\Clicks']) ? $this->services['MailPoet\\Statistics\\Track\\Clicks'] : $this->getClicksService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Statistics\\Track\\Opens']) ? $this->services['MailPoet\\Statistics\\Track\\Opens'] : ($this->services['MailPoet\\Statistics\\Track\\Opens'] = new \MailPoet\Statistics\Track\Opens())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Router\Endpoints\ViewInBrowser' shared autowired service.
     *
     * @return \MailPoet\Router\Endpoints\ViewInBrowser
     */
    protected function getViewInBrowserService()
    {
        return $this->services['MailPoet\\Router\\Endpoints\\ViewInBrowser'] = new \MailPoet\Router\Endpoints\ViewInBrowser(${($_ = isset($this->services['MailPoet\\Config\\AccessControl']) ? $this->services['MailPoet\\Config\\AccessControl'] : ($this->services['MailPoet\\Config\\AccessControl'] = new \MailPoet\Config\AccessControl())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Segments\SubscribersListings' shared autowired service.
     *
     * @return \MailPoet\Segments\SubscribersListings
     */
    protected function getSubscribersListingsService()
    {
        return $this->services['MailPoet\\Segments\\SubscribersListings'] = new \MailPoet\Segments\SubscribersListings(${($_ = isset($this->services['MailPoet\\Listing\\Handler']) ? $this->services['MailPoet\\Listing\\Handler'] : ($this->services['MailPoet\\Listing\\Handler'] = new \MailPoet\Listing\Handler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Segments\WooCommerce' shared autowired service.
     *
     * @return \MailPoet\Segments\WooCommerce
     */
    protected function getWooCommerceService()
    {
        return $this->services['MailPoet\\Segments\\WooCommerce'] = new \MailPoet\Segments\WooCommerce(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Settings\SettingsController' shared autowired service.
     *
     * @return \MailPoet\Settings\SettingsController
     */
    protected function getSettingsControllerService()
    {
        return $this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController();
    }

    /**
     * Gets the public 'MailPoet\Settings\UserFlagsRepository' shared autowired service.
     *
     * @return \MailPoet\Settings\UserFlagsRepository
     */
    protected function getUserFlagsRepositoryService()
    {
        return $this->services['MailPoet\\Settings\\UserFlagsRepository'] = new \MailPoet\Settings\UserFlagsRepository(${($_ = isset($this->services['MailPoetVendor\\Doctrine\\ORM\\EntityManager']) ? $this->services['MailPoetVendor\\Doctrine\\ORM\\EntityManager'] : $this->getEntityManagerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscribers\ConfirmationEmailMailer' shared autowired service.
     *
     * @return \MailPoet\Subscribers\ConfirmationEmailMailer
     */
    protected function getConfirmationEmailMailerService()
    {
        return $this->services['MailPoet\\Subscribers\\ConfirmationEmailMailer'] = new \MailPoet\Subscribers\ConfirmationEmailMailer(NULL, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\SubscriptionUrlFactory']) ? $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] : $this->getSubscriptionUrlFactoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscribers\NewSubscriberNotificationMailer' shared autowired service.
     *
     * @return \MailPoet\Subscribers\NewSubscriberNotificationMailer
     */
    protected function getNewSubscriberNotificationMailerService()
    {
        return $this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] = new \MailPoet\Subscribers\NewSubscriberNotificationMailer();
    }

    /**
     * Gets the public 'MailPoet\Subscribers\RequiredCustomFieldValidator' shared autowired service.
     *
     * @return \MailPoet\Subscribers\RequiredCustomFieldValidator
     */
    protected function getRequiredCustomFieldValidatorService()
    {
        return $this->services['MailPoet\\Subscribers\\RequiredCustomFieldValidator'] = new \MailPoet\Subscribers\RequiredCustomFieldValidator();
    }

    /**
     * Gets the public 'MailPoet\Subscribers\SubscriberActions' shared autowired service.
     *
     * @return \MailPoet\Subscribers\SubscriberActions
     */
    protected function getSubscriberActionsService()
    {
        return $this->services['MailPoet\\Subscribers\\SubscriberActions'] = new \MailPoet\Subscribers\SubscriberActions(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer']) ? $this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] : ($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] = new \MailPoet\Subscribers\NewSubscriberNotificationMailer())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\ConfirmationEmailMailer']) ? $this->services['MailPoet\\Subscribers\\ConfirmationEmailMailer'] : $this->getConfirmationEmailMailerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] = new \MailPoet\Newsletter\Scheduler\WelcomeScheduler())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscription\Captcha' shared autowired service.
     *
     * @return \MailPoet\Subscription\Captcha
     */
    protected function getCaptchaService()
    {
        return $this->services['MailPoet\\Subscription\\Captcha'] = new \MailPoet\Subscription\Captcha(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\CaptchaSession']) ? $this->services['MailPoet\\Subscription\\CaptchaSession'] : $this->getCaptchaSessionService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscription\CaptchaRenderer' shared autowired service.
     *
     * @return \MailPoet\Subscription\CaptchaRenderer
     */
    protected function getCaptchaRendererService()
    {
        return $this->services['MailPoet\\Subscription\\CaptchaRenderer'] = new \MailPoet\Subscription\CaptchaRenderer(${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\CaptchaSession']) ? $this->services['MailPoet\\Subscription\\CaptchaSession'] : $this->getCaptchaSessionService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\SubscriptionUrlFactory']) ? $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] : $this->getSubscriptionUrlFactoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscription\Comment' shared autowired service.
     *
     * @return \MailPoet\Subscription\Comment
     */
    protected function getCommentService()
    {
        return $this->services['MailPoet\\Subscription\\Comment'] = new \MailPoet\Subscription\Comment(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\SubscriberActions']) ? $this->services['MailPoet\\Subscribers\\SubscriberActions'] : $this->getSubscriberActionsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscription\Form' shared autowired service.
     *
     * @return \MailPoet\Subscription\Form
     */
    protected function getFormService()
    {
        return $this->services['MailPoet\\Subscription\\Form'] = new \MailPoet\Subscription\Form(${($_ = isset($this->services['MailPoet\\API\\JSON\\API']) ? $this->services['MailPoet\\API\\JSON\\API'] : $this->getAPIService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscription\Manage' shared autowired service.
     *
     * @return \MailPoet\Subscription\Manage
     */
    protected function getManageService()
    {
        return $this->services['MailPoet\\Subscription\\Manage'] = new \MailPoet\Subscription\Manage(${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Form\\Util\\FieldNameObfuscator']) ? $this->services['MailPoet\\Form\\Util\\FieldNameObfuscator'] : ($this->services['MailPoet\\Form\\Util\\FieldNameObfuscator'] = new \MailPoet\Form\Util\FieldNameObfuscator())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscription\Pages' autowired service.
     *
     * @return \MailPoet\Subscription\Pages
     */
    protected function getPagesService()
    {
        return new \MailPoet\Subscription\Pages(${($_ = isset($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer']) ? $this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] : ($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] = new \MailPoet\Subscribers\NewSubscriberNotificationMailer())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\CaptchaRenderer']) ? $this->services['MailPoet\\Subscription\\CaptchaRenderer'] : $this->getCaptchaRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] = new \MailPoet\Newsletter\Scheduler\WelcomeScheduler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\SubscriptionUrlFactory']) ? $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] : $this->getSubscriptionUrlFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Form\\AssetsController']) ? $this->services['MailPoet\\Form\\AssetsController'] : $this->getAssetsControllerService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Subscription\Registration' shared autowired service.
     *
     * @return \MailPoet\Subscription\Registration
     */
    protected function getRegistrationService()
    {
        return $this->services['MailPoet\\Subscription\\Registration'] = new \MailPoet\Subscription\Registration(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\SubscriberActions']) ? $this->services['MailPoet\\Subscribers\\SubscriberActions'] : $this->getSubscriberActionsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\Util\Url' shared autowired service.
     *
     * @return \MailPoet\Util\Url
     */
    protected function getUrlService()
    {
        return $this->services['MailPoet\\Util\\Url'] = new \MailPoet\Util\Url(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\WP\Functions' shared autowired service.
     *
     * @return \MailPoet\WP\Functions
     */
    protected function getFunctionsService()
    {
        return $this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions();
    }

    /**
     * Gets the public 'MailPoet\WooCommerce\Helper' shared autowired service.
     *
     * @return \MailPoet\WooCommerce\Helper
     */
    protected function getHelperService()
    {
        return $this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper();
    }

    /**
     * Gets the public 'MailPoet\WooCommerce\Settings' shared autowired service.
     *
     * @return \MailPoet\WooCommerce\Settings
     */
    protected function getSettings3Service()
    {
        return $this->services['MailPoet\\WooCommerce\\Settings'] = new \MailPoet\WooCommerce\Settings(${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Renderer']) ? $this->services['MailPoet\\Config\\Renderer'] : $this->getRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the public 'MailPoet\WooCommerce\Subscription' shared autowired service.
     *
     * @return \MailPoet\WooCommerce\Subscription
     */
    protected function getSubscription2Service()
    {
        return $this->services['MailPoet\\WooCommerce\\Subscription'] = new \MailPoet\WooCommerce\Subscription(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoetVendor\Doctrine\ORM\Configuration' shared autowired service.
     *
     * @return \MailPoetVendor\Doctrine\ORM\Configuration
     */
    protected function getConfigurationService()
    {
        return $this->services['MailPoetVendor\\Doctrine\\ORM\\Configuration'] = ${($_ = isset($this->services['MailPoet\\Doctrine\\ConfigurationFactory']) ? $this->services['MailPoet\\Doctrine\\ConfigurationFactory'] : ($this->services['MailPoet\\Doctrine\\ConfigurationFactory'] = new \MailPoet\Doctrine\ConfigurationFactory())) && false ?: '_'}->createConfiguration();
    }

    /**
     * Gets the private 'MailPoet\API\JSON\ResponseBuilders\NewslettersResponseBuilder' shared autowired service.
     *
     * @return \MailPoet\API\JSON\ResponseBuilders\NewslettersResponseBuilder
     */
    protected function getNewslettersResponseBuilderService()
    {
        return $this->services['MailPoet\\API\\JSON\\ResponseBuilders\\NewslettersResponseBuilder'] = new \MailPoet\API\JSON\ResponseBuilders\NewslettersResponseBuilder();
    }

    /**
     * Gets the private 'MailPoet\Config\DatabaseInitializer' shared autowired service.
     *
     * @return \MailPoet\Config\DatabaseInitializer
     */
    protected function getDatabaseInitializerService()
    {
        return $this->services['MailPoet\\Config\\DatabaseInitializer'] = new \MailPoet\Config\DatabaseInitializer($this);
    }

    /**
     * Gets the private 'MailPoet\Config\MP2Migrator' shared autowired service.
     *
     * @return \MailPoet\Config\MP2Migrator
     */
    protected function getMP2Migrator2Service()
    {
        return $this->services['MailPoet\\Config\\MP2Migrator'] = new \MailPoet\Config\MP2Migrator(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Activator']) ? $this->services['MailPoet\\Config\\Activator'] : $this->getActivatorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Config\Populator' shared autowired service.
     *
     * @return \MailPoet\Config\Populator
     */
    protected function getPopulatorService()
    {
        return $this->services['MailPoet\\Config\\Populator'] = new \MailPoet\Config\Populator(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\Captcha']) ? $this->services['MailPoet\\Subscription\\Captcha'] : $this->getCaptchaService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Referrals\\ReferralDetector']) ? $this->services['MailPoet\\Referrals\\ReferralDetector'] : $this->getReferralDetectorService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WooCommerce\\TransactionalEmails']) ? $this->services['MailPoet\\WooCommerce\\TransactionalEmails'] : $this->getTransactionalEmailsService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Config\ServicesChecker' shared autowired service.
     *
     * @return \MailPoet\Config\ServicesChecker
     */
    protected function getServicesCheckerService()
    {
        return $this->services['MailPoet\\Config\\ServicesChecker'] = new \MailPoet\Config\ServicesChecker();
    }

    /**
     * Gets the private 'MailPoet\Config\Shortcodes' autowired service.
     *
     * @return \MailPoet\Config\Shortcodes
     */
    protected function getShortcodesService()
    {
        $a = ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'};

        return new \MailPoet\Config\Shortcodes(new \MailPoet\Subscription\Pages(${($_ = isset($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer']) ? $this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] : ($this->services['MailPoet\\Subscribers\\NewSubscriberNotificationMailer'] = new \MailPoet\Subscribers\NewSubscriberNotificationMailer())) && false ?: '_'}, $a, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Url']) ? $this->services['MailPoet\\Util\\Url'] : $this->getUrlService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\CaptchaRenderer']) ? $this->services['MailPoet\\Subscription\\CaptchaRenderer'] : $this->getCaptchaRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler']) ? $this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] : ($this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] = new \MailPoet\Newsletter\Scheduler\WelcomeScheduler())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscription\\SubscriptionUrlFactory']) ? $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] : $this->getSubscriptionUrlFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Form\\AssetsController']) ? $this->services['MailPoet\\Form\\AssetsController'] : $this->getAssetsControllerService()) && false ?: '_'}), $a);
    }

    /**
     * Gets the private 'MailPoet\Cron\Workers\StatsNotifications\Scheduler' shared autowired service.
     *
     * @return \MailPoet\Cron\Workers\StatsNotifications\Scheduler
     */
    protected function getSchedulerService()
    {
        return $this->services['MailPoet\\Cron\\Workers\\StatsNotifications\\Scheduler'] = new \MailPoet\Cron\Workers\StatsNotifications\Scheduler(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\CustomFields\ApiDataSanitizer' shared autowired service.
     *
     * @return \MailPoet\CustomFields\ApiDataSanitizer
     */
    protected function getApiDataSanitizerService()
    {
        return $this->services['MailPoet\\CustomFields\\ApiDataSanitizer'] = new \MailPoet\CustomFields\ApiDataSanitizer();
    }

    /**
     * Gets the private 'MailPoet\Doctrine\ConfigurationFactory' shared autowired service.
     *
     * @return \MailPoet\Doctrine\ConfigurationFactory
     */
    protected function getConfigurationFactoryService()
    {
        return $this->services['MailPoet\\Doctrine\\ConfigurationFactory'] = new \MailPoet\Doctrine\ConfigurationFactory();
    }

    /**
     * Gets the private 'MailPoet\Doctrine\ConnectionFactory' shared autowired service.
     *
     * @return \MailPoet\Doctrine\ConnectionFactory
     */
    protected function getConnectionFactoryService()
    {
        return $this->services['MailPoet\\Doctrine\\ConnectionFactory'] = new \MailPoet\Doctrine\ConnectionFactory();
    }

    /**
     * Gets the private 'MailPoet\Doctrine\EntityManagerFactory' shared autowired service.
     *
     * @return \MailPoet\Doctrine\EntityManagerFactory
     */
    protected function getEntityManagerFactoryService()
    {
        return $this->services['MailPoet\\Doctrine\\EntityManagerFactory'] = new \MailPoet\Doctrine\EntityManagerFactory(${($_ = isset($this->services['MailPoetVendor\\Doctrine\\DBAL\\Connection']) ? $this->services['MailPoetVendor\\Doctrine\\DBAL\\Connection'] : $this->getConnectionService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoetVendor\\Doctrine\\ORM\\Configuration']) ? $this->services['MailPoetVendor\\Doctrine\\ORM\\Configuration'] : $this->getConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Doctrine\\EventListeners\\TimestampListener']) ? $this->services['MailPoet\\Doctrine\\EventListeners\\TimestampListener'] : $this->getTimestampListenerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Doctrine\EventListeners\TimestampListener' shared autowired service.
     *
     * @return \MailPoet\Doctrine\EventListeners\TimestampListener
     */
    protected function getTimestampListenerService()
    {
        return $this->services['MailPoet\\Doctrine\\EventListeners\\TimestampListener'] = new \MailPoet\Doctrine\EventListeners\TimestampListener(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Features\FeatureFlagsRepository' shared autowired service.
     *
     * @return \MailPoet\Features\FeatureFlagsRepository
     */
    protected function getFeatureFlagsRepositoryService()
    {
        return $this->services['MailPoet\\Features\\FeatureFlagsRepository'] = new \MailPoet\Features\FeatureFlagsRepository(${($_ = isset($this->services['MailPoetVendor\\Doctrine\\ORM\\EntityManager']) ? $this->services['MailPoetVendor\\Doctrine\\ORM\\EntityManager'] : $this->getEntityManagerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Features\FeaturesController' shared autowired service.
     *
     * @return \MailPoet\Features\FeaturesController
     */
    protected function getFeaturesControllerService()
    {
        return $this->services['MailPoet\\Features\\FeaturesController'] = new \MailPoet\Features\FeaturesController(${($_ = isset($this->services['MailPoet\\Features\\FeatureFlagsRepository']) ? $this->services['MailPoet\\Features\\FeatureFlagsRepository'] : $this->getFeatureFlagsRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Form\AssetsController' shared autowired service.
     *
     * @return \MailPoet\Form\AssetsController
     */
    protected function getAssetsControllerService()
    {
        return $this->services['MailPoet\\Form\\AssetsController'] = new \MailPoet\Form\AssetsController(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Config\\Renderer']) ? $this->services['MailPoet\\Config\\Renderer'] : $this->getRendererService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Mailer\Mailer' shared autowired service.
     *
     * @return \MailPoet\Mailer\Mailer
     */
    protected function getMailer2Service()
    {
        return $this->services['MailPoet\\Mailer\\Mailer'] = new \MailPoet\Mailer\Mailer(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Mailer\MetaInfo' shared autowired service.
     *
     * @return \MailPoet\Mailer\MetaInfo
     */
    protected function getMetaInfoService()
    {
        return $this->services['MailPoet\\Mailer\\MetaInfo'] = new \MailPoet\Mailer\MetaInfo();
    }

    /**
     * Gets the private 'MailPoet\Mailer\Methods\Common\BlacklistCheck' shared autowired service.
     *
     * @return \MailPoet\Mailer\Methods\Common\BlacklistCheck
     */
    protected function getBlacklistCheckService()
    {
        return $this->services['MailPoet\\Mailer\\Methods\\Common\\BlacklistCheck'] = new \MailPoet\Mailer\Methods\Common\BlacklistCheck();
    }

    /**
     * Gets the private 'MailPoet\Mailer\WordPress\WordpressMailerReplacer' shared autowired service.
     *
     * @return \MailPoet\Mailer\WordPress\WordpressMailerReplacer
     */
    protected function getWordpressMailerReplacerService()
    {
        return $this->services['MailPoet\\Mailer\\WordPress\\WordpressMailerReplacer'] = new \MailPoet\Mailer\WordPress\WordpressMailerReplacer(${($_ = isset($this->services['MailPoet\\Features\\FeaturesController']) ? $this->services['MailPoet\\Features\\FeaturesController'] : $this->getFeaturesControllerService()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Mailer\\Mailer']) ? $this->services['MailPoet\\Mailer\\Mailer'] : $this->getMailer2Service()) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Mailer\\MetaInfo']) ? $this->services['MailPoet\\Mailer\\MetaInfo'] : ($this->services['MailPoet\\Mailer\\MetaInfo'] = new \MailPoet\Mailer\MetaInfo())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Newsletter\NewslettersRepository' shared autowired service.
     *
     * @return \MailPoet\Newsletter\NewslettersRepository
     */
    protected function getNewslettersRepositoryService()
    {
        return $this->services['MailPoet\\Newsletter\\NewslettersRepository'] = new \MailPoet\Newsletter\NewslettersRepository(${($_ = isset($this->services['MailPoetVendor\\Doctrine\\ORM\\EntityManager']) ? $this->services['MailPoetVendor\\Doctrine\\ORM\\EntityManager'] : $this->getEntityManagerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Newsletter\Scheduler\PostNotificationScheduler' shared autowired service.
     *
     * @return \MailPoet\Newsletter\Scheduler\PostNotificationScheduler
     */
    protected function getPostNotificationSchedulerService()
    {
        return $this->services['MailPoet\\Newsletter\\Scheduler\\PostNotificationScheduler'] = new \MailPoet\Newsletter\Scheduler\PostNotificationScheduler();
    }

    /**
     * Gets the private 'MailPoet\Newsletter\Scheduler\WelcomeScheduler' shared autowired service.
     *
     * @return \MailPoet\Newsletter\Scheduler\WelcomeScheduler
     */
    protected function getWelcomeSchedulerService()
    {
        return $this->services['MailPoet\\Newsletter\\Scheduler\\WelcomeScheduler'] = new \MailPoet\Newsletter\Scheduler\WelcomeScheduler();
    }

    /**
     * Gets the private 'MailPoet\Referrals\ReferralDetector' shared autowired service.
     *
     * @return \MailPoet\Referrals\ReferralDetector
     */
    protected function getReferralDetectorService()
    {
        return $this->services['MailPoet\\Referrals\\ReferralDetector'] = new \MailPoet\Referrals\ReferralDetector(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Router\Router' shared autowired service.
     *
     * @return \MailPoet\Router\Router
     */
    protected function getRouterService()
    {
        return $this->services['MailPoet\\Router\\Router'] = new \MailPoet\Router\Router(${($_ = isset($this->services['MailPoet\\Config\\AccessControl']) ? $this->services['MailPoet\\Config\\AccessControl'] : ($this->services['MailPoet\\Config\\AccessControl'] = new \MailPoet\Config\AccessControl())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\DI\\ContainerWrapper']) ? $this->services['MailPoet\\DI\\ContainerWrapper'] : $this->getContainerWrapperService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Segments\SubscribersFinder' shared autowired service.
     *
     * @return \MailPoet\Segments\SubscribersFinder
     */
    protected function getSubscribersFinderService()
    {
        return $this->services['MailPoet\\Segments\\SubscribersFinder'] = new \MailPoet\Segments\SubscribersFinder(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Services\AuthorizedEmailsController' shared autowired service.
     *
     * @return \MailPoet\Services\AuthorizedEmailsController
     */
    protected function getAuthorizedEmailsControllerService()
    {
        return $this->services['MailPoet\\Services\\AuthorizedEmailsController'] = new \MailPoet\Services\AuthorizedEmailsController(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Services\\Bridge']) ? $this->services['MailPoet\\Services\\Bridge'] : $this->getBridgeService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Services\Bridge' shared autowired service.
     *
     * @return \MailPoet\Services\Bridge
     */
    protected function getBridgeService()
    {
        return $this->services['MailPoet\\Services\\Bridge'] = new \MailPoet\Services\Bridge(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Settings\UserFlagsController' shared autowired service.
     *
     * @return \MailPoet\Settings\UserFlagsController
     */
    protected function getUserFlagsControllerService()
    {
        return $this->services['MailPoet\\Settings\\UserFlagsController'] = new \MailPoet\Settings\UserFlagsController(${($_ = isset($this->services['MailPoet\\Settings\\UserFlagsRepository']) ? $this->services['MailPoet\\Settings\\UserFlagsRepository'] : $this->getUserFlagsRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Statistics\Track\Clicks' shared autowired service.
     *
     * @return \MailPoet\Statistics\Track\Clicks
     */
    protected function getClicksService()
    {
        return $this->services['MailPoet\\Statistics\\Track\\Clicks'] = new \MailPoet\Statistics\Track\Clicks(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Cookies']) ? $this->services['MailPoet\\Util\\Cookies'] : ($this->services['MailPoet\\Util\\Cookies'] = new \MailPoet\Util\Cookies())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Statistics\Track\Opens' shared autowired service.
     *
     * @return \MailPoet\Statistics\Track\Opens
     */
    protected function getOpensService()
    {
        return $this->services['MailPoet\\Statistics\\Track\\Opens'] = new \MailPoet\Statistics\Track\Opens();
    }

    /**
     * Gets the private 'MailPoet\Statistics\Track\WooCommercePurchases' shared autowired service.
     *
     * @return \MailPoet\Statistics\Track\WooCommercePurchases
     */
    protected function getWooCommercePurchasesService()
    {
        return $this->services['MailPoet\\Statistics\\Track\\WooCommercePurchases'] = new \MailPoet\Statistics\Track\WooCommercePurchases(${($_ = isset($this->services['MailPoet\\WooCommerce\\Helper']) ? $this->services['MailPoet\\WooCommerce\\Helper'] : ($this->services['MailPoet\\WooCommerce\\Helper'] = new \MailPoet\WooCommerce\Helper())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Util\\Cookies']) ? $this->services['MailPoet\\Util\\Cookies'] : ($this->services['MailPoet\\Util\\Cookies'] = new \MailPoet\Util\Cookies())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Subscribers\InactiveSubscribersController' shared autowired service.
     *
     * @return \MailPoet\Subscribers\InactiveSubscribersController
     */
    protected function getInactiveSubscribersControllerService()
    {
        return $this->services['MailPoet\\Subscribers\\InactiveSubscribersController'] = new \MailPoet\Subscribers\InactiveSubscribersController();
    }

    /**
     * Gets the private 'MailPoet\Subscribers\LinkTokens' shared autowired service.
     *
     * @return \MailPoet\Subscribers\LinkTokens
     */
    protected function getLinkTokensService()
    {
        return $this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens();
    }

    /**
     * Gets the private 'MailPoet\Subscription\CaptchaSession' shared autowired service.
     *
     * @return \MailPoet\Subscription\CaptchaSession
     */
    protected function getCaptchaSessionService()
    {
        return $this->services['MailPoet\\Subscription\\CaptchaSession'] = new \MailPoet\Subscription\CaptchaSession(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Subscription\SubscriptionUrlFactory' shared autowired service.
     *
     * @return \MailPoet\Subscription\SubscriptionUrlFactory
     */
    protected function getSubscriptionUrlFactoryService()
    {
        return $this->services['MailPoet\\Subscription\\SubscriptionUrlFactory'] = new \MailPoet\Subscription\SubscriptionUrlFactory(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Subscribers\\LinkTokens']) ? $this->services['MailPoet\\Subscribers\\LinkTokens'] : ($this->services['MailPoet\\Subscribers\\LinkTokens'] = new \MailPoet\Subscribers\LinkTokens())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Tasks\State' shared autowired service.
     *
     * @return \MailPoet\Tasks\State
     */
    protected function getStateService()
    {
        return $this->services['MailPoet\\Tasks\\State'] = new \MailPoet\Tasks\State();
    }

    /**
     * Gets the private 'MailPoet\Util\Cookies' shared autowired service.
     *
     * @return \MailPoet\Util\Cookies
     */
    protected function getCookiesService()
    {
        return $this->services['MailPoet\\Util\\Cookies'] = new \MailPoet\Util\Cookies();
    }

    /**
     * Gets the private 'MailPoet\Util\Installation' shared autowired service.
     *
     * @return \MailPoet\Util\Installation
     */
    protected function getInstallationService()
    {
        return $this->services['MailPoet\\Util\\Installation'] = new \MailPoet\Util\Installation(${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\Util\Notices\PermanentNotices' shared autowired service.
     *
     * @return \MailPoet\Util\Notices\PermanentNotices
     */
    protected function getPermanentNoticesService()
    {
        return $this->services['MailPoet\\Util\\Notices\\PermanentNotices'] = new \MailPoet\Util\Notices\PermanentNotices(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'});
    }

    /**
     * Gets the private 'MailPoet\WooCommerce\TransactionalEmails' shared autowired service.
     *
     * @return \MailPoet\WooCommerce\TransactionalEmails
     */
    protected function getTransactionalEmailsService()
    {
        return $this->services['MailPoet\\WooCommerce\\TransactionalEmails'] = new \MailPoet\WooCommerce\TransactionalEmails(${($_ = isset($this->services['MailPoet\\WP\\Functions']) ? $this->services['MailPoet\\WP\\Functions'] : ($this->services['MailPoet\\WP\\Functions'] = new \MailPoet\WP\Functions())) && false ?: '_'}, ${($_ = isset($this->services['MailPoet\\Settings\\SettingsController']) ? $this->services['MailPoet\\Settings\\SettingsController'] : ($this->services['MailPoet\\Settings\\SettingsController'] = new \MailPoet\Settings\SettingsController())) && false ?: '_'});
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    private $normalizedParameterNames = [];

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since Symfony 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'container.autowiring.strict_mode' => true,
        ];
    }
}
