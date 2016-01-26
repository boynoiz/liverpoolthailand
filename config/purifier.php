<?php

return [

    'encoding' => 'UTF-8',
    'finalize' => true,
    'preload'  => false,
    'cachePath' => storage_path('purifier'),
    'settings' => [
        'default' => [
            'HTML.Doctype'             => 'XHTML 1.0 Strict',
            'HTML.Allowed'             => 'b,i,em,ul,ol,li',
            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
            'AutoFormat.AutoParagraph' => false,
            'AutoFormat.RemoveEmpty'   => true,
            'Core.LexerImpl'           => 'DirectLex',
        ],
        'test' => [
            'Attr.EnableID' => true
        ],
        "youtube" => [
            "HTML.SafeIframe" => 'true',
            "URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%",
        ],
    ],

];
