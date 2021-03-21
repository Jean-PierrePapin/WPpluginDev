<?php
/**
 * @package Hello_Boom
 * @version 1.0.0
 */
/*
Plugin Name: Hello Boom Boom Boom
Plugin URI: NA
Description: This is not just a plugin, it symbolizes the song lyrics from the Black Eye Pease in 2009. 
When activated you will randomly see a lyric from <cite>Welcome</cite> in the upper right of your admin screen on every page.
Author: Jean-Pierre Papin
Version: 1.0.0
Author URI: NA
*/


function hello_boom_get_lyric() {
    /** These are the lyrics to Boom Boom Pow */
    $lyrics = "
    Welcome
    Welcome to The E.N.D
    Do not panic, there is nothing to fear
    Everything around you is changing
    Nothing stays the same
    This version of myself is not permanent
    Tomorrow, I will be different
    The energy never dies
    Energy cannot be destroyed, or created
    It always is, and it always will be
    This is the end, and the beginning..
    Forever infinite
    Welcome

    Gotta get that
    Gotta get that
    Gotta get that
    Gotta get that, that, that, that, that

    Boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    That boom boom boom
    That boom boom boom
    Boom boom boom
    
    Yo, I got that hit to beat the block
    You can get that bass on below
    I got that rock 'n' roll, that future flow
    That digital spit, next level visual shit
    I got that boom boom boom
    How the beat bang? Boom boom boom

    
    I like that boom boom pow
    Them chickens jackin' my style
    They try to copy my swagger
    I'm on that next shit now
    I'm so three thousand and eight
    You so two thousand and late
    I got that boom boom boom
    That future boom boom boom
    Let me get it now

    
    Boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    That boom boom boom
    That boom boom boom
    Boom boom boom
    
    I'm on that supersonic boom
    Y'all hear that spaceship zoom
    When I step inside the room
    Them girls go apeshit, mmm
    Y'all stuck on Super 8 shit
    That lo-fi stupid 8-bit
    I'm on that HD flat
    This beat go boom boom bap

    
    I'm a beast when you turn me on
    Into the future, cybertron
    Harder, faster, better, stronger
    Sexy ladies, extra longer
    'Cause we got the beat that bounce
    We got the beat that pound
    We got the beat, that 808
    That boom boom in your town

    
    People in the place
    If you wanna get down
    Put your hands in the air
    ​will.i.am., drop the beat now
    Yup, yup
    I be rockin' them beats
    Yup, yup
    I be rockin' them beats
    Y-yup, yup, yup, ha, ha, ha
    
    Here we go, here we go, satellite radio
    Y'all gettin' hit wit' the (Boom, boom!)
    Beats so big, I'm steppin' on leprechauns
    Shittin' on y'all wit' the (Boom, boom!)
    Shittin' on y'all wit' the (Boom, boom!)
    Shittin' on y'all wit' the
    This beat be bumpin', bumpin'
    This beat go boom boom
    Let the beat rock
    Let the beat rock
    Let the beat rock
    This beat be bumpin', bumpin'
    This beat go boom boom

    
    I like that boom boom pow
    Them chickens jackin' my style
    They try to copy my swagger
    I'm on that next shit now
    I'm so three thousand and eight
    You so two thousand and late
    I got that boom boom boom
    That future boom boom boom
    Let me get it now

    
    Boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    Gotta get that boom boom boom
    That boom boom boom
    That boom boom boom
    Boom boom boom

    
    Let the beat rock (Let the beat rock)
    Let the beat rock (Let the beat...)
    Let the beat rock (Let the beat rock, rock, rock...)
    ";

    // Here we split it into lines.
    $lyrics = explode( "\n", $lyrics );

    // And then randomly choose a line.
    return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_boom() {
    $chosen = hello_boom_get_lyric();
    $lang = '';
    if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
        $lang = ' lang="en"';
    }

    printf(
        '<p id="boom"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
        __( 'Quote from Hello Boom Boom Pow song, by Black Eye Pease', 'Boom Boom Pow' ),
        $lang,
        $chosen
    );


}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_boom' );

// We need some CSS to position the paragraph.
function boom_css() {
    echo "
    <style type='text/css>
    #boom {
        float: right;
        padding: 5px 10px;
        margin: 0;
        font-size: 12px;
        line-height: 1.6666;
    }
    .rtl #boom {
        float: left;
    }
    .block-editor-page #boom {
        display: none;
    }
    @media screen and (max-width: 782px) {
        #boom,
        .rtl #boom { 
            float: none;
            padding-left: 0;
            padding-right: 0;
        }
    }
    </style>
    ";
}

add_action( 'admin_head', 'boom_css' );