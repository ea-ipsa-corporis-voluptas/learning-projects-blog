<?php

namespace App\Services;

interface Newsletter
{
    public function ping();
    public function set_subscription(string $email, ? string $list = null, string $name);
    public function unset_subscription(string $email, ? string $list = null);
    public function update_subscription_status(string $email, ? string $list = null, string $status);
    public function is_subscribed(string $email, ? string $list = null);
    public function set_tag(string $email, ? string $list = null, string $tag);
    public function unset_tag(string $email, ? string $list = null, string $tag);
    public function get_tags(string $email, ? string $list = null);

}