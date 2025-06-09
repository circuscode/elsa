# elsa

Elsa is the WordPress Block Theme running on [unmus.de](https://www.unmus.de/).

## Description 

The WordPress Block Theme Elsa is a completely rebuilt version of the [huhu Classic Theme](https://github.com/circuscode/huhu), which was a reengineered variant of the [Suidobashi Theme](https://www.elmastudio.de/wordpress-themes/suidobashi/) by [Elmastudio](https://www.elmastudio.de/). It's created specially for [unmus.de](https://www.unmus.de/). Using elsa on other WordPress is not recommended.

## Supported WordPress Templates

* Index Archive
* Tag Archive
* Category Archive
* Author Archive
* Date Archive
* Single Post
* Search
* Page
* 404

## Supported Custom Post Types

All custom post types have an archive and single template.

* Episodes (Podlove Publisher)
* Pinseldisko (unmus Custom Plugin) 
* Ello (unmus Custom Plugin)
* Raketenstaub (unmus Custom Plugin)

## Supported Custom Taxonomies

All custom taxonomies have an archive template.

* Artist (Episodes)
* Kunsthalle (Pinseldisko)
* Tagebuch (Ello)
* Fotoalbum (Raketenstaub)

## Supported Post Formats

Post Formats are designed for the usage with CPT Ello.

* Quote 
* Image 

## Template Parts

* Meta 
* About
* Comments
* Footer
* Header

## Special Templates

* Page WordPress
* Page Tweets (Plugin Mathilda)
* Page Troets (Plugin TootPress)

## Blocks

* Amount of Comments Button
* Creative Commons
* Title Date
* Creator
* Dynamic Category
* Meta Sketch
* Code

## JavaScripts

* Search Toggle (Jquery)
* Search Input Field Clearing (Jquery)

## Further Extensions

* Shortcodes
* Creative Commons

## Advanced Functionality

* Maintenance Template

## Fonts

Elsa uses the Font Source Sans Pro. All font files are embedded and will be loaded locally at runtime.

## Languages

The theme supports German only (hard-coded).

## Plugin Dependencies

Following plugins are required at runtime.

* [unmus Custom Plugin](https://github.com/circuscode/unmus)
* [Podlove Publisher](https://publisher.podlove.org)
* [Advanced Custom Fields](https://www.advancedcustomfields.com)

## Plugin Styles

In addition styles of the following plugins are supported.

* Embed Privacy
* Envira
* Lightweight Subscribe Comments
* Mailchimp
* Podlove Publisher
* Mathilda
* TootPress

## Custom Fields Dependencies

Following custom fields are supported.

* Custom Field pinseldisko_sketchnote_description
* Custom Field pinseldisko_sketchnote_image
* Custom Field licence_type
* Custom Field licence_version
* Custom Field licence_include
* Custom Field licence_exclude

## Responsive Resolutions

Styling in general does not handle different screen sizes. The breakpoint for mobile navigation is set for 1100 pixel.

## Notes

This theme does not add any new logic to WordPress or generate new data within WordPres. All code is limited to the user interface and its HTML output.

## Installation

1. Do it the WordPress Way! 
2. Assign/Create Navigation in Header Template Part
3. Add Search Input Field to Navigation
4. Add Search Toggle
5. Customize Search Input Field
6. Add .menu-search to Search Input Field in Navigation
7. Add .search-toggle to Search Toogle
8. Copy maintenance.php to /wp-content/

## Branches

This repository follows the git-flow workflow to a large extent.

* master branch is the latest release
* develop branch is the current state of development
* feature branches contain dedicated features in development
* bugfix branches contain dedicated bugfixes in development

Hotfix and release branches will not be applied in most cases.

## Unterstanding the Deployment

Branches will be deployed continously onto the environments. The master branch is connected with the productive environment and the develop branch is connected with the test environment. The deployment itself is managed by GitHub Actions. Releases are not used in the regular way. Releases can be understood as freeze of functional bundels.

## Built With

* [WordPress Site Editor](https://wordpress.org/documentation/article/site-editor/)
* [Visual Studio Code](https://code.visualstudio.com)

## License

This project is licensed under the GPL3 License.

## Changelog

### 102

Release pending

* Added: TootPress Afterloop Styles
* Added: Styles for Hyperlinks in Comments
* Changed: Styling for TootPress 0.5
* Changed: Styling of Comment Notification Checkbox
* Changed: Envira Lightbox / Position of Close & Next Icons

### 101

Released: 17.05.2025

* Feature: Mastodon Shortlink Transformation
* Added: Styles for Mailchimp Subscribe Form
* Added: Styles for Podlove Global Contributor Shortcode
* Changed: Top Spacer @ Index Archive
* Changed: Font Size (Toot Date)
* Fixed: Spacing (Links without Block Container)
* Fixed: Layout @ Wide Screen (Troets, Tweets)
* Fixed: Post Format CSS

### 100

Released: 27.06.2024

* Initial Theme Release
