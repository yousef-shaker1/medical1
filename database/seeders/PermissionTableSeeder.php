<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [
 
  'الرئيسية',
  'المدن',
  'الخدمات',
  'الطلبات',
  'المستخدمين',
  'قائمة المستخدمين',
  'صلاحيات المستخدمين',

  'اضافة مدينة',
  'تعديل مدينة',
  'حدف مدينة',

  'اضافة خدمة',
  'تعديل خدمة',
  'حذف خدمة',

  'اضافة اودر',
  'تعديل اوردر',
  'حذف اوردر',

  'اضافة عميل',
  'تعديل عميل',
  'حذف عميل',
  
  'عرض صلاحية',
  'اضافة صلاحية',
  'تعديل صلاحية',
  'حذف صلاحية',

  'اضافة مستخدم',
  'عرض مستخدم',
  'تعديل مستخدم',
  'حذف مستخدم',
];


foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}
