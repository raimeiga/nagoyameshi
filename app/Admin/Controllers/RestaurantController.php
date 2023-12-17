<?php

namespace App\Admin\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RestaurantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Restaurant';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Restaurant());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('Name'));
        // ここにカテゴリー名カラムを書きたい      
        $grid->column('price', __('Price'))->sortable();
        $grid->column('hours', __('Hours'));
        $grid->column('holiday', __('Holiday'));
        $grid->column('image', __('Image'))->image();
        $grid->column('description', __('Description'));
        $grid->column('address', __('Address'));
        $grid->column('phone', __('Phone'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function($filter) {            
            $filter->like('name', '店舗名');
            $filter->between('price', '予算');
            //ここにカテゴリー名が来るようにしたい。↓を何とか編集せよ
            // $filter->in('category_id', 'カテゴリー')->multipleSelect(Category::all()->pluck('name', 'id'));
            $filter->like('description', '説明');
            $filter->between('created_at', '登録日')->datetime();
            $filter->between('updated_at', '更新日')->datetime();
            
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
        $show = new Show(Restaurant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        // ここにカテゴリー名カラムを書きたい
        $show->field('price', __('Price'));
        $show->field('hours', __('Hours'));
        $show->field('holiday', __('Holiday'));
        $show->field('description', __('Description'));
        $show->field('address', __('Address'));
        $show->field('phone', __('Phone'));
        $show->field('image', __('Image'))->image();
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
        $form = new Form(new Restaurant());

        $form->text('name', __('Name'));
       // ここにカテゴリー名カラムを書きたい
        $form->number('price', __('Price'));
        $form->number('hours', __('Hours'));
        $form->text('holiday', __('Holiday'));
        $form->image('image', __('Image'));
        $form->textarea('description', __('Description'));
        $form->textarea('address', __('Address'));
        $form->mobile('phone', __('Phone'));

        return $form;
    }
}
