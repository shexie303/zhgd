<?php

namespace App\Admin\Controllers;

use App\Models\SiteErrorReportGroups;
use App\Models\SiteErrorReport;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Encore\Admin\Controllers\ModelForm;

class ReportController extends Controller
{
    use ModelForm;
    
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('报警组管理');
            $content->description(trans('admin.list'));
            $content->body($this->grid()->render());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('报警组管理');
            $content->description(trans('admin.edit'));
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('报警组管理');
            $content->description(trans('admin.create'));
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(SiteErrorReportGroups::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name(trans('admin.name'));
            $grid->module('所属模块');
            $grid->type('组类别')->display(function ($type) {
                return SiteErrorReportGroups::GROUP_TYPE[$type];
            });

            $grid->created_at(trans('admin.created_at'));
            $grid->updated_at(trans('admin.updated_at'));

            
            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        return Admin::form(SiteErrorReportGroups::class, function (Form $form) {
            $form->display('id', 'ID');

            $form->text('name', trans('admin.name'))->rules('required');
            $form->select('module', '所属模块')->options(SiteErrorReport::EVENT_TYPE);
            $form->select('type', '组类别')->options(SiteErrorReportGroups::GROUP_TYPE);
            
            $form->display('created_at', trans('admin.created_at'));
            $form->display('updated_at', trans('admin.updated_at'));
        });
    }
}
