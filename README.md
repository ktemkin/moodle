MOODLE@BU
=================

This is a modified fork of the popular, open-source Learning Management System (LMS) Moodle. It is mostly intended for use at Binghamton University, but is provided here in the hopes that other educational insitutions may benefit from our modifications. In an ideal world, many of our modifications will eventually end up in Moodle core code. 

Those who are unfamiliar with Moodle are better off checking out the main Moodle repository, at the following URL:

https://github.com/moodle/moodle


INTERNAL UPGRADE INSTRUCTIONS (BINGHAMTON UNIVERSITY ONLY)
----------------------------------------------------------------

1. Put Moodle@BU into maintainence mode, so no users can use Moodle@BU during the short upgrade period. If you have not already, post a news article explaining that the Moodle server will be unavailable for a short period for the upgrade.

2. Create a new directory for the new install of Moodle@BU.  Do not attempt to replace the production server front by pulling- we want the current directory structure to be kept intact.

3. Create a new SQL database for Moodle on Moodle@BU server. This will house an archival copy of the Moodle@BU database as it was before the upgrade.

4. Use the database transfer option in Moodle (/admin/tool/dbtransfer/index.php) to create a copy of the database. Reconfigure the pre-update production server to point to the _new_ database by editing /var/www/production/config.php. Verify that the original server works as intended.

5. Use git to clone this repository into a new directory. For version X.Y, use the following command:

   git clone git://github.com/bumoodle/moodle.git master --single-branch bumoodleXY
   
As an example, if you were installing Moodle 2.3 from Master, you would type:

   git clone git://github.com/bumoodle/moodle.git master --single-branch bumoodle23
   
If, for whatever reason, you need to load a branch other than the most recent stable branch (master), replace "master" with the snapshot name.

6. Move the "/var/www/staging" symlink to point to the new directory. This is most easily accomplished by removing and re-creating the symlink.

    rm /var/www/staging
    ln -s /var/www/bumoodleXY /var/www/staging

7. Copy _config.php_ from the pre-upgrade Moodle install (/var/www/production) to the new staging install (/var/www/staging). Update the new 'config.php' to point to the original database.

8. CD into the staging directory (/var/www/staging) and install the standard plugin set by running the following command:

   ./install_standard_plugins.sh

9. Install the BU-specific authentication plugins by running the following command. This command will only work on a computer which is authorized to access Moodle@BU's private git accounts. The Moodle@BU server is authorized by public key- for more details, and authentication information, contact Kyle Temkin <ktemkin@binghamton.edu>.

   ./install_brainlink_plugins.sh

10. Update the Moodle installation by running the following commands:

    cd /var/www/production/admin/cli
    sudo -u www-data install.php 

11. Test the new installation as thoroughly as possible, verifying that each of the features installed and is working correctly. You should be able to access the full web interface via http://staging.bumoodle.com. 

12. Once the new interface appears to be working fully, move the production symlink to point to the new directory. As before, this is most easily accomplished by changing the symlink.
    
    rm /var/www/staging
    ln -s /var/www/bumoodleXY /var/www/staging

13. Finally, disable maintainence mode. Post a news article explaining that the upgrade is complete, and directing users to e-mail support in the event of any errors. (Support should file appropriate JIRA bugs for any events that occur.)
