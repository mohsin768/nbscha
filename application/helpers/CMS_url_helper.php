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
if ( ! function_exists('site_url'))
{
	function site_url($uri = '', $protocol = NULL)
	{
		$langUri= '';
		$defaultLanguage = get_instance()->default_language; 
		$siteLanguage = get_instance()->site_language;
		if($siteLanguage!=$defaultLanguage){
			$langUri = $siteLanguage;
		}
		if (substr($uri, 0, 1) != '/') {
			$uri = '/'.$uri;
		}
		$uri = $langUri . $uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}

if ( ! function_exists('language_url'))
{
	function language_url($langUri='', $protocol = NULL)
	{
		$currentLangUri = get_instance()->uri->segment(1);
		$uri = uri_string();
		if(isset(get_instance()->languages_pair[$currentLangUri])){
			$uri = str_replace($currentLangUri,'',$uri);
		}
		$defaultLanguage = get_instance()->default_language; 
		$siteLanguage = get_instance()->site_language;
		if (substr($uri, 0, 1) != '/') {
			$uri = '/'.$uri;
		}
		if($langUri == $defaultLanguage){
			$langUri = '';
		}
		$uri = $langUri . $uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}

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
if ( ! function_exists('news_url'))
{
	function news_url($slug, $protocol = NULL)
	{
		$uri = 'news/category/'.$slug;
		$langUri= '';
		$defaultLanguage = get_instance()->default_language; 
		$siteLanguage = get_instance()->site_language;
		if($siteLanguage!=$defaultLanguage){
			$langUri = $siteLanguage;
		}
		if (substr($uri, 0, 1) != '/') {
			$uri = '/'.$uri;
		}
		$uri = $langUri . $uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}
if ( ! function_exists('news_category_url'))
{
	function news_category_url($slug, $protocol = NULL)
	{
		$uri = 'news/'.$slug;
		$langUri= '';
		$defaultLanguage = get_instance()->default_language; 
		$siteLanguage = get_instance()->site_language;
		if($siteLanguage!=$defaultLanguage){
			$langUri = $siteLanguage;
		}
		if (substr($uri, 0, 1) != '/') {
			$uri = '/'.$uri;
		}
		$uri = $langUri . $uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}
if ( ! function_exists('board_url'))
{
	function board_url($slug, $protocol = NULL)
	{
		$uri = 'board/'.$slug;
		$langUri= '';
		$defaultLanguage = get_instance()->default_language; 
		$siteLanguage = get_instance()->site_language;
		if($siteLanguage!=$defaultLanguage){
			$langUri = $siteLanguage;
		}
		if (substr($uri, 0, 1) != '/') {
			$uri = '/'.$uri;
		}
		$uri = $langUri . $uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}
if ( ! function_exists('residences_url'))
{
	function residences_url($slug, $protocol = NULL)
	{
		$uri = 'residences/'.$slug;
		$langUri= '';
		$defaultLanguage = get_instance()->default_language; 
		$siteLanguage = get_instance()->site_language;
		if($siteLanguage!=$defaultLanguage){
			$langUri = $siteLanguage;
		}
		if (substr($uri, 0, 1) != '/') {
			$uri = '/'.$uri;
		}
		$uri = $langUri . $uri;
		return get_instance()->config->site_url($uri, $protocol);
	}
}
