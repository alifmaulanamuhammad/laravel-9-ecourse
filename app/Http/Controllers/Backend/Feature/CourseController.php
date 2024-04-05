<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\CourseDatatable;
use App\DataTables\Mitra\CoursemitraDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\CourseMitraRequest;
use App\Http\Requests\Mitra\CourseMitraUpdateRequest;
use App\Models\Feature\Course;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Feature\CourseDetail;
use App\Models\Master\Category;

class CourseController extends Controller
{
    protected $course,$category,$courseDetail;
    
    public function __construct(Course $course,Category $category,CourseDetail $courseDetail)
    {
        $this->course = new BaseRepository($course);
        $this->category = new BaseRepository($category);
        $this->courseDetail = new BaseRepository($courseDetail);
    }

    public function index(CourseDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.course.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
        $data['course'] = $this->course->find($id);
        return view('backend.feature.course.show',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
    public function create()
    {
        try {
            $data['category'] = $this->category->get();
       
            return view('backend.feature.course.create',compact('data'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
 