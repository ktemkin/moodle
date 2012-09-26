<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines the renderer for the manual graded behaviour.
 *
 * @package    qbehaviour
 * @subpackage manualgraded
 * @copyright  2009 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

/**
 * Renderer for outputting parts of a question belonging to the manual
 * graded behaviour.
 *
 * @copyright  2009 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qbehaviour_manualgraded_renderer extends qbehaviour_renderer {

    /**
     * Generate some HTML (which may be blank) that appears in the question
     * formulation area, afer the question type generated output.
     *
     * For example.
     * immediatefeedback and interactive mode use this to show the Submit button,
     * and CBM use this to display the certainty choices.
     *
     * @param question_attempt $qa a question attempt.
     * @param question_display_options $options controls what should and should not be displayed.
     * @return string HTML fragment.
     */
    public function controls(question_attempt $qa, question_display_options $options) {

        // Create a new "save button".
        return $this->submit_button($qa, $options);
    }


    /**
     * Creates a "Save Changes" button. This code was copied from the submit_button routine in the
     * core qbehaviour renderer.
     *
     * @param question_display_options $options controls what should and should not be displayed.
     * @return string HTML fragment.
     */
    protected function submit_button(question_attempt $qa, question_display_options $options) {

        // Determine the attributes for the new save button...
        $attributes = array(
            'type' => 'submit',
            'id' => $qa->get_behaviour_field_name('save'),
            'name' => $qa->get_behaviour_field_name('save'),
            'value' => get_string('savechanges'), 
            'class' => 'submit btn',
        );

        // If the question is read-only, grey out the button.
        if ($options->readonly) {
            $attributes['disabled'] = 'disabled';
        }

        // Create the relevant submit button, and return.
        return html_writer::empty_tag('input', $attributes);
    }

}
