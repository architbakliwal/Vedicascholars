#!/bin/bash

# script to run PHPlist from commandline. You may need to edit this to make it work
# with your shell environment. The following should work for Bash

# in commandline mode, access is restricted to users who are listed in the config file
# check README.commandline for more info

# identify the config file for your installation
CONFIG=/var/www/vhosts/jbims.edu/public_html/admission/lists/config/config.php
export CONFIG

# alternatively you can use -c <path> on the commandline

# run the PHPlist index file with all parameters passed to this script
/usr/bin/php /var/www/vhosts/jbims.edu/public_html/admission/lists/admin/index.php $*