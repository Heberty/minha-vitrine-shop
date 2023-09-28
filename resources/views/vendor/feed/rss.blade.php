<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[{{ $meta['title'] }}]]></title>
        <link><![CDATA[{{ url($meta['link']) }}]]></link>
        <description><![CDATA[{{ $meta['description'] }}]]></description>
        <language>{{ $meta['language'] }}</language>
        <pubDate>{{ $meta['updated'] }}</pubDate>

        @foreach($items as $item)
            <item>
                <id><![CDATA[{{ $item->id }}]]></id>
                <title><![CDATA[{{ $item->title }}]]></title>
                <description><![CDATA[{!! $item->description !!}]]></description>
                <availability><![CDATA[in stock]]></availability>
                <condition><![CDATA[new]]></condition>
                <price><![CDATA[{{ $item->price }}]]></price>
                <link>{{ url($item->link) }}</link>
                <image_link>{{ url($item->image_link) }}</image_link>
                <brand><![CDATA[{{ $item->brand }}]]></brand>
                {{-- <author><![CDATA[{{ $item->author }}]]></author>
                <guid>{{ url($item->id) }}</guid>
                <pubDate>{{ $item->updated->toRssString() }}</pubDate> --}}
                @foreach($item->category as $category)
                    <category>{{ $category }}</category>
                @endforeach
            </item>
        @endforeach
    </channel>
</rss>
