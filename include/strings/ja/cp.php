<?php

class cp
{
    const page_title="コントロール パネル";
    const login_title="ログイン";
    const via_web="Web経由でログイン";
    const via_app="アプリ経由でログイン";
    static function loginmsg($app){
        return "アプリ「".$app."」へのログイン";
    }
}