@php
$setting = App\Setting::first();
@endphp
<meta name="description" content="{{ $setting->description }}">
<meta name="keyword" content="{{ $setting->seo_keyword }}">

<!-- Google / Search Engine Tags -->
<meta itemprop="description" content="{{ $setting->description }}">
<meta itemprop="image" content="{{ asset('storage/' . $setting->image) }}">

<!-- Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{ $setting->description }}">
<meta property="og:image" content="{{ asset('storage/' . $setting->image) }}">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:description" content="{{ $setting->description }}">
<meta name="twitter:image" content="{{ asset('storage/' . $setting->image) }}">
