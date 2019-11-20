<?php

namespace App\Http\Controllers;

use App\Account;
use App\Book;
use App\Book_Category;
use App\Building;
use App\Classe;
use App\Department;
use App\Driving_Course;
use App\Driving_Student;
use App\Driving_Teacher;
use App\Garden;
use App\Gest;
use App\Hostel;
use App\Lab;
use App\Libary;
use App\Magazine;
use App\Notice;
use App\Photo;
use App\Pool;
use App\Program;
use App\Room;
use App\Student;
use App\Teacher;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $departments = Department::all();
        $classes = Classe::all();

        $notices = Notice::all();
        $accounts = Account::all();
        $libarys = Libary::all();
        $hostels = Hostel::all();

        $buildings = Building::all();
        $gardens = Garden::all();
        $book_categorys = Book_Category::all();
        $books = Book::all();

        $rooms = Room::all();
        $driving_teachers = Driving_Teacher::all();
        $magazines = Magazine::all();
        $driving_students = Driving_Student::all();

        $programs = Program::all();
        $gests = Gest::all();
        $pools = Pool::all();
        $photos = Photo::all();

        $driving_courses = Driving_Course::all();
        $videos = Video::all();
        $labs = Lab::all();
        return view('home',compact('students','teachers','departments','classes',
        'notices','libarys','hostels','accounts','buildings','gardens','book_categorys','books',
        'rooms','driving_teachers','magazines','programs','gests','pools','photos',
        'driving_courses','videos','labs','driving_students'
        ));
    }
}
