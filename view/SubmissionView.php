<?php

namespace View;

class SubmissionView
{
    private $submission = 'Text';
    private $post = 'submit';

    public function __construct(\Model\SubmissionModel $sm)
    {
        $this->sm = $sm;
    }

    public function renderSubmittedPosts()
    {
        return '
            <fieldset>
                <legend><h3>Write something!</h3></legend>
                ' . $this->renderPosts() . '
                <br/>
                ' . $this->renderSubmissionInput() . '
            </fieldset>
        ';
    }

    private function renderPosts()
    {
        $posts = array();
        foreach ($this->sm->fetchPosts() as $key) {
            $posts[] = '<fieldset>' . $key . '</fieldset>';
        }
        return implode('<br/>', $posts);
    }

    private function renderSubmissionInput()
    {
        return '
            <form method="post">
                <input
                    type="text"
                    name="' . $this->submission . '"
                    value="' . $this->getSubmissionInput() . '"
                />
                <br/>

                <input
                    type="submit"
                    name="' . $this->post . '"
                    value="Submit post"
                />
            </form>
        ';
    }

    private function getSubmissionInput()
    {
        if (isset($_POST[$this->submission])) {
            return $_POST[$this->submission];
        }
    }

    public function submitPost()
    {
        if (isset($_POST[$this->post])) {
            return ($_POST[$this->post]);
        }
    }
}
