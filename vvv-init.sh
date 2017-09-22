#!/usr/bin/env bash
TOKEN=`cat /vagrant/tigerton/token.txt`
GF_KEY=`cat /vagrant/tigerton/gravityforms_key.txt`
MDB_KEY=`cat /vagrant/tigerton/migratedb_key.txt`
DOMAIN=`get_primary_host "${VVV_SITE_NAME}".dev`
SITE_ADMIN=`get_config_value 'admin' 'wpadmin'`
SITE_PW=`get_config_value 'password' 'password'`
SITE_EMAIL=`get_config_value 'email' 'info@tigerton.se'`
SITE_TITLE=`get_config_value 'site_title' 'Tigerton WordPress Site'`
SITE_DESC=`get_config_value 'site_description' 'Just another Tigerton WordPress site.'`
DB=`get_config_value 'db' "${VVV_SITE_NAME}"_db`
BLUE='\033[1;34m'
YELLOW='\033[1;33m'

# Make a database, if we don't already have one
RESULT=`mysqlshow --user=wp --password=wp ${DB}| grep -v Wildcard | grep -o ${DB}`
if [ "$RESULT" != ${DB} ]; then
	echo -e "\nCreating database '${DB}'"
	mysql -u root --password=root -e "CREATE DATABASE IF NOT EXISTS ${DB}"
	mysql -u root --password=root -e "GRANT ALL PRIVILEGES ON ${DB}.* TO wp@localhost IDENTIFIED BY 'wp';"
	echo -e "\n Importing an sql file if it exists in the folder."
	find . -maxdepth 1 -type f -name "*.sql" -exec bash -c 'mysql -u wp -p"wp" "$2" < "$1"' - {} ${DB} \;
	echo -e "\n DB operations done.\n\n"
fi


# Nginx Logs
mkdir -p log
touch log/error.log
touch log/access.log

if [ ! -f vvv-nginx.conf ]
then
	# Create nginx file automatically
	# set $upstream {upstream};
	cat <<-EOF >vvv-nginx.conf
	server {
	  listen 80;
	  listen 443 ssl;
	  server_name ${DOMAIN};
	  root ${VVV_PATH_TO_SITE}/htdocs;

	  error_log ${VVV_PATH_TO_SITE}/log/error.log;
	  access_log ${VVV_PATH_TO_SITE}/log/access.log;

	  include /etc/nginx/nginx-wp-common.conf;
	}
	EOF
fi

if [ ! -f wp-cli.yml ]
then
	# Create a wp cli file automatically
	# Tells wp cli where WP is.
	cat <<-EOF >wp-cli.yml
	path: ${VVV_PATH_TO_SITE}/htdocs
	EOF
fi


#if ! $(wp core is-installed --allow-root); then
if [ ! -d htdocs ]
then

	# Create our default gitignore file!
	# Delete any preexisting .gitignore first because someone probably fucked up.
	rm -f .gitignore
	cat <<-EOF >.gitignore
	*.log
	*.maintenance
	.htaccess
	sitemap.xml
	sitemap.xml.gz
	log
	log/*
	/log
	.DS_Store
	.DS_Store?
	._*
	.Spotlight-V100
	.Trashes
	ehthumbs.db
	Thumbs.db
	/.idea
	*.sublime-project
	*.sublime-workspace
	.phpintel
	*.codekit
	*.codekit3
	/vendor
	composer.json
	composer.lock
	htdocs/wp-content/themes/sceleton/codekit-cache
	htdocs/wp-content/advanced-cache.php
	htdocs/wp-content/backup-db/
	htdocs/wp-content/backups/
	htdocs/wp-content/blogs.dir/
	htdocs/wp-content/cache/
	htdocs/wp-content/upgrade/
	htdocs/wp-content/uploads/
	htdocs/wp-content/wp-cache-config.php
	htdocs/readme.html
	htdocs/license.txt
	EOF

	# Create a temporary composer auth file with our github token.
	cat <<-EOF >auth.json
	{
	    "github-oauth": {
	        "github.com": "${TOKEN}"
	    }
	}
	EOF

	mkdir htdocs -p
	cd htdocs

	wp core download --allow-root
	wp core config --dbname=${DB} --dbuser=wp --dbpass=wp --quiet --allow-root
	wp core install --url=${DOMAIN} --quiet --title="${SITE_TITLE}" --admin_name=${SITE_ADMIN} --admin_email=${SITE_EMAIL} --admin_password=${SITE_PW} --skip-email --allow-root

	#Delete default content
	wp post delete 1 2 --force --allow-root
	wp plugin delete hello --allow-root

	#Setup options
	wp option update permalink_structure '/%category%/%postname%/' --allow-root
	wp option update date_format 'Y-m-d' --allow-root
	wp option update show_on_front 'page' --allow-root
	wp option update page_on_front '3' --allow-root
	wp option update timezone_string 'Europe/Stockholm' --allow-root
	wp option update time_format 'H:i' --allow-root
	wp option update blogdescription "${SITE_DESC}" --allow-root

	# Set language
	wp core language install 'sv_SE' --activate --allow-root

	# Run composer
	echo "Running composer"
	cd ..
	composer update --prefer-dist
	# Kill the auth file afterwards.. leave no trace!
	echo -e "\n Delete the auth file"
	rm -f auth.json

	cd htdocs

	# Activate our theme
	wp theme activate sceleton --allow-root

	# Delete all default themes.
	echo -e "\n Deleting default themes"
	rm -rf wp-content/themes/twenty*

	#Setup default content
	wp post create --post_type=page --post_status=publish --post_title='Hem' --allow-root
	wp menu create "Huvudmeny" --allow-root
	wp menu location assign Huvudmeny primary --allow-root

	#Plugins, comment out or delete any you do not want
	wp plugin install autodescription --activate --allow-root
	wp plugin activate advanced-custom-fields-pro --allow-root
	wp plugin activate wp-migrate-db-pro --allow-root
	wp plugin activate wp-migrate-db-pro-media-files --allow-root
	wp plugin activate wp-migrate-db-pro-cli --allow-root
	wp plugin install better-wp-security --allow-root
	wp plugin install backupwordpress --allow-root
	wp plugin install capability-manager-enhanced --allow-root
	wp plugin install user-switching --allow-root
	wp plugin install plugin-vulnerabilities --activate --allow-root
	wp plugin install gravityformscli --activate --allow-root
	wp gf install --key="${GF_KEY}" --activate --allow-root
	wp gf tool verify-checksums --allow-root

	# Set WP Migrate DB Pro settings
	wp migratedb setting update license "${MDB_KEY}" --allow-root
	wp migratedb setting update pull on --allow-root
	wp migratedb setting update push on --allow-root

	# Export the DB for easier startup for others.
	wp db export "../${DB}.sql" --allow-root

	cd ..

	echo -e "${BLUE}${VVV_SITE_NAME} now installed!"
	echo -e "${YELLOW}Don't forget to commit/push the site to master, activate Git Flow and push our new site on the develop branch!"

fi
