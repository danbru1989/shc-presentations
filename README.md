# SHC Presentations

This platform provides the ability to create auto-updating slideshow content by combining the power of HTML, CSS, PHP, and JavaScript to build dynamic, cloud-based presentations for the big screen. Basically, this means that once it is programmed, a presentation can build itself. New slides can be quickly added to a presentation by simply filling out an online form. Just about any device with a modern web browser can be used to display a presentation to a live audience.

## Powered By Reveal.js
[Reveal.js](https://revealjs.com/#/) is an open source HTML presentation framework. Detailed instructions on how to use Reveal.js can be found [on GitHub](https://github.com/hakimel/reveal.js). Reveal.js is 💥❗

## Powered By SHC Presentations Plugin
The [SHC Presentations Plugin](https://github.com/danbru1989/shc-presentations) bridges the gap between Reveal.js and your WordPress database. It provides a framework within WordPress for building Reveal.js presentations.
1. Creates a “Presentations” custom post type
2. Provides handy [actions and filters](https://developer.wordpress.org/plugins/hooks/) for use when building your own presentation
3. Applies a default presentation template that can be overridden by your theme
4. Removes theme resources when viewing a presentation to eliminate conflicts
5. Provides a copy / paste presentation template to help you get started

## Powered By WordPress
WordPress brings the power and flexibility of a database to your presentation content. This dynamic approach allows you to program with PHP a presentation that will auto-update with new content from the database. If you are an experienced WordPress theme developer, you will feel right at home creating powerful, dynamic presentations on this platform.

# Creating A Basic Presentation

It is possible to use Reveal.js to create a presentation within a GUI by using [Slides.com](https://slides.com/) or [this plugin](https://wordpress.org/plugins/slide/). However, coding your presentation provides the most flexibility. To get started, a basic knowledge of HTML is required.

1. Create a new presentation post within your WordPress dashboard.

2. Copy the custom-presentation.php template file from the SHC Presentations plugin folder, /includes/templates, into your WordPress child theme folder. Rename the template file to match the presentation post that you created.

   You will be utilizing the [WordPress Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) to view your custom presentations. If you created a presentation in Step 1 named "Example Presentation", then rename your copied custom-presentation.php to single-presentation-example-presentation.php. Because of the template hierarchy, WordPress will now load that file when you view your Example Presentation post.

3. Open single-presentation-example-presentation.php file in a text editor.

   You can configure your presentation with the "shcp_custom_config" filter, change the Reveal.js theme with the "shcp_theme" filter, and code your slides with the "shcp_slides" action. For further explanation on how to configure your presentation and create your slides, follow the documentation on the [Reveal.js GitHub repository](https://github.com/hakimel/reveal.js).

4. Add custom styles to your presentation with CSS.

   If you want to add some custom CSS to your presentation, [enqueue your CSS file](https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/) in your presentation template file (single-presentation-example-presentation.php) just as you would when building a custom WordPress theme. Be sure to add a priority of 999 to your enqueue hook to ensure that your custom styles do not get removed when SHC Presentations removes all other scripts and styles.

# Change Log
1.0.0 – Ititial launch.
