<?php
class Controller_Admin_Server extends Controller_Admin{

	public function action_index()
	{
		$data['servers'] = Model_Server::find('all');
		$this->template->title = "Servers";
		$this->template->content = View::forge('admin/server/index', $data);

	}

	public function action_view($id = null)
	{
		$data['server'] = Model_Server::find($id);

		$this->template->title = "Server";
		$this->template->content = View::forge('admin/server/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Server::validate('create');

			if ($val->run())
			{
				$server = Model_Server::forge(array(
					'hostname' => Input::post('hostname'),
					'port' => Input::post('port'),
					'ssl' => Input::post('ssl'),
					'username' => Input::post('username'),
					'password' => Input::post('password'),
					'active' => Input::post('active'),
				));

				if ($server and $server->save())
				{
					Session::set_flash('success', e('Added server #'.$server->id.'.'));

					Response::redirect('admin/server');
				}

				else
				{
					Session::set_flash('error', e('Could not save server.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Servers";
		$this->template->content = View::forge('admin/server/create');

	}

	public function action_edit($id = null)
	{
		$server = Model_Server::find($id);
		$val = Model_Server::validate('edit');

		if ($val->run())
		{
			$server->hostname = Input::post('hostname');
			$server->port = Input::post('port');
			$server->ssl = Input::post('ssl');
			$server->username = Input::post('username');
			$server->password = Input::post('password');
			$server->active = Input::post('active');

			if ($server->save())
			{
				Session::set_flash('success', e('Updated server #' . $id));

				Response::redirect('admin/server');
			}

			else
			{
				Session::set_flash('error', e('Could not update server #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$server->hostname = $val->validated('hostname');
				$server->port = $val->validated('port');
				$server->ssl = $val->validated('ssl');
				$server->username = $val->validated('username');
				$server->password = $val->validated('password');
				$server->active = $val->validated('active');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('server', $server, false);
		}

		$this->template->title = "Servers";
		$this->template->content = View::forge('admin/server/edit');

	}

	public function action_delete($id = null)
	{
		if ($server = Model_Server::find($id))
		{
			$server->delete();

			Session::set_flash('success', e('Deleted server #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete server #'.$id));
		}

		Response::redirect('admin/server');

	}


}