<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    $students = \App\Student::orderBy('id','DESC')->get();

    $department = \App\Department::where('name','computer')->get();
    return view('welcome',compact('students','department'));
})->name('welcome');




Route::get('/teachers', function () {
    return view('frontend/teachers.index');
})->name('frontend_teachers');

Route::get('/teacher-show/{phone}',function ($phone){
    $phone_decrypt = base64_decode($phone);
    $teachers = \App\Teacher::where('phone_number',$phone_decrypt)->get();
    foreach ($teachers as $teacher){}
    return view('frontend/teachers.show',compact('teacher'));
})->name('frontend_teacher_show');




Route::get('/notices', function () {
    return view('frontend/notices.index');
})->name('frontend_notices');

Route::get('/accounts', function () {
    return view('frontend/accounts.index');
})->name('frontend_accounts');

Route::get('/liberys', function () {
    return view('frontend/liberys.index');
})->name('frontend_liberys');







Route::get('/books', function () {
    return view('frontend/books.index');
})->name('frontend_books');

Route::get('/class-book-show/{name}',function ($name){
    $classes = \App\Classe::where('name',$name)->get();
    foreach ($classes as $class){
        $class_id = $class->id;
        $books = \App\Book::where('class_id',$class_id)->paginate(10);
    }
    return view('frontend/books.show_class_book',compact('books','class'));
})->name('frontend_class_book_show');

Route::get('/book-category-book-show/{name}',function ($name){
    $book_categorys = \App\Book_Category::where('name',$name)->get();
    foreach ($book_categorys as $book_category){
        $book_category_id = $book_category->id;
        $books = \App\Book::where('book_category_id',$book_category_id)->paginate(10);
    }
    return view('frontend/books.show_book_category',compact('books','book_category'));
})->name('frontend_book_category_book_show');

Route::get('/author-book-show/{name}',function ($name){
    $books = \App\Book::where('author_name',$name)->paginate(10);
    return view('frontend/books.show_author_book',compact('books'));
})->name('frontend_author_book_show');

Route::get('/publication-book-show/{publish}',function ($publish){
    $books = \App\Book::where('publication',$publish)->paginate(10);
    return view('frontend/books.show_publication_book',compact('books'));
})->name('frontend_publication_book_show');





Route::get('/buildings', function () {
    return view('frontend/buildings.index');
})->name('frontend_buildings');


Route::get('/developers', function () {
    return view('frontend/developers.index');
})->name('frontend_developers');











Route::get('/drivings', function () {
    return view('frontend/drivings.index');
})->name('frontend_drivings');

Route::get('/driving_students',function (){
    return view('frontend/drivings/driving_student.index');
})->name('frontend_driving_students');

Route::get('/driving_student/{phone}',function ($phone){
    $decrypt = base64_decode($phone);
    $driving_students = \App\Driving_Student::where('phone_number',$decrypt)->get();
    foreach ($driving_students as $driving_student){}
    return view('frontend/drivings/driving_student.show',compact('driving_student'));
})->name('frontend_driving_student_show');

Route::get('/driving_teachers',function (){
    return view('frontend/drivings/driving_teachers.index');
})->name('frontend_driving_teachers');

Route::get('/driving_teacher/{email}',function ($email){
    $decryp = base64_decode($email);
    $driving_teachers = \App\Driving_Teacher::where('email',$decryp)->get();
    foreach ($driving_teachers as $driving_teacher){}
    return view('frontend/drivings/driving_teachers.show',compact('driving_teacher'));
})->name('frontend_driving_teacher_show');








Route::get('/gardens', function () {
    return view('frontend/gardens.index');
})->name('frontend_gardens');

Route::get('/garden-photo-show/{name}',function ($name){
    $gardens = \App\Garden::where('name',$name)->get();
    foreach ($gardens as $garden){}
    if ($gardens->count() <= 0){
        return view('frontend/gardens.index');
    }else{
        return view('frontend/gardens.show_photo',compact('garden'));
    }
})->name('frontend_garden_photo_show');

Route::get('/garden-video-show/{name}',function ($name){
    $gardens = \App\Garden::where('name',$name)->get();
    foreach ($gardens as $garden){}
    if ($gardens->count() <= 0){
        return view('frontend/gardens.index');
    }else{
        return view('frontend/gardens.show_video',compact('garden'));
    }
})->name('frontend_garden_video_show');








Route::get('/gests', function () {
    return view('frontend/gests.index');
})->name('frontend_gests');


Route::get('/helps', function () {
    return view('frontend/helps.index');
})->name('frontend_helps');

Route::get('/hostels', function () {
    return view('frontend/hostels.index');
})->name('frontend_hostels');








Route::get('/photos', function () {
    return view('frontend/photos.index');
})->name('frontend_photos');

Route::get('/photo-magazine/{name}',function ($name){
    $magazines = \App\Magazine::where('name',$name)->get();
    foreach ($magazines as $magazine){
        $magazine_id = $magazine->id;
        $photos = \App\Photo::where('magazine_id',$magazine_id)->paginate(10);
    }
    return view('frontend/photos.magazine_photo',compact('photos','magazine'));
})->name('frontend_photo_magazine');

Route::get('/photo-program/{program}',function ($name){
    $programs = \App\Program::where('name',$name)->get();
    foreach ($programs as $program){
        $program_id = $program->id;
        $photos = \App\Photo::where('program_id',$program_id)->paginate(10);
    }
    return view('frontend/photos.program_photo',compact('photos','program'));
})->name('frontend_photo_program');

Route::get('/photo-lab/{lab}',function ($name){
    $labs = \App\Lab::where('name',$name)->get();
    foreach ($labs as $lab){
        $lab_id = $lab->id;
        $photos = \App\Photo::where('lab_id',$lab_id)->paginate(10);
    }
    return view('frontend/photos.lab_photo',compact('photos','lab'));
})->name('frontend_photo_lab');

Route::get('/photo-garden/{garden}',function ($name){
    $gardens = \App\Garden::where('name',$name)->get();
    foreach ($gardens as $garden){
        $garden_id = $garden->id;
        $photos = \App\Photo::where('garden_id',$garden_id)->paginate(10);
    }
    return view('frontend/photos.garden_photo',compact('photos','garden'));
})->name('frontend_photo_garden');

Route::get('/photo-pool/{pool}',function ($name){
    $pools = \App\Pool::where('name',$name)->get();
    foreach ($pools as $pool){
        $pool_id = $pool->id;
        $photos = \App\Photo::where('pool_id',$pool_id)->paginate(10);
    }
    return view('frontend/photos.pool_photo',compact('photos','pool'));
})->name('frontend_photo_pool');












Route::get('/labs', function () {
    return view('frontend/labs.index');
})->name('frontend_labs');

Route::get('/lab-photo-show/{name}',function ($name){
    $labs = \App\Lab::where('name',$name)->get();
    foreach ($labs as $lab){}
    if ($labs->count() <= 0){
        return view('frontend/labs.index');
    }else{
        return view('frontend/labs.show_photo',compact('lab'));
    }
})->name('frontend_lab_photo_show');

Route::get('/lab-video-show/{name}',function ($name){
    $labs = \App\Lab::where('name',$name)->get();
    foreach ($labs as $lab){}
    if ($labs->count() <= 0){
        return view('frontend/labs.index');
    }else{
        return view('frontend/labs.show_video',compact('lab'));
    }
})->name('frontend_lab_video_show');





Route::get('/magazines', function () {
    return view('frontend/magazines.index');
})->name('frontend_magazines');

Route::get('/magazine-photo-show/{name}',function ($name){
    $magazines = \App\Magazine::where('name',$name)->get();
    foreach ($magazines as $magazine){}
    if ($magazines->count() <= 0){
        return view('frontend/magazines.index');
    }else{
        return view('frontend/magazines.show_photo',compact('magazine'));
    }
})->name('frontend_magazine_photo_show');


Route::get('/magazine-video-show/{name}',function ($name){
    $magazines = \App\Magazine::where('name',$name)->get();
    foreach ($magazines as $magazine){}
    if ($magazines->count() <= 0){
        return view('frontend/magazines.index');
    }else{
        return view('frontend/magazines.show_video',compact('magazine'));
    }
})->name('frontend_magazine_video_show');





Route::get('/mosques', function () {
    return view('frontend/mosques.index');
})->name('frontend_mosques');







Route::get('/pools', function () {
    return view('frontend/pools.index');
})->name('frontend_pools');


Route::get('/pool-photo-show/{name}',function ($name){
    $pools = \App\Pool::where('name',$name)->get();
    foreach ($pools as $pool){}
    if ($pools->count() <= 0){
        return view('frontend/pools.index');
    }else{
        return view('frontend/pools.show_photo',compact('pool'));
    }
})->name('frontend_pool_photo_show');

Route::get('/pool-video-show/{name}',function ($name){
    $pools = \App\Pool::where('name',$name)->get();
    foreach ($pools as $pool){}
    if ($pools->count() <= 0){
        return view('frontend/pools.index');
    }else{
        return view('frontend/pools.show_video',compact('pool'));
    }
})->name('frontend_pool_video_show');












Route::get('/privacys', function () {
    return view('frontend/privacys.index');
})->name('frontend_privacys');





Route::get('/programs', function () {
    return view('frontend/programs.index');
})->name('frontend_programs');

Route::get('/program-photo/{name}',function ($name){
    $programs = \App\Program::where('name',$name)->get();
    foreach ($programs as $program){}
    if ($programs->count() <= 0){
        return view('frontend/programs.index');
    }else {
        return view('frontend/programs.show_photo', compact('program'));
    }
})->name('frontend_program_photo_show');

Route::get('/program-video/{name}',function ($name){
    $programs = \App\Program::where('name',$name)->get();
    foreach ($programs as $program){}
    if ($programs->count() <= 0){
        return view('frontend/programs.index');
    }else {
        return view('frontend/programs.show_video', compact('program'));
    }
})->name('frontend_program_video_show');





Route::get('/services', function () {
    return view('frontend/services.index');
})->name('frontend_services');







Route::get('/videos', function () {
    return view('frontend/videos.index');
})->name('frontend_videos');

Route::get('/video-magazine/{name}',function ($name){
    $magazines = \App\Magazine::where('name',$name)->get();
    foreach ($magazines as $magazine){
        $magazine_id = $magazine->id;
        $videos = \App\Video::where('magazine_id',$magazine_id)->paginate(10);
    }
    return view('frontend/videos.magazine_video',compact('videos','magazine'));
})->name('frontend_video_magazine');

Route::get('/video-program/{program}',function ($name){
    $programs = \App\Program::where('name',$name)->get();
    foreach ($programs as $program){
        $program_id = $program->id;
        $videos = \App\Video::where('program_id',$program_id)->paginate(10);
    }
    return view('frontend/videos.program_video',compact('videos','program'));
})->name('frontend_video_program');

Route::get('/video-lab/{lab}',function ($name){
    $labs = \App\Lab::where('name',$name)->get();
    foreach ($labs as $lab){
        $lab_id = $lab->id;
        $videos = \App\Video::where('lab_id',$lab_id)->paginate(10);
    }
    return view('frontend/videos.lab_video',compact('videos','lab'));
})->name('frontend_video_lab');

Route::get('/video-garden/{garden}',function ($name){
    $gardens = \App\Garden::where('name',$name)->get();
    foreach ($gardens as $garden){
        $garden_id = $garden->id;
        $videos = \App\Video::where('garden_id',$garden_id)->paginate(10);
    }
    return view('frontend/videos.garden_video',compact('videos','garden'));
})->name('frontend_video_garden');

Route::get('/video-pool/{pool}',function ($name){
    $pools = \App\Pool::where('name',$name)->get();
    foreach ($pools as $pool){
        $pool_id = $pool->id;
        $videos = \App\Video::where('pool_id',$pool_id)->paginate(10);
    }
    return view('frontend/videos.pool_video',compact('videos','pool'));
})->name('frontend_video_pool');

/**
 *  all students route below here
 *  diploma all students
 *  class nine all students
 *  class ten all students
 *  class eleven all students
 *  class twelve all students
 */

Route::get('students/all',function(){
    return view('frontend/students.index');
})->name('frontend_students');

Route::get('/diploma-in-engineering/1st-semseter', function () {
    return view('frontend/students/diploma/first.index');
})->name('frontend_student_diploma_1st');


Route::get('/diploma-in-engineering/2nd-semseter', function () {
    return view('frontend/students/diploma/second.index');
})->name('frontend_student_diploma_2nd');


Route::get('/diploma-in-engineering/3rd-semseter', function () {
    return view('frontend/students/diploma/third.index');
})->name('frontend_student_diploma_3rd');

Route::get('/diploma-in-engineering/4th-semseter', function () {
    return view('frontend/students/diploma/fourth.index');
})->name('frontend_student_diploma_4th');

Route::get('/diploma-in-engineering/5th-semseter', function () {
    return view('frontend/students/diploma/fifth.index');
})->name('frontend_student_diploma_5th');

Route::get('/diploma-in-engineering/6th-semseter', function () {
    return view('frontend/students/diploma/sixth.index');
})->name('frontend_student_diploma_6th');

Route::get('/diploma-in-engineering/7th-semseter', function () {
    return view('frontend/students/diploma/seventh.index');
})->name('frontend_student_diploma_7th');

Route::get('/diploma-in-engineering/8th-semseter', function () {
    return view('frontend/students/diploma/eighth.index');
})->name('frontend_student_diploma_8th');


Route::get('/students/class-xii', function () {
    return view('frontend/students/twelve.index');
})->name('frontend_student_xii');

Route::get('/students/class-xi', function () {
    return view('frontend/students/eleven.index');
})->name('frontend_student_xi');

Route::get('/students/class-x', function () {
    return view('frontend/students/ten.index');
})->name('frontend_student_x');




Route::get('/student-class-xii-computer/1st-shift', function () {
    return view('frontend/students/twelve/computer/first.index');
})->name('frontend_student_xii_computer_1st');

Route::get('/student-class-xii-computer/2nd-shift', function () {
    return view('frontend/students/twelve/computer/second.index');
})->name('frontend_student_xii_computer_2nd');


Route::get('/student-class-xii-electrical/1st-shift', function () {
    return view('frontend/students/twelve/electrical/first.index');
})->name('frontend_student_xii_electrical_1st');

Route::get('/student-class-xii-electrical/2nd-shift', function () {
    return view('frontend/students/twelve/electrical/second.index');
})->name('frontend_student_xii_electrical_2nd');


Route::get('/student-class-xii-electronic/1st-shift', function () {
    return view('frontend/students/twelve/electronic/first.index');
})->name('frontend_student_xii_electronic_1st');


Route::get('/student-class-xii-electronic/2nd-shift', function () {
    return view('frontend/students/twelve/electronic/second.index');
})->name('frontend_student_xii_electronic_2nd');


Route::get('/student-class-xii-fish-culture/1st-shift', function () {
    return view('frontend/students/twelve/fish_culture/first.index');
})->name('frontend_student_xii_fish_culture_1st');


Route::get('/student-class-xii-fish-culture/2nd-shift', function () {
    return view('frontend/students/twelve/fish_culture/second.index');
})->name('frontend_student_xii_fish_culture_2nd');

//class xi student all router

Route::get('/student-class-xi-computer/1st-shift', function () {
    return view('frontend/students/eleven/computer/first.index');
})->name('frontend_student_xi_computer_1st');

Route::get('/student-class-xi-computer/2nd-shift', function () {
    return view('frontend/students/eleven/computer/second.index');
})->name('frontend_student_xi_computer_2nd');


Route::get('/student-class-xi-electrical/1st-shift', function () {
    return view('frontend/students/eleven/electrical/first.index');
})->name('frontend_student_xi_electrical_1st');

Route::get('/student-class-xi-electrical/2nd-shift', function () {
    return view('frontend/students/eleven/electrical/second.index');
})->name('frontend_student_xi_electrical_2nd');


Route::get('/student-class-xi-electronic/1st-shift', function () {
    return view('frontend/students/eleven/electronic/first.index');
})->name('frontend_student_xi_electronic_1st');


Route::get('/student-class-xi-electronic/2nd-shift', function () {
    return view('frontend/students/eleven/electronic/second.index');
})->name('frontend_student_xi_electronic_2nd');


Route::get('/student-class-xi-fish-culture/1st-shift', function () {
    return view('frontend/students/eleven/fish_culture/first.index');
})->name('frontend_student_xi_fish_culture_1st');


Route::get('/student-class-xi-fish-culture/2nd-shift', function () {
    return view('frontend/students/eleven/fish_culture/second.index');
})->name('frontend_student_xi_fish_culture_2nd');


//class x all students router


Route::get('/student-class-x-computer/1st-shift', function () {
    return view('frontend/students/ten/computer/first.index');
})->name('frontend_student_x_computer_1st');

Route::get('/student-class-x-computer/2nd-shift', function () {
    return view('frontend/students/ten/computer/second.index');
})->name('frontend_student_x_computer_2nd');


Route::get('/student-class-x-electrical/1st-shift', function () {
    return view('frontend/students/ten/electrical/first.index');
})->name('frontend_student_x_electrical_1st');

Route::get('/student-class-x-electrical/2nd-shift', function () {
    return view('frontend/students/ten/electrical/second.index');
})->name('frontend_student_x_electrical_2nd');


Route::get('/student-class-x-electronic/1st-shift', function () {
    return view('frontend/students/ten/electronic/first.index');
})->name('frontend_student_x_electronic_1st');


Route::get('/student-class-x-electronic/2nd-shift', function () {
    return view('frontend/students/ten/electronic/second.index');
})->name('frontend_student_x_electronic_2nd');


Route::get('/student-class-x-fish-culture/1st-shift', function () {
    return view('frontend/students/ten/fish_culture/first.index');
})->name('frontend_student_x_fish_culture_1st');


Route::get('/student-class-x-fish-culture/2nd-shift', function () {
    return view('frontend/students/ten/fish_culture/second.index');
})->name('frontend_student_x_fish_culture_2nd');

//class ix all students router

Route::get('/students/class-ix', function () {
    return view('frontend/students/nine.index');
})->name('frontend_student_ix');

Route::get('/student-class-ix-computer/1st-shift', function () {
    return view('frontend/students/nine/computer/first.index');
})->name('frontend_student_ix_computer_1st');

Route::get('/student-class-ix-computer/2nd-shift', function () {
    return view('frontend/students/nine/computer/second.index');
})->name('frontend_student_ix_computer_2nd');


Route::get('/student-class-ix-electrical/1st-shift', function () {
    return view('frontend/students/nine/electrical/first.index');
})->name('frontend_student_ix_electrical_1st');

Route::get('/student-class-ix-electrical/2nd-shift', function () {
    return view('frontend/students/nine/electrical/second.index');
})->name('frontend_student_ix_electrical_2nd');


Route::get('/student-class-ix-electronic/1st-shift', function () {
    return view('frontend/students/nine/electronic/first.index');
})->name('frontend_student_ix_electronic_1st');


Route::get('/student-class-ix-electronic/2nd-shift', function () {
    return view('frontend/students/nine/electronic/second.index');
})->name('frontend_student_ix_electronic_2nd');


Route::get('/student-class-ix-fish-culture/1st-shift', function () {
    return view('frontend/students/nine/fish_culture/first.index');
})->name('frontend_student_ix_fish_culture_1st');


Route::get('/student-class-ix-fish-culture/2nd-shift', function () {
    return view('frontend/students/nine/fish_culture/second.index');
})->name('frontend_student_ix_fish_culture_2nd');

Route::get('/student-student-show/{phone}',function ($phone){
    $decry = base64_decode($phone);
    $students = \App\Student::where('phone_number',$decry)->get();
    foreach ($students as $student){}
    return view('frontend/students.show',compact('student'));
})->name('frontend_student_show');

//frontend all departments router

Route::get('/department/computer',function (){
    return view('frontend/departments/computer.index');
})->name('frontend_computer_department');

Route::get('/department/electrical',function (){
    return view('frontend/departments/electrical.index');
})->name('frontend_electrical_department');

Route::get('/department/electronic',function (){
    return view('frontend/departments/electronic.index');
})->name('frontend_electronic_department');

Route::get('/department/fish_culture',function (){
    return view('frontend/departments/fish_culture.index');
})->name('frontend_fish_culture_department');

//all classes router

Route::get('/classes/ix',function (){
    return view('frontend/classes/nine.index');
})->name('frontend_class_ix');

Route::get('/classes/x',function (){
    return view('frontend/classes/ten.index');
})->name('frontend_class_x');

Route::get('/classes/xi',function (){
    return view('frontend/classes/eleven.index');
})->name('frontend_class_xi');

Route::get('/classes/xii',function (){
    return view('frontend/classes/twelve.index');
})->name('frontend_class_xii');

Route::get('/classes/diploma',function (){
    return view('frontend/classes/diploma.index');
})->name('frontend_class_diploma');

Auth::routes();



Route::group(['middleware' => 'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home');

//    backend departments all route below here
    Route::get('admin/department/create','DepartmentController@create')->name('backend_department_create');
    Route::post('admin/department/insert','DepartmentController@store')->name('backend_department_store');
    Route::get('admin/department/manage','DepartmentController@index')->name('backend_department_manage');
    Route::get('admin/department/{id}/edit','DepartmentController@edit')->name('backend_department_edit');
    Route::put('admin/department/{id}/update','DepartmentController@update')->name('backend_department_update');
    Route::get('admin/department/{id}/delete','DepartmentController@destroy')->name('backend_department_delete');

//    backend classes all route below here
    Route::get('admin/class/create','ClasseController@create')->name('backend_class_create');
    Route::post('admin/class/insert','ClasseController@store')->name('backend_class_store');
    Route::get('admin/class/manage','ClasseController@index')->name('backend_class_manage');
    Route::get('admin/class/{id}/edit','ClasseController@edit')->name('backend_class_edit');
    Route::put('admin/class/{id}/update','ClasseController@update')->name('backend_class_update');
    Route::get('admin/class/{id}/delete','ClasseController@destroy')->name('backend_class_delete');

//    backend gardens all route below here
    Route::get('admin/garden/create','GardenController@create')->name('backend_garden_create');
    Route::post('admin/garden/insert','GardenController@store')->name('backend_garden_store');
    Route::get('admin/garden/manage','GardenController@index')->name('backend_garden_manage');
    Route::get('admin/garden/{id}/edit','GardenController@edit')->name('backend_garden_edit');
    Route::put('admin/garden/{id}/update','GardenController@update')->name('backend_garden_update');
    Route::get('admin/garden/{id}/delete','GardenController@destroy')->name('backend_garden_delete');

//    backend pools all route below here
    Route::get('admin/pool/create','PoolController@create')->name('backend_pool_create');
    Route::post('admin/pool/insert','PoolController@store')->name('backend_pool_store');
    Route::get('admin/pool/manage','PoolController@index')->name('backend_pool_manage');
    Route::get('admin/pool/{id}/edit','PoolController@edit')->name('backend_pool_edit');
    Route::put('admin/pool/{id}/update','PoolController@update')->name('backend_pool_update');
    Route::get('admin/pool/{id}/delete','PoolController@destroy')->name('backend_pool_delete');

//    backend labs all route below here
    Route::get('admin/lab/create','LabController@create')->name('backend_lab_create');
    Route::post('admin/lab/insert','LabController@store')->name('backend_lab_store');
    Route::get('admin/lab/manage','LabController@index')->name('backend_lab_manage');
    Route::get('admin/lab/{id}/edit','LabController@edit')->name('backend_lab_edit');
    Route::put('admin/lab/{id}/update','LabController@update')->name('backend_lab_update');
    Route::get('admin/lab/{id}/delete','LabController@destroy')->name('backend_lab_delete');

//    backend magazines all route below here
    Route::get('admin/magazine/create','MagazineController@create')->name('backend_magazine_create');
    Route::post('admin/magazine/insert','MagazineController@store')->name('backend_magazine_store');
    Route::get('admin/magazine/manage','MagazineController@index')->name('backend_magazine_manage');
    Route::get('admin/magazine/{id}/edit','MagazineController@edit')->name('backend_magazine_edit');
    Route::put('admin/magazine/{id}/update','MagazineController@update')->name('backend_magazine_update');
    Route::get('admin/magazine/{id}/delete','MagazineController@destroy')->name('backend_magazine_delete');

//    backend programs all route below here
    Route::get('admin/program/create','ProgramController@create')->name('backend_program_create');
    Route::post('admin/program/insert','ProgramController@store')->name('backend_program_store');
    Route::get('admin/program/manage','ProgramController@index')->name('backend_program_manage');
    Route::get('admin/program/{id}/edit','ProgramController@edit')->name('backend_program_edit');
    Route::put('admin/program/{id}/update','ProgramController@update')->name('backend_program_update');
    Route::get('admin/program/{id}/delete','ProgramController@destroy')->name('backend_program_delete');

//    backend accounts all route below here
    Route::get('admin/account/create','AccountController@create')->name('backend_account_create');
    Route::post('admin/account/insert','AccountController@store')->name('backend_account_store');
    Route::get('admin/account/manage','AccountController@index')->name('backend_account_manage');
    Route::get('admin/account/{id}/edit','AccountController@edit')->name('backend_account_edit');
    Route::put('admin/account/{id}/update','AccountController@update')->name('backend_account_update');
    Route::get('admin/account/{id}/delete','AccountController@destroy')->name('backend_account_delete');

//    backend gests all route below here
    Route::get('admin/gest/create','GestController@create')->name('backend_gest_create');
    Route::post('admin/gest/insert','GestController@store')->name('backend_gest_store');
    Route::get('admin/gest/manage','GestController@index')->name('backend_gest_manage');
    Route::get('admin/gest/{id}/edit','GestController@edit')->name('backend_gest_edit');
    Route::put('admin/gest/{id}/update','GestController@update')->name('backend_gest_update');
    Route::get('admin/gest/{id}/show','GestController@show')->name('backend_gest_show');
    Route::get('admin/gest/{id}/delete','GestController@destroy')->name('backend_gest_delete');

//    backend driving coures all route below here
    Route::get('admin/driving_course/create','DrivingCourseController@create')->name('backend_driving_course_create');
    Route::post('admin/driving_course/insert','DrivingCourseController@store')->name('backend_driving_course_store');
    Route::get('admin/driving_course/manage','DrivingCourseController@index')->name('backend_driving_course_manage');
    Route::get('admin/driving_course/{id}/edit','DrivingCourseController@edit')->name('backend_driving_course_edit');
    Route::put('admin/driving_course/{id}/update','DrivingCourseController@update')->name('backend_driving_course_update');
    Route::get('admin/driving_course/{id}/delete','DrivingCourseController@destroy')->name('backend_driving_course_delete');

//    backend buildings all route below here
    Route::get('admin/building/create','BuildingController@create')->name('backend_building_create');
    Route::post('admin/building/insert','BuildingController@store')->name('backend_building_store');
    Route::get('admin/building/manage','BuildingController@index')->name('backend_building_manage');
    Route::get('admin/building/{id}/edit','BuildingController@edit')->name('backend_building_edit');
    Route::put('admin/building/{id}/update','BuildingController@update')->name('backend_building_update');
    Route::get('admin/building/{id}/delete','BuildingController@destroy')->name('backend_building_delete');

//    backend libarys all route below here
    Route::get('admin/libary/create','LibaryController@create')->name('backend_libary_create');
    Route::post('admin/libary/insert','LibaryController@store')->name('backend_libary_store');
    Route::get('admin/libary/manage','LibaryController@index')->name('backend_libary_manage');
    Route::get('admin/libary/{id}/edit','LibaryController@edit')->name('backend_libary_edit');
    Route::put('admin/libary/{id}/update','LibaryController@update')->name('backend_libary_update');
    Route::get('admin/libary/{id}/delete','LibaryController@destroy')->name('backend_libary_delete');

//    backend hostels all route below here
    Route::get('admin/hostel/create','HostelController@create')->name('backend_hostel_create');
    Route::post('admin/hostel/insert','HostelController@store')->name('backend_hostel_store');
    Route::get('admin/hostel/manage','HostelController@index')->name('backend_hostel_manage');
    Route::get('admin/hostel/{id}/edit','HostelController@edit')->name('backend_hostel_edit');
    Route::put('admin/hostel/{id}/update','HostelController@update')->name('backend_hostel_update');
    Route::get('admin/hostel/{id}/delete','HostelController@destroy')->name('backend_hostel_delete');

//    backend book categorys all route below here
    Route::get('admin/book_category/create','BookCategoryController@create')->name('backend_book_category_create');
    Route::post('admin/book_category/insert','BookCategoryController@store')->name('backend_book_category_store');
    Route::get('admin/book_category/manage','BookCategoryController@index')->name('backend_book_category_manage');
    Route::get('admin/book_category/{id}/edit','BookCategoryController@edit')->name('backend_book_category_edit');
    Route::put('admin/book_category/{id}/update','BookCategoryController@update')->name('backend_book_category_update');
    Route::get('admin/book_category/{id}/delete','BookCategoryController@destroy')->name('backend_book_category_delete');

//    backend room all route below here
    Route::get('admin/room/create','RoomController@create')->name('backend_room_create');
    Route::post('admin/room/insert','RoomController@store')->name('backend_room_store');
    Route::get('admin/room/manage','RoomController@index')->name('backend_room_manage');
    Route::get('admin/room/{id}/show','RoomController@show')->name('backend_room_show');
    Route::get('admin/room/{id}/edit','RoomController@edit')->name('backend_room_edit');
    Route::put('admin/room/{id}/update','RoomController@update')->name('backend_room_update');
    Route::get('admin/room/{id}/delete','RoomController@destroy')->name('backend_room_delete');

//    backend books all route below here
    Route::get('admin/book/create','BookController@create')->name('backend_book_create');
    Route::post('admin/book/insert','BookController@store')->name('backend_book_store');
    Route::get('admin/book/manage','BookController@index')->name('backend_book_manage');
    Route::get('admin/book/{id}/show','BookController@show')->name('backend_book_show');
    Route::get('admin/book/{id}/edit','BookController@edit')->name('backend_book_edit');
    Route::put('admin/book/{id}/update','BookController@update')->name('backend_book_update');
    Route::get('admin/book/{id}/delete','BookController@destroy')->name('backend_book_delete');

//    backend notice all route below here
    Route::get('admin/notice/create','NoticeController@create')->name('backend_notice_create');
    Route::post('admin/notice/insert','NoticeController@store')->name('backend_notice_store');
    Route::get('admin/notice/manage','NoticeController@index')->name('backend_notice_manage');
    Route::get('admin/notice/{id}/show','NoticeController@show')->name('backend_notice_show');
    Route::get('admin/notice/{id}/edit','NoticeController@edit')->name('backend_notice_edit');
    Route::put('admin/notice/{id}/update','NoticeController@update')->name('backend_notice_update');
    Route::get('admin/notice/{id}/delete','NoticeController@destroy')->name('backend_notice_delete');

//    backend photos all route below here
    Route::get('admin/photo/create','PhotoController@create')->name('backend_photo_create');
    Route::post('admin/photo/insert','PhotoController@store')->name('backend_photo_store');
    Route::get('admin/photo/manage','PhotoController@index')->name('backend_photo_manage');
    Route::get('admin/photo/{id}/show','PhotoController@show')->name('backend_photo_show');
    Route::get('admin/photo/{id}/edit','PhotoController@edit')->name('backend_photo_edit');
    Route::put('admin/photo/{id}/update','PhotoController@update')->name('backend_photo_update');
    Route::get('admin/photo/{id}/delete','PhotoController@destroy')->name('backend_photo_delete');

//    backend vidoes all route below here
    Route::get('admin/video/create','VideoController@create')->name('backend_video_create');
    Route::post('admin/video/insert','VideoController@store')->name('backend_video_store');
    Route::get('admin/video/manage','VideoController@index')->name('backend_video_manage');
    Route::get('admin/video/{id}/show','VideoController@show')->name('backend_video_show');
    Route::get('admin/video/{id}/edit','VideoController@edit')->name('backend_video_edit');
    Route::put('admin/video/{id}/update','VideoController@update')->name('backend_video_update');
    Route::get('admin/video/{id}/delete','VideoController@destroy')->name('backend_video_delete');

//    backend teachers all route below here
    Route::get('admin/teacher/create','TeacherController@create')->name('backend_teacher_create');
    Route::post('admin/teacher/insert','TeacherController@store')->name('backend_teacher_store');
    Route::get('admin/teacher/manage','TeacherController@index')->name('backend_teacher_manage');
    Route::get('admin/teacher/{id}/show','TeacherController@show')->name('backend_teacher_show');
    Route::get('admin/teacher/{id}/edit','TeacherController@edit')->name('backend_teacher_edit');
    Route::put('admin/teacher/{id}/update','TeacherController@update')->name('backend_teacher_update');
    Route::get('admin/teacher/{id}/delete','TeacherController@destroy')->name('backend_teacher_delete');

//    backend driving teachers all route below here
    Route::get('admin/driving_teacher/create','DrivingTeacherController@create')->name('backend_driving_teacher_create');
    Route::post('admin/driving_teacher/insert','DrivingTeacherController@store')->name('backend_driving_teacher_store');
    Route::get('admin/driving_teacher/manage','DrivingTeacherController@index')->name('backend_driving_teacher_manage');
    Route::get('admin/driving_teacher/{id}/show','DrivingTeacherController@show')->name('backend_driving_teacher_show');
    Route::get('admin/driving_teacher/{id}/edit','DrivingTeacherController@edit')->name('backend_driving_teacher_edit');
    Route::put('admin/driving_teacher/{id}/update','DrivingTeacherController@update')->name('backend_driving_teacher_update');
    Route::get('admin/driving_teacher/{id}/delete','DrivingTeacherController@destroy')->name('backend_driving_teacher_delete');

//    backend driving students all route below here
    Route::get('admin/driving_student/create','DrivingStudentController@create')->name('backend_driving_student_create');
    Route::post('admin/driving_student/insert','DrivingStudentController@store')->name('backend_driving_student_store');
    Route::get('admin/driving_student/manage','DrivingStudentController@index')->name('backend_driving_student_manage');
    Route::get('admin/driving_student/{id}/show','DrivingStudentController@show')->name('backend_driving_student_show');
    Route::get('admin/driving_student/{id}/edit','DrivingStudentController@edit')->name('backend_driving_student_edit');
    Route::put('admin/driving_student/{id}/update','DrivingStudentController@update')->name('backend_driving_student_update');
    Route::get('admin/driving_student/{id}/delete','DrivingStudentController@destroy')->name('backend_driving_student_delete');

//    backend students all route below here
    Route::get('admin/student/create','StudentController@create')->name('backend_student_create');
    Route::post('admin/student/insert','StudentController@store')->name('backend_student_store');
    Route::get('admin/student/manage','StudentController@index')->name('backend_student_manage');
    Route::get('admin/student/{id}/show','StudentController@show')->name('backend_student_show');
    Route::get('admin/student/{id}/edit','StudentController@edit')->name('backend_student_edit');
    Route::put('admin/student/{id}/update','StudentController@update')->name('backend_student_update');
    Route::get('admin/student/{id}/delete','StudentController@destroy')->name('backend_student_delete');
});


