<?php
class Controller_Admin_Settings extends Controller_Admin{

	public function action_index()
	{
		$data['settings'] = Model_Setting::find('all');
		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/index', $data);

	}

	public function action_view($id = null)
	{
		$data['setting'] = Model_Setting::find($id);

		$this->template->title = "Setting";
		$this->template->content = View::forge('admin/settings/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Setting::validate('create');

			if ($val->run())
			{
				$setting = Model_Setting::forge(array(
					'key' => Input::post('key'),
					'value' => Input::post('value'),
				));

				if ($setting and $setting->save())
				{
					Session::set_flash('success', e('Added setting #'.$setting->id.'.'));

					Response::redirect('admin/settings');
				}

				else
				{
					Session::set_flash('error', e('Could not save setting.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/create');

	}

	public function action_edit($id = null)
	{
		$setting = Model_Setting::find($id);
		$val = Model_Setting::validate('edit');

		if ($val->run())
		{
			$setting->key = Input::post('key');
			$setting->value = Input::post('value');

			if ($setting->save())
			{
				Session::set_flash('success', e('Updated setting #' . $id));

				Response::redirect('admin/settings');
			}

			else
			{
				Session::set_flash('error', e('Could not update setting #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$setting->key = $val->validated('key');
				$setting->value = $val->validated('value');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('setting', $setting, false);
		}

		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/edit');

	}

	public function action_delete($id = null)
	{
		if ($setting = Model_Setting::find($id))
		{
			$setting->delete();

			Session::set_flash('success', e('Deleted setting #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete setting #'.$id));
		}

		Response::redirect('admin/settings');

	}


}