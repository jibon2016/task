<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Ajax reques for all Courses.
     */
    public function dataTable()
    {
        $query = Course::query();
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function(Course $course) {
                return '<a href="'.route('courses.edit',['course' => $course->id]).'" class="btn btn-primary bg-gradient-primary btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                        <a role="button" data-id="'.$course->id.'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'level' => 'integer',
            'price' => 'numeric',
            'description' => 'nullable|string',
            'modules' => 'nullable|array',
            'modules.*.title' => 'required_with:modules|string',
            'modules.*.contents' => 'nullable|array',
            'modules.*.contents.*.title' => 'required_with:modules.*.contents|string',
        ]);


        try {
            DB::beginTransaction();
            // create course
            $course = Course::create([
                'title' => $validated['title'],
                'level' => $validated['level'] ?? null,
                'price' => $validated['price'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);


            foreach ($request->input('modules', []) as $moduleIndex => $moduleData) {
                $moduleTitle = $moduleData['title'] ?? null;
                $moduleDesc = $moduleData['desc'] ?? null;

                // create module (example)
                $module = $course->modules()->create([
                    'title' => $moduleTitle,
                    'description' => $moduleDesc,
                ]);

                foreach ($moduleData['contents'] ?? [] as $contentIndex => $content) {
                    $contentTitle = $content['title'] ?? null;
                    $contentDesc = $content['desc'] ?? null;

                    // create content linked to module
                    $course->contents()->create([
                        'course_id' => $course->id,
                        'module_id' => $module->id,
                        'title' => $contentTitle,
                        'description' => $contentDesc,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('courses.index')->with('success', 'Course created successfully.');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error('Error creating course: '.$exception->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the course: ' . $exception->getMessage()]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::with(['modules.contents'])->findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
