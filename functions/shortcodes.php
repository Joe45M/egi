<?php



// Native google ad, bidvertiser rejected us =(
add_shortcode('bidvertiser', function () {
    return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="7641940191"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});


// Native add
add_shortcode('ad', function () {
    return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6764478945960117"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="7641940191"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

add_shortcode('author_ad', function () {
    return '<!-- Author ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="3384451209"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

// article ad
add_shortcode('ad_2' , function () {
    return '<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="2742820353"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

// article ad
add_shortcode('ad_3' , function () {
    return '<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="5063530238"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});

// article ad
add_shortcode('ad_4' , function () {
    return '<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="3429731355"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});
// article ad
add_shortcode('ad_5' , function () {
    return '<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-6764478945960117"
     data-ad-slot="5923769426"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>';
});




// Article short codes

add_shortcode('pe_image', function () {
    $list = [
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/Pocket_Edition_1.1.5.webp',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/1958fac6-abf0-11ed-b444-02420a000134.webp',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/Pocket_Edition_0.9.0.webp'
    ];

    $url = $list[array_rand($list)];

    return "<img src='$url' alt='Minecraft PE Pocket Edition EGI'>";
});


add_shortcode('wifi_img', function ($atts = []) {
    $list = [
        'https://elitegamerinsights.com/wp-content/uploads/2023/06/isp-1.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/06/Hyperoptic-VW-Crafters.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/06/About-us-desktop-image-2-1.jpg'
    ];

    $url = $list[array_rand($list)];

    if ($atts) {
        $url = $atts['url'];
    }

    return "<img src='$url' alt='Image Alt Elite Gaming Insights, call of duty & guides'>";
});

add_shortcode('cod_image', function () {
    $list = [
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/Call-of-Duty-Warzone-Mobile-release-date-19c2f9e.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/4-11-cod-hub_wz-tac-sm-tout.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/cod-news.jpeg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/call-of-duty-modern-warfare-button-01-1559237615728.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/d2e74bfc-22e1-4985-860f-dc76d69e5b8f.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/CODMS3patchnotesinsidemode.webp',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/call-of-duty-modern-warfare-2-key-art-1663249948.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/CoD-2023-Jupiter.jpg',
        'https://elitegamerinsights.com/wp-content/uploads/2023/05/cod-redeem-codes-2.jpg',
    ];

    $url = $list[array_rand($list)];

    return "<img src='$url' alt='Call of Duty Image, EGI Elite gamer insights'>";
});

?>
