<?php

return [
    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Product@getAllFeeds',

            /*
             * The feed will be available on this url.
             */
            'url' => '/xml',

            'title' => 'XML Instagram Shop',
            'description' => 'Este é um arquivo de XML voltado para a criação de catálogo do Instagram Shop.',
            'language' => 'pt-BR',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::rss',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],
    ],
];
