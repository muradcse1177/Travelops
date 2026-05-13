<div>
    @php($client = config('services.adsense.client'))
    @if(app()->environment('production') && $client && !empty($slot))
        <ins class="adsbygoogle"
             style="{{ $style }}"
             data-ad-client="{{ $client }}"
             data-ad-slot="{{ $slot }}"
             @if($responsive)
                 data-ad-format="{{ $format }}"
             data-full-width-responsive="true"
            @endif></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
</div>
