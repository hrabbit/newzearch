<?php
class Controller_Admin_Group extends Controller_Admin{

	public function action_index()
	{
		$data['groups'] = Model_Group::find('all');
		$this->template->title = "Groups";
		$this->template->content = View::forge('admin/group/index', $data);

	}

	public function action_view($id = null)
	{
		$data['group'] = Model_Group::find($id);

		$this->template->title = "Group";
		$this->template->content = View::forge('admin/group/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Group::validate('create');

			if ($val->run())
			{
				$group = Model_Group::forge(array(
					'server_id' => Input::post('server_id'),
					'name' => Input::post('name'),
					'current_article' => Input::post('current_article'),
					'active' => Input::post('active'),
				));

				if ($group and $group->save())
				{
					Session::set_flash('success', e('Added group #'.$group->id.'.'));

					Response::redirect('admin/group');
				}

				else
				{
					Session::set_flash('error', e('Could not save group.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Groups";
		$this->template->content = View::forge('admin/group/create');

	}

	public function action_edit($id = null)
	{
		$group = Model_Group::find($id);
		$val = Model_Group::validate('edit');

		if ($val->run())
		{
			$group->server_id = Input::post('server_id');
			$group->name = Input::post('name');
			$group->current_article = Input::post('current_article');
			$group->active = Input::post('active');

			if ($group->save())
			{
				Session::set_flash('success', e('Updated group #' . $id));

				Response::redirect('admin/group');
			}

			else
			{
				Session::set_flash('error', e('Could not update group #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$group->server_id = $val->validated('server_id');
				$group->name = $val->validated('name');
				$group->current_article = $val->validated('current_article');
				$group->active = $val->validated('active');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('group', $group, false);
		}

		$this->template->title = "Groups";
		$this->template->content = View::forge('admin/group/edit');

	}

	public function action_delete($id = null)
	{
		if ($group = Model_Group::find($id))
		{
			$group->delete();

			Session::set_flash('success', e('Deleted group #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete group #'.$id));
		}

		Response::redirect('admin/group');

	}


}