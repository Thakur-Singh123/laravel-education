<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserImportController;

use App\Http\Controllers\ExportController;
 
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/admin-dashboard');
    } else {
        return view('auth.login');
    }
});
//Route::post('/import-users', [UserImportController::class, 'import'])->name('import.users');
//Route::get('/export-users', [ExportController::class, 'exportUsers']);
Route::get('admin/all-contacts-list', [App\Http\Controllers\ContactController::class, 'allContacts']);
Route::post('/submit-contact', [App\Http\Controllers\ContactController::class, 'submitContact']);
Route::get('admin/edit-contact', [App\Http\Controllers\ContactController::class, 'edit_contact']);


Route::group(['middleware' => 'auth'], function(){ 
//Admin Only 
Route::group(['middleware' => 'admin'], function(){ 
    //Admin dashboard
    Route::get('/admin-dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
    Route::get('/add-service', [App\Http\Controllers\Admin\ServiceController::class, 'show_service']);
    Route::post('/submit-service', [App\Http\Controllers\Admin\ServiceController::class, 'add_service'])->name('service.submit');
    Route::get('/all-service', [App\Http\Controllers\Admin\ServiceController::class, 'all_service']);
    Route::get('/edit-service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'edit_service']);
    Route::post('/update-service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update_service'])->name('service.update');
    Route::get('/delete-service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'delete_service']);
    Route::get('/add-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'show_testimonial']);
    Route::POST('admin/submit-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'submit_testimonial']);
    Route::get('/all-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'all_testimonial']);
    Route::get('/edit-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'edit_testimonial']);
    Route::post('/update-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'update_testimonial'])->name('testimonial.update');
    Route::get('/delete-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'delete_testimonial']);
    Route::get('/add-employers', [App\Http\Controllers\Admin\EmployersController::class, 'show_employers']);
    Route::post('/submit-employers', [App\Http\Controllers\Admin\EmployersController::class, 'submit_employers'])->name('submit.employers');
    Route::get('/all-employers', [App\Http\Controllers\Admin\EmployersController::class, 'all_employers']);
    Route::get('/edit-employers/{id}', [App\Http\Controllers\Admin\EmployersController::class, 'edit_employers']);
    Route::post('admin/update-employers/{id}', [App\Http\Controllers\Admin\EmployersController::class, 'update_employers']);
    Route::get('delete-employers', [App\Http\Controllers\Admin\EmployersController::class, 'delete_employers']);
    Route::get('admin/add-teacher', [App\Http\Controllers\Admin\TeacherContactController::class, 'add_teacher']);
    Route::post('admin/submit-teacher', [App\Http\Controllers\Admin\TeacherContactController::class, 'submit_teacher'])->name('admin.submit.teacher');
    Route::get('admin/all-teachers', [App\Http\Controllers\Admin\TeacherContactController::class, 'all_teachers_list']);
    Route::get('admin/edit-teacher/{id}', [App\Http\Controllers\Admin\TeacherContactController::class, 'edit_teacher']);
    Route::post('admin/update-teacher/{id}', [App\Http\Controllers\Admin\TeacherContactController::class, 'update_teacher'])->name('admin.update.teacher');
    Route::get('admin/delete-teacher/{id}', [App\Http\Controllers\Admin\TeacherContactController::class, 'delete_teacher']);
    Route::get('admin/add-student', [App\Http\Controllers\Admin\StudentController::class, 'add_student']);
    Route::post('admin/submit-student', [App\Http\Controllers\Admin\StudentController::class, 'submit_student'])->name('admin.submit.student');
    Route::get('admin/all-students', [App\Http\Controllers\Admin\StudentController::class, 'all_students_list']);
    Route::get('admin/edit-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'edit_student']);
    Route::post('admin/update-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'update_student'])->name('admin.update.student');
    Route::get('admin/delete-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'delete_student']);
    //Expoert and Import student record
    Route::get('admin/export/students', [ExportController::class, 'exportStudents']);
    Route::get('admin/add-students', [App\Http\Controllers\ImportController::class, 'AddImportStudents']); 
    Route::post('import/students', [App\Http\Controllers\ImportController::class, 'importStudents'])->name('import/students');
    //Slider
    Route::get('admin/all-sliders', [App\Http\Controllers\Admin\sliderController::class, 'all_sliders']);
    Route::get('admin/add-new-slider', [App\Http\Controllers\Admin\sliderController::class, 'add_slider']);
    Route::post('admin/submit-new-slider', [App\Http\Controllers\Admin\sliderController::class, 'submit_sliders'])->name('admin.submit.slider');    
    Route::get('admin/edit-slider/{id}', [App\Http\Controllers\Admin\sliderController::class, 'edit_slider']);
    Route::post('admin/update-slider/{id}', [App\Http\Controllers\Admin\sliderController::class, 'update_sliders'])->name('admin.update.slider');
    Route::get('admin/delete-slider/{id}', [App\Http\Controllers\Admin\sliderController::class, 'delete_slider']);    

});
});  

//Company Route 
Route::group(['middleware' => 'company'], function(){ 
    Route::get('company/company-dashboard', [App\Http\Controllers\Company\DashboardController::class, 'compay_dashboard']);
    Route::get('company/add-new-company', [App\Http\Controllers\Company\CompanyController::class, 'AddCompany']);
    Route::post('company/submit-company', [App\Http\Controllers\Company\CompanyController::class, 'SubmitCompany'])->name('company.submit.company');
    Route::get('company/all-companies-list', [App\Http\Controllers\Company\CompanyController::class, 'GetAllCompanies']);
    Route::get('company/edit-company/{id}', [App\Http\Controllers\Company\CompanyController::class, 'EditCompany']);
    Route::post('company/update-company/{id}', [App\Http\Controllers\Company\CompanyController::class, 'UpdateCompany'])->name('company.update.company');
    Route::get('company/delete-company/{id}', [App\Http\Controllers\Company\CompanyController::class, 'DeleteCompany']);
    //product
    Route::get('company/all-products', [App\Http\Controllers\Company\ProductController::class, 'all_products_list']);
    Route::get('company/add-new-product', [App\Http\Controllers\Company\ProductController::class, 'add_product']);
    Route::post('company/submit-products', [App\Http\Controllers\Company\ProductController::class, 'submit_product'])->name('company.submit.products');
    Route::get('company/edit-product/{id}', [App\Http\Controllers\Company\ProductController::class, 'edit_product']);
    Route::post('company/update-product/{id}', [App\Http\Controllers\Company\ProductController::class, 'update_product'])->name('company.update.products');
    Route::get('company/delete-product/{id}', [App\Http\Controllers\Company\ProductController::class, 'delete_product']);
    //product export
    Route::get('company/product-export', [App\Http\Controllers\ExportController::class, 'product_export']);
    //import export
    Route::get('company/import-product', [App\Http\Controllers\ImportController::class, 'add_product_import']);
    Route::post('company/submit-product', [App\Http\Controllers\ImportController::class, 'submit_product_import'])->name('product.import.company');
    //Employees
    Route::get('company/all-employees-list', [App\Http\Controllers\Company\EmployeeController::class, 'all_employees_list']);
    Route::get('company/add-new-employee', [App\Http\Controllers\Company\EmployeeController::class, 'add_employee']);
    Route::post('company/submit-employee', [App\Http\Controllers\Company\EmployeeController::class, 'submit_employee'])->name('company.submit.employee');
    Route::get('company/edit-employee/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'edit_employee']);
    Route::post('company/update-employee/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'update_employee'])->name('company.update.employees');
    Route::get('company/delete-employee/{id}', [App\Http\Controllers\Company\EmployeeController::class, 'delete_employee']);
    //Trainer
    Route::get('company/all-traineries-list', [App\Http\Controllers\Company\TrainerController::class, 'all_traineries']);
    Route::get('company/add-new-trainer', [App\Http\Controllers\Company\TrainerController::class, 'add_trainer']);
    Route::post('company/submit-trainer', [App\Http\Controllers\Company\TrainerController::class, 'submit_trainer'])->name('company.submit.trainer');
    Route::get('company/edit-trainer/{id}', [App\Http\Controllers\Company\TrainerController::class, 'edit_trainer']);
    Route::post('company/edit-trainer/{id}', [App\Http\Controllers\Company\TrainerController::class, 'update_trainer'])->name('company.update.trainer');
    Route::get('company/delete-trainer/{id}', [App\Http\Controllers\Company\TrainerController::class, 'delete_trainer']);

});

//Employee Route 
Route::group(['middleware' => 'employee'], function(){ 
    Route::get('employee/employee-dashboard', [App\Http\Controllers\Employee\DashboardController::class, 'employee_dashboard']);
    Route::get('employee/add-new-employee', [App\Http\Controllers\Employee\EmployeeController::class, 'add_employee']);
    Route::post('employee/submit-employee', [App\Http\Controllers\Employee\EmployeeController::class, 'submit_employee'])->name('employee.submit.employee');
    Route::get('employee/all-employees-list', [App\Http\Controllers\Employee\EmployeeController::class, 'all_employee_list']);
    Route::get('employee/edit-employee/{id}', [App\Http\Controllers\Employee\EmployeeController::class, 'edit_employee']);
    Route::post('employee/update-employee/{id}', [App\Http\Controllers\Employee\EmployeeController::class, 'update_employee'])->name('employee.update.employee');
    Route::get('employee/delete-employee/{id}', [App\Http\Controllers\Employee\EmployeeController::class, 'delete_employee']);
    //Expoert and Import employee record
    Route::get('employee/export/employee', [ExportController::class, 'exportEmployees']);
    Route::get('employee/add-employee', [App\Http\Controllers\ImportController::class, 'add_employee_import']); 
    Route::post('employee-submit-import-student', [App\Http\Controllers\ImportController::class, 'submit_import_employee'])->name('employee.import.student');
});

//Customer Route
Route::group(['middleware' => 'customer'], function(){ 
    Route::get('customer/customer-dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'customer_dashboard']);
    Route::get('customer/add-new-customer', [App\Http\Controllers\Customer\CustomerController::class, 'AddCustomer']);
    Route::post('customer/submit-customer', [App\Http\Controllers\Customer\CustomerController::class, 'SubmitCustomer'])->name('customer.submit.customer');
    Route::get('customer/all-customers-list', [App\Http\Controllers\Customer\CustomerController::class, 'GetAllCustomerList']);
    Route::get('customer/edit-customer/{id}', [App\Http\Controllers\Customer\CustomerController::class, 'EditCustomer']);
    Route::post('customer/update-customer/{id}', [App\Http\Controllers\Customer\CustomerController::class, 'UpdateCustomer'])->name('customer.update.customer');
    Route::get('customer/delete-customer/{id}', [App\Http\Controllers\Customer\CustomerController::class, 'DeleteCustomer']);
    //customer product
    Route::get('customer/all-products-list', [App\Http\Controllers\Customer\ProductController::class, 'all_products']);
    Route::get('customer/add-new-product', [App\Http\Controllers\Customer\ProductController::class, 'add_product']);
    Route::post('customer/submit-product', [App\Http\Controllers\Customer\ProductController::class, 'submit_product'])->name('customer.submit.products');
    Route::get('customer/edit-product/{id}', [App\Http\Controllers\Customer\ProductController::class, 'edit_product']);
    Route::post('customer/update-product/{id}', [App\Http\Controllers\Customer\ProductController::class, 'update_product'])->name('customer.update.products');
    Route::get('customer/delete-product/{id}', [App\Http\Controllers\Customer\ProductController::class, 'delete_product']);
    //Employee 
    Route::get('customer/all-employees-list', [App\Http\Controllers\Customer\EmployeeController::class, 'all_employees_list']);
    Route::get('customer/add-new-employee', [App\Http\Controllers\Customer\EmployeeController::class, 'add_employee']);
    Route::post('customer/submit-employee', [App\Http\Controllers\Customer\EmployeeController::class, 'submit_employee'])->name('customer.submit.employee');
    Route::get('customer/edit-employee/{id}', [App\Http\Controllers\Customer\EmployeeController::class, 'edit_employee']);
    Route::post('customer/update-employee/{id}', [App\Http\Controllers\Customer\EmployeeController::class, 'update_employee'])->name('customer.update.employees');
    Route::get('customer/delete-employee/{id}', [App\Http\Controllers\Customer\EmployeeController::class, 'delete_employee']);

});
    //Technology Route
    Route::group(['middleware' => 'technology'], function(){ 
    Route::get('technology/dashboard', [App\Http\Controllers\Technology\DashboardController::class, 'dashboard']);
    Route::get('technology/all-technologies-list', [App\Http\Controllers\Technology\TechnologyController::class, 'all_technologies_list']);
    Route::get('technology/add-new-technology', [App\Http\Controllers\Technology\TechnologyController::class, 'add_technology']);
    Route::post('technology/submit-technology', [App\Http\Controllers\Technology\TechnologyController::class, 'submit_technology'])->name('technology.submit.technology');
    Route::get('technology/edit-technology/{id}', [App\Http\Controllers\Technology\TechnologyController::class, 'edit_technology']);
    Route::post('technology/update-technology/{id}', [App\Http\Controllers\Technology\TechnologyController::class, 'update_technology'])->name('technology.update.technology');
    Route::get('technology/delete-technology/{id}', [App\Http\Controllers\Technology\TechnologyController::class, 'delete_technology']);
    //Project 
    Route::get('project/all-projects-list', [App\Http\Controllers\Technology\ProjectController::class, 'all_projects']);
    Route::get('project/add-new-project', [App\Http\Controllers\Technology\ProjectController::class, 'add_project']);
    Route::post('project/submit-project', [App\Http\Controllers\Technology\ProjectController::class, 'submit_project'])->name('project.submit.project');
    Route::get('project/edit-project/{id}', [App\Http\Controllers\Technology\ProjectController::class, 'edit_project']);
    Route::post('project/update-project/{id}', [App\Http\Controllers\Technology\ProjectController::class, 'update_project'])->name('project.update.project');
    Route::get('project/delete-project/{id}', [App\Http\Controllers\Technology\ProjectController::class, 'delete_project']);
});

//front view
Route::get('/index', [App\Http\Controllers\HomeController::class, 'front_view']);
Route::get('/add-blog', [App\Http\Controllers\Admin\BlogController::class, 'show_blog']);
Route::POST('admin/submit-blog', [App\Http\Controllers\Admin\BlogController::class, 'submit_blog']);
Route::get('/all-blog', [App\Http\Controllers\Admin\BlogController::class, 'all_blog']);
Route::get('/edit-blog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit_blog']);
Route::post('/update-blog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update_blog'])->name('blog.update');
Route::get('/delete-blog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete_blog']);
//


//Route::get('send-mail', [MailController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
