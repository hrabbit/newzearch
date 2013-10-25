<?php

class Controller_News extends Controller_Base
{
    public function action_index()
    {
        $this->template->content = "Main news page";
    }
}