<?php

function local_postrequire_extend_navigation(global_navigation $navigation)
{
    global $DB, $COURSE, $PAGE, $USER;

    if ($COURSE->id > 1 && (strpos($PAGE->url->get_path(), 'mod/forum') !== false)) {
        $context = context_course::instance($COURSE->id);
        if (user_has_role_assignment($USER->id, 5, $context->id)) {
            $params = $PAGE->url->params();
            if (isset($params['id'])) {
                if ($cm = get_coursemodule_from_id('forum', $params['id'])) {
                    $forum = $DB->get_record('forum', ['id' => $cm->instance]);
                }
            } else if (isset($params['f'])) {
                $forum = $DB->get_record('forum', ['id' => $params['f']]);
            }
            if (isset($forum)) {
                if ($forum->type == 'single' && $d = $DB->get_record('forum_discussions', ['forum' => $forum->id])) {
                    if (!$DB->record_exists('forum_posts', ['discussion' => $d->id, 'userid' => $USER->id])) {
                        $PAGE->requires->js(new moodle_url('/local/postrequire/javascript/postrequire.js'));
                    }
                }
            }
        }
    }
}
