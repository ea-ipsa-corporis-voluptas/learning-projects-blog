<?php

namespace App\Services;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected \MailchimpMarketing\ApiClient $client) {}





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  PING MAILCHIMP
    //
    public function ping()
    {
        return $this->client
            ->ping
            ->get();
        //  EXAMPLE RESPONSE :
        //
        // {
        //     "health_status": "\"Everything's Chimpy!\""
        // }
        //
        //------------------------------------------------
        //------------------------------------------------
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SET !NEW! SUBSCRIPTION
    //
    public function set_subscription(string $email, ? string $list = null, string $name)
    {
        $list ??= $this->subscribers_list();
        if($name)
        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed',
            'merge-fields' => [
                'FNAME' => $name
            ]
        ]); //  EXAMPLE RESPONSE :
        //
        // email hash
        //
        //------------------------------------------------
        //------------------------------------------------
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  UNSET SUBSCRIPTION
    //
    public function unset_subscription(string $email, ? string $list = null)
    {
        $list ??= $this->subscribers_list();
        $this->client->lists->updateListMember(
            $list,
            $this->set_hash($email),
            [
                'status' => 'unsubscribed'
            ]
        );
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SET / EDIT SUBSCRIPTION
    //
    public function update_subscription_status(string $email, ? string $list = null, string $status)
    {
        $list ??= $this->subscribers_list();
        return $this->client->lists->setListMember(
            $list,
            $this->set_hash($email),
            [
                "email_address" => request('email'),
                "status" => $status
            ]
        );
    }




    
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET SUBSCRIPTION STATUS
    //
    public function is_subscribed(string $email, ? string $list = null)
    {
        $list ??= $this->subscribers_list();
        return $this->client
            ->lists
            ->getListMember($list, $this->set_hash($email));
        //  RETURN TYPES :
        //
        // SUBSCRIBED
        // UNSUBSCRIBED
        // PENDING
        // CLEANED ?? BOUNCED
        //
        //------------------------------------------------
        //------------------------------------------------
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SET MEMBER TAG
    //
    public function set_tag(string $email, ? string $list = null, string $tag)
    {
        $list ??= $this->subscribers_list();
        return $this->client->lists->updateListMemberTags(
            $list,
            $this->set_hash($email),
            [
                'tags' => [
                    [
                        'name' => $tag,
                        'status' => 'active'
                    ]
                ]
            ]
        );//    RETURN TYPE : NULL
        //
        //------------------------------------------------
        //------------------------------------------------
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  UNSET MEMBER TAG
    //
    public function unset_tag(string $email, ? string $list = null, string $tag)
    {
        $list ??= $this->subscribers_list();
        return $this->client->lists->updateListMemberTags(
            $list,
            $this->set_hash($email),
            [
                'tags' => [
                    [
                        'name' => $tag,
                        'status' => 'inactive'
                    ]
                ]
            ]
        ); // RESPONSE EXAMPLE:
        //
        // NULL
        //
        //------------------------------------------------
        //------------------------------------------------
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET MEMBER TAGS
    //
    public function get_tags(string $email, ? string $list = null)
    {
        $list ??= $this->subscribers_list();
        return $this->client
            ->lists
            ->getListMemberTags($list, $this->set_hash($email));
        //  RETURN TYPE EXAMPLE :
        //
        // {
        //     "tags": [
        //         {
        //             "id": 10297,
        //             "name": "Influencer",
        //             "date_added": "2018-07-16 19:49:42"
        //         },
        //         {
        //             "id": 10125,
        //             "name": "Tech",
        //             "date_added": "2018-07-12 14:53:18"
        //         }
        //     ],
        //     "total_items": 2
        // }
        //
        //------------------------------------------------
        //------------------------------------------------
    }





    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  SET HASH
    //
    protected function set_hash($email)
    {
        return md5(\Illuminate\Support\Str::lower($email));
    }
    //
    //------------------------------------------------
    //------------------------------------------------
    //
    //                  GET SUBSCRIBERS LIST ID
    //
    protected function subscribers_list()
    {
        return config('services.mailchimp.lists.subscribers');
    }
}