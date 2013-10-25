<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Base
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		if(!\Session::get('id'))
			\Response::redirect('news');

		// die(Uri::segment(3));
		$this->template->content = \View::forge('welcome/index');

		$pagination = Pagination::forge('mypagination', array(
    		// 'pagination_url' => 'http://docs.fuelphp.com/',
    		'uri_segment' => 3,
    		'total_items' => \Model_NNTPArticle::countArticles(),
    		'per_page' => \Config::get('newzearch:article_limit', 20),
    		'show_first' => true,
    		'show_last' => true,
		));

		$this->template->content->articles = \Model_NNTPArticle::getNewest($pagination->per_page, $pagination->offset);

	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
