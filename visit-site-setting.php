<?php
/*
Plugin Name: Visit Site Setting
Plugin URI: http://holtis.com/visit-site-settings/
Description: Opens the administrative dashboard's "Visit Site" link in a new window.
Version: 2.0
Author: Ray Holt (Holt Information Systems)
Author URI: http://holtis.com/about
*/

/*  Copyright 2010  Ray Holt  (email : ray@holtis.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Runs plugin while in the administrative dashboard
if( is_admin() ) {
  require_once( dirname(__FILE__).'/holtis-vss.php' );
}
?>