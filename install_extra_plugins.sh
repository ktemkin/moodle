#!/usr/bin/env bash
VERSION=MOODLE_23_STABLE

#
# Activity Modules
#

# Questionnaire Plugin
git clone git://github.com/remotelearner/moodle-mod_questionnaire.git -b $VERSION mod/questionnaire
echo '/mod/questionnaire' >> .git/info/exclude

#
# Blocks
# 

# AJAX Marking Block Plugin
git clone git://github.com/mattgibson/moodle-block_ajax_marking.git -b $VERSION blocks/ajax_marking
echo '/blocks/ajax_marking' >> .git/info/exclude

# Configurable Reports Plugin
git clone git://github.com/jleyva/moodle-block_configurablereports.git -b MOODLE_21_STABLE blocks/configurablereports
echo '/blocks/configurablereports' >> .git/info/exclude

# "Message My Teacher" block
git clone git://github.com/marxjohnson/moodle-block_messageteacher.git blocks/messageteacher
echo '/blocks/messageteacher' >> .git/info/exclude

# Unanswered Discussions block
git clone git://github.com/bumoodle/moodle-block_unanswered_discussions.git -b $VERSION blocks/unanswered_discussions
echo '/blocks/unanswered_discussions' >> .git/info/exclude

# "View as Example" block
git clone git://github.com/moodleou/moodle-block_viewasexample.git blocks/viewasexample
echo '/blocks/viewasexample' >> .git/info/exclude
