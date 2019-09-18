<?php

namespace Wuwx\LaravelAdminAuditing\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AuditingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Auditing';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Audit);
        $grid->model()->orderBy("id", "DESC");

        $grid->column('created_at', __('Created at'));
        $grid->column('user_id', __('User id'));
        $grid->column('event', __('Event'));
        $grid->column('auditable_id', __('Auditable id'));
        $grid->column('old_values', __('Old values'));
        $grid->column('new_values', __('New values'));
        $grid->column('ip_address', __('Ip address'));

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->equal('user_id');
            $filter->equal('auditable_id');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Audit::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_type', __('User type'));
        $show->field('user_id', __('User id'));
        $show->field('event', __('Event'));
        $show->field('auditable_type', __('Auditable type'));
        $show->field('auditable_id', __('Auditable id'));
        $show->field('old_values', __('Old values'));
        $show->field('new_values', __('New values'));
        $show->field('url', __('Url'));
        $show->field('ip_address', __('Ip address'));
        $show->field('user_agent', __('User agent'));
        $show->field('tags', __('Tags'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Audit);

        $form->text('user_type', __('User type'));
        $form->number('user_id', __('User id'));
        $form->text('event', __('Event'));
        $form->text('auditable_type', __('Auditable type'));
        $form->number('auditable_id', __('Auditable id'));
        $form->textarea('old_values', __('Old values'));
        $form->textarea('new_values', __('New values'));
        $form->textarea('url', __('Url'));
        $form->text('ip_address', __('Ip address'));
        $form->text('user_agent', __('User agent'));
        $form->text('tags', __('Tags'));

        return $form;
    }
}
