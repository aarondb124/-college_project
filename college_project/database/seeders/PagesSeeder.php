<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pages_order = [
            'order.index'          => 'Pending Order View',
            'order.onProcess'      => 'Order OnProcess',
            'order.way'            => 'Order on the way',
            'order.delivary'       => 'Order Delivery',
            'sales.report'         =>  'Sales Report',
            'order.pending'        => 'Order Pending',
            'order.process'        => 'Order Process',
            'cancel.list'          => 'cancel.list',
            'order.details.edit'   => 'Order details Edit',
            'order.print'          => 'Order Print',
            'order.edit'           => 'Order Edit',
            'order.cancel'         => 'Product Order Cancel',
            'order.all.update'     => 'Order Update',
            'order.record'         =>  'Order Record',
            'quote.record'         =>  'Quotation Record'
        ];
        foreach ($pages_order as $key => $value) {
            Page::create([
                'name'         => $key,
                'display_name' => $value,
                'group_id'     =>1
            ]);
        }
        $pages_product = [
            'product.create'          => 'Product Entry',
            'product.index'           =>  'Product List',
            'product.edit'            =>  'Product Edit', 
            'category.index'          => 'Category Create',
            'category.edit'           => 'Category Edit',
            'category.list'           => 'Category List',
            'subcategory.index'       => 'Sub Category Create',
            'subcategory.edit'        => 'Sub Category Edit',
            'subcategory.list'        => 'SubCategory List',
            'category.rank'           => 'Category Rank',
            'color.index'             =>  'Color Entry',
            'color.edit'              =>   'Color Edit',
            'size.index'              =>  'Size Entry',
            'size.edit'               =>   'Size Edit',
            
        ];
        
        foreach ($pages_product as $key => $value) {
            Page::create([
                'name'         => $key,
                'display_name' => $value,
                'group_id'     =>2
            ]);
        }

        $pages_website_content = [

            'company.banner'     => 'Banner Create',
            'banner.all'         => 'Banner All',
            'banner.edit'        => 'Banner Edit',
            'about.us'           => 'About Us',
            'mission'            => 'Mission Vission',
            'management.index'   => 'Management Entry',
            'management.edit'    => 'Management Edit',
            'team.index'         => 'Team Entry',
            'team.edit'          => 'Management Edit',
            'ad.index'           => 'Advatize Entry',
            'ad.edit'            => 'Advatize Edit',
            'partner.index'      => 'Partner Entry',
            'partner.edit'       => 'Partner Edit',
            'blog.index'         => 'News Entry',
            'blog.edit'          => 'News Edit',
            'branch.index'         => 'Branch Entry',
            'branch.edit'          => 'Branch Edit',
            
            
        ];
        foreach ($pages_website_content as $key => $value) {
            Page::create([
                'name'         => $key,
                'display_name' => $value,
                'group_id'     =>3
            ]);
        }

        $pages_setting = [
            'profile.edit'        => 'Company Profle edit',
            'profile.update'      => 'Company Data update',
            'country.all'         => 'Country.create',
            'country.edit'        => 'Country Edit',
            'admin.phone.edit'    => 'Admin Phone Edit',
            'area.index'          => 'Area Create',
            'area.edit'           => 'Area Edit',
            'thana.index'         => 'Thana Create',
            'thana.edit'          => 'Thana Edit',
            'page.list'           => ' Page Setting',
            'sms.sending'         => 'SMS Sending',
            'sms.all'             => 'All SMS View',
            'page'                => 'All Page List',
            'permission.index'    => 'Permission',
            'user.index'          => 'User Create',
            'user.edit'           => 'user Edit',
            'permission.edit'     => 'Permission Edit',
            'customer.offer'   => 'Offer Setting'
            
        ];
        foreach ($pages_setting as $key => $value) {
            Page::create([
                'name'         => $key,
                'display_name' => $value,
                'group_id'     =>4
            ]);
        }

        $customers = [
            'customer'          => 'Customer Entry',
            'customer.all'      => 'Customer List',
            'customer.edit'     => 'Customer Edit',
            'customer.list'     => 'Customer List',
            
        ];
        foreach ($customers as $key => $value) {
            Page::create([
                'name'         => $key,
                'display_name' => $value,
                'group_id'     =>5
            ]);
        }

        $others = [
            'public.sms'          => 'Public SMS',
            'subscriber.list'     => 'Subscriber List',
            'password.change'    => 'Password change',
            
        ];
        foreach ($others as $key => $value) {
            Page::create([
                'name'         => $key,
                'display_name' => $value,
                'group_id'     =>6
            ]);
        }

        
    }
}
