=== Very Simple Event List ===
Contributors: Guido07111975
Version: 12.0
License: GNU General Public License v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 7.1
Requires at least: 5.3
Tested up to: 5.5
Stable tag: trunk
Tags: simple, event, events, event list, event manager


This is a lightweight plugin to create a customized event list. Add the shortcode on a page or use the widget to display your events.


== Description ==
= About =
This is a lightweight plugin to create a customized event list.

Add the shortcode on a page or use the widget to display your events.

You can personalize your event list via the settingspage or by adding attributes to the shortcode or the widget.

= How to use =
After installation go to menu item "Events" and start adding your events.

Create a page and:

* Add shortcode `[vsel]` to display upcoming events (including today)
* Add shortcode `[vsel-past-events]` to display past events
* Add shortcode `[vsel-current-events]` to display current events
* Add shortcode `[vsel-all-events]` to display all events

Or go to Appearance > Widgets and use the widget to display your events.

= Settingspage =
You can personalize your event list via the settingspage. This page can be found via Settings > VSEL.

Several settings can be overridden when using the relevant (shortcode) attributes below.

This can be useful when having multiple event lists on your website.

= Shortcode attributes =
You can also personalize your event list by adding attributes to the 4 shortcodes mentioned above.

* Change the number of events per page: `posts_per_page="5"`
* Pass over one or multiple events: `offset="1"`
* Change date format: `date_format="j F Y"`
* Display events from a certain category: `event_cat="your-category-slug"`
* Display events from multiple categories: `event_cat="your-category-slug-1, your-category-slug-2"`
* Change order of the upcoming and current events list: `order="desc"`
* Change order of the past and all events list: `order="asc"`
* Change text if there are no events: `no_events_text="your text here"`
* Change CSS class of the event list: `class="your-class-here"`
* Disable the event title link: `title_link="false"`
* Disable featured image: `featured_image="false"`
* Disable pagination: `pagination="false"`

Examples:

* One attribute: `[vsel posts_per_page="5"]`
* One attribute: `[vsel-past-events event_cat="your-category-slug"]`
* Multiple attributes: `[vsel posts_per_page="5" event_cat="your-category-slug" class="your-class-here"]`

= Widget attributes =
The widget supports the same attributes. You don't have to add the main shortcode tag or the brackets.

Examples:

* One attribute: `posts_per_page="5"`
* Multiple attributes: `posts_per_page="5" event_cat="your-category-slug" class="your-class-here"`

= Event dates =
Settingspage contains a setting that makes it possible to add events with one date, instead of start date and end date.

This has no effect on existing events and you can always turn back to previous format again.

But when resaving an existing event that has different dates, start date will be overridden by end date.

= Featured image =
WordPress creates duplicate images in different sizes upon upload. These sizes can be set via Settings > Media.

By default the "post-thumbnail" size of your theme is being used as source for the featured image.

And the maximum width of the featured image is by default 40% of the event info area.

You can change the featured image size and maximum width via Settings > VSEL. Use both settings together, in order to get the size you want.

The featured image on the single event page is handled by your theme.

= Advanced Custom Fields =
You can add extra fields to the meta section by using the [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields) plugin. The most commonly used fields are supported.

Create a field group for post type "event" and add fields to this group. This field group will be added to the single event page in dashboard.

The extra fields are displayed in the frontend of your website underneath the location field.

= Native support =
Plugin has basic support for theme template files that are being used for the single event page, the event category page, the post type (event) archive page and the search results page.

Support for the single event page is needed, but support for the other 3 pages is mainly added to support the Elementor page builder plugin. Don't use these 3 pages to list events, because events will not be ordered by event date.

More info about the single event page is listed underneath.

Plugin activates the post attributes box in the editor.

Plugin makes it possible to add events and event categories to your menu via the menu page.

Both features above are mainly added to support the Elementor page builder plugin.

In the post attributes box you can set a custom order for events with the same date.

= Single event =
In most cases PHP file "single" is being used for the single event page. This file is located in your theme folder.

Because a theme file is being used, it might not be displayed properly.

If you want to customize it and using custom CSS is not enough, you can add a PHP file called "single-event" in your (child) theme folder and customize it to your needs.

= Uninstall =
If you uninstall plugin via dashboard all events and settings will be removed from database.

All posts of the (custom) post type "event" will be removed.

You can avoid this via Settings > VSEL.

= Question? =
Please take a look at the FAQ section.

= Translation =
Not included but plugin supports WordPress language packs.

More [translations](https://translate.wordpress.org/projects/wp-plugins/very-simple-event-list) are very welcome!

= Credits =
Without the WordPress codex and help from the WordPress community I was not able to develop this plugin, so: thank you!

Enjoy!


== Installation ==
Please check Description section for installation info.


== Frequently Asked Questions ==
= About the FAQ =
The FAQ applies to the most recent plugin version, as they are regularly updated to include support for newly added or changed plugin features.

= How can I change date format? =
By default plugin uses date format set in Settings > General.

But you can change this for the frontend of your website via Settings > VSEL or by using an attribute.

The datepicker and date input field only support 2 numeric date formats: "day-month-year" (30-01-2016) and "year-month-day" (2016-01-30).

If date format from Settings > General does not match, it will be changed into 1 of the 2 above.

= How do I set plugin language? =
Plugin will use the website language, set in Settings > General.

If plugin isn't translated into this language, language fallback will be English.

= What do you mean with current events? =
Current events are events you can visit today. So this can be an one-day or multi-day event.

= Are events also listed on time? =
No, this is not possible because input field for time is a regular text input.

In the post attributes box you can set a custom order for events with the same date.

= Can I hide certain event meta on the single event page? =
This is not possible via Settings > VSEL. You should use custom CSS for that.

= Can I change the colors of the date icon? =
This is not possible via Settings > VSEL. You should use custom CSS for that.

Change background and text color of whole icon: `.vsel-start-icon, .vsel-end-icon {background:#eee; color:#f26535;}`

Change background and text color of top part: `.vsel-day-top, .vsel-month-top {background:#f26535; color:#eee;}`

= Can I override plugin template via my (child) theme? =
No, this is not possible. But you can override the single event page via your (child) theme.

= What does "Link to more info" mean? =
While adding an event you can add a link (an URL) to a post, page or website.

This can be useful in case additional info is available elsewhere.

= What does "Link to all events" mean? =
While adding a widget you can add a link (an URL) to a page with all events.

This can be useful because in most cases you only list a few events in a widget area.

= Why no pagination in widget? =
Pagination is not working properly in a widget.

But you can set a link to a page with all events.

= Why no pagination when using the offset attribute? =
Offset breaks pagination, so that's why pagination is being disabled when using offset.

= Why does the offset attribute have no effect? =
Offset is being ignored when attribute "posts_per_page" has value "-1" (show all events).

= Why is the page with all events not displayed properly? =
This applies to pages where you have added the shortcode.

When using the block editor, go to the page in your dashboard and check the shortcode in "Edit as HTML" mode.

When using the classic editor, go to the page in your dashboard and check the shortcode in "Text" mode.

It might be accidentally wrapped in HTML tags, such as: `<script>[vsel]</script>`

You should remove the HTML tags and resave the page.

= Can the URL of the page with all events end with "event"? =
No, this will cause a conflict with the post type (event) archive page.

You should change this so called "slug" into something else. This can be done by changing the permalink of your events page.

= Why a 404 (nothing found) when I click the title link? =
This is mostly caused by the permalink settings. Please resave the permalinks via Settings > Permalinks.

= Why a 404 (nothing found) when I click the event category link? =
This is mostly caused by the permalink settings. Please resave the permalinks via Settings > Permalinks.

= Can I add multiple shortcodes on the same page? =
This is possible but to avoid a conflict I recommend to disable the pagination. This can be done via Settings > VSEL or by using an attribute.

= Why an error notification instead of a date? =
An error notification is displayed in case of a missing date or when start date begins after end date. To solve this please reset date.

= Why no start date in dashboard? =
All events posted with plugin version 4.0 and older have one date only. To solve this please reset date.

= Why no meta, image or categories box in the editor? =
When using the block editor, click the tools and options button and select "Options".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= Why no Advanced Custom Fields field group in the editor? =
When using the block editor, click the tools and options button and select "Options".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= How does plugin hook into theme template files? =
Plugin only hooks into the native `the_content()` and `the_excerpt()` function. It has no control over anything outside this section.

In some cases there's a conflict with your theme or page builder plugin. That's why you can disable support for theme template files via Settings > VSEL.

= Does this plugin have its own events block? =
No, it does not have its own events block and I'm not planning to add this feature.

= Does plugin support iCal? =
No, because to support the iCal structure there should be input fields for start time and end time.

= Why no Semantic versioning? =
At time of initial plugin release I wasn't aware of the Semantic versioning (sequence of three digits).

= How can I make a donation? =
You like my plugin and you're willing to make a donation? Nice! There's a PayPal donate link at my website.

= Other question or comment? =
Please open a topic in plugin forum.


== Changelog ==
= Version 12.0 =
* New: setting to show a date icon instead of a label

= Version 11.9 =
* New: you can set a custom order for events with the same date
* This can be useful when having multiple events on the same day

= Version 11.8 =
* New: attribute to set date format per event list

= Version 11.7 =
* New: setting to disable the single event page
* This can be useful when not using this page
* And to avoid this page to be listed in results of search engines
* Fix: ACF mailto link

= Version 11.6 =
* Fix: pagination

For all versions please check file changelog.


== Screenshots ==
1. Very Simple Event List all events (Twenty Nineteen theme).
2. Very Simple Event List all events (Twenty Nineteen theme).
3. Very Simple Event List single event (Twenty Nineteen theme).
4. Very Simple Event List widget (Twenty Nineteen theme).
5. Very Simple Event List all events (dashboard).
6. Very Simple Event List single event (dashboard).
7. Very Simple Event List widget (dashboard).
8. Very Simple Event List settingspage (dashboard).
9. Very Simple Event List settingspage (dashboard).
10. Very Simple Event List settingspage (dashboard).
11. Very Simple Event List settingspage (dashboard).