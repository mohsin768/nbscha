<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('common_assets_url'))
{
	function common_assets_url($uri = '', $protocol = NULL)
	{
		$uri = 'public/common/'.$uri;
		return get_instance()->config->base_url($uri, $protocol);
	}
}

if ( ! function_exists('frontend_assets_url'))
{
	function frontend_assets_url($uri = '', $protocol = NULL)
	{
		$frontendPath = get_instance()->config->item('frontend_folder');
		$uri = 'public/'.$frontendPath.'/'.$uri;
		return get_instance()->config->base_url($uri, $protocol);
	}
}

if ( ! function_exists('frontend_assets_path'))
{
	function frontend_assets_path($uri = '', $protocol = NULL)
	{
		$frontendPath = get_instance()->config->item('frontend_folder');
		$uri = 'public/'.$frontendPath.'/'.$uri;
		return $uri;
	}
}

if ( ! function_exists('admin_assets_url'))
{
	function admin_assets_url($uri = '', $protocol = NULL)
	{
		$adminPath = get_instance()->config->item('admin_folder');
		$uri = 'public/'.$adminPath.'/'.$uri;
		return get_instance()->config->base_url($uri, $protocol);
	}
}

if ( ! function_exists('frontend_views_path'))
{
	function frontend_views_path($uri = '', $protocol = NULL)
	{
		$frontendPath = get_instance()->config->item('frontend_folder');
		$uri = $frontendPath.'/'.$uri;
		return $uri;
	}
}

if ( ! function_exists('frontend_uploads_url'))
{
	function frontend_uploads_url($uri = '', $protocol = NULL)
	{
		$uri = 'public/uploads/'.$uri;
		return get_instance()->config->base_url($uri, $protocol);
	}
}

if ( ! function_exists('frontend_uploads_path'))
{
	function frontend_uploads_path($uri = '', $protocol = NULL)
	{
		$uri = 'public/uploads/'.$uri;
		return $uri;
	}
}

if ( ! function_exists('admin_views_path'))
{
	function admin_views_path($uri = '', $protocol = NULL)
	{
		$adminPath = get_instance()->config->item('admin_folder');
		$uri = $adminPath.'/'.$uri;
		return $uri;
	}
}
if ( ! function_exists('admin_url_string'))
{
	function admin_url_string($uri = '', $protocol = NULL)
	{
		$adminPath = get_instance()->config->item('admin_folder');
		$uri = $adminPath.'/'.$uri;
		return $uri;
	}
}
if ( ! function_exists('admin_url'))
{
	function admin_url($url,$protocol = NULL){
        $url = get_instance()->config->item('admin_folder').'/'.$url;
        return site_url($url,$protocol);
    }
}

if ( ! function_exists('member_assets_url'))
{
	function member_assets_url($uri = '', $protocol = NULL)
	{
		$adminPath = get_instance()->config->item('member_folder');
		$uri = 'public/'.$adminPath.'/'.$uri;
		return get_instance()->config->base_url($uri, $protocol);
	}
}

if ( ! function_exists('member_views_path'))
{
	function member_views_path($uri = '', $protocol = NULL)
	{
		$memberPath = get_instance()->config->item('member_folder');
		$uri = $memberPath.'/'.$uri;
		return $uri;
	}
}
if ( ! function_exists('member_url_string'))
{
	function member_url_string($uri = '', $protocol = NULL)
	{
		$memberPath = get_instance()->config->item('member_folder');
		$uri = $memberPath.'/'.$uri;
		return $uri;
	}
}
if ( ! function_exists('member_url'))
{
	function member_url($url,$protocol = NULL){
        $url = get_instance()->config->item('member_folder').'/'.$url;
        return site_url($url,$protocol);
    }
}
if ( ! function_exists('frontend_instrument_url'))
{
	function frontend_instrument_url($uri = '', $protocol = NULL)
	{
		$uri = 'instruments/'.$uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}

if ( ! function_exists('frontend_blog_url'))
{
	function frontend_blog_url($uri = '', $protocol = NULL)
	{
		$uri = 'blogs/'.$uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}

if ( ! function_exists('frontend_artist_url'))
{
	function frontend_artist_url($uri = '', $protocol = NULL)
	{
		$uri = 'staff/'.$uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}
if ( ! function_exists('news_url'))
{
	function news_url($slug, $protocol = NULL)
	{
		$uri = 'news/category/'.$slug;
		return get_instance()->config->site_url($uri, $protocol);
	}
}
