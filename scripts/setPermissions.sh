#!/bin/zsh

project="creativeforcesnrc"

prod_path=
prod_user=

maint_path=
staging_path=
develop_path=

if [ "$DEPLOYMENT_GROUP_NAME" = "${project}-production" ]
then
    site_path="/var/www/vhosts/$prod_path"
    site_user="$prod_user"
    chown -R $site_user:psacln $site_path
    chown $site_user:psaserv $site_path
    find $site_path -type f -exec chmod 644 {} +;
    find $site_path -type d -exec chmod 755 {} +;
fi
if [ "$DEPLOYMENT_GROUP_NAME" = "${project}-maintenance" ]
then
    site_path="/var/www/vhosts/m02.project-qa.com/$maint_path"
    site_user="maintainer"
    chown -R $site_user:psacln $site_path
    chown $site_user:psaserv $site_path
    find $site_path -type f -exec chmod 644 {} +;
    find $site_path -type d -exec chmod 755 {} +;
fi
if [ "$DEPLOYMENT_GROUP_NAME" = "${project}-staging" ]
then
    site_path="/var/www/vhosts/l05.project-qa.com/$staging_path"
    site_user="project-qa"
    chown -R $site_user:psacln $site_path
    chown $site_user:psaserv $site_path
    find $site_path -type f -exec chmod 644 {} +;
    find $site_path -type d -exec chmod 755 {} +;
fi
if [ "$DEPLOYMENT_GROUP_NAME" = "${project}-develop" ]
then
    site_path="/var/www/vhosts/l05.project-qa.com/$develop_path"
    site_user="project-qa"
    chown -R $site_user:psacln $site_path
    chown $site_user:psaserv $site_path
    find $site_path -type f -exec chmod 644 {} +;
    find $site_path -type d -exec chmod 755 {} +;
fi
