<?php

namespace ContainerD0u1xWv;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/*
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final
 */
class appAppKernelProdContainer extends Container
{
    private $buildParameters;
    private $containerDir;
    private $targetDir;
    private $parameters = [];
    private $getService;

    public function __construct(array $buildParameters = [], $containerDir = __DIR__)
    {
        $this->getService = \Closure::fromCallable([$this, 'getService']);
        $this->buildParameters = $buildParameters;
        $this->containerDir = $containerDir;
        $this->targetDir = \dirname($containerDir);
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->syntheticIds = [
            'Pimcore\\Cache\\Runtime' => true,
            'Pimcore\\Extension\\Config' => true,
            'kernel' => true,
        ];
        $this->methodMap = [
            'Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener' => 'getCsrfProtectionListenerService',
            'Pimcore\\Bundle\\AdminBundle\\Security\\User\\TokenStorageUserResolver' => 'getTokenStorageUserResolverService',
            'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\CookiePolicyNoticeListener' => 'getCookiePolicyNoticeListenerService',
            'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FullPageCacheListener' => 'getFullPageCacheListenerService',
            'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleAnalyticsCodeListener' => 'getGoogleAnalyticsCodeListenerService',
            'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleTagManagerListener' => 'getGoogleTagManagerListenerService',
            'Pimcore\\Config' => 'getConfigService',
            'Pimcore\\Document\\DocumentStack' => 'getDocumentStackService',
            'Pimcore\\Document\\Editable\\Block\\BlockStateStack' => 'getBlockStateStackService',
            'Pimcore\\Extension\\Bundle\\PimcoreBundleManager' => 'getPimcoreBundleManagerService',
            'Pimcore\\Http\\RequestHelper' => 'getRequestHelperService',
            'Pimcore\\Http\\Request\\Resolver\\DocumentResolver' => 'getDocumentResolverService',
            'Pimcore\\Http\\Request\\Resolver\\EditmodeResolver' => 'getEditmodeResolverService',
            'Pimcore\\Http\\Request\\Resolver\\OutputTimestampResolver' => 'getOutputTimestampResolverService',
            'Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver' => 'getPimcoreContextResolverService',
            'Pimcore\\Http\\Request\\Resolver\\ResponseHeaderResolver' => 'getResponseHeaderResolverService',
            'Pimcore\\Http\\Request\\Resolver\\SiteResolver' => 'getSiteResolverService',
            'Pimcore\\Http\\Request\\Resolver\\TemplateVarsResolver' => 'getTemplateVarsResolverService',
            'Pimcore\\Http\\Request\\Resolver\\ViewModelResolver' => 'getViewModelResolverService',
            'Pimcore\\Http\\ResponseHelper' => 'getResponseHelperService',
            'Pimcore\\Model\\Document\\Service' => 'getServiceService',
            'Pimcore\\Targeting\\Document\\DocumentTargetingConfigurator' => 'getDocumentTargetingConfiguratorService',
            'Symfony\\Component\\HttpKernel\\EventListener\\SessionListener' => 'getSessionListenerService',
            'Symfony\\Component\\Lock\\LockFactory' => 'getLockFactoryService',
            'Symfony\\Contracts\\Translation\\TranslatorInterface' => 'getTranslatorInterfaceService',
            'cmf_routing.route_provider' => 'getCmfRouting_RouteProviderService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'event_dispatcher' => 'getEventDispatcherService',
            'form.factory' => 'getForm_FactoryService',
            'http_kernel' => 'getHttpKernelService',
            'monolog.logger.admin' => 'getMonolog_Logger_AdminService',
            'monolog.logger.cache' => 'getMonolog_Logger_CacheService',
            'monolog.logger.init' => 'getMonolog_Logger_InitService',
            'monolog.logger.php' => 'getMonolog_Logger_PhpService',
            'monolog.logger.request' => 'getMonolog_Logger_RequestService',
            'monolog.logger.router' => 'getMonolog_Logger_RouterService',
            'monolog.logger.routing' => 'getMonolog_Logger_RoutingService',
            'monolog.logger.security' => 'getMonolog_Logger_SecurityService',
            'pimcore.cache.core.handler' => 'getPimcore_Cache_Core_HandlerService',
            'pimcore.cache.core.pool' => 'getPimcore_Cache_Core_PoolService',
            'pimcore.controller.config.config_normalizer' => 'getPimcore_Controller_Config_ConfigNormalizerService',
            'pimcore.routing.router.request_context' => 'getPimcore_Routing_Router_RequestContextService',
            'pimcore.service.context.pimcore_context_guesser' => 'getPimcore_Service_Context_PimcoreContextGuesserService',
            'pimcore.service.request_matcher_factory' => 'getPimcore_Service_RequestMatcherFactoryService',
            'pimcore_admin.security.bruteforce_protection_handler' => 'getPimcoreAdmin_Security_BruteforceProtectionHandlerService',
            'pimcore_admin.security.user_loader' => 'getPimcoreAdmin_Security_UserLoaderService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'sensio_framework_extra.view.guesser' => 'getSensioFrameworkExtra_View_GuesserService',
            'pimcore.rest_client' => 'getPimcore_RestClientService',
            'pimcore.implementation_loader.document.tag' => 'getPimcore_ImplementationLoader_Document_TagService',
            'pimcore.document.tag.block_state_stack' => 'getPimcore_Document_Tag_BlockStateStackService',
            'pimcore.document.tag.handler' => 'getPimcore_Document_Tag_HandlerService',
            'Pimcore\\Document\\Tag\\TagUsageResolver' => 'getTagUsageResolverService',
        ];
        $this->fileMap = [
            'AppBundle\\Controller\\DefaultController' => 'getDefaultControllerService.php',
            'GuzzleHttp\\Client' => 'getClientService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController' => 'getAssetControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Asset\\AssetHelperController' => 'getAssetHelperControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\ClassController' => 'getClassControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\ClassificationstoreController' => 'getClassificationstoreControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController' => 'getDataObjectControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectHelperController' => 'getDataObjectHelperControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\QuantityValueController' => 'getQuantityValueControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\VariantsController' => 'getVariantsControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController' => 'getDocumentControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\EmailController' => 'getEmailControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\FolderController' => 'getFolderControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\HardlinkController' => 'getHardlinkControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\LinkController' => 'getLinkControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\NewsletterController' => 'getNewsletterControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController' => 'getPageControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintcontainerController' => 'getPrintcontainerControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintpageController' => 'getPrintpageControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintpageControllerBase' => 'getPrintpageControllerBaseService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\RenderletController' => 'getRenderletControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController' => 'getSnippetControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\ElementController' => 'getElementControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\ElementControllerBase' => 'getElementControllerBaseService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\EmailController' => 'getEmailController2Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\AdminerController' => 'getAdminerControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\LinfoController' => 'getLinfoControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\OpcacheController' => 'getOpcacheControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\IndexController' => 'getIndexControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\InstallController' => 'getInstallControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\LogController' => 'getLogControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\LoginController' => 'getLoginControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\MiscController' => 'getMiscControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\NotificationController' => 'getNotificationControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\PortalController' => 'getPortalControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\RecyclebinController' => 'getRecyclebinControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\RedirectsController' => 'getRedirectsControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\SettingsController' => 'getSettingsControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TagsController' => 'getTagsControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TargetingController' => 'getTargetingControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TranslationController' => 'getTranslationControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\UserController' => 'getUserControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\WorkflowController' => 'getWorkflowControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\ExtensionManager\\ExtensionManagerController' => 'getExtensionManagerControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\AdminController' => 'getAdminControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\AssetController' => 'getAssetController2Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\DataObjectController' => 'getDataObjectController2Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\PimcoreUsersController' => 'getPimcoreUsersControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\SentMailController' => 'getSentMailControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\AnalyticsController' => 'getAnalyticsControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\CustomReportController' => 'getCustomReportControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\PiwikController' => 'getPiwikControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\QrcodeController' => 'getQrcodeControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\ReportsControllerBase' => 'getReportsControllerBaseService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\SettingsController' => 'getSettingsController2Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\ClassController' => 'getClassController2Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\AssetController' => 'getAssetController3Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\DataObjectController' => 'getDataObjectController3Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\DocumentController' => 'getDocumentController2Service.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\TagController' => 'getTagControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Helper' => 'getHelperService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\ImageController' => 'getImageControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\InfoController' => 'getInfoControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Controller\\Searchadmin\\SearchController' => 'getSearchControllerService.php',
            'Pimcore\\Bundle\\AdminBundle\\Session\\Handler\\AdminSessionHandler' => 'getAdminSessionHandlerService.php',
            'Pimcore\\Bundle\\CoreBundle\\Controller\\PublicServicesController' => 'getPublicServicesControllerService.php',
            'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\TagManagerListener' => 'getTagManagerListenerService.php',
            'Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener' => 'getWorkflowManagementListenerService.php',
            'Pimcore\\Cache\\Symfony\\CacheClearer' => 'getCacheClearerService.php',
            'Pimcore\\Controller\\Config\\ControllerDataProvider' => 'getControllerDataProviderService.php',
            'Pimcore\\DataObject\\Consent\\Service' => 'getService2Service.php',
            'Pimcore\\DataObject\\GridColumnConfig\\Service' => 'getService3Service.php',
            'Pimcore\\Document\\Editable\\DelegatingEditableHandler' => 'getDelegatingEditableHandlerService.php',
            'Pimcore\\Document\\Editable\\EditableUsageResolver' => 'getEditableUsageResolverService.php',
            'Pimcore\\Document\\Renderer\\DocumentRenderer' => 'getDocumentRendererService.php',
            'Pimcore\\Extension\\Document\\Areabrick\\AreabrickManagerInterface' => 'getAreabrickManagerInterfaceService.php',
            'Pimcore\\Helper\\LongRunningHelper' => 'getLongRunningHelperService.php',
            'Pimcore\\Http\\ClientFactory' => 'getClientFactoryService.php',
            'Pimcore\\Http\\Request\\Resolver\\TemplateResolver' => 'getTemplateResolverService.php',
            'Pimcore\\Image\\Optimizer' => 'getOptimizerService.php',
            'Pimcore\\Localization\\LocaleServiceInterface' => 'getLocaleServiceInterfaceService.php',
            'Pimcore\\Log\\ApplicationLogger' => 'getApplicationLoggerService.php',
            'Pimcore\\Log\\Handler\\ApplicationLoggerDb' => 'getApplicationLoggerDbService.php',
            'Pimcore\\Migrations\\Configuration\\ConfigurationFactory' => 'getConfigurationFactoryService.php',
            'Pimcore\\Migrations\\MigrationManager' => 'getMigrationManagerService.php',
            'Pimcore\\Model\\DataObject\\ClassDefinition\\ClassDefinitionManager' => 'getClassDefinitionManagerService.php',
            'Pimcore\\Model\\DataObject\\ClassDefinition\\ClassLayoutDefinitionManager' => 'getClassLayoutDefinitionManagerService.php',
            'Pimcore\\Model\\DataObject\\QuantityValue\\QuantityValueConverterInterface' => 'getQuantityValueConverterInterfaceService.php',
            'Pimcore\\Model\\DataObject\\QuantityValue\\UnitConversionService' => 'getUnitConversionServiceService.php',
            'Pimcore\\Model\\Document\\Editable\\Loader\\EditableLoader' => 'getEditableLoaderService.php',
            'Pimcore\\Model\\Notification\\Service\\NotificationService' => 'getNotificationServiceService.php',
            'Pimcore\\Templating\\Renderer\\EditableRenderer' => 'getEditableRendererService.php',
            'Pimcore\\Tool\\AssetsInstaller' => 'getAssetsInstallerService.php',
            'Pimcore\\Tool\\RestClient' => 'getRestClientService.php',
            'Pimcore\\Workflow\\Dumper\\GraphvizDumper' => 'getGraphvizDumperService.php',
            'Pimcore\\Workflow\\Dumper\\StateMachineGraphvizDumper' => 'getStateMachineGraphvizDumperService.php',
            'Pimcore\\Workflow\\ExpressionService' => 'getExpressionServiceService.php',
            'Pimcore\\Workflow\\Manager' => 'getManagerService.php',
            'Pimcore\\Workflow\\Notification\\NotificationEmailService' => 'getNotificationEmailServiceService.php',
            'Pimcore\\Workflow\\Place\\StatusInfo' => 'getStatusInfoService.php',
            'Scheb\\TwoFactorBundle\\Model\\PersisterInterface' => 'getPersisterInterfaceService.php',
            'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\TwoFactorFormRendererInterface' => 'getTwoFactorFormRendererInterfaceService.php',
            'Symfony\\Bridge\\Twig\\Extension\\WebLinkExtension' => 'getWebLinkExtensionService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => 'getRedirectControllerService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => 'getTemplateControllerService.php',
            'cache.app' => 'getCache_AppService.php',
            'cache.app_clearer' => 'getCache_AppClearerService.php',
            'cache.global_clearer' => 'getCache_GlobalClearerService.php',
            'cache.system' => 'getCache_SystemService.php',
            'cache.system_clearer' => 'getCache_SystemClearerService.php',
            'cache_clearer' => 'getCacheClearer2Service.php',
            'cache_warmer' => 'getCacheWarmerService.php',
            'cmf_routing.redirect_controller' => 'getCmfRouting_RedirectControllerService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Bundle\\ListCommand' => 'getListCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\CacheWarmingCommand' => 'getCacheWarmingCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\ClassCommand' => 'getClassCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\CustomLayoutCommand' => 'getCustomLayoutCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\FieldCollectionCommand' => 'getFieldCollectionCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\ObjectBrickCommand' => 'getObjectBrickCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\DeleteClassificationStoreCommand' => 'getDeleteClassificationStoreCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\DeleteUnusedLocaleDataCommand' => 'getDeleteUnusedLocaleDataCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Document\\GeneratePagePreviews' => 'getGeneratePagePreviewsService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Document\\MigrateTagNamingStrategyCommand' => 'getMigrateTagNamingStrategyCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\EmailLogsCleanupCommand' => 'getEmailLogsCleanupCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\InternalModelDaoMappingGeneratorCommand' => 'getInternalModelDaoMappingGeneratorCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\InternalUnicodeCldrLanguageTerritoryGeneratorCommand' => 'getInternalUnicodeCldrLanguageTerritoryGeneratorCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\InternalVideoConverterCommand' => 'getInternalVideoConverterCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\LowQualityImagePreviewCommand' => 'getLowQualityImagePreviewCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\MaintenanceModeCommand' => 'getMaintenanceModeCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\MysqlToolsCommand' => 'getMysqlToolsCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\RequirementsCheckCommand' => 'getRequirementsCheckCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ResetPasswordCommand' => 'getResetPasswordCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\RunScriptCommand' => 'getRunScriptCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\SearchBackendReindexCommand' => 'getSearchBackendReindexCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ThumbnailsClearCommand' => 'getThumbnailsClearCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ThumbnailsImageCommand' => 'getThumbnailsImageCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ThumbnailsVideoCommand' => 'getThumbnailsVideoCommandService.php',
            'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Web2PrintPdfCreationCommand' => 'getWeb2PrintPdfCreationCommandService.php',
            'console.command.public_alias.Pimcore\\Migrations\\Command\\ExecuteCommand' => 'getExecuteCommandService.php',
            'console.command.public_alias.Pimcore\\Migrations\\Command\\GenerateCommand' => 'getGenerateCommandService.php',
            'console.command.public_alias.Pimcore\\Migrations\\Command\\LatestCommand' => 'getLatestCommandService.php',
            'console.command.public_alias.Pimcore\\Migrations\\Command\\MarkAllDoneCommand' => 'getMarkAllDoneCommandService.php',
            'console.command.public_alias.Pimcore\\Migrations\\Command\\MigrateCommand' => 'getMigrateCommandService.php',
            'console.command.public_alias.Pimcore\\Migrations\\Command\\StatusCommand' => 'getStatusCommandService.php',
            'console.command.public_alias.Pimcore\\Migrations\\Command\\VersionCommand' => 'getVersionCommandService.php',
            'console.command.public_alias.doctrine_cache.contains_command' => 'getConsole_Command_PublicAlias_DoctrineCache_ContainsCommandService.php',
            'console.command.public_alias.doctrine_cache.delete_command' => 'getConsole_Command_PublicAlias_DoctrineCache_DeleteCommandService.php',
            'console.command.public_alias.doctrine_cache.flush_command' => 'getConsole_Command_PublicAlias_DoctrineCache_FlushCommandService.php',
            'console.command.public_alias.doctrine_cache.stats_command' => 'getConsole_Command_PublicAlias_DoctrineCache_StatsCommandService.php',
            'console.command_loader' => 'getConsole_CommandLoaderService.php',
            'container.env_var_processors_locator' => 'getContainer_EnvVarProcessorsLocatorService.php',
            'error_controller' => 'getErrorControllerService.php',
            'filesystem' => 'getFilesystemService.php',
            'form.type.file' => 'getForm_Type_FileService.php',
            'fos_js_routing.controller' => 'getFosJsRouting_ControllerService.php',
            'fos_js_routing.extractor' => 'getFosJsRouting_ExtractorService.php',
            'fos_js_routing.serializer' => 'getFosJsRouting_SerializerService.php',
            'monolog.logger.console' => 'getMonolog_Logger_ConsoleService.php',
            'monolog.logger.doctrine' => 'getMonolog_Logger_DoctrineService.php',
            'monolog.logger.pimcore' => 'getMonolog_Logger_PimcoreService.php',
            'monolog.logger.pimcore_admin.session' => 'getMonolog_Logger_PimcoreAdmin_SessionService.php',
            'monolog.logger.pimcore_api' => 'getMonolog_Logger_PimcoreApiService.php',
            'monolog.logger.session' => 'getMonolog_Logger_SessionService.php',
            'monolog.logger.translation' => 'getMonolog_Logger_TranslationService.php',
            'pimcore.analytics.google.fallback_service_locator' => 'getPimcore_Analytics_Google_FallbackServiceLocatorService.php',
            'pimcore.bundle_locator' => 'getPimcore_BundleLocatorService.php',
            'pimcore.custom_report.adapter.factories' => 'getPimcore_CustomReport_Adapter_FactoriesService.php',
            'pimcore.document.tag.naming.strategy' => 'getPimcore_Document_Tag_Naming_StrategyService.php',
            'pimcore.implementation_loader.asset.metadata.data' => 'getPimcore_ImplementationLoader_Asset_Metadata_DataService.php',
            'pimcore.implementation_loader.object.data' => 'getPimcore_ImplementationLoader_Object_DataService.php',
            'pimcore.implementation_loader.object.layout' => 'getPimcore_ImplementationLoader_Object_LayoutService.php',
            'pimcore.locale.intl_formatter' => 'getPimcore_Locale_IntlFormatterService.php',
            'pimcore.model.factory' => 'getPimcore_Model_FactoryService.php',
            'pimcore.newsletter.address_source_adapter.factories' => 'getPimcore_Newsletter_AddressSourceAdapter_FactoriesService.php',
            'pimcore.templating.action_renderer' => 'getPimcore_Templating_ActionRendererService.php',
            'pimcore.templating.engine.php' => 'getPimcore_Templating_Engine_PhpService.php',
            'pimcore.templating.engine.twig' => 'getPimcore_Templating_Engine_TwigService.php',
            'pimcore.templating.include_renderer' => 'getPimcore_Templating_IncludeRendererService.php',
            'pimcore.templating.view_helper.action' => 'getPimcore_Templating_ViewHelper_ActionService.php',
            'pimcore.templating.view_helper.cache' => 'getPimcore_Templating_ViewHelper_CacheService.php',
            'pimcore.templating.view_helper.device' => 'getPimcore_Templating_ViewHelper_DeviceService.php',
            'pimcore.templating.view_helper.get_all_params' => 'getPimcore_Templating_ViewHelper_GetAllParamsService.php',
            'pimcore.templating.view_helper.get_param' => 'getPimcore_Templating_ViewHelper_GetParamService.php',
            'pimcore.templating.view_helper.glossary' => 'getPimcore_Templating_ViewHelper_GlossaryService.php',
            'pimcore.templating.view_helper.head_link' => 'getPimcore_Templating_ViewHelper_HeadLinkService.php',
            'pimcore.templating.view_helper.head_meta' => 'getPimcore_Templating_ViewHelper_HeadMetaService.php',
            'pimcore.templating.view_helper.head_script' => 'getPimcore_Templating_ViewHelper_HeadScriptService.php',
            'pimcore.templating.view_helper.head_style' => 'getPimcore_Templating_ViewHelper_HeadStyleService.php',
            'pimcore.templating.view_helper.head_title' => 'getPimcore_Templating_ViewHelper_HeadTitleService.php',
            'pimcore.templating.view_helper.inc' => 'getPimcore_Templating_ViewHelper_IncService.php',
            'pimcore.templating.view_helper.inline_script' => 'getPimcore_Templating_ViewHelper_InlineScriptService.php',
            'pimcore.templating.view_helper.navigation' => 'getPimcore_Templating_ViewHelper_NavigationService.php',
            'pimcore.templating.view_helper.pimcore_url' => 'getPimcore_Templating_ViewHelper_PimcoreUrlService.php',
            'pimcore.templating.view_helper.placeholder' => 'getPimcore_Templating_ViewHelper_PlaceholderService.php',
            'pimcore.templating.view_helper.placeholder.container_service' => 'getPimcore_Templating_ViewHelper_Placeholder_ContainerServiceService.php',
            'pimcore.twig.extension.document_tag' => 'getPimcore_Twig_Extension_DocumentTagService.php',
            'pimcore.twig.extension.glossary' => 'getPimcore_Twig_Extension_GlossaryService.php',
            'pimcore.twig.extension.helpers' => 'getPimcore_Twig_Extension_HelpersService.php',
            'pimcore.twig.extension.navigation' => 'getPimcore_Twig_Extension_NavigationService.php',
            'pimcore.twig.extension.pimcore_object' => 'getPimcore_Twig_Extension_PimcoreObjectService.php',
            'pimcore.twig.extension.subrequest' => 'getPimcore_Twig_Extension_SubrequestService.php',
            'pimcore.twig.extension.templating_helper' => 'getPimcore_Twig_Extension_TemplatingHelperService.php',
            'pimcore.web_path_resolver' => 'getPimcore_WebPathResolverService.php',
            'pimcore.workflow.place-options-provider' => 'getPimcore_Workflow_PlaceoptionsproviderService.php',
            'pimcore_admin.security.admin_authenticator' => 'getPimcoreAdmin_Security_AdminAuthenticatorService.php',
            'pimcore_admin.security.logout_success_handler' => 'getPimcoreAdmin_Security_LogoutSuccessHandlerService.php',
            'pimcore_admin.security.user_checker' => 'getPimcoreAdmin_Security_UserCheckerService.php',
            'pimcore_admin.security.user_provider' => 'getPimcoreAdmin_Security_UserProviderService.php',
            'pimcore_admin.security.webservice_authenticator' => 'getPimcoreAdmin_Security_WebserviceAuthenticatorService.php',
            'pimcore_admin.serializer' => 'getPimcoreAdmin_SerializerService.php',
            'pimcore_admin.webservice.service' => 'getPimcoreAdmin_Webservice_ServiceService.php',
            'presta_sitemap.controller' => 'getPrestaSitemap_ControllerService.php',
            'presta_sitemap.dump_command' => 'getPrestaSitemap_DumpCommandService.php',
            'presta_sitemap.dumper' => 'getPrestaSitemap_DumperService.php',
            'presta_sitemap.generator' => 'getPrestaSitemap_GeneratorService.php',
            'routing.loader' => 'getRouting_LoaderService.php',
            'scheb_two_factor.firewall_context' => 'getSchebTwoFactor_FirewallContextService.php',
            'scheb_two_factor.form_controller' => 'getSchebTwoFactor_FormControllerService.php',
            'scheb_two_factor.security.google_authenticator' => 'getSchebTwoFactor_Security_GoogleAuthenticatorService.php',
            'security.authentication_utils' => 'getSecurity_AuthenticationUtilsService.php',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService.php',
            'security.password_encoder' => 'getSecurity_PasswordEncoderService.php',
            'serializer' => 'getSerializerService.php',
            'services_resetter' => 'getServicesResetterService.php',
            'session' => 'getSessionService.php',
            'swiftmailer.mailer.pimcore_mailer' => 'getSwiftmailer_Mailer_PimcoreMailerService.php',
            'swiftmailer.mailer.pimcore_mailer.transport' => 'getSwiftmailer_Mailer_PimcoreMailer_TransportService.php',
            'templating' => 'getTemplatingService.php',
            'templating.loader' => 'getTemplating_LoaderService.php',
            'twig' => 'getTwigService.php',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService.php',
            'twig.controller.preview_error' => 'getTwig_Controller_PreviewErrorService.php',
            'validator' => 'getValidatorService.php',
        ];
        $this->aliases = [
            'Doctrine\\Common\\Persistence\\ConnectionRegistry' => 'doctrine',
            'Doctrine\\Persistence\\ConnectionRegistry' => 'doctrine',
            'GuzzleHttp\\ClientInterface' => 'GuzzleHttp\\Client',
            'Pimcore\\Db\\Connection' => 'doctrine.dbal.default_connection',
            'Pimcore\\Db\\ConnectionInterface' => 'doctrine.dbal.default_connection',
            'Pimcore\\Document\\Editable\\EditableHandlerInterface' => 'Pimcore\\Document\\Editable\\DelegatingEditableHandler',
            'Pimcore\\Kernel' => 'kernel',
            'Pimcore\\Localization\\Locale' => 'Pimcore\\Localization\\LocaleServiceInterface',
            'Pimcore\\Localization\\LocaleService' => 'Pimcore\\Localization\\LocaleServiceInterface',
            'Presta\\SitemapBundle\\Controller\\SitemapController' => 'presta_sitemap.controller',
            'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\Google\\GoogleAuthenticator' => 'scheb_two_factor.security.google_authenticator',
            'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\Google\\GoogleAuthenticatorInterface' => 'scheb_two_factor.security.google_authenticator',
            'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\TwoFactorFirewallContext' => 'scheb_two_factor.firewall_context',
            'Symfony\\Component\\Lock\\Factory' => 'Symfony\\Component\\Lock\\LockFactory',
            'database_connection' => 'doctrine.dbal.default_connection',
            'mailer' => 'swiftmailer.mailer.pimcore_mailer',
            'pimcore.app_logger' => 'Pimcore\\Log\\ApplicationLogger',
            'pimcore.app_logger.db_writer' => 'Pimcore\\Log\\Handler\\ApplicationLoggerDb',
            'pimcore.app_logger.default' => 'Pimcore\\Log\\ApplicationLogger',
            'pimcore.cache.runtime' => 'Pimcore\\Cache\\Runtime',
            'pimcore.controller.config.controller_data_provider' => 'Pimcore\\Controller\\Config\\ControllerDataProvider',
            'pimcore.document.renderer' => 'Pimcore\\Document\\Renderer\\DocumentRenderer',
            'pimcore.document_service' => 'Pimcore\\Model\\Document\\Service',
            'pimcore.event_listener.frontend.cookie_policy_notice' => 'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\CookiePolicyNoticeListener',
            'pimcore.event_listener.frontend.full_page_cache' => 'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FullPageCacheListener',
            'pimcore.event_listener.frontend.google_analytics_code' => 'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleAnalyticsCodeListener',
            'pimcore.event_listener.frontend.google_tag_manager' => 'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleTagManagerListener',
            'pimcore.event_listener.frontend.tag_manager' => 'Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\TagManagerListener',
            'pimcore.event_listener.workflow_management' => 'Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener',
            'pimcore.extension.bundle_manager' => 'Pimcore\\Extension\\Bundle\\PimcoreBundleManager',
            'pimcore.extension.config' => 'Pimcore\\Extension\\Config',
            'pimcore.http.request_helper' => 'Pimcore\\Http\\RequestHelper',
            'pimcore.http.response_helper' => 'Pimcore\\Http\\ResponseHelper',
            'pimcore.http_client' => 'GuzzleHttp\\Client',
            'pimcore.locale' => 'Pimcore\\Localization\\LocaleServiceInterface',
            'pimcore.service.request.document_resolver' => 'Pimcore\\Http\\Request\\Resolver\\DocumentResolver',
            'pimcore.service.request.editmode_resolver' => 'Pimcore\\Http\\Request\\Resolver\\EditmodeResolver',
            'pimcore.service.request.output_timestamp_resolver' => 'Pimcore\\Http\\Request\\Resolver\\OutputTimestampResolver',
            'pimcore.service.request.pimcore_context_resolver' => 'Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver',
            'pimcore.service.request.response_header_resolver' => 'Pimcore\\Http\\Request\\Resolver\\ResponseHeaderResolver',
            'pimcore.service.request.site_resolver' => 'Pimcore\\Http\\Request\\Resolver\\SiteResolver',
            'pimcore.service.request.template_resolver' => 'Pimcore\\Http\\Request\\Resolver\\TemplateResolver',
            'pimcore.service.request.template_vars_resolver' => 'Pimcore\\Http\\Request\\Resolver\\TemplateVarsResolver',
            'pimcore.service.request.view_model_resolver' => 'Pimcore\\Http\\Request\\Resolver\\ViewModelResolver',
            'pimcore.templating.engine.delegating' => 'templating',
            'pimcore.templating.tag_renderer' => 'Pimcore\\Templating\\Renderer\\EditableRenderer',
            'pimcore.tool.assets_installer' => 'Pimcore\\Tool\\AssetsInstaller',
            'pimcore.translator' => 'Symfony\\Contracts\\Translation\\TranslatorInterface',
            'pimcore_admin.security.token_storage_user_resolver' => 'Pimcore\\Bundle\\AdminBundle\\Security\\User\\TokenStorageUserResolver',
            'swiftmailer.transport' => 'swiftmailer.mailer.pimcore_mailer.transport',
            'translator' => 'Symfony\\Contracts\\Translation\\TranslatorInterface',
        ];

        $this->privates['service_container'] = function () {
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Controller/ControllerNameParser.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Controller/ControllerResolverInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Controller/ControllerResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Controller/ContainerControllerResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Controller/ControllerResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/ControllerMetadata/ArgumentMetadataFactoryInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/ControllerMetadata/ArgumentMetadataFactory.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/EventDispatcher/EventSubscriberInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/ResponseListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/StreamedResponseListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/LocaleListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/ValidateRequestListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/EventListener/ResolveControllerNameSubscriber.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/EventDispatcher/EventDispatcherInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/EventDispatcher/EventDispatcherInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/EventDispatcher/EventDispatcher.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernelInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/TerminableInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Controller/ArgumentResolverInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Controller/ArgumentResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/RequestStack.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/ConfigCacheFactoryInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/ResourceCheckerConfigCacheFactory.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/LocaleAwareListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/FormRegistryInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/FormRegistry.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/FormExtensionInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Extension/DependencyInjection/DependencyInjectionExtension.php';
            include_once \dirname(__DIR__, 4).'/vendor/psr/container/src/ContainerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Service/ServiceProviderInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Service/ServiceLocatorTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ServiceLocator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/ResolvedFormTypeFactoryInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/ResolvedFormTypeFactory.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/FormFactoryInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/FormFactory.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/Packages.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/PackageInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/Package.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/PathPackage.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/VersionStrategy/VersionStrategyInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/VersionStrategy/EmptyVersionStrategy.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/Context/ContextInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Asset/Context/RequestStackContext.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Translation/LocaleAwareInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/TranslatorInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Translation/TranslatorInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/TranslatorBagInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/Translator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/CacheWarmer/WarmableInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Translation/Translator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/Formatter/MessageFormatterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/Formatter/IntlFormatterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/Formatter/ChoiceMessageFormatterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/Formatter/MessageFormatter.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Translation/TranslatorTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Translation/IdentityTranslator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/DebugHandlersListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Debug/FileLinkFormatter.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/RouterListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Reader.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/AnnotationReader.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/AnnotationRegistry.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/WebLink/EventListener/AddLinkHeaderListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/AuthorizationCheckerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/AuthorizationChecker.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/Token/Storage/TokenStorageInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Service/ServiceSubscriberInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/Token/Storage/UsageTrackingTokenStorage.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Service/ResetInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/Token/Storage/TokenStorage.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/AuthenticationManagerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/AuthenticationProviderManager.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/AccessDecisionManagerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/AccessDecisionManager.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Role/RoleHierarchyInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Role/RoleHierarchy.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Firewall.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/EventListener/FirewallListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/FirewallMapInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Security/FirewallMap.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Logout/LogoutUrlGenerator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/RememberMe/ResponseListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/psr/log/Psr/Log/LoggerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/ResettableInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/Logger.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Log/DebugLoggerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Monolog/Logger.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/Processor/ProcessorInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/Processor/PsrLogMessageProcessor.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/Handler/HandlerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/Handler/AbstractHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/Handler/AbstractProcessingHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/monolog/monolog/src/Monolog/Handler/StreamHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Monolog/Handler/ConsoleHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ConnectionRegistry.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ManagerRegistry.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/AbstractManagerRegistry.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Doctrine/ManagerRegistry.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Doctrine/RegistryInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Registry.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Connection.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Connection.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Db/ConnectionInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Db/PimcoreExtensionsTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Db/Connection.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/ConnectionFactory.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Configuration.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Dbal/SchemaAssetsFilterManager.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Dbal/BlacklistSchemaAssetFilter.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/event-manager/lib/Doctrine/Common/EventManager.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Doctrine/ContainerAwareEventManager.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/event-manager/lib/Doctrine/Common/EventSubscriber.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing-bundle/src/Doctrine/RouteConditionMetadataListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/EventListener/ControllerListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/EventListener/ParamConverterListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/Request/ParamConverter/ParamConverterManager.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/Request/ParamConverter/ParamConverterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/Request/ParamConverter/DoctrineParamConverter.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/ExpressionLanguage/ExpressionLanguage.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/Request/ParamConverter/DateTimeParamConverter.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Request/ParamConverter/DataObjectParamConverter.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/Templating/TemplateGuesser.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Templating/LegacyTemplateGuesser.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/EventListener/TemplateListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/LegacyTemplateListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/EventListener/HttpCacheListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/EventListener/SecurityListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/ExpressionLanguage.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/Security/ExpressionLanguage.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/EventListener/IsGrantedListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/Request/ArgumentNameConverter.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/AuthenticationTrustResolverInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/Authentication/AuthenticationTrustResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/AuthenticationTrustResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Config.php';
            include_once \dirname(__DIR__, 4).'/vendor/psr/log/Psr/Log/LoggerAwareInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/psr/log/Psr/Log/LoggerAwareTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Lock/Factory.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Lock/PersistingStoreInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Lock/BlockingStoreInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Lock/StoreInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Lock/Store/RetryTillSaveStore.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Lock/Store/ExpiringStoreTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Lock/Store/PdoStore.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Dynamic/DynamicRouteHandlerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Dynamic/DocumentRouteHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/RedirectHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Bundle/PimcoreBundleManager.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Bundle/Config/StateConfig.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Bundle/PimcoreBundleLocator.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Composer/PackageInfo.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/RequestHelper.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/ResponseHelper.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/ResponseStack.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Response/CodeInjector.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/AbstractRequestResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/PimcoreContextResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/OutputTimestampResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/SiteResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Templating/Vars/TemplateVarsProviderInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/EditmodeResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/DocumentResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/TemplateVarsResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/ViewModelResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Request/Resolver/ResponseHeaderResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Editable/Block/BlockStateStack.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Model/ModelInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/models/DataObject/Traits/ObjectVarTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Model/AbstractModel.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/models/Element/Service.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/models/Document/Service.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/DocumentStack.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Traits/PimcoreContextAwareTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/FrontendRoutingListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/PimcoreContextListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/DocumentFallbackListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/PimcoreHeaderListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/LocaleListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/TranslationDebugListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/ElementListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/HardlinkCanonicalListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/BlockStateListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/DocumentMetaDataListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/DocumentStackListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/EventedControllerListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/TemplateControllerListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/ResponseHeaderListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/EditmodeListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/ResponseStackListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Traits/ResponseInjectionTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/InternalWysiwygHtmlAttributeFilterListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Traits/EnabledTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Traits/PreviewRequestTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/GoogleAnalyticsCodeListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/CookiePolicyNoticeListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/GoogleTagManagerListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/FullPageCacheListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/FullPage/SessionStatus.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/MaintenancePageListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/GoogleSearchConsoleVerificationListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/Frontend/OutputTimestampListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/SiteId/SiteIdProvider.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/Google/Config/ConfigProvider.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/TrackerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/AbstractTracker.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/Google/Tracker.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/Piwik/Config/ConfigProvider.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/Piwik/EventListener/TrackingCodeListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/Piwik/Tracker.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Core/CoreHandlerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Core/CoreHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Core/EventDispatchingCoreHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Core/WriteLockInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Core/WriteLock.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Storage/TargetingStorageInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Storage/Traits/TimestampsTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Storage/CookieStorage.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Storage/Cookie/CookieSaveHandlerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Storage/Cookie/AbstractCookieSaveHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Storage/Cookie/JWTCookieSaveHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/VisitorInfoStorageInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/VisitorInfoStorage.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/DataLoaderInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Debug/Traits/StopwatchTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/DataLoader.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/ConditionMatcherInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/ConditionMatcher.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/ConditionFactoryInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/ConditionFactory.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/ActionHandler/ActionHandlerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/ActionHandler/DelegatingActionHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Document/DocumentTargetingConfigurator.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/EventListener/TargetingListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/VisitorInfoResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Code/TargetingCodeGenerator.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/EventListener/ToolbarListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Debug/TargetingDataCollector.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Security/User/TokenStorageUserResolver.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/BruteforceProtectionListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/Traits/ControllerTypeTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/AdminAuthenticationDoubleCheckListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/CsrfProtectionListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/HttpCacheListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/CustomAdminEntryPointCheckListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/UserPerspectiveListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/UsageStatisticsListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/EnablePreviewTimeSliderListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Translation/Translator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/RequestContextAwareInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Matcher/UrlMatcherInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Generator/UrlGeneratorInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/RouterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Matcher/RequestMatcherInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/ChainRouterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/ChainRouter.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Router.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ServiceSubscriberInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/CompatibilityServiceSubscriberInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Routing/Router.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ParameterBag/ParameterBagInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ParameterBag/ParameterBag.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ParameterBag/FrozenParameterBag.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ParameterBag/ContainerBagInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ParameterBag/ContainerBag.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/VersatileGeneratorInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/ChainedRouterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/Enhancer/RouteEnhancerTrait.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/DynamicRouter.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing-bundle/src/Routing/DynamicRouter.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/NestedMatcher/NestedMatcher.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Matcher/UrlMatcher.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/NestedMatcher/FinalMatcherInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/NestedMatcher/UrlMatcher.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/RouteCollection.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/RequestContext.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Generator/ConfigurableRequirementsInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Generator/UrlGenerator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/ProviderBasedGenerator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/ContentAwareGenerator.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/Enhancer/RouteEnhancerInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/Enhancer/RouteContentEnhancer.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Element/Router.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Staticroute/Router.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing/src/RouteProviderInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/DynamicRouteProvider.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Dynamic/DataObjectRouteHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Controller/Config/ConfigNormalizer.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/Context/PimcoreContextGuesser.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Http/RequestMatcherFactory.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/AbstractSessionListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/EventListener/SessionListener.php';
            include_once \dirname(__DIR__, 4).'/vendor/psr/cache/src/CacheItemPoolInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Adapter/AdapterInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/cache/tag-interop/TaggableCacheItemPoolInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Pool/PimcoreCacheItemPoolInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Pool/AbstractCacheItemPool.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Pool/PurgeableCacheItemPoolInterface.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Pool/Doctrine.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Security/User/UserLoader.php';
            include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Security/BruteforceProtectionHandler.php';
            include_once \dirname(__DIR__, 4).'/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/CachedReader.php';
        };
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.'removed-ids.php';
    }

    protected function load($file, $lazyLoad = true)
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.$file;
    }

    protected function createProxy($class, \Closure $factory)
    {
        class_exists($class, false) || $this->load("{$class}.php");

        return $factory();
    }

    /*
     * Gets the public 'Pimcore\Bundle\AdminBundle\EventListener\CsrfProtectionListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\CsrfProtectionListener
     */
    protected function getCsrfProtectionListenerService()
    {
        $this->services['Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\CsrfProtectionListener([], ($this->services['pimcore.templating.engine.php'] ?? $this->load('getPimcore_Templating_Engine_PhpService.php')));

        $instance->setLogger(($this->services['monolog.logger.admin'] ?? $this->getMonolog_Logger_AdminService()));
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the public 'Pimcore\Bundle\AdminBundle\Security\User\TokenStorageUserResolver' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\Security\User\TokenStorageUserResolver
     */
    protected function getTokenStorageUserResolverService()
    {
        return $this->services['Pimcore\\Bundle\\AdminBundle\\Security\\User\\TokenStorageUserResolver'] = new \Pimcore\Bundle\AdminBundle\Security\User\TokenStorageUserResolver(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));
    }

    /*
     * Gets the public 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\CookiePolicyNoticeListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\CookiePolicyNoticeListener
     */
    protected function getCookiePolicyNoticeListenerService()
    {
        $this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\CookiePolicyNoticeListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\CookiePolicyNoticeListener(($this->services['kernel'] ?? $this->get('kernel', 1)), ($this->services['Pimcore\\Config'] ?? ($this->services['Pimcore\\Config'] = new \Pimcore\Config())));

        $instance->loadTemplateFromResource('@PimcoreCoreBundle/Resources/misc/cookie-policy-default-template.html');
        $instance->setTranslator(($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService()));
        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the public 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\FullPageCacheListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\FullPageCacheListener
     */
    protected function getFullPageCacheListenerService()
    {
        $a = ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService());

        $this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FullPageCacheListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\FullPageCacheListener(($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] ?? ($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] = new \Pimcore\Targeting\VisitorInfoStorage())), new \Pimcore\Cache\FullPage\SessionStatus('_sf2_meta', $a), $a, ($this->services['Pimcore\\Config'] ?? ($this->services['Pimcore\\Config'] = new \Pimcore\Config())));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the public 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleAnalyticsCodeListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleAnalyticsCodeListener
     */
    protected function getGoogleAnalyticsCodeListenerService()
    {
        $this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleAnalyticsCodeListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleAnalyticsCodeListener(($this->privates['Pimcore\\Analytics\\Google\\Tracker'] ?? $this->getTrackerService()));

        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the public 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleTagManagerListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleTagManagerListener
     */
    protected function getGoogleTagManagerListenerService()
    {
        $this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleTagManagerListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleTagManagerListener(($this->privates['Pimcore\\Analytics\\SiteId\\SiteIdProvider'] ?? $this->getSiteIdProviderService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->services['templating'] ?? $this->load('getTemplatingService.php')));

        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the public 'Pimcore\Config' shared autowired service.
     *
     * @return \Pimcore\Config
     */
    protected function getConfigService()
    {
        return $this->services['Pimcore\\Config'] = new \Pimcore\Config();
    }

    /*
     * Gets the public 'Pimcore\Document\DocumentStack' shared autowired service.
     *
     * @return \Pimcore\Document\DocumentStack
     */
    protected function getDocumentStackService()
    {
        return $this->services['Pimcore\\Document\\DocumentStack'] = new \Pimcore\Document\DocumentStack();
    }

    /*
     * Gets the public 'Pimcore\Document\Editable\Block\BlockStateStack' shared autowired service.
     *
     * @return \Pimcore\Document\Editable\Block\BlockStateStack
     */
    protected function getBlockStateStackService()
    {
        return $this->services['Pimcore\\Document\\Editable\\Block\\BlockStateStack'] = new \Pimcore\Document\Editable\Block\BlockStateStack();
    }

    /*
     * Gets the public 'Pimcore\Extension\Bundle\PimcoreBundleManager' shared autowired service.
     *
     * @return \Pimcore\Extension\Bundle\PimcoreBundleManager
     */
    protected function getPimcoreBundleManagerService()
    {
        return $this->services['Pimcore\\Extension\\Bundle\\PimcoreBundleManager'] = new \Pimcore\Extension\Bundle\PimcoreBundleManager(new \Pimcore\Extension\Bundle\Config\StateConfig(($this->services['Pimcore\\Extension\\Config'] ?? $this->get('Pimcore\\Extension\\Config', 1))), new \Pimcore\Extension\Bundle\PimcoreBundleLocator(new \Pimcore\Composer\PackageInfo(), $this->parameters['pimcore.extensions.bundles.search_paths']), ($this->services['kernel'] ?? $this->get('kernel', 1)), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->services['router'] ?? $this->getRouterService()));
    }

    /*
     * Gets the public 'Pimcore\Http\RequestHelper' shared autowired service.
     *
     * @return \Pimcore\Http\RequestHelper
     */
    protected function getRequestHelperService()
    {
        return $this->services['Pimcore\\Http\\RequestHelper'] = new \Pimcore\Http\RequestHelper(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['pimcore.routing.router.request_context'] ?? $this->getPimcore_Routing_Router_RequestContextService()));
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\DocumentResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\DocumentResolver
     */
    protected function getDocumentResolverService()
    {
        $a = ($this->services['Pimcore\\Http\\Request\\Resolver\\ViewModelResolver'] ?? $this->getViewModelResolverService());

        if (isset($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'])) {
            return $this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'];
        }

        return $this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] = new \Pimcore\Http\Request\Resolver\DocumentResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), $a);
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\EditmodeResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\EditmodeResolver
     */
    protected function getEditmodeResolverService()
    {
        $this->services['Pimcore\\Http\\Request\\Resolver\\EditmodeResolver'] = $instance = new \Pimcore\Http\Request\Resolver\EditmodeResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['pimcore_admin.security.user_loader'] ?? $this->getPimcoreAdmin_Security_UserLoaderService()), ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()));

        $a = ($this->services['monolog.logger.init'] ?? $this->getMonolog_Logger_InitService());

        $instance->setLogger($a);
        $instance->setLogger($a);

        return $instance;
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\OutputTimestampResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\OutputTimestampResolver
     */
    protected function getOutputTimestampResolverService()
    {
        return $this->services['Pimcore\\Http\\Request\\Resolver\\OutputTimestampResolver'] = new \Pimcore\Http\Request\Resolver\OutputTimestampResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\PimcoreContextResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\PimcoreContextResolver
     */
    protected function getPimcoreContextResolverService()
    {
        return $this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] = new \Pimcore\Http\Request\Resolver\PimcoreContextResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['pimcore.service.context.pimcore_context_guesser'] ?? $this->getPimcore_Service_Context_PimcoreContextGuesserService()));
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\ResponseHeaderResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\ResponseHeaderResolver
     */
    protected function getResponseHeaderResolverService()
    {
        return $this->services['Pimcore\\Http\\Request\\Resolver\\ResponseHeaderResolver'] = new \Pimcore\Http\Request\Resolver\ResponseHeaderResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\SiteResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\SiteResolver
     */
    protected function getSiteResolverService()
    {
        return $this->services['Pimcore\\Http\\Request\\Resolver\\SiteResolver'] = new \Pimcore\Http\Request\Resolver\SiteResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\TemplateVarsResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\TemplateVarsResolver
     */
    protected function getTemplateVarsResolverService()
    {
        $this->services['Pimcore\\Http\\Request\\Resolver\\TemplateVarsResolver'] = $instance = new \Pimcore\Http\Request\Resolver\TemplateVarsResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));

        $instance->addProvider(($this->services['Pimcore\\Http\\Request\\Resolver\\EditmodeResolver'] ?? $this->getEditmodeResolverService()));
        $instance->addProvider(($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()));

        return $instance;
    }

    /*
     * Gets the public 'Pimcore\Http\Request\Resolver\ViewModelResolver' shared autowired service.
     *
     * @return \Pimcore\Http\Request\Resolver\ViewModelResolver
     */
    protected function getViewModelResolverService()
    {
        $a = ($this->services['Pimcore\\Http\\Request\\Resolver\\TemplateVarsResolver'] ?? $this->getTemplateVarsResolverService());

        if (isset($this->services['Pimcore\\Http\\Request\\Resolver\\ViewModelResolver'])) {
            return $this->services['Pimcore\\Http\\Request\\Resolver\\ViewModelResolver'];
        }

        return $this->services['Pimcore\\Http\\Request\\Resolver\\ViewModelResolver'] = new \Pimcore\Http\Request\Resolver\ViewModelResolver(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), $a);
    }

    /*
     * Gets the public 'Pimcore\Http\ResponseHelper' shared autowired service.
     *
     * @return \Pimcore\Http\ResponseHelper
     */
    protected function getResponseHelperService()
    {
        return $this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper();
    }

    /*
     * Gets the public 'Pimcore\Model\Document\Service' shared autowired service.
     *
     * @return \Pimcore\Model\Document\Service
     */
    protected function getServiceService()
    {
        return $this->services['Pimcore\\Model\\Document\\Service'] = new \Pimcore\Model\Document\Service();
    }

    /*
     * Gets the public 'Pimcore\Targeting\Document\DocumentTargetingConfigurator' shared autowired service.
     *
     * @return \Pimcore\Targeting\Document\DocumentTargetingConfigurator
     */
    protected function getDocumentTargetingConfiguratorService()
    {
        return $this->services['Pimcore\\Targeting\\Document\\DocumentTargetingConfigurator'] = new \Pimcore\Targeting\Document\DocumentTargetingConfigurator(($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] ?? ($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] = new \Pimcore\Targeting\VisitorInfoStorage())), ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->services['pimcore_admin.security.user_loader'] ?? $this->getPimcoreAdmin_Security_UserLoaderService()), ($this->services['pimcore.cache.core.handler'] ?? $this->getPimcore_Cache_Core_HandlerService()));
    }

    /*
     * Gets the public 'Symfony\Component\HttpKernel\EventListener\SessionListener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->services['Symfony\\Component\\HttpKernel\\EventListener\\SessionListener'] = new \Symfony\Component\HttpKernel\EventListener\SessionListener(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'initialized_session' => ['services', 'session', NULL, true],
            'session' => ['services', 'session', 'getSessionService.php', true],
        ], [
            'initialized_session' => '?',
            'session' => '?',
        ]));
    }

    /*
     * Gets the public 'Symfony\Component\Lock\LockFactory' shared autowired service.
     *
     * @return \Symfony\Component\Lock\Factory
     */
    protected function getLockFactoryService()
    {
        $a = new \Symfony\Component\Lock\Store\RetryTillSaveStore(new \Symfony\Component\Lock\Store\PdoStore(($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService())), 1000);

        $b = ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService());

        $a->setLogger($b);

        $this->services['Symfony\\Component\\Lock\\LockFactory'] = $instance = new \Symfony\Component\Lock\Factory($a);

        $instance->setLogger($b);

        return $instance;
    }

    /*
     * Gets the public 'Symfony\Contracts\Translation\TranslatorInterface' shared autowired service.
     *
     * @return \Pimcore\Translation\Translator
     */
    protected function getTranslatorInterfaceService()
    {
        $this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] = $instance = new \Pimcore\Translation\Translator(($this->privates['translator.default'] ?? $this->getTranslator_DefaultService()));

        $instance->setKernel(($this->services['kernel'] ?? $this->get('kernel', 1)));
        $instance->setAdminPath('@PimcoreCoreBundle/Resources/translations');
        $instance->setAdminTranslationMapping([]);

        return $instance;
    }

    /*
     * Gets the public 'cmf_routing.route_provider' shared autowired service.
     *
     * @return \Pimcore\Routing\DynamicRouteProvider
     */
    protected function getCmfRouting_RouteProviderService()
    {
        $a = ($this->services['Pimcore\\Http\\Request\\Resolver\\SiteResolver'] ?? $this->getSiteResolverService());

        $this->services['cmf_routing.route_provider'] = $instance = new \Pimcore\Routing\DynamicRouteProvider($a);

        $instance->addHandler(($this->privates['Pimcore\\Routing\\Dynamic\\DocumentRouteHandler'] ?? $this->getDocumentRouteHandlerService()));
        $instance->addHandler(new \Pimcore\Routing\Dynamic\DataObjectRouteHandler(($this->services['Pimcore\\Model\\Document\\Service'] ?? ($this->services['Pimcore\\Model\\Document\\Service'] = new \Pimcore\Model\Document\Service())), $a, ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->services['pimcore.controller.config.config_normalizer'] ?? $this->getPimcore_Controller_Config_ConfigNormalizerService())));

        return $instance;
    }

    /*
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], [], 'default', '');
    }

    /*
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Pimcore\Db\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Configuration();
        $a->setSchemaAssetsFilter(new \Doctrine\Bundle\DoctrineBundle\Dbal\SchemaAssetsFilterManager([0 => new \Doctrine\Bundle\DoctrineBundle\Dbal\BlacklistSchemaAssetFilter([0 => 'lock_keys'])]));
        $b = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $b->addEventSubscriber(new \Symfony\Cmf\Bundle\RoutingBundle\Doctrine\RouteConditionMetadataListener());

        return $this->services['doctrine.dbal.default_connection'] = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]))->createConnection(['driver' => 'pdo_mysql', 'charset' => 'UTF8MB4', 'host' => 'localhost', 'port' => NULL, 'user' => 'root', 'password' => NULL, 'driverOptions' => [], 'wrapperClass' => '\\Pimcore\\Db\\Connection', 'serverVersion' => '5.6', 'defaultTableOptions' => ['charset' => 'UTF8MB4', 'collate' => 'utf8mb4_general_ci']], $a, $b, ['enum' => 'string', 'bit' => 'boolean']);
    }

    /*
     * Gets the public 'event_dispatcher' shared service.
     *
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\EventDispatcher();

        $instance->addListener('scheb_two_factor.authentication.complete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\TwoFactorListener'] ?? ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\TwoFactorListener'] = new \Pimcore\Bundle\AdminBundle\EventListener\TwoFactorListener()));
        }, 1 => 'onAuthenticationComplete'], 0);
        $instance->addListener('security.authentication.success', [0 => function () {
            return ($this->privates['security.authentication.authentication_success_event_suppressor.two_factor.admin'] ?? ($this->privates['security.authentication.authentication_success_event_suppressor.two_factor.admin'] = new \Scheb\TwoFactorBundle\Security\TwoFactor\Event\AuthenticationSuccessEventSuppressor('admin')));
        }, 1 => 'onLogin'], 9223372036854775806);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['scheb_two_factor.trusted_cookie_response_listener'] ?? $this->getSchebTwoFactor_TrustedCookieResponseListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleAnalyticsCodeListener'] ?? $this->getGoogleAnalyticsCodeListenerService());
        }, 1 => 'onKernelResponse'], -110);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\CookiePolicyNoticeListener'] ?? $this->getCookiePolicyNoticeListenerService());
        }, 1 => 'onKernelResponse'], -109);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleTagManagerListener'] ?? $this->getGoogleTagManagerListenerService());
        }, 1 => 'onKernelResponse'], -108);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\TagManagerListener'] ?? $this->load('getTagManagerListenerService.php'));
        }, 1 => 'onKernelResponse'], -107);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FullPageCacheListener'] ?? $this->getFullPageCacheListenerService());
        }, 1 => 'onKernelRequest'], 6);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FullPageCacheListener'] ?? $this->getFullPageCacheListenerService());
        }, 1 => 'onKernelResponse'], -120);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FullPageCacheListener'] ?? $this->getFullPageCacheListenerService());
        }, 1 => 'stopPropagationCheck'], 100);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\MaintenancePageListener'] ?? $this->getMaintenancePageListenerService());
        }, 1 => 'onKernelRequest'], 620);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['response_listener'] ?? ($this->privates['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8')));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['streamed_response_listener'] ?? ($this->privates['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener()));
        }, 1 => 'onKernelResponse'], -1024);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListener2Service());
        }, 1 => 'setDefaultLocale'], 100);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListener2Service());
        }, 1 => 'onKernelRequest'], 16);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListener2Service());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['validate_request_listener'] ?? ($this->privates['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener()));
        }, 1 => 'onKernelRequest'], 256);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['.legacy_resolve_controller_name_subscriber'] ?? $this->get_LegacyResolveControllerNameSubscriberService());
        }, 1 => 'resolveControllerName'], 24);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelRequest'], 15);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelFinishRequest'], -15);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleError'], -128);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleTerminate'], -128);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.suggest_missing_package_subscriber'] ?? ($this->privates['console.suggest_missing_package_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SuggestMissingPackageSubscriber()));
        }, 1 => 'onConsoleError'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->services['Symfony\\Component\\HttpKernel\\EventListener\\SessionListener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelRequest'], 128);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->services['Symfony\\Component\\HttpKernel\\EventListener\\SessionListener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelResponse'], -1000);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->services['Symfony\\Component\\HttpKernel\\EventListener\\SessionListener'] ?? $this->getSessionListenerService());
        }, 1 => 'onFinishRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelRequest'], 32);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelException'], -64);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['web_link.add_link_header_listener'] ?? ($this->privates['web_link.add_link_header_listener'] = new \Symfony\Component\WebLink\EventListener\AddLinkHeaderListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['security.firewall'] ?? $this->getSecurity_FirewallService());
        }, 1 => 'configureLogoutUrlGenerator'], 8);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['security.firewall'] ?? $this->getSecurity_FirewallService());
        }, 1 => 'onKernelRequest'], 8);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['security.firewall'] ?? $this->getSecurity_FirewallService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['security.rememberme.response_listener'] ?? ($this->privates['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'logKernelException'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'onKernelException'], -128);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => function () {
            return ($this->privates['twig.mailer.message_listener'] ?? $this->load('getTwig_Mailer_MessageListenerService.php'));
        }, 1 => 'onMessage'], 0);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onCommand'], 255);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onTerminate'], -255);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onException'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onTerminate'], 0);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onException'], 0);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onTerminate'], 0);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageHandledEvent', [0 => function () {
            return ($this->privates['doctrine.orm.messenger.event_subscriber.doctrine_clear_entity_manager'] ?? $this->load('getDoctrine_Orm_Messenger_EventSubscriber_DoctrineClearEntityManagerService.php'));
        }, 1 => 'onWorkerMessageHandled'], 0);
        $instance->addListener('Symfony\\Component\\Messenger\\Event\\WorkerMessageFailedEvent', [0 => function () {
            return ($this->privates['doctrine.orm.messenger.event_subscriber.doctrine_clear_entity_manager'] ?? $this->load('getDoctrine_Orm_Messenger_EventSubscriber_DoctrineClearEntityManagerService.php'));
        }, 1 => 'onWorkerMessageFailed'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.controller.listener'] ?? $this->getSensioFrameworkExtra_Controller_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.converter.listener'] ?? $this->getSensioFrameworkExtra_Converter_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelController'], -128);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelView'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ?? ($this->privates['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ?? ($this->privates['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ($this->privates['sensio_framework_extra.security.listener'] ?? $this->getSensioFrameworkExtra_Security_ListenerService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ($this->privates['framework_extra_bundle.event.is_granted'] ?? $this->getFrameworkExtraBundle_Event_IsGrantedService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('presta_sitemap.populate', [0 => function () {
            return ($this->privates['presta_sitemap.eventlistener.route_annotation'] ?? $this->load('getPrestaSitemap_Eventlistener_RouteAnnotationService.php'));
        }, 1 => 'registerRouteAnnotation'], 0);
        $instance->addListener('workflow.completed', [0 => function () {
            return ($this->privates['Pimcore\\Workflow\\EventSubscriber\\NotificationSubscriber'] ?? $this->load('getNotificationSubscriberService.php'));
        }, 1 => 'onWorkflowCompleted'], 0);
        $instance->addListener('workflow.completed', [0 => function () {
            return ($this->privates['Pimcore\\Workflow\\EventSubscriber\\NotesSubscriber'] ?? $this->load('getNotesSubscriberService.php'));
        }, 1 => 'onWorkflowCompleted'], 1);
        $instance->addListener('workflow.enter', [0 => function () {
            return ($this->privates['Pimcore\\Workflow\\EventSubscriber\\NotesSubscriber'] ?? $this->load('getNotesSubscriberService.php'));
        }, 1 => 'onWorkflowEnter'], 0);
        $instance->addListener('pimcore.workflow.preGlobalAction', [0 => function () {
            return ($this->privates['Pimcore\\Workflow\\EventSubscriber\\NotesSubscriber'] ?? $this->load('getNotesSubscriberService.php'));
        }, 1 => 'onPreGlobalAction'], 0);
        $instance->addListener('pimcore.workflow.postGlobalAction', [0 => function () {
            return ($this->privates['Pimcore\\Workflow\\EventSubscriber\\NotesSubscriber'] ?? $this->load('getNotesSubscriberService.php'));
        }, 1 => 'onPostGlobalAction'], 0);
        $instance->addListener('workflow.completed', [0 => function () {
            return ($this->privates['Pimcore\\Workflow\\EventSubscriber\\ChangePublishedStateSubscriber'] ?? ($this->privates['Pimcore\\Workflow\\EventSubscriber\\ChangePublishedStateSubscriber'] = new \Pimcore\Workflow\EventSubscriber\ChangePublishedStateSubscriber()));
        }, 1 => 'onWorkflowCompleted'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FrontendRoutingListener'] ?? $this->getFrontendRoutingListenerService());
        }, 1 => 'onKernelRequest'], 512);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FrontendRoutingListener'] ?? $this->getFrontendRoutingListenerService());
        }, 1 => 'onKernelException'], 64);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\PimcoreContextListener'] ?? $this->getPimcoreContextListenerService());
        }, 1 => 'onKernelRequest'], 24);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentFallbackListener'] ?? $this->getDocumentFallbackListenerService());
        }, 1 => 'onKernelRequest'], 20);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentFallbackListener'] ?? $this->getDocumentFallbackListenerService());
        }, 1 => 'onKernelController'], 20);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\PimcoreHeaderListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\PimcoreHeaderListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\PimcoreHeaderListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\LocaleListener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelRequest'], 1);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\LocaleListener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\TranslationDebugListener'] ?? $this->getTranslationDebugListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\ElementListener'] ?? $this->getElementListenerService());
        }, 1 => 'onKernelController'], 3);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\HardlinkCanonicalListener'] ?? $this->getHardlinkCanonicalListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\BlockStateListener'] ?? $this->getBlockStateListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\BlockStateListener'] ?? $this->getBlockStateListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentMetaDataListener'] ?? $this->getDocumentMetaDataListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('pimcore.document.renderer.pre_render', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentRendererListener'] ?? $this->load('getDocumentRendererListenerService.php'));
        }, 1 => 'onPreRender'], 0);
        $instance->addListener('pimcore.document.renderer.post_render', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentRendererListener'] ?? $this->load('getDocumentRendererListenerService.php'));
        }, 1 => 'onPostRender'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentStackListener'] ?? $this->getDocumentStackListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentStackListener'] ?? $this->getDocumentStackListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ControllerViewModelListener'] ?? $this->load('getControllerViewModelListenerService.php'));
        }, 1 => 'onKernelView'], 10);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\ContentTemplateListener'] ?? $this->load('getContentTemplateListenerService.php'));
        }, 1 => 'onKernelView'], 16);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\EventedControllerListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\EventedControllerListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\EventedControllerListener()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\EventedControllerListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\EventedControllerListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\EventedControllerListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\TemplateControllerListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\TemplateControllerListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\TemplateControllerListener($this)));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\TemplateControllerListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\TemplateControllerListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\TemplateControllerListener($this)));
        }, 1 => 'onKernelView'], 32);
        $instance->addListener('pimcore.dataobject.preAdd', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onElementPreAdd'], 0);
        $instance->addListener('pimcore.document.preAdd', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onElementPreAdd'], 0);
        $instance->addListener('pimcore.asset.preAdd', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onElementPreAdd'], 0);
        $instance->addListener('pimcore.dataobject.postDelete', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onElementPostDelete'], 0);
        $instance->addListener('pimcore.document.postDelete', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onElementPostDelete'], 0);
        $instance->addListener('pimcore.asset.postDelete', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onElementPostDelete'], 0);
        $instance->addListener('pimcore.admin.dataobject.get.preSendData', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onAdminElementGetPreSendData'], 0);
        $instance->addListener('pimcore.admin.asset.get.preSendData', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onAdminElementGetPreSendData'], 0);
        $instance->addListener('pimcore.admin.document.get.preSendData', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] ?? $this->load('getWorkflowManagementListenerService.php'));
        }, 1 => 'onAdminElementGetPreSendData'], 0);
        $instance->addListener('pimcore.dataobject.postCopy', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\ElementTagsListener()));
        }, 1 => 'onPostCopy'], 0);
        $instance->addListener('pimcore.document.postCopy', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\ElementTagsListener()));
        }, 1 => 'onPostCopy'], 0);
        $instance->addListener('pimcore.asset.postCopy', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\ElementTagsListener()));
        }, 1 => 'onPostCopy'], 0);
        $instance->addListener('pimcore.asset.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ElementTagsListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\ElementTagsListener()));
        }, 1 => 'onPostAssetDelete'], -9999);
        $instance->addListener('pimcore.dataobject.postAdd', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPostAddElement'], 0);
        $instance->addListener('pimcore.document.postAdd', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPostAddElement'], 0);
        $instance->addListener('pimcore.asset.postAdd', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPostAddElement'], 0);
        $instance->addListener('pimcore.dataobject.preDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPreDeleteElement'], 0);
        $instance->addListener('pimcore.document.preDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPreDeleteElement'], 0);
        $instance->addListener('pimcore.asset.preDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPreDeleteElement'], 0);
        $instance->addListener('pimcore.dataobject.postUpdate', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPostUpdateElement'], 0);
        $instance->addListener('pimcore.document.postUpdate', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPostUpdateElement'], 0);
        $instance->addListener('pimcore.asset.postUpdate', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\SearchBackendListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\SearchBackendListener()));
        }, 1 => 'onPostUpdateElement'], 0);
        $instance->addListener('pimcore.dataobject.postAdd', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostAdd'], 0);
        $instance->addListener('pimcore.document.postAdd', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostAdd'], 0);
        $instance->addListener('pimcore.asset.postAdd', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostAdd'], 0);
        $instance->addListener('pimcore.class.postAdd', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostAdd'], 0);
        $instance->addListener('pimcore.dataobject.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostDelete'], 0);
        $instance->addListener('pimcore.document.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostDelete'], 0);
        $instance->addListener('pimcore.asset.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostDelete'], 0);
        $instance->addListener('pimcore.class.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] ?? ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\UUIDListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\UUIDListener()));
        }, 1 => 'onPostDelete'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ResponseExceptionListener'] ?? $this->load('getResponseExceptionListenerService.php'));
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ResponseHeaderListener'] ?? $this->getResponseHeaderListenerService());
        }, 1 => 'onKernelResponse'], 32);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\EditmodeListener'] ?? $this->getEditmodeListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\EditmodeListener'] ?? $this->getEditmodeListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ResponseStackListener'] ?? $this->getResponseStackListenerService());
        }, 1 => 'onKernelResponse'], 24);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\InternalWysiwygHtmlAttributeFilterListener'] ?? $this->getInternalWysiwygHtmlAttributeFilterListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleSearchConsoleVerificationListener'] ?? $this->getGoogleSearchConsoleVerificationListenerService());
        }, 1 => 'onKernelRequest'], 64);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\OutputTimestampListener'] ?? $this->getOutputTimestampListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('pimcore.test.kernel.booted', [0 => function () {
            return ($this->services['Pimcore\\Migrations\\Configuration\\ConfigurationFactory'] ?? $this->load('getConfigurationFactoryService.php'));
        }, 1 => 'reset'], 0);
        $instance->addListener('pimcore.admin.reports.save_settings', [0 => function () {
            return ($this->privates['Pimcore\\Analytics\\Piwik\\EventListener\\CacheListener'] ?? $this->load('getCacheListenerService.php'));
        }, 1 => 'onSaveSettings'], 0);
        $instance->addListener('pimcore.admin.indexAction.settings', [0 => function () {
            return ($this->privates['Pimcore\\Analytics\\Piwik\\EventListener\\IndexSettingsListener'] ?? $this->load('getIndexSettingsListenerService.php'));
        }, 1 => 'addIndexSettings'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Analytics\\Piwik\\EventListener\\TrackingCodeListener'] ?? $this->getTrackingCodeListenerService());
        }, 1 => 'onKernelResponse'], -110);
        $instance->addListener('presta_sitemap.populate', [0 => function () {
            return ($this->privates['Pimcore\\Sitemap\\EventListener\\SitemapGeneratorListener'] ?? $this->load('getSitemapGeneratorListenerService.php'));
        }, 1 => 'onPopulateSitemap'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\TargetingListener'] ?? $this->getTargetingListenerService());
        }, 1 => 'onKernelRequest'], 7);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\TargetingListener'] ?? $this->getTargetingListenerService());
        }, 1 => 'onKernelResponse'], -115);
        $instance->addListener('pimcore.targeting.pre_resolve', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\TargetingListener'] ?? $this->getTargetingListenerService());
        }, 1 => 'onPreResolve'], 0);
        $instance->addListener('pimcore.tracking.piwik.code.tracking_data', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\PiwikVisitorIdListener'] ?? $this->load('getPiwikVisitorIdListenerService.php'));
        }, 1 => 'onPiwikTrackingData'], 0);
        $instance->addListener('pimcore.targeting.pre_resolve', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\DocumentTargetGroupListener'] ?? $this->load('getDocumentTargetGroupListenerService.php'));
        }, 1 => 'onVisitorInfoResolve'], 0);
        $instance->addListener('pimcore.cache.full_page.prepare_response', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\FullPageCacheCookieCleanupListener'] ?? ($this->privates['Pimcore\\Targeting\\EventListener\\FullPageCacheCookieCleanupListener'] = new \Pimcore\Targeting\EventListener\FullPageCacheCookieCleanupListener()));
        }, 1 => 'onPrepareFullPageCacheResponse'], 0);
        $instance->addListener('pimcore.targeting.visited_pages_count_match', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\VisitedPagesCountListener'] ?? $this->load('getVisitedPagesCountListenerService.php'));
        }, 1 => 'onVisitedPagesCountMatch'], 0);
        $instance->addListener('pimcore.targeting.post_resolve', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\VisitedPagesCountListener'] ?? $this->load('getVisitedPagesCountListenerService.php'));
        }, 1 => 'onPostResolveVisitorInfo'], 0);
        $instance->addListener('pimcore.targeting.pre_resolve', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\ToolbarListener'] ?? $this->getToolbarListenerService());
        }, 1 => 'onPreResolve'], -10);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Targeting\\EventListener\\ToolbarListener'] ?? $this->getToolbarListenerService());
        }, 1 => 'onKernelResponse'], -127);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\BruteforceProtectionListener'] ?? $this->getBruteforceProtectionListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\BruteforceProtectionListener'] ?? $this->getBruteforceProtectionListenerService());
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\AdminAuthenticationDoubleCheckListener'] ?? $this->getAdminAuthenticationDoubleCheckListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->services['Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener'] ?? $this->getCsrfProtectionListenerService());
        }, 1 => 'handleRequest'], 11);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\AdminExceptionListener'] ?? $this->load('getAdminExceptionListenerService.php'));
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('pimcore.class.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\GridConfigListener'] ?? ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\GridConfigListener'] = new \Pimcore\Bundle\AdminBundle\EventListener\GridConfigListener()));
        }, 1 => 'onClassDelete'], 0);
        $instance->addListener('pimcore.user.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\GridConfigListener'] ?? ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\GridConfigListener'] = new \Pimcore\Bundle\AdminBundle\EventListener\GridConfigListener()));
        }, 1 => 'onUserDelete'], 0);
        $instance->addListener('pimcore.dataobject.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\GridConfigListener'] ?? ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\GridConfigListener'] = new \Pimcore\Bundle\AdminBundle\EventListener\GridConfigListener()));
        }, 1 => 'onObjectDelete'], 0);
        $instance->addListener('pimcore.class.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\ImportConfigListener'] ?? ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\ImportConfigListener'] = new \Pimcore\Bundle\AdminBundle\EventListener\ImportConfigListener()));
        }, 1 => 'onClassDelete'], 0);
        $instance->addListener('pimcore.user.postDelete', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\ImportConfigListener'] ?? ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\ImportConfigListener'] = new \Pimcore\Bundle\AdminBundle\EventListener\ImportConfigListener()));
        }, 1 => 'onUserDelete'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\HttpCacheListener'] ?? $this->getHttpCacheListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\CustomAdminEntryPointCheckListener'] ?? $this->getCustomAdminEntryPointCheckListenerService());
        }, 1 => 'onKernelRequest'], 560);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\UserPerspectiveListener'] ?? $this->getUserPerspectiveListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\UsageStatisticsListener'] ?? $this->getUsageStatisticsListenerService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\EnablePreviewTimeSliderListener'] ?? $this->getEnablePreviewTimeSliderListenerService());
        }, 1 => 'onKernelResponse'], 0);

        return $instance;
    }

    /*
     * Gets the public 'form.factory' shared service.
     *
     * @return \Symfony\Component\Form\FormFactory
     */
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory(($this->privates['form.registry'] ?? $this->getForm_RegistryService()));
    }

    /*
     * Gets the public 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['controller_resolver'] ?? $this->getControllerResolverService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(($this->privates['argument_metadata_factory'] ?? ($this->privates['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())), new RewindableGenerator(function () {
            yield 0 => ($this->privates['argument_resolver.request_attribute'] ?? ($this->privates['argument_resolver.request_attribute'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver()));
            yield 1 => ($this->privates['argument_resolver.request'] ?? ($this->privates['argument_resolver.request'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver()));
            yield 2 => ($this->privates['argument_resolver.session'] ?? ($this->privates['argument_resolver.session'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver()));
            yield 3 => ($this->privates['security.user_value_resolver'] ?? $this->load('getSecurity_UserValueResolverService.php'));
            yield 4 => ($this->privates['Pimcore\\Controller\\ArgumentValueResolver\\DocumentValueResolver'] ?? $this->load('getDocumentValueResolverService.php'));
            yield 5 => ($this->privates['Pimcore\\Controller\\ArgumentValueResolver\\ViewModelValueResolver'] ?? $this->load('getViewModelValueResolverService.php'));
            yield 6 => ($this->privates['Pimcore\\Controller\\ArgumentValueResolver\\EditmodeValueResolver'] ?? $this->load('getEditmodeValueResolverService.php'));
            yield 7 => ($this->privates['Pimcore\\Controller\\ArgumentValueResolver\\TemplateVarsValueResolver'] ?? $this->load('getTemplateVarsValueResolverService.php'));
            yield 8 => ($this->privates['Pimcore\\Controller\\ArgumentValueResolver\\WebsiteConfigValueResolver'] ?? ($this->privates['Pimcore\\Controller\\ArgumentValueResolver\\WebsiteConfigValueResolver'] = new \Pimcore\Controller\ArgumentValueResolver\WebsiteConfigValueResolver()));
            yield 9 => ($this->privates['argument_resolver.service'] ?? $this->load('getArgumentResolver_ServiceService.php'));
            yield 10 => ($this->privates['argument_resolver.default'] ?? ($this->privates['argument_resolver.default'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver()));
            yield 11 => ($this->privates['argument_resolver.variadic'] ?? ($this->privates['argument_resolver.variadic'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver()));
        }, 12)));
    }

    /*
     * Gets the public 'monolog.logger.admin' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_AdminService()
    {
        $this->services['monolog.logger.admin'] = $instance = new \Symfony\Bridge\Monolog\Logger('admin');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'monolog.logger.cache' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->services['monolog.logger.cache'] = $instance = new \Symfony\Bridge\Monolog\Logger('cache');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'monolog.logger.init' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_InitService()
    {
        $this->services['monolog.logger.init'] = $instance = new \Symfony\Bridge\Monolog\Logger('init');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'monolog.logger.php' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_PhpService()
    {
        $this->services['monolog.logger.php'] = $instance = new \Symfony\Bridge\Monolog\Logger('php');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'monolog.logger.request' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'monolog.logger.router' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RouterService()
    {
        $this->services['monolog.logger.router'] = $instance = new \Symfony\Bridge\Monolog\Logger('router');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'monolog.logger.routing' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RoutingService()
    {
        $this->services['monolog.logger.routing'] = $instance = new \Symfony\Bridge\Monolog\Logger('routing');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'monolog.logger.security' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_SecurityService()
    {
        $this->services['monolog.logger.security'] = $instance = new \Symfony\Bridge\Monolog\Logger('security');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the public 'pimcore.cache.core.handler' shared autowired service.
     *
     * @return \Pimcore\Cache\Core\EventDispatchingCoreHandler
     */
    protected function getPimcore_Cache_Core_HandlerService()
    {
        $a = ($this->services['pimcore.cache.core.pool'] ?? $this->getPimcore_Cache_Core_PoolService());
        $b = new \Pimcore\Cache\Core\WriteLock($a);

        $c = ($this->services['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService());

        $b->setLogger($c);
        $b->setLogger($c);

        $this->services['pimcore.cache.core.handler'] = $instance = new \Pimcore\Cache\Core\EventDispatchingCoreHandler($a, $b, ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));

        $instance->setLogger($c);
        $instance->setLogger($c);

        return $instance;
    }

    /*
     * Gets the public 'pimcore.cache.core.pool' shared service.
     *
     * @return \Pimcore\Cache\Pool\Doctrine
     */
    protected function getPimcore_Cache_Core_PoolService()
    {
        $this->services['pimcore.cache.core.pool'] = $instance = new \Pimcore\Cache\Pool\Doctrine(($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService()), 2419200);

        $instance->setLogger(($this->services['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $instance;
    }

    /*
     * Gets the public 'pimcore.controller.config.config_normalizer' shared autowired service.
     *
     * @return \Pimcore\Controller\Config\ConfigNormalizer
     */
    protected function getPimcore_Controller_Config_ConfigNormalizerService()
    {
        $this->services['pimcore.controller.config.config_normalizer'] = $instance = new \Pimcore\Controller\Config\ConfigNormalizer(($this->services['kernel'] ?? $this->get('kernel', 1)));

        $instance->setRoutingDefaults($this->parameters['pimcore.routing.defaults']);

        return $instance;
    }

    /*
     * Gets the public 'pimcore.routing.router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getPimcore_Routing_Router_RequestContextService()
    {
        return $this->services['pimcore.routing.router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /*
     * Gets the public 'pimcore.service.context.pimcore_context_guesser' shared autowired service.
     *
     * @return \Pimcore\Http\Context\PimcoreContextGuesser
     */
    protected function getPimcore_Service_Context_PimcoreContextGuesserService()
    {
        $this->services['pimcore.service.context.pimcore_context_guesser'] = $instance = new \Pimcore\Http\Context\PimcoreContextGuesser(($this->services['pimcore.service.request_matcher_factory'] ?? ($this->services['pimcore.service.request_matcher_factory'] = new \Pimcore\Http\RequestMatcherFactory())));

        $instance->addContextRoutes('profiler', [0 => ['path' => '^/_(profiler|wdt)(/.*)?$', 'route' => false, 'host' => false, 'methods' => []]]);
        $instance->addContextRoutes('admin', [0 => ['path' => '^/admin(/.*)?$', 'route' => false, 'host' => false, 'methods' => []], 1 => ['route' => '^pimcore_admin_', 'path' => false, 'host' => false, 'methods' => []]]);
        $instance->addContextRoutes('webservice', [0 => ['path' => '^/webservice(/.*)?$', 'route' => false, 'host' => false, 'methods' => []], 1 => ['route' => '^pimcore_webservice', 'path' => false, 'host' => false, 'methods' => []]]);
        $instance->addContextRoutes('plugin', [0 => ['path' => '^/plugin(/.*)?$', 'route' => false, 'host' => false, 'methods' => []]]);

        return $instance;
    }

    /*
     * Gets the public 'pimcore.service.request_matcher_factory' shared autowired service.
     *
     * @return \Pimcore\Http\RequestMatcherFactory
     */
    protected function getPimcore_Service_RequestMatcherFactoryService()
    {
        return $this->services['pimcore.service.request_matcher_factory'] = new \Pimcore\Http\RequestMatcherFactory();
    }

    /*
     * Gets the public 'pimcore_admin.security.bruteforce_protection_handler' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\Security\BruteforceProtectionHandler
     */
    protected function getPimcoreAdmin_Security_BruteforceProtectionHandlerService()
    {
        $this->services['pimcore_admin.security.bruteforce_protection_handler'] = $instance = new \Pimcore\Bundle\AdminBundle\Security\BruteforceProtectionHandler(($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()));

        $a = ($this->services['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService());

        $instance->setLogger($a);
        $instance->setLogger($a);

        return $instance;
    }

    /*
     * Gets the public 'pimcore_admin.security.user_loader' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\Security\User\UserLoader
     */
    protected function getPimcoreAdmin_Security_UserLoaderService()
    {
        return $this->services['pimcore_admin.security.user_loader'] = new \Pimcore\Bundle\AdminBundle\Security\User\UserLoader(($this->services['Pimcore\\Bundle\\AdminBundle\\Security\\User\\TokenStorageUserResolver'] ?? $this->getTokenStorageUserResolverService()), ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()));
    }

    /*
     * Gets the public 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /*
     * Gets the public 'router' shared service.
     *
     * @return \Symfony\Cmf\Component\Routing\ChainRouter
     */
    protected function getRouterService()
    {
        $a = ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService());

        $this->services['router'] = $instance = new \Symfony\Cmf\Component\Routing\ChainRouter($a);

        $b = ($this->services['pimcore.routing.router.request_context'] ?? $this->getPimcore_Routing_Router_RequestContextService());
        $c = new \Symfony\Bundle\FrameworkBundle\Routing\Router((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'routing.loader' => ['services', 'routing.loader', 'getRouting_LoaderService.php', true],
        ], [
            'routing.loader' => 'Symfony\\Component\\Config\\Loader\\LoaderInterface',
        ]))->withContext('router.default', $this), (\dirname(__DIR__, 4).'/app/config/routing.yml'), ['cache_dir' => $this->targetDir.'', 'debug' => false, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\CompiledUrlGeneratorDumper', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableCompiledUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\CompiledUrlMatcherDumper', 'strict_requirements' => NULL], $b, new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this), ($this->services['monolog.logger.router'] ?? $this->getMonolog_Logger_RouterService()), 'en');
        $c->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? ($this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory())));
        $d = ($this->services['cmf_routing.route_provider'] ?? $this->getCmfRouting_RouteProviderService());

        $e = new \Symfony\Cmf\Bundle\RoutingBundle\Routing\DynamicRouter($b, new \Symfony\Cmf\Component\Routing\NestedMatcher\NestedMatcher($d, new \Symfony\Cmf\Component\Routing\NestedMatcher\UrlMatcher(new \Symfony\Component\Routing\RouteCollection(), new \Symfony\Component\Routing\RequestContext())), new \Symfony\Cmf\Component\Routing\ContentAwareGenerator($d, $a), '', ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), $d);
        $e->setRequestStack(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
        $e->addRouteEnhancer(new \Symfony\Cmf\Component\Routing\Enhancer\RouteContentEnhancer('_route_object', '_content'), 100);
        $f = new \Pimcore\Routing\Staticroute\Router($b, ($this->services['pimcore.controller.config.config_normalizer'] ?? $this->getPimcore_Controller_Config_ConfigNormalizerService()), ($this->services['Pimcore\\Config'] ?? ($this->services['Pimcore\\Config'] = new \Pimcore\Config())));

        $g = ($this->services['monolog.logger.routing'] ?? $this->getMonolog_Logger_RoutingService());

        $f->setLogger($g);
        $f->setLocaleParams([]);
        $f->setLogger($g);

        $instance->setContext($b);
        $instance->add($c, '300');
        $instance->add($e, '200');
        $instance->add(new \Pimcore\Routing\Element\Router($b, ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService())), 110);
        $instance->add($f, 100);

        return $instance;
    }

    /*
     * Gets the public 'security.authorization_checker' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), ($this->privates['security.access.decision_manager'] ?? $this->getSecurity_Access_DecisionManagerService()), false);
    }

    /*
     * Gets the public 'security.token_storage' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage(($this->privates['security.untracked_token_storage'] ?? ($this->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'session' => ['services', 'session', 'getSessionService.php', true],
        ], [
            'session' => '?',
        ]));
    }

    /*
     * Gets the public 'sensio_framework_extra.view.guesser' shared service.
     *
     * @return \Pimcore\Bundle\CoreBundle\Templating\LegacyTemplateGuesser
     */
    protected function getSensioFrameworkExtra_View_GuesserService()
    {
        return $this->services['sensio_framework_extra.view.guesser'] = new \Pimcore\Bundle\CoreBundle\Templating\LegacyTemplateGuesser(($this->services['kernel'] ?? $this->get('kernel', 1)), ($this->services['templating'] ?? $this->load('getTemplatingService.php')));
    }

    /*
     * Gets the private '.legacy_resolve_controller_name_subscriber' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber
     */
    protected function get_LegacyResolveControllerNameSubscriberService()
    {
        return $this->privates['.legacy_resolve_controller_name_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber(($this->privates['.legacy_controller_name_converter'] ?? ($this->privates['.legacy_controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1)), false))), false);
    }

    /*
     * Gets the private 'Pimcore\Analytics\Google\Tracker' shared autowired service.
     *
     * @return \Pimcore\Analytics\Google\Tracker
     */
    protected function getTrackerService()
    {
        $this->privates['Pimcore\\Analytics\\Google\\Tracker'] = $instance = new \Pimcore\Analytics\Google\Tracker(($this->privates['Pimcore\\Analytics\\SiteId\\SiteIdProvider'] ?? $this->getSiteIdProviderService()), ($this->privates['Pimcore\\Analytics\\Google\\Config\\ConfigProvider'] ?? ($this->privates['Pimcore\\Analytics\\Google\\Config\\ConfigProvider'] = new \Pimcore\Analytics\Google\Config\ConfigProvider())), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->services['templating'] ?? $this->load('getTemplatingService.php')));

        $instance->setLogger(($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Analytics\Piwik\Config\ConfigProvider' shared autowired service.
     *
     * @return \Pimcore\Analytics\Piwik\Config\ConfigProvider
     */
    protected function getConfigProviderService()
    {
        return $this->privates['Pimcore\\Analytics\\Piwik\\Config\\ConfigProvider'] = new \Pimcore\Analytics\Piwik\Config\ConfigProvider();
    }

    /*
     * Gets the private 'Pimcore\Analytics\Piwik\EventListener\TrackingCodeListener' shared autowired service.
     *
     * @return \Pimcore\Analytics\Piwik\EventListener\TrackingCodeListener
     */
    protected function getTrackingCodeListenerService()
    {
        $this->privates['Pimcore\\Analytics\\Piwik\\EventListener\\TrackingCodeListener'] = $instance = new \Pimcore\Analytics\Piwik\EventListener\TrackingCodeListener(new \Pimcore\Analytics\Piwik\Tracker(($this->privates['Pimcore\\Analytics\\SiteId\\SiteIdProvider'] ?? $this->getSiteIdProviderService()), ($this->privates['Pimcore\\Analytics\\Piwik\\Config\\ConfigProvider'] ?? ($this->privates['Pimcore\\Analytics\\Piwik\\Config\\ConfigProvider'] = new \Pimcore\Analytics\Piwik\Config\ConfigProvider())), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->services['templating'] ?? $this->load('getTemplatingService.php'))));

        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Analytics\SiteId\SiteIdProvider' shared autowired service.
     *
     * @return \Pimcore\Analytics\SiteId\SiteIdProvider
     */
    protected function getSiteIdProviderService()
    {
        return $this->privates['Pimcore\\Analytics\\SiteId\\SiteIdProvider'] = new \Pimcore\Analytics\SiteId\SiteIdProvider(($this->services['Pimcore\\Http\\Request\\Resolver\\SiteResolver'] ?? $this->getSiteResolverService()));
    }

    /*
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\AdminAuthenticationDoubleCheckListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\AdminAuthenticationDoubleCheckListener
     */
    protected function getAdminAuthenticationDoubleCheckListenerService()
    {
        return $this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\AdminAuthenticationDoubleCheckListener'] = new \Pimcore\Bundle\AdminBundle\EventListener\AdminAuthenticationDoubleCheckListener(($this->services['pimcore.service.request_matcher_factory'] ?? ($this->services['pimcore.service.request_matcher_factory'] = new \Pimcore\Http\RequestMatcherFactory())), ($this->services['Pimcore\\Bundle\\AdminBundle\\Security\\User\\TokenStorageUserResolver'] ?? $this->getTokenStorageUserResolverService()), $this->parameters['pimcore.admin.unauthenticated_routes']);
    }

    /*
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\BruteforceProtectionListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\BruteforceProtectionListener
     */
    protected function getBruteforceProtectionListenerService()
    {
        $this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\BruteforceProtectionListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\BruteforceProtectionListener(($this->services['pimcore_admin.security.bruteforce_protection_handler'] ?? $this->getPimcoreAdmin_Security_BruteforceProtectionHandlerService()));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\CustomAdminEntryPointCheckListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\CustomAdminEntryPointCheckListener
     */
    protected function getCustomAdminEntryPointCheckListenerService()
    {
        $this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\CustomAdminEntryPointCheckListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\CustomAdminEntryPointCheckListener(NULL);

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\EnablePreviewTimeSliderListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\EnablePreviewTimeSliderListener
     */
    protected function getEnablePreviewTimeSliderListenerService()
    {
        $this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\EnablePreviewTimeSliderListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\EnablePreviewTimeSliderListener(($this->services['Pimcore\\Http\\Request\\Resolver\\OutputTimestampResolver'] ?? $this->getOutputTimestampResolverService()), ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->services['Pimcore\\Http\\Request\\Resolver\\EditmodeResolver'] ?? $this->getEditmodeResolverService()), ($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()));

        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\HttpCacheListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\HttpCacheListener
     */
    protected function getHttpCacheListenerService()
    {
        $this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\HttpCacheListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\HttpCacheListener(($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\UsageStatisticsListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\UsageStatisticsListener
     */
    protected function getUsageStatisticsListenerService()
    {
        $this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\UsageStatisticsListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\UsageStatisticsListener(($this->services['Pimcore\\Bundle\\AdminBundle\\Security\\User\\TokenStorageUserResolver'] ?? $this->getTokenStorageUserResolverService()), ($this->services['Pimcore\\Config'] ?? ($this->services['Pimcore\\Config'] = new \Pimcore\Config())));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\UserPerspectiveListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\UserPerspectiveListener
     */
    protected function getUserPerspectiveListenerService()
    {
        $this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\UserPerspectiveListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\UserPerspectiveListener(($this->services['Pimcore\\Bundle\\AdminBundle\\Security\\User\\TokenStorageUserResolver'] ?? $this->getTokenStorageUserResolverService()));

        $a = ($this->services['monolog.logger.admin'] ?? $this->getMonolog_Logger_AdminService());

        $instance->setLogger($a);
        $instance->setLogger($a);
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\BlockStateListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\BlockStateListener
     */
    protected function getBlockStateListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\BlockStateListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\BlockStateListener(($this->services['Pimcore\\Document\\Editable\\Block\\BlockStateStack'] ?? ($this->services['Pimcore\\Document\\Editable\\Block\\BlockStateStack'] = new \Pimcore\Document\Editable\Block\BlockStateStack())));

        $a = ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService());

        $instance->setLogger($a);
        $instance->setLogger($a);
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentFallbackListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentFallbackListener
     */
    protected function getDocumentFallbackListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentFallbackListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentFallbackListener(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()), ($this->services['Pimcore\\Http\\Request\\Resolver\\SiteResolver'] ?? $this->getSiteResolverService()), ($this->services['Pimcore\\Model\\Document\\Service'] ?? ($this->services['Pimcore\\Model\\Document\\Service'] = new \Pimcore\Model\Document\Service())));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentMetaDataListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentMetaDataListener
     */
    protected function getDocumentMetaDataListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentMetaDataListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentMetaDataListener(($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()), ($this->services['pimcore.templating.view_helper.head_meta'] ?? $this->load('getPimcore_Templating_ViewHelper_HeadMetaService.php')));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentStackListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentStackListener
     */
    protected function getDocumentStackListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\DocumentStackListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\DocumentStackListener(($this->services['Pimcore\\Document\\DocumentStack'] ?? ($this->services['Pimcore\\Document\\DocumentStack'] = new \Pimcore\Document\DocumentStack())));

        $instance->setLogger(($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\EditmodeListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\EditmodeListener
     */
    protected function getEditmodeListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\EditmodeListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\EditmodeListener(($this->services['Pimcore\\Http\\Request\\Resolver\\EditmodeResolver'] ?? $this->getEditmodeResolverService()), ($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()), ($this->services['pimcore_admin.security.user_loader'] ?? $this->getPimcoreAdmin_Security_UserLoaderService()), ($this->services['Pimcore\\Extension\\Bundle\\PimcoreBundleManager'] ?? $this->getPimcoreBundleManagerService()), ($this->services['router'] ?? $this->getRouterService()), ($this->privates['assets.packages'] ?? $this->getAssets_PackagesService()));

        $instance->setLogger(($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\ElementListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\ElementListener
     */
    protected function getElementListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\ElementListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\ElementListener(($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()), ($this->services['Pimcore\\Http\\Request\\Resolver\\EditmodeResolver'] ?? $this->getEditmodeResolverService()), ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->services['pimcore_admin.security.user_loader'] ?? $this->getPimcoreAdmin_Security_UserLoaderService()), ($this->services['Pimcore\\Targeting\\Document\\DocumentTargetingConfigurator'] ?? $this->getDocumentTargetingConfiguratorService()));

        $a = ($this->services['monolog.logger.init'] ?? $this->getMonolog_Logger_InitService());

        $instance->setLogger($a);
        $instance->setLogger($a);
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\FrontendRoutingListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\FrontendRoutingListener
     */
    protected function getFrontendRoutingListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\FrontendRoutingListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\FrontendRoutingListener(($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->privates['Pimcore\\Routing\\RedirectHandler'] ?? $this->getRedirectHandlerService()), ($this->services['Pimcore\\Http\\Request\\Resolver\\SiteResolver'] ?? $this->getSiteResolverService()), ($this->services['Pimcore\\Config'] ?? ($this->services['Pimcore\\Config'] = new \Pimcore\Config())));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleSearchConsoleVerificationListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleSearchConsoleVerificationListener
     */
    protected function getGoogleSearchConsoleVerificationListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\GoogleSearchConsoleVerificationListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\GoogleSearchConsoleVerificationListener();

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\HardlinkCanonicalListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\HardlinkCanonicalListener
     */
    protected function getHardlinkCanonicalListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\HardlinkCanonicalListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\HardlinkCanonicalListener(($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\InternalWysiwygHtmlAttributeFilterListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\InternalWysiwygHtmlAttributeFilterListener
     */
    protected function getInternalWysiwygHtmlAttributeFilterListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\InternalWysiwygHtmlAttributeFilterListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\InternalWysiwygHtmlAttributeFilterListener();

        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));
        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\LocaleListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\LocaleListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\LocaleListener();

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\Frontend\OutputTimestampListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\Frontend\OutputTimestampListener
     */
    protected function getOutputTimestampListenerService()
    {
        return $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\Frontend\\OutputTimestampListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\Frontend\OutputTimestampListener(($this->services['Pimcore\\Http\\Request\\Resolver\\OutputTimestampResolver'] ?? $this->getOutputTimestampResolverService()));
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\MaintenancePageListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\MaintenancePageListener
     */
    protected function getMaintenancePageListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\MaintenancePageListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\MaintenancePageListener(($this->services['kernel'] ?? $this->get('kernel', 1)));

        $instance->loadTemplateFromResource('@PimcoreCoreBundle/Resources/misc/maintenance.html');
        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\PimcoreContextListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\PimcoreContextListener
     */
    protected function getPimcoreContextListenerService()
    {
        $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\PimcoreContextListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\PimcoreContextListener(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));

        $a = ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService());

        $instance->setLogger($a);
        $instance->setLogger($a);

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\ResponseHeaderListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\ResponseHeaderListener
     */
    protected function getResponseHeaderListenerService()
    {
        return $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ResponseHeaderListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\ResponseHeaderListener(($this->services['Pimcore\\Http\\Request\\Resolver\\ResponseHeaderResolver'] ?? $this->getResponseHeaderResolverService()));
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\ResponseStackListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\ResponseStackListener
     */
    protected function getResponseStackListenerService()
    {
        return $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ResponseStackListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\ResponseStackListener(($this->privates['Pimcore\\Http\\ResponseStack'] ?? ($this->privates['Pimcore\\Http\\ResponseStack'] = new \Pimcore\Http\ResponseStack())));
    }

    /*
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\TranslationDebugListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\TranslationDebugListener
     */
    protected function getTranslationDebugListenerService()
    {
        return $this->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\TranslationDebugListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\TranslationDebugListener(($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService()), 'pimcore_debug_translations');
    }

    /*
     * Gets the private 'Pimcore\Http\Response\CodeInjector' shared autowired service.
     *
     * @return \Pimcore\Http\Response\CodeInjector
     */
    protected function getCodeInjectorService()
    {
        return $this->privates['Pimcore\\Http\\Response\\CodeInjector'] = new \Pimcore\Http\Response\CodeInjector(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));
    }

    /*
     * Gets the private 'Pimcore\Routing\Dynamic\DocumentRouteHandler' shared autowired service.
     *
     * @return \Pimcore\Routing\Dynamic\DocumentRouteHandler
     */
    protected function getDocumentRouteHandlerService()
    {
        return $this->privates['Pimcore\\Routing\\Dynamic\\DocumentRouteHandler'] = new \Pimcore\Routing\Dynamic\DocumentRouteHandler(($this->services['Pimcore\\Model\\Document\\Service'] ?? ($this->services['Pimcore\\Model\\Document\\Service'] = new \Pimcore\Model\Document\Service())), ($this->services['Pimcore\\Http\\Request\\Resolver\\SiteResolver'] ?? $this->getSiteResolverService()), ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->services['pimcore.controller.config.config_normalizer'] ?? $this->getPimcore_Controller_Config_ConfigNormalizerService()), ($this->services['Pimcore\\Config'] ?? ($this->services['Pimcore\\Config'] = new \Pimcore\Config())));
    }

    /*
     * Gets the private 'Pimcore\Routing\RedirectHandler' shared autowired service.
     *
     * @return \Pimcore\Routing\RedirectHandler
     */
    protected function getRedirectHandlerService()
    {
        $this->privates['Pimcore\\Routing\\RedirectHandler'] = $instance = new \Pimcore\Routing\RedirectHandler(($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), ($this->services['Pimcore\\Http\\Request\\Resolver\\SiteResolver'] ?? $this->getSiteResolverService()), ($this->services['Pimcore\\Config'] ?? ($this->services['Pimcore\\Config'] = new \Pimcore\Config())), ($this->services['Symfony\\Component\\Lock\\LockFactory'] ?? $this->getLockFactoryService()));

        $a = ($this->services['monolog.logger.routing'] ?? $this->getMonolog_Logger_RoutingService());

        $instance->setLogger($a);
        $instance->setLogger($a);

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Targeting\ActionHandler\DelegatingActionHandler' shared autowired service.
     *
     * @return \Pimcore\Targeting\ActionHandler\DelegatingActionHandler
     */
    protected function getDelegatingActionHandlerService()
    {
        return $this->privates['Pimcore\\Targeting\\ActionHandler\\DelegatingActionHandler'] = new \Pimcore\Targeting\ActionHandler\DelegatingActionHandler(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'assign_target_group' => ['privates', 'Pimcore\\Targeting\\ActionHandler\\AssignTargetGroup', 'getAssignTargetGroupService.php', true],
            'codesnippet' => ['privates', 'Pimcore\\Targeting\\ActionHandler\\CodeSnippet', 'getCodeSnippetService.php', true],
            'redirect' => ['privates', 'Pimcore\\Targeting\\ActionHandler\\Redirect', 'getRedirectService.php', true],
        ], [
            'assign_target_group' => '?',
            'codesnippet' => '?',
            'redirect' => '?',
        ]), ($this->privates['Pimcore\\Targeting\\DataLoader'] ?? $this->getDataLoaderService()));
    }

    /*
     * Gets the private 'Pimcore\Targeting\ConditionMatcher' shared autowired service.
     *
     * @return \Pimcore\Targeting\ConditionMatcher
     */
    protected function getConditionMatcherService()
    {
        $a = ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService());

        return $this->privates['Pimcore\\Targeting\\ConditionMatcher'] = new \Pimcore\Targeting\ConditionMatcher(new \Pimcore\Targeting\ConditionFactory($a, $this->parameters['pimcore.targeting.conditions']), ($this->privates['Pimcore\\Targeting\\DataLoader'] ?? $this->getDataLoaderService()), $a, new \Symfony\Component\ExpressionLanguage\ExpressionLanguage(($this->services['pimcore.cache.core.pool'] ?? $this->getPimcore_Cache_Core_PoolService())), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
    }

    /*
     * Gets the private 'Pimcore\Targeting\DataLoader' shared autowired service.
     *
     * @return \Pimcore\Targeting\DataLoader
     */
    protected function getDataLoaderService()
    {
        return $this->privates['Pimcore\\Targeting\\DataLoader'] = new \Pimcore\Targeting\DataLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'device' => ['privates', 'Pimcore\\Targeting\\DataProvider\\Device', 'getDeviceService.php', true],
            'geoip' => ['privates', 'Pimcore\\Targeting\\DataProvider\\GeoIp', 'getGeoIpService.php', true],
            'geolocation' => ['privates', 'Pimcore\\Targeting\\DataProvider\\GeoLocation', 'getGeoLocationService.php', true],
            'piwik' => ['privates', 'Pimcore\\Targeting\\DataProvider\\Piwik', 'getPiwikService.php', true],
            'targeting_storage' => ['privates', 'Pimcore\\Targeting\\DataProvider\\TargetingStorage', 'getTargetingStorageService.php', true],
            'visited_pages_counter' => ['privates', 'Pimcore\\Targeting\\DataProvider\\VisitedPagesCounter', 'getVisitedPagesCounterService.php', true],
        ], [
            'device' => '?',
            'geoip' => '?',
            'geolocation' => '?',
            'piwik' => '?',
            'targeting_storage' => '?',
            'visited_pages_counter' => '?',
        ]));
    }

    /*
     * Gets the private 'Pimcore\Targeting\Debug\OverrideHandler' shared autowired service.
     *
     * @return \Pimcore\Targeting\Debug\OverrideHandler
     */
    protected function getOverrideHandlerService($lazyLoad = true)
    {
        if ($lazyLoad) {
            return $this->privates['Pimcore\\Targeting\\Debug\\OverrideHandler'] = $this->createProxy('OverrideHandler_fb58919', function () {
                return \OverrideHandler_fb58919::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
                    $wrappedInstance = $this->getOverrideHandlerService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Debug/OverrideHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/OverrideHandlerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Debug/Override/DocumentTargetingOverrideHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Debug/Override/LanguageOverrideHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Debug/Override/DeviceOverrideHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/Debug/Override/LocationOverrideHandler.php';

        return new \Pimcore\Targeting\Debug\OverrideHandler(($this->services['form.factory'] ?? $this->getForm_FactoryService()), [0 => new \Pimcore\Targeting\Debug\Override\DocumentTargetingOverrideHandler(($this->services['Pimcore\\Targeting\\Document\\DocumentTargetingConfigurator'] ?? $this->getDocumentTargetingConfiguratorService())), 1 => new \Pimcore\Targeting\Debug\Override\LanguageOverrideHandler(), 2 => new \Pimcore\Targeting\Debug\Override\DeviceOverrideHandler(), 3 => new \Pimcore\Targeting\Debug\Override\LocationOverrideHandler()]);
    }

    /*
     * Gets the private 'Pimcore\Targeting\EventListener\TargetingListener' shared autowired service.
     *
     * @return \Pimcore\Targeting\EventListener\TargetingListener
     */
    protected function getTargetingListenerService()
    {
        $a = ($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] ?? ($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] = new \Pimcore\Targeting\VisitorInfoStorage()));
        $b = ($this->privates['Pimcore\\Targeting\\ActionHandler\\DelegatingActionHandler'] ?? $this->getDelegatingActionHandlerService());
        $c = ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService());

        $this->privates['Pimcore\\Targeting\\EventListener\\TargetingListener'] = $instance = new \Pimcore\Targeting\EventListener\TargetingListener(new \Pimcore\Targeting\VisitorInfoResolver(($this->privates['Pimcore\\Targeting\\Storage\\CookieStorage'] ?? $this->getCookieStorageService()), $a, ($this->privates['Pimcore\\Targeting\\ConditionMatcher'] ?? $this->getConditionMatcherService()), $b, ($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService()), $c), $b, $a, ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), new \Pimcore\Targeting\Code\TargetingCodeGenerator($c, ($this->services['templating'] ?? $this->load('getTemplatingService.php'))));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));
        $instance->setResponseHelper(($this->services['Pimcore\\Http\\ResponseHelper'] ?? ($this->services['Pimcore\\Http\\ResponseHelper'] = new \Pimcore\Http\ResponseHelper())));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Targeting\EventListener\ToolbarListener' shared autowired service.
     *
     * @return \Pimcore\Targeting\EventListener\ToolbarListener
     */
    protected function getToolbarListenerService()
    {
        $this->privates['Pimcore\\Targeting\\EventListener\\ToolbarListener'] = $instance = new \Pimcore\Targeting\EventListener\ToolbarListener(($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] ?? ($this->privates['Pimcore\\Targeting\\VisitorInfoStorage'] = new \Pimcore\Targeting\VisitorInfoStorage())), ($this->services['Pimcore\\Http\\Request\\Resolver\\DocumentResolver'] ?? $this->getDocumentResolverService()), new \Pimcore\Targeting\Debug\TargetingDataCollector(($this->privates['Pimcore\\Targeting\\Storage\\CookieStorage'] ?? $this->getCookieStorageService()), ($this->services['Pimcore\\Targeting\\Document\\DocumentTargetingConfigurator'] ?? $this->getDocumentTargetingConfiguratorService())), ($this->privates['Pimcore\\Targeting\\Debug\\OverrideHandler'] ?? $this->getOverrideHandlerService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->services['templating'] ?? $this->load('getTemplatingService.php')), ($this->privates['Pimcore\\Http\\Response\\CodeInjector'] ?? $this->getCodeInjectorService()));

        $instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

        return $instance;
    }

    /*
     * Gets the private 'Pimcore\Targeting\Storage\CookieStorage' shared autowired service.
     *
     * @return \Pimcore\Targeting\Storage\CookieStorage
     */
    protected function getCookieStorageService()
    {
        return $this->privates['Pimcore\\Targeting\\Storage\\CookieStorage'] = new \Pimcore\Targeting\Storage\CookieStorage(new \Pimcore\Targeting\Storage\Cookie\JWTCookieSaveHandler('u0fv2NqtI6EqdZBteJbWS8rUvumBUSss', [], NULL, ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService())), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));
    }

    /*
     * Gets the private 'annotations.cached_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader
     */
    protected function getAnnotations_CachedReaderService()
    {
        return $this->privates['annotations.cached_reader'] = new \Doctrine\Common\Annotations\CachedReader(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()), $this->load('getAnnotations_CacheService.php'), false);
    }

    /*
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->privates['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerUniqueLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /*
     * Gets the private 'assets.packages' shared service.
     *
     * @return \Symfony\Component\Asset\Packages
     */
    protected function getAssets_PackagesService()
    {
        return $this->privates['assets.packages'] = new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', new \Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy(), new \Symfony\Component\Asset\Context\RequestStackContext(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), '', false)), []);
    }

    /*
     * Gets the private 'controller_resolver' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver
     */
    protected function getControllerResolverService()
    {
        return $this->privates['controller_resolver'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, ($this->services['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), ($this->privates['.legacy_controller_name_converter'] ?? ($this->privates['.legacy_controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1)), false))));
    }

    /*
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        return $this->privates['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, ($this->services['monolog.logger.php'] ?? $this->getMonolog_Logger_PhpService()), NULL, 0, false, ($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))), false);
    }

    /*
     * Gets the private 'form.registry' shared service.
     *
     * @return \Symfony\Component\Form\FormRegistry
     */
    protected function getForm_RegistryService()
    {
        return $this->privates['form.registry'] = new \Symfony\Component\Form\FormRegistry([0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'Symfony\\Cmf\\Bundle\\RoutingBundle\\Form\\Type\\RouteTypeType' => ['privates', 'cmf_routing.route_type_form_type', 'getCmfRouting_RouteTypeFormTypeService.php', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => ['privates', 'form.type.choice', 'getForm_Type_ChoiceService.php', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => ['services', 'form.type.file', 'getForm_Type_FileService.php', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => ['privates', 'form.type.form', 'getForm_Type_FormService.php', true],
        ], [
            'Symfony\\Cmf\\Bundle\\RoutingBundle\\Form\\Type\\RouteTypeType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => '?',
        ]), ['Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.form.transformation_failure_handling'] ?? $this->load('getForm_TypeExtension_Form_TransformationFailureHandlingService.php'));
            yield 1 => ($this->privates['form.type_extension.form.http_foundation'] ?? $this->load('getForm_TypeExtension_Form_HttpFoundationService.php'));
            yield 2 => ($this->privates['form.type_extension.form.validator'] ?? $this->load('getForm_TypeExtension_Form_ValidatorService.php'));
            yield 3 => ($this->privates['form.type_extension.upload.validator'] ?? $this->load('getForm_TypeExtension_Upload_ValidatorService.php'));
            yield 4 => ($this->privates['form.type_extension.csrf'] ?? $this->load('getForm_TypeExtension_CsrfService.php'));
        }, 5), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.repeated.validator'] ?? ($this->privates['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension()));
        }, 1), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.submit.validator'] ?? ($this->privates['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension()));
        }, 1)], new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_guesser.validator'] ?? $this->load('getForm_TypeGuesser_ValidatorService.php'));
        }, 1))], new \Symfony\Component\Form\ResolvedFormTypeFactory());
    }

    /*
     * Gets the private 'framework_extra_bundle.argument_name_convertor' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter
     */
    protected function getFrameworkExtraBundle_ArgumentNameConvertorService()
    {
        return $this->privates['framework_extra_bundle.argument_name_convertor'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter(($this->privates['argument_metadata_factory'] ?? ($this->privates['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())));
    }

    /*
     * Gets the private 'framework_extra_bundle.event.is_granted' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener
     */
    protected function getFrameworkExtraBundle_Event_IsGrantedService()
    {
        return $this->privates['framework_extra_bundle.event.is_granted'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()));
    }

    /*
     * Gets the private 'locale_aware_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener
     */
    protected function getLocaleAwareListenerService()
    {
        return $this->privates['locale_aware_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener(new RewindableGenerator(function () {
            yield 0 => ($this->privates['translator.default'] ?? $this->getTranslator_DefaultService());
            yield 1 => ($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService());
        }, 2), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListener2Service()
    {
        return $this->privates['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), 'en', ($this->services['router'] ?? $this->getRouterService()));
    }

    /*
     * Gets the private 'monolog.handler.console' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\ConsoleHandler
     */
    protected function getMonolog_Handler_ConsoleService()
    {
        return $this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, [], []);
    }

    /*
     * Gets the private 'monolog.handler.main' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getMonolog_Handler_MainService()
    {
        $this->privates['monolog.handler.main'] = $instance = new \Monolog\Handler\StreamHandler((\dirname(__DIR__, 3).'/logs/prod.log'), 400, true, NULL, false);

        $instance->pushProcessor(($this->privates['monolog.processor.psr_log_message'] ?? ($this->privates['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor())));

        return $instance;
    }

    /*
     * Gets the private 'monolog.logger' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_LoggerService()
    {
        $this->privates['monolog.logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->useMicrosecondTimestamps(true);
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the private 'router_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->privates['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(($this->services['router'] ?? $this->getRouterService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['pimcore.routing.router.request_context'] ?? $this->getPimcore_Routing_Router_RequestContextService()), ($this->services['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), \dirname(__DIR__, 4), false);
    }

    /*
     * Gets the private 'scheb_two_factor.security.authentication.trust_resolver' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\Authentication\AuthenticationTrustResolver
     */
    protected function getSchebTwoFactor_Security_Authentication_TrustResolverService()
    {
        return $this->privates['scheb_two_factor.security.authentication.trust_resolver'] = new \Scheb\TwoFactorBundle\Security\Authentication\AuthenticationTrustResolver(new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver(NULL, NULL));
    }

    /*
     * Gets the private 'scheb_two_factor.trusted_cookie_response_listener' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener
     */
    protected function getSchebTwoFactor_TrustedCookieResponseListenerService($lazyLoad = true)
    {
        if ($lazyLoad) {
            return $this->privates['scheb_two_factor.trusted_cookie_response_listener'] = $this->createProxy('TrustedCookieResponseListener_c7f9b85', function () {
                return \TrustedCookieResponseListener_c7f9b85::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
                    $wrappedInstance = $this->getSchebTwoFactor_TrustedCookieResponseListenerService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/Trusted/TrustedCookieResponseListener.php';

        return new \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener(($this->privates['scheb_two_factor.trusted_token_storage'] ?? $this->getSchebTwoFactor_TrustedTokenStorageService()), 5184000, 'trusted_device', false, 'lax', '/', NULL);
    }

    /*
     * Gets the private 'scheb_two_factor.trusted_token_storage' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage
     */
    protected function getSchebTwoFactor_TrustedTokenStorageService($lazyLoad = true)
    {
        if ($lazyLoad) {
            return $this->privates['scheb_two_factor.trusted_token_storage'] = $this->createProxy('TrustedDeviceTokenStorage_fc7b3c4', function () {
                return \TrustedDeviceTokenStorage_fc7b3c4::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
                    $wrappedInstance = $this->getSchebTwoFactor_TrustedTokenStorageService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/Trusted/TrustedDeviceTokenStorage.php';
        include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/Trusted/JwtTokenEncoder.php';

        return new \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), new \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\JwtTokenEncoder('u0fv2NqtI6EqdZBteJbWS8rUvumBUSss'), 'trusted_device', 5184000);
    }

    /*
     * Gets the private 'security.access.decision_manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AccessDecisionManager
     */
    protected function getSecurity_Access_DecisionManagerService()
    {
        return $this->privates['security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.access.authenticated_voter'] ?? $this->load('getSecurity_Access_AuthenticatedVoterService.php'));
            yield 1 => ($this->privates['scheb_two_factor.security.access.authenticated_voter'] ?? ($this->privates['scheb_two_factor.security.access.authenticated_voter'] = new \Scheb\TwoFactorBundle\Security\Authorization\Voter\TwoFactorInProgressVoter()));
            yield 2 => ($this->privates['security.access.role_hierarchy_voter'] ?? $this->load('getSecurity_Access_RoleHierarchyVoterService.php'));
            yield 3 => ($this->privates['security.access.expression_voter'] ?? $this->load('getSecurity_Access_ExpressionVoterService.php'));
        }, 4), 'affirmative', false, true);
    }

    /*
     * Gets the private 'security.authentication.manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $this->privates['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.authentication.provider.dao.admin_webdav.two_factor_decorator'] ?? $this->load('getSecurity_Authentication_Provider_Dao_AdminWebdav_TwoFactorDecoratorService.php'));
            yield 1 => ($this->privates['security.authentication.provider.guard.admin.two_factor_decorator'] ?? $this->load('getSecurity_Authentication_Provider_Guard_Admin_TwoFactorDecoratorService.php'));
            yield 2 => ($this->privates['security.authentication.provider.two_factor.admin'] ?? $this->load('getSecurity_Authentication_Provider_TwoFactor_AdminService.php'));
            yield 3 => ($this->privates['security.authentication.provider.anonymous.admin.two_factor_decorator'] ?? $this->load('getSecurity_Authentication_Provider_Anonymous_Admin_TwoFactorDecoratorService.php'));
            yield 4 => ($this->privates['security.authentication.provider.guard.webservice.two_factor_decorator'] ?? $this->load('getSecurity_Authentication_Provider_Guard_Webservice_TwoFactorDecoratorService.php'));
        }, 5), true);

        $instance->setEventDispatcher(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));

        return $instance;
    }

    /*
     * Gets the private 'security.firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\EventListener\FirewallListener
     */
    protected function getSecurity_FirewallService()
    {
        return $this->privates['security.firewall'] = new \Symfony\Bundle\SecurityBundle\EventListener\FirewallListener(($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()));
    }

    /*
     * Gets the private 'security.firewall.map' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallMap
     */
    protected function getSecurity_Firewall_MapService()
    {
        return $this->privates['security.firewall.map'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallMap(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'security.firewall.map.context.admin' => ['privates', 'security.firewall.map.context.admin', 'getSecurity_Firewall_Map_Context_AdminService.php', true],
            'security.firewall.map.context.admin_webdav' => ['privates', 'security.firewall.map.context.admin_webdav', 'getSecurity_Firewall_Map_Context_AdminWebdavService.php', true],
            'security.firewall.map.context.dev' => ['privates', 'security.firewall.map.context.dev', 'getSecurity_Firewall_Map_Context_DevService.php', true],
            'security.firewall.map.context.webservice' => ['privates', 'security.firewall.map.context.webservice', 'getSecurity_Firewall_Map_Context_WebserviceService.php', true],
        ], [
            'security.firewall.map.context.admin' => '?',
            'security.firewall.map.context.admin_webdav' => '?',
            'security.firewall.map.context.dev' => '?',
            'security.firewall.map.context.webservice' => '?',
        ]), new RewindableGenerator(function () {
            yield 'security.firewall.map.context.dev' => ($this->privates['.security.request_matcher.Iy.T22O'] ?? ($this->privates['.security.request_matcher.Iy.T22O'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/(_(profiler|wdt)|css|images|js)/')));
            yield 'security.firewall.map.context.admin_webdav' => ($this->privates['.security.request_matcher.gpN4paB'] ?? ($this->privates['.security.request_matcher.gpN4paB'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin/asset/webdav')));
            yield 'security.firewall.map.context.admin' => ($this->privates['.security.request_matcher.2aAPAae'] ?? ($this->privates['.security.request_matcher.2aAPAae'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin(/.*)?$')));
            yield 'security.firewall.map.context.webservice' => ($this->privates['.security.request_matcher.GF7t1LM'] ?? ($this->privates['.security.request_matcher.GF7t1LM'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/webservice(/.*)?$')));
        }, 4));
    }

    /*
     * Gets the private 'security.logout_url_generator' shared service.
     *
     * @return \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        $this->privates['security.logout_url_generator'] = $instance = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['router'] ?? $this->getRouterService()), ($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));

        $instance->registerListener('admin', '/admin/logout', 'logout', '_csrf_token', NULL, NULL);

        return $instance;
    }

    /*
     * Gets the private 'security.role_hierarchy' shared service.
     *
     * @return \Symfony\Component\Security\Core\Role\RoleHierarchy
     */
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->privates['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy($this->parameters['security.role_hierarchy.roles']);
    }

    /*
     * Gets the private 'sensio_framework_extra.controller.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->privates['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
    }

    /*
     * Gets the private 'sensio_framework_extra.converter.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        $a = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();

        $b = new \Pimcore\Bundle\CoreBundle\Request\ParamConverter\DataObjectParamConverter();

        $a->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter(($this->services['doctrine'] ?? $this->getDoctrineService()), new \Symfony\Component\ExpressionLanguage\ExpressionLanguage()), 0, 'doctrine.orm');
        $a->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter(), 0, 'datetime');
        $a->add($b, -2, 'data_object_converter');
        $a->add($b, 0, NULL);

        return $this->privates['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($a, true);
    }

    /*
     * Gets the private 'sensio_framework_extra.security.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener
     */
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        return $this->privates['sensio_framework_extra.security.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), new \Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage(), ($this->privates['scheb_two_factor.security.authentication.trust_resolver'] ?? $this->getSchebTwoFactor_Security_Authentication_TrustResolverService()), ($this->privates['security.role_hierarchy'] ?? $this->getSecurity_RoleHierarchyService()), ($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
    }

    /*
     * Gets the private 'sensio_framework_extra.view.listener' shared service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\LegacyTemplateListener
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        $this->privates['sensio_framework_extra.view.listener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\LegacyTemplateListener(($this->services['sensio_framework_extra.view.guesser'] ?? $this->getSensioFrameworkExtra_View_GuesserService()));

        $instance->setContainer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'twig' => ['services', 'twig', 'getTwigService.php', true],
        ], [
            'twig' => 'Twig\\Environment',
        ]))->withContext('sensio_framework_extra.view.listener', $this));
        $instance->setTemplateEngine(($this->services['templating'] ?? $this->load('getTemplatingService.php')));

        return $instance;
    }

    /*
     * Gets the private 'translator.default' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    protected function getTranslator_DefaultService()
    {
        $this->privates['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'translation.loader.csv' => ['privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService.php', true],
            'translation.loader.dat' => ['privates', 'translation.loader.dat', 'getTranslation_Loader_DatService.php', true],
            'translation.loader.ini' => ['privates', 'translation.loader.ini', 'getTranslation_Loader_IniService.php', true],
            'translation.loader.json' => ['privates', 'translation.loader.json', 'getTranslation_Loader_JsonService.php', true],
            'translation.loader.mo' => ['privates', 'translation.loader.mo', 'getTranslation_Loader_MoService.php', true],
            'translation.loader.php' => ['privates', 'translation.loader.php', 'getTranslation_Loader_PhpService.php', true],
            'translation.loader.po' => ['privates', 'translation.loader.po', 'getTranslation_Loader_PoService.php', true],
            'translation.loader.qt' => ['privates', 'translation.loader.qt', 'getTranslation_Loader_QtService.php', true],
            'translation.loader.res' => ['privates', 'translation.loader.res', 'getTranslation_Loader_ResService.php', true],
            'translation.loader.xliff' => ['privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService.php', true],
            'translation.loader.yml' => ['privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService.php', true],
        ], [
            'translation.loader.csv' => '?',
            'translation.loader.dat' => '?',
            'translation.loader.ini' => '?',
            'translation.loader.json' => '?',
            'translation.loader.mo' => '?',
            'translation.loader.php' => '?',
            'translation.loader.po' => '?',
            'translation.loader.qt' => '?',
            'translation.loader.res' => '?',
            'translation.loader.xliff' => '?',
            'translation.loader.yml' => '?',
        ]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'en', ['translation.loader.php' => [0 => 'php'], 'translation.loader.yml' => [0 => 'yaml', 1 => 'yml'], 'translation.loader.xliff' => [0 => 'xlf', 1 => 'xliff'], 'translation.loader.po' => [0 => 'po'], 'translation.loader.mo' => [0 => 'mo'], 'translation.loader.qt' => [0 => 'ts'], 'translation.loader.csv' => [0 => 'csv'], 'translation.loader.res' => [0 => 'res'], 'translation.loader.dat' => [0 => 'dat'], 'translation.loader.ini' => [0 => 'ini'], 'translation.loader.json' => [0 => 'json']], ['cache_dir' => ($this->targetDir.''.'/translations'), 'debug' => false, 'resource_files' => ['af' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.af.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.af.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.af.xlf')], 'ar' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ar.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ar.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ar.xlf')], 'az' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.az.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.az.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.az.xlf')], 'be' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.be.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.be.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.be.xlf')], 'bg' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.bg.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.bg.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.bg.xlf')], 'bs' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.bs.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.bs.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.bs.xlf')], 'ca' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ca.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ca.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ca.xlf')], 'cs' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cs.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.cs.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.cs.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.cs.yml')], 'cy' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cy.xlf')], 'da' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.da.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.da.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.da.xlf')], 'de' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.de.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.de.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.de.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.de.yml')], 'el' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.el.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.el.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.el.xlf')], 'en' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.en.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.en.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.en.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.en.yml')], 'es' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.es.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.es.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.es.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.es.yml')], 'et' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.et.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.et.xlf')], 'eu' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.eu.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.eu.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.eu.xlf')], 'fa' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fa.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fa.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.fa.xlf')], 'fi' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fi.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fi.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.fi.xlf')], 'fr' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fr.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fr.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.fr.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.fr.yml')], 'gl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.gl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.gl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.gl.xlf')], 'he' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.he.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.he.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.he.xlf')], 'hr' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hr.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hr.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.hr.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.hr.yml')], 'hu' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hu.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hu.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.hu.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.hu.yml')], 'hy' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hy.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hy.xlf')], 'id' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.id.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.id.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.id.xlf')], 'it' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.it.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.it.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.it.xlf')], 'ja' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ja.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ja.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ja.xlf')], 'lb' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lb.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lb.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lb.xlf')], 'lt' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lt.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lt.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lt.xlf')], 'lv' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lv.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lv.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lv.xlf')], 'mn' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.mn.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.mn.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.mn.xlf')], 'nb' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nb.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nb.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.nb.xlf')], 'nl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.nl.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.nl.yml')], 'nn' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nn.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nn.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.nn.xlf')], 'no' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.no.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.no.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.no.xlf')], 'pl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pl.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.pl.yml')], 'pt' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pt.xlf')], 'pt_BR' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt_BR.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt_BR.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pt_BR.xlf')], 'ro' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ro.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ro.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ro.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.ro.yml')], 'ru' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ru.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ru.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ru.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.ru.yml')], 'sk' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sk.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sk.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sk.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.sk.yml')], 'sl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sl.xlf')], 'sq' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sq.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sq.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sq.xlf')], 'sr_Cyrl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Cyrl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Cyrl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sr_Cyrl.xlf')], 'sr_Latn' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Latn.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Latn.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sr_Latn.xlf')], 'sv' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sv.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sv.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sv.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.sv.yml')], 'th' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.th.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.th.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.th.xlf')], 'tl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.tl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.tl.xlf')], 'tr' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tr.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.tr.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.tr.xlf')], 'uk' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.uk.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.uk.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.uk.xlf'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations/messages.uk.yml')], 'vi' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.vi.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.vi.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.vi.xlf')], 'zh_CN' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_CN.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.zh_CN.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.zh_CN.xlf')], 'zh_TW' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_TW.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.zh_TW.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.zh_TW.xlf')], 'extended' => [0 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/cs.extended.json'), 1 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/de.extended.json'), 2 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/en.extended.json'), 3 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/es.extended.json'), 4 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/fr.extended.json'), 5 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/it.extended.json'), 6 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/nl.extended.json'), 7 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/pl.extended.json'), 8 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/sk.extended.json'), 9 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations/th.extended.json')]], 'scanned_directories' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations'), 3 => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/translations'), 4 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations'), 5 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/translations'), 6 => (\dirname(__DIR__, 4).'/app/Resources/FrameworkBundle/translations'), 7 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/translations'), 8 => (\dirname(__DIR__, 4).'/app/Resources/SecurityBundle/translations'), 9 => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/translations'), 10 => (\dirname(__DIR__, 4).'/app/Resources/TwigBundle/translations'), 11 => (\dirname(__DIR__, 4).'/vendor/symfony/monolog-bundle/translations'), 12 => (\dirname(__DIR__, 4).'/app/Resources/MonologBundle/translations'), 13 => (\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/translations'), 14 => (\dirname(__DIR__, 4).'/app/Resources/SwiftmailerBundle/translations'), 15 => (\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/translations'), 16 => (\dirname(__DIR__, 4).'/app/Resources/DoctrineBundle/translations'), 17 => (\dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/translations'), 18 => (\dirname(__DIR__, 4).'/app/Resources/SensioFrameworkExtraBundle/translations'), 19 => (\dirname(__DIR__, 4).'/vendor/symfony-cmf/routing-bundle/src/translations'), 20 => (\dirname(__DIR__, 4).'/app/Resources/CmfRoutingBundle/translations'), 21 => (\dirname(__DIR__, 4).'/vendor/presta/sitemap-bundle/translations'), 22 => (\dirname(__DIR__, 4).'/app/Resources/PrestaSitemapBundle/translations'), 23 => (\dirname(__DIR__, 4).'/app/Resources/SchebTwoFactorBundle/translations'), 24 => (\dirname(__DIR__, 4).'/vendor/friendsofsymfony/jsrouting-bundle/translations'), 25 => (\dirname(__DIR__, 4).'/app/Resources/FOSJsRoutingBundle/translations'), 26 => (\dirname(__DIR__, 4).'/app/Resources/PimcoreCoreBundle/translations'), 27 => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/translations'), 28 => (\dirname(__DIR__, 4).'/app/Resources/PimcoreAdminBundle/translations'), 29 => (\dirname(__DIR__, 4).'/src/AppBundle/translations'), 30 => (\dirname(__DIR__, 4).'/app/Resources/AppBundle/translations'), 31 => (\dirname(__DIR__, 4).'/translations'), 32 => (\dirname(__DIR__, 4).'/app/Resources/translations')], 'cache_vary' => ['scanned_directories' => [0 => 'vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations', 1 => 'vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations', 2 => 'vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations', 3 => 'vendor/scheb/two-factor-bundle/Resources/translations', 4 => 'vendor/pimcore/pimcore/bundles/CoreBundle/Resources/translations', 5 => 'vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/translations', 6 => 'app/Resources/FrameworkBundle/translations', 7 => 'vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/translations', 8 => 'app/Resources/SecurityBundle/translations', 9 => 'vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/translations', 10 => 'app/Resources/TwigBundle/translations', 11 => 'vendor/symfony/monolog-bundle/translations', 12 => 'app/Resources/MonologBundle/translations', 13 => 'vendor/symfony/swiftmailer-bundle/translations', 14 => 'app/Resources/SwiftmailerBundle/translations', 15 => 'vendor/doctrine/doctrine-bundle/translations', 16 => 'app/Resources/DoctrineBundle/translations', 17 => 'vendor/sensio/framework-extra-bundle/src/translations', 18 => 'app/Resources/SensioFrameworkExtraBundle/translations', 19 => 'vendor/symfony-cmf/routing-bundle/src/translations', 20 => 'app/Resources/CmfRoutingBundle/translations', 21 => 'vendor/presta/sitemap-bundle/translations', 22 => 'app/Resources/PrestaSitemapBundle/translations', 23 => 'app/Resources/SchebTwoFactorBundle/translations', 24 => 'vendor/friendsofsymfony/jsrouting-bundle/translations', 25 => 'app/Resources/FOSJsRoutingBundle/translations', 26 => 'app/Resources/PimcoreCoreBundle/translations', 27 => 'vendor/pimcore/pimcore/bundles/AdminBundle/translations', 28 => 'app/Resources/PimcoreAdminBundle/translations', 29 => 'src/AppBundle/translations', 30 => 'app/Resources/AppBundle/translations', 31 => 'translations', 32 => 'app/Resources/translations']]]);

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? ($this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory())));
        $instance->setFallbackLocales([0 => 'en']);

        return $instance;
    }

    /*
     * Gets the public 'pimcore.rest_client' alias.
     *
     * @return object The "Pimcore\Tool\RestClient" service.
     */
    protected function getPimcore_RestClientService()
    {
        @trigger_error('The "pimcore.rest_client" service alias is deprecated. You should stop using it, as it will be removed in the future.', E_USER_DEPRECATED);

        return $this->get('Pimcore\\Tool\\RestClient');
    }

    /*
     * Gets the public 'pimcore.implementation_loader.document.tag' alias.
     *
     * @return object The "Pimcore\Model\Document\Editable\Loader\EditableLoader" service.
     */
    protected function getPimcore_ImplementationLoader_Document_TagService()
    {
        @trigger_error('The "pimcore.implementation_loader.document.tag" service is deprecated. Use "Pimcore\\Model\\Document\\Editable\\Loader\\EditableLoader" instead', E_USER_DEPRECATED);

        return $this->get('Pimcore\\Model\\Document\\Editable\\Loader\\EditableLoader');
    }

    /*
     * Gets the public 'pimcore.document.tag.block_state_stack' alias.
     *
     * @return object The "Pimcore\Document\Editable\Block\BlockStateStack" service.
     */
    protected function getPimcore_Document_Tag_BlockStateStackService()
    {
        @trigger_error('The "pimcore.document.tag.block_state_stack" service is deprecated. Use "Pimcore\\Document\\Editable\\Block\\BlockStateStack" instead', E_USER_DEPRECATED);

        return $this->get('Pimcore\\Document\\Editable\\Block\\BlockStateStack');
    }

    /*
     * Gets the public 'pimcore.document.tag.handler' alias.
     *
     * @return object The "Pimcore\Document\Editable\DelegatingEditableHandler" service.
     */
    protected function getPimcore_Document_Tag_HandlerService()
    {
        @trigger_error('The "pimcore.document.tag.handler" service is deprecated. Use "Pimcore\\Document\\Editable\\DelegatingEditableHandler" instead', E_USER_DEPRECATED);

        return $this->get('Pimcore\\Document\\Editable\\DelegatingEditableHandler');
    }

    /*
     * Gets the public 'Pimcore\Document\Tag\TagUsageResolver' alias.
     *
     * @return object The "Pimcore\Document\Editable\EditableUsageResolver" service.
     */
    protected function getTagUsageResolverService()
    {
        @trigger_error('The "Pimcore\\Document\\Tag\\TagUsageResolver" service is deprecated. Use "Pimcore\\Document\\Editable\\EditableUsageResolver" instead', E_USER_DEPRECATED);

        return $this->get('Pimcore\\Document\\Editable\\EditableUsageResolver');
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return $this->buildParameters[$name];
        }

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name): bool
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return true;
        }

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value): void
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag(): ParameterBagInterface
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            foreach ($this->buildParameters as $name => $value) {
                $parameters[$name] = $value;
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [
        'kernel.cache_dir' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'serializer.mapping.cache.file' => false,
    ];
    private $dynamicParameters = [];

    private function getDynamicParameter(string $name)
    {
        switch ($name) {
            case 'kernel.cache_dir': $value = $this->targetDir.''; break;
            case 'session.save_path': $value = ($this->targetDir.''.'/sessions'); break;
            case 'validator.mapping.cache.file': $value = ($this->targetDir.''.'/validation.php'); break;
            case 'serializer.mapping.cache.file': $value = ($this->targetDir.''.'/serialization.php'); break;
            default: throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
        }
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    protected function getDefaultParameters(): array
    {
        return [
            'kernel.root_dir' => (\dirname(__DIR__, 4).'/app'),
            'kernel.project_dir' => \dirname(__DIR__, 4),
            'kernel.environment' => 'prod',
            'kernel.debug' => false,
            'kernel.name' => 'app',
            'kernel.logs_dir' => (\dirname(__DIR__, 3).'/logs'),
            'kernel.bundles' => [
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'CmfRoutingBundle' => 'Symfony\\Cmf\\Bundle\\RoutingBundle\\CmfRoutingBundle',
                'PrestaSitemapBundle' => 'Presta\\SitemapBundle\\PrestaSitemapBundle',
                'SchebTwoFactorBundle' => 'Scheb\\TwoFactorBundle\\SchebTwoFactorBundle',
                'FOSJsRoutingBundle' => 'FOS\\JsRoutingBundle\\FOSJsRoutingBundle',
                'PimcoreCoreBundle' => 'Pimcore\\Bundle\\CoreBundle\\PimcoreCoreBundle',
                'PimcoreAdminBundle' => 'Pimcore\\Bundle\\AdminBundle\\PimcoreAdminBundle',
                'AppBundle' => 'AppBundle\\AppBundle',
            ],
            'kernel.bundles_metadata' => [
                'FrameworkBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle'),
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ],
                'SecurityBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle'),
                    'namespace' => 'Symfony\\Bundle\\SecurityBundle',
                ],
                'TwigBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle'),
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ],
                'MonologBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/monolog-bundle'),
                    'namespace' => 'Symfony\\Bundle\\MonologBundle',
                ],
                'SwiftmailerBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle'),
                    'namespace' => 'Symfony\\Bundle\\SwiftmailerBundle',
                ],
                'DoctrineBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\DoctrineBundle',
                ],
                'SensioFrameworkExtraBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src'),
                    'namespace' => 'Sensio\\Bundle\\FrameworkExtraBundle',
                ],
                'CmfRoutingBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony-cmf/routing-bundle/src'),
                    'namespace' => 'Symfony\\Cmf\\Bundle\\RoutingBundle',
                ],
                'PrestaSitemapBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/presta/sitemap-bundle'),
                    'namespace' => 'Presta\\SitemapBundle',
                ],
                'SchebTwoFactorBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle'),
                    'namespace' => 'Scheb\\TwoFactorBundle',
                ],
                'FOSJsRoutingBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/friendsofsymfony/jsrouting-bundle'),
                    'namespace' => 'FOS\\JsRoutingBundle',
                ],
                'PimcoreCoreBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle'),
                    'namespace' => 'Pimcore\\Bundle\\CoreBundle',
                ],
                'PimcoreAdminBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle'),
                    'namespace' => 'Pimcore\\Bundle\\AdminBundle',
                ],
                'AppBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/src/AppBundle'),
                    'namespace' => 'AppBundle',
                ],
            ],
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appAppKernelProdContainer',
            'locale' => 'en',
            'secret' => 'u0fv2NqtI6EqdZBteJbWS8rUvumBUSss',
            'event_dispatcher.event_aliases' => [
                'Symfony\\Component\\Console\\Event\\ConsoleCommandEvent' => 'console.command',
                'Symfony\\Component\\Console\\Event\\ConsoleErrorEvent' => 'console.error',
                'Symfony\\Component\\Console\\Event\\ConsoleTerminateEvent' => 'console.terminate',
                'Symfony\\Component\\Form\\Event\\PreSubmitEvent' => 'form.pre_submit',
                'Symfony\\Component\\Form\\Event\\SubmitEvent' => 'form.submit',
                'Symfony\\Component\\Form\\Event\\PostSubmitEvent' => 'form.post_submit',
                'Symfony\\Component\\Form\\Event\\PreSetDataEvent' => 'form.pre_set_data',
                'Symfony\\Component\\Form\\Event\\PostSetDataEvent' => 'form.post_set_data',
                'Symfony\\Component\\HttpKernel\\Event\\ControllerArgumentsEvent' => 'kernel.controller_arguments',
                'Symfony\\Component\\HttpKernel\\Event\\ControllerEvent' => 'kernel.controller',
                'Symfony\\Component\\HttpKernel\\Event\\ResponseEvent' => 'kernel.response',
                'Symfony\\Component\\HttpKernel\\Event\\FinishRequestEvent' => 'kernel.finish_request',
                'Symfony\\Component\\HttpKernel\\Event\\RequestEvent' => 'kernel.request',
                'Symfony\\Component\\HttpKernel\\Event\\ViewEvent' => 'kernel.view',
                'Symfony\\Component\\HttpKernel\\Event\\ExceptionEvent' => 'kernel.exception',
                'Symfony\\Component\\HttpKernel\\Event\\TerminateEvent' => 'kernel.terminate',
                'Symfony\\Component\\Workflow\\Event\\GuardEvent' => 'workflow.guard',
                'Symfony\\Component\\Workflow\\Event\\LeaveEvent' => 'workflow.leave',
                'Symfony\\Component\\Workflow\\Event\\TransitionEvent' => 'workflow.transition',
                'Symfony\\Component\\Workflow\\Event\\EnterEvent' => 'workflow.enter',
                'Symfony\\Component\\Workflow\\Event\\EnteredEvent' => 'workflow.entered',
                'Symfony\\Component\\Workflow\\Event\\CompletedEvent' => 'workflow.completed',
                'Symfony\\Component\\Workflow\\Event\\AnnounceEvent' => 'workflow.announce',
                'Symfony\\Component\\Security\\Core\\Event\\AuthenticationSuccessEvent' => 'security.authentication.success',
                'Symfony\\Component\\Security\\Core\\Event\\AuthenticationFailureEvent' => 'security.authentication.failure',
                'Symfony\\Component\\Security\\Http\\Event\\InteractiveLoginEvent' => 'security.interactive_login',
                'Symfony\\Component\\Security\\Http\\Event\\SwitchUserEvent' => 'security.switch_user',
            ],
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.path' => '/_fragment',
            'kernel.secret' => 'u0fv2NqtI6EqdZBteJbWS8rUvumBUSss',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => [

            ],
            'kernel.default_locale' => 'en',
            'kernel.error_controller' => 'error_controller',
            'templating.helper.code.file_link_format' => NULL,
            'debug.file_link_format' => NULL,
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => [
                'cache_limiter' => '0',
                'cookie_httponly' => true,
                'gc_probability' => 1,
            ],
            'session.metadata.update_threshold' => 0,
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'asset.request_context.base_path' => '',
            'asset.request_context.secure' => false,
            'templating.loader.cache.path' => NULL,
            'templating.engines' => [
                0 => 'php',
                1 => 'twig',
            ],
            'templating.helper.form.resources' => [
                0 => 'FrameworkBundle:Form',
            ],
            'validator.translation_domain' => 'validators',
            'translator.logging' => false,
            'translator.default_path' => (\dirname(__DIR__, 4).'/translations'),
            'data_collector.templates' => [

            ],
            'debug.error_handler.throw_at' => 0,
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => (\dirname(__DIR__, 4).'/app/config/routing.yml'),
            'router.cache_class_prefix' => 'appAppKernelProdContainer',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'security.authentication.trust_resolver.anonymous_class' => NULL,
            'security.authentication.trust_resolver.rememberme_class' => NULL,
            'security.role_hierarchy.roles' => [
                'ROLE_PIMCORE_ADMIN' => [
                    0 => 'ROLE_PIMCORE_USER',
                ],
            ],
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'twig.exception_listener.controller' => 'twig.controller.exception::showAction',
            'twig.form.resources' => [
                0 => 'form_div_layout.html.twig',
            ],
            'twig.default_path' => (\dirname(__DIR__, 4).'/templates'),
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => [

            ],
            'monolog.handlers_to_channels' => [
                'monolog.handler.console' => NULL,
                'monolog.handler.main' => NULL,
            ],
            'swiftmailer.mailer.pimcore_mailer.transport.name' => 'smtp',
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.encryption' => NULL,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.port' => 25,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.host' => 'localhost',
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.username' => NULL,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.password' => NULL,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.auth_mode' => NULL,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.timeout' => 30,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.source_ip' => NULL,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.local_domain' => NULL,
            'swiftmailer.mailer.pimcore_mailer.transport.smtp.stream_options' => [

            ],
            'swiftmailer.mailer.pimcore_mailer.spool.enabled' => false,
            'swiftmailer.mailer.pimcore_mailer.plugin.impersonate' => NULL,
            'swiftmailer.mailer.pimcore_mailer.single_address' => NULL,
            'swiftmailer.mailer.pimcore_mailer.delivery.enabled' => true,
            'swiftmailer.spool.enabled' => false,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => [
                'pimcore_mailer' => 'swiftmailer.mailer.pimcore_mailer',
            ],
            'swiftmailer.default_mailer' => 'pimcore_mailer',
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => [

            ],
            'doctrine.default_entity_manager' => '',
            'doctrine.dbal.connection_factory.types' => [

            ],
            'doctrine.connections' => [
                'default' => 'doctrine.dbal.default_connection',
            ],
            'doctrine.default_connection' => 'default',
            'cmf_routing.uri_filter_regexp' => '',
            'cmf_routing.default_controller' => NULL,
            'cmf_routing.generic_controller' => NULL,
            'cmf_routing.controllers_by_type' => [

            ],
            'cmf_routing.controllers_by_class' => [

            ],
            'cmf_routing.templates_by_class' => [

            ],
            'cmf_routing.route_collection_limit' => 0,
            'cmf_routing.dynamic.limit_candidates' => 20,
            'cmf_routing.dynamic.locales' => [

            ],
            'cmf_routing.dynamic.auto_locale_pattern' => false,
            'cmf_routing.replace_symfony_router' => true,
            'presta_sitemap.generator.class' => 'Presta\\SitemapBundle\\Service\\Generator',
            'presta_sitemap.dumper.class' => 'Presta\\SitemapBundle\\Service\\Dumper',
            'presta_sitemap.routing_loader.class' => 'Presta\\SitemapBundle\\Routing\\SitemapRoutingLoader',
            'presta_sitemap.dump_command.class' => 'Presta\\SitemapBundle\\Command\\DumpSitemapsCommand',
            'presta_sitemap.dump_directory' => 'web',
            'presta_sitemap.timetolive' => 3600,
            'presta_sitemap.sitemap_file_prefix' => 'sitemap',
            'presta_sitemap.items_by_set' => 50000,
            'presta_sitemap.defaults' => [
                'lastmod' => NULL,
                'priority' => NULL,
                'changefreq' => NULL,
            ],
            'presta_sitemap.default_section' => 'default',
            'presta_sitemap.eventlistener.route_annotation.class' => 'Presta\\SitemapBundle\\EventListener\\RouteAnnotationEventListener',
            'scheb_two_factor.model_manager_name' => NULL,
            'scheb_two_factor.email.sender_email' => 'no-reply@example.com',
            'scheb_two_factor.email.sender_name' => NULL,
            'scheb_two_factor.email.template' => '@SchebTwoFactor/Authentication/form.html.twig',
            'scheb_two_factor.email.digits' => 4,
            'scheb_two_factor.google.server_name' => 'Pimcore',
            'scheb_two_factor.google.issuer' => 'Pimcore 2 Factor Authentication',
            'scheb_two_factor.google.template' => '@SchebTwoFactor/Authentication/form.html.twig',
            'scheb_two_factor.google.digits' => 6,
            'scheb_two_factor.trusted_device.enabled' => false,
            'scheb_two_factor.trusted_device.cookie_name' => 'trusted_device',
            'scheb_two_factor.trusted_device.lifetime' => 5184000,
            'scheb_two_factor.trusted_device.extend_lifetime' => false,
            'scheb_two_factor.trusted_device.cookie_secure' => false,
            'scheb_two_factor.trusted_device.cookie_same_site' => 'lax',
            'scheb_two_factor.trusted_device.cookie_domain' => NULL,
            'scheb_two_factor.trusted_device.cookie_path' => '/',
            'scheb_two_factor.security_tokens' => [
                0 => 'Pimcore\\Bundle\\AdminBundle\\Security\\Authentication\\Token\\TwoFactorRequiredToken',
            ],
            'scheb_two_factor.ip_whitelist' => [

            ],
            'fos_js_routing.extractor.class' => 'FOS\\JsRoutingBundle\\Extractor\\ExposedRoutesExtractor',
            'fos_js_routing.controller.class' => 'FOS\\JsRoutingBundle\\Controller\\Controller',
            'fos_js_routing.normalizer.route_collection.class' => 'FOS\\JsRoutingBundle\\Serializer\\Normalizer\\RouteCollectionNormalizer',
            'fos_js_routing.normalizer.routes_response.class' => 'FOS\\JsRoutingBundle\\Serializer\\Normalizer\\RoutesResponseNormalizer',
            'fos_js_routing.denormalizer.route_collection.class' => 'FOS\\JsRoutingBundle\\Serializer\\Denormalizer\\RouteCollectionDenormalizer',
            'fos_js_routing.request_context_base_url' => NULL,
            'fos_js_routing.cache_control' => [
                'enabled' => false,
            ],
            'container.dumper.inline_class_loader' => true,
            'pimcore.extensions.bundles.search_paths' => [
                0 => 'src',
                1 => 'vendor/pimcore/pimcore/bundles',
            ],
            'pimcore.extensions.bundles.handle_composer' => true,
            'pimcore.admin.unauthenticated_routes' => [
                0 => [
                    'route' => 'pimcore_settings_display_custom_logo',
                    'path' => false,
                    'host' => false,
                    'methods' => [

                    ],
                ],
                1 => [
                    'route' => 'pimcore_admin_login',
                    'path' => false,
                    'host' => false,
                    'methods' => [

                    ],
                ],
                2 => [
                    'route' => 'pimcore_admin_webdav',
                    'path' => false,
                    'host' => false,
                    'methods' => [

                    ],
                ],
            ],
            'pimcore.encryption.secret' => NULL,
            'pimcore.admin.session.attribute_bags' => [
                'pimcore_admin' => [
                    'storage_key' => '_pimcore_admin',
                ],
                'pimcore_objects' => [
                    'storage_key' => '_pimcore_objects',
                ],
                'pimcore_copy' => [
                    'storage_key' => '_pimcore_copy',
                ],
                'pimcore_gridconfig' => [
                    'storage_key' => '_pimcore_gridconfig',
                ],
                'pimcore_importconfig' => [
                    'storage_key' => '_pimcore_importconfig',
                ],
            ],
            'pimcore.admin.translations.path' => '@PimcoreCoreBundle/Resources/translations',
            'pimcore.translations.admin_translation_mapping' => [

            ],
            'pimcore.web_profiler.toolbar.excluded_routes' => [
                0 => [
                    'path' => '^/admin/asset/image-editor',
                    'route' => false,
                    'host' => false,
                    'methods' => [

                    ],
                ],
            ],
            'pimcore.response_exception_listener.render_error_document' => true,
            'pimcore.mime.extensions' => [
                'ez' => 'application/andrew-inset',
                'atom' => 'application/atom+xml',
                'jar' => 'application/java-archive',
                'hqx' => 'application/mac-binhex40',
                'cpt' => 'application/mac-compactpro',
                'mathml' => 'application/mathml+xml',
                'doc' => 'application/msword',
                'dat' => 'application/octet-stream',
                'oda' => 'application/oda',
                'ogg' => 'application/ogg',
                'pdf' => 'application/pdf',
                'ai' => 'application/ai',
                'eps' => 'application/postscript',
                'ps' => 'application/postscript',
                'rdf' => 'application/rdf+xml',
                'rss' => 'application/rss+xml',
                'smi' => 'application/smil',
                'smil' => 'application/smil',
                'gram' => 'application/srgs',
                'grxml' => 'application/srgs+xml',
                'kml' => 'application/vnd.google-earth.kml+xml',
                'kmz' => 'application/vnd.google-earth.kmz',
                'mif' => 'application/vnd.mif',
                'xul' => 'application/vnd.mozilla.xul+xml',
                'xls' => 'application/vnd.ms-excel',
                'xlb' => 'application/vnd.ms-excel',
                'xlt' => 'application/vnd.ms-excel',
                'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
                'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
                'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
                'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
                'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
                'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
                'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
                'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
                'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
                'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
                'ppt' => 'application/vnd.ms-powerpoint',
                'pps' => 'application/vnd.ms-powerpoint',
                'odc' => 'application/vnd.oasis.opendocument.chart',
                'odb' => 'application/vnd.oasis.opendocument.database',
                'odf' => 'application/vnd.oasis.opendocument.formula',
                'odg' => 'application/vnd.oasis.opendocument.graphics',
                'otg' => 'application/vnd.oasis.opendocument.graphics-template',
                'odi' => 'application/vnd.oasis.opendocument.image',
                'odp' => 'application/vnd.oasis.opendocument.presentation',
                'otp' => 'application/vnd.oasis.opendocument.presentation-template',
                'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
                'ots' => 'application/vnd.oasis.opendocument.spreadsheet-template',
                'odt' => 'application/vnd.oasis.opendocument.text',
                'odm' => 'application/vnd.oasis.opendocument.text-master',
                'ott' => 'application/vnd.oasis.opendocument.text-template',
                'oth' => 'application/vnd.oasis.opendocument.text-web',
                'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
                'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
                'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
                'vsd' => 'application/vnd.visio',
                'wbxml' => 'application/vnd.wap.wbxml',
                'wmlc' => 'application/vnd.wap.wmlc',
                'wmlsc' => 'application/vnd.wap.wmlscriptc',
                'vxml' => 'application/voicexml+xml',
                'bcpio' => 'application/x-bcpio',
                'vcd' => 'application/x-cdlink',
                'pgn' => 'application/x-chess-pgn',
                'cpio' => 'application/x-cpio',
                'csh' => 'application/x-csh',
                'dcr' => 'application/x-director',
                'dir' => 'application/x-director',
                'dxr' => 'application/x-director',
                'dxf' => 'application/x-autocad',
                'dvi' => 'application/x-dvi',
                'spl' => 'application/x-futuresplash',
                'tgz' => 'application/x-gtar',
                'gtar' => 'application/x-gtar',
                'hdf' => 'application/x-hdf',
                'js' => 'application/x-javascript',
                'skp' => 'application/x-koan',
                'skd' => 'application/x-koan',
                'skt' => 'application/x-koan',
                'skm' => 'application/x-koan',
                'latex' => 'application/x-latex',
                'nc' => 'application/x-netcdf',
                'cdf' => 'application/x-netcdf',
                'sh' => 'application/x-sh',
                'shar' => 'application/x-shar',
                'swf' => 'application/x-shockwave-flash',
                'sit' => 'application/x-stuffit',
                'sv4cpio' => 'application/x-sv4cpio',
                'sv4crc' => 'application/x-sv4crc',
                'tar' => 'application/x-tar',
                'tcl' => 'application/x-tcl',
                'tex' => 'application/x-tex',
                'texinfo' => 'application/x-texinfo',
                'texi' => 'application/x-texinfo',
                't' => 'application/x-troff',
                'tr' => 'application/x-troff',
                'roff' => 'application/x-troff',
                'man' => 'application/x-troff-man',
                'me' => 'application/x-troff-me',
                'ms' => 'application/x-troff-ms',
                'ustar' => 'application/x-ustar',
                'src' => 'application/x-wais-source',
                'xhtml' => 'application/xhtml+xml',
                'xht' => 'application/xhtml+xml',
                'xslt' => 'application/xslt+xml',
                'xml' => 'application/xml',
                'xsl' => 'application/xml',
                'dtd' => 'application/xml-dtd',
                'zip' => 'application/zip',
                'au' => 'audio/basic',
                'snd' => 'audio/basic',
                'mid' => 'audio/midi',
                'midi' => 'audio/midi',
                'kar' => 'audio/midi',
                'mpga' => 'audio/mpeg',
                'mp2' => 'audio/mpeg',
                'mp3' => 'audio/mpeg',
                'aif' => 'audio/x-aiff',
                'aiff' => 'audio/x-aiff',
                'aifc' => 'audio/x-aiff',
                'm3u' => 'audio/x-mpegurl',
                'wma' => 'audio/x-ms-wma',
                'wax' => 'audio/x-ms-wax',
                'ram' => 'audio/x-pn-realaudio',
                'ra' => 'audio/x-pn-realaudio',
                'rm' => 'application/vnd.rn-realmedia',
                'wav' => 'audio/x-wav',
                'pdb' => 'chemical/x-pdb',
                'xyz' => 'chemical/x-xyz',
                'bmp' => 'image/bmp',
                'cgm' => 'image/cgm',
                'gif' => 'image/gif',
                'ief' => 'image/ief',
                'pjpeg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'jpe' => 'image/jpeg',
                'png' => 'image/png',
                'webp' => 'image/webp',
                'svg' => 'image/svg+xml',
                'tiff' => 'image/tiff',
                'tif' => 'image/tiff',
                'djvu' => 'image/vnd.djvu',
                'djv' => 'image/vnd.djvu',
                'wbmp' => 'image/vnd.wap.wbmp',
                'ras' => 'image/x-cmu-raster',
                'ico' => 'image/x-icon',
                'pnm' => 'image/x-portable-anymap',
                'pbm' => 'image/x-portable-bitmap',
                'pgm' => 'image/x-portable-graymap',
                'ppm' => 'image/x-portable-pixmap',
                'rgb' => 'image/x-rgb',
                'xbm' => 'image/x-xbitmap',
                'psd' => 'image/x-photoshop',
                'psb' => 'image/psb',
                'xpm' => 'image/x-xpixmap',
                'xwd' => 'image/x-xwindowdump',
                'eml' => 'message/rfc822',
                'igs' => 'model/iges',
                'iges' => 'model/iges',
                'msh' => 'model/mesh',
                'mesh' => 'model/mesh',
                'silo' => 'model/mesh',
                'wrl' => 'model/vrml',
                'vrml' => 'model/vrml',
                'ics' => 'text/calendar',
                'ifb' => 'text/calendar',
                'css' => 'text/css',
                'csv' => 'text/csv',
                'html' => 'text/html',
                'htm' => 'text/html',
                'txt' => 'text/plain',
                'asc' => 'text/plain',
                'rtx' => 'text/richtext',
                'rtf' => 'text/rtf',
                'sgml' => 'text/sgml',
                'sgm' => 'text/sgml',
                'tsv' => 'text/tab-separated-values',
                'wml' => 'text/vnd.wap.wml',
                'wmls' => 'text/vnd.wap.wmlscript',
                'etx' => 'text/x-setext',
                'mpeg' => 'video/mpeg',
                'mpg' => 'video/mpeg',
                'mpe' => 'video/mpeg',
                'qt' => 'video/quicktime',
                'mov' => 'video/quicktime',
                'mxu' => 'video/vnd.mpegurl',
                'm4u' => 'video/vnd.mpegurl',
                'flv' => 'video/x-flv',
                'f4v' => 'video/mp4',
                'mp4' => 'video/mp4',
                'asf' => 'video/x-ms-asf',
                'asx' => 'video/x-ms-asf',
                'wmv' => 'video/x-ms-wmv',
                'wm' => 'video/x-ms-wm',
                'wmx' => 'video/x-ms-wmx',
                'avi' => 'video/x-msvideo',
                'ogv' => 'video/ogg',
                'movie' => 'video/x-sgi-movie',
                'ice' => 'x-conference/x-cooltalk',
            ],
            'pimcore.maintenance.housekeeping.cleanup_tmp_files_atime_older_than' => 7776000,
            'pimcore.maintenance.housekeeping.cleanup_profiler_files_atime_older_than' => 1800,
            'pimcore.config' => [
                'web_profiler' => [
                    'toolbar' => [
                        'excluded_routes' => [
                            0 => [
                                'path' => '^/admin/asset/image-editor',
                                'route' => false,
                                'host' => false,
                                'methods' => [

                                ],
                            ],
                        ],
                    ],
                ],
                'security' => [
                    'encoder_factories' => [
                        'Pimcore\\Bundle\\AdminBundle\\Security\\User\\User' => [
                            'id' => 'pimcore_admin.security.password_encoder_factory',
                        ],
                    ],
                ],
                'error_handling' => [
                    'render_error_document' => true,
                ],
                'bundles' => [
                    'search_paths' => [
                        0 => 'src',
                        1 => 'vendor/pimcore/pimcore/bundles',
                    ],
                    'handle_composer' => true,
                ],
                'assets' => [
                    'metadata' => [
                        'class_definitions' => [
                            'data' => [
                                'map' => [
                                    'asset' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\Asset',
                                    'checkbox' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\Checkbox',
                                    'date' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\Date',
                                    'document' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\Document',
                                    'input' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\Input',
                                    'object' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\DataObject',
                                    'select' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\Select',
                                    'textarea' => '\\Pimcore\\Model\\Asset\\MetaData\\ClassDefinition\\Data\\Textarea',
                                ],
                                'prefixes' => [

                                ],
                            ],
                        ],
                    ],
                    'preview_image_thumbnail' => NULL,
                    'default_upload_path' => '_default_upload_bucket',
                    'tree_paging_limit' => 100,
                    'image' => [
                        'low_quality_image_preview' => [
                            'enabled' => true,
                            'generator' => NULL,
                        ],
                        'focal_point_detection' => [
                            'enabled' => true,
                        ],
                        'thumbnails' => [
                            'webp_auto_support' => true,
                            'clip_auto_support' => true,
                            'auto_clear_temp_files' => true,
                        ],
                    ],
                    'video' => [
                        'thumbnails' => [
                            'auto_clear_temp_files' => true,
                        ],
                    ],
                    'versions' => [
                        'days' => NULL,
                        'steps' => NULL,
                        'use_hardlinks' => true,
                        'disable_stack_trace' => false,
                    ],
                    'icc_rgb_profile' => NULL,
                    'icc_cmyk_profile' => NULL,
                    'hide_edit_image' => false,
                    'disable_tree_preview' => true,
                ],
                'objects' => [
                    'class_definitions' => [
                        'data' => [
                            'map' => [
                                'block' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Block',
                                'calculatedValue' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\CalculatedValue',
                                'checkbox' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Checkbox',
                                'classificationstore' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Classificationstore',
                                'consent' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Consent',
                                'country' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Country',
                                'countrymultiselect' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Countrymultiselect',
                                'date' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Date',
                                'datetime' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Datetime',
                                'email' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Email',
                                'encryptedField' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\EncryptedField',
                                'externalImage' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ExternalImage',
                                'fieldcollections' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Fieldcollections',
                                'firstname' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Firstname',
                                'gender' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Gender',
                                'geobounds' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Geobounds',
                                'geopoint' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Geopoint',
                                'geopolygon' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Geopolygon',
                                'geopolyline' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Geopolyline',
                                'hotspotimage' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Hotspotimage',
                                'manyToOneRelation' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ManyToOneRelation',
                                'image' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Image',
                                'imageGallery' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ImageGallery',
                                'input' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Input',
                                'language' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Language',
                                'languagemultiselect' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Languagemultiselect',
                                'lastname' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Lastname',
                                'link' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Link',
                                'localizedfields' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Localizedfields',
                                'manyToManyRelation' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ManyToManyRelation',
                                'advancedManyToManyRelation' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\AdvancedManyToManyRelation',
                                'multiselect' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Multiselect',
                                'newsletterActive' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\NewsletterActive',
                                'reverseManyToManyObjectRelation' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ReverseManyToManyObjectRelation',
                                'urlSlug' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\UrlSlug',
                                'numeric' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Numeric',
                                'objectbricks' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Objectbricks',
                                'manyToManyObjectRelation' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ManyToManyObjectRelation',
                                'advancedManyToManyObjectRelation' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\AdvancedManyToManyObjectRelation',
                                'password' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Password',
                                'rgbaColor' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\RgbaColor',
                                'targetGroup' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\TargetGroup',
                                'targetGroupMultiselect' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\TargetGroupMultiselect',
                                'quantityValue' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\QuantityValue',
                                'inputQuantityValue' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\InputQuantityValue',
                                'select' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Select',
                                'slider' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Slider',
                                'structuredTable' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\StructuredTable',
                                'table' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Table',
                                'textarea' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Textarea',
                                'time' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Time',
                                'user' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\User',
                                'video' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Video',
                                'wysiwyg' => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Wysiwyg',
                            ],
                            'prefixes' => [
                                0 => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\',
                                1 => '\\Object_Class_Data_',
                            ],
                        ],
                        'layout' => [
                            'prefixes' => [
                                0 => '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Layout\\',
                                1 => '\\Object_Class_Layout_',
                            ],
                            'map' => [

                            ],
                        ],
                    ],
                    'tree_paging_limit' => 30,
                ],
                'documents' => [
                    'editables' => [
                        'map' => [
                            'href' => '\\Pimcore\\Model\\Document\\Editable\\Relation',
                            'multihref' => '\\Pimcore\\Model\\Document\\Editable\\Relations',
                        ],
                        'prefixes' => [
                            0 => '\\Pimcore\\Model\\Document\\Editable\\',
                        ],
                        'naming_strategy' => 'nested',
                    ],
                    'tags' => [
                        'map' => [
                            'href' => '\\Pimcore\\Model\\Document\\Tag\\Relation',
                            'multihref' => '\\Pimcore\\Model\\Document\\Tag\\Relations',
                        ],
                        'prefixes' => [
                            0 => '\\Pimcore\\Model\\Document\\Tag\\',
                            1 => '\\Document_Tag_',
                        ],
                    ],
                    'create_redirect_when_moved' => false,
                    'allow_trailing_slash' => 'no',
                    'generate_preview' => false,
                    'tree_paging_limit' => 50,
                    'areas' => [
                        'autoload' => true,
                    ],
                    'newsletter' => [
                        'defaultUrlPrefix' => NULL,
                    ],
                    'web_to_print' => [
                        'pdf_creation_php_memory_limit' => '2048M',
                    ],
                ],
                'newsletter' => [
                    'source_adapters' => [
                        'defaultAdapter' => 'pimcore.document.newsletter.factory.default',
                        'csvList' => 'pimcore.document.newsletter.factory.csv',
                        'reportAdapter' => 'pimcore.document.newsletter.factory.report',
                    ],
                    'method' => NULL,
                ],
                'custom_report' => [
                    'adapters' => [
                        'sql' => 'pimcore.custom_report.adapter.factory.sql',
                        'analytics' => 'pimcore.custom_report.adapter.factory.analytics',
                    ],
                ],
                'targeting' => [
                    'data_providers' => [
                        'device' => 'Pimcore\\Targeting\\DataProvider\\Device',
                        'geoip' => 'Pimcore\\Targeting\\DataProvider\\GeoIp',
                        'geolocation' => 'Pimcore\\Targeting\\DataProvider\\GeoLocation',
                        'piwik' => 'Pimcore\\Targeting\\DataProvider\\Piwik',
                        'targeting_storage' => 'Pimcore\\Targeting\\DataProvider\\TargetingStorage',
                        'visited_pages_counter' => 'Pimcore\\Targeting\\DataProvider\\VisitedPagesCounter',
                    ],
                    'conditions' => [
                        'browser' => 'Pimcore\\Targeting\\Condition\\Browser',
                        'country' => 'Pimcore\\Targeting\\Condition\\Country',
                        'geopoint' => 'Pimcore\\Targeting\\Condition\\GeoPoint',
                        'hardwareplatform' => 'Pimcore\\Targeting\\Condition\\HardwarePlatform',
                        'language' => 'Pimcore\\Targeting\\Condition\\Language',
                        'operatingsystem' => 'Pimcore\\Targeting\\Condition\\OperatingSystem',
                        'referringsite' => 'Pimcore\\Targeting\\Condition\\ReferringSite',
                        'searchengine' => 'Pimcore\\Targeting\\Condition\\SearchEngine',
                        'target_group' => 'Pimcore\\Targeting\\Condition\\TargetGroup',
                        'timeonsite' => 'Pimcore\\Targeting\\Condition\\TimeOnSite',
                        'url' => 'Pimcore\\Targeting\\Condition\\Url',
                        'visitedpagebefore' => 'Pimcore\\Targeting\\Condition\\Piwik\\VisitedPageBefore',
                        'visitedpagesbefore' => 'Pimcore\\Targeting\\Condition\\VisitedPagesBefore',
                    ],
                    'action_handlers' => [
                        'assign_target_group' => 'Pimcore\\Targeting\\ActionHandler\\AssignTargetGroup',
                        'codesnippet' => 'Pimcore\\Targeting\\ActionHandler\\CodeSnippet',
                        'redirect' => 'Pimcore\\Targeting\\ActionHandler\\Redirect',
                    ],
                    'enabled' => true,
                    'storage_id' => 'Pimcore\\Targeting\\Storage\\CookieStorage',
                    'session' => [
                        'enabled' => false,
                    ],
                ],
                'context' => [
                    'profiler' => [
                        'routes' => [
                            0 => [
                                'path' => '^/_(profiler|wdt)(/.*)?$',
                                'route' => false,
                                'host' => false,
                                'methods' => [

                                ],
                            ],
                        ],
                    ],
                    'admin' => [
                        'routes' => [
                            0 => [
                                'path' => '^/admin(/.*)?$',
                                'route' => false,
                                'host' => false,
                                'methods' => [

                                ],
                            ],
                            1 => [
                                'route' => '^pimcore_admin_',
                                'path' => false,
                                'host' => false,
                                'methods' => [

                                ],
                            ],
                        ],
                    ],
                    'webservice' => [
                        'routes' => [
                            0 => [
                                'path' => '^/webservice(/.*)?$',
                                'route' => false,
                                'host' => false,
                                'methods' => [

                                ],
                            ],
                            1 => [
                                'route' => '^pimcore_webservice',
                                'path' => false,
                                'host' => false,
                                'methods' => [

                                ],
                            ],
                        ],
                    ],
                    'plugin' => [
                        'routes' => [
                            0 => [
                                'path' => '^/plugin(/.*)?$',
                                'route' => false,
                                'host' => false,
                                'methods' => [

                                ],
                            ],
                        ],
                    ],
                ],
                'admin' => [
                    'session' => [
                        'attribute_bags' => [
                            'pimcore_admin' => [
                                'storage_key' => '_pimcore_admin',
                            ],
                            'pimcore_objects' => [
                                'storage_key' => '_pimcore_objects',
                            ],
                            'pimcore_copy' => [
                                'storage_key' => '_pimcore_copy',
                            ],
                            'pimcore_gridconfig' => [
                                'storage_key' => '_pimcore_gridconfig',
                            ],
                            'pimcore_importconfig' => [
                                'storage_key' => '_pimcore_importconfig',
                            ],
                        ],
                    ],
                    'unauthenticated_routes' => [
                        0 => [
                            'route' => 'pimcore_settings_display_custom_logo',
                            'path' => false,
                            'host' => false,
                            'methods' => [

                            ],
                        ],
                        1 => [
                            'route' => 'pimcore_admin_login',
                            'path' => false,
                            'host' => false,
                            'methods' => [

                            ],
                        ],
                        2 => [
                            'route' => 'pimcore_admin_webdav',
                            'path' => false,
                            'host' => false,
                            'methods' => [

                            ],
                        ],
                    ],
                    'translations' => [
                        'path' => '@PimcoreCoreBundle/Resources/translations',
                    ],
                ],
                'migrations' => [
                    'sets' => [
                        'app' => [
                            'name' => 'Migrations',
                            'namespace' => 'App\\Migrations',
                            'directory' => (\dirname(__DIR__, 4).'/app/Migrations'),
                            'connection' => NULL,
                        ],
                        'pimcore_core' => [
                            'name' => 'Pimcore Core Migrations',
                            'namespace' => 'Pimcore\\Bundle\\CoreBundle\\Migrations',
                            'directory' => (\dirname(__DIR__, 4).'/app/../vendor/pimcore/pimcore/bundles/CoreBundle/Migrations'),
                            'connection' => NULL,
                        ],
                    ],
                ],
                'sitemaps' => [
                    'generators' => [
                        'pimcore_documents' => [
                            'enabled' => true,
                            'priority' => 100,
                            'generator_id' => 'Pimcore\\Sitemap\\Document\\DocumentTreeGenerator',
                        ],
                    ],
                ],
                'mime' => [
                    'extensions' => [
                        'ez' => 'application/andrew-inset',
                        'atom' => 'application/atom+xml',
                        'jar' => 'application/java-archive',
                        'hqx' => 'application/mac-binhex40',
                        'cpt' => 'application/mac-compactpro',
                        'mathml' => 'application/mathml+xml',
                        'doc' => 'application/msword',
                        'dat' => 'application/octet-stream',
                        'oda' => 'application/oda',
                        'ogg' => 'application/ogg',
                        'pdf' => 'application/pdf',
                        'ai' => 'application/ai',
                        'eps' => 'application/postscript',
                        'ps' => 'application/postscript',
                        'rdf' => 'application/rdf+xml',
                        'rss' => 'application/rss+xml',
                        'smi' => 'application/smil',
                        'smil' => 'application/smil',
                        'gram' => 'application/srgs',
                        'grxml' => 'application/srgs+xml',
                        'kml' => 'application/vnd.google-earth.kml+xml',
                        'kmz' => 'application/vnd.google-earth.kmz',
                        'mif' => 'application/vnd.mif',
                        'xul' => 'application/vnd.mozilla.xul+xml',
                        'xls' => 'application/vnd.ms-excel',
                        'xlb' => 'application/vnd.ms-excel',
                        'xlt' => 'application/vnd.ms-excel',
                        'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
                        'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
                        'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
                        'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
                        'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
                        'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
                        'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
                        'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
                        'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
                        'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
                        'ppt' => 'application/vnd.ms-powerpoint',
                        'pps' => 'application/vnd.ms-powerpoint',
                        'odc' => 'application/vnd.oasis.opendocument.chart',
                        'odb' => 'application/vnd.oasis.opendocument.database',
                        'odf' => 'application/vnd.oasis.opendocument.formula',
                        'odg' => 'application/vnd.oasis.opendocument.graphics',
                        'otg' => 'application/vnd.oasis.opendocument.graphics-template',
                        'odi' => 'application/vnd.oasis.opendocument.image',
                        'odp' => 'application/vnd.oasis.opendocument.presentation',
                        'otp' => 'application/vnd.oasis.opendocument.presentation-template',
                        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
                        'ots' => 'application/vnd.oasis.opendocument.spreadsheet-template',
                        'odt' => 'application/vnd.oasis.opendocument.text',
                        'odm' => 'application/vnd.oasis.opendocument.text-master',
                        'ott' => 'application/vnd.oasis.opendocument.text-template',
                        'oth' => 'application/vnd.oasis.opendocument.text-web',
                        'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
                        'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
                        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
                        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
                        'vsd' => 'application/vnd.visio',
                        'wbxml' => 'application/vnd.wap.wbxml',
                        'wmlc' => 'application/vnd.wap.wmlc',
                        'wmlsc' => 'application/vnd.wap.wmlscriptc',
                        'vxml' => 'application/voicexml+xml',
                        'bcpio' => 'application/x-bcpio',
                        'vcd' => 'application/x-cdlink',
                        'pgn' => 'application/x-chess-pgn',
                        'cpio' => 'application/x-cpio',
                        'csh' => 'application/x-csh',
                        'dcr' => 'application/x-director',
                        'dir' => 'application/x-director',
                        'dxr' => 'application/x-director',
                        'dxf' => 'application/x-autocad',
                        'dvi' => 'application/x-dvi',
                        'spl' => 'application/x-futuresplash',
                        'tgz' => 'application/x-gtar',
                        'gtar' => 'application/x-gtar',
                        'hdf' => 'application/x-hdf',
                        'js' => 'application/x-javascript',
                        'skp' => 'application/x-koan',
                        'skd' => 'application/x-koan',
                        'skt' => 'application/x-koan',
                        'skm' => 'application/x-koan',
                        'latex' => 'application/x-latex',
                        'nc' => 'application/x-netcdf',
                        'cdf' => 'application/x-netcdf',
                        'sh' => 'application/x-sh',
                        'shar' => 'application/x-shar',
                        'swf' => 'application/x-shockwave-flash',
                        'sit' => 'application/x-stuffit',
                        'sv4cpio' => 'application/x-sv4cpio',
                        'sv4crc' => 'application/x-sv4crc',
                        'tar' => 'application/x-tar',
                        'tcl' => 'application/x-tcl',
                        'tex' => 'application/x-tex',
                        'texinfo' => 'application/x-texinfo',
                        'texi' => 'application/x-texinfo',
                        't' => 'application/x-troff',
                        'tr' => 'application/x-troff',
                        'roff' => 'application/x-troff',
                        'man' => 'application/x-troff-man',
                        'me' => 'application/x-troff-me',
                        'ms' => 'application/x-troff-ms',
                        'ustar' => 'application/x-ustar',
                        'src' => 'application/x-wais-source',
                        'xhtml' => 'application/xhtml+xml',
                        'xht' => 'application/xhtml+xml',
                        'xslt' => 'application/xslt+xml',
                        'xml' => 'application/xml',
                        'xsl' => 'application/xml',
                        'dtd' => 'application/xml-dtd',
                        'zip' => 'application/zip',
                        'au' => 'audio/basic',
                        'snd' => 'audio/basic',
                        'mid' => 'audio/midi',
                        'midi' => 'audio/midi',
                        'kar' => 'audio/midi',
                        'mpga' => 'audio/mpeg',
                        'mp2' => 'audio/mpeg',
                        'mp3' => 'audio/mpeg',
                        'aif' => 'audio/x-aiff',
                        'aiff' => 'audio/x-aiff',
                        'aifc' => 'audio/x-aiff',
                        'm3u' => 'audio/x-mpegurl',
                        'wma' => 'audio/x-ms-wma',
                        'wax' => 'audio/x-ms-wax',
                        'ram' => 'audio/x-pn-realaudio',
                        'ra' => 'audio/x-pn-realaudio',
                        'rm' => 'application/vnd.rn-realmedia',
                        'wav' => 'audio/x-wav',
                        'pdb' => 'chemical/x-pdb',
                        'xyz' => 'chemical/x-xyz',
                        'bmp' => 'image/bmp',
                        'cgm' => 'image/cgm',
                        'gif' => 'image/gif',
                        'ief' => 'image/ief',
                        'pjpeg' => 'image/jpeg',
                        'jpeg' => 'image/jpeg',
                        'jpg' => 'image/jpeg',
                        'jpe' => 'image/jpeg',
                        'png' => 'image/png',
                        'webp' => 'image/webp',
                        'svg' => 'image/svg+xml',
                        'tiff' => 'image/tiff',
                        'tif' => 'image/tiff',
                        'djvu' => 'image/vnd.djvu',
                        'djv' => 'image/vnd.djvu',
                        'wbmp' => 'image/vnd.wap.wbmp',
                        'ras' => 'image/x-cmu-raster',
                        'ico' => 'image/x-icon',
                        'pnm' => 'image/x-portable-anymap',
                        'pbm' => 'image/x-portable-bitmap',
                        'pgm' => 'image/x-portable-graymap',
                        'ppm' => 'image/x-portable-pixmap',
                        'rgb' => 'image/x-rgb',
                        'xbm' => 'image/x-xbitmap',
                        'psd' => 'image/x-photoshop',
                        'psb' => 'image/psb',
                        'xpm' => 'image/x-xpixmap',
                        'xwd' => 'image/x-xwindowdump',
                        'eml' => 'message/rfc822',
                        'igs' => 'model/iges',
                        'iges' => 'model/iges',
                        'msh' => 'model/mesh',
                        'mesh' => 'model/mesh',
                        'silo' => 'model/mesh',
                        'wrl' => 'model/vrml',
                        'vrml' => 'model/vrml',
                        'ics' => 'text/calendar',
                        'ifb' => 'text/calendar',
                        'css' => 'text/css',
                        'csv' => 'text/csv',
                        'html' => 'text/html',
                        'htm' => 'text/html',
                        'txt' => 'text/plain',
                        'asc' => 'text/plain',
                        'rtx' => 'text/richtext',
                        'rtf' => 'text/rtf',
                        'sgml' => 'text/sgml',
                        'sgm' => 'text/sgml',
                        'tsv' => 'text/tab-separated-values',
                        'wml' => 'text/vnd.wap.wml',
                        'wmls' => 'text/vnd.wap.wmlscript',
                        'etx' => 'text/x-setext',
                        'mpeg' => 'video/mpeg',
                        'mpg' => 'video/mpeg',
                        'mpe' => 'video/mpeg',
                        'qt' => 'video/quicktime',
                        'mov' => 'video/quicktime',
                        'mxu' => 'video/vnd.mpegurl',
                        'm4u' => 'video/vnd.mpegurl',
                        'flv' => 'video/x-flv',
                        'f4v' => 'video/mp4',
                        'mp4' => 'video/mp4',
                        'asf' => 'video/x-ms-asf',
                        'asx' => 'video/x-ms-asf',
                        'wmv' => 'video/x-ms-wmv',
                        'wm' => 'video/x-ms-wm',
                        'wmx' => 'video/x-ms-wmx',
                        'avi' => 'video/x-msvideo',
                        'ogv' => 'video/ogg',
                        'movie' => 'video/x-sgi-movie',
                        'ice' => 'x-conference/x-cooltalk',
                    ],
                ],
                'flags' => [

                ],
                'translations' => [
                    'case_insensitive' => false,
                    'admin_translation_mapping' => [

                    ],
                    'debugging' => [
                        'enabled' => true,
                        'parameter' => 'pimcore_debug_translations',
                    ],
                    'data_object' => [

                    ],
                ],
                'maps' => [
                    'tile_layer_url_template' => 'https://a.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    'geocoding_url_template' => 'https://nominatim.openstreetmap.org/search?q={q}&addressdetails=1&format=json&limit=1',
                    'reverse_geocoding_url_template' => 'https://nominatim.openstreetmap.org/reverse?format=json&lat={lat}&lon={lon}&addressdetails=1',
                ],
                'general' => [
                    'timezone' => 'Europe/Berlin',
                    'path_variable' => NULL,
                    'domain' => NULL,
                    'redirect_to_maindomain' => false,
                    'language' => 'en',
                    'valid_languages' => 'en',
                    'fallback_languages' => [

                    ],
                    'default_language' => 'en',
                    'disable_usage_statistics' => false,
                    'debug_admin_translations' => false,
                    'instance_identifier' => NULL,
                    'show_cookie_notice' => false,
                ],
                'maintenance' => [
                    'housekeeping' => [
                        'cleanup_tmp_files_atime_older_than' => 7776000,
                        'cleanup_profiler_files_atime_older_than' => 1800,
                    ],
                ],
                'webservice' => [
                    'enabled' => false,
                ],
                'encryption' => [
                    'secret' => NULL,
                ],
                'models' => [
                    'class_overrides' => [

                    ],
                ],
                'routing' => [
                    'defaults' => [
                        'bundle' => 'AppBundle',
                        'controller' => 'Default',
                        'action' => 'default',
                    ],
                    'static' => [
                        'locale_params' => [

                        ],
                    ],
                ],
                'full_page_cache' => [
                    'enabled' => true,
                    'lifetime' => NULL,
                ],
                'cache' => [
                    'pool_service_id' => NULL,
                    'default_lifetime' => 2419200,
                    'pools' => [
                        'doctrine' => [
                            'enabled' => true,
                            'connection' => 'default',
                        ],
                        'redis' => [
                            'enabled' => false,
                        ],
                    ],
                ],
                'email' => [
                    'method' => NULL,
                ],
                'workflows' => [

                ],
                'httpclient' => [
                    'adapter' => 'Socket',
                    'proxy_host' => NULL,
                    'proxy_port' => NULL,
                    'proxy_user' => NULL,
                    'proxy_pass' => NULL,
                ],
                'applicationlog' => [
                    'archive_treshold' => '',
                    'archive_alternative_database' => '',
                ],
            ],
            'pimcore.routing.defaults' => [
                'bundle' => 'AppBundle',
                'controller' => 'Default',
                'action' => 'default',
            ],
            'pimcore.routing.static.locale_params' => [

            ],
            'pimcore.cache.core.default_lifetime' => 2419200,
            'pimcore.targeting.enabled' => true,
            'pimcore.targeting.conditions' => [
                'browser' => 'Pimcore\\Targeting\\Condition\\Browser',
                'country' => 'Pimcore\\Targeting\\Condition\\Country',
                'geopoint' => 'Pimcore\\Targeting\\Condition\\GeoPoint',
                'hardwareplatform' => 'Pimcore\\Targeting\\Condition\\HardwarePlatform',
                'language' => 'Pimcore\\Targeting\\Condition\\Language',
                'operatingsystem' => 'Pimcore\\Targeting\\Condition\\OperatingSystem',
                'referringsite' => 'Pimcore\\Targeting\\Condition\\ReferringSite',
                'searchengine' => 'Pimcore\\Targeting\\Condition\\SearchEngine',
                'target_group' => 'Pimcore\\Targeting\\Condition\\TargetGroup',
                'timeonsite' => 'Pimcore\\Targeting\\Condition\\TimeOnSite',
                'url' => 'Pimcore\\Targeting\\Condition\\Url',
                'visitedpagebefore' => 'Pimcore\\Targeting\\Condition\\Piwik\\VisitedPageBefore',
                'visitedpagesbefore' => 'Pimcore\\Targeting\\Condition\\VisitedPagesBefore',
            ],
            'pimcore.geoip.db_file' => NULL,
            'pimcore.workflow' => [

            ],
            'pimcore.gdpr-data-extrator.dataobjects' => [
                'classes' => [

                ],
            ],
            'pimcore.gdpr-data-extrator.assets' => [
                'types' => [

                ],
            ],
            'pimcore_admin.dataObjects.notes_events.types' => [
                0 => '',
                1 => 'content',
                2 => 'seo',
                3 => 'warning',
                4 => 'notice',
            ],
            'pimcore_admin.assets.notes_events.types' => [
                0 => '',
                1 => 'content',
                2 => 'seo',
                3 => 'warning',
                4 => 'notice',
            ],
            'pimcore_admin.documents.notes_events.types' => [
                0 => '',
                1 => 'content',
                2 => 'seo',
                3 => 'warning',
                4 => 'notice',
            ],
            'pimcore_admin.csrf_protection.excluded_routes' => [

            ],
            'pimcore_admin.admin_languages' => [

            ],
            'pimcore_admin.custom_admin_path_identifier' => NULL,
            'pimcore_admin.config' => [
                'gdpr_data_extractor' => [
                    'dataObjects' => [
                        'classes' => [

                        ],
                    ],
                    'assets' => [
                        'types' => [

                        ],
                    ],
                ],
                'objects' => [
                    'notes_events' => [
                        'types' => [
                            0 => '',
                            1 => 'content',
                            2 => 'seo',
                            3 => 'warning',
                            4 => 'notice',
                        ],
                    ],
                ],
                'assets' => [
                    'notes_events' => [
                        'types' => [
                            0 => '',
                            1 => 'content',
                            2 => 'seo',
                            3 => 'warning',
                            4 => 'notice',
                        ],
                    ],
                ],
                'documents' => [
                    'notes_events' => [
                        'types' => [
                            0 => '',
                            1 => 'content',
                            2 => 'seo',
                            3 => 'warning',
                            4 => 'notice',
                        ],
                    ],
                ],
                'admin_languages' => [

                ],
                'csrf_protection' => [
                    'excluded_routes' => [

                    ],
                ],
                'custom_admin_path_identifier' => NULL,
                'branding' => [
                    'login_screen_invert_colors' => false,
                    'color_login_screen' => NULL,
                    'color_admin_interface' => NULL,
                    'login_screen_custom_image' => NULL,
                ],
            ],
            'pimcore.service_controllers' => [
                'AppBundle\\Controller\\DefaultController' => 'AppBundle\\Controller\\DefaultController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Asset\\AssetHelperController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Asset\\AssetHelperController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\ClassController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\ClassController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\ClassificationstoreController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\ClassificationstoreController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectHelperController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectHelperController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\QuantityValueController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\QuantityValueController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\VariantsController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\VariantsController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\EmailController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\EmailController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\FolderController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\FolderController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\HardlinkController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\HardlinkController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\LinkController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\LinkController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\NewsletterController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\NewsletterController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintcontainerController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintcontainerController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintpageController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintpageController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintpageControllerBase' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PrintpageControllerBase',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\RenderletController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\RenderletController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\ElementController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\ElementController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\ElementControllerBase' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\ElementControllerBase',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\EmailController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\EmailController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\AdminerController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\AdminerController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\LinfoController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\LinfoController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\OpcacheController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\External\\OpcacheController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\IndexController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\IndexController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\InstallController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\InstallController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\LogController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\LogController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\LoginController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\LoginController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\MiscController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\MiscController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\NotificationController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\NotificationController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\PortalController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\PortalController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\RecyclebinController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\RecyclebinController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\RedirectsController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\RedirectsController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\SettingsController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\SettingsController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TagsController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TagsController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TargetingController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TargetingController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TranslationController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\TranslationController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\UserController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\UserController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\WorkflowController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\WorkflowController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\ExtensionManager\\ExtensionManagerController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\ExtensionManager\\ExtensionManagerController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\AdminController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\AdminController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\AssetController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\AssetController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\DataObjectController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\DataObjectController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\PimcoreUsersController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\PimcoreUsersController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\SentMailController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\SentMailController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\AnalyticsController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\AnalyticsController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\CustomReportController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\CustomReportController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\PiwikController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\PiwikController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\QrcodeController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\QrcodeController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\ReportsControllerBase' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\ReportsControllerBase',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\SettingsController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Reports\\SettingsController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\ClassController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\ClassController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\AssetController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\AssetController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\DataObjectController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\DataObjectController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\DocumentController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\DocumentController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\TagController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Element\\TagController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Helper' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\Helper',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\ImageController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\ImageController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\InfoController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Rest\\InfoController',
                'Pimcore\\Bundle\\AdminBundle\\Controller\\Searchadmin\\SearchController' => 'Pimcore\\Bundle\\AdminBundle\\Controller\\Searchadmin\\SearchController',
                'Pimcore\\Bundle\\CoreBundle\\Controller\\PublicServicesController' => 'Pimcore\\Bundle\\CoreBundle\\Controller\\PublicServicesController',
            ],
            'doctrine_migrations.dir_name' => (\dirname(__DIR__, 4).'/app/DoctrineMigrations'),
            'doctrine_migrations.namespace' => 'Application\\Migrations',
            'doctrine_migrations.table_name' => 'migration_versions',
            'doctrine_migrations.name' => 'Application Migrations',
            'doctrine_migrations.custom_template' => NULL,
            'doctrine_migrations.organize_migrations' => false,
            'console.command.ids' => [
                0 => 'console.command.public_alias.doctrine_cache.contains_command',
                1 => 'console.command.public_alias.doctrine_cache.delete_command',
                2 => 'console.command.public_alias.doctrine_cache.flush_command',
                3 => 'console.command.public_alias.doctrine_cache.stats_command',
                4 => 'console.command.public_alias.Pimcore\\Migrations\\Command\\ExecuteCommand',
                5 => 'console.command.public_alias.Pimcore\\Migrations\\Command\\GenerateCommand',
                6 => 'console.command.public_alias.Pimcore\\Migrations\\Command\\LatestCommand',
                7 => 'console.command.public_alias.Pimcore\\Migrations\\Command\\MarkAllDoneCommand',
                8 => 'console.command.public_alias.Pimcore\\Migrations\\Command\\MigrateCommand',
                9 => 'console.command.public_alias.Pimcore\\Migrations\\Command\\StatusCommand',
                10 => 'console.command.public_alias.Pimcore\\Migrations\\Command\\VersionCommand',
                11 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Bundle\\ListCommand',
                12 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\CacheWarmingCommand',
                13 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\ClassCommand',
                14 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\CustomLayoutCommand',
                15 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\FieldCollectionCommand',
                16 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Definition\\Import\\ObjectBrickCommand',
                17 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\DeleteClassificationStoreCommand',
                18 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\DeleteUnusedLocaleDataCommand',
                19 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Document\\GeneratePagePreviews',
                20 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Document\\MigrateTagNamingStrategyCommand',
                21 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\EmailLogsCleanupCommand',
                22 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\InternalModelDaoMappingGeneratorCommand',
                23 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\InternalUnicodeCldrLanguageTerritoryGeneratorCommand',
                24 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\InternalVideoConverterCommand',
                25 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\LowQualityImagePreviewCommand',
                26 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\MaintenanceModeCommand',
                27 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\MysqlToolsCommand',
                28 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\RequirementsCheckCommand',
                29 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ResetPasswordCommand',
                30 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\RunScriptCommand',
                31 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\SearchBackendReindexCommand',
                32 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ThumbnailsClearCommand',
                33 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ThumbnailsImageCommand',
                34 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\ThumbnailsVideoCommand',
                35 => 'console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\Web2PrintPdfCreationCommand',
            ],
        ];
    }

    protected function throw($message)
    {
        throw new RuntimeException($message);
    }
}
