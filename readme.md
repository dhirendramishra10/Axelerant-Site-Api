CONTENTS OF THIS FILE:
-Introduction
-Project Files
-References
-Dependencies
-Installation
-Permissions
-User Interface
-Maintainers

INTRODUCTION:
-Site Api Key - This is an Drupal 8 module written to implement Drupal 8's Serialization API.

Project Files:
-README.md: This file contains various instructions about this Project.
-composer.json: This file contains Schema describing project & related metadata which is user by Composer.
-site_api_key.info.yml: This file contains Project definition & metadata in Drupal's Required Format.
-site_api_key.module: This file contains Important Hooks along with some helper functions.
-site_api_key.routing.yml: This file describes Dynamic URL whose main job is to serialize & display 'Page' nodes.
-site_api_key.services.yml: This file contains service responsible for Upcasting 'siteapikey' parameter in our Route.
-config/install/site_api_key.settings.yml: This file contains 'siteapikey' configuration.
-config/schema/site_api_key.schema.yml: This file contains schema mapping for the site Configurations.
-src/Controller/OutputController.php: This file contains our URL callback class. This class is our node serializer.
-src/ParamConverter/SiteApiKeyConvert.php: This file contains Class for our 'siteapi' URL parameter.

REFERENCES:
-Core's System Module: For Config Entity Mapping & Definitions.
-Core's Node Module for 'paramconverter' services(Example: "node_preview").
Using parameters in routes: https://www.drupal.org/docs/8/api/routing-system/using-parameters-in-routes
-Access Denied in D8: http://drupal.stackexchange.com/questions/211095/
-Dependency Injections of services defined by other modules: https://code.tutsplus.com/tutorials/drupal-8-properly-injecting-dependencies-using- di--cms-26314
-Serialization API: https://www.drupal.org/docs/8/api/serialization-api/serialization-api-overview

DEPENDENCIES:
-Node Module
-Serialization Module

INSTALLATION:
-To install this module
-Go to extend
-Find 'Site Configuration API'
-Enable the box on left and save

PERMISSIONS:
None

USER INTERFACE:
-Admin Site Information: '/admin/config/system/site-information'
-A new form text field named "Site API Key" needs to be added to the "Site Information" form with the default value of “No API Key yet”.
-When this form is submitted, the value that the user entered for this field should be saved as the system variable named "siteapikey".
-A Drupal message should inform the user that the Site API Key has been saved with that value.
-When this form is visited after the "Site API Key" is saved, the field should be populated with the correct value.
-The text of the "Save configuration" button should change to "Update Configuration".
-Node Serialization: '/page_json/{siteapikey}/{node}'
-This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".

MAINTAINERS:
Dhirendra Mishra - https://www.drupal.org/u/dhirendramishra