<?php
/**
 * Prints a particular instance of gephi
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage gephi
 * @copyright  2014 Sun Yu
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once("../../config.php");
require_once("lib.php");
require_once("locallib.php");

$id = optional_param('id', 0, PARAM_INT);  //course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // gephi instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('gephi', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $gephi  = $DB->get_record('gephi', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $gephi  = $DB->get_record('gephi', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $gephi->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('gephi', $gephi->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = get_context_instance(CONTEXT_MODULE, $cm->id);

add_to_log($course->id, 'gephi', 'view', "view.php?id={$cm->id}", $gephi->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/gephi/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($gephi->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');
//$PAGE->add_body_class('gephi-'.$somevar);

// Output starts here
echo $OUTPUT->header();

if ($gephi->intro) { // Conditions to show the intro can change to look for own settings or whatever
    echo $OUTPUT->box(format_module_intro('gephi', $gephi, $cm->id), 'generalbox mod_introbox', 'gephiintro');
}

// Replace the following lines with you own code
echo $OUTPUT->heading(get_string('notice', 'gephi'));
$courseid=$course->id;

$nodeurl =$CFG->wwwroot.'/mod/gephi/nodeoutput.php';
echo "<form action='$nodeurl' method='post'>";
echo "<input type='hidden' name='Gephi_Data' value='$courseid'>";
echo "<input type='submit'  value='Export Gephi Nodes Data' >";
echo "</form>";

$edgeurl =$CFG->wwwroot.'/mod/gephi/edgeoutput.php';
echo "<form action='$edgeurl' method='post'>";
echo "<input type='hidden' name='Gephi_Data' value='$courseid'>";
echo "<input type='submit'  value='Export Gephi Edges Data' >";
echo "</form>";
// Finish the page
echo $OUTPUT->footer();


