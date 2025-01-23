
# AbuseIPDB v3.0.3 for Zen Cart 2.1.0 or later

## Prerequisites
- Zen Cart 2.1.0 or later
- PHP 7.4+ (recommended: PHP 8.x)

## ABOUT THIS MODULE
This module is an AbuseIPDB integration for Zen Cart, designed to help protect your e-commerce website from abusive IP addresses. It checks the confidence score of a visitor's IP address using the AbuseIPDB API and blocks access to the site if the score exceeds a predefined threshold. The module also supports caching to reduce the number of API calls, a test mode for debugging, and logging for monitoring blocked IPs. Additionally, it allows for manual whitelisting and blacklisting of IP addresses to give you greater control over access to your site.

## INSTALLATION AND UPGRADE

Before you start …

If you are upgrading from a version below v3.0.0, please note that earlier versions of this plugin did not use Zen Cart's Encapsulated Plugins system. Starting with v3.0.0, the plugin has been fully transitioned to this modern framework, and outdated files from earlier versions will be automatically removed during installation.

Important: The following legacy files are automatically removed when v3.0.0 or later is installed:

``` text
/YOUR_ADMIN/includes/auto_loaders/config.abuseipdb_admin.php
/YOUR_ADMIN/includes/extra_datafiles/abuseipdb_settings.php
/YOUR_ADMIN/includes/init_includes/init_abuseipdb_observer.php
/YOUR_ADMIN/includes/english/extra_definitions/abuseipdb_admin_names.php
/YOUR_ADMIN/abuseipdb_settings.php
/includes/auto_loaders/config.abuseipdb_observer.php
/includes/classes/observers/class.abuseipdb_observer.php
/includes/extra_datafiles/abuseipdb_filenames.php
/includes/functions/abuseipdb_custom.php
```

## Installation Instructions

1. **Unzip the Plugin**  
   Extract the contents of the distribution's zip file. Inside, you'll find a `zc_plugins` directory, which contains an `AbuseIPDB` directory. Within that directory is another folder with the plugin's version number.

2. **Upload the Plugin Files**  
   Copy the entire `AbuseIPDB` directory from the extracted contents into your site's `zc_plugins` directory, preserving the directory structure.

3. **Install the Plugin**  
   - Log in to your Zen Cart admin.  
   - Navigate to **Modules → Plugin Manager**.  
   - Locate **AbuseIPDB** in the list, click **Install**, and confirm by clicking **Install** again.

4. **Configure the Plugin**  
   - After installation, you'll find an **AbuseIPDB Settings** element under the admin's **Configuration** tab where you can configure the module.

---

## Files to Upload

To install or upgrade the AbuseIPDB plugin, upload the following files to your Zen Cart file system, maintaining the directory structure:

``` text
zc_plugins/AbuseIPDB/vX.X.X/manifest.php
zc_plugins/AbuseIPDB/vX.X.X/admin/includes/auto_loaders/config.abuseipdb.php
zc_plugins/AbuseIPDB/vX.X.X/admin/includes/classes//observers/auto.abuseipdbwidget.php
zc_plugins/AbuseIPDB/vX.X.X/admin/includes/languages/english/extra_definitions/lang.abuseipdb_admin_names.php
zc_plugins/AbuseIPDB/vX.X.X/admin/abuseipdb_settings.php
zc_plugins/AbuseIPDB/vX.X.X/catalog/includes/auto_loaders/config.abuseipdb.php
zc_plugins/AbuseIPDB/vX.X.X/catalog/includes/classes/observers/abuseipdb_observer.php
zc_plugins/AbuseIPDB/vX.X.X/catalog/includes/classes/functions/abuseipdb_custom.php
zc_plugins/AbuseIPDB/vX.X.X/installer/ScriptedInstaller.php

Optional_Install/includes/blacklist.txt (if upgrading from below v3.0.0 this will be there already)
Optional_Install/ZC_210/YOUR_ADMIN/modules/dashboard_widgets/AbuseIPDBDashboardWidget.php (if upgrading from v2.1.2 - v2.1.6 this may be there already if you installed it)
Optional_Install/ZC_210/YOUR_ADMIN/whos_online.php - (**NEW** file updated for this version)
```
### Optional | Adding the Admin Dashboard Widget

To integrate the (optional) AbuseIPDB dashboard widget, follow these steps:

#### ZenCart 2.1.0 or later

- Obtain your user ID by visiting the [Contributors Badge](https://www.abuseipdb.com/account/contributor) section of the AbuseIPDB Dasbhoard in its backend.
- After logging in, you will notice there is a large code block present with HTML inside. Within that block, look careful for an `<a>` tag at the start of that block. You'll want to look for a line that looks like: `<a href="https://www.abuseipdb.com/user/XXXXXX" title="AbuseIPDB is an IP address blacklist for webmasters and sysadmins to report IP addresses engaging in abusive behavior on their networks">`. Where you see the `XXXXXX` in the example, should be a number that represents your Member ID. (**NOTE**: This is different than your API Key which is your main access key to turn on the module.)
- With your Member ID in hand, proceed to the ZenCart dashboard area and navigate to `Configuration > AbuseIPDB Settings` and look for a configuration setting that reads: "AbuseIPDB: User ID". Click on that and enter SOLELY the number that you were provided. Entering the number here will enable the Widget and if detected correctly, will boost you as a `Webmaster and Supporter` and thus boost your ability to report back to AbuseIPDB.
- If you did this correctly, you will notice that there is a new widget present on the Admin Dashboard area. This is all that needs to be done. You can disable this widget by removing your UserID from the same setting and clearing it.

## THINGS TO KNOW

1. **API Key Setup**  
    - The script requires a valid API key from AbuseIPDB to check the abuse confidence score of an IP address.  
    - Ensure that a valid API key is available and correctly configured in the **"AbuseIPDB API Key"** setting in the Zen Cart admin panel.  
    - Be sure to [verify yourself](https://www.abuseipdb.com/account/webmasters) as the owner of your domain in the AbuseIPDB Webmasters section to increase your daily free API call limit from 1000 to 3000.  

    **How to Obtain an API Key**:  
    - Visit [AbuseIPDB](https://www.abuseipdb.com) and sign up for an account.  
    - Once registered, log in and navigate to the **API Key** section in your account dashboard.  
    - Generate an API key and copy it into the **"AbuseIPDB API Key"** setting in the Zen Cart admin panel.
	
	**Boost AbuseIPDB API Limits**  
    - Added a new widget to help boost the limits of the AbuseIPDB API.  
    - With this, you can increase the `check & report` limits to **5,000 per day** instead of the usual **1,000** or **3,000** available on the free tier.  
    - The widget sits unobtrusively on your admin backend landing page.  

    **Configuration Steps**:  
    - A new field is available in the configuration page to enable this feature.  
    - You will need your profile ID number, which can be found in the **Account Summary** section of AbuseIPDB.  
      - Be sure to grab your profile ID number and input it in the configuration settings.  
      - **Note**: Your AbuseIPDB profile must be set to public to retrieve the profile ID. If your profile is set to private, the option to view and copy the profile ID will not be available.

2. Cache Expiry: The script checks the database cache to avoid excessive API calls. If the cache for a specific IP address has expired, the script makes a new API call.  
3. Test Mode: The script provides a test mode for debugging. When an IP is in test mode, the script logs the IP as blocked regardless of the abuse score.  
4. IP Cleanup Feature: The module has an IP Cleanup feature that automatically deletes expired IP records. The cleanup process is triggered once per day by the first logged IP. This functionality can be enabled or disabled, and the IP record expiration period can be configured in the settings "IP Cleanup Period (in days)".  
5. Manual Whitelisting and Blacklisting: The script checks if an IP is manually whitelisted or blacklisted before it does anything else. Manually whitelisted IPs will bypass the AbuseIPDB check, and manually blacklisted IPs will be immediately blocked. Enter the IP addresses separated by commas without any spaces, like this: `192.168.1.1,192.168.2.2,192.168.3.3`.
6. Additional IP Blacklist File Option: The module offers an advanced IP blacklist feature. Administrators can enable or disable this functionality through the "Enable IP Blacklist File?" setting in the Zen Cart admin panel. Once enabled, the module examines a designated blacklist file for every incoming IP address. The blacklist file should list one complete or partial IP address per line. If there is a match, the corresponding IP will be promptly blocked, bypassing any other checks or scoring methods. This feature provides administrators with enhanced control over blocking specific IP addresses by utilizing complete or partial matches from the blacklist file.    
7. Logging: If logging is enabled, log files are created when an IP is blocked, whether manually or based on the AbuseIPDB score. If API logging is enabled, a separate log file is also created for API calls. The location of these log files can be configured in the `ABUSEIPDB_LOG_FILE_PATH` setting in the Zen Cart admin panel.  
8. Skipping IP Check for Known Spiders: If the "Allow Spiders?" setting (`ABUSEIPDB_SPIDER_ALLOW`) is enabled, known spiders will be skipped in the IP check and logging process, as they are not subject to AbuseIPDB scoring. This can be useful for avoiding unnecessary API calls and log entries for spider sessions.  
9. Spider Detection: The script utilizes a file called `spiders.txt` provided by Zen Cart to identify known spiders, including search engine bots and web crawlers. It reads the user agent from the HTTP request and compares it against the entries in the spiders.txt file. If a match is found, indicating that the user agent corresponds to a known spider, the spider flag is set to true. This flag determines the script's behavior, enabling it to bypass certain checks or execute specific actions tailored for spider sessions.  

10. **Enhanced "Who's Online" Page Features**  
    - Real-Time Threat Assessment: Displays AbuseIPDB confidence scores for each visitor, enabling real-time assessment of potential threats. Clicking on a score redirects to the AbuseIPDB website for detailed information about the IP address.  
    - Interactive IP Status Icons:  
        - 🛡️ **Red Shield**: Indicates a blocked IP.  
        - 🚫 **Grey Circle with Slash**: Indicates an unblocked IP.  
      These icons allow quick manual addition of IPs to the blacklist file directly from the "Who's Online" screen.  

    **Requirements for "Who's Online" Features**  
    - The **"Enable IP Blacklist File"** setting must be set to **true** in the configuration.  
    - Ensure the optional files `blacklist.txt` and `whos_online.php` are uploaded to activate these features.  


## SCRIPT LOGIC
This section provides an understanding of the logic steps involved in checking an IP and creating the corresponding log files:  

1.	IP Whitelisting: The script first checks if the IP is whitelisted. If it is, the IP is permitted without further processing.  
2.	Manual IP Blocking: If the IP is not whitelisted, the script checks if the IP is manually blocked. If it is, the IP address is logged as blocked in the cache and a corresponding log file is generated. The log file creation details are as follows:  
    - File Name: `abuseipdb_blocked_cache_<date>.log`
    - Location: `ABUSEIPDB_LOG_FILE_PATH`
3.	IP Cache Lookup: If the IP is neither whitelisted nor manually blocked, the script then looks for the IP in the database cache.  
    - a. If the IP is found in the cache and the cache has not expired: 
      - The abuse score is retrieved from the cache. 
      - If the abuse score is above the threshold or the IP is in test mode, the IP is logged as blocked in the cache and a log file is created with the same details as described above.
    - b. If the IP is not found in the cache or the cache has expired: - An API call is made to AbuseIPDB to fetch the abuse score for the IP. - The database cache is then updated with the new abuse score and timestamp.  
    - c. Skip IP check for known spiders: If the IP is identified as a known spider and the ABUSEIPDB_SPIDER_ALLOW setting is enabled, the IP check and logging steps are skipped for spiders.  
    - d. Spider Logging: If Spider logging is enabled, a separate log file for spiders that bypassed an ip check is created.  
4.  Database Cleanup: The script's function periodically removes old IP records from the database when triggered, if the cleanup feature is enabled. This operation is performed only once per day, as indicated by the update of the maintenance timestamp.  
5.	API Logging: If API logging is enabled, a separate log file for API calls is created. The log file creation details are as follows:  
    - File Name: `abuseipdb_api_call_date.log`
    - Location: `ABUSEIPDB_LOG_FILE_PATH`  
6.	IP Blocking: If the abuse score is above the threshold or the IP is in test mode, the IP address is logged as blocked (either from the API call or from the cache) and a corresponding log file is created. The log file creation details are as follows:  
    - File Name: `abuseipdb_blocked_\<date.log`
    - Location: `ABUSEIPDB_LOG_FILE_PATH`
7.	Safe IP: If none of the above conditions trigger a block, the IP is considered safe, and the script proceeds without further action.  

## SUPPORT
For support, please refer to the [Zen Cart forums](https://www.zen-cart.com/showthread.php?229438-AbuseIPDB-Integration-module) or visit the [GitHub repository](https://github.com/CcMarc/AbuseIPDB) for additional resources, updates, or to report issues.

## WHAT'S NEW:

- **v3.0.3**: Transitioned the AbuseIPDB Widget to an observer class for improved modularity and encapsulation.
- **v3.0.2**: Added total settings count display to ensure all settings are accounted for.
- **v3.0.1**: Bug Fix - resolved an issue with undefined constants.
- **v3.0.0**: Migrated to Encapsulated Plugin Architecture.  
- **v2.1.6**: Minor code optimizations for maintainability.  
- **v2.1.5**: Improved consistency in date handling across the module.  
- **v2.1.4**: Enhanced fallback logic for API failures to prevent disruptions.  
- **v2.1.3**: Integrated AbuseIPDB functionality into the "Who's Online" page.  
- **v2.1.2**: Added the verification badge as a widget to the front page of the admin area. Fixed the formatting of the readme.  
- **v2.1.1**: Added additional admin log configuration options for enhanced logging capabilities.  
- **v2.1.0**: Fixed an error in the installation file.  
- **v2.0.9**: Added support for configurable redirect URL for blocked IPs, allowing website owners to choose between "Page Not Found" and "403 Forbidden" as the redirection option. Reverted back to ZenCart's spider detection mechanism for identifying spiders.  
- **v2.0.8**: Added IP blocking based on a blacklist file in addition to the existing logic.  
- **v2.0.7**: Added the `checkSpiderFlag()` function for improved spider detection and updated the `spider_flag_user_setting` configuration option.  
- **v2.0.6**: Optimized code, updated AbuseIPDB checks, improved logging and cache handling, and adjusted admin settings.  
- **v2.0.5**: Added the option to log spiders that bypassed IP checking.  
- **v2.0.4**: Added the ability to allow or disable known spiders from bypassing IP checks.  
- **v2.0.3**: Added `TABLE_ABUSEIPDB_MAINTENANCE` database table for IP cleanup control.  
- **v2.0.2**: Added IP cleanup feature with configurable settings for automatic deletion of expired IP records and changed `abuseipdb_api_call_<date>.log` creation to daily instead of monthly.  
- **v2.0.1**: Updated table name reference to `TABLE_ABUSEIPDB_CACHE` for compatibility.  
- **v2.0.0**: Switched from session caching to database caching for improved performance and reliability.  
- **v1.0.2**: Fixed a typo in the admin installation and corrected the license type.  

## LICENSE:  
This module is released under the GNU General Public License (GPL).  