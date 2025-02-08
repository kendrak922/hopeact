# hopeact WordPress Theme by fjorge digital

For info on the site theme, see the [Theme README](wordpress/wp-content/themes/hopeact/README.md).

For info on using the Terraform templates, see the [Terraform README](terraform/README.md).

## General Information

- Production Url:
- Platform/CMS: WordPress: LOCAL LINK
- Code stored on github: GITHUB LINK
- figma Designs:

## Admin Login Info

Initial Devleopment by:

- **Sarah Berg**

## Getting Started

- clone Release/Develop branch
- create env.php file in the /wordpress directory
- create wp-config.php file in the /wordpress directory
  - example of env.php and wp-config.php are in bitwarden
- Run npm install in the theme directory
- Run composer install in the theme directory
- Run gulp in the theme directory

### Lando install first time

- lando start
- install database
  - lando db-import <name>
- cd /wordpress
  - lando wp core download --skip-content

### Theme Setup

- add colors to admin-styles.css, variables, dev guide, and style guide.
- convert fonts: https://transfonter.org/, add font faces, assign primary and secondary fonts