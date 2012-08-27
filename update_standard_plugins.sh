#!/usr/bin/env bash

#these are the locations (with respect to the Moodle install root) of each of the standard plugins to be updated
standard_plugins=(
                    'blocks/progress'
                    'blocks/quickmail'
                    'course/format/topsearch'
                    'filter/jwplayerfilter' 
                    'grade/report/projected'
                    'lib/editor/butinymce' 
                    'local/jquery'
                    'local/quizsync'
                    'mod/bigbluebuttonbn'
                    'mod/recordingsbn'
                    'mod/quiz/report/papercopy'
                    'question/behaviour/adaptiveweighted'
                    'question/behaviour/adaptiveweightedhints' 
                    'question/type/boolean' 
                    'question/type/checkoff' 
                    'question/type/multianswerbu'
                    'question/type/partner'
                    'question/type/scripted'
                    'question/type/scriptedessay'
                    'question/type/usercode' 
                    'question/type/vhdl'
                    'question/type/waveform'
                    'theme/bumoodle'
                    'theme/pdf'
                )

#this is the version to pull from, on each of the locations
version_id='master'

#update each of the standard plugins
for plugin in ${standard_plugins[@]}; do
    git --git-dir=$plugin/.git pull origin $version_id 
done
