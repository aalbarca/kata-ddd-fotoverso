<?php

namespace Netflie\Kata\Apps\Fotoverso\Controller;

use Netflie\Kata\Application\Feed\ShowFeed;

final class ShowFeedController
{
    public function __invoke(Request $request, ShowFeed $showFeed): Response
    {
        $logged_user = $request->get('logged_user');

        $feed = $showFeed($logged_user->id);

        return new Response($feed);
    }
}