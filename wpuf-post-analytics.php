<?php
/*
Plugin Name: WPUF Post Analytics
Plugin URI: https://wordpress.org/plugins/wpuf-post-views/
Description: Show post view and comment counts on frontend user dashboard.
Version: 1.0
Author: Sekander Badsha
Author URI: http://sekander.pro/
License: GPL2
*/

/**
 * Copyright (c) 2015 weDevs (email: info@wedevs.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

/**
 * Add column headers in dashboard table for Post Views and Comment Counts
 *
 * @param array $args dashboard query arguments
 * @return void
 */
function wpufpa_add_cols( $args ) {
    printf( '<th>%s</th>', __( 'Post Views', 'wpufpa' ) );
    printf( '<th>%s</th>', __( 'Comments', 'wpufpa') );
}
add_action( 'wpuf_dashboard_head_col', 'wpufpa_add_cols' );


/**
 * Add table cells to the dashboard table rows.
 *
 * @param array $args dashboard query arguments
 * @param object $post current rows post object
 * @return void
 */
function wpufpa_add_cells( $args, $post ) {

	//show view count
    echo "<td>";
        $postView = intval( get_post_meta( get_the_ID(), 'views', true ) );
            echo $postView;
    echo "</td>";

    //show comment count
    echo "<td><a href=" . get_comments_link() . ">" . get_comments_number() . "</a></td>";
}
 
add_action( 'wpuf_dashboard_row_col', 'wpufpa_add_cells', 10, 2 );

?>