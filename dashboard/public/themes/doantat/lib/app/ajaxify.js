/*-----------------------------------------------------------------------------------*/
/* Theme Ajax   */
/*-----------------------------------------------------------------------------------*/

// Ajaxify
// v1.0.1 - 30 September, 2012
// https://github.com/browserstate/ajaxify
//Version 1.5.1

(function(window,undefined){
    // Prepare our Variables
    var
        History = window.History,
        $ = window.jQuery,
        document = window.document;

    // Check to see if History.js is enabled for our Browser
    if ( !History.enabled ) return false;

    // Disable if modernizr doesn't detect history management
    if (!Modernizr.history) {
        return false;  //abort
    }


    // Prepare Variables
    var
        /* Application Specific Variables */
        contentSelector = '#mainContainer',
        $content = $(contentSelector).filter(':first'),
        contentNode = $content.get(0),
        $menu = $('#menu,#nav,nav:first,.nav:first').filter(':first'),
        activeClass = 'active selected current youarehere',
        activeSelector = '.active,.selected,.current,.youarehere',
        menuChildrenSelector = '> li,> ul > li',
        completedEventName = 'statechangecomplete',
        /* Application Generic Variables */
        $window = $(window),
        $body = $(document.body),
        rootUrl = History.getRootUrl(),
        scrollOptions = {
            duration: 800,
            easing:'swing'
        };


    // Ensure Content
    if ( $content.length === 0 ) $content = $body;

    // Internal Helper
    $.expr[':'].internal = function(obj, index, meta, stack){
        // Prepare
        var
            $this = $(obj),
            url = $this.attr('href')||'',
            isInternalLink;

        // Check link
        isInternalLink = url.substring(0,rootUrl.length) === rootUrl || url.indexOf(':') === -1;

        // Ignore or Keep
        return isInternalLink;
    };

    // HTML Helper
    var documentHtml = function(html){
        // Prepare
        // replaces doctype, html head body tags with div
        var result = String(html).replace(/<\!DOCTYPE[^>]*>/i, '')
            .replace(/<(html|head|body|title|script)([\s\>])/gi,'<div id="document-$1"$2')
            .replace(/<\/(html|head|body|title|script)\>/gi,'</div>');
        // Return
        return result;
    };

    // Ajaxify Helper
    $.fn.ajaxify = function(){
        // Prepare
        var $this = $(this);

        var $allow = 'a:internal:not(.no-ajaxify, a[href^="#"], a[href*="wp-login"], a[href*="wp-admin"]), a.ajaxify';
        var $styleInline = $('#elementor-frontend-inline-css');
        // Ajaxify
        $this.find($allow).click(function(event){
            // Prepare
            var
                $this	= $(this),
                url		= $this.attr('href'),
                title 	= $this.attr('title') || null;

            // If it's a comment link continue as normal
            if (url.toLowerCase().indexOf('#comment') >= 0) {
                return true;
            }

            // Continue as normal for cmd clicks etc
            if ( event.which == 2 || event.metaKey ) return true;

            // Ajaxify this link
            History.pushState(null,title,url);

            if ($(window).width() >= 992) {
                $('.sub-menu').css('display', 'none');
            }

            $('.menu-backdrop').removeClass('backdrop-show');

            if ($(window).width() <= 768) {
                $('.menu-backdrop').hide();
                $('.site-main-navigation').hide();
            }

            if ($styleInline.length > 0) {
                $styleInline.remove();
            }
            $('#elementor-style').remove();

            event.preventDefault();
            return false;
        });
        // Chain
        return $this;
    };

    // Ajaxify our Internal Links
    $body.ajaxify();

    // Hook into State Changes
    $(window).bind('statechange',function(){
        // Prepare Variables
        var
            State 		= History.getState(),
            url			= State.url,
            relativeUrl = url.replace(rootUrl,'');

        // Start Fade Out
        // Animating to opacity to 0 still keeps the element's height intact
        // Which prevents that annoying pop bang issue when loading in new content
        // Let's add some cool animation here

        var targetElem = $content.children('.main-wrapper');

        targetElem.css({
            'transform': 'translateY(100%)',
            'opacity' : '0',
            'transition': 'all 350ms linear 0s'
        }, function () {
            jQuery('html, body').animate({
                scrollTop: 0
            }, 800);
        })

        // Ajax Request the Traditional Page
        $.ajax({
            url: url,
            success: function(data, textStatus, jqXHR){
                // Prepare
                var
                    $data 			= $(documentHtml(data)),
                    $dataBody		= $data.find('#document-body:first ' + contentSelector),
                    bodyClasses 	= $data.find('#document-body:first').attr('class'),
                    contentHtml,
                    $style          = $data.find('#elementor-frontend-inline-css').text(),
                    $scripts;


                // Fetch the content
                contentHtml = $dataBody.html()|| $data.html();

                if ( !contentHtml ) {
                    document.location.href = url;
                    return false;
                }

                // Update the content
                $content.stop(true,true);
                $content.html(contentHtml)
                    .ajaxify()

                // Update the title
                document.title = $data.find('#document-title:first').text();

                try {
                    document.getElementsByTagName('title')[0].innerHTML = document.title.replace('<','&lt;').replace('>','&gt;').replace(' & ',' &amp; ');
                }
                catch ( Exception ) {
                    console.log(Exception)
                }

                $('body').append(
                    '<link id="elementor-style" rel="stylesheet" href="http://athanoi.com/wp-content/plugins/elementor/assets/css/frontend.min.css"></link>' +
                    '<style id="elementor-frontend-inline-css" type="text/css">' + $style + '</style>'
                )

                // Add the body scripts
                // $scripts.each(function(){
                //
                //     var $script = $(this), scriptText = $script.text(), scriptNode = document.createElement('script');
                //
                //     if ( $script.attr('src') ) {
                //         if ( !$script[0].async ) { scriptNode.async = false; }
                //         scriptNode.src = $script.attr('src');
                //     }
                //     try {
                //         // doesn't work on ie...
                //         scriptNode.appendChild(document.createTextNode(scriptText));
                //         contentNode.appendChild(scriptNode);
                //     } catch(e) {
                //         // IE has funky script nodes
                //         scriptNode.text = scriptText;
                //         contentNode.appendChild(scriptNode);
                //     }
                // });

                // Inform Google Analytics of the change
                if ( typeof window.pageTracker !== 'undefined' ) window.pageTracker._trackPageview(relativeUrl);

                // Inform Google Analytics of the change
                if ( typeof window._gaq !== 'undefined' ) {
                    window._gaq.push(['_trackPageview', relativeUrl]);
                }

                // Inform ReInvigorate of a state change
                if ( typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined' )
                    reinvigorate.ajax_track(url);// ^ we use the full url here as that is what reinvigorate supports
            },
            error: function(jqXHR, textStatus, errorThrown){
                document.location.href = url;
                return false;
            }

        }); // end ajax

    }); // end onStateChange

})(window); // end closure