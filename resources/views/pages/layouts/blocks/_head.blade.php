<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	{{-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --}}

	{{-- Short description of the page (limit to 150 characters) --}}
	{{-- In *some* situations this description is used as a part of the snippet shown in the search results. --}}
	{{-- <meta name="description" content="@yield('APP_DESCRIPTION', env('APP_DESCRIPTION', 'A description of the page'))"> --}}
	<meta name="description" content="{{ $setting->description_site }}">
	<meta name="keywords" content="{{ $setting->keywords }}"/>

	{{-- Control the behavior of search engine crawling and indexing --}}
	<meta name="robots" content="index,follow,noodp">{{-- All Search Engines --}}
	<meta name="googlebot" content="index,follow">{{-- Google Specific --}}

	{{-- Short description of your site's subject --}}
	<meta name="subject" content="{{ $setting->description_site }}">

	{{-- Very short sentence describing the purpose of the website --}}
	<meta name="abstract" content="{{ $setting->description_site }}">

	{{-- Describes the topic of the website --}}
	<meta name="topic" content="{{ $setting->description_site }}">

	{{-- Brief summary of the company or purpose of the website --}}
	<meta name="summary" content="{{ $setting->description_site }}">

	@if(Route::is('offer'))

	{{-- Document Title --}}
	<title>{{ $setting->title_site }} - {{ $product->title }} - {{ $product->brand }}</title>

	<meta property="og:title" content="{{ $product->title }} - {{ $product->brand }}">
	<meta property="og:description" content="{!! $product->description !!}">
	<meta property="og:url" content="{{ route('offer', $product->slug) }}">
	<meta property="og:image" content="{{ $product->product() }}">
	<meta property="og:locale" content="pt_BR">
	<meta property="og:price:amount" content="{{ $product->price }}">
	<meta property="product:brand" content="{{ $product->brand }}">
	<meta property="product:availability" content="{{ $product->amount == 0 ? 'out of stock' : 'in stock' }}">
	<meta property="product:condition" content="new">
	<meta property="product:locale" content="pt_BR">
	<meta property="product:price:amount" content="{{ $product->price }}">
	<meta property="product:price:currency" content="BRL">
	<meta property="product:retailer_item_id" content="{{ $product->slug . '-' . $product->id }}">
	<meta property="product:sale_price:amount" content="{{ $product->price }}">
	<meta property="product:sale_price:currency" content="BRL">
	<meta property="product:catalog_id" content="{{ $product->slug . '-' . $product->id }}">
	<meta property="product:item_group_id" content="{{ $product->type->slug . '-' . $product->id }}">
	<meta property="product:category" content="{{ $product->type->title }}">

	{{-- <link href="https://plus.google.com/+YourPage" rel="publisher"> --}}
	<meta itemprop="name" content="{{ $setting->title_site }} - {{ $product->title }} - {{ $product->brand }}">
	{{-- <meta itemprop="name" content="@yield('PAGE_TITLE', env('APP_NAME', 'SITE'))"> --}}
	<meta itemprop="description" content="{{ $product->decription }}">
	{{-- <meta itemprop="description" content="@yield('APP_DESCRIPTION', env('APP_DESCRIPTION', 'A description of the page'))"> --}}
	<meta itemprop="image" content="{{ $product->product() }}">

	@else

	{{-- <meta property="fb:app_id" content="123456789"> --}}
	<meta property="og:url" content="@yield('PAGE_URL', request()->fullUrl())">
	<meta property="og:type" content="{{ env('OG_TYPE', 'website') }}">
	<meta property="og:title" content="{{ $setting->title_site }}">
	<meta property="og:image" content="@yield('PAGE_IMAGE')">
	<meta property="og:description" content="{{ $setting->description_site }}">
	<meta property="og:site_name" content="{{ env('APP_NAME', 'SITE') }}">
	<meta property="og:locale" content="pt_BR">
	{{-- Facebook: https://developers.facebook.com/docs/sharing/webmasters#markup --}}
	{{-- Open Graph: http://ogp.me/ --}}

	{{-- Document Title --}}
	<title>{{ $setting->title_site }}</title>

	{{-- <link href="https://plus.google.com/+YourPage" rel="publisher"> --}}
	<meta itemprop="name" content="{{ $setting->title_site }}">
	{{-- <meta itemprop="name" content="@yield('PAGE_TITLE', env('APP_NAME', 'SITE'))"> --}}
	<meta itemprop="description" content="{{ $setting->description_site }}">
	{{-- <meta itemprop="description" content="@yield('APP_DESCRIPTION', env('APP_DESCRIPTION', 'A description of the page'))"> --}}
	<meta itemprop="image" content="@yield('PAGE_IMAGE')">

	@endif

	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@yield('TWITTER_ACCOUNT', env('TWITTER_ACCOUNT'))">
	<meta name="twitter:url" content="@yield('PAGE_URL', request()->fullUrl())">
	<meta name="twitter:title" content="{{ $setting->title_site }}">
	<meta name="twitter:description" content="{{ $setting->description_site }}">
	<meta name="twitter:image" content="{{ storageImage('settings', $setting->image) }}">
	{{-- More info: https://dev.twitter.com/cards/getting-started --}}
	{{-- Validate: https://dev.twitter.com/docs/cards/validation/validator --}}

	{{-- Base URL to use for all relative URLs contained within the document --}}
	<base href="{{ env('APP_URL') }}/">

	{{-- Helps prevent duplicate content issues --}}
	<link rel="canonical" href="@yield('CANONICAL_URL', request()->fullUrl())">

	{{-- Links to the author of the document --}}
	<link rel="author" href="Heberty">

	{{-- Gives information about an author or another person --}}
	<link rel="me" href="http://www.heberty.com/" type="text/html">
	<link rel="me" href="mailto:web@heberty.com">
	<link rel="me" href="sms:+5584999475375">

	<link rel="stylesheet" href="{{ asset('/css/app.css') . '?id=' . time() }}">

	{{-- SE NECESSÁRIO UTILIZAR UM CSS ESPECÍFICO PARA ALGUMA PÁGINA --}}
	@yield('css')

	<style>
		.predominant-color {
			color: {{ $setting->predominant_color}} !important;
		}

		.predominant-bg {
			background-color: {{ $setting->predominant_color }} !important;
		}

		.secondary-color {
			background-color: {{ $setting->secondary_color }} !important;
		}

		.button-color {
			background-color: {{ $setting->button_color }} !important;
		}

		.button-color:hover {
		    filter: contrast(0.5);
		}

		.border-color {
			border-color: {{ $setting->predominant_color }} !important;
		}

		.pagination .page-item:first-child .page-link {
			border-radius: 20px 0 0 20px;
		}

		.pagination .page-item:last-child .page-link {
			border-radius: 0 20px 20px 0;
		}

		.pagination .page-item .page-link {
			color: {{ $setting->predominant_color }};
		}

		.pagination .page-item.active .page-link,
		.pagination .page-item:hover .page-link {
			background-color: {{ $setting->predominant_color }} !important;
			border-color: {{ $setting->secondary_color }} !important;
			color: #fff;
		}

		.form-site .form-group .input-group:after {
		    border-top: 10px solid {{ $setting->predominant_color }} !important;
		}

		.text-area strong,
		.text-area b {
			color: {{ $setting->predominant_color }};
		}

		.about-image {
			border: 5px solid {{ $setting->predominant_color }};
		}

		.list-categories .list-categories-item:hover,
		.list-categories .list-categories-item.active {
			background-color: {{ $setting->predominant_color }};
		} 

		.list-categories .list-categories-item:hover .list-categories-item-link,
		.list-categories .list-categories-item.active .list-categories-item-link {
			color: #fff;
		}

		.text-area ul li:before {
			background-color: {{ $setting->predominant_color }} !important;
		}

		.owl-carousel .owl-dot.active,
		.owl-carousel .owl-dot:hover {
			background-color: {{ $setting->predominant_color }} !important;
		}

		.network-welcome-item-link:hover i {
			color: {{ $setting->secondary_color }} !important;
		}
	</style>

	{{-- GERE OS ARQUIVOS E DESCOMENTE AS LINHAS --}}
	<link rel="apple-touch-icon" sizes="57x57" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ storageImage('settings', $setting->favicon ) }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ storageImage('settings', $setting->favicon )}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ storageImage('settings', $setting->favicon )}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ storageImage('settings', $setting->favicon )}}">
	<link rel="manifest" href="{{ asset('/images/favicon/manifest.json') }}">
	<meta name="msapplication-TileColor" content="{{ $setting->predominant_color }}">
	<meta name="msapplication-TileImage" content="{{ asset('/images/favicon/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="{{ $setting->predominant_color }}">
	
	@if(isset($setting->analytics) && !empty($setting->analytics))
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id={{ $setting->analytics }}"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '{{ $setting->analytics }}');
		</script>
	@endif
	
	@if(isset($setting->tagmanager) && !empty($setting->tagmanager))
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','{{ $setting->tagmanager }}');</script>
		<!-- End Google Tag Manager -->
	@endif

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v8.0" nonce="qMwBoliU"></script>
	<script>
		//Constrói a URL depois que o DOM estiver pronto
		document.addEventListener("DOMContentLoaded", function() {
		    //conteúdo que será compartilhado: Título da página + URL
		    var conteudo = encodeURIComponent(document.title + " " + window.location.href);
		    //altera a URL do botão
		    document.getElementById("whatsapp-share-btt").href = "https://api.whatsapp.com/send?text=" + conteudo;
		}, false);
	</script>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '307583510576708');
	fbq('track', 'PageView');
	fbq('track', 'ViewContent');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=307583510576708&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

	<!-- Facebook Pixel Code -->
	{{-- <script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '314026236578110');
		fbq('track', 'PageView');
		fbq('track', 'ViewContent');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=314026236578110&ev=PageView&noscript=1"
	/></noscript> --}}
	<!-- End Facebook Pixel Code -->
</head>
