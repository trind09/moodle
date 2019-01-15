<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The two column layout.
 *
 * @package   theme_clean
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_clean_get_html_for_settings($OUTPUT, $PAGE);

// Set default (LTR) layout mark-up for a two column page (side-pre-only).
$regionmain = 'span9 pull-right';
$sidepre = 'span3 desktop-first-column';
// Reset layout mark-up for RTL languages.
if (right_to_left()) {
    $regionmain = 'span9';
    $sidepre = 'span3 pull-right';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .FirstMenu {
	        vertical-align: bottom;
	        padding: 10px;
	        padding-left: 20px;
	        background: #004DA4;
	        font-weight: bold;
	        color: white;
	        font-family: Time New Roman;
	        width: 12.5%;
        }

        .SecondMenu {
	        vertical-align: bottom;
	        padding: 10px;
	        padding-left: 20px;
	        background: #004DA4;
	        font-weight: bold;
	        color: white;
	        font-family: Time New Roman;
	        width: 14.28571428571429%;
        }

        .LogoCell {
	        background-image: linear-gradient(white, #DEF0F4); vertical-align: middle; text-align: left; padding: 20px;
        }

        .MenuLink {
	        text-decoration: none; color: white;
        }
    </style>
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top<?php echo $html->navbarclass ?> moodle-has-zindex">
    <table style="border: 0px; margin-top: -60px;" width="100%" cellspacing="0" cellpadding="0">
	    <tr>
		    <td class="FirstMenu"><a href="#" class="MenuLink">School of<br>
		    Health Sciences</a></td>
		    <td class="FirstMenu"><a href="#" class="MenuLink">Academics</a></td>
		    <td class="FirstMenu"><a href="#" class="MenuLink">Faculty &amp; Staff</a></td>
		    <td class="FirstMenu"><a href="#" class="MenuLink">Research</a></td>
		    <td class="FirstMenu"><a href="#" class="MenuLink">Centers &amp; Divisions</a></td>
		    <td class="FirstMenu"><a href="#" class="MenuLink">Community</a></td>
		    <td class="FirstMenu"><a href="#" class="MenuLink">Feedback</a></td>
		    <td class="FirstMenu"><a href="#" class="MenuLink">Contact</a></td>
	    </tr>
	    <tr>
		    <td colspan="8">
			    <table style="border: 0px;" width="100%" cellspacing="0" cellpadding="0">
				    <tr>
					    <td class="LogoCell">
						    <a class="brand" href="<?php echo $CFG->wwwroot;?>" title="<?php echo
		                    format_string($SITE->shortname, true, array('context' => context_course::instance(SITEID)));
		                    ?>"><img border="0" src="http://elearning-medvnu.edu.vn/images/school3.jpg" width="593" height="68"></a>
		                </td>
					    <td class="LogoCell">
					    <img border="0" src="http://elearning-medvnu.edu.vn/images/school2.jpg" width="67" height="106"></td>
				    </tr>
			    </table>
		    </td>
	    </tr>
	    <tr>
		    <td colspan="8">
			    <table style="border: 0px;" width="100%" cellspacing="0" cellpadding="0">
				    <tr>
					    <td class="SecondMenu">
						    <a class="brand" href="<?php echo $CFG->wwwroot;?>" title="<?php echo
		                    format_string($SITE->shortname, true, array('context' => context_course::instance(SITEID)));
		                    ?>"><img border="0" src="http://elearning-medvnu.edu.vn/images/home-xxl.png" width="26" height="25"></a>
					    </td>
					    <td class="SecondMenu"><a href="#" class="MenuLink">About</a></td>
					    <td class="SecondMenu"><a href="#" class="MenuLink">Student Services</a></td>
					    <td class="SecondMenu"><a href="#" class="MenuLink">Courses</a></td>
					    <td class="SecondMenu"><a href="#" class="MenuLink">Campus Life</a></td>
					    <td class="SecondMenu"><a href="#" class="MenuLink">News</a></td>
					    <td class="SecondMenu"><a href="#" class="MenuLink">English Forum</a></td>
				    </tr>
			    </table>
		    </td>
	    </tr>
        <tr>
			<td colspan="8">
                <table style="border: 0px;" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <div class="nav-collapse collapse" style="padding-top:25px;">
			                    <?php echo $OUTPUT->custom_menu(); ?>
			                    <ul class="nav pull-right">
			                        <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
			                    </ul>
			                </div>
                        </td>
                        <td>
                            <?php echo $OUTPUT->user_menu(); ?>
                        </td>
                    </tr>
                </table>
			</td>
		</tr>
    </table>
</header>

<div id="page" class="container-fluid">
    <?php echo $OUTPUT->full_header(); ?>
    <div id="page-content" class="row-fluid">
        <section id="region-main" class="<?php echo $regionmain; ?>">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php echo $OUTPUT->blocks('side-pre', $sidepre);
        ?>
    </div>

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
